<?php

namespace App\Transformers;

use App\Flower;
use Flugg\Responder\Transformers\Transformer;
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


    public function loadFlowerCatalog($query) {
        return $query->whereNull('parent_id');
    }


    public function includeFlowerCatalog(Flower $flower) {
        return $flower->flower_catalogs;
    }

    /*
    public function filterFlowerCatalog($flowerCatalogs)
    {
        return $flowerCatalogs->filter(function ($flowerCatalog) {
            return is_null($flowerCatalog->parent_id);
        });
    }
    */

}
