<footer class="bg-gray-50 dark:text-white dark:bg-gray-900">
    <div class="container-full px-16 py-12 md:py-16">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            <div class="space-y-4">
                <h3 class="text-xl font-bold">Artistry</h3>
                <p class="text-sm text-muted-foreground">
                    Discover extraordinary art from talented artists around the world. Connect, collect, and celebrate
                    creativity.
                </p>
                <div class="flex space-x-4">
                    <x-icons type="social" ref="https://instagram.com">
                        <x-lucide-instagram class="w-5 h-5 text-gray-600" />
                        @section('title', 'Instagram')
                    </x-icons>
                    <x-icons type="social" ref="https://twitter.com">
                        <x-lucide-twitter class="w-5 h-5 text-gray-600" />
                        @section('title', 'Twitter')
                    </x-icons>
                    <x-icons type="social" ref="https://facebook.com">
                        <x-lucide-facebook class="w-5 h-5 text-gray-600" />
                        @section('title', 'Facebook')
                    </x-icons>
                    <x-icons type="social" ref="mailto:info@artistry.com">
                        <x-lucide-mail class="w-5 h-5 text-gray-600" />
                        @section('title', 'Email')
                    </x-icons>
                </div>
            </div>

            <div class="space-y-4">
                <h3 class="text-lg font-semibold">Quick Links</h3>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="#" class="text-muted-foreground hover:text-foreground">
                            Browse Gallery
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-muted-foreground hover:text-foreground">
                            Explore Artists
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-muted-foreground hover:text-foreground">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-muted-foreground hover:text-foreground">
                            Contact
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-muted-foreground hover:text-foreground">
                            Art Blog
                        </a>
                    </li>
                </ul>
            </div>

            <div class="space-y-4">
                <h3 class="text-lg font-semibold">For Artists</h3>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="#" class="text-muted-foreground hover:text-foreground">
                            Join as an Artist
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="text-muted-foreground hover:text-foreground">
                            Artist Login
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-muted-foreground hover:text-foreground">
                            Artist Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-muted-foreground hover:text-foreground">
                            Terms for Artists
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-muted-foreground hover:text-foreground">
                            FAQ
                        </a>
                    </li>
                </ul>
            </div>

            <div class="space-y-4">
                <h3 class="text-lg font-semibold">Newsletter</h3>
                <p class="text-sm text-muted-foreground">
                    Subscribe to our newsletter for the latest art updates and exclusive offers.
                </p>
                <form action="#" method="POST" class="flex space-x-2">
                    @csrf
                    <input type="email" name="email" placeholder="Your email"
                        class="flex h-9 w-full rounded-md border border-input bg-background px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 max-w-[220px]">
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 bg-black dark:bg-blue-600 text-white dark:text-blue-100 hover:bg-primary/90 h-9 px-4 py-2">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>

        <hr class="my-8 border-t border-border">

        <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
            <p class="text-center text-sm text-muted-foreground md:text-left">
                &copy; {{ date('Y') }} Artistry. All rights reserved.
            </p>
            <div class="flex gap-4 text-sm text-muted-foreground">
                <a href="#" class="hover:text-foreground">
                    Privacy Policy
                </a>
                <a href="#" class="hover:text-foreground">
                    Terms of Service
                </a>
                <a href="#" class="hover:text-foreground">
                    Cookie Policy
                </a>
            </div>
        </div>
    </div>
</footer>
