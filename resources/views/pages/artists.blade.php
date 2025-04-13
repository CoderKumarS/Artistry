@extends('layouts.app')
@section('title', 'Online Art Gallery | Artists')
@section('content')
    <div class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
        <div class="container mx-auto p-4">
            <!-- Header -->
            <header class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Artists</h1>
            </header>

            <!-- Artist Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="artist-gallery">
                @foreach ($artists as $artist)
                    <x-card :art="$artist" type="artist" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
