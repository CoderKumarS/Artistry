<nav class="bg-white/50 dark:bg-gray-800/50 shadow px-16 md:px-16 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto ">
        <div class="flex justify-between h-16">
            <!-- Brand Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="text-xl font-bold text-gray-900 dark:text-white">Artistry</a>
            </div>
            <!-- Navigation Links -->
            <div class="hidden  items-center sm:ml-6 sm:flex sm:space-x-8">
                <x-nav-link href="/" :active="request()->is('/')" type="link">Home</x-nav-link>
                <x-nav-link href="/gallery" :active="request()->is('gallery')" type="link">Gallery</x-nav-link>
                <x-nav-link href="/artists" :active="request()->is('artists')" type="link">Artists</x-nav-link>
                <x-nav-link href="/about" :active="request()->is('about')" type="link">About</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')" type="link">Contact</x-nav-link>
            </div>

            <!-- Right: Action Icons and Login Button -->
            <div class="hidden md:flex flex-shrink-0 items-center space-x-4">
                <button id="theme-toggle" class="flex items-center">
                    <!-- Moon icon for light theme -->
                    <x-lucide-moon id="moon-icon"
                        class="text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 text-xl transition-colors duration-200 h-4 w-4 cursor-pointer" />

                    <!-- Sun icon for dark theme (initially hidden) -->
                    <x-lucide-sun id="sun-icon"
                        class="hidden text-gray-900 dark:text-gray-300 hover:text-yellow-500 dark:hover:text-yellow-400 text-xl transition-colors duration-200 h-4 w-4 cursor-pointer" />
                </button>
                <!-- Sun icon for dark theme (initially hidden) -->
                <input type="text" id="search-input" placeholder="Search..."
                    class="hidden bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-300 rounded-md px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition-all duration-200" />
                <button id="search-toggle" class="flex items-center">
                    <x-lucide-cross id="cross-icon"
                        class="hidden text-gray-900 dark:text-gray-300 hover:text-yellow-500 dark:hover:text-yellow-400 text-xl transition-colors duration-200 h-4 w-4 cursor-pointer" />
                    <!-- Search icon for light theme -->
                    <x-lucide-search id="search-icon"
                        class="text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 text-xl transition-colors duration-200 h-4 w-4 cursor-pointer"
                        id="search-button" />

                </button>

                @auth
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-2 text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                        <x-lucide-user class="h-4 w-4" />
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="flex items-center gap-2 text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                        <span>Login</span>
                        <i data-lucide="log-in" id="login-icon"></i>
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button"
                    class="text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 text-xl transition-all duration-200">
                    ☰
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-gray-800 shadow py-3 px-5 space-y-2">
        <x-nav-link href="/" :active="request()->is('/')" type="mobile">Home</x-nav-link>
        <x-nav-link href="/about" :active="request()->is('about')" type="mobile">About</x-nav-link>
        <x-nav-link href="/gallery" :active="request()->is('gallery')" type="mobile">Gallery</x-nav-link>
        <x-nav-link href="/artists" :active="request()->is('artists')" type="mobile">Artists</x-nav-link>
        <x-nav-link href="/contact" :active="request()->is('contact')" type="mobile">Contact</x-nav-link>
    </div>
</nav>

<script>
    // Toggle Mobile Menu
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
    // Toggle Search Input
    function initializeThemeToggle() {
        const themeToggle = document.getElementById('theme-toggle');
        const sunIcon = document.getElementById('sun-icon');
        const moonIcon = document.getElementById('moon-icon');

        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
            sunIcon.classList.remove('hidden');
            moonIcon.classList.add('hidden');
        } else {
            document.documentElement.classList.remove('dark');
            sunIcon.classList.add('hidden');
            moonIcon.classList.remove('hidden');
        }

        themeToggle.addEventListener('click', function() {
            // const themeIcon = localStorage.getItem('themeIcon');
            isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            // localStorage.setItem('themeIcon', isDark ? 'sun' : 'moon');
            moonIcon.classList.toggle('hidden', isDark);
            sunIcon.classList.toggle('hidden', !isDark);
        });
    }
    // Search Toggle
    function initializeSearchToggle() {
        const searchToggle = document.getElementById('search-toggle');
        const searchIcon = document.getElementById('search-icon');
        const crossIcon = document.getElementById('cross-icon');
        const searchInput = document.getElementById('search-input');

        searchToggle.addEventListener('click', function() {
            const isHidden = searchInput.classList.toggle('hidden');

            if (isHidden) {
                // If input is hidden now
                searchIcon.classList.remove('hidden');
                crossIcon.classList.add('hidden');
                searchInput.value = ''; // optional: clear input
            } else {
                // If input is shown now
                searchIcon.classList.add('hidden');
                crossIcon.classList.remove('hidden');
                searchInput.focus();
            }
        });
    }
    // Initialize theme toggle functionality
    initializeThemeToggle();
    // Initialize theme toggle functionality
    initializeSearchToggle();
</script>
