@extends('layouts.app')
@section('title', 'Online Art Gallery | Dashboard')
@section('description', 'Artist Dashboard - Manage your profile and artworks')
@section('content')
    <div class="flex min-h-screen">
        @if (session('success'))
            <div id="success-alert"
                class="alert alert-success bg-green-100 text-green-800 p-4 rounded fixed top-4 left-1/2 transform -translate-x-1/2 z-50 flex items-center justify-between w-96 shadow-lg">
                <span>{{ session('success') }}</span>
                <button onclick="document.getElementById('success-alert').remove()" class="ml-4 text-green-800">
                    &times;
                </button>
            </div>
        @endif

        @if (session('error'))
            <div id="error-alert"
                class="alert alert-error bg-red-100 text-red-800 p-4 rounded fixed top-4 left-1/2 transform -translate-x-1/2 z-50 flex items-center justify-between w-96 shadow-lg">
                <span>{{ session('error') }}</span>
                <button onclick="document.getElementById('error-alert').remove()" class="ml-4 text-red-800">
                    &times;
                </button>
            </div>
        @endif
        <div class="sidebar-wrapper">
            {{-- Mobile sidebar --}}
            <div class="flex items-center lg:hidden p-4">
                <button id="mobile-menu-trigger"
                    class="relative inline-flex items-center justify-center rounded-md border border-input bg-background h-9 w-9 mr-2">
                    <x-lucide-menu class="h-5 w-5" />
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>

            {{-- Mobile sidebar drawer --}}
            <div id="mobile-sidebar"
                class="lg:hidden fixed inset-y-0 left-0 z-50 w-[240px] bg-background border-r transform -translate-x-full">
                <div class="flex h-full flex-col">
                    @include('components.sidebar-content', ['artist' => $artist])
                </div>
            </div>

            {{-- Desktop sidebar --}}
            <div class="hidden lg:block w-[240px] border-r bg-background h-full">
                @include('components.sidebar-content', ['artist' => $artist])
            </div>

            {{-- Mobile sidebar overlay --}}
            <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 hidden"></div>
        </div>
        @if (request()->is('dashboard'))
            @include('dashboard.hero', ['artist' => $artist])
        @elseif (request()->is('dashboard/paintings'))
            @include('dashboard.paintings', ['artist' => $artist])
        @elseif (request()->is('dashboard/comments'))
            @include('dashboard.comments', ['artist' => $artist])
        @elseif (request()->is('dashboard/analytics'))
            @include('dashboard.analytics', ['artist' => $artist])
        @elseif (request()->is('dashboard/settings'))
            @include('dashboard.setting', ['artist' => $artist])
        @endif
    </div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('#tabs button');
        const tabContents = document.querySelectorAll('.tab-content');
        const tl = gsap.timeline({
            defaults: {
                ease: "power3.out"
            }
        })
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const targetTab = this.getAttribute('data-tab');

                tabs.forEach(t => t.classList.remove('text-black', 'bg-white',
                    'dark:text-white', 'dark:bg-gray-700'));
                this.classList.add('text-black', 'bg-white', 'dark:text-white',
                    'dark:bg-gray-700');

                tabContents.forEach(content => {
                    content.classList.add('hidden');
                    if (content.id === targetTab) {
                        content.classList.remove('hidden');
                        tl.fromTo(content, {
                            y: 30,
                            opacity: 0
                        }, {
                            y: 0,
                            opacity: 1,
                            duration: 0.6
                        });
                    }
                });
            });
        });

        // Activate the first tab by default
        if (tabs.length > 0) {
            tabs[0].click();
        }
        
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');

        if (successAlert) {
            setTimeout(() => {
                gsap.to(successAlert, {
                    opacity: 0,
                    y: -20,
                    duration: 0.5,
                    onComplete: () => successAlert.remove()
                });
            }, 5000);
        }

        if (errorAlert) {
            setTimeout(() => {
                gsap.to(errorAlert, {
                    opacity: 0,
                    y: -20,
                    duration: 0.5,
                    onComplete: () => errorAlert.remove()
                });
            }, 5000);
        }
    });
</script>
