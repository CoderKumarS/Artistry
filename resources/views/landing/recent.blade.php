<div class="w-full">
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($recent as $painting)
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
