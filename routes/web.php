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

Route::get('/home', function() {
    return view('template.inicio');
})->middleware('auth');

// Rutas DEPARTAMENTO
Route::group(['prefix' => 'departamento','middleware' => ['auth']], function(){
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
Route::group(['prefix' => 'estadocivil','middleware' => ['auth']], function(){
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
Route::group(['prefix' => 'afp','middleware' => ['auth']], function(){
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
Route::group(['prefix' => 'centrosalud','middleware' => ['auth']], function(){
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
Route::group(['prefix' => 'contrato','middleware' => ['auth']], function(){
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
Route::group(['prefix' => 'documento','middleware' => ['auth']], function(){
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
Route::group(['prefix' => 'area','middleware' => ['auth']], function(){
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
Route::group(['prefix' => 'cargo','middleware' => ['auth']], function(){
    Route::get('buscar/{id}', 'cargoController@index');
    Route::post('buscar','cargoController@show');
    Route::get('nuevo/{id}', 'cargoController@create');
    Route::post('nuevo', 'cargoController@store');
    Route::get('editar/{id}/{ie}', 'cargoController@edit');
    Route::post('actualizar', 'cargoController@update');
    Route::get('confirma/{id}/{ie}', 'cargoController@confirm');
    Route::post('eliminar', 'cargoController@destroy');
});

// Rutas NIVELES
Route::group(['prefix' => 'nivel','middleware' => ['auth']], function(){
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
Route::group(['prefix' => 'personal','middleware' => ['auth']], function(){
    Route::get('buscar', 'datoPersonalController@index');
    Route::post('buscar', 'datoPersonalController@show');
    Route::get('nuevo', 'datoPersonalController@create');
    Route::post('nuevo', 'datoPersonalController@store');
    Route::get('editar/{id}', 'datoPersonalController@edit');
    Route::post('actualizar', 'datoPersonalController@update');
    Route::get('confirma/{id}', 'datoPersonalController@confirm');
    Route::post('eliminar', 'datoPersonalController@destroy');
});

// Rutas REQUERIMIENTO
Route::group(['prefix' => 'requerimiento','middleware' => ['auth']], function(){
    Route::get('buscar', 'requerimientoController@index');
    Route::post('buscar', 'requerimientoController@show');
    Route::get('nuevo', 'requerimientoController@create');
    Route::post('nuevo', 'requerimientoController@store');
    Route::get('editar/{id}', 'requerimientoController@edit');
    Route::post('actualizar', 'requerimientoController@update');
    Route::get('confirma/{id}', 'requerimientoController@confirm');
    Route::post('eliminar', 'requerimientoController@destroy');
});

// Rutas ROLES
Route::group(['prefix' => 'roles','middleware' => ['auth']], function(){
    Route::get('buscar', 'RoleController@index');
    Route::post('buscar', 'RoleController@show');
    Route::get('nuevo', 'RoleController@create');
    Route::post('nuevo', 'RoleController@store');
    Route::get('editar/{id}', 'RoleController@edit');
    Route::post('actualizar', 'RoleController@update');
    Route::get('confirma/{id}', 'RoleController@confirm');
    Route::post('eliminar', 'RoleController@destroy');
});

// Rutas USUARIOS
Route::group(['prefix' => 'users','middleware' => ['auth']], function(){
    Route::get('buscar', 'UserController@index');
    Route::post('buscar', 'UserController@show');
    Route::get('nuevo', 'UserController@create');
    Route::post('nuevo', 'UserController@store');
    Route::get('editar/{id}', 'UserController@edit');
    Route::post('actualizar', 'UserController@update');
    Route::get('confirma/{id}', 'UserController@confirm');
    Route::post('eliminar', 'UserController@destroy');
});

// Rutas PASOS
Route::group(['prefix' => 'pasos','middleware' => ['auth']], function () {
    /* Route::get('buscar', 'pasoController@index');
    Route::post('buscar', 'pasoController@show'); */
    Route::get('nuevo/{id}', 'pasoController@create');
    Route::post('nuevo', 'pasoController@store');
    Route::get('editar/{id}', 'pasoController@edit');
    Route::post('actualizar', 'pasoController@update');
    Route::get('confirma/{id}', 'pasoController@confirm');
    Route::post('eliminar', 'pasoController@destroy');
});

// Rutas CONFIGURACION DE IMPRESION CONTRATOS
Route::group(['prefix' => 'config_contratos','middleware' => ['auth']], function(){
    Route::get('buscar', 'ConfigContratoController@index');
    Route::post('buscar', 'ConfigContratoController@show');
    Route::get('nuevo', 'ConfigContratoController@create');
    Route::post('nuevo', 'ConfigContratoController@store');
    Route::get('editar/{id}', 'ConfigContratoController@edit');
    Route::post('actualizar', 'ConfigContratoController@update');
    Route::get('confirma/{id}', 'ConfigContratoController@confirm');
    Route::post('eliminar', 'ConfigContratoController@destroy');
});

// Rutas IMPRESION CONTRATOS
Route::group(['prefix' => 'imp_contrato','middleware' => ['auth']], function(){
    Route::get('pregunta/{id}', 'ImpresionContratoController@index');
    /* Route::post('buscar', 'imp_contratoController@show'); */
    Route::get('nuevo/{id}', 'ImpresionContratoController@create');
    Route::post('nuevo', 'ImpresionContratoController@store');
    Route::get('editar/{id}', 'ImpresionContratoController@edit');
    Route::post('actualizar', 'ImpresionContratoController@update');
    Route::get('confirma/{id}', 'ImpresionContratoController@confirm');
    Route::post('eliminar', 'ImpresionContratoController@destroy');

    Route::get('pdf/{id}', 'ImpresionContratoController@pdf');
});

Auth::routes(["register" => false, "reset" => false]);

//Route::get('/home', 'HomeController@index')->name('home');

/* Route::group(['middleware' => ['auth']], function() {
    //Route::resource('roles','RoleController');
    //Route::resource('users','UserController');
}); */