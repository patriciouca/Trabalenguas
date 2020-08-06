<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@acceso');

Route::get('verClase/{id}', 'AlumnoClaseController@verClase');

Route::get('alumnoclase/create/{id}', 'AlumnoClaseController@create')->name('crearAlumnoClase');

Route::resource('alumnoclase', 'AlumnoClaseController');

Route::resource('clase', 'ClaseController');

Route::resource('usuario', 'UsuarioController');

Route::resource('clases_impartida', 'ClasesImpartidasController');

Route::resource('cliente', 'ClienteController');

Route::resource('alergia', 'AlergiaController');

Route::resource('aspecto', 'AspectoController');

Route::resource('gasto', 'GastoController');

Route::resource('recibo', 'ReciboController');

Route::resource('colegio', 'ColegioController');

Route::get('/imagen/{id}', 'ImagenController@imagen');

Route::get('/informes/{id}', 'ImagenController@informe');

Route::get('/horario', 'ClasesImpartidasController@horario');