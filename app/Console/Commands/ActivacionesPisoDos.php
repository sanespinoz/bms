<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ActivacionesPisoDos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'activaciones:dos';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando lee la cant de activaciones en el Piso 2';
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
