<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AlarmasTres extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alarmas:tres';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando lee las alarmas en los grupos del piso 3';
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
