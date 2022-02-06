<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CollectionPoint;
use Faker\Generator as Faker;

$factory->define(CollectionPoint::class, function (Faker $faker) {
    return [
        'area_id' => function () {
            return App\Area::inRandomOrder()->first()->id;
        },
        'name' => $faker->unique()->streetName(),
        'description' => $faker->streetName(),
        'created_by' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
        'updated_by' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
    ];
});
