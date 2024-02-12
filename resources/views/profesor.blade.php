@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box-body">
            <form action="{{ route('profesores.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $profesor->id }}">
                <div class="form-group">
                    <label for="numero_empleado">Número de Empleado:</label>
                    <input type="text" name="numero_empleado" class="form-control" value="{{ old('numero_empleado', $profesor->numero_empleado ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $profesor->nombre ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label for="numero_horas">Número de Horas:</label>
                    <input type="number" name="numero_horas" class="form-control" value="{{ old('numero_horas', $profesor->numero_horas ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label for="puesto_id">Puesto:</label>
                        <select name="puesto_id" class="form-control" required>
                            @foreach($puestos as $puesto)
                                <option value="{{ $puesto->id }}" {{ old('puesto_id', $profesor->puesto_id ?? '') == $puesto->id ? 'selected' : '' }}>
                                {{ $puesto->nombre }}
                                </option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label for="division_id">División:</label>
                        <select name="division_id" class="form-control" required>
                            @foreach($divisiones as $division)
                                <option value="{{ $division->id }}" {{ old('division_id',       $profesor->division_id ?? '') == $division->id ? 'selected' : '' }}>
                                {{ $division->nombre }}
                                </option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label for="inicio_contrato">Inicio de Contrato:</label>
                    <input type="date" name="inicio_contrato" class="form-control" value="{{ old('inicio_contrato', $profesor->inicio_contrato ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label for="fin_contrato">Fin de Contrato:</label>
                    <input type="date" name="fin_contrato" class="form-control" value="{{ old('fin_contrato', $profesor->fin_contrato ?? '') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@stop
