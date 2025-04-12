@props(['art' => [null], 'type' => null])
@switch($type)
    @case('featured')
        <div {{ $attributes->merge(['class' => 'card overflow-hidden']) }}>
            <div class="p-0  border-2  rounded-md border-gray-300 dark:border-gray-600 max-w-sm ">
                <div class="relative aspect-square overflow-hidden">
                    <img src="{{ $art['image'] ?? 'https://placehold.co/400x400' }}" alt="Artist Image"
                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                </div>
                <div
                    class="p-4 bg-white text-gray-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:bg-gray-800 dark:text-gray-300 mx-auto rounded-b-md">

                    <h3 class="text-xl font-semibold">{{ trim($art['name'] ?? 'Unknown Artist') }}</h3>
                    <p class="text-sm text-[hsl(var(--muted-foreground))]">
                        {{ trim($art['specialty'] ?? 'Unknown Specialty') }}</p>
                    <p class="text-sm mt-1">{{ $art['artworks'] ?? 0 }} Artworks</p>
                    <a href="{{ url('/artists/' . ($art['id'] ?? '#')) }}" class="mt-3 inline-block">
                        <button
                            class="border border-gray-300 bg-white text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-md px-4 py-2 text-sm font-medium cursor-pointer dark:bg-blue-600 dark:text-white dark:hover:bg-blue-700"">
                            View Profile
                        </button>
                    </a>
                </div>
            </div>
        </div>
    @break

    @case('recent')
        <div {{ $attributes->merge(['class' => 'bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden cursor-pointer transition-transform duration-300 hover:scale-105']) }}
            onclick="window.location.href='{{ url('/artworks/' . ($art['id'] ?? '#')) }}'">
            <img src="{{ $art['image'] ?? 'https://placehold.co/500x400' }}" alt="{{ $art['title'] }}"
                class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">{{ $art['title'] ?? 'Untitled' }}</h3>
                <a href="{{ url('/artists/' . ($art['artistId'] ?? '#')) }}">
                    <p class="text-sm text-[hsl(var(--muted-foreground))] hover:text-[hsl(var(--primary))]">
                        by {{ $art['artist']['name'] ?? 'Unknown Artist' }}
                    </p>
                </a>
                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center">
                        <x-lucide-star class="h-4 w-4 fill-[hsl(var(--primary))] text-[hsl(var(--primary))] mr-1" />
                        <span class="text-sm">{{ $art['rating'] ?? '0' }}</span>
                    </div>
                    <p class="font-medium">₹ {{ $art['price'] ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
    @break

    @case('artwork')
        <div {{ $attributes->merge(['class' => 'bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden cursor-pointer transition-transform duration-300 hover:scale-105']) }}
            onclick="window.location.href='{{ url('/artworks/' . ($art['id'] ?? '#')) }}'">
            <img src="{{ $art['image'] ?? 'https://placehold.co/300x300' }}" alt="{{ $art['title'] ?? 'Untitled' }}"
                class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">{{ $art['title'] ?? 'Untitled' }}</h3>
                <a href="{{ url('/artists/' . ($art['artistId'] ?? '#')) }}">
                    <p class="text-sm text-[hsl(var(--muted-foreground))] hover:text-[hsl(var(--primary))]">
                        by {{ $art['artist']['name'] ?? 'Unknown Artist' }}
                    </p>
                </a>
                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center">
                        <x-lucide-star class="h-4 w-4 fill-[hsl(var(--primary))] text-[hsl(var(--primary))] mr-1" />
                        <span class="text-sm">{{ $art['rating'] ?? '0' }}</span>
                    </div>
                    <p class="font-medium">₹ {{ $art['price'] ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
    @break

    @case('artist')
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden cursor-pointer transition-transform duration-300 hover:scale-105"
            onclick="window.location.href='{{ url('/artist/' . ($art['id'] ?? '#')) }}'">
            <img src="https://placehold.co/300x300" alt="Artist Image" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">{{ $art['name'] }}</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ $art['email'] }}</p>
            </div>
        </div>
    @break

    @default
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <img src="{{ $art['image'] }}" alt="{{ $art['title'] }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $art['title'] }}</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $art['artist'] }}</p>
                <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $art['description'] }}</p>
            </div>
        </div>
    @break
@endswitch
