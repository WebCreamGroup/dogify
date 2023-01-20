<?php

use App\Http\Controllers;

Route::get('/', [Controllers\PublicController::class, 'landing'])->name('public.landing');
Route::get('/about', [Controllers\PublicController::class, 'about'])->name('public.about');
