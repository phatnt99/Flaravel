<?php

namespace App\Transformers;

use App\Models\Flower;
use Flugg\Responder\Transformers\Transformer;

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
    public function transform($flower)
    {
        return $flower;
    }

    public function loadFlowerCatalog($query) {
        return $query->where('name_catalog', 'LIKE', '%World%');
    }

    public function getCustomCollection($flower) {
        return $flower->map(function ($item, $key) {
            return ['id' => $item->id, 'name' => $item->name, 'price' => $item->price];
        });
    }

    /*

    public function filterFlowerCatalog($flowerCatalog)
    {
        return $flowerCatalog->filter(function ($flowerC) {
            return is_null($flowerC->parent_id);
        });
    }
    */
}
