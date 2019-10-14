<?php

namespace App\Http\Controllers;

use App\EstadoLuminaria;
use App\Http\Controllers\Controller;
use App\Edificio;
use App\Luminaria;
use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class EstadoLuminariaController extends Controller
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
    {      // dd($request);
     if (isset($errors) && $errors->any()){
      return redirect('luminaria')->withInput($request->all());
    } else {

      $fecha_actualizacion = Carbon::now();
      \App\EstadoLuminaria::create([
        'estado' => $request['estado'],
        'luminaria_id'   => $request['luminaria_id'],
        'observacion'     => $request['observacion'],
        'fecha'    => $fecha_actualizacion,
        ]);

        Session::flash('message', 'Estado editado'); // En efecto se crea un estado nuevo
        if(Auth::user()->rol_id == 5){                       
          return redirect('mantenimiento.luminaria');
        }else {
         return redirect('luminaria');
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
      $nomb_edificio = Edificio::first();
      $nombre = $nomb_edificio->nombre;
      $f = EstadoLuminaria::select(DB::raw('MAX(fecha) as fecha'))
      ->join('luminarias', 'estado_luminarias.luminaria_id', '=', 'luminarias.id')
      ->where('luminarias.id', '=', $id)
      ->first();
      $fech= $f->fecha;
      $est = EstadoLuminaria::select('id')
      ->where('fecha', $fech)
      ->where('luminaria_id',$id)
      ->orderBy('id', 'desc')
      ->first();
      $estad= $est->id;

      $estado = EstadoLuminaria::where('id', $estad)->first();
      $lumi = Luminaria::findOrFail($id);
      $this->notFound($lumi);
      if(Auth::user()->rol_id == 5){                       
        return view('mantenimiento.estadoluminaria.show', compact('estado', 'lumi','nombre'));
      }else {
        return view('estadoluminaria.show', compact('estado', 'lumi','nombre'));
      }

    }

    public function estados_prev($id)
    {  
      $nomb_edificio = Edificio::first();
      $nombre = $nomb_edificio->nombre;
      $estados = DB::table('estado_luminarias')
      ->where('luminaria_id',$id)
      ->orderBy('fecha', 'desc')->get();
        //->paginate(6);
      if (count($estados) == 1){
        $e = "No hay estados previos para la luminaria ";
        $lumi = Luminaria::findOrFail($id); 
        if(Auth::user()->rol_id == 5){                       
          return view('mantenimiento.estadoluminaria.showprev', compact('e','lumi','nombre'));
        }else {

          return view('estadoluminaria.showprev', compact('e','lumi','nombre'));
        }


      }else {
        $lumi = Luminaria::findOrFail($id); 
        $this->notFound($lumi);
        $estados = DB::table('estado_luminarias')
        ->where('luminaria_id',$id)
        ->orderBy('fecha', 'desc')->paginate(3);
        if(Auth::user()->rol_id == 5){                       
          return view('mantenimiento.estadoluminaria.showprev', compact('estados', 'lumi','nombre'));
        }else {

          return view('estadoluminaria.showprev', compact('estados', 'lumi','nombre'));
        }

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
     
     $nomb_edificio = Edificio::first();
     $nombre = $nomb_edificio->nombre;
     $estadoluminaria = EstadoLuminaria::find($id);
     $lumid = $estadoluminaria->luminaria_id;
     $lumi = Luminaria::findOrFail($lumid);

     if(Auth::user()->rol_id == 5){                       
      return view('mantenimiento.estadoluminaria.edit', compact('estadoluminaria','nombre','lumi'));
    }else {

     return view('estadoluminaria.edit', compact('estadoluminaria','nombre','lumi'));
   }

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
      $this->notFound($luminaria);

      $luminaria->fill($request->all());

      $luminaria->save();

      Session::flash('message', 'Estado de Luminaria Editado Correctamente');
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
        //
    }
  }
