<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Participante;
use Faker\Generator as Faker;

$factory->define(Participante::class, function (Faker $faker) {
    return [

        'nombre_participante' => "Juan Torres",
        'cedula_participante' => "8-978-788",
        'proyecto_id' => 1,
        'telefono_participante' => "33334444",
        'telefono_residencial_p' => "3333444",

    ];
});
