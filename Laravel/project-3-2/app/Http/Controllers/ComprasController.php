<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\User;
use App\Models\Carrito;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ComprasController extends Controller
{
    public function crear(Request $request){
        $productos_carrito = json_decode($request->input('productos_carrito'), true);
        $usuario = User::findOrFail($request->user_id);
        $carrito = Carrito::where('user_id',$request->user_id)->get();
        $compraNueva = new Compra;
        $compraNueva->fecha = Carbon::now();
        $compraNueva->subtotal = (float) $request->precio_total;
        $compraNueva->user_id = $request->user_id;
        $compraNueva->descuento_id = 1;
        $compraNueva->direccion_id = 1;
        $compraNueva->save();
        $productos = $carrito[0]->productos;
        foreach ($productos as $producto) {
            for($i=0;$i<$producto->pivot->cantidad;$i++){
                $compraNueva->productos()->attach($producto->id);
            }
        }
        return redirect()->route('productos.listar');
    }

    public function eliminar($id){
        $categoriaEliminar = Categoria::findOrFail($id);
        $categoriaEliminar->delete();
        return back() -> with('mensaje', 'Categoría Eliminada');
    }

    public function listar(){
        $categorias = Categoria::all();
        return view('auth.dashboard', ['categorias'=>$categorias]);
    }

    public function visualizar($id){
        $categoria=Categoria::findOrFail($id);
        return view('auth.categorias.visualizec',['categoria'=>$categoria]);
    }

    public function editar($id){
        $categoria=Categoria::findOrFail($id);
        return view('auth.categorias.editarc',['categoria'=>$categoria]);
    }

    public function actualizar(Request $request, $id){
        $request->validate(['nombre' => ['required', 'string', 'max:255'],
        'descripcion' => ['required', 'string', 'max:255']]);
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();
        return redirect()->route('categorias.listar');
    }
}
