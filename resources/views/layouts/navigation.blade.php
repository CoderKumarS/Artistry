<nav class="bg-white dark:bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Brand Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-xl font-bold text-gray-900 dark:text-white">Artistry</a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ route('home') }}"
                        class="text-gray-900 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                    <a href="#"
                        class="text-gray-900 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Gallery</a>
                    <a href="#"
                        class="text-gray-900 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Artists</a>
                    <a href="#"
                        class="text-gray-900 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">About</a>
                    <a href="#"
                        class="text-gray-900 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                </div>
            </div>
            <!-- Buttons -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <button
                    class="text-gray-900 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Search</button>
                <button id="theme-toggle"
                    class="text-gray-900 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Toggle
                    Theme</button>
                <a href="{{ route('login') }}"
                    class="text-gray-900 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
            </div>
            <!-- Mobile Menu Button -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button id="mobile-menu-button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-900 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="sm:hidden hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="#"
                class="block text-gray-900 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white px-3 py-2 rounded-md text-base font-medium">Home</a>
            <a href="#"
                class="block text-gray-900 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white px-3 py-2 rounded-md text-base font-medium">Gallery</a>
            <a href="#"
                class="block text-gray-900 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white px-3 py-2 rounded-md text-base font-medium">Artists</a>
            <a href="#"
                class="block text-gray-900 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white px-3 py-2 rounded-md text-base font-medium">About</a>
            <a href="#"
                class="block text-gray-900 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white px-3 py-2 rounded-md text-base font-medium">Contact</a>
        </div>
    </div>
</nav>

<script>
    // Toggle Mobile Menu
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });

    // Toggle Theme
    document.getElementById('theme-toggle').addEventListener('click', function() {
        document.documentElement.classList.toggle('dark');
    });
</script>

<style>
    /* Add transition for theme toggle */
    html {
        transition: background-color 0.3s, color 0.3s;
    }
</style>
