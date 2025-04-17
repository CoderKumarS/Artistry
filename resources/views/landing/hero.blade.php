<div class="flex min-h-screen flex-col">
    <div
        class="relative bg-gray-50/30 dark:bg-gray-900/30 text-[#1b1b18] dark:text-white flex p-6 lg:p-8 items-center justify-center min-h-screen flex-col">
        <div class="absolute inset-0 bg-cover bg-center z-[-1] brightness-100 contrast-100 dark:brightness-75 dark:contrast-125"
            style="background-image: url('{{ asset('images/landing-bg.png') }}');">
        </div>
        <div class="text-center max-w-lg">
            <h1 class="text-4xl font-extrabold mb-6 leading-tight sm:text-5xl lg:text-6xl text-black dark:text-white">
                Welcome to <span class="text-blue-500 dark:text-blue-400">Artistry</span>
            </h1>
            <p class="text-lg mb-8 text-gray-600 dark:text-gray-300">
                Discover your creativity and connect with a community of artists.
            </p>
            <div class="flex flex-wrap justify-center gap-4 mb-6">
                <a href="{{ route('login') }}"
                    class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition duration-300">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="px-6 py-3 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                    Sign Up
                </a>
            </div>
        </div>
    </div>
    <div
        class="relative overflow-hidden bg-gradient-to-b from-[hsl(var(--background))] to-[hsl(var(--muted))]/30 pt-16 md:pt-24
        id="hero-section">
        <div class="container-full px-16 md:px-16" id="hero-content">
            <div class="grid gap-6 lg:grid-cols-[1fr_500px] lg:gap-12 xl:grid-cols-[1fr_550px]">
                <div id="hero-text" class="flex flex-col justify-center space-y-4">
                    <div class="space-y-2">
                        <h1
                            class="text-3xl font-bold tracking-tighter sm:text-5xl xl:text-6xl/none text-gray-900 dark:text-gray-100">
                            Where Art Comes to Life
                        </h1>
                        <p class="max-w-[600px] text-[hsl(var(--muted-foreground))] md:text-xl dark:text-gray-300">
                            Discover, connect, and collect extraordinary paintings from emerging and established artists
                            around the world.
                        </p>
                    </div>
                    <div class="flex flex-col gap-2 min-[400px]:flex-row">
                        <a href="{{ url('/gallery/') }}">
                            <x-button type='submit'>Explore Gallery</x-button>
                        </a>
                        <a href="{{ url('/login/') }}">
                            <x-button type='secondary'>Artist Login</x-button>
                        </a>
                    </div>
                </div>
                <div id="hero-image"
                    class="mx-auto aspect-video overflow-hidden rounded-xl object-cover sm:w-full lg:order-last">
                    <img src="https://picsum.photos/200/300?grayscale" alt="Art Gallery Hero"
                        class="h-full w-full object-cover">
                </div>
            </div>
        </div>
        <div
            class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-white to-white/0 dark:from-gray-900 dark:to-gray-900/0">
        </div>
    </div>

    <!-- Main Content Section -->
    <section class="container-full px-4 py-12 md:py-24 lg:py-32">
        <div class="mx-auto flex max-w-[58rem] flex-col items-center justify-center gap-4 text-center">
            <h2 class="font-heading text-3xl leading-[1.1] sm:text-3xl md:text-5xl text-gray-900 dark:text-gray-100">
                Discover Extraordinary Art
            </h2>
            <p class="max-w-[85%] leading-normal text-gray-700 dark:text-gray-300 sm:text-lg sm:leading-7">
                Explore a curated collection of paintings from talented artists around the world.
                Connect with creators, share your thoughts, and find your next masterpiece.
            </p>
            <div class="flex flex-col gap-2 min-[400px]:flex-row">
                <a href="{{ url('/gallery/') }}">
                    <x-button type='submit'>Browse Gallery
                        <x-lucide-arrow-right class="ml-2 w-4 h-4" />
                    </x-button>
                </a>
                <a href="{{ url('/artists/') }}">
                    <x-button type='secondary'>Meet Our Artists</x-button>
                </a>
            </div>
        </div>
    </section>
</div>
