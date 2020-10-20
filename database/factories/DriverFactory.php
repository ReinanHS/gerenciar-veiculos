<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Driver;
use Faker\Generator as Faker;

$factory->define(Driver::class, function (Faker $faker) {
    $status = ['ativo', 'inativo'];
    return [
        'nome' => $faker->name,
        'rg' => random_int(1000000000, 9000000000),
        'cpf' => random_int(10000000000, 90000000000),
        'cnh' => random_int(10000000000, 90000000000),
        'validadeCNH' => $faker->date('Y-m-d'),
        'status' => $status[random_int(0, sizeof($status) -1)],
    ];
});
