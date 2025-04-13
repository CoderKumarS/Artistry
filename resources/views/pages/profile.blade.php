@extends('layouts.app')

@section('title', 'Online Art Gallery | Artist Profile')
@section('content')
    <div class="container-full items-center justify-center w-full px-16 py-8 md:py-10">
        <x-nav-link href="/artists" class="px-4">
            <x-lucide-arrow-left class="w-4 h-4 mr-2" />
            <span>Back to Artists</span>
        </x-nav-link>
        <section class="mt-16">
            <h1 class="text-3xl font-bold mb-4">{{ $artist['user']['name'] }}</h1>
            <p class="text-gray-700 mb-4">{{ $artist['description'] }}</p>
            <div class="flex items-center space-x-4">
                <img src="{{ $artist['profile'] }}" alt="{{ $artist['user']['name'] }}" class="w-24 h-24 rounded-full">
                <div>
                    <h2 class="text-xl font-semibold">Contact</h2>
                    <p>Email: {{ $artist['user']['email'] }}</p>
                </div>
            </div>
        </section>
        <section class="mt-16">
            <h2 class="text-2xl font-semibold mb-6">Artworks</h2>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($artwork as $painting)
                    <x-card :art="$painting" type='recent' />
                @endforeach
            </div>
        </section>
    </div>
@endsection
