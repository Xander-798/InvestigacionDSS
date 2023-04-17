<div class="container">
<form action="{{ url('/empleado') }}" method="post">
    @csrf   
    
    @include('empleado.formulario', ['accion'=>'Registrar'])
</form>
</div>