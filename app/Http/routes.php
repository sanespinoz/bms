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
Route::get('contacto', 'FrontController@contacto');

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

Route::get('grupo/create/sectores/{id}', 'GrupoController@getSectores');
Route::get('dispositivo/create/sectores/{id}', 'DispositivoController@getSectores');
Route::get('luminaria/create/sectores/{id}', 'LuminariaController@getSectores');

Route::get('luminaria/{lum}/edit/sectores/{id}', 'LuminariaController@getSectores');
Route::get('luminaria/{lum}/edit/grupos/{idp}/{ids}', 'LuminariaController@getGrupos');

Route::get('luminaria/sectores/{id}', 'LuminariaController@getSectores');
Route::get('luminaria/create/grupos/{idp}/{ids}', 'LuminariaController@getGrupos');
Route::get('luminaria/grupos/{idp}/{ids}', 'LuminariaController@getGrupos');

Route::get('luminaria/{idp}/{ids}/{idg}', 'LuminariaController@getLuminarias');

Route::resource('user', 'UserController');
Route::resource('edificio', 'EdificioController');
Route::resource('pisos', 'PisoController');
Route::resource('sector', 'SectorController');
Route::resource('grupo', 'GrupoController');
Route::resource('luminaria', 'LuminariaController');
Route::resource('dispositivo', 'DispositivoController');
Route::resource('energiapiso', 'EnergiaPisoController');
Route::resource('reporte', 'ReporteController');
Route::resource('mail', 'MailController');
Route::resource('estadoluminaria', 'EstadoLuminariaController');
Route::get('tendencia', 'ReporteController@tendenciaConsumo');
Route::get('eficiencia', 'ReporteController@eficienciaEnergetica');
Route::get('performance', 'ReporteController@performanceLuminaria');

Route::get('/listado', 'GrupoController@listado');

Route::get('grupo/buscar_grupos/{piso}/{sector}', 'GrupoController@buscar_grupos');
Route::get('luminaria/buscar_luminarias/{piso}/{sector}/{grupo}', 'LuminariaController@buscar_luminarias');
Route::get('estadoluminaria/create/{idp}', 'estadoLuminariaController@createid');

Route::get('sendemail', function () {
    $data = array(
        'name' => "curso laravel",
    );
    Mail::send('emails.welcome', $data, function ($message) {
        $message->from('san.espinoz@gmail.com', 'Cursolaravel');
        $message->to('san.espinoz@gmail.com')->subject('test email curso laravel');

    });
    return "tu email a sido enviado";
});
