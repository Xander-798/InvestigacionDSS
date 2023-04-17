
<?php $__env->startSection('contenedor'); ?>
<div class="container">
<form action="<?php echo e(url('/empleado')); ?>" method="post">
    <?php echo csrf_field(); ?>   
    
    <?php echo $__env->make('empleado.formulario', ['accion'=>'Registrar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\XAmp\htdocs\investigacion\resources\views/empleado/crear.blade.php ENDPATH**/ ?>