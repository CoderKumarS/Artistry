@props(['active' => false, 'type' => 'link'])
@switch($type)
    @case('link')
        <a class="{{ $active ? 'relative text-black font-bold dark:text-white before:absolute before:-inset-1 before:h-1  before:bg-[#3B82F6]' : '' }} text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200"
            {{ $attributes->merge(['aria-current' => $active ? 'page' : 'false']) }}>{{ $slot }}</a>
    @break

    @case('disable')
        <a {{ $attributes }} class="text-gray-400 cursor-not-allowed px-3 py-2 rounded-md text-sm font-medium"
            aria-disabled="true">Disabled</a>
    @break

    @case('header')
        <a {{ $attributes }} class="text-xl font-bold text-gray-900">{{ $slot }}</a>
    @break

    @case('mobile')
        <a class="{{ $active ? 'relative text-blue-800 font-bold dark:text-white ' : 'block text-gray-900 dark:text-white' }}  hover:text-blue-500 dark:hover:text-blue-400 px-3 py-2 rounded-md text-base font-medium transition-colors duration-200"
            {{ $attributes->merge(['aria-current' => $active ? 'page' : 'false']) }}>{{ $slot }}</a>
    @break

    @default
        <a {{ $attributes }}>{{ $slot }}</a>
@endswitch
