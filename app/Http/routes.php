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

Route::get('/', function () {
    return view('index');
});

// Authentication routes...

Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as'   => 'auth/login',
]);

Route::post('login', [
    'uses' => 'Auth\AuthController@postLogin',
    'as'   => 'auth/login',
]);

Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as'   => 'auth/logout',
]);

Route::get('register', [
    'uses' => 'Auth\AuthController@getRegister',
    'as'   => 'register',
]);

Route::post('register', [
    'uses' => 'Auth\AuthController@postRegister',
    'as'   => 'register',
]);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('gestion', function () {
    if (Auth::user()->rol_id !== '3') {
        return view('admin.index');
    } else {
        return view('index');
    }

});
/*Route::get('gestion',['middleware'=>'auth','admin','mantenimiento','area', function(){
return view('admin.index');
}]);
 */
/* CORREGIR XQ PASA OLIMPICAMENTE
Route::get('gestion',['middleware'=>'auth','admin','mantenimiento','area', function(){

return view('admin.index');

}]);
 */
Route::get('grupo/create/sectores/{id}', 'GrupoController@getSectores');
Route::get('luminaria/create/sectores/{id}', 'LuminariaController@getSectores');
Route::get('luminaria/create/grupos/{idp}/{ids}', 'LuminariaController@getGrupos');
Route::resource('user', 'UserController');
Route::resource('edificio', 'EdificioController');
Route::resource('pisos', 'PisoController');
Route::resource('sector', 'SectorController');
Route::resource('grupo', 'GrupoController');
Route::resource('luminaria', 'LuminariaController');
Route::resource('lampara', 'LamparaController');
Route::resource('energiapiso', 'EnergiaPisoController');
Route::resource('reporte', 'ReporteController');
Route::resource('estadoluminaria', 'EstadoLuminariaController');
Route::get('tendencia', 'ReporteController@tendenciaConsumo');
Route::get('eficiencia', 'ReporteController@eficienciaEnergetica');
Route::get('performance', 'ReporteController@performanceLuminaria');
Route::get('/listado', 'GrupoController@listado');

Route::get('grupo/buscar_grupos/{piso}/{sector}', 'GrupoController@buscar_grupos');

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
