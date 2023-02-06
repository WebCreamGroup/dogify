<?php

namespace App\Models;

use App\Enums\AnimalEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Breed extends Model
{
    use SoftDeletes, HasTranslations;

    protected $fillable = [
        'animal',
        'name',
    ];

    protected $casts = [
        'animal' => AnimalEnum::class,
        'name' => 'array',
    ];

    public array $translatable = [
        'name',
    ];


    // Relationships

    public function pets(): HasMany
    {
        return $this->hasMany(Pet::class);
    }
}
