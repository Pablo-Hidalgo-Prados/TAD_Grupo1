<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Models\Carrito;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function crear(Request $request){
        $request->validate(['nombre'=>'required','apellidos'=>'required','email'=>'required','password'=>'required','telefono'=>'required']);
        $yaRegistrado = Usuario::where('email',$request->email)->get();
        if($yaRegistrado->count()>0){
            return back() -> with('mensaje', 'El usuario ya existe');
        }else{
            $usuarioNuevo = new Usuario;
            $usuarioNuevo->nombre = $request->nombre;
            $usuarioNuevo->apellidos = $request->apellidos;
            $usuarioNuevo->email = $request->email;
            $usuarioNuevo->password = $request->password;
            $usuarioNuevo->telefono = $request->telefono;
            $usuarioNuevo->rol = 'cliente';
            $usuarioNuevo->save();
            $carritoNuevo = new Carrito;
            $carritoNuevo->usuario_id = $usuarioNuevo->id;
            $carritoNuevo->save();
            return back() -> with('mensaje', 'El usuario se ha creado correctamente');
        }   
    }

    public function eliminar($id){
        $usuarioEliminar = Usuario::findOrFail($id);
        $carritoEliminar = Carrito::where('usuario_id',$usuarioEliminar->id)->get();
        $carritoEliminar[0]->delete();
        $usuarioEliminar->delete();
        return back() -> with('mensaje', 'Persona Eliminada');
    }

    public function login(Request $request){
        $request->validate(['email'=>'required','password'=>'required']);
        $registrado = Usuario::where('email',$request->email)->get();
        if($registrado->count()==1){
            if($registrado[0]->password==$request->password){
                if($registrado[0]->rol==='admin'){
                    $usuarios = Usuario::all();
                    return view('index', ['usuario'=>$registrado[0],'usuarios'=>$usuarios]);
                }else{
                    return view('index', ['usuario'=>$registrado[0]]);
                }
            }else{
                return back() -> with('mensaje', 'Email/Contraseña incorrectos');
            }
        }else{
            return back() -> with('mensaje', 'Email/Contraseña incorrectos');
        }
    }
}
