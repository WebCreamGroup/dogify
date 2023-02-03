<?php

use App\Http\Controllers;
use App\Http\Livewire\Pages as LivewirePages;

Route::get('/', [Controllers\PublicController::class, 'landing'])->name('public.landing');
Route::get('/about', [Controllers\PublicController::class, 'about'])->name('public.about');

Route::group([
    'prefix' => '/blog'
], static function () {
    Route::get('/', [Controllers\BlogController::class, 'postsList'])->name('blog.posts-list');
});

Route::group([
    'prefix' => '/auth',
    'middleware' => 'guest',
], static function () {
    Route::get('/sign-in', [Controllers\AuthController::class, 'signIn'])->name('auth.sign-in');
    Route::get('/sign-up', [Controllers\AuthController::class, 'signUp'])->name('auth.sign-up');
});

Route::group([
    'prefix' => '/app',
    'middleware' => 'auth',
], static function () {
    Route::get('/', LivewirePages\AppDashboard::class)->name('app.dashboard');
    Route::get('/profile', LivewirePages\AppProfile::class)->name('app.profile');
});
