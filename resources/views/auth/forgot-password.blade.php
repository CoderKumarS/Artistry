@extends('layouts.app')
@section('title', 'Forgot Password - Online Art Gallery')
@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 transition-colors duration-300">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 w-full max-w-md">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 text-center mb-6">Forgot Password</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 text-center mb-6">
                Enter your email address and we'll send you a link to reset your password.
            </p>
            <form action="{{ route('password.email') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email
                        Address</label>
                    <input type="email" id="email" name="email" required
                        class="w-full mt-1 px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-200 transition-colors duration-300">
                </div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:ring-offset-gray-100 dark:focus:ring-offset-gray-900 transition-transform transform hover:scale-105 duration-300">
                    Send Reset Link
                </button>
            </form>
            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-sm text-blue-500 hover:underline dark:text-blue-400">Back to
                    Login</a>
            </div>
        </div>
    </div>
@endsection
