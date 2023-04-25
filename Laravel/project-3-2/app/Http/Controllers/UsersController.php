<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Carrito;
use App\Models\Producto;
use App\Models\DireccionEnvio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function crear(Request $request){
        $request->validate(['name'=>'required','apellidos'=>'required','email'=>'required','password'=>'required','telefono'=>'required']);
        $yaRegistrado = User::where('email',$request->email)->get();
        if($yaRegistrado->count()>0){
            return back() -> with('mensaje', 'El usuario ya existe');
        }else{
            $userNuevo = new User;
            $userNuevo->name = $request->name;
            $userNuevo->apellidos = $request->apellidos;
            $userNuevo->email = $request->email;
            $userNuevo->password = $request->password;
            $userNuevo->telefono = $request->telefono;
            $userNuevo->rol = 'cliente';
            $userNuevo->save();
            $carritoNuevo = new Carrito;
            $carritoNuevo->user_id = $userNuevo->id;
            $carritoNuevo->save();
            return back() -> with('mensaje', 'El usuario se ha creado correctamente');
        }   
    }

    public function eliminar($id){
        $userEliminar = User::findOrFail($id);
        $carritoEliminar = Carrito::where('user_id',$userEliminar->id)->get();
        if($carritoEliminar->count()>0){
            $carritoEliminar[0]->delete();
        }
        $userEliminar->delete();
        return back() -> with('mensaje', 'Persona Eliminada');
    }

    public function listar(){
        $usuarios = User::all();
        return view('auth.dashboard', ['usuarios'=>$usuarios]);
    }

    public function visualizar($id){
        $user=User::findOrFail($id);
        return view('auth.users.visualize',['user'=>$user]);
    }

    public function editar(){
        $user=User::findOrFail(Auth::user()->id);
        return view('auth.users.editar',['user'=>$user]);
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
        return redirect()->route('usuarios.listar');
    }

    public function agregaritem($producto_id, $user_id){
        $carrito = Carrito::where('user_id',$user_id)->get();
        $producto = Producto::findOrFail($producto_id);
        // Comprobar si el producto ya está en el carrito
        if($carrito->count()>0){
            if($producto->stock>0){
                $registroPivot = $producto->carritos()->where('carrito_id', $carrito[0]->id)->first();
                if ($registroPivot) {
                    // Si el producto ya está en el carrito, incrementar la cantidad en 1
                    $carrito[0]->productos()->updateExistingPivot($producto->id, ['cantidad' => DB::raw('cantidad + 1')]);
                } else {
                    // Si el producto no está en el carrito, agregarlo con cantidad 1
                    $producto->carritos()->attach($carrito[0]->id, ['cantidad' => 1]);
                }
                $carrito[0]->total+=$producto->precio;
                $carrito[0]->save();
                $producto->stock-=1;
                $producto->save();
            }
        }
        return back() -> with('mensaje', 'Producto agregado');
    }

    public function vercarrito(){
        $user = User::findOrFail(Auth::user()->id);
        $carrito = Carrito::where('user_id',Auth::user()->id)->get();
        $productos_carrito = $carrito[0]->productos;
        $direcciones = $user->direcciones;
        return view('auth.users.carrito',['productos_carrito'=>$productos_carrito,'user'=>$user,'precio_total'=>$carrito[0]->total,'direcciones'=>$direcciones]);
    }

    public function reducir(Request $request){
        $user = User::find(Auth::user()->id);
        // Obtener el producto del carrito del usuario
        $carrito = Carrito::where('user_id',Auth::user()->id)->get();
        $producto = $carrito[0]->productos->find($request->producto_id);
        if ($producto->pivot->cantidad > 1) {
            $producto->pivot->decrement('cantidad');
        } else {
            // Si la cantidad es 1 o menor, eliminar el producto del carrito
            $carrito[0]->productos()->detach($request->producto_id);
        }
        $carrito[0]->total-=$producto->precio;
        $carrito[0]->save();
        $producto->stock+=1;
        $producto->save();

        $carrito = Carrito::where('user_id',Auth::user()->id)->first();
        $productos_carrito = $carrito->productos;
        return view('auth.users.carrito',['productos_carrito'=>$productos_carrito,'user'=>$user,'precio_total'=>$carrito->total,'direcciones'=>$user->direcciones,'mensaje'=>'Cantidad decrementada']);
    }

    public function incrementar(Request $request){
        $user = User::find(Auth::user()->id);
        // Obtener el producto del carrito del usuario
        $carrito = Carrito::where('user_id',Auth::user()->id)->get();
        $producto = $carrito[0]->productos()->find($request->producto_id);
        if($producto->stock>0){
            $producto->pivot->increment('cantidad');
            $producto->stock-=1;
            $producto->save();
            $carrito[0]->total+=$producto->precio;
            $carrito[0]->save();
        }

        $carrito = Carrito::where('user_id',Auth::user()->id)->first();
        $productos_carrito = $carrito->productos;
        return view('auth.users.carrito',['productos_carrito'=>$productos_carrito,'user'=>$user,'precio_total'=>$carrito->total,'direcciones'=>$user->direcciones,'mensaje'=>'Cantidad incrementada']);
    }
    
    public function vaciarcarrito(){
        $user = User::find(Auth::user()->id);
        $carrito = $user->carrito;
        $productos = $carrito->productos;
        // Incrementar el stock de los productos en la tabla productos y eliminar los productos del carrito
        foreach ($productos as $producto) {
            $cantidad = $producto->pivot->cantidad;
            $producto->stock += $cantidad;
            $producto->save();
        }

        $carrito->productos()->detach();
        $carrito = Carrito::where('user_id',Auth::user()->id)->first();
        $productos_carrito = $carrito->productos;
        return view('auth.users.carrito', ['user_id' => Auth::user()->id, 'user' => Auth::user(), 'productos_carrito' => $productos_carrito, 'precio_total' => $carrito->total, 'direcciones' => $user->direcciones])->with('mensaje', 'Carrito vaciado');
    }

    public function volver(){
        return redirect()->route('productos.vista');
    }

    public function agregardireccion(Request $request){
        $direccionNueva = new DireccionEnvio; 
        $direccionNueva->calle = $request->calle;
        $direccionNueva->ciudad = $request->ciudad;
        $direccionNueva->codigo_postal = $request->codigo_postal;
        $direccionNueva->numero = $request->numero;
        if(isset($direccionNueva->planta)){
            $direccionNueva->planta = $request->planta;
        }
        if(isset($direccionNueva->puerta)){
            $direccionNueva->puerta = $request->puerta;
        }
        $direccionNueva->user_id = $request->user_id;
        $direccionNueva->save();
        return redirect()->back();
    }
}
