<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('12345678'),
        'remember_token' => str_random(10),
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