@extends('layouts.app')

@section('title', 'Online Art Gallery')
<!-- {{-- @section('content')

@endsection --}} -->
@section('content')
    <!-- Hero Section -->
    @include('landing.hero')
    <section class="container-full px-4 py-12 md:py-24 bg-[hsl(var(--muted))]/50">
        <div class="mx-auto flex max-w-[58rem] flex-col items-center justify-center gap-4 text-center">
            <h2 class="font-heading text-3xl leading-[1.1] sm:text-3xl md:text-5xl">Featured Artists</h2>
            <p class="max-w-[85%] leading-normal text-[hsl(var(--muted-foreground))] sm:text-lg sm:leading-7 mb-8">
                Meet the talented creators behind our most popular works
            </p>
            @include('landing.featured')
        </div>
    </section>
    <section class="container-full px-4 py-12 md:py-24">
        <div class="mx-auto flex max-w-[78rem] flex-col items-center justify-center gap-4 text-center">
            <h2 class="font-heading text-3xl leading-[1.1] sm:text-3xl md:text-5xl">Recent Additions</h2>
            <p class="max-w-[85%] leading-normal text-muted-foreground sm:text-lg sm:leading-7 mb-8">
                Explore our latest masterpieces added to the collection
            </p>
            @include('landing.recent')
            <a href="#"
                class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-[hsl(var(--primary))] text-[hsl(var(--primary-foreground))] shadow hover:bg-[hsl(var(--primary))]/90 h-10 px-4 py-2 dark:bg-blue-600 dark:text-white dark:hover:bg-blue-700">
                View All Artwork
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-arrow-right ml-2">
                    <path d="M5 12h14" />
                    <path d="m12 5 7 7-7 7" />
                </svg>
            </a>
        </div>
    </section>
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
