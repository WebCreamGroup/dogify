<?php

namespace App\Http\Controllers;

use App\Enums\AnimalEnum;
use App\Models\Pet;
use Illuminate\Support\Collection;

class AppDashboardController extends Controller
{
    public function __invoke()
    {
        /** @var Collection<Pet> $pets */
        $pets = auth()->user()?->pets()->where('animal', AnimalEnum::DOG)->with('breed')->latest()->get();
        $breeds = $pets->map(fn(Pet $pet) => $pet->breed)->unique();

        return inertia('app/Dashboard', compact('pets', 'breeds'));
    }
}
