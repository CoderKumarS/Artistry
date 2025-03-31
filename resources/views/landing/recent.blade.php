@php
    $recentPaintings = [
        [
            'id' => 1,
            'title' => 'Sunset Horizon',
            'artist' => 'Elena Rodriguez',
            'artistId' => 1,
            'image' => 'https://placehold.co/500x400',
            'rating' => 4.8,
            'price' => "$1,200",
        ],
        [
            'id' => 2,
            'title' => 'Urban Reflections',
            'artist' => 'Marcus Chen',
            'artistId' => 2,
            'image' => 'https://placehold.co/500x400',
            'rating' => 4.5,
            'price' => "$950",
        ],
        [
            'id' => 3,
            'title' => 'Garden of Dreams',
            'artist' => 'Sophia Williams',
            'artistId' => 3,
            'image' => 'https://placehold.co/500x400',
            'rating' => 4.9,
            'price' => "$1,500",
        ],
        [
            'id' => 4,
            'title' => 'Digital Cosmos',
            'artist' => 'Jamal Thompson',
            'artistId' => 4,
            'image' => 'https://placehold.co/500x400',
            'rating' => 4.7,
            'price' => "$850",
        ],
        [
            'id' => 5,
            'title' => 'Mountain Serenity',
            'artist' => 'Elena Rodriguez',
            'artistId' => 1,
            'image' => 'https://placehold.co/500x400',
            'rating' => 4.6,
            'price' => "$1,100",
        ],
        [
            'id' => 6,
            'title' => 'Abstract Emotions',
            'artist' => 'Marcus Chen',
            'artistId' => 2,
            'image' => 'https://placehold.co/500x400',
            'rating' => 4.4,
            'price' => "$780",
        ],
    ];

@endphp

<div class="w-full">
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($recentPaintings as $painting)
            <x-card :art="$painting" type='recent' />
        @endforeach
    </div>
</div>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        gsap.registerPlugin(ScrollTrigger);

        const artistsRef = document.getElementById('artistsRef');
        if (artistsRef) {
            gsap.fromTo(
                artistsRef.querySelectorAll('.artist-card'), {
                    y: 50,
                    opacity: 0
                }, {
                    y: 0,
                    opacity: 1,
                    stagger: 0.15,
                    duration: 0.8,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: artistsRef,
                        start: 'top 80%',
                    },
                }
            );
        }
    });
</script> --}}
