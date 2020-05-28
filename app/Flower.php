<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Flower extends Model
{
    //
    public $incrementing = false;
    protected $fillable =[ 'catalog_id', 'name',
        'color',
        'price', 'discount',
        'image_link',
        'image_list',
        'view', 'votes'
    ];

    protected static function boot() {
        parent::boot();
        static::creating(function ($flower) {
            $flower->{$flower->getKeyName()} = (string) Str::uuid();
        });
    }

    public function flower_catalogs()
    {
        return $this->belongsTo('App\FlowerCatalog', 'catalog_id', 'id');
    }

    public function transactions()
    {
        return $this->belongsToMany('App\Transaction')->using('App\Order');
    }
}
