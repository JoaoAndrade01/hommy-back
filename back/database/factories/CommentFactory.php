<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'commentary' => $faker->sentence($nbWords = 1, $variableNbWords = true)
    ];
});
