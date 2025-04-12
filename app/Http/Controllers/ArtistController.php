<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Artist;
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
        if (!$artist) {
            return response()->json(['message' => 'Artwork not found'], 404);
        }
        // return response()->json($artist);
        return view('pages.profile', ['artist' => $artist]);
    }
}
