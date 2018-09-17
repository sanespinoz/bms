<?php

namespace App\Http\Controllers;

use App\Http\Requests\LuminariaCreateRequest;
use App\Http\Requests\LuminariaUpdateRequest;
use App\Piso;
use App\Sector;
use App\Luminaria;
use App\Grupo;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LuminariaController extends Controller
{

	public function __construct()
	{

	   $this->middleware('auth');
	   //$this->middleware('mantenimiento');
      	   

		//$this->beforeFilter('@findUser',['only'=>['show','edit','update','destroy']]);
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $luminarias =Luminaria::orderBy('nombre', 'asc')->paginate(3);
        return view('luminaria.index', compact('luminarias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pisos = Piso::lists('nombre','id');
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
        Luminaria::create( $request->all());
            Session::flash('message','Luminaria Creada Correctamente');

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
              
        $p = Luminaria::find($id);
       // $f=json_encode($p);
        $grupo = Grupo::where('id',$p->grupo_id)->get();
       
        //$piso = Piso::where('id',$grupo->piso_id)->get();
       // $sector = Sector::where('id',$grupo->sector_id)->get();
dd($p,$grupo);
        return view('luminaria.show',compact('p'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $luminaria = Luminaria::findOrFail($id);
       // var_dump($luminaria);die();
        return view('luminaria.edit',compact('luminaria','grupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,LuminariaUpdateRequest $request)
    {
            $luminaria= Luminaria::find($id);
            $luminaria->fill($request->all());
            $luminaria->save();

         Session::flash('message','Luminaria Editada Correctamente');
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
         Session::flash('message','Luminaria Eliminada Correctamente');
         return redirect('luminaria');
    }

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


public function getGrupos(Request $request, $idp, $ids){
    if($request->ajax()){
       $grupos = Grupo::where('piso_id','=',$idp)
       ->where('sector_id','=',$ids)
       ->get();
      return response()->json($grupos);
    }
  }

public function getSectores(Request $request, $id){
   if($request->ajax()){
         $sectores = Sector::sectores($id)->get();
          return response()->json($sectores);
    }
  }
}
