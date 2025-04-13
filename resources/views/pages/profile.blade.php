@php
    $artistInfo = [
        'Location' => $artist['location'],
        'Specialty' => $artist['specialty'],
        'Experience' => $artist['experience'],
        'Education' => $artist['education'],
    ];
@endphp
@extends('layouts.app')
@section('title', 'Online Art Gallery | Artist Profile')
@section('content')
    <div class="container-full items-center justify-center w-full">
        <div class="relative h-[300px] md:h-[400px] overflow-hidden" id="artist-profile-cover">
            <img src="{{ $artist['background'] ?? '/placeholder.svg' }}" alt="{{ $artist['user']['name'] }} cover"
                class="absolute inset-0 w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="absolute bottom-0 left-0 right-0 py-6 px-10 text-white">
                <div class="container flex items-end gap-6">
                    <div
                        class="relative h-24 w-24 md:h-32 md:w-32 overflow-hidden rounded-full border-4 border-white dark:border-gray-900">
                        <img src="{{ $artist['profile'] ?? '/placeholder.svg' }}" alt="{{ $artist['user']['name'] }}"
                            class="absolute inset-0 w-full h-full object-cover" />
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-4xl font-bold">{{ $artist['user']['name'] }}</h1>
                        <p class="text-white/80">
                            {{ $artist['location'] }} • {{ $artist['specialty'] }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-full px-16 py-8 md:py-10">
            <x-nav-link href="/artists" class="mb-6">
                <x-lucide-arrow-left class="w-4 h-4 mr-2" />
                <span>Back to Artists</span>
            </x-nav-link>
            <div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-8 mb-12" id="artist-profile">
                <div class="space-y-6">
                    <div>
                        <h2 class="text-2xl font-semibold mb-4">About the Artist</h2>
                        <p class="text-[hsl(var(--muted-foreground))]">{{ $artist['description'] }}</p>
                    </div>

                    <div>
                        <h2 class="text-2xl font-semibold mb-4">Exhibition History</h2>
                        <ul class="space-y-2 text-[hsl(var(--muted-foreground))]">
                            <li>• exhibition</li>
                            {{-- {artistData.exhibitions.map((exhibition, index) => (
                            <li key={index}>• {exhibition}</li>
                            ))} --}}
                        </ul>
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="bg-gray-300 dark:bg-gray-900 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold mb-4">Artist Information</h3>

                        <div class="space-y-4">
                            @foreach ($artistInfo as $label => $value)
                                <div>
                                    <p class="text-sm text[hsl(var(--muted-foreground))]">{{ $label }}</p>
                                    <p>{{ $value }}</p>
                                </div>
                            @endforeach

                            <hr class="my-4 border-t border[hsl(var(--muted-foreground))]" />

                            <div class="space-y-3">
                                <h4 class="font-medium">Connect with {{ explode(' ', $artist['user']['name'])[0] }}</h4>
                                <div class="flex flex-wrap gap-2">
                                    <x-button variant="outline" size="sm" asChild>
                                        <a href="#">
                                            <x-lucide-mail class="mr-2 h-4 w-4" />
                                            Email
                                        </a>
                                    </x-button>
                                    <x-button variant="outline" size="sm" asChild>
                                        <a href="#" target="_blank" rel="noopener noreferrer">
                                            <x-lucide-instagram class="mr-2 h-4 w-4" />
                                            Instagram
                                        </a>
                                    </x-button>
                                    <x-button variant="outline" size="sm" asChild>
                                        <a href="#" target="_blank" rel="noopener noreferrer">
                                            <x-lucide-twitter class="mr-2 h-4 w-4" />
                                            Twitter
                                        </a>
                                    </x-button>
                                    <x-button variant="outline" size="sm" asChild>
                                        <a href="#" target="_blank" rel="noopener noreferrer">
                                            <x-lucide-globe class="mr-2 h-4 w-4" />
                                            Website
                                        </a>
                                    </x-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="mt-16">
                <h2 class="text-2xl font-semibold mb-6">Artist's Work</h2>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3" id="artist-artwork">
                    @foreach ($artwork as $painting)
                        <x-card :art="$painting" type='recent' />
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection
