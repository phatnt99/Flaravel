<?php

namespace App\Models;

use App\Scopes\FlowerScope;
use App\Traits\uuidTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Flower extends Model
{
    //
    use uuidTrait;

    public $incrementing = false;
    protected $fillable =[ 'catalog_id', 'name',
        'color',
        'price', 'discount',
        'image_link',
        'image_list',
        'view', 'votes'
    ];

    // for varible defined by Accessor
    protected $appends = ['final_price'];

    //for casting
    protected $casts = [
        'created_at' => 'datetime:d-m-Y'
    ];

    protected static function boot() {
        parent::boot();
        //static::creating(function ($flower) {
        //   $flower->{$flower->getKeyName()} = (string) Str::uuid();
        //});

    }

    protected static function booted() {
        //static::addGlobalScope(new FlowerScope);

        //or using closure
        static::addGlobalScope('FlowerScope', function (Builder $builder) {
            $builder->whereNotNull('image_link');
        });
    }

    //Local scope, Dynamic scope
    public function scopeTopPrice($query, $level) {
        return $query->where('price', '>', $level);
    }

    public function flowerCatalog()
    {
        return $this->belongsTo('App\FlowerCatalog', 'catalog_id', 'id');
    }

    public function transactions()
    {
        return $this->belongsToMany('App\Transaction')->using('App\Order');
    }

    //Accessors
    public function getFinalPriceAttribute() {
        return $this->price * $this->discount / 100;
    }

    //Mutators
    public function setImageLinkAttribute($value) {
        //if image_link is null, set it to default image link values: https://default.image
        if($value == null) {
            $this->attributes['image_link'] = 'https://default.image';
        }
        else {
            $this->attributes['image_link'] = $value;
        }

        //if($value == null)
            //$this->attributes['image_link'] = 'https://default.image';

    }
}
