<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

class VaciarTabla extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vaciar:tabla';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando trunca la tabla NETX_HISTORICAL_VALUE de la bd netx una vez por semana.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::connection('netx')
            ->table('dbo.NETX_HISTORICAL_VALUE')
            ->truncate();

        \Log::info('truncar tabla NETX_HISTORICAL_VALUE' . \Carbon\Carbon::now());
    }
}
