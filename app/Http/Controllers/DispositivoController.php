<?php

namespace App\Http\Controllers;

use App\Dispositivo;
use App\Http\Controllers\Controller;
use App\Http\Requests\DispositivoCreateRequest;
use App\Http\Requests\DispositivoUpdateRequest;
use App\Piso;
use App\Sector;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;
use Session;

class DispositivoController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        //$this->middleware('mantenimiento');

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
            if ($request->get('sector')) {
                $s      = $request->get('sector');
                $sector = Sector::where('nombre', $request->get('sector'))
                    ->where('piso_id', $request->get('piso'))->get();
                $idSector = $sector->first()->id;
                // dd($idSector);
                $idPiso = $request->get('piso');

                $dispositivos = Dispositivo::where('piso_id', $idPiso)
                    ->where('sector_id', $idSector)->orderBy('nombre', 'desc')->paginate(3);
                $pisos = Piso::all();
                return view('dispositivo.index', compact('pisos', 'dispositivos'));
            } else {
                $pisos  = Piso::all();
                $idPiso = $request->get('piso');

                $dispositivos = Dispositivo::where('piso_id', $idPiso)->orderBy('nombre', 'desc')->paginate(3);
                $pisos        = Piso::all();
                return view('dispositivo.index', compact('pisos', 'dispositivos'));
            }
        } else {

            $pisos = Piso::all();

            $dispositivos = Dispositivo::paginate(10);

            return view('dispositivo.index', compact('pisos', 'dispositivos'));

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
        //dd($sectores);

        return view('dispositivo.create')->with('pisos', $pisos);

    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function store(DispositivoCreateRequest $request)
    {

        //dd($request->all());
        $dispositivo = Dispositivo::create($request->all());
        Session::flash('message', 'Dispositivo Creado Correctamente');

        return redirect('dispositivo');

    }

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function show($id)
    {
        $dis = Dispositivo::find($id);

        $sip = $dis->sector_id;

        $s   = Sector::find($sip);
        $pid = $s->piso_id;

        $p = Piso::find($pid);

        return view('dispositivo.show', compact('p', 's', 'dis'));
    }

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function edit($id)
    {
        $sectores    = Sector::all();
        $dispositivo = Dispositivo::findOrFail($id);
        return view('dispositivo.edit', compact('dispositivo', 'sectores'));

    }

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function update($id, DispositivoUpdateRequest $request)
    {
        $dispositivo = Dispositivo::find($id);
        $dispositivo->fill($request->all());
        $dispositivo->save();

        Session::flash('message', 'Dispositivo Editada Correctamente');
        return redirect('dispositivo');

    }

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        Dispositivo::destroy($id);
        Session::flash('message', 'Dispositivo Eliminada Correctamente');
        return redirect('dispositivo');
    }

    public function getSectores(Request $request, $id)
    {

        if ($request->ajax()) {
            $sectores = Sector::where('piso_id', '=', $id)->get();
            //dd($sectores);exit;
            return response()->json($sectores);
        }
    }
}
