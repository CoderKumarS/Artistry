@php
    // Mock data for featured artists
    $featuredArtists = [
        [
            'id' => 1,
            'name' => 'Elena Rodriguez',
            'image' => 'https://placehold.co/400x400',
            'artworks' => 24,
            'specialty' => 'Abstract Expressionism',
        ],
        [
            'id' => 2,
            'name' => 'Marcus Chen',
            'image' => 'https://placehold.co/400x400',
            'artworks' => 18,
            'specialty' => 'Contemporary Realism',
        ],
        [
            'id' => 3,
            'name' => 'Sophia Williams',
            'image' => 'https://placehold.co/400x400',
            'artworks' => 32,
            'specialty' => 'Impressionism',
        ],
        [
            'id' => 4,
            'name' => 'Jamal Thompson',
            'image' => 'https://placehold.co/400x400',
            'artworks' => 15,
            'specialty' => 'Digital Art',
        ],
    ];
@endphp

<div class="w-full">
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($featuredArtists as $artist)
            <x-card :art="$artist" type='featured' />
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
