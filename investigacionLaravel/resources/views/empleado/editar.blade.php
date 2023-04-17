<<<<<<< HEAD
@extends('plantilla')
@section('contenedor')
=======
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

>>>>>>> fb28bae3637496f1d712542b66b89e8b6428be8d
<div class="container">
<form action="{{ url('/empleado/'.$empleado->id) }}" method="post">
    @csrf   
    {{ method_field('PUT') }}
    @include('empleado.formulario', ['accion'=>'Editar'])
</form>
</div>
<<<<<<< HEAD
@endsection
=======
>>>>>>> 265ddc2ab1be391e6608a6e67160d2bbd653db51
>>>>>>> fb28bae3637496f1d712542b66b89e8b6428be8d
