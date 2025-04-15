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
@extends('layouts.app')
@section('title', 'Online Art Gallery | Dashboard')
@section('description', 'Artist Dashboard - Manage your profile and artworks')
@section('content')
    <div class="flex min-h-screen">
        {{-- dashboard-sidebar.blade.php --}}
        <div class="sidebar-wrapper">
            {{-- Mobile sidebar --}}
            <div class="flex items-center lg:hidden p-4">
                <button id="mobile-menu-trigger"
                    class="relative inline-flex items-center justify-center rounded-md border border-input bg-background h-9 w-9 mr-2">
                    <x-lucide-menu class="h-5 w-5" />
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>

            {{-- Mobile sidebar drawer --}}
            <div id="mobile-sidebar"
                class="lg:hidden fixed inset-y-0 left-0 z-50 w-[240px] bg-background border-r transform -translate-x-full">
                <div class="flex h-full flex-col">
                    @include('components.sidebar-content', ['artist' => $artist])
                </div>
            </div>

            {{-- Desktop sidebar --}}
            <div class="hidden lg:block w-[240px] border-r bg-background h-full">
                @include('components.sidebar-content', ['artist' => $artist])
            </div>

            {{-- Mobile sidebar overlay --}}
            <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 hidden"></div>
        </div>
        <div class="flex-1 overflow-auto">
            <div class="container px-4 py-6" id="dashboard-main">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h1 class="text-3xl font-bold">Artist Dashboard</h1>
                        <p class="text-gray-600">Welcome back, {{ $artist->user->name }}</p>
                    </div>

                    <a href="{{ route('artworks.create') }}">
                        <x-button type="submit">
                            <x-lucide-plus class="h-4 w-4 mr-2" />
                            Add New Painting
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
                                    </div>
                                    <div class="mt-6 text-center">
                                        <a href="{{ route('gallery') }}">
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
                                        <a href="#">
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
                                <div class="px-6 py-5">
                                    <div class="space-y-6">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        function initializeTabsWithAnimation() {
                            const tabs = document.querySelectorAll('#tabs button');
                            const tabContents = document.querySelectorAll('.tab-content');

                            tabs.forEach(tab => {
                                tab.addEventListener('click', function() {
                                    const targetTab = this.getAttribute('data-tab');
                                    tabs.forEach(t => t.classList.remove('text-black', 'bg-white',
                                        'dark:text-white', 'dark:bg-gray-700'));

                                    // Add active classes to the clicked tab
                                    this.classList.add('text-black', 'bg-white', 'dark:text-white',
                                        'dark:bg-gray-700');

                                    // Animate tab content switch with "from" and "to" effect
                                    tabContents.forEach(content => {
                                        if (content.id === targetTab) {
                                            gsap.fromTo(content, {
                                                autoAlpha: 0,
                                                display: 'none',
                                                scale: 0.95
                                            }, {
                                                autoAlpha: 1,
                                                duration: 0.5,
                                                display: 'block',
                                                scale: 1,
                                                ease: 'power2.out'
                                            });
                                        } else {
                                            gsap.fromTo(content, {
                                                autoAlpha: 1,
                                                display: 'block',
                                                scale: 1
                                            }, {
                                                autoAlpha: 0,
                                                duration: 0.5,
                                                display: 'none',
                                                scale: 0.95,
                                                ease: 'power2.in'
                                            });
                                        }
                                    });
                                });
                            });
                        }

                        initializeTabsWithAnimation();
                    });
                </script>
            </div>
        </div>
    </div>

@endsection
