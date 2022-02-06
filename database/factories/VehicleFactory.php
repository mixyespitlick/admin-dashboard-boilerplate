<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vehicle;
use Faker\Generator as Faker;

$factory->define(Vehicle::class, function (Faker $faker) {
    $vehicle_reg = $faker->unique()->vehicleRegistration;
    return [
        'vehicle_type_id' => function () {
            return App\VehicleType::inRandomOrder()->first()->id;
        },
        'plate_no' => $vehicle_reg,
        'body_no' => $vehicle_reg,
        'tare' => $faker->numberBetween(1500, 2300),
        'created_by' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
        'updated_by' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
    ];
});
