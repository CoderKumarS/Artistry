@extends('layouts.app')

@section('title', 'Online Art Gallery')
{{-- @section('content')

@endsection --}}
@section('content')
    <!-- Hero Section -->
    <div class="flex min-h-screen flex-col">
        <div
            class="bg-gray-200 dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-white flex p-6 lg:p-8 items-center justify-center min-h-screen flex-col">
            <div class="text-center max-w-lg">
                <h1 class="text-4xl font-extrabold mb-6 leading-tight sm:text-5xl lg:text-6xl">
                    Welcome to <span class="text-blue-500 dark:text-blue-400">Artistry</span>
                </h1>
                <p class="text-lg mb-8 text-gray-600 dark:text-gray-300">
                    Discover your creativity and connect with a community of artists.
                </p>
                <div class="flex flex-wrap justify-center gap-4 mb-6">
                    <a href="{{ route('login') }}"
                        class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition duration-300">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-3 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                        Sign Up
                    </a>
                </div>
            </div>
        </div>
        <div
            class="relative overflow-hidden bg-gradient-to-b from-[hsl(var(--background))] to-[hsl(var(--muted))]/30 pt-16 md:pt-24
            id="hero-section">
            <div class="container-full px-16 md:px-16">
                <div class="grid gap-6 lg:grid-cols-[1fr_500px] lg:gap-12 xl:grid-cols-[1fr_550px]">
                    <div id="hero-text" class="flex flex-col justify-center space-y-4">
                        <div class="space-y-2">
                            <h1
                                class="text-3xl font-bold tracking-tighter sm:text-5xl xl:text-6xl/none text-gray-900 dark:text-gray-100">
                                Where Art Comes to Life
                            </h1>
                            <p class="max-w-[600px] text-[hsl(var(--muted-foreground))] md:text-xl dark:text-gray-300">
                                Discover, connect, and collect extraordinary paintings from emerging and established artists
                                around the world.
                            </p>
                        </div>
                        <div class="flex flex-col gap-2 min-[400px]:flex-row">
                            <a href="#"
                                class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-black text-white shadow hover:bg-black/90 h-10 px-4 py-2 dark:bg-blue-600 dark:text-white dark:hover:bg-blue-700">
                                Explore Gallery
                            </a>
                            <a href="{{ route('login') }}"
                                class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-[hsl(var(--background))] shadow-sm hover:bg-[hsl(var(--accent))] hover:text-[hsl(var(--accent-foreground))] h-10 px-4 py-2 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white">
                                Artist Login
                            </a>
                        </div>
                    </div>
                    <div id="hero-image"
                        class="mx-auto aspect-video overflow-hidden rounded-xl object-cover sm:w-full lg:order-last">
                        <img src="https://picsum.photos/200/300?grayscale" alt="Art Gallery Hero"
                            class="h-full w-full object-cover">
                    </div>
                </div>
            </div>
            <div
                class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-white to-white/0 dark:from-gray-900 dark:to-gray-900/0">
            </div>
        </div>

        <!-- Main Content Section -->
        <section class="container-full px-4 py-12 md:py-24 lg:py-32">
            <div class="mx-auto flex max-w-[58rem] flex-col items-center justify-center gap-4 text-center">
                <h2 class="font-heading text-3xl leading-[1.1] sm:text-3xl md:text-5xl text-gray-900 dark:text-gray-100">
                    Discover Extraordinary Art
                </h2>
                <p class="max-w-[85%] leading-normal text-gray-700 dark:text-gray-300 sm:text-lg sm:leading-7">
                    Explore a curated collection of paintings from talented artists around the world.
                    Connect with creators, share your thoughts, and find your next masterpiece.
                </p>
                <div class="flex flex-col gap-2 min-[400px]:flex-row">
                    <a href="#"
                        class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-[hsl(var(--primary))] text-[hsl(var(--primary-foreground))] shadow hover:bg-[hsl(var(--primary))]/90 h-10 px-4 py-2 dark:bg-blue-600 dark:text-white dark:hover:bg-blue-700">
                        Browse Gallery
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-arrow-right ml-2">
                            <path d="M5 12h14" />
                            <path d="m12 5 7 7-7 7" />
                        </svg>
                    </a>
                    <a href="#"
                        class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-[hsl(var(--background))] shadow-sm hover:bg-[hsl(var(--accent))] hover:text-[hsl(var(--accent-foreground))] h-10 px-4 py-2 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white">
                        Meet Our Artists
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // GSAP animations
            gsap.registerPlugin(ScrollTrigger);

            // Hero section animation
            const heroTl = gsap.timeline({
                defaults: {
                    ease: "power3.out"
                }
            });

            heroTl.fromTo(
                "#hero-section", {
                    opacity: 0
                }, {
                    opacity: 1,
                    duration: 1
                }
            );

            heroTl.fromTo(
                "#hero-text h1, #hero-text p, #hero-text div", {
                    y: 50,
                    opacity: 0
                }, {
                    y: 0,
                    opacity: 1,
                    stagger: 0.2,
                    duration: 0.8
                },
                "-=0.5"
            );

            heroTl.fromTo(
                "#hero-image", {
                    scale: 0.8,
                    opacity: 0
                }, {
                    scale: 1,
                    opacity: 1,
                    duration: 1
                },
                "-=0.8"
            );

            // Featured artists animation
            gsap.fromTo(
                ".artist-card", {
                    y: 50,
                    opacity: 0
                }, {
                    y: 0,
                    opacity: 1,
                    stagger: 0.15,
                    duration: 0.8,
                    ease: "power2.out",
                    scrollTrigger: {
                        trigger: "#featured-artists",
                        start: "top 80%",
                    }
                }
            );

            // Recent paintings animation
            gsap.fromTo(
                ".painting-card", {
                    y: 30,
                    opacity: 0
                }, {
                    y: 0,
                    opacity: 1,
                    stagger: 0.1,
                    duration: 0.6,
                    ease: "power2.out",
                    scrollTrigger: {
                        trigger: "#recent-paintings",
                        start: "top 80%",
                    }
                }
            );
        });
    </script>
