<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function about()
    {
        return view('pages.about');
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function artists()
    {
        return view('pages.artists');
    }
    public function gallery()
    {
        return view('pages.gallery');
    }
}
