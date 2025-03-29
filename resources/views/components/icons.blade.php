@props(['type' => null, 'ref' => null])
@switch($type)
    @case('feature')
        <button {{ $attributes }}
            class="text-gray-900 dark:text-gray-300 hover:bg-gray-100 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
            {{ $slot }}
        </button>
    @break

    @case('social')
        <button {{ $attributes }}
            class="text-gray-900 dark:text-gray-300 hover:bg-gray-100 dark:hover:text-white px-1 py-1 rounded-md h-9 w-9">
            <a href="{{ $ref }}" class="flex items-center justify-center ">
                {{ $slot }}
                <span class="sr-only">@yield('title')</span>
            </a>
        </button>
    @break

    @default
        <button {{ $attributes }}>{{ $slot }}</button>
@endswitch


{{-- n+nlogn+ n*v+e --}}
