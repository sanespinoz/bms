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

Route::post('contacto', [
    'uses' => 'MessagesController@store',
    'as'   => 'contacto',
    ]);
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
   if (Auth::guest()){
    return view('index');
} else {
    if (Auth::user()->rol_id == '3') {
        return view('index');
    } elseif (Auth::user()->rol_id == '5') {
        return view('admin.mant');
    } else {
        return view('admin.index');
    }
}
});

Route::get('grupo/create/sectores/{id}', 'GrupoController@getSectores');
Route::get('dispositivo/create/sectores/{id}', 'DispositivoController@getSectores');

Route::get('luminaria/create/sectores/{id}', 'LuminariaController@getSectores');

Route::get('luminaria/{lum}/edit/grupos/{idp}/{ids}', 'LuminariaController@getGrupos');

Route::get('luminaria/create/grupos/{idp}/{ids}', 'LuminariaController@getGrupos');

Route::get('luminaria/grupos/{idp}/{ids}', 'LuminariaController@getGrupos');
Route::get('luminaria/{idp}/{ids}/{idg}', 'LuminariaController@getLuminarias');

Route::resource('user', 'UserController');
Route::resource('edificio', 'EdificioController');
Route::resource('pisos', 'PisoController');
Route::resource('sector', 'SectorController');
Route::resource('grupo', 'GrupoController');
Route::resource('luminaria', 'LuminariaController');
Route::get('luminaria/eliminar/{id}', 'LuminariaController@eliminar')->name('luminaria.eliminar');
Route::get('dispositivo/eliminar/{id}', 'DispositivoController@eliminar')->name('dispositivo.eliminar');
Route::get('edificio/eliminar/{id}', 'EdificioController@eliminar')->name('edificio.eliminar');
Route::get('pisos/eliminar/{id}', 'PisoController@eliminar')->name('pisos.eliminar');

Route::get('user/eliminar/{id}', 'UserController@eliminar')->name('user.eliminar');

Route::get('sector/eliminar/{id}', 'SectorController@eliminar')->name('sector.eliminar');
Route::get('grupo/eliminar/{id}', 'GrupoController@eliminar')->name('grupo.eliminar');

Route::post('/autocomplete/fetch', 'LuminariaController@fetch')->name('autocomplete.fetch');
Route::post('/autocomplete/tipo', 'LuminariaController@tipo')->name('autocomplete.tipo');
Route::post('/autocomplete/descripcion', 'LuminariaController@descripcion')->name('autocomplete.descripcion');
Route::post('/autocomplete/dimensiones', 'LuminariaController@dimensiones')->name('autocomplete.dimensiones');
Route::post('/autocomplete/voltaje_nominal', 'LuminariaController@voltaje_nominal')->name('autocomplete.voltaje_nominal');
Route::post('/autocomplete/potencia_nominal', 'LuminariaController@potencia_nominal')->name('autocomplete.potencia_nominal');
Route::post('/autocomplete/corriente_nominal', 'LuminariaController@corriente_nominal')->name('autocomplete.corriente_nominal');
Route::post('/autocomplete/vida_util', 'LuminariaController@vida_util')->name('autocomplete.vida_util');
Route::post('/autocomplete/temperatura', 'LuminariaController@temperatura')->name('autocomplete.temperatura');

Route::post('/autocomplete/sectores', 'LuminariaController@sect')->name('autocomplete.sectores');
Route::post('/autocomplete/grupos', 'LuminariaController@groups')->name('autocomplete.grupos');
Route::post('/autocomplete/catalog', 'LuminariaController@catalog')->name('autocomplete.catalog');
Route::post('/luminaria/create/obtsectores', 'LuminariaController@obtsectores')->name('luminaria.obtsectores');

Route::resource('dispositivo', 'DispositivoController');
Route::resource('energiapiso', 'EnergiaPisoController');
Route::resource('reporte', 'ReporteController');

Route::resource('estadoluminaria', 'EstadoLuminariaController');
Route::get('estadoluminaria/estados_prev/{id}', 'EstadoLuminariaController@estados_prev')->name('estadoluminaria.estados_prev');
Route::get('tendencia', 'ReporteController@tendenciaConsumo');
Route::post('reporte/create_pdf/{graf}/{titulo}', 'ReporteController@createPDF');

Route::get('eficiencia', 'ReporteController@eficienciaEnergetica');
Route::get('performance', 'ReporteController@performanceLuminaria');
Route::resource('alarma', 'AlarmaController');

Route::get('/listado', 'GrupoController@listado');

Route::get('grupo/buscar_grupos/{piso}/{sector}', 'GrupoController@buscar_grupos');
Route::get('luminaria/buscar_luminarias/{piso}/{sector}/{grupo}', 'LuminariaController@buscar_luminarias');

Route::get('gestion/alarmas', 'AlarmaController@ver_alarmas')->name('alarmas');




