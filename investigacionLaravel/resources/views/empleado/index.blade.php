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
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="salario">Salario</label>
                            <input type="hidden" class="form-control" name="nombre" id="nombre" min="10000" step="any" value="{{isset($empleado->nombre)?$empleado->nombre:old('nombre')}}" required>
                            <input type="hidden" class="form-control" name="apellidos" id="apellidos" min="10000" step="any" value="{{isset($empleado->apellidos)?$empleado->apellidos:old('apellidos')}}" required>
                            <input type="hidden" class="form-control" name="edad" id="edad" min="10000" step="any" value="{{isset($empleado->edad)?$empleado->edad:old('edad')}}" required>
                            <input type="number" class="form-control" name="salario" id="salario" min="100" max="10000" step="any" value="{{isset($empleado->salario)?$empleado->salario:old('salario')}}" required>
                        </div>
                        <input type="submit"
                            value="Editando con PUT"
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
    @endif
</div>