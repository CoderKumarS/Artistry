<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Artwork;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $recent = Artwork::with('artist.user')
            ->latest()
            ->take(6)
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
        $featured = Artist::with('user')
            ->withCount([
                'artworks as high_rated_paintings' => function ($query) {
                    $query->where('rating', '>=', 4.5);
                },
                'artworks'
            ])
            ->orderBy('high_rated_paintings', 'desc')
            ->take(4)
            ->get()
            ->map(function ($artist) {
                return [
                    'id' => $artist->id,
                    'name' => $artist->user->name,
                    'speciality' => $artist->specialty,
                    'profile' => $artist->profile,
                    'artwork_count' => $artist->artworks_count,
                ];
            });

        // return response()->json([
        //     'recent' => $recent,
        //     'featured' => $featured
        // ])->header('Content-Type', 'application/json');
        return view('home')->with([
            'recent' => $recent,
            'featured' => $featured,
        ]);
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
        $categories = Artwork::select('category')->distinct()->pluck('category');
        $priceRange = [
            'min' => Artwork::min('price'),
            'max' => Artwork::max('price'),
        ];
        return view('pages.gallery')->with(['artworks' => $artworks, 'categories' => $categories, 'priceRange' => $priceRange]);
    }
}
