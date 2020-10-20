<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Vehicle;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Vehicle::class, function (Faker $faker) {

    $status = ['disponível', 'quebrado', 'manutenção'];

    return [
        'placa' => Str::random(3)."".random_int(100, 999),
        'modelo' => $faker->state,
        'marca' => $faker->company,
        'status' => $status[random_int(0, 2)],
        'chassi' => Str::random(17),
    ];
});
