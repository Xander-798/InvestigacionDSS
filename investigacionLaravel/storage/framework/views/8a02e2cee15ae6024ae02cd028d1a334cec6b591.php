
<?php $__env->startSection('contenedor'); ?>
<div class="container">
<h1>Empleado</h1>

    <div class="form-group">
        <label for="nombre">Nombre</label>
        <h2><?php echo e(isset($empleado->nombre)?$empleado->nombre:old('nombre')); ?> <h2>
    </div>
    <div class="form-group">
        <label for="apellidos">Apellidos</label>
        <h2><?php echo e(isset($empleado->apellidos)?$empleado->apellidos:old('apellidos')); ?></h2>
    </div>

    <div class="form-group">
        <label for="edad">Edad</label>
        <h2><?php echo e(isset($empleado->edad)?$empleado->edad:old('edad')); ?></h2>
    </div>
    <div class="form-group">
        <label for="salario">Salario</label>
        <h2><?php echo e(isset($empleado->salario)?$empleado->salario:old('salario')); ?></h2>
    </div>
    <a 
        href="<?php echo e(url('empleado')); ?>"
        class="btn btn-primary"
    >
        Regresar
    </a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\XAmp\htdocs\investigacion\resources\views/empleado/ver.blade.php ENDPATH**/ ?>