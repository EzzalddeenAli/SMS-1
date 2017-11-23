<?php

use Faker\Generator as Faker;

$factory->define(App\department::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
