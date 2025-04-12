{{-- @dd($artwork) --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 mb-4">
    <div class="relative overflow-hidden rounded-lg">
        <img src="{{ $artwork['image'] ?? 'https://placehold.co/300x300' }}" alt="{{ $artwork['title'] ?? 'Untitled' }}"
            class="object-cover" />
    </div>

    <div class="space-y-6">
        <div>
            <h1 class="text-3xl font-bold">{{ $artwork['title'] ?? 'Untitled' }}</h1>
            <a href="{{ url('/artists/' . ($artwork['artist']['id'] ?? '#')) }}">
                <p class="text-lg text-[hsl(var(--muted-foreground))] hover:text-[hsl(var(--primary))]">by
                    {{ $artwork['artist']['user']['name'] ?? 'Unknown Artist' }}</p>
            </a>
        </div>

        <div class="flex items-center space-x-4">
            <div class="flex items-center rating-stars">
                @for ($star = 1; $star <= 5; $star++)
                    <x-lucide-star
                        class="h-5 w-5 {{ $star <= round($artwork['rating'] ?? 0) ? 'fill-[hsl(var(--primary))] text-[hsl(var(--primary))]' : 'text-[hsl(var(--muted-foreground))]' }}" />
                @endfor
                <span class="ml-2 text-sm font-medium">
                    {{ $artwork['rating'] ?? '0' }} ({{ $artwork['ratingCount'] ?? '0' }} reviews)
                </span>
            </div>

            <button class="text-red-500">
                <x-lucide-heart class="h-5 w-5 fill-red-500" />
            </button>

            <button>
                <x-lucide-share-2 class="h-5 w-5" />
            </button>
        </div>

        <div class="space-y-2">
            <p class="text-2xl font-bold">{{ $artwork['price'] ?? 'Price not available' }}</p>
            <button class="w-full sm:w-auto">Contact Gallery</button>
        </div>

        <hr />

        <div class="space-y-4">
            <h2 class="text-xl font-semibold">About this artwork</h2>
            <p class="text-[hsl(var(--muted-foreground))]">{{ $artwork['description'] ?? 'Description not available' }}
            </p>

            <div class="grid grid-cols-2 gap-4 pt-2">
                <div>
                    <p class="text-sm text-[hsl(var(--muted-foreground))]">Year</p>
                    <p>{{ $artwork['year'] ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="text-sm text-[hsl(var(--muted-foreground))]">Medium</p>
                    <p>{{ $artwork['medium'] ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="text-sm text-[hsl(var(--muted-foreground))]">Dimensions</p>
                    <p>{{ $artwork['dimension'] ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="text-sm text-[hsl(var(--muted-foreground))]">Category</p>
                    <p>{{ $artwork['category'] ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <hr />

        <div class="space-y-4">
            <h2 class="text-xl font-semibold">About the Artist</h2>
            <p class="text-[hsl(var(--muted-foreground))]">
                {{ $artwork['artist']['description'] ?? 'Bio not available' }}</p>
            <a href="{{ url('/artists/' . ($artwork['artist']['id'] ?? '#')) }}">
                <button class="btn btn-outline">View Artist Profile</button>
            </a>
        </div>
    </div>
</div>
