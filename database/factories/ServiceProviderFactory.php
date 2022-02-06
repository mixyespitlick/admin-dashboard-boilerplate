<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ServiceProvider;
use Faker\Generator as Faker;

$factory->define(ServiceProvider::class, function (Faker $faker) {
    return [
        'service_provider_type_id' => function () {
            return App\ServiceProviderType::inRandomOrder()->first()->id;
        },
        'name' => $faker->company(),
        'company' => $faker->company(),
        'address' => $faker->address(),
        'created_by' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
        'updated_by' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
    ];
});
