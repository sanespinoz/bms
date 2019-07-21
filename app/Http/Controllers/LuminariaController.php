<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\Http\Controllers\Controller;
use App\Http\Requests\LuminariaCreateRequest;
use App\Http\Requests\LuminariaUpdateRequest;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\Input;
use App\Luminaria;
use App\Piso;
use App\Sector;
use App\Catalogo;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;
use Session;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;

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
                $idpiso = $request->get('piso');
             
                $lumins = Luminaria::where('grupo_id', $g)->orderBy('nombre', 'desc')->get();

                        //Paginacion
        
        $filter_products = []; // Manual filter or your array for pagination

        foreach($lumins as $lum){
            array_push($filter_products, $lum);    
        }

        $count = count($filter_products); // total dispositivos for pagination
        $page = $request->page; // current page for pagination

        // manually slice array of product to display on page
        $perPage = 4;
        $offset = ($page-1) * $perPage;
        $luminarias = array_slice($filter_products, $offset, $perPage);

        // your pagination 
        $luminarias = new Paginator($luminarias, $count, $perPage, $page, ['path'  => $request->url(),'query' => $request->query(),]);

        //Fin Paginacion

        $pisos = Piso::all();
         if(Auth::user()->rol_id == 5){
                       
                        return view('mantenimiento.luminaria.index', compact('pisos', 'luminarias'));
                    }else {
                        return view('luminaria.index', compact('pisos', 'luminarias'));                    
                    }
             
            } else {
// hay grupo o sector

                if ($request->get('sector') != "") {
                    //hay sector y no grupo
                    $idPiso     = $request->get('piso');
                    $idSector = $request->get('sector');
                    //$luminarias = Luminaria::searchluminarias($idPiso, $idSector, "");
//$luminarias = $lumis->paginate(3);
                    $pisos = Piso::all();
                    $luminarias = new Collection;
            $grupos     = Grupo::where('piso_id', $idPiso)
                ->where('sector_id', $idSector)
                ->get();
            //dd($grupos);
            foreach ($grupos as $g) {
                $idg = $g->id;

                $lumis = Luminaria::where('grupo_id', $idg)->get();
                $luminarias = $luminarias->merge($lumis);
            }

          //dd($luminarias);
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

                        $luminarias = Luminaria::where('grupo_id', $idGrupo)->orderBy('nombre', 'desc')->get();

                        $pisos = Piso::all();
                        return view('luminaria.index', compact('pisos', 'luminarias'));
                    } else {
                        //solo piso
                        $pisos  = Piso::all();
                        $piso   = $request->get('piso');
                        $grupos = Grupo::where('piso_id', $piso)->orderBy('nombre', 'desc')->get();
                        //dd($grupos);
                        $luminarias = new Collection;
                        foreach ($grupos as $g) {
                            $idg   = $g->id;
                            $lumis = Luminaria::where('grupo_id', $idg)->get();

                            $luminarias = $luminarias->merge($lumis);

                        }

                        //$luminarias = Luminaria::searchluminarias($piso, "", "");
                        //dd($luminarias);
                    if(Auth::user()->rol_id == 5){
                        die('mante');
                        return view('mantenimiento.luminaria.index', compact('pisos', 'luminarias'));
                    }else{
                        return view('luminaria.index', compact('pisos', 'luminarias'));                    
                    }                      
                    }

                }
            }

        } else {
//listado inicial sin filtro
            $pisos = Piso::all();

            $lumins = Luminaria::all();

                    //Paginacion
        
        $filter_products = []; // Manual filter or your array for pagination

        foreach($lumins as $lum){
            array_push($filter_products, $lum);    
        }

        $count = count($filter_products); // total dispositivos for pagination
        $page = $request->page; // current page for pagination

        // manually slice array of product to display on page
        $perPage = 4;
        $offset = ($page-1) * $perPage;
        $luminarias = array_slice($filter_products, $offset, $perPage);

        // your pagination 
        $luminarias = new Paginator($luminarias, $count, $perPage, $page, ['path'  => $request->url(),'query' => $request->query(),]);

        //Fin Paginacion
                           if(Auth::user()->rol_id == 5){
                       
                        return view('mantenimiento.luminaria.index', compact('pisos', 'luminarias'));
                    }else {
                        return view('luminaria.index', compact('pisos', 'luminarias'));                    
                    }

            
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
        if(Auth::user()->rol_id == 5){                       
        return view('mantenimiento.luminaria.create', compact('pisos'));
        }else {
         return view('luminaria.create', compact('pisos'));                    
        }
    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */

    public function store(LuminariaCreateRequest $request)
    {
        if (isset($errors) && $errors->any()){
             if(Auth::user()->rol_id == 5){                       
             return redirect('mantenimiento.luminaria')->withInput($request->all());
        }else {

              return redirect('luminaria')->withInput($request->all());
     }
       
        } else {
        $r = Luminaria::create($request->all());
        Session::flash('message', 'Luminaria Creada Correctamente');

         if(Auth::user()->rol_id == 5){                       
             return redirect('mantenimiento.luminaria')->withInput($request->all());
        }else {

              return redirect('luminaria')->withInput($request->all());
     }
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

        $l = Luminaria::find($id);
        $this->notFound($l);
        $f = $l->fecha_alta;

        $gip        = $l->grupo_id;
        $g          = Grupo::find($gip);
        $pid        = $g->piso_id;
        $p          = Piso::find($pid);
        $sid        = $g->sector_id;
        $s          = Sector::find($sid);
        $estado     = $l->estado($id);
        $estado_lum = $estado->estado;

         if(Auth::user()->rol_id == 5){                       
        return view('mantenimiento.luminaria.show', compact('p', 's', 'g', 'l', 'estado_lum'));
        }else {
         return view('luminaria.show', compact('p', 's', 'g', 'l', 'estado_lum'));
     }
    
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
        $this->notFound($luminaria);
        $pisos      = Piso::lists('nombre', 'id');
        $g          = $luminaria->grupo_id;
        $gr         = Grupo::findOrFail($g);
        $p          = $gr->piso_id;
        $gruposdelp = Grupo::where('piso_id', $p)->lists('nombre', 'id');
        $s          = $gr->sector_id;
        $sectdelp   = Sector::where('piso_id', $p)->lists('nombre', 'id');

               if(Auth::user()->rol_id == 5){                       
        return view('mantenimiento.luminaria.edit', compact('luminaria', 'pisos', 'sectdelp', 'gruposdelp', 'p', 'g', 's'));
        }else {
        return view('luminaria.edit', compact('luminaria', 'pisos', 'sectdelp', 'gruposdelp', 'p', 'g', 's'));                   
        }


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
        $this->notFound($luminaria);
        $luminaria->fill($request->all());
        if ($luminaria->fecha_baja == ""){
            $luminaria->fecha_baja = null;
        }

        $luminaria->save();

        Session::flash('message', 'Luminaria Editada Correctamente');
         if(Auth::user()->rol_id == 5){                       
        return redirect('mantenimiento.luminaria');
        }else {

         return redirect('luminaria');
     }

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
         if(Auth::user()->rol_id == 5){                       
        return redirect('mantenimiento.luminaria');
        }else {

         return redirect('luminaria');
     }
    }
    public function eliminar($id)
    { 
        $luminaria = Luminaria::find($id);
        $this->notFound($luminaria);

       if ($luminaria->estado($id)->estado == 0)
       { 
        Luminaria::destroy($id);
        Session::flash('message', 'Luminaria Eliminada Correctamente');
         if(Auth::user()->rol_id == 5){                       
        return redirect('mantenimiento.luminaria');
        }else {

         return redirect('luminaria');
     }
    } else {   

        Session::flash('error', 'La luminaria no puede eliminarse, se encuentra activa');

         if(Auth::user()->rol_id == 5){                       
        return redirect('mantenimiento.luminaria');
        }else {

         return redirect('luminaria');
     }
    }    
       
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
        if(Auth::user()->rol_id == 5){                       
        return view('mantenimiento.luminaria.index', compact('pisos', 'luminarias'));
        }else {
         return view('luminaria.index', compact('pisos', 'luminarias'));                
        }
            
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

    public function tipo(Request $request)
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
    public function voltaje_nominal(Request $request)
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

    public function corriente_nominal(Request $request)
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

    public function potencia_nominal(Request $request)
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

    public function obtsectores(Request $request)
    {
        //dd($request);die();
        if ($request->get('id')) {
            $query = $request->get('id');
            $data  = Sector::where('piso_id', '=', $id)->get();
            foreach ($data as $row) {
                $output = $row->temperatura;

            }

            return $output;
        }

    }
       public function sect(Request $request)
    {

        if ($request->get('query')) {

            $query = $request->get('query');
            $data  = Sector::where('piso_id', '=', $query)->get();

            return response()->json($data);

        }
    }

           public function groups(Request $request)
    {

        if ($request->get('sect') && $request->get('pis')) {

            $sect = $request->get('sect');
            $pis = $request->get('pis');
            $data = Grupo::where('piso_id', '=', $pis)
                ->where('sector_id', '=', $sect)
                ->get();
            return response()->json($data);

        }
    }


       public function catalog(Request $request)
    {
        //dd($request->catalogo_id);exit();
        if ($request->get('query')) {
            $query = $request->get('query');
            $data  = Catalogo::select('id')->where('nombre', '=', $query)
                ->first();
              

            return $data->id;
        }
    }

  public function paginate($items, $perPage = 2, $page = null, $baseUrl = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        $lap = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);

        if ($baseUrl) {
            $lap->setPath($baseUrl);
        }

        return $lap;
    }

}
