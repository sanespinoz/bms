<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rol;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect;
use Session;

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        $this->middleware('administrador');

        //$this->beforeFilter('@findUser',['only'=>['show','edit','update','destroy']]);
    }

/*
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index()
    {
        $users = User::orderBy('name', 'asc')->paginate(2);

        return view('user.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $rols = Rol::all();
        //dd($users);
        return view('user.create', compact('rols'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        User::create([
            'name'       => $request['name'],
            'email'      => $request['email'],
            'password'   => bcrypt($request['password']),
            'rol_id'     => $request['rol_id'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Session::flash('message', 'Usuario Creado Correctamente');

        return redirect('user');
        /*
    User::create( $request->all());
    Session::flash('message','Usuario Creado Correctamente');

    return redirect('user');
     */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
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
        $user = User::find($id);
        $rols = Rol::all();
        // show the edit form and pass the user
        return view('user.edit', compact('user', 'rols'));

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
        $user = User::find($id);
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
}
