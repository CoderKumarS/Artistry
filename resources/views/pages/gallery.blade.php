@extends('layouts.app')

@section('title', 'Online Art Gallery | Gallery')
@php
    // Mock data for featured 'artist's
    $artworks = [
        [
            'id' => 1,
            'title' => 'Sunset Horizon',
            'artist' => 'Elena Rodriguez',
            'artistId' => 1,
            'image' => 'https://placehold.co/500x400',
            'rating' => 4.8,
            'price' => 1200,
            'category' => 'Landscape',
            'year' => 2023,
        ],
        [
            'id' => 2,
            'title' => 'Urban Reflections',
            'artist' => 'Marcus Chen',
            'artistId' => 2,
            'image' => 'https://placehold.co/500x400',
            'rating' => 4.5,
            'price' => 950,
            'category' => 'Urban',
            'year' => 2022,
        ],
        [
            'id' => 3,
            'title' => 'Garden of Dreams',
            'artist' => 'Sophia Williams',
            'artistId' => 3,
            'image' => 'https://placehold.co/500x400',
            'rating' => 4.9,
            'price' => 1500,
            'category' => 'Abstract',
            'year' => 2023,
        ],
        [
            'id' => 4,
            'title' => 'Digital Cosmos',
            'artist' => 'Jamal Thompson',
            'artistId' => 4,
            'image' => 'https://placehold.co/500x400',
            'rating' => 4.7,
            'price' => 850,
            'category' => 'Digital',
            'year' => 2023,
        ],
        [
            'id' => 5,
            'title' => 'Mountain Serenity',
            'artist' => 'Elena Rodriguez',
            'artistId' => 1,
            'image' => 'https://placehold.co/500x400',
            'rating' => 4.6,
            'price' => 1100,
            'category' => 'Landscape',
            'year' => 2022,
        ],
        [
            'id' => 6,
            'title' => 'Abstract Emotions',
            'artist' => 'Marcus Chen',
            'artistId' => 2,
            'image' => 'https://placehold.co/500x400',
            'rating' => 4.4,
            'price' => 780,
            'category' => 'Abstract',
            'year' => 2021,
        ],
        [
            'id' => 7,
            'title' => 'Cityscape at Night',
            'artist' => 'Jamal Thompson',
            'artistId' => 4,
            'image' => 'https://placehold.co/500x400',
            'rating' => 4.8,
            'price' => 1300,
            'category' => 'Urban',
            'year' => 2022,
        ],
        [
            'id' => 8,
            'title' => 'Floral Impressions',
            'artist' => 'Sophia Williams',
            'artistId' => 3,
            'image' => 'https://placehold.co/500x400',
            'rating' => 4.7,
            'price' => 920,
            'category' => 'Still Life',
            'year' => 2023,
        ],
        [
            'id' => 9,
            'title' => 'Ocean Waves',
            'artist' => 'Elena Rodriguez',
            'artistId' => 1,
            'image' => 'https://placehold.co/500x400',
            'rating' => 4.9,
            'price' => 1400,
            'category' => 'Landscape',
            'year' => 2023,
        ],
    ];
@endphp
@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8 text-gray-800 dark:text-gray-200">Art Gallery</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($artworks as $artwork)
                <x-card :art="$artwork" type="artwork"
                    class="border border-gray-300 shadow rounded-md dark:shadow-gray-600" />
            @endforeach
        </div>
    </div>

@endsection
