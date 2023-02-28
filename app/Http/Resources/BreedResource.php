<?php

namespace App\Http\Resources;

use App\Models\Breed;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Breed */
class BreedResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'animal' => $this->animal,
            'name' => $this->name,
        ];
    }
}
