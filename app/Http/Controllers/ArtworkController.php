<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
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
            ->orderByDesc('rating') // Assuming 'rating' is a column in your database
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
            // Handle the case where the artwork or artist is not found
            return response()->json(['message' => 'Artwork not found'], 404);
        }
        return view('paintings.index')->with(
            [
                'artwork' => $artwork,
                'likeArtworks' => $likeArtworks
            ]
        );
        // return response()->json(['likeArtwork' => $likeArtwork, 'artwork' => $artwork]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artwork $artwork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artwork $artwork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artwork $artwork)
    {
        //
    }
}
