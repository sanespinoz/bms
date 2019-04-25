<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use DB;
use Illuminate\Console\Command;

class AlarmasCero extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alarmas:cero';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando lee las alarmas en los grupos del piso 0';
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

        for ($i = 1; $i < 4; $i++) {

            $alarmas = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('(NUM_VALUE) as m'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%BMS\Alarmas\Piso 0\A1\G%' . $i)
                ->where('NETX_HISTORICAL_VALUE.NUM_VALUE', '1')
                ->orwhere('NETX_HISTORICAL_VALUE.NUM_VALUE', '0')
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->orderBy('NETX_HISTORICAL_VALUE.LOCAL_DATE', 'desc')
                ->first();

            if ($alarmas != []) {
                foreach ($alarmas as $a) {
                    $mensalarma = (int) $a;
                };

                //dd($mensalarma);
                $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 0%')->get();
                foreach ($piso as $p) {
                    $pis = $p->id;
                }
                $grupo = DB::table('grupos')->select('id')->where('nombre', 'like', '%G' . $i)->get();
                foreach ($grupo as $g) {
                    $gid = $g->id;
                }

                $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A1%')
                    ->where('piso_id', '=', $pis)->get();
                foreach ($sector as $s) {
                    $se = $s->id;
                }
                $fech = \Carbon\Carbon::now();

                $fi = $fech->toDateTimeString();
                DB::table('alarmas')->insert(
                    ['mensaje' => $mensalarma, 'fecha' => $fi, 'grupo_id' => $gid]
                );
                // dd($fech);
                //TRUNCO ESTAS ALARMAS  DE LA BD NETX DE  LA FECHA DE HOY si leo cada 10 minutos el dia de hoy y paso la info a mi bd borro lo q haya de fecha de hoy de la netx

                \Log::info('insertando alarmas del sector A1 Piso 0' . \Carbon\Carbon::now());
            }
        }
        //Sector A2  ACTUALIZAR COMO EL SECTOR A1 G1
        //
        //
        //
        //
        //
        //       HACER!
        //       HACER UN TRIGER POR CADA ENTRADA EN LA TABLA ALARMAS QUE
        //       MODIFICA EL ESTADO DE LA LUMI DE ESE GRUPO
        //
        //
        //
        //
        //
        //

        for ($i = 1; $i < 4; $i++) {
            $alarmas = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('MAX(NUM_VALUE) as m'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%BMS\Alarmas\Piso 0\A2\G%' . $i)
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->get();
            if ($alarmas != []) {
                foreach ($alarmas as $al) {
                    $mensalarma = $al->m;
                };

                $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 0%')->get();
                foreach ($piso as $p) {
                    $pis = $p->id;
                }
                $grupo = DB::table('grupos')->select('id')->where('nombre', 'like', '%G' . $i)->get();
                foreach ($grupo as $g) {
                    $gid = $g->id;
                }

                $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A2%')
                    ->where('piso_id', '=', $pis)->get();
                foreach ($sector as $s) {
                    $se = $s->id;
                }
                $fech = Carbon\Carbon::now();

                $fi = $fech->toDateTimeString();
                DB::table('alarmas')->insert(
                    ['mensaje' => $mensalarma, 'fecha' => $fi, 'grupo_id' => $gid]
                );

                \Log::info('insertando alarmas del sector A2 Piso 0' . \Carbon\Carbon::now());
            }
        }
        //Sector A3N

        for ($i = 1; $i < 4; $i++) {
            $alarmas = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('MAX(NUM_VALUE) as m'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%BMS\Alarmas\Piso 0\A3N\G%' . $i)
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->get();
            if ($alarmas != []) {
                foreach ($alarmas as $al) {
                    $mensalarma = $al->m;
                };

                $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 0%')->get();
                foreach ($piso as $p) {
                    $pis = $p->id;
                }
                $grupo = DB::table('grupos')->select('id')->where('nombre', 'like', '%G' . $i)->get();
                foreach ($grupo as $g) {
                    $gid = $g->id;
                }

                $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A3N%')
                    ->where('piso_id', '=', $pis)->get();
                foreach ($sector as $s) {
                    $se = $s->id;
                }
                $fech = Carbon\Carbon::now();

                $fi = $fech->toDateTimeString();
                DB::table('alarmas')->insert(
                    ['mensaje' => $mensalarma, 'fecha' => $fi, 'grupo_id' => $gid]
                );

                \Log::info('insertando alarmas del sector A3N Piso 0' . \Carbon\Carbon::now());
            }
        }
        //Sector A3S

        for ($i = 1; $i < 4; $i++) {
            $alarmas = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('MAX(NUM_VALUE) as m'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%BMS\Alarmas\Piso 0\A3S\G%' . $i)
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->get();
            if ($alarmas != []) {
                foreach ($alarmas as $al) {
                    $mensalarma = $al->m;
                };

                $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 0%')->get();
                foreach ($piso as $p) {
                    $pis = $p->id;
                }
                $grupo = DB::table('grupos')->select('id')->where('nombre', 'like', '%G' . $i)->get();
                foreach ($grupo as $g) {
                    $gid = $g->id;
                }

                $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A3S%')
                    ->where('piso_id', '=', $pis)->get();
                foreach ($sector as $s) {
                    $se = $s->id;
                }
                $fech = Carbon\Carbon::now();

                $fi = $fech->toDateTimeString();
                DB::table('alarmas')->insert(
                    ['mensaje' => $mensalarma, 'fecha' => $fi, 'grupo_id' => $gid]
                );

                \Log::info('insertando alarmas del sector A3S Piso 0' . \Carbon\Carbon::now());
            }
        }

        //Sector A4N

        for ($i = 1; $i < 4; $i++) {
            $alarmas = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('MAX(NUM_VALUE) as m'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%BMS\Alarmas\Piso 0\A4N\G%' . $i)
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->get();
            if ($alarmas != []) {
                foreach ($alarmas as $al) {
                    $mensalarma = $al->m;
                };

                $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 0%')->get();
                foreach ($piso as $p) {
                    $pis = $p->id;
                }
                $grupo = DB::table('grupos')->select('id')->where('nombre', 'like', '%G' . $i)->get();
                foreach ($grupo as $g) {
                    $gid = $g->id;
                }

                $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A4N%')
                    ->where('piso_id', '=', $pis)->get();
                foreach ($sector as $s) {
                    $se = $s->id;
                }
                $fech = Carbon\Carbon::now();

                $fi = $fech->toDateTimeString();
                DB::table('alarmas')->insert(
                    ['mensaje' => $mensalarma, 'fecha' => $fi, 'grupo_id' => $gid]
                );

                \Log::info('insertando alarmas del sector A4N Piso 0' . \Carbon\Carbon::now());
            }
        }

        //Sector A4S

        for ($i = 1; $i < 4; $i++) {
            $alarmas = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('MAX(NUM_VALUE) as m'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%BMS\Alarmas\Piso 0\A4S\G%' . $i)
                ->where(DB::raw('CONVERT(date, LOCAL_DATE)'), '=', DB::raw('CONVERT(date, GETDATE())'))
                ->get();
            if ($alarmas != []) {
                foreach ($alarmas as $al) {
                    $mensalarma = $al->m;
                };

                $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 0%')->get();
                foreach ($piso as $p) {
                    $pis = $p->id;
                }
                $grupo = DB::table('grupos')->select('id')->where('nombre', 'like', '%G' . $i)->get();
                foreach ($grupo as $g) {
                    $gid = $g->id;
                }

                $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A4S%')
                    ->where('piso_id', '=', $pis)->get();
                foreach ($sector as $s) {
                    $se = $s->id;
                }
                $fech = Carbon\Carbon::now();

                $fi = $fech->toDateTimeString();
                DB::table('alarmas')->insert(
                    ['mensaje' => $mensalarma, 'fecha' => $fi, 'grupo_id' => $gid]
                );

                \Log::info('insertando alarmas del sector A4S Piso 0' . \Carbon\Carbon::now());
            }
        }

    }
}
