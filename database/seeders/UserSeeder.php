<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for ($i = 0; $i < 50; $i++) {
        //     User::create([
        //         'name' => fake()->name(),
        //         'email' => fake()->unique()->safeEmail(),
        //         'password' => bcrypt('password')
        //     ]);
        // }
        // Create users with specific IDs
        $json = File::get("database/json/artists.json");
        $artists = collect(json_decode($json, true));
        // Insert users into the database
        $artists->each(function ($artist) {
            User::create([
                'name' => $artist['name'],
                'email' => $artist['email'],
                'password' => bcrypt($artist['password'])
            ]);
        });
    }
}
