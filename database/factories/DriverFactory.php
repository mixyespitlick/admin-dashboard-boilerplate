<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Driver;
use Faker\Generator as Faker;

$factory->define(Driver::class, function (Faker $faker) {
    return [
        'fname' => $faker->firstName(),
        'lname' => $faker->lastName(),
        'created_by' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
        'updated_by' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
    ];
});
