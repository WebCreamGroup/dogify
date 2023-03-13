<?php

use App\Http\Controllers;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localizationRedirect', 'localeViewPath'],
], static function () {
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
        'prefix' => '/app/profile',
        'middleware' => 'auth',
    ], static function () {
        Route::get('/', [Controllers\AppProfileController::class, 'view'])->name('app.profile-view');
        Route::post('/data', [Controllers\AppProfileController::class, 'saveUserData'])->name('app.profile-save-userdata');
        Route::post('/password', [Controllers\AppProfileController::class, 'updateUserPassword'])->name('app.profile-update-password');
    });

    Route::group([
        'prefix' => '/app',
        'middleware' => 'auth',
    ], static function () {
        Route::get('/', [Controllers\PetsController::class, 'index'])->name('app.dashboard');

        // Route::apiResource('breeds', Controllers\ApiBreedController::class)->only('index');
        // Route::apiResource('pets', Controllers\ApiPetController::class)->except('index');

        Route::resource('pets', Controllers\PetsController::class)->except(['index']);
    });
});
