<?php

namespace App\Http\Controllers;

use App\Enums\AnimalEnum;
use App\Models\Pet;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Http\Request;

class ApiPetController extends Controller
{
    public function store(Request $request): void
    {
        $data = $request->validate([
            'animal' => ['required', new EnumValue(AnimalEnum::class)],
            'breed_id' => 'required',
            'name' => 'required',
            'birth_date' => 'nullable|date',
        ]);

        Pet::create([
            'user_id' => auth()->id(),
            ...$data,
        ]);
    }

    public function show(Pet $pet)
    {
        dd($pet);
    }

    public function update(Request $request, Pet $pet)
    {
        dd($pet);
    }

    public function destroy(Pet $pet)
    {
        dd($pet);
    }
}
