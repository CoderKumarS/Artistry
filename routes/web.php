<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::post('/gallery', 'gallery')->name('gallery');
    Route::get('/artist', 'artist_index')->name('artists.index');
    Route::post('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register')->name('register.post');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/forgot-password', 'showForgotPasswordForm')->name('password.request');
    Route::post('/password/email', 'sendResetLinkEmail')->name('password.email');
});

