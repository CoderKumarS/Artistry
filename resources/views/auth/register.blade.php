@extends('layouts.app')
@section('title', 'Register - Online Art Gallery')
@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 transition-colors duration-300">
        @if ($errors->any())
            <div class="w-full max-w-md mb-6">
                <div
                    class="bg-red-100 dark:bg-red-800 text-red-700 dark:text-red-200 border border-red-400 dark:border-red-600 rounded-lg p-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div
            class="w-full max-w-md p-8 space-y-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg transform transition-all duration-500 hover:scale-105">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 text-center">Register</h2>
            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-2 mt-1 border rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-2 mt-1 border rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 mt-1 border rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="password_confirmation"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full px-4 py-2 mt-1 border rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition-transform duration-300 transform hover:scale-105">
                    Register
                </button>
            </form>
            <p class="text-sm text-center text-gray-600 dark:text-gray-400">
                Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
            </p>
        </div>
    </div>

@endsection
