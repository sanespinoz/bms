<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\GrupoCreateRequest;
use App\Http\Requests\GrupoUpdateRequest;
use App\Grupo;
use Session;
use Redirect;
use App\Sector;
use App\Piso;
use App\Http\Requests;
use Illuminate\Routing\Route;

public function sectores(Request $request, $piso){
if($request->ajax()){
    $sectores = Sector::where('piso_id',$piso)->get();
     return Response::json(array('error' => 0, 'sectores' => $sectores));
     //return \Response::json(['success' => $sectores]);
    /* return response()->json([
"mensaje" => $request->all()
]);*/
}
}
