
<div class="container">
<form action="{{ url('/empleado/'.$empleado->id) }}" method="post">
    @csrf   
    {{ method_field('PATCH') }}
    @include('empleado.formulario', ['accion'=>'Editar'])
</form>
</div>
