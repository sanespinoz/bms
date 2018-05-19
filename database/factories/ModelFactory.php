<?php

use App\EnergiaPiso;
use App\Piso;
use Faker\Generator;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(EnergiaPiso::class, function (Generator $faker) {
    return [
        'energia' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
        'pico' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
        'prom_tension' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
        'max_tension' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
        'min_tension' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
        'prom_corriente' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
        'energia_iluminacion' => $faker->randomDigitNotNull,
        'fecha' => $faker->date($format = 'Ymd', $max = 'now'),
        'piso_id' => $faker->idPiso,
        'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = null)


    ];
});

//Uso el EnergiaPisoTableSeeder