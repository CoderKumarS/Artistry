@php
    $allComments = [
        (object) [
            'user' => (object) [
                'name' => 'Sophia Williams',
                'avatar_url' => 'https://placehold.co/300x300',
            ],
            'artwork_id' => 5,
            'artwork' => (object) [
                'title' => 'Ocean Bliss',
            ],
            'created_at' => now()->subMinutes(30),
            'rating' => 5,
            'description' => 'Absolutely stunning! The waves look so real.',
        ],
        (object) [
            'user' => (object) [
                'name' => 'James Smith',
                'avatar_url' => 'https://placehold.co/300x300',
            ],
            'artwork_id' => 6,
            'artwork' => (object) [
                'title' => 'Golden Sunset',
            ],
            'created_at' => now()->subHours(2),
            'rating' => 4,
            'description' => 'The colors are mesmerizing. Great work!',
        ],
        (object) [
            'user' => (object) [
                'name' => 'Emily Davis',
                'avatar_url' => 'https://placehold.co/300x300',
            ],
            'artwork_id' => 7,
            'artwork' => (object) [
                'title' => 'Forest Whisper',
            ],
            'created_at' => now()->subDays(2),
            'rating' => 3,
            'description' => 'Nice composition, but could use more detail.',
        ],
        (object) [
            'user' => (object) [
                'name' => 'Daniel Martinez',
                'avatar_url' => 'https://placehold.co/300x300',
            ],
            'artwork_id' => 8,
            'artwork' => (object) [
                'title' => 'City Lights',
            ],
            'created_at' => now()->subWeeks(1),
            'rating' => 5,
            'description' => 'Captures the essence of the city perfectly!',
        ],
        (object) [
            'user' => (object) [
                'name' => 'Olivia Garcia',
                'avatar_url' => 'https://placehold.co/300x300',
            ],
            'artwork_id' => 9,
            'artwork' => (object) [
                'title' => 'Winter Wonderland',
            ],
            'created_at' => now()->subMonths(1),
            'rating' => 4,
            'description' => 'Feels like stepping into a magical world.',
        ],
    ];
@endphp
<div class="flex-1 overflow-auto">
    <div class="container px-4 py-6">
        <div class="flex items-center mb-8">
            <a href="{{ route('dashboard') }}" class="mr-4">
                <x-lucide-arrow-left class="h-5 w-5" />
            </a>
            <div>
                <h1 class="text-3xl font-bold">Comments</h1>
                <p class="text-gray-500">Watch your reviews</p>
            </div>
        </div>
        <div class="px-6 py-5 flex flex-col gap-4">
            @foreach ($allComments as $comment)
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="h-8 w-8 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden">
                                <img src="{{ $comment->user->avatar_url }}" alt="{{ $comment->user->name }}"
                                    class="h-full w-full object-cover">
                            </div>
                            <div>
                                <p class="text-sm font-medium dark:text-white">
                                    {{ $comment->user->name }}</p>
                                <div class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                                    <a href="{{ route('artworks.show', $comment->artwork_id) }}"
                                        class="hover:text-blue-600 dark:hover:text-blue-400">
                                        {{ $comment->artwork->title }}
                                    </a>
                                    <span class="mx-1">•</span>
                                    <span>{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            @for ($i = 1; $i <= 5; $i++)
                                <x-lucide-star
                                    class="h-3 w-3 {{ $i <= $comment->rating ? 'fill-blue-500 text-blue-500' : 'text-gray-400 dark:text-gray-500' }}" />
                            @endfor
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ $comment->description }}</p>
                    <div class="flex justify-end gap-2">
                        <button
                            class="inline-flex items-center px-3 py-1 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            Reply
                        </button>
                    </div>
                    <hr class="my-2 dark:border-gray-700">
                </div>
            @endforeach
        </div>
    </div>
</div>
