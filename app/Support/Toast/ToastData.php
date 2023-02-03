<?php

namespace App\Support\Toast;

use Spatie\LaravelData\Data;

class ToastData extends Data
{
    public function __construct(
        public ToastTypeEnum|string $type,
        public string $content,
    )
    {
    }
}
