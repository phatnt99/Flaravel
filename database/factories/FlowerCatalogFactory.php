<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FlowerCatalog;
use Faker\Generator as Faker;

$factory->define(FlowerCatalog::class, function (Faker $faker) {
    return [
        //
        'name_catalog' => $faker->name,
        'parent_id' => null,
    ];
});
