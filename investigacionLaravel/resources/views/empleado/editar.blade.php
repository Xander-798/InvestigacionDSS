@extends('plantilla')
@section('contenedor')
<div class="container">
<form action="{{ url('/empleado/'.$empleado->id) }}" method="post">
    @csrf   
    {{ method_field('PUT') }}
    @include('empleado.formulario', ['accion'=>'Editar'])
</form>
</div>
@endsection