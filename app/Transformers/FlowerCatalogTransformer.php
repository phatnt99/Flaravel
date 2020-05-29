<?php

namespace App\Transformers;

use App\FlowerCatalog;
use Flugg\Responder\Transformers\Transformer;

class FlowerCatalogTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'flowers' => FlowerTransformer::class
    ];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param  \App\FlowerCatalog $flowerCatalog
     * @return array
     */
    public function transform(FlowerCatalog $flowerCatalog)
    {
        return [
            'id' => $flowerCatalog->id,
            'name_catalog' => $flowerCatalog->name_catalog,
            'parent_id' => $flowerCatalog->parent_id
        ];
    }

    public function transformWithoutParentId(FlowerCatalog $flowerCatalog) {
        return [
            'id' => $flowerCatalog->id,
            'name_catalog' => $flowerCatalog->name_catalog,
        ];
    }
    public function includeFLowers(FlowerCatalog $flowerCatalog) {
        return $flowerCatalog->flower();
    }



}
