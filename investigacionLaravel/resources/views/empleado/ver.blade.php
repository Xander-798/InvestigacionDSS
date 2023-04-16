@extends('plantilla')
@section('contenedor')
<div class="container">
<h1>Empleado</h1>

    <div class="form-group">
        <label for="nombre">Nombre</label>
        <h2>{{isset($empleado->nombre)?$empleado->nombre:old('nombre')}} <h2>
    </div>
    <div class="form-group">
        <label for="apellidos">Apellidos</label>
        <h2>{{isset($empleado->apellidos)?$empleado->apellidos:old('apellidos')}}</h2>
    </div>

    <div class="form-group">
        <label for="edad">Edad</label>
        <h2>{{isset($empleado->edad)?$empleado->edad:old('edad')}}</h2>
    </div>
    <div class="form-group">
        <label for="salario">Salario</label>
        <h2>{{isset($empleado->salario)?$empleado->salario:old('salario')}}</h2>
    </div>
    <a 
        href="{{ url('empleado') }}"
        class="btn btn-primary"
    >
        Regresar
    </a>
</div>
@endsection