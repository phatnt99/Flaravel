<?php

namespace App\Transformers;

use App\Flower;
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
    public function transform(Flower $flower)
    {
        return [
            'id' => $flower->id,
            'name' => $flower->name,
            'price' => $flower->price
        ];
    }

    public function includeFlowerCatalog(Flower $flower) {
        return $flower->flower_catalogs;
    }

}
