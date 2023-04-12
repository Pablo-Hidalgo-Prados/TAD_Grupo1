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
Route::match(['get', 'post'], '/listar', 'App\Http\Controllers\UsersController@listar')->name('usuarios.listar');
Route::delete('usuarios/{id}','App\Http\Controllers\UsersController@eliminar')->name('usuarios.eliminar');
Route::get('editar/{id}','App\Http\Controllers\UsersController@editar')->name('usuarios.editar');
Route::put('editar/{id}','App\Http\Controllers\UsersController@actualizar')->name('usuarios.actualizar');
Route::get('visualizar/{id}','App\Http\Controllers\UsersController@visualizar')->name('usuarios.visualizar');

Route::post('/crearp','App\Http\Controllers\ProductosController@crear')->name('productos.crear');
Route::match(['get', 'post'], '/listarp', 'App\Http\Controllers\ProductosController@listar')->name('productos.listar');
Route::delete('productos/{id}','App\Http\Controllers\ProductosController@eliminar')->name('productos.eliminar');
Route::get('editarp/{id}','App\Http\Controllers\ProductosController@editar')->name('productos.editar');
Route::put('editarp/{id}','App\Http\Controllers\ProductosController@actualizar')->name('productos.actualizar');
Route::get('visualizarp/{id}','App\Http\Controllers\ProductosController@visualizar')->name('productos.visualizar');

Route::post('/crearc','App\Http\Controllers\CategoriasController@crear')->name('categorias.crear');
Route::match(['get', 'post'], '/listarc', 'App\Http\Controllers\CategoriasController@listar')->name('categorias.listar');
Route::delete('categorias/{id}','App\Http\Controllers\CategoriasController@eliminar')->name('categorias.eliminar');
Route::get('editarc/{id}','App\Http\Controllers\CategoriasController@editar')->name('categorias.editar');
Route::put('editarc/{id}','App\Http\Controllers\CategoriasController@actualizar')->name('categorias.actualizar');
Route::get('visualizarc/{id}','App\Http\Controllers\CategoriasController@visualizar')->name('categorias.visualizar');