<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        /* \App\Console\Commands\TendenciaPisoCero::class,
        \App\Console\Commands\TendenciaPisoUno::class,
        \App\Console\Commands\TendenciaPisoDos::class,
        \App\Console\Commands\TendenciaPisoTres::class,

        \App\Console\Commands\HsActivasPisoCero::class,
        \App\Console\Commands\HsActivasPisoUno::class,
        \App\Console\Commands\HsActivasPisoDos::class,
        \App\Console\Commands\HsActivasPisoTres::class,
        \App\Console\Commands\ActivacionesPisoCero::class,
        \App\Console\Commands\ActivacionesPisoUno::class,
        \App\Console\Commands\ActivacionesPisoDos::class,
        \App\Console\Commands\ActivacionesPisoTres::class,*/
        // \App\Console\Commands\MostrarAlarmas::class,
        \App\Console\Commands\AlarmasCero::class,
        /* \App\Console\Commands\AlarmasUno::class,
    \App\Console\Commands\AlarmasDos::class,
    \App\Console\Commands\AlarmasTres::class,
    \App\Console\Commands\ContadorPersonasCero::class,
    \App\Console\Commands\ContadorPersonasUno::class,
    \App\Console\Commands\ContadorPersonasDos::class,
    \App\Console\Commands\ContadorPersonasTres::class,
    \App\Console\Commands\VaciarTabla::class,*/

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        /*$schedule->command('read:energia')
        ->hourly();*/
        // $schedule->command('log:demo')->everyMinute();
        //$schedule->command('energia:cero');
        //$schedule->command('energia:uno');
        // $schedule->command('energia:dos');
        // $schedule->command('energia:tres');
        // $schedule->command('hsactivas:cero');
        //$schedule->command('hsactivas:uno');
        ////$schedule->command('hsactivas:dos');
        /////$schedule->command('hsactivas:tres');
        //$schedule->command('activaciones:cero');
        //  $schedule->command('activaciones:uno');
        // $schedule->command('activaciones:dos');
        // $schedule->command('activaciones:tres');
        //$schedule->command('mostrar:alarmas');
        $schedule->command('alarmas:cero'); // CADA 10 MIN EMPIEZA 00:11 AM???
        /* $schedule->command('alarmas:uno');
    $schedule->command('alarmas:dos');
    $schedule->command('alarmas:tres');
    $schedule->command('contar:cero');
    $schedule->command('contar:uno');
    $schedule->command('contar:dos');
    $schedule->command('contar:tres');
    $schedule->command('vaciar:tabla');->los domingos a las 23:30*/

    }
}
