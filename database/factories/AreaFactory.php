<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Area;
use Faker\Generator as Faker;

$factory->define(Area::class, function (Faker $faker) {
    $area_name = ['north', 'south'];

    return [


        'name' => $area_name[rand(0, count($area_name) - 1)],
        'description' => $faker->word(),
        'created_by' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
        'updated_by' => function () {
            return App\User::inRandomOrder()->first()->id;
        },

    ];
});
