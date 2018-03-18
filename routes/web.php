<?php

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

Route::get('inscripcion', 'UniController@inscribir');
Route::post('inscripcion', 'UniController@store');
Route::get('aviso2', 'UniController@aviso2');
Route::get('lista', 'UniController@index');
Route::get('curso/{id?}', 'UniController@show');
Route::get('curso/{id?}/edit', 'UniController@edit');
Route::post('curso/{id?}/edit', 'UniController@update');
Route::post('curso/{id?}/delete', 'UniController@destroy');

Route::get('prueba', 'UniController@prueba');

Route::get( 'registrotienda', 'TiendasController@create');
Route::post('registrotienda', 'TiendasController@store');
Route::get('aviso', 'TiendasController@aviso');



Route::get('registro', 'LibrosController@create');
Route::post('registro', 'LibrosController@store');

Route::get('/', function () {
    return view('welcome');
});
