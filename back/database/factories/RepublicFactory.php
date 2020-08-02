<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Republic;
use Faker\Generator as Faker;

$factory->define(Republic::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'street' => $faker->streetName,
        'neighborhood' => $faker->secondaryAddress ,
        'city' => $faker->city,
        'state' => $faker->state,
        'number' => $faker->buildingNumber,
        'size' => $faker->numberBetween($min = 50, $max = 300),
        'bedrooms' => $faker->randomDigitNotNull,
        'livingRoom' => $faker->randomDigit,
        'bathrooms' => $faker->randomDigit,
        'kitchens' => $faker->randomDigit,
        'garages' => $faker->randomDigit,
        'user_id' => factory('App\User')->create()->id
    ];
});
