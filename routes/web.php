<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArtistController;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
<<<<<<< HEAD
    Route::post('/gallery', 'gallery')->name('gallery');
    Route::get('/artist', 'artist_index')->name('artists.index');
    Route::post('/about', 'about')->name('about');
=======
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/artists', 'artists')->name('artists');
    Route::get('/about', 'about')->name('about');
>>>>>>> 52b626ceed1435536922ef497103b330738c62cc
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
Route::controller(ArtistController::class)->group(function () {
    Route::get('/dashboard', 'showDashboard')->name('dashboard');
});

Route::get('/artists', [ArtistController::class, 'index'])->name('artists');

