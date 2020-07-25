<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bookable;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$suffix = [
    'Villa',
    'House',
    'Cottage',
    'Luxury Villas',
    'Cheap House',
    'Rooms',
    'Cheap Rooms',
    'Luxury Rooms',
    'Fancy Rooms',
];

$factory->define(Bookable::class, function (Faker $faker) use ($suffix) {
    return [
        'name' => $faker->city . ' ' . Arr::random($suffix),
        'description' => $faker->paragraph(3),
        'image' => $faker->imageUrl(480, 320, 'city', true),
        'price' => $faker->randomNumber(3),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
    ];
});
