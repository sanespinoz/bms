<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

class ContadorPersonasUno extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contar:uno';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando Promedia la cant de personas en cada sector una vez al día';

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
//Sector A3N
        $prompersonas = DB::connection('netx')
            ->table('dbo.NETX_DEFINITION')
            ->select(DB::raw('AVG(NUM_VALUE) as pp'))
            ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
            ->where('ITEMID', 'like', '%NETx\VIRTUAL\BMS\Personas\Contador\Piso 1\A3N%')
            ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
            ->get();
        foreach ($prompersonas as $e) {
            $prompersons = (int) $e->pp;
        };

        //dd($prompersons);

        $piso = DB::table('pisos')->select('id')->where('nombre', '=', 'Piso 1')->get();

        foreach ($piso as $p) {
            $piso_id = $p->id;
            // $piso_id=(int)$p->id;
            // dd($piso_id);
        }
//Actualizo
        // dd($piso_id);

        DB::table('sectores')->select('id')
            ->where('piso_id', $piso_id)
            ->where('nombre', 'A3N')
            ->update(['cant_personas' => $prompersons]);

        \Log::info('Contador personas' . '' . $prompersons . '' . \Carbon\Carbon::now());

        //Sector A3S
        $prompersonas = DB::connection('netx')
            ->table('dbo.NETX_DEFINITION')
            ->select(DB::raw('AVG(NUM_VALUE) as pp'))
            ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
            ->where('ITEMID', 'like', '%NETx\VIRTUAL\BMS\Personas\Contador\Piso 1\A3S%')
            ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
            ->get();
        foreach ($prompersonas as $e) {
            $prompersons = (int) $e->pp;
        };

        $piso = DB::table('pisos')->select('id')->where('nombre', '=', 'Piso 1')->get();

        foreach ($piso as $p) {
            $piso_id = $p->id;

        }
//Actualizo

        DB::table('sectores')->select('id')
            ->where('piso_id', $piso_id)
            ->where('nombre', 'A3S')
            ->update(['cant_personas' => $prompersons]);

        \Log::info('Contador personas' . '' . $prompersons . '' . \Carbon\Carbon::now());

        //Sector A4S
        $prompersonas = DB::connection('netx')
            ->table('dbo.NETX_DEFINITION')
            ->select(DB::raw('AVG(NUM_VALUE) as pp'))
            ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
            ->where('ITEMID', 'like', '%NETx\VIRTUAL\BMS\Personas\Contador\Piso 1\A4S%')
            ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
            ->get();
        foreach ($prompersonas as $e) {
            $prompersons = (int) $e->pp;
        };

        $piso = DB::table('pisos')->select('id')->where('nombre', '=', 'Piso 1')->get();

        foreach ($piso as $p) {
            $piso_id = $p->id;

        }
//Actualizo

        DB::table('sectores')->select('id')
            ->where('piso_id', $piso_id)
            ->where('nombre', 'A4S')
            ->update(['cant_personas' => $prompersons]);

        \Log::info('Contador personas' . '' . $prompersons . '' . \Carbon\Carbon::now());

        //Sector A4N
        $prompersonas = DB::connection('netx')
            ->table('dbo.NETX_DEFINITION')
            ->select(DB::raw('AVG(NUM_VALUE) as pp'))
            ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
            ->where('ITEMID', 'like', '%NETx\VIRTUAL\BMS\Personas\Contador\Piso 1\A4N%')
            ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
            ->get();
        foreach ($prompersonas as $e) {
            $prompersons = (int) $e->pp;
        };

        $piso = DB::table('pisos')->select('id')->where('nombre', '=', 'Piso 1')->get();

        foreach ($piso as $p) {
            $piso_id = $p->id;

        }
//Actualizo

        DB::table('sectores')->select('id')
            ->where('piso_id', $piso_id)
            ->where('nombre', 'A4N')
            ->update(['cant_personas' => $prompersons]);

        \Log::info('Contador personas' . '' . $prompersons . '' . \Carbon\Carbon::now());
    }
}
