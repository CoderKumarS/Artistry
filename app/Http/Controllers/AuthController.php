<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Redirect to the intended page
            return redirect()->route('dashboard');
        }
        // If login fails, redirect back with an error message
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        // Handle registration logic
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        // Create the user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        // Log the user in
        // Redirect to the intended page
        if ($user) {
            return redirect()->route('login');
        }
    }
    public function logout()
    {
        // Handle logout logic
        Auth::logout();
        // Redirect to the login page
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }
    public function sendResetLinkEmail(Request $request)
    {
        // Handle sending reset link logic
    }
    public function showResetPasswordForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }
    public function resetPassword(Request $request)
    {
        // Handle password reset logic
    }
}
