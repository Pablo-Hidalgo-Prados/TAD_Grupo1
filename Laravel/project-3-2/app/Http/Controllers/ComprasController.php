<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\User;
use App\Models\Carrito;
use App\Models\DireccionEnvio;
use App\Models\Descuento;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        if(isset($request->codigo_descuento)){
            $descuento = Descuento::where('codigo', $request->codigo_descuento)->first();
            if(!$descuento){
                $user = User::findOrFail(Auth::user()->id);
                $carrito = Carrito::where('user_id',Auth::user()->id)->get();
                $productos_carrito = $carrito[0]->productos;
                $direcciones = $user->direcciones;
                return view('auth.users.carrito',['productos_carrito'=>$productos_carrito,'user'=>$user,'precio_total'=>$carrito[0]->total,'direcciones'=>$direcciones,'mensaje'=>'No se encontró ese descuento']);                
            }else{
                $compraUsada = Compra::where('descuento_id', $descuento->id)->first();
                if($compraUsada){
                    $user = User::findOrFail(Auth::user()->id);
                    $carrito = Carrito::where('user_id',Auth::user()->id)->get();
                    $productos_carrito = $carrito[0]->productos;
                    $direcciones = $user->direcciones;
                    return view('auth.users.carrito',['productos_carrito'=>$productos_carrito,'user'=>$user,'precio_total'=>$carrito[0]->total,'direcciones'=>$direcciones,'mensaje'=>'El código ya se usó']);                
                }else{
                    $compraNueva->descuento_id = $descuento->id;
                    $compraNueva->subtotal -= (float) $request->precio_total * ($descuento->porcentaje / 100);
                }
            }
        }
        $strDireccion = 'Ciudad: ' . $direccion->ciudad . ', Código postal: ' . $direccion->codigo_postal . ', Calle: ' . $direccion->numero . ', Número: ' . $direccion->numero;
        if (!empty($direccion->planta)) {
            $strDireccion .= ', Planta: ' . $direccion->planta;
        }
        if (!empty($direccion->puerta)) {
            $strDireccion .= ', Puerta: ' . $direccion->puerta;
        }
        $compraNueva->direccion = $strDireccion;
        $compraNueva->direccion_id = $direccion->id;
        $productos = $carrito[0]->productos;
        if($productos->count()>0){
            $compraNueva->save();
        }else{
            $direcciones = $usuario->direcciones;
            return view('auth.users.carrito', ['productos_carrito' => $productos_carrito, 'user' => $usuario, 'precio_total' => $request->precio_total, 'direcciones' => $direcciones])->with('mensaje', 'Compra no realizada');
        }
        if($productos->count()>0){
            foreach ($productos as $producto) {
                for($i=0;$i<$producto->pivot->cantidad;$i++){
                    $producto->stock -= 1;
                    $producto->save();
                    $compraNueva->productos()->attach($producto->id);
                }
            }
            $carrito[0]->productos()->detach(); // Eliminar todos los productos del carrito
            $carrito[0]->total=0;
            $carrito[0]->save();
        }
        
        $user=User::findOrFail(Auth::user()->id);
        $compras = Compra::where('user_id',Auth::user()->id)->get();
        return view('auth.users.visualize', ['compras'=>$compras,'user'=>$user,'user_id' => Auth::user()->id]);
    }

    public function eliminar(Request $request, $id){
        $compraEliminar = Compra::findOrFail($id);
        $compraEliminar->delete();
        $user = User::findOrFail($request->user_id);
        return view('auth.users.visualize',['user'=>$user,'mensaje'=>'Compra Eliminada']);
    }

    public function listar(){
        $compras = Compra::all();
        return view('auth.dashboard', ['compras'=>$compras]);
    }

    public function visualizar($id){
        $compra=Compra::findOrFail($id);
        $productos = $compra->productos;
        return view('auth.compras.visualizeco',['compra'=>$compra,'productos'=>$productos]);
    }

    public function editar($id){
        $compra=Compra::findOrFail($id);
        return view('auth.compras.editarco',['compra'=>$compra]);
    }

    public function actualizar(Request $request, $id){
        $request->validate(['fecha' => ['required', 'date_format:Y-m-d'],
        'subtotal' => ['required', 'numeric'],
        'direccion' => ['required', 'string', 'max:255'],
        'estado' => ['required', 'string', 'max:255']]);
        $compra=Compra::findOrFail($id);
        $compra->fecha = $request->fecha;
        $compra->subtotal = $request->subtotal;
        $compra->direccion = $request->direccion;
        $compra->estado = $request->estado;
        $compra->save();

        $productos = $compra->productos;
        return view('auth.compras.visualizeco',['compra'=>$compra,'productos'=>$productos]);
    }

    public function listarcomprasusuario(Request $request){
        $user = User::findOrFail($request->user_id);
        $compras = Compra::where('user_id',$request->user_id)->get();
        if($request->modal==='abrir'){
            $mostrar = 'si';
        }else{
            $mostrar = 'no';
        }
        return view('auth.users.visualize', ['compras'=>$compras,'user'=>$user,'mostrar'=>$mostrar]);
    }

    public function comprasvolver(Request $request){
        $user = User::findOrFail($request->user_id);
        return view('auth.users.visualize',['user'=>$user]);
    }
}
