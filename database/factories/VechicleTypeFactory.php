<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\VehicleType;
use Faker\Generator as Faker;

$factory->define(VehicleType::class, function (Faker $faker) {

    $faker->addProvider(new \Faker\Provider\Fakecar($faker));

    return [
        // 'name' => $faker->unique(true)->vehicleType,
        'name' => $faker->unique()->vehicleType,
        'description' => $faker->word(),
        'created_by' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
        'updated_by' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
    ];
});
