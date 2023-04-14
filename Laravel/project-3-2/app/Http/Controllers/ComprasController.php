<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\User;
use App\Models\Carrito;
use App\Models\DireccionEnvio;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ComprasController extends Controller
{
    public function crear(Request $request){
        $productos_carrito = json_decode($request->input('productos_carrito'), true);
        $usuario = User::findOrFail($request->user_id);
        $direccion = DireccionEnvio::findOrFail($request->input('direcciones_list'));
        $carrito = Carrito::where('user_id',$request->user_id)->get();
        $compraNueva = new Compra;
        $compraNueva->fecha = Carbon::now();
        $compraNueva->subtotal = (float) $request->precio_total;
        $compraNueva->estado = 'En preparación';
        $compraNueva->user_id = $request->user_id;
        $compraNueva->descuento_id = 1;
        $strDireccion = 'Ciudad: ' . $direccion->ciudad . ', Código postal: ' . $direccion->codigo_postal . ', Calle: ' . $direccion->numero . ', Número: ' . $direccion->numero;
        if (!empty($direccion->planta)) {
            $strDireccion .= ', Planta: ' . $direccion->planta;
        }
        if (!empty($direccion->puerta)) {
            $strDireccion .= ', Puerta: ' . $direccion->puerta;
        }
        $compraNueva->direccion = $strDireccion;
        $compraNueva->direccion_id = 1;
        $compraNueva->save();
        $productos = $carrito[0]->productos;
        if($productos->count()>0){
            foreach ($productos as $producto) {
                for($i=0;$i<$producto->pivot->cantidad;$i++){
                    $compraNueva->productos()->attach($producto->id);
                }
            }
            $carrito[0]->productos()->detach(); // Eliminar todos los productos del carrito
        }
        return redirect()->route('usuarios.volver');
    }

    public function listar(){
        $compras = Compra::all();
        return view('auth.dashboard', ['compras'=>$compras]);
    }

    public function visualizar($id){
        $compra=Compra::findOrFail($id);
        return view('auth.compra.visualizec',['compra'=>$compra]);
    }

    public function editar($id){
        $compra=Compra::findOrFail($id);
        return view('auth.compra.editarcompra',['compra'=>$compra]);
    }

    public function actualizar(Request $request, $id){
        //
    }

    public function listarcomprasusuario($user_id){
        $user=User::findOrFail($user_id);
        $compras = Compra::where('user_id',$user_id)->get();
        return view('auth.users.visualize', ['compras'=>$compras,'user'=>$user]);
    }
}
