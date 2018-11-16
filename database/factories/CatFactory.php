<?php

use Faker\Generator as Faker;
use App\Model\Cat;

$factory->define(App\Cat::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'age' => rand(1, 20),
        'weight' => rand(1, 15),
        'amount_of_legs' => rand(1, 4)
    ];
});
