<?php

namespace App\Http\Controllers;

use App\EstadoLuminaria;
use App\Http\Controllers\Controller;
use App\Luminaria;
use Illuminate\Http\Request;
use Redirect;
use Session;

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
        //dd($id me falta guardar el id de la luminiaria del estado);
        // $estadoluminaria = EstadoLuminaria::where('luminaria_id', $id)->first();

        return view('estadoluminaria.edit');
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
        Session::flash('message', 'Estado Creado Correctamente');
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

        $estados = EstadoLuminaria::where('luminaria_id', $id)->paginate(10);
        // dd($estado); trae los estados de la luminaria con fechas como un log
        $luminaria = Luminaria::findOrFail($id);

        return view('estadoluminaria.show', compact('estados', 'luminaria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadoLuminaria = EstadoLuminaria::where('luminaria_id', $id)->get();

        return view('estadoluminaria.edit', compact('estadoLuminaria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
