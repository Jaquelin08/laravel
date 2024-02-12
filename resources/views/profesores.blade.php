@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de Profesores</h3>
        </div>
        <div class="box-body">
            <table id="table-data" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Num. Empleado</th>
                        <th>Nombre</th>
                        <th>Puesto</th>
                        <th>División</th>
                        <th>Num. Horas</th>
                        <th>Inicio Contrato</th>
                        <th>Fin Contrato</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profesores as $profesor)
                        <tr>
                            <td>{{ $profesor->numero_empleado }}</td>
                            <td>{{ $profesor->nombre }}</td>
                            <td>{{ $profesor->puesto ? $profesor->puesto->nombre : 'N/A' }}</td>
                            <td>{{ $profesor->division ? $profesor->division->nombre : 'N/A' }}</td>
                            <td>{{ $profesor->numero_horas }}</td>
                            <td>{{ $profesor->inicio_contrato }}</td>
                            <td>{{ $profesor->fin_contrato }}</td>
                            <td>
                                <ul class="list-inline m0" style="display: flex; gap: 5px;">
                                    <li class="list-inline-item">
                                    <a href="{{ route('profesores.edit', ['id' => $profesor->id]) }}" class="btn btn-primary btn-sm rounded-0">
                                        <span class="far far-pencil-alt">Editar</span>
                                    </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ route('profesores.delete', $profesor->id) }}" class="btn btn-danger btn-sm rounded-0">
                                            <span class="far far-trash-alt">Eliminar</span>
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
