{{-- sidebar-content.blade.php --}}
@php
    $navItems = [
        [
            'title' => 'Dashboard',
            'href' => '/dashboard',
            'icon' => 'layout-dashboard',
        ],
        [
            'title' => 'My Paintings',
            'href' => '/dashboard/paintings',
            'icon' => 'image',
        ],
        [
            'title' => 'Comments',
            'href' => '/dashboard/comments',
            'icon' => 'message-square',
        ],
        [
            'title' => 'Analytics',
            'href' => '/dashboard/analytics',
            'icon' => 'bar-chart-3',
        ],
        [
            'title' => 'Settings',
            'href' => '/dashboard/settings',
            'icon' => 'settings',
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
        @foreach ($navItems as $index => $item)
            <li>
                <a href="{{ $item['href'] }}"
                    class="flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium transition-colors hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white dark:text-gray-300 {{ $index === 0 ? 'bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white' : '' }}">
                    {{-- @include('components.icons.' . $item['icon'], ['class' => 'h-4 w-4']) --}}
                    {{ $item['title'] }}
                </a>
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
    <a href="{{ route('logout') }}">
        <x-button type='secondary' class="w-full">
            <x-lucide-log-out class="h-4 w-4" />
            <span>Logout</span>
        </x-button>
    </a>
</div>
