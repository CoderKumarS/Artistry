<!-- resources/views/components/navbar.blade.php -->
<nav class="bg-white dark:bg-gray-800 shadow px-6 md:px-16">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between h-16 items-center">
            <!-- Left: Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900 dark:text-white">
                    Artistry
                </a>
            </div>

            <!-- Center: Navigation Links -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'nav-active' : 'nav-link' }} text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                    Home
                </a>
                <a href="{{ route('about') }}"
                   class="{{ request()->routeIs('about') ? 'nav-active' : 'nav-link' }} text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                    About
                </a>
                <a href="{{ route('gallery') }}"
                   class="{{ request()->routeIs('gallery') ? 'nav-active' : 'nav-link' }} text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                    Gallery
                </a>
                <a href="{{ route('artists') }}"
                   class="{{ request()->routeIs('artists') ? 'nav-active' : 'nav-link' }} text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                    Artists
                </a>
                <a href="{{ route('contact') }}"
                   class="{{ request()->routeIs('contact') ? 'nav-active' : 'nav-link' }} text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                    Contact
                </a>
            </div>

            <!-- Right: Action Icons and Login Button -->
            <div class="hidden md:flex items-center space-x-4">
                <button id="search-button"
                        class="text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 text-xl transition-colors duration-200">
                    🔍
                </button>
                <button id="theme-toggle"
                        class="text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 text-xl transition-colors duration-200">
                    🌙
                </button>
                <a href="{{ route('login') }}"
                   class="flex items-center gap-2 text-gray-900 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                    <span>Login</span> 🔑
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
<script>
    // Toggle Mobile Menu
    document.getElementById('mobile-menu-button').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    // Toggle Theme (light/dark mode)
    document.getElementById('theme-toggle').addEventListener('click', function () {
        document.documentElement.classList.toggle('dark');
    });
</script>

<!-- Custom CSS for Active Link Indicator -->
<style>
    /* Active navigation link - Adds a rectangle/line above the text */
.nav-active {
    position: relative;
    color: #1D4ED8; /* Tailwind blue-700 */
    font-weight: bold;
}

/* Line/rectangle above the active link */
.nav-active::before {
    content: '';
    position: absolute;
    left: 0;
    top: -6px; /* Adjust height of the line */
    width: 100%;
    height: 3px; /* Thickness of the line */
    background-color: #1D4ED8; /* Tailwind blue-700 */
}

/* Dark mode active link adjustments */
.dark .nav-active {
    color: #ffffff;
}

.dark .nav-active::before {
    background-color: #3B82F6; /* Tailwind blue-500 */
}
</style>
