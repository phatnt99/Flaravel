<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait uuidTrait {
    public static function bootUuidTrait() {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }
}
