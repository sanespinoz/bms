<?php

namespace App\Http\Controllers;

use App\Edificio;
use App\Http\Controllers\Controller;
use App\Http\Requests\PisoCreateRequest;
use App\Piso;
use App\Sector;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        if ($request->get('piso') != "") {
            $n = $request->get('piso');

            $pisos = Piso::where('nombre', 'like', "%$n%")->paginate(2);

            return view('pisos.index', compact('pisos'));
            //dd($piso);
            //dd($request->get('piso'));

        } else {
            $pisos = Piso::orderBy('nombre', 'asc')->paginate(2);

            return view('pisos.index', compact('pisos'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edificios = Edificio::all();
        return view('pisos.create', compact('edificios'));
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
        Session::flash('message', 'Grupo Creado Correctamente');
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
        $piso = Piso::find($id);
        $this->notFound($piso);

        $sectores = Sector::where('piso_id', $id)->get();

        return view('pisos.show', compact('piso', 'sectores'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $piso      = Piso::findOrFail($id);
        $this->notFound($piso);
        $edificios = Edificio::lists('nombre', 'id');
        $e = $piso->edificio_id;
        return view('pisos.edit', compact('piso', 'edificios','e'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
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
}
