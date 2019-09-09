<?php

namespace App\Http\Controllers;

use App\Edificio;
use App\Http\Controllers\Controller;
use App\Http\Requests\PisoCreateRequest;
use App\Http\Requests\PisoUpdateRequest;
use App\Piso;
use App\Sector;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use Redirect;
use Session;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;

class PisoController extends Controller
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
        $nomb_edificio = Edificio::first();
        $nombre = $nomb_edificio->nombre;
        $total = Piso::count();

        if ($request->get('piso') != "") {

            $p = $request->get('piso');
            $pisos    = Piso::all();
            $piss = Piso::where('id', $p)->paginate(3);        

            return view('pisos.index', compact('pisos','piss','nombre','total'));

        } else {
            $pisos    = Piso::all();
            $piss = Piso::orderBy('nombre', 'asc')->paginate(3);
            return view('pisos.index', compact('pisos','piss','nombre','total'));
            
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $nomb_edificio = Edificio::first();
     $nombre = $nomb_edificio->nombre;
     $edificios = Edificio::all();
     return view('pisos.create', compact('edificios','nombre'));
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PisoCreateRequest $request)
    {

        $piso = Piso::create($request->all());
        Session::flash('message', 'Piso Creado Correctamente');
        return redirect('pisos');

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
     $piso = Piso::find($id);
     $this->notFound($piso);

     $sectores = Sector::where('piso_id', $id)->get();

     return view('pisos.show', compact('piso', 'sectores','nombre'));

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
      $piso      = Piso::findOrFail($id);
      $this->notFound($piso);
      $edificios = Edificio::lists('nombre', 'id');
      $e = $piso->edificio_id;
      return view('pisos.edit', compact('piso', 'edificios','e','nombre'));

  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, PisoUpdateRequest $request)
    {

      $piso = Piso::find($id);
      $this->notFound($piso);
      $piso->fill($request->all());
      $piso->save();
      Session::flash('message', 'Piso Editado Correctamente');
      return redirect('pisos');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Piso::destroy($id);
        Session::flash('message', 'Piso Eliminado Correctamente');
        return redirect('pisos');

    }
    public function eliminar($id)
    {
        try{
            Piso::destroy($id);
            Session::flash('message', 'Piso Eliminado Correctamente');
            return redirect('pisos'); 
        } catch (QueryException $e){

            Session::flash('message1', 'No se puede eliminar el Piso, tiene Sectores asociados');
            return redirect('pisos'); 
        }
    }
}
