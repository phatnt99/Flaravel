<?php

namespace App\Transformers;

use App\Flower;
use Flugg\Responder\Transformers\Transformer;
use Illuminate\Database\Eloquent\Builder;
use function foo\func;

class FlowerTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'flowerCatalog' => FlowerCatalogTransformer::class
    ];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [
    ];

    /**
     * Transform the model.
     *
     * @param  \App\Flower $flower
     * @return array
     */
    public function transform(Flower $flower)
    {
        return [
            'id' => $flower->id,
            'name' => $flower->name,
            'price' => $flower->price
        ];
    }


    /**
     *
     *
     * @param  Builder $query
     * @return Builder
     */

    public function includeFlowerCatalog(Flower $flower) {
        return $flower->flower_catalogs;
    }

    /*
    public function loadFlowerCatalog($query) {
        return $query->where('name_catalog', '=', 'Dr. Dewitt Schumm DVM');
    }
    */
    /*

    public function filterFlowerCatalog($flowerCatalog)
    {
        return $flowerCatalog->filter(function ($flowerC) {
            return is_null($flowerC->parent_id);
        });
    }
    */
}
