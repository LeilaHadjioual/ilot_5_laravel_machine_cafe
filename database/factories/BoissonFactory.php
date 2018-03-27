<?php

use Faker\Generator as Faker;

$factory->define(\App\Boisson::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => (mt_rand(2, 10))*10,
    ];
});
