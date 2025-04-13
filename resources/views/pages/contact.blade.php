@extends('layouts.app')

@section('title', 'Online Art Gallery | Contact')
{{-- @section('content')

@endsection --}}
@section('content')
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex items-center justify-center">
        <div id="contact-form" class="w-full max-w-lg bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">Contact Us</h2>
            <form action="#" method="POST" class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                        placeholder="Your Name" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                        placeholder="Your Email" required>
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
                    <textarea id="message" name="message" rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                        placeholder="Your Message" required></textarea>
                </div>
                <x-button type="submit" class="w-full">
                    Send Message
                </x-button>
            </form>
        </div>
    </div>
@endsection
