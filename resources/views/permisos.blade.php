@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box_header">
            <h3 class="box-title">Lista de archivos</h3>
        </div>
        <div class="box-body">
            <table class="table-data" class="table table-bprdered">
                <thead>
                    <tr>
                        <th>fecha</th>
                        <th></th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($divisiones as $division)
                    <tr>
                        <td>{{ $division['codigo'] }}</td>
                        <td>{{ $division['nombre'] }}</td>
                        <td>
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <a href="{{route('nueva.division', ['id' => $division->id])}}" class="btn btn-success btn-sm rounded-0">
                                        <span class="far fa-edit">Editar</span>
                                    </a>
                                </li>
                            </ul>
                        </td>
                        <td>
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <a href="{{route('eliminar.division', ['id' => $division->id])}}" class="btn btn-danger btn-sm rounded-0">
                                        <span class="fa fa-trash">Eliminar</span>
                                    </a>
                                </li>
                            </ul>
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