<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\Http\Requests\GrupoCreateRequest;
use App\Http\Requests\GrupoUpdateRequest;
use App\Luminaria;
use App\Piso;
use App\Sector;
use App\Alarma;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;
use Session;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;

class GrupoController extends Controller
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
        // dd($request->get('piso'), $request->get('sector'));

        if ($request->get('piso') != "") {
//viene piso '%' . $s . '%'
            if ($request->get('sector')) {
                $s      = $request->get('sector');
                $sector = Sector::where('nombre', 'like', "%$s%")
                ->where('piso_id', $request->get('piso'))->get();
                $idSector = $sector->first()->id;
                //dd($sector);
                $idPiso = $request->get('piso');

                $grups = Grupo::where('piso_id', $idPiso)
                ->where('sector_id', $idSector)->orderBy('nombre', 'desc')->get();

                //Paginacion
                
        $filter_products = []; // Manual filter or your array for pagination

        foreach($grups as $grup){
            array_push($filter_products, $grup);    
        }

        $count = count($filter_products); // total dispositivos for pagination
        $page = $request->page; // current page for pagination

        // manually slice array of product to display on page
        $perPage = 3;
        $offset = ($page-1) * $perPage;
        $grupos = array_slice($filter_products, $offset, $perPage);

        // your pagination 
        $grupos = new Paginator($grupos, $count, $perPage, $page, ['path'  => $request->url(),'query' => $request->query(),]);

        //Fin Paginacion
        $pisos = Piso::all();
        return view('grupo.index', compact('pisos', 'grupos'));
    } else {

        $pisos  = Piso::all();
        $idPiso = $request->get('piso');

        $grups = Grupo::where('piso_id', $idPiso)->orderBy('nombre', 'desc')->get();
                //Paginacion
        
        $filter_products = []; // Manual filter or your array for pagination

        foreach($grups as $grup){
            array_push($filter_products, $grup);    
        }

        $count = count($filter_products); // total dispositivos for pagination
        $page = $request->pge; // current page for pagination

        // manually slice array of product to display on page
        $perPage = 3;
        $offset = ($page-1) * $perPage;
        $grupos = array_slice($filter_products, $offset, $perPage);

        // your pagination 
        $grupos = new Paginator($grupos, $count, $perPage, $page, ['path'  => $request->url(),'query' => $request->query(),]);

        //Fin Paginacion

        return view('grupo.index', compact('pisos', 'grupos'));
    }
} else {
    $pisos = Piso::all();

    $grupos = Grupo::paginate(3);
            //dd($grupos);
    return view('grupo.index', compact('pisos', 'grupos'));
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
        return view('grupo.create', compact('pisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GrupoCreateRequest $request)
    {
        if (isset($errors) && $errors->any()){
            return redirect('grupo')->withInput($request->all());
        } else {
            $grupo = Grupo::create($request->all());
            Session::flash('message', 'Grupo Creado Correctamente');

            return redirect('grupo'); 
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupo      = Grupo::find($id);
        $this->notFound($grupo);
        $luminarias = Luminaria::where('grupo_id', $id)->get();
        // dd($grupo,$luminarias);

        return view('grupo.show', compact('grupo', 'luminarias'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $pisos    = Piso::lists('nombre', 'id');
        $grupo    = Grupo::findOrFail($id);
        $this->notFound($grupo);
        $p          = $grupo->piso_id;
        $s          = $grupo->sector_id;
        $sectdelp   = Sector::where('piso_id', $p)->lists('nombre', 'id');
        return view('grupo.edit', compact('grupo', 'pisos', 'sectdelp', 'p', 's'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, GrupoUpdateRequest $request)
    {
        $grupo = Grupo::find($id);
        $this->notFound($grupo);
        $grupo->fill($request->all());
        $grupo->save();

        Session::flash('message', 'Grupo Editado Correctamente');
        return redirect('grupo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Grupo::destroy($id);
        Session::flash('message', 'Grupo Eliminado Correctamente');
        return redirect('grupo');

    }

    public function eliminar($id)
    {
        $grupo = Grupo::find($id);
        //$a = $grupo->alarmas;
        $a = Alarma::where('grupo_id', '=', $id)
        ->where('mensaje', 1)
        ->orderBy('fecha', 'desc')
        ->get(); 
//Ordena las alarmas del grupo por fechas mas actuales con true
        if ($a->isEmpty()){
            Grupo::destroy($id);
            Session::flash('message', 'Grupo Eliminado Correctamente');
            return redirect('grupo');
        } else {
            Session::flash('message', 'No puede realizar la acción. Contacte al Administrador de Energía');
            return redirect('grupo');
        }
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getSectores(Request $request, $id)
    {

        if ($request->ajax()) {
            dd($id);
            $sectores = Sector::where('piso_id', '=', $id)->get();
            return response()->json($sectores);
        }
    }

    public function buscar_grupos($piso, $sector = "")
    {

        $pisos = Piso::all();
        if ($piso == 0) {
            $pisosel = 0;
        } else {
            $pisosel = $pisos->find($piso);
        }

        $grupos = Grupo::Busqueda($pisosel, $sector)->paginate(3);
        // var_dump($grupos);
        return view('grupo.index', ['pisos' => $pisos, 'pisosel' => $pisosel, 'grupos' => $grupos]);
    }

}
