@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box_body">
            <form action="{{ route ('guardar.puesto')}}" method="POST">
                    @csrf
                <div class="form-box">
                    <input type="hidden" name="id" value="{{$puesto->id}}">
                    <label for="codigo">Código:</label>
                    <input type="text" name="codigo" value="{{$puesto->codigo}}" class="form-control" required>
                </div>
                <div class="form-box">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="{{$puesto->nombre}}" class="form-control" required>
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
    <script> console.log('Hi!'); </script>
@stop