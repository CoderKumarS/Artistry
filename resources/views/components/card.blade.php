@props(['art' => [null], 'type' => null])
@switch($type)
    @case('featured')
        <div {{ $attributes->merge(['class' => 'card overflow-hidden rounded-lg shadow-md ']) }}>
            <img src="{{ $art['profile'] ?? 'https://placehold.co/400x400' }}" alt="{{ $art['name'] }}"
                class="w-full h-48 object-cover">
            <div class="p-4 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                <h3 class="text-lg font-semibold mb-1">{{ trim($art['name'] ?? 'Unknown Artist') }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ trim($art['speciality'] ?? 'Unknown Specialty') }}</p>
                <p class="text-sm mt-2">{{ $art['artwork_count'] ?? 0 }} Artworks</p>
                <a href="{{ url('/artist/' . ($art['id'] ?? '#')) }}" class="mt-3 inline-block">
                    <button
                        class="border border-gray-300 bg-gray-100 text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-md px-4 py-2 text-sm font-medium cursor-pointer dark:bg-blue-600 dark:text-white dark:hover:bg-blue-700">
                        View Profile
                    </button>
                </a>
            </div>
        </div>
    @break

    @case('recent')
        <div {{ $attributes->merge(['class' => 'card bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden cursor-pointer']) }}
            onclick="window.location.href='{{ url('/artworks/' . ($art['id'] ?? '#')) }}'">
            <img src="{{ $art['image'] ?? 'https://placehold.co/500x400' }}" alt="{{ $art['title'] }}"
                class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">{{ $art['title'] ?? 'Untitled' }}</h3>
                <a href="{{ url('/artist/' . ($art['artist_id'] ?? '#')) }}">
                    <p class="text-sm text-[hsl(var(--muted-foreground))] hover:text-[hsl(var(--primary))]">
                        by {{ $art['artist_name'] ?? 'Unknown Artist' }}
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
        <div {{ $attributes->merge(['class' => 'card bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden cursor-pointer']) }}
            onclick="window.location.href='{{ url('/artworks/' . ($art['id'] ?? '#')) }}'">
            <img src="{{ $art['image'] ?? 'https://placehold.co/300x300' }}" alt="{{ $art['title'] ?? 'Untitled' }}"
                class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">{{ $art['title'] ?? 'Untitled' }}</h3>
                <a href="{{ url('/artist/' . ($art['artistId'] ?? '#')) }}">
                    <p class="text-sm text-[hsl(var(--muted-foreground))] hover:text-[hsl(var(--primary))]">
                        by {{ $art['artist']['user']['name'] ?? 'Unknown Artist' }}
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
        <div class="card bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden cursor-pointer"
            onclick="window.location.href='{{ url('/artist/' . ($art['id'] ?? '#')) }}'">
            <img src="{{ $art['profile'] }}" alt="Artist Image" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="text-xl font-semibold mb-2">{{ $art['user']['name'] }}</h2>
                <p class="text-gray-600 dark:text-gray-400">{{ $art['user']['email'] }}</p>
            </div>
        </div>
    @break

    @case('stat')
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow hidden-item hover:bg-gray-200 dark:hover:bg-gray-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">{{ $art['title'] }}</p>
                    <h3 class="text-3xl font-bold text-gray-800 dark:text-gray-200">{{ $art['value'] }}</h3>
                </div>
                <x-icons type="icon">
                    {{ $slot }}
                </x-icons>
            </div>
        </div>
    @break

    @case('painting')
        <div class="flex items-center gap-4 hover:bg-gray-100 dark:hover:bg-gray-700 p-2 rounded">
            <div class="relative h-16 w-16 overflow-hidden rounded-md">
                <img src="{{ $art->image }}" alt="{{ $art->title }}" class="object-cover absolute inset-0 w-full h-full">
            </div>
            <div class="flex-1 min-w-0">
                <h4 class="font-medium dark:text-white">{{ $art->title }}</h4>
                <p class="text-sm text-gray-600 dark:text-gray-400">Added
                    {{ $art->created_at }}</p>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('artworks.show', $art->id) }}"
                    class="p-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                    <x-lucide-eye class="h-4 w-4" />
                </a>
                <a href="{{ route('artworks.edit', $art->id) }}"
                    class="p-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                    <x-lucide-edit-3 class="h-4 w-4" />
                </a>
                <form action="{{ route('artworks.destroy', $art->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-left p-2 text-sm text-red-700 cursor-pointer hover:text-red-500 dark:text-red-400 dark:hover:text-red-300">
                        <x-lucide-trash-2 class="h-4 w-4 mr-2" />
                    </button>
                </form>
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
