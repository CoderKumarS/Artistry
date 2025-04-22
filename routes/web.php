<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ArtworkController;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/about', 'about')->name('about');
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
    Route::post('/submit-feedback', 'submit')->name('feedback.submit');
    Route::get('/artists', 'index')->name('artists');
    Route::get('/artist/{id?}', 'profile')->name('artist.profile');
    Route::get('/artist/{id?}/update', 'profileUpdate')->name('artist.update');
    Route::get('/artist/{id?}/create', 'create')->name('artist.create');
    Route::post('/artist/register', 'register')->name('artist.register');
});

Route::resource('/artworks', ArtworkController::class);

Route::prefix('dashboard')->controller(ArtistController::class)->group(function () {
    Route::get('/', 'showDashboard')->name('dashboard');
    Route::get('/paintings', 'showDashboard')->name('dashboard.paintings');
    Route::get('/comments', 'showDashboard')->name('dashboard.comments');
    Route::get('/analytics', 'showDashboard')->name('dashboard.analytics');
    Route::get('/settings', 'showDashboard')->name('dashboard.settings');
});

Route::get('/test-mongo', function () {
    try {
        $users = \App\Models\User::all();
        return response()->json($users);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
});