<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\Http\Controllers\Controller;
use App\Piso;
use App\Sector;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support; 
use Illuminate\Foundation; 
use Illuminate\Support\Facades\Auth;

class AlarmaController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PisoCreateRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function ver_alarmas()
    {

        $groups = Grupo::select('grupos.id', 'grupos.nombre', 'grupos.piso_id', 'grupos.sector_id')
            ->join('alarmas', 'alarmas.grupo_id', '=', 'grupos.id')
            ->where('alarmas.mensaje', 'like', 1)
            ->groupBy('grupos.id', 'grupos.nombre', 'grupos.piso_id', 'grupos.sector_id')
            ->get();
            
            $alarm = array();
        foreach ($groups as $k) {
            $ng = $k->nombre;
            $ip = $k->piso_id;
            $is = $k->sector_id;

            //busco los nombres del piso
            $piso = Piso::select('pisos.nombre')
                ->where('id', $ip)
                ->get();
            foreach ($piso as $j) {
                $np = $j->nombre;

            };
            //busco los nombres del  sector
            $sector = Sector::select('sectores.nombre')
                ->where('id', $is)
                ->get();
            foreach ($sector as $l) {
                $ns = $l->nombre;

            }

           $ag = ["piso" => $np, "sector" => $ns , "grupo" => $ng];
           $alarm = array_prepend($alarm, $ag); 

        }
        $output = '<div class="table-responsive">
                    <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            Piso
                        </th>
                        <th>
                            Sector
                        </th>
                        <th>
                           Grupo
                        </th>
                    </tr>
                </thead>
                <tbody>';
         foreach($alarm as $a){
                $output .= '<tr>
                        <td>'.
                          $a["piso"].'
                        </td>
                        <td>'.
                         $a["sector"] .'         
                        </td>
                        <td>'.
                         $a["grupo"].'
                        </td>
                    </tr>';
            }
            $output .= '
                </tbody>
                 </table>
</div>';
            return $output;
        }
}
