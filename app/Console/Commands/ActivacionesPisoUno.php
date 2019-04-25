<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ActivacionesPisoUno extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'activaciones:uno';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando lee la cant de activaciones en el piso 1';
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
