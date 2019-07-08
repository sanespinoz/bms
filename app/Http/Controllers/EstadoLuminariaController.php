<?php

namespace App\Http\Controllers;

use App\EstadoLuminaria;
use App\Http\Controllers\Controller;
use App\Luminaria;
use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;
use DateTime;
    


class EstadoLuminariaController extends Controller
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
    public function store(Request $request)
    {

        EstadoLuminaria::create($request->all());
        Session::flash('message', 'Estado editado'); // En efecto se crea un estado nuevo
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
   
     /*    $estado = DB::table('estado_luminarias')
        ->join('luminarias', 'luminarias.id', '=','estado_luminarias.luminaria_id')
        ->where('luminarias.id', '=',  $id)
        ->orderBy('fecha', 'desc')
        ->first();*/
        $f = EstadoLuminaria::select(DB::raw('MAX(fecha) as fecha'))
                    ->join('luminarias', 'estado_luminarias.luminaria_id', '=', 'luminarias.id')
                    ->where('luminarias.id', '=', $id)
                    ->first();
        $fech= $f->fecha;
        $est = EstadoLuminaria::select('id')
                ->where('fecha', $fech)
                ->orderBy('id', 'desc')
                ->first();
        $estad= $est->id;
         
        $estado = EstadoLuminaria::where('id', $estad)->first();
        $lumi = Luminaria::findOrFail($id);
    

        return view('estadoluminaria.show', compact('estado', 'lumi'));
    }

    public function estados_prev($id)
    {
        $estados = DB::table('estado_luminarias')
        ->where('luminaria_id',$id)
        ->orderBy('fecha', 'desc')->get();
        //->paginate(6);
        if (count($estados) == 1){
            $e = "No hay estados previos para la luminaria ";
             $lumi = Luminaria::findOrFail($id); 
            return view('estadoluminaria.showprev', compact('e','lumi'));
      }else {
        $lumi = Luminaria::findOrFail($id); 
         $estados = DB::table('estado_luminarias')
        ->where('luminaria_id',$id)
        ->orderBy('fecha', 'desc')->paginate(6);
  
        return view('estadoluminaria.showprev', compact('estados', 'lumi'));
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
      
         $estadolumi = EstadoLuminaria::find($id);
         $lumid = $estadolumi->luminaria_id;
        
        $f = EstadoLuminaria::select(DB::raw('MAX(fecha) as fecha'))
                    ->join('luminarias', 'estado_luminarias.luminaria_id', '=', 'luminarias.id')
                    ->where('luminarias.id', '=', $lumid)
                    ->first();
                   

        $fech= $f->fecha;
   
        $est = EstadoLuminaria::select('id')
                ->where('fecha', $fech)
                ->orderBy('id', 'desc')
                ->first();
        $estad= $est->id;
         
        $estadoluminaria = EstadoLuminaria::where('id', $estad)->first();
        //dd($estadoluminaria);

      /*  $estadoluminaria = EstadoLuminaria::where('luminaria_id', $id)
        ->orderBy('fecha', 'desc')
        ->first();
*/
        return view('estadoluminaria.edit', compact('estadoluminaria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstadoLuminariaUpdateRequest $request, $id)
    {

        $luminaria = Luminaria::find($id);

        $luminaria->fill($request->all());

        $luminaria->save();

        Session::flash('message', 'Estado de Luminaria Editado Correctamente');
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
        //
    }
}
