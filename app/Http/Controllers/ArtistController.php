<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
        return view('pages.artists');
    }
    public function profile($id)
    {
        $artist = User::findUserById($id);

        if (!$artist) {
            return redirect()->back()->with('error', 'User not found.');
        }

        return view('pages.profile', ['artist' => $artist]);
    }
}
