
<h1><?php echo e($accion); ?> Empleado</h1>
    <?php if(count($errors)>0): ?>
        <div class="alert alert-danger" role="alert">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo e(isset($empleado->nombre)?$empleado->nombre:old('nombre')); ?>" required>
    </div>
    <div class="form-group">
        <label for="apellidos">Apellidos</label>
        <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo e(isset($empleado->apellidos)?$empleado->apellidos:old('apellidos')); ?>" required>
    </div>

    <div class="form-group">
        <label for="edad">Edad</label>
        <input type="number" class="form-control" name="edad" id="edad" min="1" max="100" step="1" value="<?php echo e(isset($empleado->edad)?$empleado->edad:old('edad')); ?>" required>
    </div>
    <div class="form-group">
        <label for="salario">Salario</label>
        <input type="number" class="form-control" name="salario" id="salario" min="1100" step="any" value="<?php echo e(isset($empleado->salario)?$empleado->salario:old('salario')); ?>" required>
    </div>

    <input 
        type="submit" 
        value="<?php echo e($accion); ?> Datos"
        class = "btn btn-success"
    >
    <a 
        href="<?php echo e(url('empleado')); ?>"
        class="btn btn-primary"
    >
        Regresar
    </a>
<?php /**PATH C:\XAmp\htdocs\investigacion\resources\views/empleado/formulario.blade.php ENDPATH**/ ?>