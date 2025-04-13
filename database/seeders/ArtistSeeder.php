<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Artist;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("database/json/artists.json");
        $artists = collect(json_decode($json, true));
        // Insert users into the database
        $artists->each(function ($artist) {
            Artist::create([
                'userId' => $artist['userId'],
                'description' => $artist['description'],
                'profile' => $artist['profile'],
                'background' => $artist['background'],
                'location' => $artist['location'],
                'specialty' => $artist['specialty'],
                'education' => $artist['education'],
                'experience' => $artist['experience']
            ]);
        });
    }
}
