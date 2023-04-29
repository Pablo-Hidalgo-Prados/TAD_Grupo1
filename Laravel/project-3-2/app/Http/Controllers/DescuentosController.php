<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Descuento;

class DescuentosController extends Controller
{
    public function crear(Request $request){
        $request->validate(['codigo'=>'required','porcentaje'=>'required']);
        $descuentoNuevo = new Descuento;
        $descuentoNuevo->codigo = $request->codigo;
        $descuentoNuevo->porcentaje = $request->porcentaje;
        $descuentoNuevo->save();
        return back() -> with('mensaje', 'El descuento se ha creado correctamente'); 
    }

    public function eliminar($id){
        $descuentoEliminar = Descuento::findOrFail($id);
        $descuentoEliminar->delete();
        return back() -> with('mensaje', 'Descuento Eliminado');
    }

    public function listar(){
        $descuentos = Descuento::all();
        return view('auth.dashboard', ['descuentos'=>$descuentos]);
    }

    public function visualizar($id){
        $descuento=Descuento::findOrFail($id);
        return view('auth.descuentos.visualized',['descuento'=>$descuento]);
    }

    public function editar($id){
        $descuento=Descuento::findOrFail($id);
        return view('auth.descuentos.editard',['descuento'=>$descuento]);
    }

    public function actualizar(Request $request, $id){
        $request->validate(['codigo' => ['required', 'string', 'max:255'],
        'porcentaje' => ['required', 'numeric']]);
        $descuento=Descuento::findOrFail($id);
        $descuento->codigo = $request->codigo;
        $descuento->porcentaje = $request->porcentaje;
        $descuento->save();
        return redirect()->route('descuentos.listar');
    }
}
