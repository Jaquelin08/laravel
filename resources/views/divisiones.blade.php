@extends('adminlte::page')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de Divisiones</h3>
        </div>
        <div class="box-body">
            <table id="table-data" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($divisiones as $division)
                        <tr>
                            <td>{{$division['codigo']}}</td>
                            <td>{{$division['nombre']}}</td>
                            <td>
    <div class="btn-group">
        <a href="{{ route('nueva.division', ['id' => $division->id]) }}" class="btn btn-success btn-sm rounded-0">
            <span class="far far-pencil-alt">Editar</span>
        </a>
        <a href="{{ route('delete.division', ['id' => $division->id]) }}" class="btn btn-warning btn-sm rounded-0 mr-2">
            <span class="far far-pencil-alt">Eliminar</span>
        </a>
    </div>
</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#table-data').DataTable({
        "scrollX": true
    });

    </script>
@stop