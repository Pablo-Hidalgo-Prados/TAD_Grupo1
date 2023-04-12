<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;

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
        if($carrito->count()>0){
            $carrito[0]->productos()->attach($producto_id);
        }
        return back() -> with('mensaje', 'Producto agregado');
    }
}
