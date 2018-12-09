<?php

namespace App\Console\Commands;

use App\EnergiaPiso;
use Carbon\Carbon;
use DB;
use Illuminate\Console\Command;

class TendenciaPisoUno extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'energia:uno';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando lee la energía consumida en el piso 1';

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
        //ENERGIA
        $knxEnergias = DB::connection('netx')->table('dbo.NETX_DEFINITION')->select('HANDLE', 'itemid')->where('ITEMID', 'like', '%Energia\Piso 1\Energia%')->get();
        //$energias =DB::connection('netx')->table('dbo.NETX_DEFINITION')->select('HANDLE')->get();
        //$array = array();
        foreach ($knxEnergias as $e) {
            $i            = $e->HANDLE;
            $valorEnergia = DB::connection('netx')->table('dbo.NETX_HISTORICAL_VALUE')->select('NUM_VALUE', 'LOCAL_DATE')->where('HANDLE', '=', $i)->get();
            foreach ($valorEnergia as $ener) {
                //dd($r->NUM_VALUE,$r->LOCAL_DATE);
                //dd($ener->NUM_VALUE);
                $energia = $ener->NUM_VALUE;
                $fecha   = $ener->LOCAL_DATE;
                //dd($fecha);
            }
        }

        $piso = DB::table('pisos')->select('id')->where('nombre', '=', 'Piso 1')->get();

        foreach ($piso as $p) {
            $piso_id = $p->id;
            // $piso_id=(int)$p->id;
            // dd($piso_id);
        }
        //PICO

        $knxPico = DB::connection('netx')->table('dbo.NETX_DEFINITION')->select('HANDLE', 'itemid')->where('ITEMID', 'like', '%Energia\Piso 1\Iluminacion\Potencia Max%')->get();
        foreach ($knxPico as $p) {
            $i = $p->HANDLE;
            //dd($i);
            $valorPico = DB::connection('netx')->table('dbo.NETX_HISTORICAL_VALUE')->select('NUM_VALUE', 'LOCAL_DATE')->where('HANDLE', '=', $i)->get();
            foreach ($valorPico as $pic) {
                //dd($pic->NUM_VALUE,$pic->LOCAL_DATE);
                //dd($pic->NUM_VALUE);
                $pico = $pic->NUM_VALUE;
            }

        }
        //PROM TENSION Piso 1
        $knxPromTension = DB::connection('netx')->table('dbo.NETX_DEFINITION')->select('HANDLE', 'itemid')->where('ITEMID', 'like', '%Modbus\PM 3200\Holding Registers\3029%')->get();
        foreach ($knxPromTension as $pt) {
            $hpt = $pt->HANDLE;
            //dd($hpt);

        }
        $promtension1 = DB::connection('netx')->table('dbo.NETX_HISTORICAL_VALUE')->select('NUM_VALUE')->where('HANDLE', '=', $hpt)->avg('NUM_VALUE');
        //dd($pic->NUM_VALUE,$pic->LOCAL_DATE);
        //dd($tension1);
        $maxtension1 = DB::connection('netx')->table('dbo.NETX_HISTORICAL_VALUE')->select('NUM_VALUE')->where('HANDLE', '=', $hpt)->max('NUM_VALUE');
        $mintension1 = DB::connection('netx')->table('dbo.NETX_HISTORICAL_VALUE')->select('NUM_VALUE')->where('HANDLE', '=', $hpt)->min('NUM_VALUE');

        //PROM CORRIENTE Piso 1
        $knxPromCorriente = DB::connection('netx')->table('dbo.NETX_DEFINITION')->select('HANDLE', 'itemid')->where('ITEMID', 'like', '%Modbus\PM 3200\Holding Registers\3001%')->get();
        foreach ($knxPromCorriente as $pc) {
            $hpc = $pc->HANDLE;
            // dd($hpc);

        }
        $promcorriente1 = DB::connection('netx')->table('dbo.NETX_HISTORICAL_VALUE')->select('NUM_VALUE')->where('HANDLE', '=', $hpc)->avg('NUM_VALUE');

        //dd($promcorriente1);
        //ENERGIA ILUMINACION PISO 1

        $knxEnergiaIluminacion = DB::connection('netx')->table('dbo.NETX_DEFINITION')->select('HANDLE', 'itemid')->where('ITEMID', 'like', '%Piso 1\Iluminacion\Energia%')->get();

        foreach ($knxEnergiaIluminacion as $ei) {
            $enerilu                 = $ei->HANDLE;
            $valorEnergiaIluminacion = DB::connection('netx')->table('dbo.NETX_HISTORICAL_VALUE')->select('NUM_VALUE', 'LOCAL_DATE')->where('HANDLE', '=', $enerilu)->get();
            foreach ($valorEnergiaIluminacion as $enerilu) {
                //dd($r->NUM_VALUE,$r->LOCAL_DATE);

                $energiaIluminacion = $enerilu->NUM_VALUE;
                //dd($energiaIluminacion);
            }
        }

        //INSERT EN LA TABLA ENERGIA_PISO

        $energy = new energiaPiso(array(
            'energia'             => $energia,
            'pico'                => $pico,
            'prom_tension'        => $promtension1,
            'max_tension'         => $maxtension1,
            'min_tension'         => $mintension1,
            'prom_corriente'      => $promcorriente1,
            'energia_iluminacion' => $energiaIluminacion,
            'fecha'               => $fecha,
            'piso_id'             => $piso_id,
        ));
        $energy->save();

        \Log::info('Probando energia Piso 1' . \Carbon\Carbon::now());
    }
}
