@extends('layouts.app')

@section('title', 'Login - Online Art Gallery')

@section('content')
    <div class="flex min-h-screen flex-col items-center justify-center bg-gray-100 dark:bg-gray-900 py-12 relative">
        @if ($errors->any())
            <div id="error-messages" class="w-full max-w-md mb-6 absolute top-0 left-1/2 transform -translate-x-1/2 z-50">
                <div
                    class="bg-red-100 dark:bg-red-800 text-red-700 dark:text-red-200 border border-red-400 dark:border-red-600 rounded-lg p-4">
                    <div>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <div id="login-form" class="w-full max-w-md px-4">
            <div
                class="overflow-hidden rounded-lg border-[1px] border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800">
                <div class="flex flex-col space-y-2 p-6 text-center">
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Artist Login</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Enter your credentials to access your dashboard</p>
                </div>
                <div class="p-6 pt-0">
                    @if (session('error'))
                        <div id="error-alert"
                            class="alert alert-error bg-red-100 text-red-800 p-4 rounded fixed top-4 left-1/2 transform -translate-x-1/2 z-50 flex items-center justify-between w-96 shadow-lg">
                            <span>{{ session('error') }}</span>
                            <button onclick="document.getElementById('error-alert').remove()" class="ml-4 text-red-800">
                                &times;
                            </button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf

                        <div class="space-y-2">
                            <label for="email" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                Email
                            </label>
                            <input type="email" id="email" name="email" placeholder="artist@example.com"
                                value="{{ old('email') }}"
                                class="block w-full rounded-md p-2.5 border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-[1px] focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                required autofocus>
                        </div>

                        <div class="space-y-2">
                            <label for="password" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                Password
                            </label>
                            <div class="relative">
                                <input type="password" id="password" name="password" placeholder="••••••••"
                                    class="block w-full rounded-md p-2.5 border-[1px] border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    required>
                                <button type="button" id="toggle-password" class="absolute right-0 top-0 h-full px-3 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="text-gray-500 dark:text-gray-400">
                                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                    <span class="sr-only">Show password</span>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="remember" name="remember"
                                class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <label for="remember" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                Remember me
                            </label>
                        </div>

                        <button type="submit"
                            class="w-full rounded-md bg-black dark:bg-blue-600 text-white py-2 px-4 text-sm font-medium shadow hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 cursor-pointer">
                            Sign In
                        </button>
                    </form>

                    <div class="mt-4 text-center text-sm">
                        <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
                            Forgot password?
                        </a>
                    </div>

                    <div class="relative my-6">
                        <hr class="border-t border-gray-300 dark:border-gray-600">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="bg-white dark:bg-gray-800 px-2 text-xs text-gray-500 dark:text-gray-400">OR
                                CONTINUE WITH</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <button type="button"
                            class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 py-2 px-4 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-600">
                            Google
                        </button>
                        <button type="button"
                            class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 py-2 px-4 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-600">
                            Facebook
                        </button>
                    </div>
                </div>

                <div class="flex flex-col p-6 pt-0">
                    <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">
                            Register as an artist
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // GSAP animation
            const errorAlert = document.getElementById('error-alert');

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
            gsap.fromTo(
                "#login-form", {
                    y: 20,
                    opacity: 0
                }, {
                    y: 0,
                    opacity: 1,
                    duration: 0.8,
                    ease: "power3.out"
                }
            );

            // Toggle password visibility
            const togglePassword = document.getElementById('toggle-password');
            const passwordInput = document.getElementById('password');

            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle icon
                const eyeIcon = this.querySelector('svg');
                if (type === 'text') {
                    eyeIcon.outerHTML =
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-off text-muted-foreground"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" x2="22" y1="2" y2="22"/></svg>';
                } else {
                    eyeIcon.outerHTML =
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye text-muted-foreground"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>';
                }
            });
            const errorMessages = document.getElementById('error-messages');

            if (errorMessages) {
                setTimeout(() => {
                    gsap.to(errorMessages, {
                        opacity: 0,
                        y: -20,
                        duration: 0.5,
                        onComplete: () => errorMessages.remove()
                    });
                }, 5000);
            }
        });
    </script>
@endpush
