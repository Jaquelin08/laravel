<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Profesor;
use App\Models\Puesto;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function view(Request $req){
        if ($req->id) {
            $profesor = Profesor::find($req->id);
            $profesores = Profesor::select('profesores.*', 'division.nombre as nombre_division', 'puestos.nombre as nombre_puesto')
        ->join('division', 'profesores.divisionid', '=', 'division.id')
        ->join('puestos', 'profesores.puestoid', '=', 'puestos.id')
        ->get();
        } else {
            $profesor = new Profesor();
            $profesores = Division::select('id as divisionid', 'nombre as nombre_division')
            ->get();
        }
        $divisiones = Division::select('id as divisionid', 'nombre as nombre_division')
        ->get();
        $puesto = Puesto::select('id as puestoid', 'nombre as nombre_puesto')
        ->get();
        return view('/profesor', compact('profesor', 'profesores', 'divisiones', 'puesto'));
    }

    public function store(Request $req){    
        if ($req->id != 0) {
            $profesor = Profesor::find($req->id);
        } else {
            $profesor = new Profesor();
        }

        $profesor->numero_empleado = $req->numero_empleado;
        $profesor->nombre = $req->nombre;
        $profesor->numero_horas = $req->numero_horas;
        $profesor->divisionid = $req->divisionid;
        $profesor->puestoid = $req->puestoid;
        $profesor->inicio_contrato = $req->inicio_contrato;
        $profesor->fin_contrato = $req->fin_contrato;
        $profesor->save();
        return redirect()->route('profesores');
    }

    public function storeAPI(Request $req){    
        if ($req->id != 0) {
            $profesor = Profesor::find($req->id);
        } else {
            $profesor = new Profesor();
        }

        $profesor->numero_empleado = $req->numero_empleado;
        $profesor->nombre = $req->nombre;
        $profesor->numero_horas = $req->numero_horas;
        $profesor->divisionid = $req->divisionid;
        $profesor->puestoid = $req->puestoid;
        $profesor->inicio_contrato = $req->inicio_contrato;
        $profesor->fin_contrato = $req->fin_contrato;
        $profesor->save();
        return "Profesor guardado correctamente";;
    }
    
    public function delete(Request $req){
        $profesor = Profesor::find($req->id);
        $profesor->delete();
        return redirect()->route('profesores');
    }
    
    public function deleteAPI(Request $req){
        $profesor = Profesor::find($req->id);
        $profesor->delete();
        return "Profesor eliminado correctamente";;
    }
    
    public function index(){
        $profesores = Profesor::select('profesores.*', 'division.nombre as nombre_division', 'puestos.nombre as nombre_puesto')
        ->join('division', 'profesores.divisionid', '=', 'division.id')
        ->join('puestos', 'profesores.puestoid', '=', 'puestos.id')
        ->get();
        return view('/profesores', compact('profesores'));
    }
    
    public function list(){
        $profesores = Profesor::select('profesores.*', 'division.nombre as nombre_division', 'puestos.nombre as nombre_puesto')
        ->join('division', 'profesores.divisionid', '=', 'division.id')
        ->join('puestos', 'profesores.puestoid', '=', 'puestos.id')
        ->get();
        return json_encode($profesores);
    }
}
