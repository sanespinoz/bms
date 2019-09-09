<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\Http\Requests\MessageCreateRequest;
use Illuminate\Support\Facades\Mail;
use Redirect;
use Session;


class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageCreateRequest $request)
    { 
        if (isset($errors) && $errors->any()){

            return Redirect::to('/#contacto')->withInput($request->all());
            
        } else {
            Mail::send('emails.contact', $request->all(), function ($m) {
     //$m->from($request->email, $request->name);

                $m->to('san.espinoz@gmail.com','Sandra Espinoza');
                $m->subject('Email de contacto');
                
            });
            Session::flash('message', 'Mensaje enviado correctamente');
            return Redirect::to('/#contacto');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
