<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations as BaseTrait;

/**
 * @mixin Model
 */
trait HasTranslations
{
    use BaseTrait;

    public function toArray()
    {
        /** @noinspection PhpUndefinedClassInspection */
        $attributes = parent::toArray();

        foreach ($this->getTranslatableAttributes() as $field) {
            $attributes[$field] = $this->getTranslation($field, app()->getLocale());
        }

        return $attributes;
    }
}
