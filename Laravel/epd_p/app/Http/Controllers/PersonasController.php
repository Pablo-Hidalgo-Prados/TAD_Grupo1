<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Trabajador;
use App\Models\Gerente;
use App\Models\Empleado;

class PersonasController extends Controller
{
    public function index()
    {        
        $personas = Persona::all();
        foreach($personas as $persona){
            $esTrabajador = Trabajador::where('persona_id',$persona->id)->get();
            if($esTrabajador!='[]'){
                $persona['esTrabajador']='Sí';
                $esGerente = Gerente::where('trabajador_id',$esTrabajador[0]->id)->get();
                if($esGerente!='[]'){
                    $persona['esGerente']='Sí';
                }else{
                    $persona['esGerente']='No';
                }
            }else{
                $persona['esTrabajador']='No';
            }
            
        }
        return view('index', compact('personas'));
    }

    public function crear(Request $request)
    {
        $request->validate(['nombre'=>'required','apellidos'=>'required','edad'=>'required|numeric|min:16|max:99','esTrabajador'=>'required']);
        if($request->esTrabajador=='Trabajador'){
            $request->validate(['telefono'=>'required|numeric','rango'=>'required']);
            if($request->rango=='Gerente'){
                $request->validate(['telefono'=>'required|numeric','salario'=>'required|numeric']);
            }elseif($request->rango=='Empleado'){
                $request->validate(['telefono'=>'required|numeric','precioPorHora'=>'required|numeric','horasTrabajadas'=>'required|numeric']);
            }
        }
        $personaNueva = new Persona;
        $personaNueva->nombre=$request->nombre;
        $personaNueva->apellidos=$request->apellidos;
        $personaNueva->edad=$request->edad;
        $personaNueva->save();
        if($request->esTrabajador=='Trabajador'){
            $trabajadorNuevo = new Trabajador;
            $trabajadorNuevo->telefonos=$request->telefono;
            $trabajadorNuevo->persona_id=$personaNueva->id;
            $trabajadorNuevo->save();
            if($request->rango=='Gerente'){
                $gerenteNuevo = new Gerente;
                $gerenteNuevo->salario=$request->salario;
                $gerenteNuevo->trabajador_id=$trabajadorNuevo->id;
                $gerenteNuevo->save();
            }else if($request->rango=='Empleado'){
                $empleadoNuevo = new Empleado;
                $empleadoNuevo->precioPorHora=$request->precioPorHora;
                $empleadoNuevo->horasTrabajadas=$request->horasTrabajadas;
                $empleadoNuevo->trabajador_id=$trabajadorNuevo->id;
                $empleadoNuevo->save();
            }
        }
        return back() -> with('mensaje', 'Persona Nueva Creada');
    }

    public function eliminar($id)
    {
        $personaEliminar = Persona::findOrFail($id);
        $trabajadorEliminar = Trabajador::where('persona_id',$personaEliminar->id)->get();
        if($trabajadorEliminar!='[]'){
            $gerenteEliminar = Gerente::where('trabajador_id',$trabajadorEliminar[0]->id)->get();
            if($gerenteEliminar=='[]'){
                $empleadoEliminar = Empleado::where('trabajador_id',$trabajadorEliminar[0]->id)->get();
                if($empleadoEliminar!='[]'){
                    $empleadoEliminar[0]->delete();
                }
            }else{
                $gerenteEliminar[0]->delete();
            }
            $trabajadorEliminar[0]->delete();
        }
        $personaEliminar->delete();
        return back() -> with('mensaje', 'Persona Eliminada');
    }

    public function editar($id){
        $persona=Persona::findOrFail($id);
        $rango='persona';
        $esTrabajador = Trabajador::where('persona_id',$persona->id)->get();
        if($esTrabajador!='[]'){
            $rango='trabajador';
            $persona['telefonos']=$esTrabajador[0]->telefonos;
            $esGerente = Gerente::where('trabajador_id',$esTrabajador[0]->id)->get();
            if($esGerente=='[]'){
                $esEmpleado = Empleado::where('trabajador_id',$esTrabajador[0]->id)->get();
                if($esEmpleado!='[]'){
                    $rango='empleado';
                    $persona['precioPorHora']=$esEmpleado[0]->precioPorHora;
                    $persona['horasTrabajadas']=$esEmpleado[0]->horasTrabajadas;
                }
            }else{
                $rango='gerente';
                $persona['salario']=$esGerente[0]->salario;
            }
        }
        return view('editar',['persona'=>$persona],['rango'=>$rango]);
    }

