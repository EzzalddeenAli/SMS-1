<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    static $password;

    return [
        "username" => $faker->name,
        "password" => $password ?: $password = bcrypt('12345678'),
        "first_name" => $faker->name,
        "middle_name" => $faker->name,
        "last_name" => $faker->name,
    ];
});

$factory->define(App\Registrar::class, function (Faker $faker) {
    static $password;

    return [
        "username" => $faker->name,
        "password" => $password ?: $password = bcrypt('12345678'),
        "first_name" => $faker->name,
        "middle_name" => $faker->name,
        "last_name" => $faker->name,
        "age" => $faker->numberBetween(5, 40),
    ];
});

$factory->define(App\Teacher::class, function (Faker $faker) {
    static $password;

    return [
        "username" => $faker->name,
        "password" => $password ?: $password = bcrypt('12345678'),
        "first_name" => $faker->name,
        "middle_name" => $faker->name,
        "last_name" => $faker->name,
        "age" => $faker->numberBetween(5, 40),
        "advisory" => 1,
    ];
});

$factory->define(App\Student::class, function (Faker $faker) {
    static $password;

    return [
        "username" => $faker->name,
        "password" => $password ?: $password = bcrypt('12345678'),
        "first_name" => $faker->name,
        "middle_name" => $faker->name,
        "last_name" => $faker->name,
        "age" => $faker->numberBetween(0, 30),
        "section_id" => function () {
            return factory(App\Section::class)->create()->id;
        },
    ];
});

