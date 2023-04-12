<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function crear(Request $request){
        $request->validate(['nombrec'=>'required','descripcionc'=>'required']);
        $categoriaNueva = new Categoria;
        $categoriaNueva->nombre = $request->nombrec;
        $categoriaNueva->descripcion = $request->descripcionc;
        $categoriaNueva->save();
        return back() -> with('mensaje', 'La categoría se ha creado correctamente'); 
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
