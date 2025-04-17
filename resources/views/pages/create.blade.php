@extends('layouts.app')

@section('title', 'Become an Artist - Online Art Gallery')

@section('content')
    <div class="flex min-h-screen items-center justify-center bg-gray-100 dark:bg-gray-900 py-12">
        <div id="register-form" class="w-full max-w-md px-4">
            <div
                class="overflow-hidden rounded-lg border-[1px] border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800">
                <div class="flex flex-col space-y-2 p-6 text-center">
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Become an Artist</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Fill out the form to register as an artist</p>
                </div>
                <div class="p-6 pt-0">
                    @if (session('error'))
                        <div id="error-alert"
                            class="alert alert-error bg-red-100 text-red-800 p-4 rounded fixed top-4 left-1/2 transform -translate-x-1/2 z-50 flex items-center justify-between w-11/12 md:w-96 shadow-lg">
                            <span>{{ session('error') }}</span>
                            <button onclick="document.getElementById('error-alert').remove()" class="ml-4 text-red-800">
                                &times;
                            </button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('artist.register') }}" enctype="multipart/form-data"
                        class="space-y-4">
                        @csrf
                        <input type="text" name="userId" value="{{ $user->id }}" class="hidden">
                        <div class="space-y-2">
                            <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                Full Name
                            </label>
                            <input type="text" id="name" name="name" placeholder="Your full name"
                                value="{{ $user->name }}"
                                class="block w-full rounded-md p-2.5 border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-[1px] focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                required>
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                Email
                            </label>
                            <input type="email" id="email" name="email" placeholder="artist@example.com"
                                value="{{ $user->email }}"
                                class="block w-full rounded-md p-2.5 border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-[1px] focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                required>
                        </div>

                        <div class="space-y-2">
                            <label for="description" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                Description
                            </label>
                            <textarea id="description" name="description" placeholder="Tell us about yourself"
                                class="block w-full rounded-md p-2.5 border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-[1px] focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                required>{{ old('description') }}</textarea>
                        </div>

                        <div class="space-y-2">
                            <label for="profile" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                Profile Picture
                            </label>
                            <div class="flex flex-col space-y-2 justify-center items-center">
                                <div id="profile-preview"
                                    class="w-24 h-24 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center overflow-hidden cursor-pointer"
                                    onclick="document.getElementById('profile').click()">
                                    <div class="flex flex-col items-center justify-center" id="profile-preview-content">
                                        <x-lucide-upload class="h-6 w-6 text-gray-400" />
                                    </div>
                                    <img id="profile-image" src="#" alt="Profile Preview"
                                        class="hidden w-full h-full object-cover">
                                </div>
                                <input type="file" id="profile" name="profile" class="hidden" accept="image/*" required
                                    onchange="previewImage(event, 'profile-preview', 'profile-image', 'profile-preview-content')">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label for="background_image" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                Background Image
                            </label>
                            <div class="flex flex-col space-y-2">
                                <div id="background-preview"
                                    class="w-full h-48 md:h-72 bg-gray-200 dark:bg-gray-700 flex items-center justify-center overflow-hidden cursor-pointer"
                                    onclick="document.getElementById('background_image').click()">
                                    <div class="flex flex-col items-center justify-center" id="background-preview-content">
                                        <x-lucide-upload class="h-6 w-6 text-gray-400" />
                                        <p class="mt-2 text-sm font-medium text-gray-700 dark:text-gray-200 text-center">
                                            Drag
                                            and drop your image here or click to browse</p>
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 text-center">Supports JPG,
                                            PNG, WEBP. Max size 10MB. </p>
                                    </div>
                                    <img id="background-image" src="#" alt="Background Preview"
                                        class="hidden w-full h-full object-cover">
                                </div>
                                <input type="file" id="background_image" name="background_image" class="hidden"
                                    accept="image/*"
                                    onchange="previewImage(event, 'background-preview', 'background-image', 'background-preview-content')">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="specialty" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                Specialty
                            </label>
                            <input type="text" id="specialty" name="specialty"
                                placeholder="Your specialty (e.g., painting)" value="{{ old('specialty') }}"
                                class="block w-full rounded-md p-2.5 border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-[1px] focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                required>
                        </div>

                        <div class="space-y-2">
                            <label for="education" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                Education
                            </label>
                            <input type="text" id="education" name="education" placeholder="Your education background"
                                value="{{ old('education') }}"
                                class="block w-full rounded-md p-2.5 border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-[1px] focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                required>
                        </div>

                        <div class="space-y-2">
                            <label for="experience" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                Experience
                            </label>
                            <textarea id="experience" name="experience" placeholder="Your experience in art"
                                class="block w-full rounded-md p-2.5 border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-[1px] focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                required>{{ old('experience') }}</textarea>
                        </div>

                        <button type="submit"
                            class="w-full rounded-md bg-black dark:bg-blue-600 text-white py-2 px-4 text-sm font-medium shadow hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 cursor-pointer">
                            Register
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // GSAP animation
            gsap.fromTo(
                "#register-form", {
                    y: 20,
                    opacity: 0
                }, {
                    y: 0,
                    opacity: 1,
                    duration: 0.8,
                    ease: "power3.out"
                }
            );
        });

        function previewImage(event, previewId, imageId, backgroundPreviewId) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById(previewId);
            const imageElement = document.getElementById(imageId);
            const backgroundPreviewContent = document.getElementById(backgroundPreviewId);
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imageElement.src = e.target.result;
                    imageElement.classList.remove('hidden');
                    previewContainer.classList.add('border', 'border-gray-300', 'dark:border-gray-600');
                };
                backgroundPreviewContent.classList.add('hidden');
                reader.readAsDataURL(file);
            } else {
                imageElement.src = '#';
                imageElement.classList.add('hidden');
                previewContainer.classList.remove('border', 'border-gray-300', 'dark:border-gray-600');
            }
        }
    </script>
@endpush
