<?php

namespace App\Http\Controllers;

use App\Http\Resources\BreedResource;
use App\Models\Breed;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ApiBreedController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return BreedResource::collection(Breed::all());
    }
}
