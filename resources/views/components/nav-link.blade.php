@props(['active' => false, 'type' => 'link'])
@switch($type)
    @case('link')
        <a class="{{ $active ? 'bg-gray-900 text-white hover:bg-gray-100 hover:text-black dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600' : 'text-gray-900 hover:bg-gray-100 hover:text-black dark:text-gray-300 dark:hover:bg-gray-600' }} px-3 py-2 rounded-md text-sm font-medium transition ease-in duration-200"
            {{ $attributes->merge(['aria-current' => $active ? 'page' : 'false']) }}>{{ $slot }}</a>
    @break

    @case('disable')
        <a {{ $attributes }} class="text-gray-400 cursor-not-allowed px-3 py-2 rounded-md text-sm font-medium"
            aria-disabled="true">Disabled</a>
    @break

    @case('header')
        <a {{ $attributes }} class="text-xl font-bold text-gray-900">{{ $slot }}</a>
    @break

    @default
        <a {{ $attributes }}>{{ $slot }}</a>
@endswitch
