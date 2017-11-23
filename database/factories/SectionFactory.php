<?php

use Faker\Generator as Faker;

$factory->define(App\Section::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'level_id' => function () {
            return factory(App\Level::class)->create()->id;
        }
    ];
});
