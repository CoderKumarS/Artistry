@php
    $stats = [
        [
            'title' => 'Total Paintings',
            'value' => $painting_count,
            'icon' => 'lucide-image',
        ],
        [
            'title' => 'Total Views',
            'value' => 350,
            'icon' => 'lucide-eye',
        ],
        [
            'title' => 'Comments',
            'value' => 250,
            'icon' => 'lucide-message-square',
        ],
        [
            'title' => 'Average Rating',
            'value' => number_format($average_rating, 1),
            'icon' => 'lucide-star',
        ],
    ];
    $tabs = [
        [
            'label' => 'Overview',
            'tab' => 'overview',
        ],
        [
            'label' => 'My Paintings',
            'tab' => 'paintings',
        ],
        [
            'label' => 'Recent Comments',
            'tab' => 'comments',
        ],
        [
            'label' => 'Analytics',
            'tab' => 'analytics',
        ],
    ];
    $allComments = [
        (object) [
            'user' => (object) [
                'name' => 'Alice Johnson',
                'avatar_url' => 'https://placehold.co/300x300',
            ],
            'artwork_id' => 3,
            'artwork' => (object) [
                'title' => 'Mountain Serenity',
            ],
            'created_at' => now()->subHours(5),
            'rating' => 5,
            'description' => 'Breathtaking view! The details are incredible.',
        ],
        (object) [
            'user' => (object) [
                'name' => 'Michael Brown',
                'avatar_url' => 'https://placehold.co/300x300',
            ],
            'artwork_id' => 4,
            'artwork' => (object) [
                'title' => 'Autumn Leaves',
            ],
            'created_at' => now()->subDays(1),
            'rating' => 4,
            'description' => 'Beautiful colors and composition!',
        ],
    ];
