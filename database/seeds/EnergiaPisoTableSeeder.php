<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class EnergiaPisoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();



            $ide = \DB::table('edificios')->insertGetId(array(
                'nombre'=> $faker->firstName,
                'descripcion' =>$faker->firstName,
                'telefono'=>$faker->randomDigitNotNull,
                'direccion'=>$faker->address,
                'email' =>$faker->unique()->email,
                'provincia' =>$faker->state,
                'ciudad' =>$faker->city,
                'codigo' =>$faker->randomDigitNotNull,
                'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
            ));

        for($i=1; $i < 4; $i ++) {
            $id = \DB::table('pisos')->insertGetId(array(
                'nombre' => $faker->firstName,
                'descripcion' => $faker->firstName,
                'edificio_id' => $ide,
                'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
            ));
        };
        for($i=0; $i < 30; $i ++)
        {

            \DB::table('energia_pisos')->insertGetId(array(
                'energia' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
                'pico' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
                'prom_tension' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
                'max_tension' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
                'min_tension' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
                'prom_corriente' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
                'energia_iluminacion' => $faker->randomDigitNotNull,
                'fecha' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
                'piso_id' => $id,
                'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)

            ));


        };
    }
}