    public function actualizar(Request $request, $id){
        $request->validate(['nombre'=>'required','apellidos'=>'required','edad'=>'required|numeric|min:16|max:99']);
        if($request->rango==='trabajador' || $request->rango==='gerente' || $request->rango==='empleado'){
            $request->validate(['telefonos'=>'required|numeric']);
            if($request->rango==='gerente'){
                $request->validate(['salario'=>'required|numeric']);
            }else if($request->rango==='empleado'){
                $request->validate(['precioPorHora'=>'required|numeric','horasTrabajadas'=>'required|numeric']);
            }
        }
        $personaActualizar=Persona::findOrFail($id);
        $personaActualizar->nombre=$request->nombre;
        $personaActualizar->apellidos=$request->apellidos;
        $personaActualizar->edad=$request->edad;
        if($request->rango===strtolower($request->rango_cambio)){
            if($request->rango==='trabajador' || $request->rango==='gerente' || $request->rango==='empleado'){
                $trabajadorActualizar=Trabajador::where('persona_id',$personaActualizar->id)->get();
                $trabajadorActualizar[0]->telefonos=$request->telefonos;
                $trabajadorActualizar[0]->save();
            }
    
            if($request->rango==='gerente'){
                $gerenteActualizar=Gerente::where('trabajador_id',$trabajadorActualizar[0]->id)->get();
                $gerenteActualizar[0]->salario=$request->salario;
                $gerenteActualizar[0]->save();
            }else if($request->rango==='empleado'){
                $empleadoActualizar=Empleado::where('trabajador_id',$trabajadorActualizar[0]->id)->get();
                $empleadoActualizar[0]->precioPorHora=$request->precioPorHora;
                $empleadoActualizar[0]->horasTrabajadas=$request->horasTrabajadas;
                $empleadoActualizar[0]->save();
            }    
        }else{
            if(strtolower($request->rango_cambio)==='persona'){
                $trabajadorActualizar=Trabajador::where('persona_id',$personaActualizar->id)->get();
                if($request->rango==='gerente'){
                    $gerenteActualizar=Gerente::where('trabajador_id',$trabajadorActualizar[0]->id)->get();
                    $gerenteActualizar[0]->delete();
                }else if($request->rango==='empleado'){
                    $empleadoActualizar=Empleado::where('trabajador_id',$trabajadorActualizar[0]->id)->get();
                    $empleadoActualizar[0]->delete();
                }
                $trabajadorActualizar[0]->delete();
            }else if(strtolower($request->rango_cambio)==='trabajador'){
                if($request->rango==='persona'){
                    $request->validate(['telefonos'=>'required|numeric']);
                    $trabajadorActualizar = new Trabajador;
                    $trabajadorActualizar->persona_id=$personaActualizar->id;
                    $trabajadorActualizar->telefonos=$request->telefonos;
                    $trabajadorActualizar->save();
                }else if($request->rango==='empleado'){
                    $trabajadorActualizar=Trabajador::where('persona_id',$personaActualizar->id)->get();
                    $empleadoActualizar=Empleado::where('trabajador_id',$trabajadorActualizar[0]->id)->get();
                    $empleadoActualizar[0]->delete();
                }else if($request->rango==='gerente'){
                    $trabajadorActualizar=Trabajador::where('persona_id',$personaActualizar->id)->get();
                    $gerenteActualizar=Gerente::where('trabajador_id',$trabajadorActualizar[0]->id)->get();
                    $gerenteActualizar[0]->delete();
                }
            }else if(strtolower($request->rango_cambio)==='gerente'){
                $request->validate(['salario'=>'required|numeric']);
                if($request->rango==='persona'){
                    $request->validate(['telefonos'=>'required|numeric']);
                    $trabajadorActualizar = new Trabajador;
                    $trabajadorActualizar->persona_id=$personaActualizar->id;
                    $trabajadorActualizar->telefonos=$request->telefonos;
                    $trabajadorActualizar->save();
                    $gerenteActualizar = new Gerente;
                    $gerenteActualizar->trabajador_id=$trabajadorActualizar->id;
                    $gerenteActualizar->salario=$request->salario;
                    $gerenteActualizar->save();
                }else if($request->rango==='trabajador'){
                    $trabajadorActualizar=Trabajador::where('persona_id',$personaActualizar->id)->get();
                    $gerenteActualizar = new Gerente;
                    $gerenteActualizar->trabajador_id=$trabajadorActualizar[0]->id;
                    $gerenteActualizar->salario=$request->salario;
                    $gerenteActualizar->save();
                }else if($request->rango==='empleado'){
                    $trabajadorActualizar=Trabajador::where('persona_id',$personaActualizar->id)->get();
                    $empleadoActualizar=Empleado::where('trabajador_id',$trabajadorActualizar[0]->id)->get();
                    $empleadoActualizar[0]->delete();
                    $gerenteActualizar = new Gerente;
                    $gerenteActualizar->trabajador_id=$trabajadorActualizar[0]->id;
                    $gerenteActualizar->salario=$request->salario;
                    $gerenteActualizar->save();
                }
            }else if(strtolower($request->rango_cambio)==='empleado'){
                $request->validate(['precioPorHora'=>'required|numeric','horasTrabajadas'=>'required|numeric']);
                if($request->rango==='persona'){
                    $request->validate(['telefonos'=>'required|numeric']);
                    $trabajadorActualizar = new Trabajador;
                    $trabajadorActualizar->persona_id=$personaActualizar->id;
                    $trabajadorActualizar->telefonos=$request->telefonos;
                    $trabajadorActualizar->save();
                    $empleadoActualizar = new Empleado;
                    $empleadoActualizar->trabajador_id=$trabajadorActualizar->id;
                    $empleadoActualizar->precioPorHora=$request->precioPorHora;
                    $empleadoActualizar->horasTrabajadas=$request->horasTrabajadas;
                    $empleadoActualizar->save();
                }else if($request->rango==='trabajador'){
                    $trabajadorActualizar=Trabajador::where('persona_id',$personaActualizar->id)->get();
                    $empleadoActualizar = new Empleado;
                    $empleadoActualizar->trabajador_id=$trabajadorActualizar[0]->id;
                    $empleadoActualizar->precioPorHora=$request->precioPorHora;
                    $empleadoActualizar->horasTrabajadas=$request->horasTrabajadas;
                    $empleadoActualizar->save();
                }else if($request->rango==='gerente'){
                    $trabajadorActualizar=Trabajador::where('persona_id',$personaActualizar->id)->get();
                    $gerenteActualizar=Gerente::where('trabajador_id',$trabajadorActualizar[0]->id)->get();
                    $gerenteActualizar[0]->delete();
                    $empleadoActualizar = new Empleado;
                    $empleadoActualizar->trabajador_id=$trabajadorActualizar[0]->id;
                    $empleadoActualizar->precioPorHora=$request->precioPorHora;
                    $empleadoActualizar->horasTrabajadas=$request->horasTrabajadas;
                    $empleadoActualizar->save();
                }
            }
        }

        $personaActualizar->save();
        return redirect()->route('personas.volver');
    }

