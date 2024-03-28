<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    public function indexAPI(Request $req){
        $permiso = Permiso::find($req->id);
        return $permiso;
    }

    public function view(Request $req){
        if ($req->id) {
            $permiso = Permiso::find($req->id);
        } else {
            $permiso = new Permiso();
        }
        return view('/permiso', compact('permiso'));
    }

    public function store(Request $req){
        if ($req->id != 0) {
            $permiso = Permiso::find($req->id);
        } else {
            $permiso = new Permiso();
        }
        $permiso->fecha = $req->fecha;
        $permiso->estado = $req->estado;
        $permiso->motivo = $req->motivo;
        $permiso->observaciones = $req->observaciones;
        $permiso->profesorid = $req->profesorid;
        $permiso->save();
        return redirect()->route('permisos');
    }

    public function storeAPI(Request $req){
        if ($req->id != 0) {
            $permiso = Permiso::find($req->id);
        } else {
            $permiso = new Permiso();
        }
        $permiso->fecha = $req->fecha;
        $permiso->estado = $req->estado;
        $permiso->motivo = $req->motivo;
        $permiso->observaciones = $req->observaciones;
        $permiso->profesorid = $req->profesorid;
        $permiso->save();
        return "Ok";
    }
    
    public function delete(Request $req){
        $permiso = Permiso::find($req->id);
        $permiso->delete();
        return redirect()->route('permisos');
    }

    public function deleteAPI(Request $req){
        $permiso = Permiso::find($req->id);
        $permiso->delete();
        return "Ok";
    }
    
    public function index(){
        $permisos = Permiso::all();
        return view('/permisos', compact('permisos'));
    }
    
    public function list(){
        $permisos = Permiso::select('permisos.*','profesores.nombre as nombre_profesor')
        ->join('profesores','permisos.profesorid','profesores.id')
        ->get();
        return json_encode($permisos);
    }
}