@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Formulario de Puesto</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-body">
            <form action="{{ route('guardar.puesto') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$puesto->id}}">
                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text" name="codigo" value="{{$puesto->codigo}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="{{$puesto->nombre}}" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@stop