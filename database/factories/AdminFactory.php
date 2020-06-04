<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        //
        'username' => $faker->userName,
        'password' => $faker->password,
        'name' => $faker->name,
    ];
});
