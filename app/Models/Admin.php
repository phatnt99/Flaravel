<?php

namespace App\Models;

use App\Traits\uuidTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Admin extends Authenticatable
{
    //
    use Notifiable, uuidTrait;

    public $incrementing = false;

    protected $guard = 'admin';

    public $fillable = ['name', 'email', 'password'];

    protected static function boot() {
        parent::boot();
        static::creating(function ($admin) {
            $admin->{$admin->getKeyName()} = (string) Str::uuid();
        });
    }
}
