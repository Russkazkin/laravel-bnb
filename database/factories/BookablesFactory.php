<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bookable;
use Faker\Generator as Faker;

$factory->define(Bookable::class, function (Faker $faker) {
    return [
        'name' => 'Villa ' . $faker->name,
        'description' => $faker->paragraph(5),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
    ];
});
