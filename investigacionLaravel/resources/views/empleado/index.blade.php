@extends('plantilla')
@section('contenedor')
<div class="container">
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <a href="{{ url('empleado/create') }}" class="btn btn-success">Registrar nuevo empleado</a>
    <br/>
    <br/>
    @if($empleados->count() >0)
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Salario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $empleados as $empleado )
            <tr>
                <td>{{ $empleado->id }}</td>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->apellidos }}</td>
                <td>{{ $empleado->edad }}</td>
                <td>{{ $empleado->salario }}</td>
                <td>
                    <form action="{{ url('/empleado/'.$empleado->id) }}" method="post"
                        class="d-inline"
                    >
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="salario">Salario</label>
                            <input type="number" class="form-control" name="salario" id="salario" min="100" max="10000" step="any" value="{{isset($empleado->salario)?$empleado->salario:old('salario')}}" required>
                        </div>
                        <input type="submit"
                            value="Editando con PATCH"
                            class="btn btn-danger"
                        >
                    </form>
                    |
                    <a href="{{url('/empleado/'.$empleado->id.'/edit/')}}"
                        class="btn btn-warning">
                        Editar
                    </a> 
                    |
                    <form action="{{ url('/empleado/'.$empleado->id) }}" method="post"
                        class="d-inline"
                    >
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return 
                            confirm('¿En verdad desea borrar este Empleado?')" 
                            value="Borrar"
                            class="btn btn-danger"
                        >
                    </form>
                    |
                    <a href="{{url('/empleado/'.$empleado->id)}}"
                        class="btn btn-success">
                        Ver
                    </a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!!$empleados->links() !!}
    @endif
</div>
@endsection