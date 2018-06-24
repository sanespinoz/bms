<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\GrupoCreateRequest;
use App\Http\Requests\GrupoUpdateRequest;
use App\Grupo;
use Session;
use Redirect;
use App\Sector;
use App\Piso;
use App\Luminaria;



class GrupoController extends Controller
{
    public function __construct()
    {

       $this->middleware('auth');
       $this->middleware('mantenimiento');
 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $grupos = Grupo::orderBy('nombre', 'asc')->paginate(2);


       return view('grupo.index', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //$pisos = Piso::all();


      $pisos = Piso::lists('nombre','id');
      //dd($pisos);
        //dd($users);


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
            $grupo = Grupo::create( $request->all());
            Session::flash('message','Grupo Creado Correctamente');
        //return redirect('/usuario')->with('message','store');
            return redirect('grupo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupo = Grupo::find($id);
        $luminarias = Luminaria::where('grupo_id',$id)->get();

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
        $sectores = Sector::all();
        $grupo = Grupo::findOrFail($id);
        return view('grupo.edit',compact('grupo','sectores'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,GrupoUpdateRequest $request)
    {
       $grupo= Grupo::find($id);
        $grupo->fill($request->all());
        $grupo->save();

         Session::flash('message','Grupo Editado Correctamente');
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
         Session::flash('message','Grupo Eliminado Correctamente');
         return redirect('grupo');

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


public function getSectores(Request $request, $id){
   if($request->ajax()){

   $sectores = Sector::sectores($id)->get();

   return response()->json($sectores);
    }
  }
}
