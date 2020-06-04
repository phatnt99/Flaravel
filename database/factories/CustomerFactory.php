<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'email_verified_at' => now(),
        'password' => $faker->password,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
    ];
});
