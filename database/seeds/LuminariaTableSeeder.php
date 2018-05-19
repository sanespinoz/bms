<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LuminariaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        $tipo = ['t','p','d'];

        for($i=0; $i < 30; $i ++)
        {

            \DB::table('luminarias')->insertGetId(array(
                'identificacion' => $faker->firstName,,
                'codigo' => $faker->firstName,
                'nombre' => $faker->firstName,,
                'tipo' => $faker->randomElement($tipo),
                'descripcion' => $faker->firstName,
                'dimensiones' => $faker->randomDigitNotNull,
                'voltaje_nominal' => $faker->randomDigitNotNull,
                'potencia_nominal' => $faker->randomDigitNotNull,
                'corriente_nominal' => $faker->randomDigitNotNull,
                'fecha_alta' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = '-2 years', $timezone = null),
                'fecha_baja' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
                'vida_util' => $faker->numberBetween($min = 8760, $max = 17520),
                'estado' =>randomElement($array = array ('a','b','m')),
                'grupo_id' =>randomElement($array = array ('a','b','m')),
                'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = '-2 years', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null)

            ));


        };
    }
}
