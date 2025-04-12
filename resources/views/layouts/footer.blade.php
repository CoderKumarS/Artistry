@php
    $links = [
        ['route' => route('gallery'), 'text' => 'Browse Gallery'],
        ['route' => route('artists'), 'text' => 'Explore Artists'],
        ['route' => route('about'), 'text' => 'About Us'],
        ['route' => route('contact'), 'text' => 'Contact'],
        ['route' => route('home'), 'text' => 'Art Blog'],
    ];
    $resources = [
        ['route' => route('login'), 'text' => 'Join as an Artist'],
        ['route' => route('login'), 'text' => 'Artist Login'],
        ['route' => route('dashboard'), 'text' => 'Artist Dashboard'],
        ['route' => route('home'), 'text' => 'Terms for Artists'],
        ['route' => route('home'), 'text' => 'FAQ'],
    ];
    $rights = [
        ['route' => route('home'), 'text' => 'Privacy Policy'],
        ['route' => route('home'), 'text' => 'Terms of Service'],
        ['route' => route('home'), 'text' => 'Cookie Policy'],
    ];
@endphp
<footer class="bg-gray-50 dark:text-white dark:bg-gray-900">
    <div class="container-full px-16 py-12 md:py-16">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            <div class="space-y-4">
                <h3 class="text-xl font-bold">Artistry</h3>
                <p class="text-sm text-[hsl(var(--muted-foreground))]">
                    Discover extraordinary art from talented artists around the world. Connect, collect, and celebrate
                    creativity.
                </p>
                <div class="flex space-x-4">
                    <x-icons type="social" ref="https://instagram.com">
                        <x-lucide-instagram class="w-5 h-5 text-gray-600" />
                        @section('title', 'Instagram')
                    </x-icons>
                    <x-icons type="social" ref="https://twitter.com">
                        <x-lucide-twitter class="w-5 h-5 text-gray-600" />
                        @section('title', 'Twitter')
                    </x-icons>
                    <x-icons type="social" ref="https://facebook.com">
                        <x-lucide-facebook class="w-5 h-5 text-gray-600" />
                        @section('title', 'Facebook')
                    </x-icons>
                    <x-icons type="social" ref="mailto:info@artistry.com">
                        <x-lucide-mail class="w-5 h-5 text-gray-600" />
                        @section('title', 'Email')
                    </x-icons>
                </div>
            </div>

            <div class="space-y-4">
                <h3 class="text-lg font-semibold">Quick Links</h3>
                <ul class="space-y-2 text-sm">
                    @foreach ($links as $link)
                        <li>
                            <a href="{{ $link['route'] }}"
                                class="text-[hsl(var(--muted-foreground))] hover:text-[hsl(var(--foreground))]">
                                {{ $link['text'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="space-y-4">
                <h3 class="text-lg font-semibold">For Artists</h3>
                <ul class="space-y-2 text-sm">
                    @foreach ($resources as $resource)
                        <li>
                            <a href="{{ $resource['route'] }}"
                                class="text-[hsl(var(--muted-foreground))] hover:text-[hsl(var(--foreground))]">
                                {{ $resource['text'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="space-y-4">
                <h3 class="text-lg font-semibold">Newsletter</h3>
                <p class="text-sm text-[hsl(var(--muted-foreground))]">
                    Subscribe to our newsletter for the latest art updates and exclusive offers.
                </p>
                <form action="#" method="POST" class="flex space-x-2">
                    @csrf
                    <input type="email" name="email" placeholder="Your email"
                        class="flex h-9 w-full rounded-md border border-input bg-[hsl(var(--background))] px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-[hsl(var(--muted-foreground))] focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 max-w-[220px]">
                    <x-button type="submit">Subscribe</x-button>
                </form>
            </div>
        </div>

        <hr class="my-8 border-t border-border">

        <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
            <p class="text-center text-sm text-[hsl(var(--muted-foreground))] md:text-left">
                &copy; {{ date('Y') }} Artistry. All rights reserved.
            </p>
            <div class="flex gap-4 text-sm text-[hsl(var(--muted-foreground))]">
                @foreach ($rights as $right)
                    <a href="{{ $right['route'] }}" class="hover:text-[hsl(var(--foreground))]">
                        {{ $right['text'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</footer>
