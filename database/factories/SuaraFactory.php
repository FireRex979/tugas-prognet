<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Suara;
use Faker\Generator as Faker;

$factory->define(Suara::class, function (Faker $faker) {
    return [
        'suara' => $faker->name(),
    ];
});
