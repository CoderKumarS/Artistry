@extends('layouts.app')

@section('title', 'Online Art Gallery | Gallery')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold tracking-tight md:text-4xl mb-6 text-gray-800 dark:text-gray-200">Art Gallery</h1>
        <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between mb-4">
            <div class="relative w-full sm:max-w-sm">
                <x-lucide-search class="absolute left-2.5 top-2.5 h-4 w-4 text-gray-200" />
                <input type="search" placeholder="Search paintings or artists..."
                    class="w-full pl-8 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500 px-2 py-2"
                    value="{{ request('searchTerm') }}" name="searchTerm" />
            </div>
            <div class="flex items-center gap-2">
                <form method="GET" action="{{ route('gallery') }}" class="flex items-center gap-2">
                    <select
                        class="w-full sm:w-[180px] border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500 px-2 py-2 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                        name="sortBy" onchange="this.form.submit()">
                        <option value="newest" {{ request('sortBy') == 'newest' ? 'selected' : '' }}>Newest</option>
                        <option value="oldest" {{ request('sortBy') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                        <option value="price-high" {{ request('sortBy') == 'price-high' ? 'selected' : '' }}>Price: High to
                            Low
                        </option>
                        <option value="price-low" {{ request('sortBy') == 'price-low' ? 'selected' : '' }}>Price: Low to
                            High
                        </option>
                        <option value="rating" {{ request('sortBy') == 'rating' ? 'selected' : '' }}>Highest Rated</option>
                    </select>
                </form>
                <button
                    class="border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500 p-3 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                    type="button" data-toggle="modal" data-target="#filterModal">
                    <x-lucide-filter class="h-4 w-4 dark:text-gray-200" />
                </button>
            </div>
            <div id="filterModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
                <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                    <h3 class="text-lg font-medium mb-4">Filter Artwork</h3>
                    <div class="space-y-4">
                        <div>
                            <h4 class="text-sm font-medium mb-2">Categories</h4>
                            <div class="grid grid-cols-2 gap-2">
                                @foreach ($categories as $category)
                                    <div class="flex items-center space-x-2">
                                        <input type="radio" id="category-{{ $category }}" name="selectedCategory"
                                            value="{{ $category }}"
                                            {{ old('selectedCategory') == $category ? 'checked' : '' }}
                                            class="form-radio" />
                                        <label for="category-{{ $category }}"
                                            class="text-sm">{{ $category }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium mb-2">Price Range</h4>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm">${{ $priceRange['min'] }}</span>
                                <span class="text-sm">${{ $priceRange['max'] }}</span>
                            </div>
                            <input type="range" min="0" max="2000" step="50"
                                value="{{ $priceRange['min'] }}" class="w-full" name="priceRangeStart" />
                            <input type="range" min="0" max="2000" step="50"
                                value="{{ $priceRange['max'] }}" class="w-full" name="priceRangeEnd" />
                        </div>

                        <button type="button"
                            class="w-full bg-indigo-500 text-white py-2 rounded-md shadow-sm hover:bg-indigo-600"
                            onclick="resetFilters()">
                            Reset Filters
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex gap-2 overflow-x-auto pb-2 mb-6 scrollbar-thin">
            <button type="button"
                class="px-4 py-2 rounded-md text-sm {{ request('selectedCategory') == null ? 'bg-indigo-500 text-white' : 'border border-gray-300' }}"
                onclick="filterCategory(null)">
                All
            </button>
            @foreach ($categories as $category)
                <button type="button"
                    class="px-4 py-2 rounded-md text-sm {{ request('selectedCategory') == $category ? 'bg-indigo-500 text-white' : 'border border-gray-300' }}"
                    onclick="filterCategory('{{ $category }}')">
                    {{ $category }}
                </button>
            @endforeach
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="art-gallery">
            @php
                $sortedArtworks = $artworks
                    ->when(request('sortBy') == 'newest', fn($query) => $query->sortByDesc('created_at'))
                    ->when(request('sortBy') == 'oldest', fn($query) => $query->sortBy('created_at'))
                    ->when(request('sortBy') == 'price-high', fn($query) => $query->sortByDesc('price'))
                    ->when(request('sortBy') == 'price-low', fn($query) => $query->sortBy('price'))
                    ->when(request('sortBy') == 'rating', fn($query) => $query->sortByDesc('rating'));
            @endphp
            @foreach ($sortedArtworks as $artwork)
                @if (!request('selectedCategory') || $artwork->category == request('selectedCategory'))
                    <x-card :art="$artwork" type="artwork"
                        class="border border-gray-300 shadow rounded-md dark:shadow-gray-600" />
                @endif
            @endforeach
        </div>

    </div>
@endsection
@push('scripts')
    <script>
        function filterCategory(category) {
            const url = new URL(window.location.href);
            if (category) {
                url.searchParams.set('selectedCategory', category);
            } else {
                url.searchParams.delete('selectedCategory');
            }
            window.location.href = url.toString();
        }
    </script>
@endpush
