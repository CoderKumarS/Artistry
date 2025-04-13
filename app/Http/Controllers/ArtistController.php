<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

        Mail::send('emails.feedback', $data, function($message) use ($data) {
            $message->to('varshpush@gmail.com')
                    ->subject('New Feedback from Website');
        });

        
    }
}
