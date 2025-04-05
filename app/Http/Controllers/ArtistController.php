<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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
        return view('artists'); // Ensure 'artists.blade.php' exists in resources/views
    }
}
