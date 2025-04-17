{{-- @dd($artwork) --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 mb-4">
    <div class="relative overflow-hidden rounded-lg">
        <img src="{{ $artwork['image'] ?? 'https://placehold.co/300x300' }}" alt="{{ $artwork['title'] ?? 'Untitled' }}"
            class="object-cover w-full h-full" />
    </div>

    <div class="space-y-6">
        <div>
            <h1 class="text-3xl font-bold">{{ $artwork['title'] ?? 'Untitled' }}</h1>
            <a href="{{ url('/artist/' . ($artwork['artist']['id'] ?? '#')) }}">
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
            <p class="text-2xl font-bold">₹ {{ $artwork['price'] ?? 'Price not available' }}</p>
            <a href="{{ url('/contact/') }}">
                <x-button type='submit'>Contact Gallery</x-button>
            </a>
        </div>

        <hr />

        <div class="space-y-4">
            <h2 class="text-xl font-semibold">About this artwork</h2>
            <p class="text-[hsl(var(--muted-foreground))]">{{ $artwork['description'] ?? 'Description not available' }}
            </p>

            <div class="grid grid-cols-2 gap-4 pt-2">
                @php
                    $fields = [
                        ['name' => 'Year', 'value' => $artwork['year'] ?? 'N/A'],
                        ['name' => 'Medium', 'value' => $artwork['medium'] ?? 'N/A'],
                        ['name' => 'Dimensions', 'value' => $artwork['dimension'] ?? 'N/A'],
                        ['name' => 'Category', 'value' => $artwork['category'] ?? 'N/A'],
                    ];
                @endphp
                @foreach ($fields as $field)
                    <div>
                        <p class="text-sm text-[hsl(var(--muted-foreground))]">{{ $field['name'] }}</p>
                        <p>{{ $field['value'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <hr />

        <div class="space-y-4">
            <h2 class="text-xl font-semibold">About the Artist</h2>
            <p class="text-[hsl(var(--muted-foreground))]">
                {{ $artwork['artist']['description'] ?? 'Bio not available' }}</p>
            <a href="{{ url('/artist/' . ($artwork['artist']['id'] ?? '#')) }}">
                <x-button type='secondary'>View Artist Profile</x-button>
            </a>
        </div>
    </div>
</div>
