<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Artist;
use App\Models\Artwork;
use App\Models\User;
class ArtistController extends Controller
{
    // Handle the artist index logic
    public function showDashboard()
    {
        // Logic to show the dashboard
        if (Auth::check()) {
            $user = Auth::user();
            $artist = Artist::where('userId', $user->id)->first();
            if ($artist) {
                $paintingCount = Artwork::where('artistId', $artist->id)->count();
                $latestPaintings = Artwork::where('artistId', $artist->id)
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get(['id', 'title', 'image', 'created_at', 'rating']);
                $allPaintings = Artwork::where('artistId', $artist->id)->get(['id', 'title', 'image']);
                $averageRating = Artwork::where('artistId', $artist->id)->avg('rating');
                return view('layouts.dashboard')->with([
                    'artist' => $artist,
                    'painting_count' => $paintingCount,
                    'latest_paintings' => $latestPaintings,
                    'all_paintings' => $allPaintings,
                    'average_rating' => $averageRating
                ]);
            } else {
                $artworks = Artwork::with('artist')->get()->take(5);
                return view('layouts.profile')->with([
                    'user' => $user,
                    'artwork' => $artworks,
                ]);
            }
        } else {
            return redirect()->route('login')->with('error', 'Please login to access the dashboard.');
        }
    }
    public function index()
    {
        $artists = Artist::all();
        return view('pages.artists')->with('artists', $artists);
    }
    public function profile($id)
    {
        $artist = Artist::with('user')->find($id);
        $artwork = Artwork::where('artistId', $id)->get(['id', 'image', 'title', 'rating', 'price', 'artistId'])->map(function ($artwork) {
            return [
                'id' => $artwork->id,
                'image' => $artwork->image,
                'title' => $artwork->title,
                'rating' => $artwork->rating,
                'price' => $artwork->price,
                'artist_id' => $artwork->artistId,
                'artist_name' => $artwork->artist->user->name,
            ];
        });
        if (!$artist || !$artwork) {
            return response()->json(['message' => 'Artwork not found'], 404);
        }
        // return response()->json([
        //     'artist' => $artist,
        //     'artwork' => $artwork
        // ]);
        return view('pages.profile')->with([
            'artist' => $artist,
            'artwork' => $artwork
        ]);
    }
    public function submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'feedback' => 'required|string|max:1000',
        ]);

        $data = [
            'email' => $request->email,
            'feedback' => $request->feedback,
        ];

        Mail::send('emails.feedback', $data, function ($message) use ($data) {
            $message->to('varshpush@gmail.com')
                ->subject('New Feedback from Website');
        });


    }
    public function create($id)
    {
        $user = User::find($id);
        return view('pages.create')->with([
            'user' => $user,
        ]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:1000',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'background' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => 'required|string|max:1000',
            'speciality' => 'required|string|max:1000',
            'education' => 'required|string|max:1000',
            'experience' => 'required|string|max:1000',
        ]);
        $user = Auth::user();
        $artist = Artist::where('userId', $user->id)->first();

        if (!$artist) {
            $artist = new Artist();
            $artist->userId = $user->id;
            $artist->description = $request->input('description');
            $artist->profile = $request->file('profile')->store('profiles', 'public');
            $artist->background = $request->file('background')->store('backgrounds', 'public');
            $artist->location = $request->input('location');
            $artist->speciality = $request->input('speciality');
            $artist->education = $request->input('education');
            $artist->experience = $request->input('experience');
            $artist->save();

            return redirect()->route('dashboard')->with('success', 'Artist registered successfully');
        }

        return response()->json([
            'message' => 'Artist already exists'
        ]);
    }
}
