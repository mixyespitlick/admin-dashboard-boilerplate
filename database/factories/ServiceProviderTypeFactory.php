<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ServiceProviderType;
use Faker\Generator as Faker;

$factory->define(ServiceProviderType::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'description' => $faker->word(),
        'created_by' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
        'updated_by' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
    ];
});
