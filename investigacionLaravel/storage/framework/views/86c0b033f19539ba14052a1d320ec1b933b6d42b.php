
<?php $__env->startSection('contenedor'); ?>
<div class="container">
    <?php if(Session::has('mensaje')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <?php echo e(Session::get('mensaje')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <a href="<?php echo e(url('empleado/create')); ?>" class="btn btn-success">Registrar nuevo empleado</a>
    <br/>
    <br/>
    <?php if($empleados->count() >0): ?>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Salario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($empleado->id); ?></td>
                <td><?php echo e($empleado->nombre); ?></td>
                <td><?php echo e($empleado->apellidos); ?></td>
                <td><?php echo e($empleado->edad); ?></td>
                <td><?php echo e($empleado->salario); ?></td>
                <td>
                    <form action="<?php echo e(url('/empleado/'.$empleado->id)); ?>" method="post"
                        class="d-inline"
                    >
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('PATCH')); ?>

                        <div class="form-group">
                            <label for="salario">Salario</label>
                            <input type="number" class="form-control" name="salario" id="salario" min="100" max="10000" step="any" value="<?php echo e(isset($empleado->salario)?$empleado->salario:old('salario')); ?>" required>
                        </div>
                        <input type="submit"
                            value="Editando con PATCH"
                            class="btn btn-danger"
                        >
                    </form>
                    |
                    <a href="<?php echo e(url('/empleado/'.$empleado->id.'/edit/')); ?>"
                        class="btn btn-warning">
                        Editar
                    </a> 
                    |
                    <form action="<?php echo e(url('/empleado/'.$empleado->id)); ?>" method="post"
                        class="d-inline"
                    >
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('DELETE')); ?>

                        <input type="submit" onclick="return 
                            confirm('¿En verdad desea borrar este Empleado?')" 
                            value="Borrar"
                            class="btn btn-danger"
                        >
                    </form>
                    |
                    <a href="<?php echo e(url('/empleado/'.$empleado->id)); ?>"
                        class="btn btn-success">
                        Ver
                    </a> 
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo $empleados->links(); ?>

    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\XAmp\htdocs\investigacion\resources\views/empleado/index.blade.php ENDPATH**/ ?>