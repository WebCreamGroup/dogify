<?php

namespace App\Http\Controllers;

use App\Enums\AnimalEnum;
use App\Models\Breed;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PetsController extends Controller
{
    public function index()
    {
        /** @var Collection<Pet> $pets */
        $pets = auth()->user()?->pets()->where('animal', AnimalEnum::DOG)->with('breed')->latest()->get();
        $breeds = $pets->map(fn(Pet $pet) => $pet->breed)->unique();

        return inertia('app/pet/Index', compact('pets', 'breeds'));
    }

    public function create()
    {
        return inertia()->modal('DogModal', ['breeds' => Breed::all()]);
    }

    public function store(Request $request)
    {
        dd('store');
    }

    public function show(Pet $pet)
    {
        dd('show');
    }

    public function edit(Pet $pet)
    {
        return inertia()->modal('DogModal', ['pet' => $pet, 'breeds' => Breed::all()]);
    }

    public function update(Request $request, Pet $pet)
    {
        dd('update');
    }

    public function destroy(Pet $pet)
    {
        dd('destroy');
    }
}
