<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

class CopiaBD extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'copia:bd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando Copia en otro disco la bd iluminacion una vez por día.';

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
        DB::connection('sqlsrv');
        DB::statement('BACKUP DATABASE ILUMINACION TO MyBackup');

        \Log::info('COPIA_ILUMINACION ' . \Carbon\Carbon::now());
    }
}
