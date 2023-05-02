<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

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
        File::delete(public_path('images/' . $productoEliminar->imagen));
        return back() -> with('mensaje', 'Producto Eliminado');
    }

    public function listar(){
        $productos = Producto::paginate(10);
        return view('auth.dashboard', ['productos'=>$productos]);
    }

    public function vistaproductos(){
        $productos = Producto::paginate(9);
        $categorias = Categoria::all();
        return view('auth.productos.productos', ['productos'=>$productos,'categorias'=>$categorias]);
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
        
        $productos = Producto::paginate(10);
        return view('auth.dashboard', ['productos'=>$productos,'mensaje'=>'Producto actualizado']);
    }

    public function imagen(Request $request){
        $request->validate(['imagen'=>'required|mimes:png,jpg']);
        $producto = Producto::findOrFail($request->producto_id);
        // Borra la imagen antigua
        File::delete(public_path('images/' . $producto->imagen));
        $img = $request->file('imagen');
        $extension = $img->getClientOriginalExtension();
        $nombreImagen = $request->nombre.'_'.time().'.'.$extension;
        $rutaImagen = $img->storeAs('images', $nombreImagen, 'images');
        $producto->imagen = $rutaImagen;
        $producto->save();

        $productos = Producto::paginate(10);
        return view('auth.dashboard', ['productos'=>$productos,'mensaje'=>'Producto actualizado']);
    }

    public function agregarcategoria(Request $request){
        $request->validate(['nombre_cat'=>'required', 'string', 'max:255']);
        $producto = Producto::findOrFail($request->producto_id);
        $categoria = Categoria::where('nombre',$request->nombre_cat)->get();
        if($categoria->count()>0){
            $categoriasProducto = $producto->categorias;
            $i=0;
            $enc = false;
            while($i<$categoriasProducto->count() && !$enc){
                if($categoriasProducto[$i]->nombre===$categoria[0]->nombre){
                    $enc=true;
                }else{
                    $i++;
                }
            }
            if(!$enc){
                $producto->categorias()->attach($categoria[0]->id);
                $producto = Producto::findOrFail($request->producto_id);
                return view('auth.productos.visualizep',['producto'=>$producto]);
            }else{
                return view('auth.productos.editarp',['producto'=>$producto,'mensaje'=>'La categoría ya esta asociada con el producto']);
            }
        }else{
            return view('auth.productos.editarp',['producto'=>$producto,'mensaje'=>'No se encontró la categoría']);
        }
    }

    public function quitarcategoria(Request $request){
        return redirect()->route('productos.vista');
    }

    public function volver(Request $request){
        $producto = Producto::findOrFail($request->producto_id);
        return view('auth.productos.visualizep',['producto'=>$producto]);
    }

    public function filtrarcategoria(Request $request){
        $categoria = Categoria::findOrFail($request->input('categorias_list'));
        $productos = $categoria->productos;
        $productos = $categoria->productos()->paginate(9);
        return view('auth.productos.productos',['productos'=>$productos]);
    }

    public function buscar(Request $request){
        $request->validate(['nombre_producto'=>'required', 'string', 'max:255']);
        $productos = Producto::where('nombre', 'LIKE', '%'.$request->nombre_producto.'%')->paginate(9);
        return view('auth.productos.productos',['productos'=>$productos,'buscar'=>'buscar']);
    }
}
