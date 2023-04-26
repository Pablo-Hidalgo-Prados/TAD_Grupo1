<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ProductosController extends Controller
{
    public function crear(Request $request){
        $request->validate(['nombre'=>'required','descripcion'=>'required','precio'=>['required', 'numeric', 'gt:0', 'regex:/^\d+(\.\d{1,2})?$/'],'stock'=>'required','imagen'=>'required|mimes:png,jpg']);
        $productoNuevo = new Producto;
        $productoNuevo->nombre = $request->nombre;
        $productoNuevo->descripcion = $request->descripcion;
        $productoNuevo->precio = $request->precio;
        $productoNuevo->stock = $request->stock;

        $imagen = $request->file('imagen');
        $extension = $imagen->getClientOriginalExtension();
        $nombreImagen = $request->nombre.'_'.time().'.'.$extension;
        $rutaImagen = $imagen->storeAs('images',$nombreImagen,'images');

        $productoNuevo->imagen = $rutaImagen;
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

    public function vistaproductos(){
        $productos = Producto::paginate(9);
        return view('auth.productos.productos', ['productos'=>$productos]);
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
