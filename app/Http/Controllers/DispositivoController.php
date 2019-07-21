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
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;

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
        //dd($request->get('piso'),$request->get('sector'));

        if ($request->get('piso') != "") {
           
        $s = $request->get('sector');
        $idpiso = $request->get('piso');
        $disposits = Dispositivo::where('piso_id', $idpiso)
                    ->where('sector_id', $s)->orderBy('nombre', 'desc')->get();
        //Paginacion
        
        $filter_products = []; // Manual filter or your array for pagination

        foreach($disposits as $disp){
            array_push($filter_products, $disp);    
        }

        $count = count($filter_products); // total dispositivos for pagination
        $page = $request->page; // current page for pagination

        // manually slice array of product to display on page
        $perPage = 2;
        $offset = ($page-1) * $perPage;
        $dispositivos = array_slice($filter_products, $offset, $perPage);

        // your pagination 
        $dispositivos = new Paginator($dispositivos, $count, $perPage, $page, ['path'  => $request->url(),'query' => $request->query(),]);

        //Fin Paginacion
       $pisos = Piso::all();
               if(Auth::user()->rol_id == 5){                       
        return view('mantenimiento.dispositivo.index',['dispositivos' => $dispositivos,'pisos'=>$pisos]);
        }else {
          return view('dispositivo.index',['dispositivos' => $dispositivos,'pisos'=>$pisos]);              
        }
       

        } else {

        $disposits = Dispositivo::all();

        //Paginacion 
        
        $filter_products = []; // Manual filter or your array for pagination

        foreach($disposits as $disp){            
                array_push($filter_products, $disp);            
        }

        $count = count($filter_products); // total dispositivos for pagination
        $page = $request->page; // current page for pagination

        // manually slice array of product to display on page
        $perPage = 2;
        $offset = ($page-1) * $perPage;
        $dispositivos = array_slice($filter_products, $offset, $perPage);

        // your pagination 
        $dispositivos = new Paginator($dispositivos, $count, $perPage, $page, ['path'  => $request->url(),'query' => $request->query(),]);
        //Fin Paginacion

        $pisos = Piso::all();
        if(Auth::user()->rol_id == 5){                       
        return view('mantenimiento.dispositivo.index',['dispositivos' => $dispositivos,'pisos'=>$pisos]);
        }else {
          return view('dispositivo.index',['dispositivos' => $dispositivos,'pisos'=>$pisos]);              
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
        return view('mantenimiento.dispositivo.create')->with('pisos', $pisos);
        }else {
          return view('dispositivo.create')->with('pisos', $pisos);              
        }        

    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function store(DispositivoCreateRequest $request)
    {
        if (isset($errors) && $errors->any()){
            if(Auth::user()->rol_id == 5){                       
        return redirect('mantenimiento.dispositivo')->with('error','seleccione piso y sector de los desplegables.')->withInput($request->all()); 
        }else {
          return redirect('dispositivo')->with('error','seleccione piso y sector de los desplegables.')->withInput($request->all());          
        }       
        } else {
        $dispositivo = Dispositivo::create($request->all());
        Session::flash('message', 'Dispositivo Creado Correctamente');
         if(Auth::user()->rol_id == 5){                       
        return redirect('mantenimiento.dispositivo');
        }else {
          return redirect('dispositivo');             
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
        $dis = Dispositivo::find($id);
        $this->notFound($dis);

        $sip = $dis->sector_id;

        $s   = Sector::find($sip);
        $pid = $s->piso_id;

        $p = Piso::find($pid);
         if(Auth::user()->rol_id == 5){                       
        return view('mantenimiento.dispositivo.show', compact('p', 's', 'dis'));
        }else {
         return view('dispositivo.show', compact('p', 's', 'dis'));             
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
        $pisos    = Piso::lists('nombre', 'id');
        $dispositivo = Dispositivo::findOrFail($id);
        $this->notFound($dispositivo);
        $p          = $dispositivo->piso_id;
        $s          = $dispositivo->sector_id;
        $e          = $dispositivo->estado;
        $sectdelp   = Sector::where('piso_id', $p)->lists('nombre', 'id');
       
        $estados = ["a" => "Activo", "m" => "Mantenimiento", "i" => "Inactivo", "f" => "Falla"];
        if(Auth::user()->rol_id == 5){                       
        return view('mantenimiento.dispositivo.edit', compact('dispositivo', 'pisos','sectdelp','p','s','estados','e'));
        }else {
        return view('dispositivo.edit', compact('dispositivo', 'pisos','sectdelp','p','s','estados','e'));          
        }

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
        $this->notFound($dispositivo);

        if(($request->estado != 'i') && ($request->fecha_baja != "")){

            if(Auth::user()->rol_id == 5){                       
            return redirect('mantenimiento.dispositivo')->with('error','La fecha de desinstalación debe estar vacía. Intentelo nuevamente.');
        }else {
            return redirect('dispositivo')->with('error','La fecha de desinstalación debe estar vacía. Intentelo nuevamente.');             
        } 

        }elseif(($request->estado == 'i') && ($request->fecha_baja < $request->fecha_alta)){

             if(Auth::user()->rol_id == 5){                       
             return redirect('mantenimiento.dispositivo')->with('error','La fecha de desinstalación debe ser posterior a la de instalación. Intentelo nuevamente.');
        }else {
             return redirect('dispositivo')->with('error','La fecha de desinstalación debe ser posterior a la de instalación. Intentelo nuevamente.');           
        } 

        }else{
            $dispositivo->fill($request->all());
            $dispositivo->save();

            Session::flash('message', 'Dispositivo Editada Correctamente');
              if(Auth::user()->rol_id == 5){                       
        return redirect('mantenimiento.dispositivo');
        }else {
         return redirect('dispositivo');            
        } 
               
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
        Dispositivo::destroy($id);
        Session::flash('message', 'Dispositivo Eliminada Correctamente');

         if(Auth::user()->rol_id == 5){                       
        return redirect('mantenimiento.dispositivo');
        }else {
         return redirect('dispositivo');            
        } 
    }   

        public function eliminar($id)
    { 
        $dispositivo = Dispositivo::find($id);

       if ($dispositivo->estado == 'i')
       { 
        Dispositivo::destroy($id);
        Session::flash('message', 'Dispositivo Eliminada Correctamente');
         if(Auth::user()->rol_id == 5){                       
        return redirect('mantenimiento.dispositivo');
        }else {
         return redirect('dispositivo');            
        } 
    } else {   
       Session::flash('error', 'El dispositivo no puede eliminarse, se encuentra activo');
         if(Auth::user()->rol_id == 5){                       
        return redirect('mantenimiento.dispositivo');
        }else {
         return redirect('dispositivo');            
        }  
       }
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
