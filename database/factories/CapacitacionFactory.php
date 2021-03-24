<?php

use App\Capacitacion;
use App\Tipo_Capacitacion;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Capacitacion::class, function (Faker $faker) {
    return [
        'codigo' => Str::random(10),
        'nombre' => $faker->name,
        'hr_pedagogicas' => $faker->unique(true)->numberBetween(1, 150),
        'tipo_capacitacion_id' => '1',
    ];
});
 