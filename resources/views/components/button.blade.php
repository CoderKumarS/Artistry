@props(['active' => false, 'type' => null])
@switch($type)
    @case('primary')
        <button {{ $attributes }}
            class="text-gray-900 dark:text-gray-300 hover:bg-gray-100 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
            {{ $slot }}
        </button>
    @break

    @case('secondary')
        <button
            {{ $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-gray-300 disabled:pointer-events-none disabled:opacity-50 border border-gray-300 dark:border-gray-500 bg-white hover:bg-gray-100 hover:text-gray-900 h-9 px-4 py-2 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer']) }}>
            {{ $slot }}
        </button>
    @break

    @case('social')
        <a
            {{ $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-gray-300 border-input bg-[hsl(var(--background))] hover:bg-[hsl(var(--accent))] hover:text-[hsl(var(--accent-foreground))] h-9 px-4 py-1 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white cursor-pointer group']) }}>
            {{ $slot }}
        </a>
    @break

    @case('submit')
        <button type="submit"
            {{ $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-black dark:bg-blue-600 text-white dark:text-blue-100 hover:bg-[hsl(var(--primary))]/90 dark:hover:bg-blue-700 h-9 px-4 py-2 cursor-pointer']) }}>
            {{ $slot }}
        </button>
    @break

    @default
        <button {{ $attributes }}>{{ $slot }}</button>
    @break
@endswitch
