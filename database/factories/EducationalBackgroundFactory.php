<?php

use Faker\Generator as Faker;

$factory->define(App\EducationalBackground::class, function (Faker $faker) {
    return [
        'level' => $faker->word,
        'name_of_school' => $faker->sentence(3),
        'year_attended' => $faker->dateTime(),
        'honors_awards' => $faker->word,
        'user_id' => 1,
        'user_type' => 'App\Student',
    ];
});
