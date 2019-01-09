<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'location' => $faker->text(10),
        'description' => $faker->text(50),
        'date' => $faker->dateTimeBetween('+0 days', '+2 years')
    ];
});
