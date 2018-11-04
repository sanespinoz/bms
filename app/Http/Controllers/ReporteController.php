<?php

namespace App\Http\Controllers;

use App\EnergiaPiso;
use App\Http\Controllers\Controller;
use DB;

//Solo accesible a los usuarios de area y de mantenimiento
class ReporteController extends Controller
{
    public function __construct()
    {
        //$this->middleware('area');
        // $this->middleware('mantenimiento');

        //$this->beforeFilter('@findUser',['only'=>['show','edit','update','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // select('rols.id','rols.rol')->get();
        $etotals = EnergiaPiso::
            select(DB::raw('SUM(energia_pisos.energia) as energia, pisos.nombre'))
            ->join('pisos', function ($join) {
                $join->on('pisos.id', '=', 'energia_pisos.piso_id')
                    ->where('energia_pisos.fecha', '>', 2017);
            })
            ->groupBy('pisos.nombre')
            ->get();

        $eiluminacions = EnergiaPiso::
            select(DB::raw('SUM(energia_pisos.energia_iluminacion) as energia, pisos.nombre'))
            ->join('pisos', 'pisos.id', '=', 'energia_pisos.piso_id')
            ->groupBy('pisos.nombre')
            ->get();
        //var_dump($pastel);die('hi');

        $anios = EnergiaPiso::
            select(DB::raw('YEAR(fecha) as anio'))
            ->distinct()
            ->orderBy('anio', 'desc')
            ->get();
/*
var_dump($anios);
die('s');
anios=EnergiaPiso::
select(DB::raw('YEAR(fecha) as anio'))->distinct()
->orderBy('anio', 'asc')

->get();

 */
        return view('reportes.ener', ['etotals' => $etotals, 'eiluminacions' => $eiluminacions, 'anios' => $anios]);

    }

    public function tendenciaConsumo()
    {
        $anios = EnergiaPiso::
            select(DB::raw('YEAR(fecha) as anio'), DB::raw('SUM(energia_pisos.energia_iluminacion) as energia_ilu'), DB::raw('SUM(energia_pisos.energia) as energia'))
            ->orderBy(DB::raw('YEAR(fecha)'))
            ->groupBy(DB::raw('YEAR(fecha)'))
            ->get();

        return view('reportes.tendencia', ['anios' => $anios]);
    }

    public function eficienciaEnergetica()
    {
        $eficiencias = EnergiaPiso::
            select(DB::raw('YEAR(fecha) as anio'), DB::raw('MONTH(fecha) as mes'), DB::raw('SUM(energia_pisos.energia) as energia'))->where(DB::raw('YEAR(fecha)'), '=', 2018)
            ->orderBy(DB::raw('YEAR(fecha)'), DB::raw('MONTH(fecha)'), 'asc')
            ->groupBy(DB::raw('YEAR(fecha)'), DB::raw('MONTH(fecha)'))
            ->get();

        return view('reportes.eficiencia', ['eficiencias' => $eficiencias]);
    }

    public function performanceLuminaria()
    {
        /* $performance = EnergiaPiso::
        select(DB::raw('YEAR(fecha) as anio'),DB::raw('MONTH(fecha) as mes'),DB::raw('SUM(energia_pisos.energia) as energia'))->where(DB::raw('YEAR(fecha)'),'=',2018)
        ->orderBy(DB::raw('YEAR(fecha)'),DB::raw('MONTH(fecha)'),'asc')
        ->groupBy(DB::raw('YEAR(fecha)'),DB::raw('MONTH(fecha)'))
        ->get();
         */
        return view('reportes.performance');
    }
}