@endphp
<div class="flex-1 overflow-auto">
    <div class="container px-4 py-6" id="dashboard-main">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold">Artist Dashboard</h1>
                <p class="text-gray-600">Welcome back, {{ $artist->user->name }}</p>
            </div>
            <a href="{{ route('logout') }}">
                <x-button type='submit' class="w-full space-x-2 items-center justify-center">
                    <x-lucide-log-out class="h-4 w-4" />
                    <span>Logout</span>
                </x-button>
            </a>
        </div>
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4 mb-8">
            @foreach ($stats as $stat)
                <x-card :art="$stat" type='stat'>
                    <x-dynamic-component :component="$stat['icon']" class="h-6 w-6" />
                </x-card>
            @endforeach
        </div>

        <div id="tabs-section" class="hidden-item">
            <nav class="flex space-x-4 bg-gray-50 dark:bg-gray-800 w-max py-1 px-1 mb-4 rounded" aria-label="Tabs"
                id="tabs">
                @foreach ($tabs as $tab)
                    <button
                        class="py-1.5 px-2 rounded text-sm font-medium cursor-pointer {{ $loop->first ? 'text-black bg-white dark:text-white dark:bg-gray-700' : 'text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200' }} whitespace-nowrap"
                        data-tab="{{ $tab['tab'] }}">
                        {{ $tab['label'] }}
                    </button>
                @endforeach
            </nav>

            <div id="tab-content" class="space-y-4">
                <!-- Overview Tab -->
                <div id="overview" class="tab-content">
                    <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                        <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-medium dark:text-white">Recent Paintings</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Your most recently added artwork
                            </p>
                        </div>
                        <div class="px-6 py-5">
                            <div class="space-y-4">
                                @if ($all_paintings->isEmpty())
                                    <div class="text-center text-gray-500">
                                        <p>No paintings available.</p>
                                    </div>
                                @else
                                    @foreach ($latest_paintings as $painting)
                                        <div class="flex items-center gap-4">
                                            <div class="relative h-16 w-16 overflow-hidden rounded-md">
                                                <img src="{{ $painting->image }}" alt="{{ $painting->title }}"
                                                    class="object-cover absolute inset-0 w-full h-full">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <a href="{{ url('/artworks/' . ($painting->id ?? '#')) }}">
                                                    <h4 class="font-medium hover:text-blue-600 dark:text-white">
                                                        {{ $painting->title }}
                                                    </h4>
                                                </a>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">Added
                                                    {{ $painting->created_at->diffForHumans() }}</p>
                                            </div>
                                            @php
                                                $tabStats = [
                                                    [
                                                        'icon' => 'lucide-eye',
                                                        'value' => $painting->views_count ?? 0,
                                                        'is_star' => false,
                                                    ],
                                                    [
                                                        'icon' => 'lucide-message-square',
                                                        'value' => $painting->comments_count ?? 0,
                                                        'is_star' => false,
                                                    ],
                                                    [
                                                        'icon' => 'lucide-star',
                                                        'value' => number_format($painting->rating, 1),
                                                        'is_star' => true,
                                                    ],
                                                ];
                                            @endphp
                                            <div class="flex items-center gap-4 text-sm">
                                                @foreach ($tabStats as $stat)
                                                    <div class="flex items-center">
                                                        <x-dynamic-component :component="$stat['icon']"
                                                            class="mr-1 h-4 w-4 {{ $stat['is_star'] ? 'fill-black text-black dark:fill-blue-500 dark:text-blue-500' : 'text-gray-500 dark:text-blue-500' }}" />
                                                        <span class="dark:text-gray-300">{{ $stat['value'] }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="mt-6 text-center">
                                <a href="{{ route('dashboard.paintings') }}">
                                    <x-button type="secondary">
                                        View All Paintings
                                    </x-button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 shadow rounded-lg mt-4">
                        <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-medium dark:text-white">Recent Comments</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Latest feedback on your artwork
                            </p>
                        </div>
                        <div class="px-6 py-5">
                            <div class="space-y-6">
                                @php
                                    $recentComments = [
                                        (object) [
                                            'user' => (object) [
                                                'name' => 'John Doe',
                                                'avatar_url' => 'https://placehold.co/300x300',
                                            ],
                                            'artwork_id' => 1,
                                            'artwork' => (object) [
                                                'title' => 'Sunset Bliss',
                                            ],
                                            'created_at' => now()->subDays(1),
                                            'rating' => 4,
                                            'description' => 'Amazing artwork! The colors are stunning.',
                                        ],
                                        (object) [
                                            'user' => (object) [
                                                'name' => 'Jane Smith',
                                                'avatar_url' => 'https://placehold.co/300x300',
                                            ],
                                            'artwork_id' => 2,
                                            'artwork' => (object) [
                                                'title' => 'Ocean Waves',
                                            ],
                                            'created_at' => now()->subDays(2),
                                            'rating' => 5,
                                            'description' => 'Absolutely beautiful! I love the details.',
                                        ],
                                    ];
                                @endphp

                                @foreach ($recentComments as $comment)
                                    <div class="space-y-2">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-2">
                                                <div
                                                    class="h-8 w-8 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden">
                                                    <img src="{{ $comment->user->avatar_url }}"
                                                        alt="{{ $comment->user->name }}"
                                                        class="h-full w-full object-cover">
                                                </div>
                                                <div>
                                                    <p class="text-sm font-medium dark:text-white">
                                                        {{ $comment->user->name }}</p>
                                                    <div
                                                        class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                                                        <a href="#"
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
                                                        class="h-3 w-3 {{ $i <= $comment->rating ? 'fill-black text-black dark:fill-blue-500 dark:text-blue-500' : 'text-gray-400 dark:text-gray-500' }}" />
                                                @endfor
                                            </div>
                                        </div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ $comment->description }}</p>
                                        <hr class="my-2 dark:border-gray-700">
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-6 text-center">
                                <a href="{{ route('dashboard.comments') }}">
                                    <x-button type="secondary">
                                        View All Comments
                                    </x-button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Paintings Tab -->
                <div id="paintings" class="tab-content hidden">
                    <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                        <div
                            class="px-6 py-5 border-b border-gray-200 dark:border-gray-700 flex flex-row items-center justify-between">
                            <div>
                                <h3 class="text-lg font-medium dark:text-white">My Paintings</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Manage your artwork collection
                                </p>
                            </div>
                            <a href="{{ route('artworks.create') }}">
                                <x-button type="submit">
                                    <x-lucide-plus class="h-4 w-4 mr-2" />
                                    Add New
                                </x-button>
                            </a>
                        </div>
                        <div class="px-6 py-5 flex flex-col gap-4">
                            @foreach ($all_paintings as $painting)
                                <x-card :art="$painting" type='painting' />
                            @endforeach
                            <div class="mt-6 text-center">
                                <a href="{{ route('dashboard.paintings') }}">
                                    <x-button type="secondary">
                                        View All Paintings
                                    </x-button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comments Tab -->
                <div id="comments" class="tab-content hidden">
                    <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                        <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-medium dark:text-white">All Comments</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">View and respond to feedback on
                                your artwork</p>
                        </div>
                        <div class="px-6 py-5 flex flex-col gap-4">
                            @foreach ($allComments as $comment)
                                <div class="space-y-2">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <div
                                                class="h-8 w-8 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden">
                                                <img src="{{ $comment->user->avatar_url }}"
                                                    alt="{{ $comment->user->name }}"
                                                    class="h-full w-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium dark:text-white">
                                                    {{ $comment->user->name }}</p>
                                                <div
                                                    class="flex items-center text-xs text-gray-600 dark:text-gray-400">
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
                            <div class="mt-6 text-center">
                                <a href="{{ route('dashboard.comments') }}">
                                    <x-button type="secondary">
                                        View All Comments
                                    </x-button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Analytics Tab -->
                <div id="analytics" class="tab-content hidden">
                    <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                        <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-medium dark:text-white">Performance Analytics</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Track the performance of your
                                artwork</p>
                        </div>
                        <div class="px-6 py-5">
                            <div
                                class="flex h-[300px] items-center justify-center border rounded-md dark:border-gray-700">
                                <div class="flex flex-col items-center text-center">
                                    <x-lucide-bar-chart-2 class="h-16 w-16 text-gray-400 dark:text-gray-500" />
                                    <h3 class="mt-4 text-lg font-medium dark:text-white">Analytics Dashboard</h3>
                                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                        Detailed analytics about your artwork performance will appear here.
                                    </p>
                                </div>
                            </div>
                            <div class="mt-6 text-center">
                                <a href="{{ route('dashboard.analytics') }}">
                                    <x-button type="secondary">
                                        View All Analytics
                                    </x-button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
