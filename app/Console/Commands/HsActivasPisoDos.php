<?php

namespace App\Console\Commands;
use DB;
use App\Piso;
use Illuminate\Console\Command;

class HsActivasPisoDos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hsactivas:dos';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando lee la cant de hs activas en los grupos del piso 2';
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
        //Sector A1
        ///General

        $hsa1g = DB::connection('netx')
            ->table('dbo.NETX_DEFINITION')
            ->select(DB::raw('MAX(NUM_VALUE) as chs'))
            ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
            ->where('ITEMID', 'like', '%NETx\XIO\KNX\192.168.10.1\00/5/001%')
            ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
            ->get();
        foreach ($hsa1g as $ei) {
            $canths = $ei->chs;
        };

        $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 2%')->get();
        foreach ($piso as $p) {
            $pis = $p->id;
        }

        $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A1%')
            ->where('piso_id', '=', $pis)->get();
        foreach ($sector as $s) {
            $se = $s->id;
        }
        //cant de hs usadas por el grupo
        $cant_hs_old = DB::table('grupos')->select('cant_hs_activo', 'id')
            ->where('nombre', 'like', '%General%')
            ->where('piso_id', $pis)
            ->where('sector_id', $se)->get();
        foreach ($cant_hs_old as $c) {
            $chso = $c->cant_hs_activo;
            $gid  = $c->id;
        }

//Buscar luminarias de ese grupo y actualizar el valor de hs de cada luminaria del g

        $lumis = DB::table('luminarias')->select('id')->where('grupo_id', $gid)
            ->whereNull(DB::raw('fecha_baja'))->get();
        foreach ($lumis as $l) {
            DB::table('luminarias')
                ->where('id', $l->id)
                ->update(['cant_hs_uso' => ($canths - $chso) + cant_hs_uso]);
        }
