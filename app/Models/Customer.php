<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Customer extends Model
{
    //
    public $incrementing = false;

    protected static function boot() {
        parent::boot();
        static::creating(function ($customer) {
            $customer->{$customer->getKeyName()} = (string) Str::uuid();
        });
    }
    public function transactions()
    {
        return $this->hasMany("App\Transaction");
    }
}
