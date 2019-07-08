<?php

namespace App\Console\Commands;
use App\Piso;
use App\Alarma;
use App\Luminaria;
use App\EstadoLuminaria;
use App\Grupo;
use App\Sector;
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
        for ($i = 1; $i < 4; $i++) 
        {
            $alarmas = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('(NUM_VALUE) as m'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%BMS\Alarmas\piso 0\A1\G'.$i)
                ->where('NETX_HISTORICAL_VALUE.NUM_VALUE','1')
                ->where('LOCAL_DATE' ,'>', DB::raw('DATEADD([minute], -10, GETDATE())'))
                ->where('LOCAL_DATE' ,'<',  DB::raw('GETDATE()'))
                ->orderBy(DB::raw('LOCAL_DATE'), 'desc')
                ->get();

            if($alarmas != []) 
            {
                foreach ($alarmas as $a) 
                {
                   
                    $mensalarma = (int) $a->m;
                };

             
                $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 0%')->get();
                foreach ($piso as $p) {
                    $pis = $p->id;
                }
                
                $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A1%')
                    ->where('piso_id', '=', $pis)->get();
                foreach ($sector as $s) {
                    $se = $s->id;
                }

                $grupo = DB::table('grupos')->select('id')->where('nombre', 'like', '%G' . $i)
                ->where('piso_id', $pis)
                ->where('sector_id', $se)
                ->get();
               
                foreach ($grupo as $g) {
                    $gid = $g->id;
                }

             
                $fech = \Carbon\Carbon::now();

                $fi = $fech->toDateTimeString();
                DB::table('alarmas')->insert(
                    ['mensaje' => $mensalarma, 'fecha' => $fi, 'grupo_id' => $gid]
                );
                
                //Inserto un nuevo estado para cada luminaria del grupo alarmado

                $luminarias = Alarma::select('luminarias.id as idl')
                    ->join('luminarias', 'alarmas.grupo_id', '=', 'luminarias.grupo_id')
                    ->groupBy('luminarias.id')
                    ->get();
                  

                foreach ($luminarias as $v) 
                {
                    $il = $v->idl;

                    $carbon = new \Carbon\Carbon();
                    $date   = $carbon->now();

                    $fi = $date->toDateString();

                    DB::table('estado_luminarias')->insert(
                        ['fecha'           => $fi,
                            'estado'           => 2,
                            'on_off'           => 'null',
                            'valor_regulacion' => 0,
                            'luminaria_id'     => $il]
                    );

                    \Log::info('insertando ALARMAS del sector A1 Piso 0' . \Carbon\Carbon::now());
                }
            }
            //echo ($i);
        }
//Sector A2
        for ($i = 1; $i < 4; $i++) 
        {
                 $alarmas = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('(NUM_VALUE) as m'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%BMS\Alarmas\piso 0\A2\G'.$i)
                ->where('NETX_HISTORICAL_VALUE.NUM_VALUE','1')
                ->where('LOCAL_DATE' ,'>', DB::raw('DATEADD([minute], -10, GETDATE())'))
                ->where('LOCAL_DATE' ,'<',  DB::raw('GETDATE()'))
                ->orderBy(DB::raw('LOCAL_DATE'), 'desc')
                ->get();

            if ($alarmas != []) 
            {
                foreach ($alarmas as $al) 
                {
                    $mensalarma = (int) $al->m;
                };

                $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 0%')->get();
                foreach ($piso as $p) {
                    $pis = $p->id;
                }
                $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A1%')
                    ->where('piso_id', '=', $pis)->get();
                foreach ($sector as $s) {
                    $se = $s->id;
                }
                $grupo = DB::table('grupos')->select('id')->where('nombre', 'like', '%G' . $i)
                ->where('piso_id', $pis)
                ->where('sector_id', $se)
                ->get();
                foreach ($grupo as $g) {
                    $gid = $g->id;
                }
                $fech = Carbon\Carbon::now();

                $fi = $fech->toDateTimeString();
                DB::table('alarmas')->insert(
                    ['mensaje' => $mensalarma, 'fecha' => $fi, 'grupo_id' => $gid]
                );
                //Inserto un nuevo estado para cada luminaria del grupo alarmado

                $luminarias = Alarma::select('luminarias.id as idl')
                    ->join('luminarias', 'alarmas.grupo_id', '=', 'luminarias.grupo_id')
                    ->groupBy('luminarias.id')
                    ->first();

                foreach ($luminarias as $v) 
                {
                    $il = $v->idl;

                    $carbon = new \Carbon\Carbon();
                    $date   = $carbon->now();

                    $fi = $date->toDateString();

                    DB::table('estado_luminarias')->insert(
                        ['fecha'           => $fi,
                            'estado'           => 2,
                            'on_off'           => 'null',
                            'valor_regulacion' => 0,
                            'luminaria_id'     => $il]
                    );

                    \Log::info('insertando alarmas del sector A2 Piso 0' . \Carbon\Carbon::now());
                }
            }
        }
            //Sector A3N

            for ($i = 1; $i < 4; $i++) 
            {

            $alarmas = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('(NUM_VALUE) as m'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%BMS\Alarmas\piso 0\A3N\G'.$i)
                ->where('NETX_HISTORICAL_VALUE.NUM_VALUE','1')
                ->where('LOCAL_DATE' ,'>', DB::raw('DATEADD([minute], -10, GETDATE())'))
                ->where('LOCAL_DATE' ,'<',  DB::raw('GETDATE()'))
                ->orderBy(DB::raw('LOCAL_DATE'), 'desc')
                ->get();

                if ($alarmas != [])
                {
                    foreach ($alarmas as $al) 
                    {
                        $mensalarma = (int) $al->m;
                    };

                $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 0%')->get();
                foreach ($piso as $p) {
                    $pis = $p->id;
                }
                $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A1%')
                    ->where('piso_id', '=', $pis)->get();
                foreach ($sector as $s) {
                    $se = $s->id;
                }
                $grupo = DB::table('grupos')->select('id')->where('nombre', 'like', '%G' . $i)
                ->where('piso_id', $pis)
                ->where('sector_id', $se)
                ->get();

                foreach ($grupo as $g) {
                    $gid = $g->id;
                }
                    $fech = Carbon\Carbon::now();

                    $fi = $fech->toDateTimeString();
                    DB::table('alarmas')->insert(
                        ['mensaje' => $mensalarma, 'fecha' => $fi, 'grupo_id' => $gid]
                    );
                    //Inserto un nuevo estado para cada luminaria del grupo alarmado

                    $luminarias = Alarma::select('luminarias.id as idl')
                        ->join('luminarias', 'alarmas.grupo_id', '=', 'luminarias.grupo_id')
                        ->groupBy('luminarias.id')
                        ->get();

                    foreach ($luminarias as $v) 
                    {
                        $il = $v->idl;

                        $carbon = new \Carbon\Carbon();
                        $date   = $carbon->now();

                        $fi = $date->toDateString();

                        DB::table('estado_luminarias')->insert(
                            ['fecha'           => $fi,
                                'estado'           => 2,
                                'on_off'           => 'null',
                                'valor_regulacion' => 0,
                                'luminaria_id'     => $il]
                        );

                        \Log::info('insertando alarmas del sector A3N Piso 0' . \Carbon\Carbon::now());
                    }
                }
            }
                //Sector A3S

                for ($i = 1; $i < 4; $i++)
                {

                 $alarmas = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('(NUM_VALUE) as m'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%BMS\Alarmas\piso 0\A3S\G'.$i)
                ->where('NETX_HISTORICAL_VALUE.NUM_VALUE','1')
                ->where('LOCAL_DATE' ,'>', DB::raw('DATEADD([minute], -10, GETDATE())'))
                ->where('LOCAL_DATE' ,'<',  DB::raw('GETDATE()'))
                ->orderBy(DB::raw('LOCAL_DATE'), 'desc')
                ->get();


                    if ($alarmas != []) 
                    {
                        foreach ($alarmas as $al) 
                        {
                            $mensalarma = (int) $al->m;
                        };
                $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 0%')->get();
                foreach ($piso as $p) {
                    $pis = $p->id;
                }
                $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A1%')
                    ->where('piso_id', '=', $pis)->get();
                foreach ($sector as $s) {
                    $se = $s->id;
                }
                $grupo = DB::table('grupos')->select('id')->where('nombre', 'like', '%G' . $i)
                ->where('piso_id', $pis)
                ->where('sector_id', $se)
                ->get();

                foreach ($grupo as $g) {
                    $gid = $g->id;
                }
                        $fech = Carbon\Carbon::now();

                        $fi = $fech->toDateTimeString();
                        DB::table('alarmas')->insert(
                            ['mensaje' => $mensalarma, 'fecha' => $fi, 'grupo_id' => $gid]
                        );
                        //Inserto un nuevo estado para cada luminaria del grupo alarmado

                        $luminarias = Alarma::select('luminarias.id as idl')
                            ->join('luminarias', 'alarmas.grupo_id', '=', 'luminarias.grupo_id')
                            ->groupBy('luminarias.id')
                            ->get();

                        foreach ($luminarias as $v) 
                        {
                            $il = $v->idl;

                            $carbon = new \Carbon\Carbon();
                            $date   = $carbon->now();

                            $fi = $date->toDateString();

                            DB::table('estado_luminarias')->insert(
                                ['fecha'           => $fi,
                                    'estado'           => 2,
                                    'on_off'           => 'null',
                                    'valor_regulacion' => 0,
                                    'luminaria_id'     => $il]
                            );

                            \Log::info('insertando alarmas del sector A3S Piso 0' . \Carbon\Carbon::now());
                        }
                    }
                }

                    //Sector A4N

                    for ($i = 1; $i < 4; $i++)
                    {

            $alarmas = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('(NUM_VALUE) as m'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%BMS\Alarmas\piso 0\A4N\G'.$i)
                ->where('NETX_HISTORICAL_VALUE.NUM_VALUE','1')
                ->where('LOCAL_DATE' ,'>', DB::raw('DATEADD([minute], -10, GETDATE())'))
                ->where('LOCAL_DATE' ,'<',  DB::raw('GETDATE()'))
                ->orderBy(DB::raw('LOCAL_DATE'), 'desc')
                ->get();
                        if ($alarmas != []) 
                        {
                            foreach ($alarmas as $al) 
                            {
                                $mensalarma = (int) $al->m;
                            };
                $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 0%')->get();
                foreach ($piso as $p) {
                    $pis = $p->id;
                }
                $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A1%')
                    ->where('piso_id', '=', $pis)->get();
                foreach ($sector as $s) {
                    $se = $s->id;
                }
                $grupo = DB::table('grupos')->select('id')->where('nombre', 'like', '%G' . $i)
                ->where('piso_id', $pis)
                ->where('sector_id', $se)
                ->get();
                foreach ($grupo as $g) {
                    $gid = $g->id;
                }
                            $fech = Carbon\Carbon::now();

                            $fi = $fech->toDateTimeString();
                            DB::table('alarmas')->insert(
                                ['mensaje' => $mensalarma, 'fecha' => $fi, 'grupo_id' => $gid]
                            );
                            //Inserto un nuevo estado para cada luminaria del grupo alarmado

                            $luminarias = Alarma::select('luminarias.id as idl')
                                ->join('luminarias', 'alarmas.grupo_id', '=', 'luminarias.grupo_id')
                                ->groupBy('luminarias.id')
                                ->get();

                            foreach ($luminarias as $v) 
                            {
                                $il = $v->idl;

                                $carbon = new \Carbon\Carbon();
                                $date   = $carbon->now();

                                $fi = $date->toDateString();

                                DB::table('estado_luminarias')->insert(
                                    ['fecha'           => $fi,
                                        'estado'           => 2,
                                        'on_off'           => 'null',
                                        'valor_regulacion' => 0,
                                        'luminaria_id'     => $il]
                                );

                                \Log::info('insertando alarmas del sector A4N Piso 0' . \Carbon\Carbon::now());
                            }
                        }

                    }

                        //Sector A4S

                    for ($i = 1; $i < 4; $i++) 
                    {

            $alarmas = DB::connection('netx')
                ->table('dbo.NETX_DEFINITION')
                ->select(DB::raw('(NUM_VALUE) as m'))
                ->join('dbo.NETX_HISTORICAL_VALUE', 'NETX_DEFINITION.handle', '=', 'NETX_HISTORICAL_VALUE.handle')
                ->where('ITEMID', 'like', '%BMS\Alarmas\piso 0\A4S\G'.$i)
                ->where('NETX_HISTORICAL_VALUE.NUM_VALUE','1')
                ->where('LOCAL_DATE' ,'>', DB::raw('DATEADD([minute], -10, GETDATE())'))
                ->where('LOCAL_DATE' ,'<',  DB::raw('GETDATE()'))
                ->orderBy(DB::raw('LOCAL_DATE'), 'desc')
                ->get();
                            if ($alarmas != []) 
                            {
                                foreach ($alarmas as $al) {
                                    $mensalarma = (int) $al->m;
                                };

                $piso = DB::table('pisos')->select('id')->where('nombre', 'like', '%Piso 0%')->get();
                foreach ($piso as $p) {
                    $pis = $p->id;
                }
                $sector = DB::table('sectores')->select('id')->where('nombre', 'like', '%A1%')
                    ->where('piso_id', '=', $pis)->get();
                foreach ($sector as $s) {
                    $se = $s->id;
                }
                $grupo = DB::table('grupos')->select('id')->where('nombre', 'like', '%G' . $i)
                ->where('piso_id', $pis)
                ->where('sector_id', $se)
                ->get();
                foreach ($grupo as $g) {
                    $gid = $g->id;
                }
                                $fech = Carbon\Carbon::now();

                                $fi = $fech->toDateTimeString();
                                DB::table('alarmas')->insert(
                                    ['mensaje' => $mensalarma, 'fecha' => $fi, 'grupo_id' => $gid]
                                );
                                //Inserto un nuevo estado para cada luminaria del grupo alarmado

                                $luminarias = Alarma::select('luminarias.id as idl')
                                    ->join('luminarias', 'alarmas.grupo_id', '=', 'luminarias.grupo_id')
                                    ->groupBy('luminarias.id')
                                    ->get();

                                foreach ($luminarias as $v) 
                                {
                                    $il = $v->idl;

                                    $carbon = new \Carbon\Carbon();
                                    $date   = $carbon->now();

                                    $fi = $date->toDateString();

                                    DB::table('estado_luminarias')->insert(
                                        ['fecha'           => $fi,
                                            'estado'           => 2,
                                            'on_off'           => 'null',
                                            'valor_regulacion' => 0,
                                            'luminaria_id'     => $il]
                                    );

                                    \Log::info('insertando alarmas del sector A4S Piso 0' . \Carbon\Carbon::now());
                                }
                            }

                    }
    }
}               
