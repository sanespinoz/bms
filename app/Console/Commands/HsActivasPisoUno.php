<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HsActivasPisoUno extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hsactivas:uno';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando lee la cant de hs activas en los grupos del piso 1';
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
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {

    }
}
