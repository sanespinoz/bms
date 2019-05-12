<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

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

/*
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
'energia' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 10),
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
'energia'             => $ene,
'pico'                => $faker->randomFloat($nbMaxDecimals = 2, $min = $ene, $max = 11),

'prom_tension'        => $pten,
'max_tension'         => $faker->randomFloat($nbMaxDecimals = 2, $min = $pten, $max = 234),
'min_tension'         => $faker->randomFloat($nbMaxDecimals = 2, $min = 192, $max = $pten),
'prom_corriente'      => $pc,
'energia_iluminacion' => $faker->$faker->randomFloat($nbMaxDecimals = 2, $min = 0.20, $max = 1.54),

 */
        // $year   = 2019;
        //$month  = 1;
        // $day    = 1;
        //$hour   = 12;
        //$minute = 01;
        //$second = 01;
        //$tz     = "America/Argentina/Buenos_Aires";
        //$fechaInicio = Carbon::create($year, $month, $day, $hour, $minute, $second, $tz);
        $fechaInicio = Carbon::create(2016, 1, 1, 0);
        //   $fi             = $fechaInicio->toDateTimeString();
        $fechaFin = Carbon::create(2016, 12, 31, 23);
        // $ff             = $fechaFin->toDateTimeString();
        //   $fechaIntervalo = $fechaInicio->addSeconds(3600);
        // $fint           = $fechaIntervalo->toDateTimeString();
        // dd($fi, $ff, $fint);
        //strtotime("now");echo date("Y-m-d", $i)."<br>";
        while ($fechaInicio < $fechaFin) {

            $fi   = $fechaInicio->toDateTimeString();
            $ene  = $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 10);
            $pc   = round(($ene / 220), 2);
            $pten = $faker->randomFloat($nbMaxDecimals = 2, $min = 212, $max = 225);
            //$ll   = $i;

            \DB::table('energia_pisos')->insertGetId(array(
                'energia'             => $ene,
                'pico'                => $faker->randomFloat($nbMaxDecimals = 2, $min = $ene, $max = 11),

                'prom_tension'        => $pten,
                'max_tension'         => $faker->randomFloat($nbMaxDecimals = 2, $min = $pten, $max = 234),
                'min_tension'         => $faker->randomFloat($nbMaxDecimals = 2, $min = 192, $max = $pten),
                'prom_corriente'      => $pc,
                'energia_iluminacion' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.20, $max =  < $ene),

                'fecha'               => $fi,
                'piso_id'             => 66,
                'created_at'          => $fi,
                'updated_at'          => $fi,
            ));

            $fechaInicio = $fechaInicio->addHour();

        };

    }
}
