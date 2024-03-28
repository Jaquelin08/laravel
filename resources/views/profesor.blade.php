@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box_body">
            <form action="{{ route ('guardar.profesor')}}" method="POST">
                    @csrf
                <div class="form-box">
                    <label for="numero_empleado">numero de empleado:</label>
                    <input type="number" name="numero_empleado" value="{{$profesor->numero_empleado}}" class="form-control" required>
                </div>
                <div class="form-box">
                    <input type="hidden" name="id" value="{{$profesor->id}}">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="{{$profesor->nombre}}" class="form-control" required>
                </div>
                <div class="form-box">
                    <label for="numero_horas">numero de horas:</label>
                    <input type="number" name="numero_horas" value="{{$profesor->numero_horas}}" class="form-control" required>
                </div>
                <div class="form-box">
                    <label for="divisionid">Division:</label>
                    <select class="form-select" name="divisionid" aria-label="Default select example">
                        @foreach($divisiones as $division)
                        <option value="{{$division->divisionid}}">{{$division->nombre_division}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-box">
                    <label for="puestoid">puesto:</label>
                    <select class="form-select" name="puestoid" aria-label="Default select example">
                        @foreach($puesto as $puesto)
                        <option value="{{$puesto->puestoid}}">{{$puesto->nombre_puesto}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-box">
                    <label for="inicio_contrato">Inicio contrato:</label>
                    <input type="date" name="inicio_contrato" value="{{$profesor->inicio_contrato}}" class="form-control" required>
                </div>
                <div class="form-box">
                    <label for="fin_contrato">Fin contrato:</label>
                    <input type="date" name="fin_contrato" value="{{$profesor->fin_contrato}}" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop