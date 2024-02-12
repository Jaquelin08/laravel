<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Profesor;
use App\Models\Puesto;
use Illuminate\Http\Request;


class ProfesorController extends Controller
{
    public function view(Request $req)
    {
        if ($req->id) {
            $profesor = Profesor::find($req->id);
        } else {
            $profesor = new Profesor();
        }

        return view('profesor', compact('profesor'));
    }

    public function index()
    {
        $profesores = Profesor::all();
        return view('profesores', compact('profesores'));
    }

    public function create()
    {
        $divisiones = Division::all();
        $puestos = Puesto::all();
        $profesor = new Profesor(); // Creamos un nuevo objeto profesor, puede ser vacío o con valores predeterminados según tus necesidades

        return view('profesor', compact('profesor', 'divisiones', 'puestos'));
    }

    public function edit($id)
    {
        $profesor = Profesor::find($id);
        $divisiones = Division::all();
        $puestos = Puesto::all();

        return view('profesor', compact('profesor', 'divisiones','puestos'));
    }

    public function store(Request $req)
    {
        // Verifica si se proporcionó un ID en la solicitud
        if ($req->id) {
            // Estamos en modo de edición, así que actualizamos el profesor existente
            $profesor = Profesor::find($req->id);
        } else {
            // Estamos en modo de creación, así que creamos un nuevo profesor
            $profesor = new Profesor();
        }

        $profesor->numero_empleado = $req->numero_empleado;
        $profesor->nombre = $req->nombre;
        $profesor->numero_horas = $req->numero_horas;
        $profesor->puesto_id = $req->puesto_id;
        $profesor->division_id = $req->division_id; // Ajusta esto según tus necesidades
        $profesor->inicio_contrato = $req->inicio_contrato;
        $profesor->fin_contrato = $req->fin_contrato;

        $profesor->save();

        return redirect()->route('profesores.index')->with('success', 'Profesor creado exitosamente');
    }

    public function delete(Request $req)
    {
        $profesor = Profesor::find($req->id);
        $profesor->delete();

        return redirect()->route('profesores.index')->with('success', 'Profesor eliminado exitosamente');
    }
}
