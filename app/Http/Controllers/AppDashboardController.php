<?php

namespace App\Http\Controllers;

use App\Enums\AnimalEnum;

class AppDashboardController extends Controller
{
    public function __invoke()
    {
        $pets = auth()->user()?->pets()->where('animal', AnimalEnum::DOG)->get();

        return inertia('app/Dashboard', compact('pets'));
    }
}
