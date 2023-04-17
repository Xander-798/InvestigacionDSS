<<<<<<< HEAD
@extends('plantilla')
@section('contenedor')
=======
<<<<<<< HEAD
@extends('plantilla')
@section('contenedor')
=======
>>>>>>> 265ddc2ab1be391e6608a6e67160d2bbd653db51
>>>>>>> fb28bae3637496f1d712542b66b89e8b6428be8d
<div class="container">
<form action="{{ url('/empleado') }}" method="post">
    @csrf   
    
    @include('empleado.formulario', ['accion'=>'Registrar'])
</form>
<<<<<<< HEAD
</div>
@endsection
=======
<<<<<<< HEAD
</div>
@endsection
=======
</div>
>>>>>>> 265ddc2ab1be391e6608a6e67160d2bbd653db51
>>>>>>> fb28bae3637496f1d712542b66b89e8b6428be8d
