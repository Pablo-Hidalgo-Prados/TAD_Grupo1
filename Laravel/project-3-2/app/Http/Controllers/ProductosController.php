<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function crear(Request $request){
        $request->validate(['nombre'=>'required','descripcion'=>'required','precio'=>'required','stock'=>'required']);
        $productoNuevo = new Producto;
        $productoNuevo->nombre = $request->nombre;
        $productoNuevo->descripcion = $request->descripcion;
        $productoNuevo->precio = $request->precio;
        $productoNuevo->stock = $request->stock;
        $productoNuevo->save();
        return back() -> with('mensaje', 'El producto se ha creado correctamente'); 
    }

    public function eliminar($id){
        $productoEliminar = Producto::findOrFail($id);
        $productoEliminar->delete();
        return back() -> with('mensaje', 'Producto Eliminado');
    }

    public function listar(){
        $productos = Producto::all();
        return view('auth.dashboard', ['productos'=>$productos]);
    }

    public function visualizar($id){
        $user=User::findOrFail($id);
        return view('visualizar',['usuario'=>$user]);
    }

    public function editar($id){
        $user=User::findOrFail($id);
        return view('editar',['usuario'=>$user]);
    }

    public function actualizar(Request $request, $id){
        $request->validate(['name' => ['required', 'string', 'max:255'],
        'apellidos' => ['required', 'string', 'max:255'],
        'telefono' => ['required', 'integer']]);
        $user=User::findOrFail($id);
        $user->name = $request->name;
        $user->apellidos = $request->apellidos;
        $user->telefono = $request->telefono;
        $user->save();
        return view('welcome');
    }
}
