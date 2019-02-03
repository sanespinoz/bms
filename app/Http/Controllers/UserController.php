<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Rol;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;
use Session;

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
        if ($request->get('rol') != "") {

            if ($request->get('name')) {
                $n     = $request->get('name');
                $r     = $request->get('rol');
                $users = User::where('name', 'LIKE', "%$n%")->
                    where('rol_id', '=', $r)->paginate(6);

                $roles = Rol::all();
                return view('user.index', compact('roles', 'users'));
            } else {

                $roles = Rol::all();
                $idRol = $request->get('rol');

                $users = User::where('rol_id', $idRol)->orderBy('name', 'desc')->paginate(6);

                return view('user.index', compact('roles', 'users'));
            }
        } else {

            $roles = Rol::all();

            $users = User::paginate(6);

            return view('user.index', compact('roles', 'users'));

        }

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
    public function store(UserCreateRequest $request)
    {

        \App\User::create([
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

        $user   = User::findOrFail($id);
        $userid = $user->rol_id;
        $rolse  = Rol::where('id', $userid)->lists('rol', 'id');
        $rols   = Rol::lists('rol', 'id');
        // show the edit form and pass the user
        return view('user.edit', compact('user', 'rols', 'rolse'));

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
