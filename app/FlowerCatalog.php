<?php

namespace App;

use App\Traits\uuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FlowerCatalog extends Model
{
    //
    use uuidTrait;
    // protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = ['name_catalog', 'parent_id'];

    protected static function boot() {
        parent::boot();
        //static::creating(function ($flowerCatalog) {
        //    $flowerCatalog->{$flowerCatalog->getKeyName()} = (string) Str::uuid();
        //});
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
