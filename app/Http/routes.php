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

Route::group(['prefix' => 'socios'], function () {
    //Route::post('store','SocioController@store');
    //Route::get('create','SocioController@create');
    Route::resource('/', 'SocioController', ['except' => ['store']]);
    Route::post('store', 'SocioController@store');
    Route::get('listar', 'SocioController@listar');
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
});
Route::group(['prefix' => 'items'], function () {
    Route::get('/', 'ItemController@index');
    Route::post('/store','ItemController@store');
    Route::get('/listar','ItemController@listar');
    Route::get('/edit/{id}', 'ItemController@edit');
    Route::post('update/{id}','ItemController@update');
    Route::get('/autocompletar', array('uses'=>'ItemController@autocompletar'));



});
