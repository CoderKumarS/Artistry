@extends('layouts.app')

@section('title', 'Online Art Gallery | Gallery')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8 text-gray-800 dark:text-gray-200">Art Gallery</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="art-gallery">
            @foreach ($artworks as $artwork)
                <x-card :art="$artwork" type="artwork"
                    class="border border-gray-300 shadow rounded-md dark:shadow-gray-600" />
            @endforeach
        </div>
    </div>

@endsection
