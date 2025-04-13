@extends('layouts.app')

@section('title', 'Online Art Gallery')
<!-- {{-- @section('content')

@endsection --}} -->
@section('content')
    <!-- Hero Section -->
    @include('landing.hero')
    <section class="container-full px-4 py-12 md:py-24 bg-[hsl(var(--muted))]/50" id>
        <div class="mx-auto flex max-w-[58rem] flex-col items-center justify-center gap-4 text-center">
            <h2 class="font-heading text-3xl leading-[1.1] sm:text-3xl md:text-5xl">Featured Artists</h2>
            <p class="max-w-[85%] leading-normal text-[hsl(var(--muted-foreground))] sm:text-lg sm:leading-7 mb-8">
                Meet the talented creators behind our most popular works
            </p>
            <div class="w-full" id="featured-artists">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($featured as $artist)
                        <x-card :art="$artist" type='featured' />
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="container-full px-4 py-12 md:py-24">
        <div class="mx-auto flex max-w-[78rem] flex-col items-center justify-center gap-4 text-center">
            <h2 class="font-heading text-3xl leading-[1.1] sm:text-3xl md:text-5xl">Recent Additions</h2>
            <p class="max-w-[85%] leading-normal text-[hsl(var(--muted-foreground))] sm:text-lg sm:leading-7 mb-8">
                Explore our latest masterpieces added to the collection
            </p>
            <div class="w-full" id="recent-artwork">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($recent as $painting)
                        <x-card :art="$painting" type='recent' />
                    @endforeach
                </div>
            </div>
            <a href="/gallery"
                class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-[hsl(var(--primary))] text-[hsl(var(--primary-foreground))] shadow hover:bg-[hsl(var(--primary))]/90 h-10 px-4 py-2 dark:bg-blue-600 dark:text-white dark:hover:bg-blue-700">
                View All Artwork
                <x-lucide-arrow-right class="w-4 h-4 font-extrabold" />
            </a>
        </div>
    </section>
@endsection
