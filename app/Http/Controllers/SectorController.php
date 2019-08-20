<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectorCreateRequest;
use App\Http\Requests\SectorUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use App\Piso;
use App\Edificio;
use App\Sector;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;
use Session;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\MessageBag;

class SectorController extends Controller
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
      if ($request->get('piso') != "") {
        $p = $request->get('piso');
        $pisos    = Piso::all();
        $nomb_piso = Piso::select('nombre')->where('id',$p)->first();
        $nombre_piso= 'para el '.$nomb_piso->nombre;
        $sects = Sector::where('piso_id', $p)->orderBy('nombre', 'asc')->get();

            //Paginacion
        
        $filter_products = []; // Manual filter or your array for pagination

        foreach($sects as $sect){
            array_push($filter_products, $sect);    
        }

        $count = count($filter_products); // total dispositivos for pagination
        $page = $request->page; // current page for pagination

        // manually slice array of product to display on page
        $perPage = 4;
        $offset = ($page-1) * $perPage;
        $sectores = array_slice($filter_products, $offset, $perPage);

        // your pagination 
        $sectores = new Paginator($sectores, $count, $perPage, $page, ['path'  => $request->url(),'query' => $request->query(),]);

        //Fin Paginacion

        return view('sector.index', compact('pisos', 'sectores','nombre','nombre_piso'));
    } else {
        $sects = Sector::all();
        $pisos    = Piso::all();

           //Paginacion
        
        $filter_products = []; // Manual filter or your array for pagination

        foreach($sects as $sect){
            array_push($filter_products, $sect);    
        }

        $count = count($filter_products); // total dispositivos for pagination
        $page = $request->page; // current page for pagination

        // manually slice array of product to display on page
        $perPage = 8;
        $offset = ($page-1) * $perPage;
        $sectores = array_slice($filter_products, $offset, $perPage);

        // your pagination 
        $sectores = new Paginator($sectores, $count, $perPage, $page, ['path'  => $request->url(),'query' => $request->query(),]);
        $nombre_piso ='en el edificio';

        return view('sector.index', compact('pisos', 'sectores','nombre','nombre_piso'));
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
      $pisos = Piso::all();

      return view('sector.create', compact('pisos','nombre'));
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectorCreateRequest $request)
    {

        Sector::create($request->all());
        Session::flash('message', 'Sector Creado Correctamente');
        return redirect('sector');
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $nomb_edificio = Edificio::first();
      $nombre = $nomb_edificio->nombre;
      $sector = Sector::find($id);
      $this->notFound($sector);
      $grupos = $sector->grupos;
        //dd($sector,$grupos);

      return view('sector.show', compact('sector', 'grupos','nombre'));
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
      $pisos = Piso::lists('nombre', 'id');
      $sector = Sector::findOrFail($id);
      $this->notFound($sector);
      $p          = $sector->piso_id;
      return view('sector.edit', compact('sector', 'pisos','p','nombre'));
  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, SectorUpdateRequest $request)
    {

        $sector = Sector::find($id);
        $this->notFound($sector);
        $sector->fill($request->all());
        $sector->save();

        Session::flash('message', 'Sector Editado Correctamente');
        return redirect('sector');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sector::destroy($id);
        Session::flash('message', 'Sector Eliminado Correctamente');
        return redirect('sector');
    }

    public function eliminar($id)
    {
        try{
            Sector::destroy($id);
            Session::flash('message', 'Sector Eliminado Correctamente');
            return redirect('sector'); 
        } catch (QueryException $e){

            Session::flash('message1', 'No se puede eliminar el Sector, tiene Grupos asociados');
            return redirect('sector'); 
        }
    }
    public function sectores($piso)
    {

        $sectores = Sector::where('piso_id', $piso)->get();
        return $sectores;

    }

}
