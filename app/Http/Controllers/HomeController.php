<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $recent = Artwork::with('artist.user')->latest()->take(6)->get();
        return view('home')->with('recent', $recent);
    }
    public function about()
    {
        return view('pages.about');
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function gallery()
    {
        $artworks = Artwork::with('artist.user')->get(); // Eager load the artist relationship
        return view('pages.gallery')->with('artworks', $artworks);
    }
}
