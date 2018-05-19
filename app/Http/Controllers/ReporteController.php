<?php

namespace App\Http\Controllers;

use DB;
use App\EnergiaPiso;
use Illuminate\Http\Request;
use App\Rol;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { // select('rols.id','rols.rol')->get();
        $etotals = EnergiaPiso::
            select(DB::raw('SUM(energia_pisos.energia) as energia, pisos.nombre'))
            ->join('pisos',function ($join) {
                $join->on('pisos.id', '=', 'energia_pisos.piso_id')
                    ->where('energia_pisos.fecha', '>', 2017);
                    })
            ->groupBy('pisos.nombre')
           ->get();


        $eiluminacions = EnergiaPiso::
        select(DB::raw('SUM(energia_pisos.energia_iluminacion) as energia, pisos.nombre'))
            ->join('pisos','pisos.id','=', 'energia_pisos.piso_id' )
            ->groupBy('pisos.nombre')
            ->get();
         //var_dump($pastel);die('hi');

        $anios = EnergiaPiso::
        select(DB::raw('YEAR(fecha) as anio'))
            -> distinct()
            ->orderBy('anio', 'desc')
            ->get();
/*
var_dump($anios);
die('s');

*/
return view('reportes.ener',['etotals'=>$etotals, 'eiluminacions'=>$eiluminacions, 'anios'=>$anios]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
