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
        $json = File::get("database/json/users.json");
        $users = collect(json_decode($json, true));
        // Insert users into the database
        $users->each(function ($user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt($user['password'])
            ]);
        });
    }
}
