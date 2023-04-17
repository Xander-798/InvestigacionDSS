<<<<<<< HEAD
@extends('plantilla')
@section('contenedor')
=======
>>>>>>> 265ddc2ab1be391e6608a6e67160d2bbd653db51
<div class="container">
<form action="{{ url('/empleado') }}" method="post">
    @csrf   
    
    @include('empleado.formulario', ['accion'=>'Registrar'])
</form>
<<<<<<< HEAD
</div>
@endsection
=======
</div>
>>>>>>> 265ddc2ab1be391e6608a6e67160d2bbd653db51
