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

    @case('icon')
        <div {{ $attributes->merge(['class' => 'rounded-full bg-gray-100 dark:bg-gray-700 p-3 text-black dark:text-white']) }}>
            {{ $slot }}
        </div>
    @break

    @default
        <button {{ $attributes }}>{{ $slot }}</button>
@endswitch


{{-- n+nlogn+ n*v+e --}}
