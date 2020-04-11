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

// Rutas DEPARTAMENTO
Route::group(['prefix' => 'departamento'], function(){
    Route::get('buscar', 'departamentoController@index');
    Route::post('buscar', 'departamentoController@show');
    Route::get('nuevo', 'departamentoController@create');
    Route::post('nuevo', 'departamentoController@store');
    Route::get('editar/{id}', 'departamentoController@edit');
    Route::post('actualizar', 'departamentoController@update');
    Route::get('confirma/{id}', 'departamentoController@confirm');
    Route::post('eliminar', 'departamentoController@destroy');
});

// Rutas ESTADO CIVIL
Route::group(['prefix' => 'estadocivil'], function(){
    Route::get('buscar', 'estadocivilController@index');
    Route::post('buscar', 'estadocivilController@show');
    Route::get('nuevo', 'estadocivilController@create');
    Route::post('nuevo', 'estadocivilController@store');
    Route::get('editar/{id}', 'estadocivilController@edit');
    Route::post('actualizar', 'estadocivilController@update');
    Route::get('confirma/{id}', 'estadocivilController@confirm');
    Route::post('eliminar', 'estadocivilController@destroy');
});

// Rutas AFP
Route::group(['prefix' => 'afp'], function(){
    Route::get('buscar', 'afpController@index');
    Route::post('buscar', 'afpController@show');
    Route::get('nuevo', 'afpController@create');
    Route::post('nuevo', 'afpController@store');
    Route::get('editar/{id}', 'afpController@edit');
    Route::post('actualizar', 'afpController@update');
    Route::get('confirma/{id}', 'afpController@confirm');
    Route::post('eliminar', 'afpController@destroy');
});

// Rutas CENTRO DE SALUD
Route::group(['prefix' => 'centrosalud'], function(){
    Route::get('buscar', 'centrosaludController@index');
    Route::post('buscar', 'centrosaludController@show');
    Route::get('nuevo', 'centrosaludController@create');
    Route::post('nuevo', 'centrosaludController@store');
    Route::get('editar/{id}', 'centrosaludController@edit');
    Route::post('actualizar', 'centrosaludController@update');
    Route::get('confirma/{id}', 'centrosaludController@confirm');
    Route::post('eliminar', 'centrosaludController@destroy');
});

// Rutas CONTRATOS
Route::group(['prefix' => 'contrato'], function(){
    Route::get('buscar', 'contratoController@index');
    Route::post('buscar', 'contratoController@show');
    Route::get('nuevo', 'contratoController@create');
    Route::post('nuevo', 'contratoController@store');
    Route::get('editar/{id}', 'contratoController@edit');
    Route::post('actualizar', 'contratoController@update');
    Route::get('confirma/{id}', 'contratoController@confirm');
    Route::post('eliminar', 'contratoController@destroy');
});

// Rutas DOCUMENTOS
Route::group(['prefix' => 'documento'], function(){
    Route::get('buscar', 'documentoController@index');
    Route::post('buscar', 'documentoController@show');
    Route::get('nuevo', 'documentoController@create');
    Route::post('nuevo', 'documentoController@store');
    Route::get('editar/{id}', 'documentoController@edit');
    Route::post('actualizar', 'documentoController@update');
    Route::get('confirma/{id}', 'documentoController@confirm');
    Route::post('eliminar', 'documentoController@destroy');
});

// Rutas AREAS
Route::group(['prefix' => 'area'], function(){
    Route::get('buscar', 'areaController@index');
    Route::post('buscar', 'areaController@show');
    Route::get('nuevo', 'areaController@create');
    Route::post('nuevo', 'areaController@store');
    Route::get('editar/{id}', 'areaController@edit');
    Route::post('actualizar', 'areaController@update');
    Route::get('confirma/{id}', 'areaController@confirm');
    Route::post('eliminar', 'areaController@destroy');
});

// Rutas CARGOS
Route::group(['prefix' => 'cargo'], function(){
    Route::get('buscar/{id}', 'cargoController@index');
    Route::get('nuevo/{id}', 'cargoController@create');
    Route::post('nuevo', 'cargoController@store');
    Route::get('editar/{id}/{ie}', 'cargoController@edit');
    Route::post('actualizar', 'cargoController@update');
    Route::get('confirma/{id}/{ie}', 'cargoController@confirm');
    Route::post('eliminar', 'cargoController@destroy');
});

// Rutas NIVELES
Route::group(['prefix' => 'nivel'], function(){
    Route::get('buscar', 'nivelController@index');
    Route::post('buscar', 'nivelController@show');
    Route::get('nuevo', 'nivelController@create');
    Route::post('nuevo', 'nivelController@store');
    Route::get('editar/{id}', 'nivelController@edit');
    Route::post('actualizar', 'nivelController@update');
    Route::get('confirma/{id}', 'nivelController@confirm');
    Route::post('eliminar', 'nivelController@destroy');
});

// Rutas DATOS PERSONALES
Route::group(['prefix' => 'personal'], function(){
    Route::get('buscar', 'datoPersonalController@index');
    Route::post('buscar', 'datoPersonalController@show');
    Route::get('nuevo', 'datoPersonalController@create');
    Route::post('nuevo', 'datoPersonalController@store');
    Route::get('editar/{id}', 'datoPersonalController@edit');
    Route::post('actualizar', 'datoPersonalController@update');
    Route::get('confirma/{id}', 'datoPersonalController@confirm');
    Route::post('eliminar', 'datoPersonalController@destroy');
});