//Actualizo el grupo
        DB::table('grupos')
            ->where('id', $gid)
            ->update(['cant_hs_activo' => $canths]);
        \Log::info('Probando hs activas sector A1 GENERAL Piso 2' . \Carbon\Carbon::now() . $gid . ' ' . $pis . ' ' . $canths);

        //BOX 1, 2 Y 3
        for ($i = 2; $i < 5; $i++) {
            $hsa1g = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('MAX(NUM_VALUE) as chs'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%NETx\XIO\KNX\192.168.10.1\00/5/00%' . $i)
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->get();
            foreach ($hsa1g as $ei) {
                $canths = $ei->chs;
            };

            $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 2%')->get();
            foreach ($piso as $p) {
                $pis = $p->id;
            }

            $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A1%')
                ->where('piso_id', '=', $pis)->get();
            foreach ($sector as $s) {
                $se = $s->id;
            }
            //cant de hs usadas por el grupo
            $cant_hs_old = DB::table('grupos')->select('cant_hs_activo', 'id')
                ->where('nombre', 'like', '%BOX %' . ($i - 1))
                ->where('piso_id', $pis)
                ->where('sector_id', $se)->get();
            foreach ($cant_hs_old as $a) {
                $chso = $a->cant_hs_activo;
                $gid  = $a->id;
            }
            DB::table('grupos')
                ->where('id', $gid)
                ->update(['cant_hs_activo' => $canths]);
            \Log::info('BOX ' . ($i - 1) . 'Piso 2' . \Carbon\Carbon::now() . ' ' . $gid . ' ' . $pis . ' ' . $se . ' ' . $canths);

//Buscar luminarias de ese grupo y actualizar el valor de hs de cada luminaria del g

            $lumis = DB::table('luminarias')->select('id')->where('grupo_id', $gid)
                ->whereNull(DB::raw('fecha_baja'))->get();
            foreach ($lumis as $l) {
                DB::table('luminarias')
                    ->where('id', $l->id)
                    ->update(['cant_hs_uso' => ($canths - $chso) + $canths]);
            }

        }

        //Sector A2
        ///General

        $hsa1g = DB::connection('netx')
            ->table('dbo.NETX_DEFINITION')
            ->select(DB::raw('MAX(NUM_VALUE) as chs'))
            ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
            ->where('ITEMID', 'like', '%NETx\XIO\KNX\192.168.10.1\00/5/005%')
            ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
            ->get();
        foreach ($hsa1g as $ei) {
            $canths = $ei->chs;
        };

        $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 2%')->get();
        foreach ($piso as $p) {
            $pis = $p->id;
        }

        $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A2%')
            ->where('piso_id', '=', $pis)->get();
        foreach ($sector as $s) {
            $se = $s->id;
        }
        //cant de hs usadas por el grupo
        $cant_hs_old = DB::table('grupos')->select('cant_hs_activo', 'id')
            ->where('nombre', 'like', '%General%')
            ->where('piso_id', $pis)
            ->where('sector_id', $se)->get();
        foreach ($cant_hs_old as $c) {
            $chso = $c->cant_hs_activo;
            $gid  = $c->id;
        }

//Buscar luminarias de ese grupo y actualizar el valor de hs de cada luminaria del g

        $lumis = DB::table('luminarias')->select('id')->where('grupo_id', $gid)
            ->whereNull(DB::raw('fecha_baja'))->get();
        foreach ($lumis as $l) {
            DB::table('luminarias')
                ->where('id', $l->id)
                ->update(['cant_hs_uso' => ($canths - $chso) + $canths]);
        }
//Actualizo el grupo
        DB::table('grupos')
            ->where('id', $gid)
            ->update(['cant_hs_activo' => $canths]);
        \Log::info('Probando hs activas sector A2 GENERAL Piso 2' . \Carbon\Carbon::now() . $gid . ' ' . $pis . ' ' . $canths);

        //BOX 1, 2
        for ($i = 6; $i < 8; $i++) {
            $hsa1g = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('MAX(NUM_VALUE) as chs'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%NETx\XIO\KNX\192.168.10.1\00/5/00%' . $i)
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->get();
            foreach ($hsa1g as $ei) {
                $canths = $ei->chs;
            };

            $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 2%')->get();
            foreach ($piso as $p) {
                $pis = $p->id;
            }

            $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A2%')
                ->where('piso_id', '=', $pis)->get();
            foreach ($sector as $s) {
                $se = $s->id;
            }
            //cant de hs usadas por el grupo
            $cant_hs_old = DB::table('grupos')->select('cant_hs_activo', 'id')
                ->where('nombre', 'like', '%BOX %' . ($i - 5))
                ->where('piso_id', $pis)
                ->where('sector_id', $se)->get();
            foreach ($cant_hs_old as $a) {
                $chso = $a->cant_hs_activo;
                $gid  = $a->id;
            }
            DB::table('grupos')
                ->where('id', $gid)
                ->update(['cant_hs_activo' => $canths]);
            \Log::info('BOX ' . ($i - 5) . 'Piso 2' . \Carbon\Carbon::now() . ' ' . $gid . ' ' . $pis . ' ' . $se . ' ' . $canths);

//Buscar luminarias de ese grupo y actualizar el valor de hs de cada luminaria del g

            $lumis = DB::table('luminarias')->select('id')->where('grupo_id', $gid)
                ->whereNull(DB::raw('fecha_baja'))->get();
            foreach ($lumis as $l) {
                DB::table('luminarias')
                    ->where('id', $l->id)
                    ->update(['cant_hs_uso' => ($canths - $chso) + $canths]);
            }
        }
        //BOX Reservado

        $hsa1g = DB::connection('netx')
            ->table('dbo.NETX_DEFINITION')
            ->select(DB::raw('MAX(NUM_VALUE) as chs'))
            ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
            ->where('ITEMID', 'like', '%NETx\XIO\KNX\192.168.10.1\00/5/008%' . $i)
            ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
            ->get();
        foreach ($hsa1g as $ei) {
            $canths = $ei->chs;
        };

        $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 2%')->get();
        foreach ($piso as $p) {
            $pis = $p->id;
        }

        $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A2%')
            ->where('piso_id', '=', $pis)->get();
        foreach ($sector as $s) {
            $se = $s->id;
        }
        //cant de hs usadas por el grupo
        $cant_hs_old = DB::table('grupos')->select('cant_hs_activo', 'id')
            ->where('nombre', 'like', '%BOX  R%')
            ->where('piso_id', $pis)
            ->where('sector_id', $se)->get();
        foreach ($cant_hs_old as $a) {
            $chso = $a->cant_hs_activo;
            $gid  = $a->id;
        }
        DB::table('grupos')
            ->where('id', $gid)
            ->update(['cant_hs_activo' => $canths]);
        \Log::info('BOX R' . 'Piso 2' . \Carbon\Carbon::now() . ' ' . $gid . ' ' . $pis . ' ' . $se . ' ' . $canths);

//Buscar luminarias de ese grupo y actualizar el valor de hs de cada luminaria del g

        $lumis = DB::table('luminarias')->select('id')->where('grupo_id', $gid)
            ->whereNull(DB::raw('fecha_baja'))->get();
        foreach ($lumis as $l) {
            DB::table('luminarias')
                ->where('id', $l->id)
                ->update(['cant_hs_uso' => ($canths - $chso) + $canths]);
        }

        //SECTOR A3N
        for ($i = 10; $i < 14; $i++) {
            $hsa1g = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('MAX(NUM_VALUE) as chs'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%NETx\XIO\KNX\192.168.10.1\00/5/0%' . $i)
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->get();
            foreach ($hsa1g as $ei) {
                $canths = $ei->chs;
            };

            $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 2%')->get();
            foreach ($piso as $p) {
                $pis = $p->id;
            }

            $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A3N%')
                ->where('piso_id', '=', $pis)->get();
            foreach ($sector as $s) {
                $se = $s->id;
            }
            //cant de hs usadas por el grupo
            $cant_hs_old = DB::table('grupos')->select('cant_hs_activo', 'id')
                ->where('nombre', 'like', '%L %' . ($i - 9))
                ->where('piso_id', $pis)
                ->where('sector_id', $se)->get();
            foreach ($cant_hs_old as $a) {
                $chso = $a->cant_hs_activo;
                $gid  = $a->id;
            }

//Buscar luminarias de ese grupo y actualizar el valor de hs de cada luminaria del g

            $lumis = DB::table('luminarias')->select('id')->where('grupo_id', $gid)
                ->whereNull(DB::raw('fecha_baja'))->get();
            foreach ($lumis as $l) {
                DB::table('luminarias')
                    ->where('id', $l->id)
                    ->update(['cant_hs_uso' => ($canths - $chso) + $canths]);
            }
//Actualizo el grupo

            DB::table('grupos')
                ->where('id', $gid)
                ->update(['cant_hs_activo' => $canths]);
            \Log::info('L ' . ($i - 9) . 'Piso 2' . \Carbon\Carbon::now() . ' ' . $gid . ' ' . $pis . ' ' . $se . ' ' . $canths);
        }

        //SECTOR A3S
        for ($i = 14; $i < 18; $i++) {
            $hsa1g = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('MAX(NUM_VALUE) as chs'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%NETx\XIO\KNX\192.168.10.1\00/5/0%' . $i)
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->get();
            foreach ($hsa1g as $ei) {
                $canths = $ei->chs;
            };

            $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 2%')->get();
            foreach ($piso as $p) {
                $pis = $p->id;
            }

            $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A3S%')
                ->where('piso_id', '=', $pis)->get();
            foreach ($sector as $s) {
                $se = $s->id;
            }
            //cant de hs usadas por el grupo
            $cant_hs_old = DB::table('grupos')->select('cant_hs_activo', 'id')
                ->where('nombre', 'like', '%L %' . ($i - 13))
                ->where('piso_id', $pis)
                ->where('sector_id', $se)->get();
            foreach ($cant_hs_old as $a) {
                $chso = $a->cant_hs_activo;
                $gid  = $a->id;
            }

//Buscar luminarias de ese grupo y actualizar el valor de hs de cada luminaria del g

            $lumis = DB::table('luminarias')->select('id')->where('grupo_id', $gid)
                ->whereNull(DB::raw('fecha_baja'))->get();
            foreach ($lumis as $l) {
                DB::table('luminarias')
                    ->where('id', $l->id)
                    ->update(['cant_hs_uso' => ($canths - $chso) + $canths]);
            }
//Actualizo el grupo

            DB::table('grupos')
                ->where('id', $gid)
                ->update(['cant_hs_activo' => $canths]);
            \Log::info('L ' . ($i - 13) . 'Piso 2' . \Carbon\Carbon::now() . ' ' . $gid . ' ' . $pis . ' ' . $se . ' ' . $canths);
        }

        //SECTOR A4N
        for ($i = 18; $i < 22; $i++) {
            $hsa1g = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('MAX(NUM_VALUE) as chs'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%NETx\XIO\KNX\192.168.10.1\00/5/0%' . $i)
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->get();
            foreach ($hsa1g as $ei) {
                $canths = $ei->chs;
            };

            $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 2%')->get();
            foreach ($piso as $p) {
                $pis = $p->id;
            }

            $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A4N%')
                ->where('piso_id', '=', $pis)->get();
            foreach ($sector as $s) {
                $se = $s->id;
            }
            //cant de hs usadas por el grupo
            $cant_hs_old = DB::table('grupos')->select('cant_hs_activo', 'id')
                ->where('nombre', 'like', '%L %' . ($i - 17))
                ->where('piso_id', $pis)
                ->where('sector_id', $se)->get();
            foreach ($cant_hs_old as $a) {
                $chso = $a->cant_hs_activo;
                $gid  = $a->id;
            }

//Buscar luminarias de ese grupo y actualizar el valor de hs de cada luminaria del g

            $lumis = DB::table('luminarias')->select('id')->where('grupo_id', $gid)
                ->whereNull(DB::raw('fecha_baja'))->get();
            foreach ($lumis as $l) {
                DB::table('luminarias')
                    ->where('id', $l->id)
                    ->update(['cant_hs_uso' => ($canths - $chso) + $canths]);
            }
//Actualizo el grupo

            DB::table('grupos')
                ->where('id', $gid)
                ->update(['cant_hs_activo' => $canths]);
            \Log::info('L ' . ($i - 17) . 'Piso 2' . \Carbon\Carbon::now() . ' ' . $gid . ' ' . $pis . ' ' . $se . ' ' . $canths);
        }

        //SECTOR A4S
        for ($i = 22; $i < 26; $i++) {
            $hsa1g = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('MAX(NUM_VALUE) as chs'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%NETx\XIO\KNX\192.168.10.1\00/5/0%' . $i)
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->get();
            foreach ($hsa1g as $ei) {
                $canths = $ei->chs;
            };

            $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 2%')->get();
            foreach ($piso as $p) {
                $pis = $p->id;
            }

            $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A4S%')
                ->where('piso_id', '=', $pis)->get();
            foreach ($sector as $s) {
                $se = $s->id;
            }
            //cant de hs usadas por el grupo
            $cant_hs_old = DB::table('grupos')->select('cant_hs_activo', 'id')
                ->where('nombre', 'like', '%L %' . ($i - 21))
                ->where('piso_id', $pis)
                ->where('sector_id', $se)->get();
            foreach ($cant_hs_old as $a) {
                $chso = $a->cant_hs_activo;
                $gid  = $a->id;
            }

//Buscar luminarias de ese grupo y actualizar el valor de hs de cada luminaria del g

            $lumis = DB::table('luminarias')->select('id')->where('grupo_id', $gid)
                ->whereNull(DB::raw('fecha_baja'))->get();
            foreach ($lumis as $l) {
                DB::table('luminarias')
                    ->where('id', $l->id)
                    ->update(['cant_hs_uso' => ($canths - $chso) + $canths]);
            }
//Actualizo el grupo

            DB::table('grupos')
                ->where('id', $gid)
                ->update(['cant_hs_activo' => $canths]);
            \Log::info('L ' . ($i - 21) . 'Piso 2' . \Carbon\Carbon::now() . ' ' . $gid . ' ' . $pis . ' ' . $se . ' ' . $canths);
        }

        //SECTOR A5
        for ($i = 26; $i < 29; $i++) {
            $hsa1g = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('MAX(NUM_VALUE) as chs'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%NETx\XIO\KNX\192.168.10.1\00/5/0%' . $i)
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->get();
            foreach ($hsa1g as $ei) {
                $canths = $ei->chs;
            };

            $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 2%')->get();
            foreach ($piso as $p) {
                $pis = $p->id;
            }

            $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A5%')
                ->where('piso_id', '=', $pis)->get();
            foreach ($sector as $s) {
                $se = $s->id;
            }
            //cant de hs usadas por el grupo
            $cant_hs_old = DB::table('grupos')->select('cant_hs_activo', 'id')
                ->where('nombre', 'like', '%L %' . ($i - 25))
                ->where('piso_id', $pis)
                ->where('sector_id', $se)->get();
            foreach ($cant_hs_old as $a) {
                $chso = $a->cant_hs_activo;
                $gid  = $a->id;
            }

//Buscar luminarias de ese grupo y actualizar el valor de hs de cada luminaria del g

            $lumis = DB::table('luminarias')->select('id')->where('grupo_id', $gid)
                ->whereNull(DB::raw('fecha_baja'))->get();
            foreach ($lumis as $l) {
                DB::table('luminarias')
                    ->where('id', $l->id)
                    ->update(['cant_hs_uso' => ($canths - $chso) + $canths]);
            }
//Actualizo el grupo

            DB::table('grupos')
                ->where('id', $gid)
                ->update(['cant_hs_activo' => $canths]);
            \Log::info('L ' . ($i - 25) . 'Piso 2' . \Carbon\Carbon::now() . ' ' . $gid . ' ' . $pis . ' ' . $se . ' ' . $canths);
        }

    }
}
