<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

class TendenciaPisoCero extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'energia:cero';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando lee la energía consumida en el piso 0';

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
//ENERGIA ACUMULADA DURANTE LA ULTIMA HORA
        $energias = DB::connection('netx')
            ->table('dbo.NETX_DEFINITION')
            ->select(DB::raw('MAX(NUM_VALUE) as ener'), DB::raw('DATEPART(HOUR,[LOCAL_DATE]) as hora'))
            ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
            ->where('ITEMID', 'like', '%NETx\VIRTUAL\BMS\Energia\Piso 0\Energia%')
            ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
            ->groupBy(DB::raw('DATEPART(HOUR,[LOCAL_DATE])'))
            ->get();
        foreach ($energias as $e) {
            $energia = $e->ener;
            $h       = $e->hora;
        };
        // dd($energias);

        $piso = DB::table('pisos')->select('id')->where('nombre', ' = ', 'Piso 0')->get();

        foreach ($piso as $p) {
            $piso_id = $p->id;
            // $piso_id=(int)$p->id;
            // dd($piso_id);
        }
        //PICO

        $potencias = DB::connection('netx')
            ->table('dbo.NETX_DEFINITION')
            ->select(DB::raw('MAX(NUM_VALUE) as pot'), DB::raw('DATEPART(HOUR,[LOCAL_DATE]) as hora'))
            ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
            ->where('ITEMID', 'like', '%NETx\VIRTUAL\BMS\Energia\Piso 0\iluminacion\Potencia Max%')
            ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
            ->groupBy(DB::raw('DATEPART(HOUR,[LOCAL_DATE])'))
            ->get();
        foreach ($potencias as $e) {
            $potencia = $e->pot;
        };
        //dd($potencia);
        //PROM TENSION Piso 0

        $tensiones = DB::connection('netx')
            ->table('dbo.NETX_DEFINITION')
            ->select(DB::raw('avg(NUM_VALUE) as promtension'), DB::raw('MAX(NUM_VALUE) as maxtension'), DB::raw('MIN(NUM_VALUE) as mintension'), DB::raw('DATEPART(HOUR,[LOCAL_DATE]) as hora'))
            ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
            ->where('ITEMID', 'like', '%NETx\XIO\Modbus\PM 3200 0\Holding Registers\3027%')
            ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
            ->groupBy(DB::raw('DATEPART(HOUR,[LOCAL_DATE])'))
            ->get();
        foreach ($tensiones as $e) {
            $promt = $e->promtension;
            $maxt  = $e->maxtension;

            $mint = $e->mintension;

        };
        //dd($promt, $maxt, $mint);

        //ENERGIA ILUMINACION PISO 0

        $energiailu = DB::connection('netx')
            ->table('dbo.NETX_DEFINITION')
            ->select(DB::raw('MAX(NUM_VALUE) as eilu'), DB::raw('DATEPART(HOUR, [LOCAL_DATE]) as hora'))
            ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', ' = ', 'NETX_HISTORICAL_VALUE.handle')
            ->where('ITEMID', 'like', '%NETx\VIRTUAL\BMS\Energia\Piso 0\iluminacion\Energia%')
            ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
            ->groupBy(DB::raw('DATEPART(HOUR, [LOCAL_DATE])'))
            ->get();
        foreach ($energiailu as $e) {
            $energiailum = $e->eilu;
        };
        //dd($energiailum);

        //PROM CORRIENTE Piso 0
        $promcorriente = DB::connection('netx')
            ->table('dbo.NETX_DEFINITION')
            ->select(DB::raw('AVG (NUM_VALUE) as F1'), DB::raw('AVG (NUM_VALUE) as F2'), DB::raw('AVG (NUM_VALUE) as F3'), DB::raw('DATEPART(HOUR,[LOCAL_DATE]) as hora'))
            ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
            ->where('ITEMID', 'like', '%NETx\XIO\Modbus\PM 3200 0\Holding Registers\2999%')
            ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
            ->groupBy(DB::raw('DATEPART(HOUR,[LOCAL_DATE])'))
            ->get();
        foreach ($promcorriente as $e) {
            $f1      = $e->F1;
            $f2      = $e->F2;
            $f3      = $e->F3;
            $promcor = $f1 + $f2 + $f3;
        };

        //dd($promcorriente);

        //INSERT EN LA TABLA ENERGIA_PISO

        $energy = new energiaPiso(array(
            'energia'             => $energia,
            'pico'                => $potencia,
            'prom_tension'        => $promt,
            'max_tension'         => $maxt,
            'min_tension'         => $mint,
            'prom_corriente'      => $promcor,
            'energia_iluminacion' => $energiailum,
            'fecha'               => $fecha,
            'eficiencia'          => 'null',
            'piso_id'             => $piso_id,
        ));
        $energy->save();

        \Log::info('ProbandoenergiaPiso0' . \Carbon\Carbon::now());
    }
}
