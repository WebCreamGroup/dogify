<?php

namespace App\Models;

use App\Enums\AnimalEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'animal',
        'user_id',
        'breed_id',
        'name',
        'birth_date',
    ];

    protected $casts = [
        'animal' => AnimalEnum::class,
        'birth_date' => 'date',
    ];


    // Relationships

    public function breed(): BelongsTo
    {
        return $this->belongsTo(Breed::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