    function visualizar($id){
        $persona=Persona::findOrFail($id);
        $rango='persona';
        $esTrabajador = Trabajador::where('persona_id',$persona->id)->get();
        if($esTrabajador!='[]'){
            $rango='trabajador';
            $persona['telefonos']=$esTrabajador[0]->telefonos;
            $esGerente = Gerente::where('trabajador_id',$esTrabajador[0]->id)->get();
            if($esGerente=='[]'){
                $esEmpleado = Empleado::where('trabajador_id',$esTrabajador[0]->id)->get();
                if($esEmpleado!='[]'){
                    $rango='empleado';
                    $persona['precioPorHora']=$esEmpleado[0]->precioPorHora;
                    $persona['horasTrabajadas']=$esEmpleado[0]->horasTrabajadas;
                    $persona['calcularSueldo']=$esEmpleado[0]->calcularSueldo();
                    if($esEmpleado[0]->debePagarImpuestos()){
                        $persona['debePagarImpuestos']='Sí';
                    }else{
                        $persona['debePagarImpuestos']='No';
                    }
                }
            }else{
                $persona['calcularSueldo']=$esGerente[0]->calcularSueldo();
                if($esGerente[0]->debePagarImpuestos()){
                    $persona['debePagarImpuestos']='Sí';
                }else{
                    $persona['debePagarImpuestos']='No';
                }
                $rango='gerente';
                $persona['salario']=$esGerente[0]->salario;
            }
        }
        return view('visualizar',['persona'=>$persona],['rango'=>$rango]);
    }
}
