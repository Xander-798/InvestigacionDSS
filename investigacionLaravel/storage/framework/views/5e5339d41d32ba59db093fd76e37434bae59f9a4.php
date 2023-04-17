<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Laravel - Investigación</title>
  </head>
  <body>
    <header>  
    <nav class="container navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="<?php echo e(route('empleado.index')); ?>">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/985px-Laravel.svg.png" height="50px" alt="Inicio">
        CRUD
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#toggle" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">  
            <a href="<?php echo e(route('empleado.index')); ?>" class="nav-link"><?php echo e(_('Empleados')); ?></a>  
                
          </li>      
        </ul>
      </div>
    </nav>
    </header>
    <div>
        <?php echo $__env->yieldContent('contenedor'); ?>
    </div>
    <!-- Footer -->
    <div class="footer-copyright text-center py-3">© 2022 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/"> <?php echo $_SERVER['SERVER_NAME'];?></a>
    </div>
    <!-- Footer -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html><?php /**PATH C:\XAmp\htdocs\investigacion\resources\views/plantilla.blade.php ENDPATH**/ ?>