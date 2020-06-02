<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FlowerCatalog extends Model
{
    //

    // protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = ['name_catalog', 'parent_id'];

    protected static function boot() {
        parent::boot();
        static::creating(function ($flowerCatalog) {
            $flowerCatalog->{$flowerCatalog->getKeyName()} = (string) Str::uuid();
        });
    }

    public function flowers()
    {
        return $this->hasMany("App\Flower", 'catalog_id');
    }

    //Accessors
    public function getNameCatalogAttribute($value) {
        return 'Your data is ' . $value;
    }
}
