<?php

namespace App\Http\Controllers;

use App\Http\Requests\LamparaCreateRequest;
use App\Http\Requests\LamparaUpdateRequest;
use App\Lampara;
use App\Luminaria;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LamparaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $lamparas =Lampara::paginate(10); 
      
        return view('lampara.index', compact('lamparas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $luminarias = luminaria::all();  
        //dd($luminarias);
       

        return view('lampara.create')->with('luminarias', $luminarias);

      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LamparaCreateRequest $request)
    {

        //dd($request->all());
        Lampara::create( $request->all()
          
            );
            Session::flash('message','Lámpara Creada Correctamente');
       
            return redirect('lampara');
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
           $luminarias = luminaria::all();
        $lampara= Lampara::findOrFail($id);
        return view('lampara.edit',compact('lampara','luminarias'));
             
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,LamparaUpdateRequest $request)
    {
          $lampara= lampara::find($id);
            $lampara->fill($request->all());
            $lampara->save();

         Session::flash('message','Lámpara Editada Correctamente');
         return redirect('lampara');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         lampara::destroy($id);
         Session::flash('message','lampara Eliminada Correctamente');
         return redirect('lampara');
    }
}
