<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function view(Request $req){
        if ($req->id) {
            $division = Division::find($req->id);
        } else {
            $division = new Division();
        }
        return view('/division', compact('division'));
    }

    public function store(Request $req){
        if ($req->id != 0) {
            $division = Division::find($req->id);
        } else {
            $division = new Division();
        }

        $division->codigo = $req->codigo;
        $division->nombre = $req->nombre;
        $division->save();
        return redirect()->route('divisiones');
    }

    public function storeAPI(Request $req){
        if ($req->id != 0) {
            $division = Division::find($req->id);
        } else {
            $division = new Division();
        }
        $division->codigo = $req->codigo;
        $division->nombre = $req->nombre;
        $division->save();
        return "Division guardada correctamente";
    }
    
    public function delete(Request $req){
        $division = Division::find($req->id);
        $division->delete();
        return redirect()->route('divisiones');
    }
    
    public function deleteAPI(Request $req){
        $division = Division::find($req->id);
        $division->delete();
        return "Division eliminada correctamente";
    }
    
    public function index(){
        $divisiones = Division::all();
        return view('/divisiones', compact('divisiones'));
    }

    public function list(){
        $divisiones = Division::all();
        return json_encode($divisiones);
    }
}
