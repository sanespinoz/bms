<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Rol;
use App\Edificio;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;
use Session;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }

/*
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index(Request $request)
{
   $nomb_edificio = Edificio::first();
   $nombre = $nomb_edificio->nombre;
   if ($request->get('rol') != "") {

    $r     = $request->get('rol');
    $nombre_rol = Rol::select('rol')->where('id',$r)->first();
    $nombre_rol = $nombre_rol->rol;
    if ($request->get('nombre')) {
        $n     = $request->get('nombre');
        
        $usuarios = User::where('nombre', 'LIKE', "%$n%")->orwhere('apellido', 'LIKE', "%$n%")->
        where('rol_id', '=', $r)->get();

                //Paginacion

        $filter_products = []; // Manual filter or your array for pagination

        foreach($usuarios as $usu){
            array_push($filter_products, $usu);    
        }

        $count = count($filter_products); // total dispositivos for pagination
        $page = $request->page; // current page for pagination

        // manually slice array of product to display on page
        $perPage = 2;
        $offset = ($page-1) * $perPage;
        $users = array_slice($filter_products, $offset, $perPage);
        $users = new Paginator($users, $count, $perPage, $page, ['path'  => $request->url(),'query' => $request->query(),]);

        //Fin Paginacion
        $titulo =' para el rol '.$nombre_rol.', Nombre y/o Apellido '. $n; 
        $roles = Rol::all();
        return view('user.index', compact('roles', 'users','nombre','titulo'));
    } else {

        $roles = Rol::all();
        $idRol = $request->get('rol');

        $usuarios = User::where('rol_id', $idRol)->orderBy('nombre', 'desc')->get();

                                //Paginacion
        
        $filter_products = []; // Manual filter or your array for pagination

        foreach($usuarios as $usu){
            array_push($filter_products, $usu);    
        }

        $count = count($filter_products); // total dispositivos for pagination
        $page = $request->page; // current page for pagination

        // manually slice array of product to display on page
        $perPage = 2;
        $offset = ($page-1) * $perPage;
        $users = array_slice($filter_products, $offset, $perPage);
        $users = new Paginator($users, $count, $perPage, $page, ['path'  => $request->url(),'query' => $request->query(),]);

        //Fin Paginacion
        $titulo =' para el rol '. $nombre_rol; 

        return view('user.index', compact('roles', 'users','nombre','titulo'));
    }
} else {

    if ($request->get('nombre')) {
        $n     = $request->get('nombre');
        
        $usuarios = User::where('nombre', 'LIKE', "%$n%")->orwhere('apellido', 'LIKE', "%$n%")->get();

                //Paginacion

        $filter_products = []; // Manual filter or your array for pagination

        foreach($usuarios as $usu){
            array_push($filter_products, $usu);    
        }

        $count = count($filter_products); // total dispositivos for pagination
        $page = $request->page; // current page for pagination

        // manually slice array of product to display on page
        $perPage = 2;
        $offset = ($page-1) * $perPage;
        $users = array_slice($filter_products, $offset, $perPage);
        $users = new Paginator($users, $count, $perPage, $page, ['path'  => $request->url(),'query' => $request->query(),]);

        //Fin Paginacion

        $roles = Rol::all();
        $titulo =' con Nombre y/o Apellido '. $n; 
        return view('user.index', compact('roles', 'users','nombre','titulo'));

    } else {
        $roles = Rol::all();

        $users = User::paginate(3);
        $titulo =''; 

        return view('user.index', compact('roles', 'users','nombre','titulo'));
    }
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
       $rols = Rol::orderBy('id','desc')->get();

       return view('user.create', compact('rols','nombre'));
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        \App\User::create([
            'apellido' => $request['apellido'],
            'nombre'   => $request['nombre'],
            'name'     => $request['name'],
            'email'    => $request['email'],
            'password' => $request['password'],
            
            'rol_id'   => $request['rol_id'],

            ]);
        Session::flash('message', 'Usuario Creado Correctamente');

        return redirect('user');

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
       $user = User::find($id);
       $this->notFound($user);

       return view('user.show', compact('user','nombre'));
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the user
       $nomb_edificio = Edificio::first();
       $nombre = $nomb_edificio->nombre;
       $user   = User::findOrFail($id);
       $this->notFound($user);
       $userid = $user->rol_id;
       $rolse  = Rol::where('id', $userid)->lists('rol', 'id');
       $rols   = Rol::lists('rol', 'id');
       
        // show the edit form and pass the user
       return view('user.edit', compact('user', 'rols', 'rolse','userid','nombre'));

   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UserUpdateRequest $request)
    {
        $user = User::find($id);
        $this->notFound($user);
        $user->fill($request->all());
        $user->save();

        Session::flash('message', 'Usuario Editado Correctamente');
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('message', 'Usuario Eliminado Correctamente');
        return redirect('user');
    }

    public function eliminar($id)
    {
        User::destroy($id);
        Session::flash('message', 'Usuario Eliminado Correctamente');
        return redirect('user');
    }


    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}
