<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artwork;
use Illuminate\Support\Facades\File;

class ArtworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/json/artworks.json");
        $artworks = collect(json_decode($json, true));

        $artworks->each(function ($artwork) {
            Artwork::create([
                'title' => $artwork['title'],
                'artistId' => $artwork['artistId'],
                'image' => $artwork['image'],
                'description' => $artwork['description'],
                'rating' => $artwork['rating'],
                'dimension' => $artwork['dimension'],
                'medium' => $artwork['medium'],
                'price' => $artwork['price'],
                'category' => $artwork['category'],
                'year' => $artwork['year'],
            ]);
        });
    }
}
