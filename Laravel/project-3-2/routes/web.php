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

Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware('auth','verified');

Route::post('/crear','App\Http\Controllers\UsersController@crear')->name('usuarios.crear');
Route::delete('personas/{id}','App\Http\Controllers\UsersController@eliminar')->name('usuarios.eliminar');
Route::get('editar/{id}','App\Http\Controllers\UsersController@editar')->name('usuarios.editar');
Route::put('editar/{id}','App\Http\Controllers\UsersController@actualizar')->name('usuarios.actualizar');
Route::get('visualizar/{id}','App\Http\Controllers\UsersController@visualizar')->name('usuarios.visualizar');