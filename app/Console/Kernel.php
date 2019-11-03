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
    \App\Console\Commands\TendenciaPisoCero::class,
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
    \App\Console\Commands\ActivacionesPisoTres::class,
    \App\Console\Commands\MostrarAlarmas::class,
    \App\Console\Commands\AlarmasCero::class,     
    \App\Console\Commands\AlarmasUno::class,
    \App\Console\Commands\AlarmasDos::class,
    \App\Console\Commands\AlarmasTres::class,
    \App\Console\Commands\ContadorPersonasCero::class,
    \App\Console\Commands\ContadorPersonasUno::class,
    \App\Console\Commands\ContadorPersonasDos::class,
    \App\Console\Commands\ContadorPersonasTres::class,
    \App\Console\Commands\CopiaBD::class,
   // \App\Console\Commands\VaciarTabla::class,

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

      $schedule->command('energia:cero')->hourly();
      $schedule->command('energia:uno')->hourly();
      $schedule->command('energia:dos')->hourly();
      $schedule->command('energia:tres')->hourly();
      $schedule->command('hsactivas:cero')->hourly();
      $schedule->command('hsactivas:uno')->hourly();
      $schedule->command('hsactivas:dos')->hourly();
      $schedule->command('hsactivas:tres')->hourly();
      $schedule->command('activaciones:cero')->hourly();
      $schedule->command('activaciones:uno')->hourly();
      $schedule->command('activaciones:dos')->hourly();
      $schedule->command('activaciones:tres')->hourly();
      $schedule->command('alarmas:cero')->everyTenMinutes();//CADA 10 MIN EMPIEZA 00:11 AM???
      $schedule->command('alarmas:uno')->everyTenMinutes();
      $schedule->command('alarmas:dos')->everyTenMinutes();
      $schedule->command('alarmas:tres')->everyTenMinutes();
      $schedule->command('contar:cero')->dailyAt('22:00');//->dailyAt('22:00');
      $schedule->command('contar:uno')->dailyAt('22:00');
      $schedule->command('contar:dos')->dailyAt('22:00');
      $schedule->command('contar:tres')->dailyAt('22:00');
      $schedule->command('copia:bd')->dailyAt('22:45');


//Backup de archivos en local
      $schedule->command('backup:clean')->weekly()->sundays()->at('22:30');
      $schedule->command('backup:run --only-files')->weekly()->sundays()->at('23:00');


  // Vaciar la tabla Netx Historical Value
     // $schedule->command('vaciar:tabla')->weekly()->sundays()->at('01:00');
    }
  }
