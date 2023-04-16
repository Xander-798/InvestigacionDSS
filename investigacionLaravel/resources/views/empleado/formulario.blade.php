
<h1>{{ $accion }} Empleado</h1>
    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" value="{{isset($empleado->nombre)?$empleado->nombre:old('nombre')}}" required>
    </div>
    <div class="form-group">
        <label for="apellidos">Apellidos</label>
        <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{isset($empleado->apellidos)?$empleado->apellidos:old('apellidos')}}" required>
    </div>

    <div class="form-group">
        <label for="edad">Edad</label>
        <input type="number" class="form-control" name="edad" id="edad" min="1" max="100" step="1" value="{{isset($empleado->edad)?$empleado->edad:old('edad')}}" required>
    </div>
    <div class="form-group">
        <label for="salario">Salario</label>
        <input type="number" class="form-control" name="salario" id="salario" min="1100" step="any" value="{{isset($empleado->salario)?$empleado->salario:old('salario')}}" required>
    </div>

    <input 
        type="submit" 
        value="{{ $accion }} Datos"
        class = "btn btn-success"
    >
    <a 
        href="{{ url('empleado') }}"
        class="btn btn-primary"
    >
        Regresar
    </a>
