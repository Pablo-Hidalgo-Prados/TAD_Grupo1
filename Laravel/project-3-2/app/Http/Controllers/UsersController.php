<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function editar($id){
        $user=User::findOrFail($id);
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
            $registroPivot = $producto->carritos()->where('carrito_id', $carrito[0]->id)->first();
            if ($registroPivot) {
                // Si el producto ya está en el carrito, incrementar la cantidad en 1
                $carrito[0]->productos()->updateExistingPivot($producto->id, ['cantidad' => DB::raw('cantidad + 1')]);
            } else {
                // Si el producto no está en el carrito, agregarlo con cantidad 1
                $producto->carritos()->attach($carrito[0]->id, ['cantidad' => 1]);
            }
        }
        return back() -> with('mensaje', 'Producto agregado');
    }

    public function vercarrito($user_id){
        $user = User::findOrFail($user_id);
        $carrito = Carrito::where('user_id',$user_id)->get();
        $productos_carrito = $carrito[0]->productos;
        $precio_total = 0;
        foreach ($productos_carrito as $producto) {
            $precio_total += $producto->precio * $producto->pivot->cantidad;
        }
        return view('auth.users.carrito',['productos_carrito'=>$productos_carrito,'user'=>$user,'precio_total'=>$precio_total]);
    }

    public function reducir($producto_id, $user_id){
        $user = User::find($user_id);
        // Obtener el producto del carrito del usuario
        $carrito = Carrito::where('user_id',$user_id)->get();
        $producto = $carrito[0]->productos->find($producto_id);
        if ($producto->pivot->cantidad > 1) {
            $producto->pivot->decrement('cantidad');
        } else {
            // Si la cantidad es 1 o menor, eliminar el producto del carrito
            $carrito[0]->productos()->detach($producto_id);
        }
        return redirect()->route('carritos.visualizar', ['user_id'=>$user_id])->with('mensaje', 'Cantidad del producto reducida');
    }

    public function incrementar($producto_id, $user_id){
        $user = User::find($user_id);
        // Obtener el producto del carrito del usuario
        $carrito = Carrito::where('user_id',$user_id)->get();
        $producto = $carrito[0]->productos()->find($producto_id);
        $producto->pivot->increment('cantidad');
        return redirect()->route('carritos.visualizar', ['user_id'=>$user_id])->with('mensaje', 'Cantidad del producto incrementada');
    }
}
