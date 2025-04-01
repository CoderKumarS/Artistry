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
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Example Artist Card -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                    <img src="https://via.placeholder.com/300" alt="Artist Image" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">Artist Name</h2>
                        <p class="text-gray-600 dark:text-gray-400">Short description about the artist. This is a
                            placeholder text.</p>
                    </div>
                </div>
                <!-- Repeat similar cards for other artists -->
            </div>
        </div>
    </div>
@endsection
