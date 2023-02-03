<?php

namespace App\Support\Toast;

use BenSampo\Enum\Enum;

class ToastTypeEnum extends Enum
{
    public const INFO = 'info';
    public const SUCCESS = 'success';
    public const WARNING = 'warning';
    public const ERROR = 'error';
}
