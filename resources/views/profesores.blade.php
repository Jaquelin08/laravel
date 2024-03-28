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
                        <th>Num. Empleado</th>
                        <th>Nombre</th>
                        <th>Numero de horas</th>
                        <th>Division</th>   
                        <th>Puesto</th>   
                        <th>Inicion del contrato</th>
                        <th>Fin del contrato</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profesores as $profesor)
                    <tr>
                        <td>{{ $profesor['numero_empleado'] }}</td>
                        <td>{{ $profesor['nombre'] }}</td>
                        <td>{{ $profesor['numero_horas'] }}</td>
                        <td>{{ $profesor['nombre_division'] }}</td>
                        <td>{{ $profesor['nombre_puesto'] }}</td>
                        <td>{{ $profesor['inicio_contrato'] }}</td>
                        <td>{{ $profesor['fin_contrato'] }}</td>
                        <td>
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <a href="{{route('nuevo.profesor', ['id' => $profesor->id, 'numero_empleado' => $profesor->numero_empleado, 'divisionid' => $profesor->divisionid, 'nombre_division' => $profesor->nombre_division, 'puestoid' => $profesor->puestoid, 'nombre_pueto' => $profesor->nombre_puesto])}}" class="btn btn-success btn-sm rounded-0">
                                        <span class="far fa-edit">Editar</span>
                                    </a>
                                </li>
                            </ul>
                        </td>
                        <td>
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <a href="{{route('eliminar.profesor', ['id' => $profesor->id],)}}" class="btn btn-danger btn-sm rounded-0">
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