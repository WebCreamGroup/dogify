<?php

use App\Http\Controllers;

Route::get('/', [Controllers\PublicController::class, 'landing'])->name('public.landing');
Route::get('/about', [Controllers\PublicController::class, 'about'])->name('public.about');

Route::get('/blog', [Controllers\BlogController::class, 'blog'])->name('public.blog');

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
    Route::get('/', Controllers\AppDashboardController::class)->name('app.dashboard');
});
