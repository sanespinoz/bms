<?php

namespace App\Http\Controllers;

use App\Http\Requests\EdificioCreateRequest;
use App\Http\Requests\EdificioUpdateRequest;
use App\Edificio;
use App\Piso;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EdificioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edificios = Edificio::orderBy('nombre', 'asc')->paginate();

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
        $edificio = Edificio::create($request->all());
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

        $pisos = Piso::where('edificio_id', $id)->get();
        /*echo '<pre>';
        print_r($pisos);
        echo '</pre>';
         */

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
}
