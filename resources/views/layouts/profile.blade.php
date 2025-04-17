@php
    $userInfo = [
        'Location' => 'Jharkhand',
        'Email' => 'user@example.com',
        'Phone' => '+91-1234567890',
        'Joined' => 'January 2020',
        'Website' => 'https://example.com',
    ];
@endphp
@extends('layouts.app')
@section('title', 'Online Art Gallery | Profile')
@section('description', 'Manage your profile')
@section('content')
    <div class="container-full items-center justify-center w-full">
        <div class="relative h-[300px] md:h-[400px] overflow-hidden" id="artist-profile-cover">
            <img src="{{ asset('images/landing-bg.png') }}" alt="{{ $user['name'] }} cover"
                class="absolute inset-0 w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="absolute bottom-0 left-0 right-0 py-6 px-10 text-white">
                <div class="container flex items-end gap-6">
                    <div
                        class="relative h-24 w-24 md:h-32 md:w-32 overflow-hidden rounded-full border-4 border-white dark:border-gray-900">
                        <img src="{{ $user['profile'] ?? 'https://placehold.co/100x100' }}" alt="{{ $user['name'] }}"
                            class="absolute inset-0 w-full h-full object-cover" />
                    </div>
                    <div class="flex flex-col items-start space-y-4">
                        <h1 class="text-2xl md:text-4xl font-bold">{{ $user['name'] }}</h1>
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('logout') }}" class="w-full">
                                <x-button type='submit' class="w-full space-x-2 items-center justify-center">
                                    <x-lucide-log-out class="h-4 w-4" />
                                    <span>Logout</span>
                                </x-button>
                            </a>
                            <a href="{{ route('artist.create', ['id' => $user['id']]) }}" class="w-full">
                                <x-button type='secondary' class="w-full space-x-2 items-center justify-center text-black">
                                    <x-lucide-plus class="h-4 w-4" />
                                    <span>Become an Artist</span>
                                </x-button>
                            </a>
                        </div>
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
                        <h2 class="text-2xl font-semibold mb-4">About the User</h2>
                        <p class="text-[hsl(var(--muted-foreground))]">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Consectetur omnis sapiente minima labore, quod, illum, recusandae placeat neque nisi
                            asperiores eius explicabo natus doloribus nobis! Qui sapiente sunt dolorum doloremque
                            reprehenderit iste dolore, ut, quaerat aperiam nesciunt repellat praesentium deleniti laborum
                            vel nemo, inventore explicabo soluta maxime veniam doloribus fugiat molestias. Aperiam, vel
                            incidunt ullam, fugit dolores omnis iste repellat provident voluptates ab dolorem totam,
                            perspiciatis placeat rerum perferendis accusantium aliquid debitis eos nobis. Amet ducimus,
                            excepturi reprehenderit debitis tempore expedita illo necessitatibus earum, voluptate autem modi
                            et. Ducimus quo labore voluptatum inventore, autem laborum perferendis eligendi numquam minus
                            ipsum.</p>
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="bg-gray-50 dark:bg-gray-900 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold mb-4">User Information</h3>

                        <div class="space-y-4">
                            @foreach ($userInfo as $label => $value)
                                <div>
                                    <p class="text-sm text[hsl(var(--muted-foreground))]">{{ $label }}</p>
                                    <p>{{ $value }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <section class="mt-16">
                <h2 class="text-2xl font-semibold mb-6">Recent</h2>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3" id="artist-artwork">
                    @foreach ($artwork as $painting)
                        <x-card :art="$painting" type='recent' />
                    @endforeach
                </div>
            </section>
        </div>
    </div>

@endsection
