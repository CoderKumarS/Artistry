<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        // Handle login logic
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        // Handle registration logic
    }
    public function logout()
    {
        // Handle logout logic
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
