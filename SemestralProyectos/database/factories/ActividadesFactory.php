<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Actividade;
use Faker\Generator as Faker;

$factory->define(Actividade::class, function (Faker $faker) {
    return [
        'actividad'=> "Distribuir roles",
        'tiempo'=>5,
        'tiempo_total'=> null,
        'proyecto_id'=> 1,

    ];
});
