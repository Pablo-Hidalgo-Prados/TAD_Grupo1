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

Route::get('/','App\Http\Controllers\PersonasController@index', function () {
    return view('index');
});

Route::post('personas','App\Http\Controllers\PersonasController@crear')->name('personas.crear');

Route::delete('personas/{id}','App\Http\Controllers\PersonasController@eliminar')->name('personas.eliminar');

Route::get('editar/{id}','App\Http\Controllers\PersonasController@editar')->name('personas.editar');
Route::put('editar/{id}','App\Http\Controllers\PersonasController@actualizar')->name('personas.actualizar');

Route::get('visualizar/{id}','App\Http\Controllers\PersonasController@visualizar')->name('personas.visualizar');
Route::get('/','App\Http\Controllers\PersonasController@index')->name('personas.volver');