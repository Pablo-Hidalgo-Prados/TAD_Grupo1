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
    return view('welcome');
})->middleware('auth','verified');

Route::get('/rutas', function () {
    return view('auth.rutas.rutas');
})->name('rutas');

Route::get('/panel', function () {
    return view('auth.dashboard');
})->middleware('auth','verified');

Route::get('/perfil','App\Http\Controllers\ProductosController@listar')->middleware('auth', 'verified');

Route::post('/crear','App\Http\Controllers\UsersController@crear')->name('usuarios.crear');
Route::match(['get', 'post'], '/listar', 'App\Http\Controllers\UsersController@listar')->name('usuarios.listar');
Route::delete('usuarios/{id}','App\Http\Controllers\UsersController@eliminar')->name('usuarios.eliminar');
Route::match(['get', 'post'], 'editar/', 'App\Http\Controllers\UsersController@editar')->name('usuarios.editar');
Route::match(['get', 'post'], 'editarAdm/', 'App\Http\Controllers\UsersController@editarAdm')->name('usuarios.editarAdm');
Route::put('editar/{id}','App\Http\Controllers\UsersController@actualizar')->name('usuarios.actualizar');
Route::get('visualizar/{id}','App\Http\Controllers\UsersController@visualizar')->name('usuarios.visualizar');
Route::match(['get', 'post'],'/volver','App\Http\Controllers\UsersController@volver')->name('usuarios.volver');
Route::post('/agregardireccion','App\Http\Controllers\UsersController@agregardireccion')->name('usuarios.agregardireccion');
Route::post('borrardireccionssd/','App\Http\Controllers\UsersController@borrardireccion')->name('usuarios.borrardireccion');
Route::post('imagen/','App\Http\Controllers\UsersController@imagen')->name('usuarios.imagen');
Route::post('cambiarpassword/','App\Http\Controllers\UsersController@cambiarpassword')->name('usuarios.cambiarpassword');
Route::post('agregarfavoritos/','App\Http\Controllers\UsersController@agregarfavoritos')->name('usuarios.agregarfavoritos');
Route::post('quitarfavoritos/','App\Http\Controllers\UsersController@quitarfavoritos')->name('usuarios.quitarfavoritos');
Route::post('favoritos/','App\Http\Controllers\UsersController@favoritos')->name('usuarios.favoritos');


Route::post('/crearp','App\Http\Controllers\ProductosController@crear')->name('productos.crear');
Route::match(['get', 'post'], '/listarp', 'App\Http\Controllers\ProductosController@listar')->name('productos.listar');
Route::get('/ver','App\Http\Controllers\ProductosController@vistaproductos')->name('productos.vista');
Route::delete('productos/{id}','App\Http\Controllers\ProductosController@eliminar')->name('productos.eliminar');
Route::get('editarp/{id}','App\Http\Controllers\ProductosController@editar')->name('productos.editar');
Route::put('editarp/{id}','App\Http\Controllers\ProductosController@actualizar')->name('productos.actualizar');
Route::get('visualizarp/{id}','App\Http\Controllers\ProductosController@visualizar')->name('productos.visualizar');
Route::post('imagenp/','App\Http\Controllers\ProductosController@imagen')->name('productos.imagen');
Route::post('agregarc/','App\Http\Controllers\ProductosController@agregarcategoria')->name('productos.agregarcategoria');
Route::post('quitarc/','App\Http\Controllers\ProductosController@quitarcategoria')->name('productos.quitarcategoria');
Route::post('volverp/','App\Http\Controllers\ProductosController@volver')->name('productos.volver');


Route::post('/agregaracarrito/{producto_id}/{user_id}','App\Http\Controllers\UsersController@agregaritem')->name('carritos.agregar');
Route::post('vercarrito/','App\Http\Controllers\UsersController@vercarrito')->name('carritos.visualizar');
Route::post('reducir/','App\Http\Controllers\UsersController@reducir')->name('carritos.reducir');
Route::post('incrementar/','App\Http\Controllers\UsersController@incrementar')->name('carritos.incrementar');
Route::post('/vaciarc/','App\Http\Controllers\UsersController@vaciarcarrito')->name('carritos.vaciar');

Route::post('/comprascrear','App\Http\Controllers\ComprasController@crear')->name('compras.crear');
Route::post('/listarcompras', 'App\Http\Controllers\ComprasController@listarcomprasusuario')->name('compras.listaruser');

Route::post('/crearc','App\Http\Controllers\CategoriasController@crear')->name('categorias.crear');
Route::match(['get', 'post'], '/listarc', 'App\Http\Controllers\CategoriasController@listar')->name('categorias.listar');
Route::delete('categorias/{id}','App\Http\Controllers\CategoriasController@eliminar')->name('categorias.eliminar');
Route::get('editarc/{id}','App\Http\Controllers\CategoriasController@editar')->name('categorias.editar');
Route::put('editarc/{id}','App\Http\Controllers\CategoriasController@actualizar')->name('categorias.actualizar');
Route::get('visualizarc/{id}','App\Http\Controllers\CategoriasController@visualizar')->name('categorias.visualizar');

Route::post('/creard','App\Http\Controllers\DescuentosController@crear')->name('descuentos.crear');
Route::match(['get', 'post'], '/listard', 'App\Http\Controllers\DescuentosController@listar')->name('descuentos.listar');
Route::delete('descuentos/{id}','App\Http\Controllers\DescuentosController@eliminar')->name('descuentos.eliminar');
Route::get('editard/{id}','App\Http\Controllers\DescuentosController@editar')->name('descuentos.editar');
Route::put('editard/{id}','App\Http\Controllers\DescuentosController@actualizar')->name('descuentos.actualizar');
Route::get('visualizard/{id}','App\Http\Controllers\DescuentosController@visualizar')->name('descuentos.visualizar');

Route::delete('comprasd/{id}','App\Http\Controllers\ComprasController@eliminar')->name('compras.eliminar');
Route::get('editarco/{id}','App\Http\Controllers\ComprasController@editar')->name('compras.editar');
Route::put('editarco/{id}','App\Http\Controllers\ComprasController@actualizar')->name('compras.actualizar');
Route::get('visualizarco/{id}','App\Http\Controllers\ComprasController@visualizar')->name('compras.visualizar');
Route::post('comprasvolver/','App\Http\Controllers\ComprasController@comprasvolver')->name('compras.volver');