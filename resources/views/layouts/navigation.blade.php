<nav class="bg-white dark:bg-gray-800 shadow px-16 md:px-16">
    <div class="max-w-7xl mx-auto ">
        <div class="flex items-center h-16">
            <div class="flex">
                <!-- Brand Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900 dark:text-white">Artistry</a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden md:flex flex-1 justify-center space-x-8">
                    <x-nav-link href="/" :active="request()->is('/')" type="link">Home</x-nav-link>
                    <x-nav-link href="/gallery" :active="request()->is('gallery')" type="link">Gallery</x-nav-link>
                    <x-nav-link href="/artists" :active="request()->is('artists')" type="link">Artists</x-nav-link>
                    <x-nav-link href="/about" :active="request()->is('about')" type="link">About</x-nav-link>
                    <x-nav-link href="/contact" :active="request()->is('contact')" type="link">Contact</x-nav-link>
                </div>
            </div>

            <!-- Right: Action Icons and Login Button -->
            <div class="hidden md:flex flex-shrink-0 items-center space-x-4">
                <button id="search-button"
                    class="text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 text-xl transition-colors duration-200">
                    <i data-lucide="search" id="search-icon"></i>
                </button>
                <button id="theme-toggle"
                    class="text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 text-xl transition-colors duration-200">
                    <span data-lucide="moon" id="theme-icon"></span>
                </button>
                <a href="{{ route('login') }}"
                    class="flex items-center gap-2 text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                    <span>Login</span>
                    <i data-lucide="log-in" id="login-icon"></i>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button"
                    class="text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 text-xl transition-colors duration-200">
                    ☰
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-gray-800 shadow py-3 px-5 space-y-2">
        <a href="{{ route('home') }}"
            class="{{ request()->routeIs('home') ? 'nav-active' : 'nav-link' }} block text-gray-900 dark:text-white hover:text-blue-500 dark:hover:text-blue-400 px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">
            Home
        </a>
        <a href="{{ route('about') }}"
            class="{{ request()->routeIs('about') ? 'nav-active' : 'nav-link' }} block text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">
            About
        </a>
        <a href="{{ route('gallery') }}"
            class="{{ request()->routeIs('gallery') ? 'nav-active' : 'nav-link' }} block text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">
            Gallery
        </a>
        <a href="{{ route('artists') }}"
            class="{{ request()->routeIs('artists') ? 'nav-active' : 'nav-link' }} block text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">
            Artists
        </a>
        <a href="{{ route('contact') }}"
            class="{{ request()->routeIs('contact') ? 'nav-active' : 'nav-link' }} block text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">
            Contact
        </a>
    </div>
</nav>


<!-- Inline JavaScript for toggling mobile menu and theme -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    // Toggle Mobile Menu
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });

    // Toggle Theme (light/dark mode)
    document.getElementById('theme-toggle')?.addEventListener('click', function() {
        themeIconToggle();
        document.documentElement.classList.toggle('dark');
    });

    // Toggle Mobile Menu
    document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
    document.getElementById('mobile-menu')?.classList.toggle('hidden');
    });
    });
</script>

<style>
    .nav-active {
        position: relative;
        color: #ffffff;
        font-weight: bold;
        background-color: #3B82F6;
    }

    .dark .nav-active {
        color: #ffffff;
    }

    .dark .nav-active::before {
        background-color: #3B82F6;
    }
</style>
