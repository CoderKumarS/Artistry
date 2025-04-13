<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Artist;
use App\Models\Artwork;
class ArtistController extends Controller
{
    // Handle the artist index logic
    public function showDashboard()
    {
        // Logic to show the dashboard
        if (Auth::check()) {
            return view('layouts.dashboard');
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

    // Code for sending feedback to the admin mail
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
}
