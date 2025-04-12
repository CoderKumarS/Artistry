@extends('layouts.app')

@section('title', 'Online Art Gallery | Painting')
<!-- {{-- @section('content')

@endsection --}} -->
@section('content')
    <div class="container-full items-center justify-center w-full px-16 py-8 md:py-10">
        <x-nav-link href="/gallery" class="px-4">
            <x-lucide-arrow-left class="w-4 h-4 mr-2" />
            <span>Back to Gallery</span>
        </x-nav-link>
        <section class="container-full px-4 py-2 md:py-4 ">
            @include('paintings.hero', ['artwork' => $artwork])
        </section>
        <section class="container-full px-4 py-12 md:py-24 bg-[hsl(var(--muted))]/50">
            <div class="mx-auto flex max-w-[58rem] flex-col items-center justify-center gap-4 text-center">
                <h2 class="font-heading text-3xl leading-[1.1] sm:text-3xl md:text-5xl">Review & Comments</h2>
                @include('paintings.review')
            </div>
        </section>
        <section class="mt-16">
            <h2 class="text-2xl font-semibold mb-6">You May Also Like</h2>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @include('paintings.like', ['likeArtworks' => $likeArtworks])
            </div>
        </section>
    </div>
@endsection
