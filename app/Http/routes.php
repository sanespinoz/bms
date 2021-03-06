<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/',function(){
    return view('index');
});


// Authentication routes...

Route::get('login', [
	 'uses'=>'Auth\AuthController@getLogin',
	 'as'=>'auth/login'
	 ]);
Route::post('login', [
	'uses' => 'Auth\AuthController@postLogin',
	'as' =>'auth/login'
	]);
Route::get('logout', [
	 'uses' => 'Auth\AuthController@getLogout',
	 'as' => 'auth/logout'
	 ]);


Route::get('register',[
	'uses'=> 'Auth\AuthController@getRegister',
    'as'=>'auth/register'
]);
Route::post('register', [
	'uses' => 'Auth\AuthController@postRegister',
	'as' => 'auth/register'
	]);

Route::get('gestion',function() {
    if (Auth::user()->rol_id == '8')

        return view('operador.index');
     else

        return view('admin.index');

});


resource('edificio','EdificioController');
resource('pisos','PisoController');
resource('sector','SectorController');
resource('grupo','GrupoController');
resource('luminaria','LuminariaController');
resource('lampara','LamparaController');

//ADMINISTRADOR
/*
Route::group(['middleware'=>['auth','administrador'], 'prefix'=>'admin'], function (){
   Route::resource('/','FrontController');
   // Route::get('admin',function(){
     //   return view('admin.index');
  // });
});
    /*
   // Route::get('admin','FrontController@admin');
    Route::get('/','FrontController@admin'); //REVISAR QUE NO ANDA ME MANDA AL LOGIN DE NUEVO
*/

//OPERADOR
/*
Route::group(['middleware'=>['auth','operador'], 'prefix'=>'operador'], function (){
    Route::get('/', function(){
        return view('operador.index');
    });
});
//AREA MANTENIMIENTO
Route::group(['middleware'=>['auth','mantenimiento'], 'prefix'=>'mantenimiento'], function (){
    Route::get('/', function(){
        return view('mantenimiento.index');
    });
});*/
/*
//AREA
Route::group(['middleware'=>['auth','area'], 'prefix'=>'area'], function (){
    Route::get('/', function(){
        return view('area.index');
    });
});
*/