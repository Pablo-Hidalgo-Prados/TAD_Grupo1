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
        $producto=Producto::findOrFail($id);
        return view('auth.productos.visualizep',['producto'=>$producto]);
    }

    public function editar($id){
        $producto=Producto::findOrFail($id);
        return view('auth.productos.editarp',['producto'=>$producto]);
    }

    public function actualizar(Request $request, $id){
        $request->validate(['nombre' => ['required', 'string', 'max:255'],
        'descripcion' => ['required', 'string', 'max:255'],
        'precio' => ['required', 'numeric'],
        'stock' => ['required', 'integer']]);
        $producto=Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->save();
        return redirect()->route('productos.listar');
    }
}