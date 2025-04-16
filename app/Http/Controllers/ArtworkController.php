<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Artist;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all artworks from the database
        $artworks = Artwork::with('artist')->get();
        return $artworks;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return a view to create a new artwork
        if (Auth::check()) {
            $user = Auth::user();
            $artist = Artist::where('userId', $user->id)->first();
            if ($artist) {
                return view('paintings.create')->with(['artist' => $artist]);
            } else {
                return response()->json(['message' => 'Artist not found'], 404);
            }
        } else {
            return redirect()->route('login')->with('error', 'Please login to access the dashboard.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'medium' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if the authenticated user is an artist
        if (Auth::check()) {
            $user = Auth::user();
            $artist = Artist::where('userId', $user->id)->first();

            if ($artist) {
                // Create a new artwork
                $artwork = new Artwork();
                $artwork->title = $request->input('title');
                $artwork->description = $request->input('description');
                $artwork->price = $request->input('price');
                $artwork->medium = $request->input('medium');
                $artwork->category = $request->input('category');
                $artwork->artistId = $artist->id;

                // Handle image upload
                if ($request->hasFile('image')) {
                    $imagePath = $request->file('image')->store('artworks', 'public');
                    $artwork->image = $imagePath;
                }

                // Save the artwork to the database
                $artwork->save();

                return redirect()->route('dashboard.paintings')
                    ->with('success', 'Artwork created successfully.');
            } else {
                return response()->json(['message' => 'Artist not found'], 404);
            }
        } else {
            return redirect()->route('login')->with('error', 'Please login to create an artwork.');
        }
    }
    public function show(Artwork $artwork)
    {
        // Fetch the artwork with its artist
        $artwork = Artwork::with('artist.user')->find($artwork->id);
        $likeArtworks = Artwork::with('artist.user')
            ->where('id', '!=', $artwork->id)
            ->where(function ($query) use ($artwork) {
                $query->where('artistId', $artwork->artistId)
                    ->orWhere('medium', $artwork->medium)
                    ->orWhere('category', $artwork->category);
            })
            ->orderByDesc('rating')
            ->take(3)
            ->get()
            ->map(function ($artwork) {
                return [
                    'id' => $artwork->id,
                    'image' => $artwork->image,
                    'title' => $artwork->title,
                    'rating' => $artwork->rating,
                    'price' => $artwork->price,
                    'artist_id' => $artwork->artist->id,
                    'artist_name' => $artwork->artist->user->name,
                ];
            });
        if (!$artwork || !$artwork->artist) {
            return response()->json(['message' => 'Artwork not found'], 404);
        }
        return view('paintings.index')->with(
            [
                'artwork' => $artwork,
                'likeArtworks' => $likeArtworks
            ]
        );
    }
    public function edit(Artwork $artwork)
    {
        // Return a view to edit the artwork
        if (Auth::check()) {
            $user = Auth::user();
            $artist = Artist::where('userId', $user->id)->first();
            $current = Artwork::where('id', $artwork->id)
                ->where('artistId', $artist->id)
                ->first();
            if ($artist && $artwork) {
                return view('paintings.edit')->with([
                    'artist' => $artist,
                    'artwork' => $current,
                ]);
            } else {
                return response()->json(['message' => 'Artist not found'], 404);
            }
        } else {
            return redirect()->route('login')->with('error', 'Please login to access the dashboard.');
        }
    }
    public function update(Request $request, Artwork $artwork)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'medium' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if the authenticated user is the owner of the artwork
        if (Auth::check()) {
            $user = Auth::user();
            $artist = Artist::where('userId', $user->id)->first();

            if ($artist) {
                // Find the artwork by its ID and ensure it belongs to the authenticated artist
                $artworkToUpdate = Artwork::where('id', $artwork->id)
                    ->where('artistId', $artist->id)
                    ->first();

                if ($artworkToUpdate) {
                    // Update the artwork details
                    $artworkToUpdate->title = $request->input('title');
                    $artworkToUpdate->description = $request->input('description');
                    $artworkToUpdate->price = $request->input('price');
                    $artworkToUpdate->medium = $request->input('medium');
                    $artworkToUpdate->category = $request->input('category');

                    // Handle image upload if a new image is provided
                    if ($request->hasFile('image')) {
                        $imagePath = $request->file('image')->store('artworks', 'public');
                        $artworkToUpdate->image = $imagePath;
                    }

                    $artworkToUpdate->save();

                    return redirect()->route('artworks.show', $artworkToUpdate->id)
                        ->with('success', 'Artwork updated successfully.');
                } else {
                    return response()->json(['message' => 'Artwork not found or unauthorized'], 404);
                }
            } else {
                return response()->json(['message' => 'Artist not found'], 404);
            }
        } else {
            return redirect()->route('login')->with('error', 'Please login to update the artwork.');
        }
    }
    public function destroy(Artwork $artwork)
    {
        // Check if the authenticated user is the owner of the artwork
        if (Auth::check()) {
            $user = Auth::user();
            $artist = Artist::where('userId', $user->id)->first();

            if ($artist) {
                // Find the artwork by its ID and ensure it belongs to the authenticated artist
                $artworkToDelete = Artwork::where('id', $artwork->id)
                    ->where('artistId', $artist->id)
                    ->first();

                if ($artworkToDelete) {
                    $artworkToDelete->delete();

                    return redirect()->route('dashboard.paintings')
                        ->with('success', 'Artwork deleted successfully.');
                } else {
                    return response()->json(['message' => 'Artwork not found or unauthorized'], 404);
                }
            } else {
                return response()->json(['message' => 'Artist not found'], 404);
            }
        } else {
            return redirect()->route('login')->with('error', 'Please login to delete the artwork.');
        }
    }
}
