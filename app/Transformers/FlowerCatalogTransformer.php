<?php

namespace App\Transformers;

use App\Models\FlowerCatalog;
use Flugg\Responder\Transformers\Transformer;

class FlowerCatalogTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
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




}
