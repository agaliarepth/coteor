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
    return view('welcome');
});
Route::group(['prefix'=>'tecnicos'],function(){
    Route::get('/','TecnicoController@index');
    Route::get('/listar/','TecnicoController@listar');
    Route::post('/store', 'TecnicoController@store');
    Route::get('/edit/{id}', 'TecnicoController@edit');
    Route::post('update','TecnicoController@update');
    Route::get('/autocompletar', 'TecnicoController@autocompletar');


});
Route::group(['prefix' => 'socios'], function () {
    //Route::post('store','SocioController@store');
    //Route::get('create','SocioController@create');
    Route::resource('/', 'SocioController', ['except' => ['store']]);
    Route::post('store', 'SocioController@store');
    Route::get('listar', 'SocioController@listar');
    Route::get('/autocompletar', 'SocioController@autocompletar');

});

Route::group(['prefix' => 'categorias'], function () {
    Route::get('/', 'CategoriaController@index');
    Route::post('store', 'CategoriaController@store');
    Route::get('/listar', 'CategoriaController@listar');
    Route::get('/edit/{id}', 'CategoriaController@edit');
    Route::post('/update/{id}', 'CategoriaController@update');


});
Route::group(['prefix' => 'equipos'], function () {
    Route::get('/', 'EquipoController@index');
    Route::post('/store', 'EquipoController@store');
    Route::get('/listar', 'EquipoController@listar');
    Route::get('/edit/{id}', 'EquipoController@edit');
    Route::post('update/{id}','EquipoController@update');

});
Route::group(['prefix' => 'items'], function () {
    Route::get('/', 'ItemController@index');
    Route::post('/store','ItemController@store');
    Route::get('/listar','ItemController@listar');
    Route::get('/edit/{id}', 'ItemController@edit');
    Route::post('update/{id}','ItemController@update');
    Route::get('/autocompletar', 'ItemController@autocompletar');
    Route::get('/validarItem/{id}', 'ItemController@validarItem');

});
Route::group(['prefix'=>'ingresos'],function(){
    Route::get('/','IngresoController@index');
    Route::get('/listar/','IngresoController@listar');
    Route::get('/listar/{mes}/{anio}','IngresoController@listar');
    Route::get('/listarRango/{f1}/{f2}','IngresoController@listarRango');
    Route::get('/create','IngresoController@create');
    Route::get('/edit/{id}', 'IngresoController@edit');
    Route::post('/store', 'IngresoController@store');
    Route::get('/getIngreso/{id}','IngresoController@getIngreso');
    Route::get('/getDetalle/{id}','IngresoController@getDetalle');
    Route::post('update','IngresoController@update');
    Route::get('busquedaAvanzada/{mes}/{anio}/{tipo}','IngresoController@busquedaAvanzada');

});
Route::group(['prefix'=>'telefonos'],function(){
    Route::get('/autocompletar', 'TelefonoController@autocompletar');


});
Route::group(['prefix'=>'contratos'],function(){
    Route::get('/','ContratoController@index');
    Route::get('/create','ContratoController@create');
    Route::post('/store', 'ContratoController@store');
    Route::get('/listar/','ContratoController@listar');
    Route::get('/edit/{id}', 'ContratoController@edit');
    Route::post('/update','ContratoController@update');
    Route::get('/validarNumContrato/{numcontrato}', 'ContratoController@validarNumContrato');
    Route::get('/validarNumTelefono/{telefonos_id}', 'ContratoController@validarNumTelefono');
});

Route::group(['prefix'=>'servicios'],function(){
    Route::get('/','ServicioController@index');
    Route::get('/listar/','ServicioController@listar');
    Route::post('/store', 'ServicioController@store');
    Route::get('/edit/{id}', 'ServicioController@edit');
    Route::post('update','ServicioController@update');
});
Route::group(['prefix'=>'odts'],function(){
    Route::get('/','OdtController@index');
    Route::get('/create','OdtController@create');
    Route::post('/store', 'OdtController@store');
    Route::get('/listar/','OdtController@listar');
    Route::get('/edit/{id}', 'OdtController@edit');
    Route::post('/update','OdtController@update');
;
});


