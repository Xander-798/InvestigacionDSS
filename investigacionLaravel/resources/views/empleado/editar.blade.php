<<<<<<< HEAD
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
=======

<div class="container">
<form action="{{ url('/empleado/'.$empleado->id) }}" method="post">
    @csrf   
    {{ method_field('PATCH') }}
    @include('empleado.formulario', ['accion'=>'Editar'])
</form>
</div>
>>>>>>> 265ddc2ab1be391e6608a6e67160d2bbd653db51
