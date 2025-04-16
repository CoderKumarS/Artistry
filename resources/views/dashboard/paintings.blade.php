<div class="flex-1 overflow-auto">
    <div class="container px-4 py-6">
        <div class="flex flex-row items-center justify-between mb-8">
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="mr-4">
                    <x-lucide-arrow-left class="h-5 w-5" />
                </a>
                <div>
                    <h1 class="text-3xl font-bold">My Paintings</h1>
                    <p class="text-gray-500">Manage your artwork collection</p>
                </div>
            </div>
            <a href="{{ route('artworks.create') }}">
                <x-button type="submit">
                    <x-lucide-plus class="h-4 w-4 mr-2" />
                    Add New
                </x-button>
            </a>
        </div>
        <div class="px-6 py-5 flex flex-col gap-4">
            @if ($all_paintings->isEmpty())
                <div class="text-center text-gray-500">
                    <p>No paintings available.</p>
                </div>
            @else
                @foreach ($all_paintings as $painting)
                    <x-card :art="$painting" type='painting' />
                @endforeach
            @endif
        </div>
    </div>
</div>
