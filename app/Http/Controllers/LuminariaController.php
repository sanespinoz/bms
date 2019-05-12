<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\Http\Controllers\Controller;
use App\Http\Requests\LuminariaCreateRequest;
use App\Http\Requests\LuminariaUpdateRequest;
use App\Luminaria;
use App\Piso;
use App\Sector;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;
use Session;

class LuminariaController extends Controller
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

        if ($request->get('piso') != "") {
//viene piso

            if ($request->get('sector') && $request->get('grupo')) {
                $s      = $request->get('sector');
                $g      = $request->get('grupo');
                $sector = Sector::where('nombre', $request->get('sector'))
                    ->where('piso_id', $request->get('piso'))->get();
                $idSector = $sector->first()->id;
                // dd($idSector);
                $grupo = Grupo::where('nombre', $request->get('grupo'))
                    ->where('piso_id', $request->get('piso'))
                    ->where('sector_id', $idSector)->get();
                $idGrupo = $grupo->first()->id;
                //dd($idGrupo);
                // dd($idGrupo); 44
                $idPiso = $request->get('piso');

                $luminarias = Luminaria::where('grupo_id', $idGrupo)->orderBy('nombre', 'desc')->paginate(10);
                $pisos      = Piso::all();

                return view('luminaria.index', compact('pisos', 'luminarias'));

            } else {
// hay grupo o sector

                if ($request->get('sector') != "") {
                    //hay sector y no grupo

                    $sector = Sector::where('nombre', $request->get('sector'))
                        ->where('piso_id', $request->get('piso'))->get();
                    //dd($sector);
                    $idSector = $sector->first()->id;

                    $idPiso     = $request->get('piso');
                    $luminarias = Luminaria::searchluminarias($idPiso, $idSector, "");

                    $pisos = Piso::all();
                    return view('luminaria.index', compact('pisos', 'luminarias'));

                } else {
                    //hay grupo o nada

                    if ($request->get('grupo') != "") {

                        $g = $request->get('grupo');
                        //Hay grupo

                        $grupo = Grupo::where('nombre', $g)
                            ->where('piso_id', $request->get('piso'))->get();
                        //dd($grupo);
                        $idGrupo = $grupo->first()->id;

                        $luminarias = Luminaria::where('grupo_id', $idGrupo)->orderBy('nombre', 'desc')->paginate(3);

                        $pisos = Piso::all();
                        return view('luminaria.index', compact('pisos', 'luminarias'));
                    } else {
                        //solo piso
                        $pisos  = Piso::all();
                        $piso   = $request->get('piso');
                        $grupos = Grupo::where('piso_id', $piso)->orderBy('nombre', 'desc')->paginate(3);
                        //dd($grupos);
                        $luminarias = new Collection;
                        foreach ($grupos as $g) {
                            $idg   = $g->id;
                            $lumis = Luminaria::where('grupo_id', $idg)->get();

                            $luminarias = $luminarias->merge($lumis);

                        }

                        //$luminarias = Luminaria::searchluminarias($piso, "", "");
                        //dd($luminarias);
                        return view('luminaria.index', compact('pisos', 'luminarias'));
                    }

                }
            }

        } else {
//listado inicial sin filtro
            $pisos = Piso::all();

            $luminarias = Luminaria::paginate(10);

            return view('luminaria.index', compact('pisos', 'luminarias'));
        }
    }

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function create()
    {

        $pisos = Piso::lists('nombre', 'id');
        //dd($pisos);
        return view('luminaria.create', compact('pisos'));
    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function store(LuminariaCreateRequest $request)
    {

        $r = Luminaria::create($request->all());
        //dd($r);
        Session::flash('message', 'Luminaria Creada Correctamente');

        return redirect('luminaria');

    }

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function show($id)
    {

        $l = Luminaria::find($id);
        $f = $l->fecha_alta;

        $gip        = $l->grupo_id;
        $g          = Grupo::find($gip);
        $pid        = $g->piso_id;
        $p          = Piso::find($pid);
        $sid        = $g->sector_id;
        $s          = Sector::find($sid);
        $estado     = $l->estado($id);
        $estado_lum = $estado->estado;
        return view('luminaria.show', compact('p', 's', 'g', 'l', 'estado_lum'));
        //return view('luminaria.show', compact('p', 's', 'g', 'l'));
    }

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function edit($id)
    {

        $luminaria  = Luminaria::findOrFail($id);
        $pisos      = Piso::lists('nombre', 'id');
        $g          = $luminaria->grupo_id;
        $gr         = Grupo::findOrFail($g);
        $p          = $gr->piso_id;
        $gruposdelp = Grupo::where('piso_id', $p)->lists('nombre', 'id');
        $s          = $gr->sector_id;
        $sectdelp   = Sector::where('piso_id', $p)->lists('nombre', 'id');

        //dd($gruposdelp);die();
        return view('luminaria.edit', compact('luminaria', 'pisos', 'sectdelp', 'gruposdelp', 'p', 'g', 's'));

    }

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function update($id, LuminariaUpdateRequest $request)
    {
        $luminaria = Luminaria::find($id);
        $luminaria->fill($request->all());
        $luminaria->save();

        Session::flash('message', 'Luminaria Editada Correctamente');
        return redirect('luminaria');

    }

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        Luminaria::destroy($id);
        Session::flash('message', 'Luminaria Eliminada Correctamente');
        return redirect('luminaria');
    }

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */

    public function getGrupos(Request $request, $idp, $ids)
    {
        if ($request->ajax()) {
            $grupos = Grupo::where('piso_id', '=', $idp)
                ->where('sector_id', '=', $ids)
                ->get();
            return response()->json($grupos);
        }
    }

    public function getSectores(Request $request, $id)
    {
        if ($request->ajax()) {
            $sectores = Sector::where('piso_id', '=', $id)->get();

            return response()->json($sectores);
        }
    }

    public function getLuminarias(Request $request, $piso, $sector, $grupo)
    {
        if ($request->ajax()) {
            $luminarias = Luminaria::where('grupo_id', '=', $grupo)->get();
            $pisos      = Piso::lists('nombre', 'id');

            return view('luminaria.index', compact('pisos', 'luminarias'));
        }

    }

    public function fetch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data  = DB::table('catalogos')
                ->where('nombre', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output .= '
       <li><a href="#">' . $row->nombre . '</a></li>
       ';
            }
            $output .= '</ul>';
            return $output;
        }
    }

    public function info(Request $request)
    {

        if ($request->get('query')) {
            $query = $request->get('query');
            $data  = DB::table('catalogos')
                ->where('nombre', 'LIKE', "%{$query}%")
                ->get();

            foreach ($data as $row) {
                $output = $row->tipo;
            }

            return $output;
        }
    }
    public function descripcion(Request $request)
    {

        if ($request->get('query')) {
            $query = $request->get('query');
            $data  = DB::table('catalogos')
                ->where('nombre', 'LIKE', "%{$query}%")
                ->get();

            foreach ($data as $row) {
                $output = $row->descripcion;
            }

            return $output;
        }
    }
    public function dimensiones(Request $request)
    {

        if ($request->get('query')) {
            $query = $request->get('query');
            $data  = DB::table('catalogos')
                ->where('nombre', 'LIKE', "%{$query}%")
                ->get();

            foreach ($data as $row) {
                $output = $row->dimensiones;
            }

            return $output;
        }
    }
    public function volt(Request $request)
    {

        if ($request->get('query')) {
            $query = $request->get('query');
            $data  = DB::table('catalogos')
                ->where('nombre', 'LIKE', "%{$query}%")
                ->get();

            foreach ($data as $row) {
                $output = $row->voltaje_nominal;
            }

            return $output;
        }
    }

    public function corr(Request $request)
    {

        if ($request->get('query')) {
            $query = $request->get('query');
            $data  = DB::table('catalogos')
                ->where('nombre', 'LIKE', "%{$query}%")
                ->get();

            foreach ($data as $row) {
                $output = $row->corriente_nominal;
            }

            return $output;
        }
    }

    public function pot(Request $request)
    {

        if ($request->get('query')) {
            $query = $request->get('query');
            $data  = DB::table('catalogos')
                ->where('nombre', 'LIKE', "%{$query}%")
                ->get();

            foreach ($data as $row) {
                $output = $row->potencia_nominal;
            }

            return $output;
        }
    }
    public function vida_util(Request $request)
    {

        if ($request->get('query')) {
            $query = $request->get('query');
            $data  = DB::table('catalogos')
                ->where('nombre', 'LIKE', "%{$query}%")
                ->get();

            foreach ($data as $row) {
                $output = $row->vida_util;
            }

            return $output;
        }
    }

    public function temperatura(Request $request)
    {

        if ($request->get('query')) {
            $query = $request->get('query');
            $data  = DB::table('catalogos')
                ->where('nombre', 'LIKE', "%{$query}%")
                ->get();

            foreach ($data as $row) {
                $output = $row->temperatura;
            }

            return $output;
        }
    }

}
