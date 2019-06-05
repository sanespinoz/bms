<?php

namespace App\Console\Commands;

use DB;
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
        //Sector A3 Norte
        for ($i = 1; $i < 5; $i++) {
            $knxActivacionesa3n1 = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('MAX(NUM_VALUE) as act'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%NETx\VIRTUAL\BMS\Activaciones\Piso 2\A3N\L%' . $i)
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->get();
            foreach ($knxActivacionesa3n1 as $ei) {
                $k = $ei->act;
            };

            $piso = DB::table('pisos')->select('id')->where('nombre', 'like', "%Piso 2%")->get();
            foreach ($piso as $p) {
                $pis = $p->id;
            }

            $sector = DB::table('sectores')->select('id')->where('nombre', 'like', "%A3N%")
                ->where('piso_id', '=', $pis)->get();
            foreach ($sector as $s) {
                $se = $s->id;
            }
            $ca = DB::table('grupos')->select('cant_activaciones', 'id')->where('nombre', 'like', "%L%" . $i)->where('piso_id', $pis)
                ->where('sector_id', $se)->get();
            foreach ($ca as $a) {
                $cac = $a->cant_activaciones;
                $idg = $a->id;
            }
            DB::table('grupos')
                ->where('nombre', 'L' . $i)
                ->where('piso_id', $pis)
                ->where('sector_id', $se)
                ->update(['cant_activaciones' => $k + $cac]);

            //Buscar luminarias de ese grupo y actualizar el valor de hs de cada luminaria del g

            $lumis = DB::table('luminarias')->select('id', 'cant_activaciones')->where('grupo_id', $idg)
                ->whereNull(DB::raw('fecha_baja'))->get();
            foreach ($lumis as $l) {
                DB::table('luminarias')
                    ->where('id', $l->id)
                    ->update(['cant_activaciones' => ($l->cant_activaciones + $k)]);
            }
            \Log::info('L ' . $i . 'Piso 2 id grupo' . $idg . ' sector' . ' ' . $se . ' ACTIV' . $k . ' ' . $cac);
        }
//Sector A3 Sur o A3S CAMBIAR NOMBRE
        for ($i = 1; $i < 5; $i++) {
            $knxActivacionesa3n1 = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('MAX(NUM_VALUE) as act'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%NETx\VIRTUAL\BMS\Activaciones\Piso 2\A3S\L%' . $i)
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->get();
            foreach ($knxActivacionesa3n1 as $ei) {
                $k = $ei->act;
            };

            $piso = DB::table('pisos')->select('id')->where('nombre', 'like', "%Piso 2%")->get();
            foreach ($piso as $p) {
                $pis = $p->id;
            }

            $sector = DB::table('sectores')->select('id')->where('nombre', 'like', "%A3S%")
                ->where('piso_id', '=', $pis)->get();
            foreach ($sector as $s) {
                $se = $s->id;
            }
            $ca = DB::table('grupos')->select('cant_activaciones', 'id')->where('nombre', 'like', "%L%" . $i)->where('piso_id', $pis)
                ->where('sector_id', $se)->get();
            foreach ($ca as $a) {
                $cac = $a->cant_activaciones;
                $idg = $a->id;
            }
            DB::table('grupos')
                ->where('nombre', 'L' . $i)
                ->where('piso_id', $pis)
                ->where('sector_id', $se)
                ->update(['cant_activaciones' => $k + $cac]);
            //Buscar luminarias de ese grupo y actualizar el valor de hs de cada luminaria del g

            $lumis = DB::table('luminarias')->select('id', 'cant_activaciones')->where('grupo_id', $idg)
                ->whereNull(DB::raw('fecha_baja'))->get();
            foreach ($lumis as $l) {
                DB::table('luminarias')
                    ->where('id', $l->id)
                    ->update(['cant_activaciones' => ($l->cant_activaciones + $k)]);
            }
            \Log::info('L ' . $i . 'Piso 2 id grupo' . $idg . ' sector' . ' ' . $se . ' ACTIV' . $k . ' ' . $cac);

        }

        //Sector A4 NORTE

        for ($i = 1; $i < 5; $i++) {
            $knxActivacionesa3n1 = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('MAX(NUM_VALUE) as act'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%NETx\VIRTUAL\BMS\Activaciones\Piso 2\A4N\L%' . $i)
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->get();
            foreach ($knxActivacionesa3n1 as $ei) {
                $k = $ei->act;
            };

            $piso = DB::table('pisos')->select('id')->where('nombre', 'like', "%Piso 2%")->get();
            foreach ($piso as $p) {
                $pis = $p->id;
            }

            $sector = DB::table('sectores')->select('id')->where('nombre', 'like', "%A4N%")
                ->where('piso_id', '=', $pis)->get();
            foreach ($sector as $s) {
                $se = $s->id;
            }
            $ca = DB::table('grupos')->select('cant_activaciones', 'id')->where('nombre', 'like', "%L%" . $i)->where('piso_id', $pis)
                ->where('sector_id', $se)->get();
            foreach ($ca as $a) {
                $cac = $a->cant_activaciones;
                $idg = $a->id;
            }
            DB::table('grupos')
                ->where('nombre', 'L' . $i)
                ->where('piso_id', $pis)
                ->where('sector_id', $se)
                ->update(['cant_activaciones' => $k + $cac]);
            //Buscar luminarias de ese grupo y actualizar el valor de hs de cada luminaria del g

            $lumis = DB::table('luminarias')->select('id', 'cant_activaciones')->where('grupo_id', $idg)
                ->whereNull(DB::raw('fecha_baja'))->get();
            foreach ($lumis as $l) {
                DB::table('luminarias')
                    ->where('id', $l->id)
                    ->update(['cant_activaciones' => ($l->cant_activaciones + $k)]);
            }
            \Log::info('L ' . $i . 'Piso 2  id grupo' . $idg . ' sector' . ' ' . $se . ' ACTIV' . $k . ' ' . $cac);
        }

        //Sector A4 Sur

        for ($i = 1; $i < 5; $i++) {
            $knxActivacionesa3n1 = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('MAX(NUM_VALUE) as act'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%NETx\VIRTUAL\BMS\Activaciones\Piso 2\A4S\L%' . $i)
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->get();
            foreach ($knxActivacionesa3n1 as $ei) {
                $k = $ei->act;
            };

            $piso = DB::table('pisos')->select('id')->where('nombre', 'like', "%Piso 2%")->get();
            foreach ($piso as $p) {
                $pis = $p->id;
            }

            $sector = DB::table('sectores')->select('id')->where('nombre', 'like', "%A4S%")
                ->where('piso_id', '=', $pis)->get();
            foreach ($sector as $s) {
                $se = $s->id;
            }
            $ca = DB::table('grupos')->select('cant_activaciones', 'id')->where('nombre', 'like', "%L%" . $i)->where('piso_id', $pis)
                ->where('sector_id', $se)->get();
            foreach ($ca as $a) {
                $cac = $a->cant_activaciones;
                $idg = $a->id;
            }
            DB::table('grupos')
                ->where('nombre', 'L' . $i)
                ->where('piso_id', $pis)
                ->where('sector_id', $se)
                ->update(['cant_activaciones' => $k + $cac]);
            //Buscar luminarias de ese grupo y actualizar el valor de hs de cada luminaria del g

            $lumis = DB::table('luminarias')->select('id', 'cant_activaciones')->where('grupo_id', $idg)
                ->whereNull(DB::raw('fecha_baja'))->get();
            foreach ($lumis as $l) {
                DB::table('luminarias')
                    ->where('id', $l->id)
                    ->update(['cant_activaciones' => ($l->cant_activaciones + $k)]);
            }
            \Log::info('L ' . $i . 'Piso 2 id grupo' . $idg . ' sector' . ' ' . $se . ' ACTIV' . $k . ' ' . $cac);
        }

        //Sector A5

        for ($i = 1; $i < 4; $i++) {
            $knxActivacionesa3n1 = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('MAX(NUM_VALUE) as act'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%NETx\VIRTUAL\BMS\Activaciones\Piso 2\A5\L%' . $i)
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->get();
            foreach ($knxActivacionesa3n1 as $ei) {
                $k = $ei->act;
            };

            $piso = DB::table('pisos')->select('id')->where('nombre', 'like', "%Piso 2%")->get();
            foreach ($piso as $p) {
                $pis = $p->id;
            }

            $sector = DB::table('sectores')->select('id')->where('nombre', 'like', "%A5%")
                ->where('piso_id', '=', $pis)->get();
            foreach ($sector as $s) {
                $se = $s->id;
            }
            $ca = DB::table('grupos')->select('cant_activaciones', 'id')->where('nombre', 'like', "%L%" . $i)->where('piso_id', $pis)
                ->where('sector_id', $se)->get();
            foreach ($ca as $a) {
                $cac = $a->cant_activaciones;
                $idg = $a->id;
            }
            DB::table('grupos')
                ->where('nombre', 'L' . $i)
                ->where('piso_id', $pis)
                ->where('sector_id', $se)
                ->update(['cant_activaciones' => $k + $cac]);
            //Buscar luminarias de ese grupo y actualizar el valor de hs de cada luminaria del g

            $lumis = DB::table('luminarias')->select('id', 'cant_activaciones')->where('grupo_id', $idg)
                ->whereNull(DB::raw('fecha_baja'))->get();
            foreach ($lumis as $l) {
                DB::table('luminarias')
                    ->where('id', $l->id)
                    ->update(['cant_activaciones' => ($l->cant_activaciones + $k)]);
            }
            \Log::info('L ' . $i . 'Piso 2 id grupo' . $idg . ' sector' . ' ' . $se . ' ACTIV' . $k . ' ' . $cac);
        }

    }
}
