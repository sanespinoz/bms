<?php

namespace App\Console;
use DB;
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
        //\App\Console\Commands\TendenciaPisoDos::class,
        //\App\Console\Commands\TendenciaPisoTres::class,
    
        //\App\Console\Commands\Energy::class,      
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /*$filePath = url('/')."cronenergia.txt";
        $schedule->call(function () {
          $EnergiasRead =DB::connection('netx')->select(HANDLE)->from(dbo.NETX_DEFINITION)->where('ITEMID', 'like', '%iluminacion%');
        })->hourly()->sendOutputTo($filePath);

*/


       /*$schedule->command('read:energia')
           ->hourly();*/
           // $schedule->command('log:demo')->everyMinute();
            
         
            $schedule->command('energia:cero');
            $schedule->command('energia:uno');
          //  $schedule->command('energia:dos');
           // $schedule->command('energia:tres');
          
    }
}
