{{-- sidebar-content.blade.php --}}
@php
    $navItems = [
        [
            'title' => 'Dashboard',
            'href' => '/dashboard',
            'icon' => 'layout-dashboard',
            'pattern' => 'dashboard',
        ],
        [
            'title' => 'My Paintings',
            'href' => '/dashboard/paintings',
            'icon' => 'image',
            'pattern' => 'dashboard/paintings',
        ],
        [
            'title' => 'Comments',
            'href' => '/dashboard/comments',
            'icon' => 'message-square',
            'pattern' => 'dashboard/comments',
        ],
        [
            'title' => 'Analytics',
            'href' => '/dashboard/analytics',
            'icon' => 'bar-chart-3',
            'pattern' => 'dashboard/analytics',
        ],
        [
            'title' => 'Settings',
            'href' => '/dashboard/settings',
            'icon' => 'settings',
            'pattern' => 'dashboard/settings',
        ],
    ];
@endphp
<div class="flex items-center gap-2 px-4 py-6">
    <div class="relative w-10 h-10 rounded-full overflow-hidden">
        <img src="{{ $artist->profile ?? 'https://placehold.co/50x50' }}" alt="Elena Rodriguez"
            class="object-cover w-full h-full">
    </div>
    <div>
        <p class="font-medium">{{ $artist->user->name }}</p>
        <p class="text-xs text-gray-500">{{ $artist->specialty }}</p>
    </div>
</div>

<div class="border-t border-gray-200"></div>

<nav class="flex-1 overflow-auto py-4">
    <ul class="grid gap-1 px-2">
        @foreach ($navItems as $item)
            <li>
                <x-nav-link href="{{ $item['href'] }}" :active="request()->is($item['pattern'])"
                    type="dashLink">{{ $item['title'] }}</x-nav-link>
            </li>
        @endforeach
    </ul>
</nav>

<div class="p-4 flex flex-col space-y-1.5">
    <a href="/">
        <x-button type='secondary' class="w-full">
            <x-lucide-log-out class="h-4 w-4" />
            <span>Back to Gallery</span>
        </x-button>
    </a>
</div>
