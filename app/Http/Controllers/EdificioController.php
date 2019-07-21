<?php

namespace App\Http\Controllers;

use App\Edificio;
use App\Http\Controllers\Controller;
use App\Http\Requests\EdificioCreateRequest;
use App\Http\Requests\EdificioUpdateRequest;
use App\Piso;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;

class EdificioController extends Controller
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
        $edificios = Edificio::orderBy('nombre', 'asc')->paginate(3);
        //dd($edificios);

        return view('edificio.index', compact('edificios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('edificio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EdificioCreateRequest $request)
    {

        Edificio::create($request->all());
        Session::flash('message', 'Edificio Creado Correctamente');

        return redirect('edificio');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $edificio = Edificio::find($id);
        $this->notFound($edificio);

        $pisos = Piso::where('edificio_id', $id)->get();

        return view('edificio.show', compact('edificio', 'pisos'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edificio = Edificio::find($id);
        $this->notFound($edificio);
        return view('edificio.edit', ['edificio' => $edificio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, EdificioUpdateRequest $request)
    {
        $edificio = Edificio::find($id);
        $edificio->fill($request->all());
        $edificio->save();
        Session::flash('message', 'Edificio Editado Correctamente');
        return redirect('edificio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Edificio::destroy($id);
        Session::flash('message', 'Edificio Eliminado Correctamente');
        return redirect('edificio');

    }

    public function eliminar($id)
    {
        Edificio::destroy($id);
        Session::flash('message', 'Edificio Eliminado Correctamente');
        return redirect('edificio');
    }
}


