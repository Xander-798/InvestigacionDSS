<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
<<<<<<< HEAD
    //Este script se genera al usar el comando "php artisan make:model Empleado"
    //Con esta variable definimos los campos a los que se le pueden ingresar datos
=======
<<<<<<< HEAD
    //Este script se genera al usar el comando "php artisan make:model Empleado"
    //Con esta variable definimos los campos a los que se le pueden ingresar datos
=======

>>>>>>> 265ddc2ab1be391e6608a6e67160d2bbd653db51
>>>>>>> fb28bae3637496f1d712542b66b89e8b6428be8d
    protected $fillable = ['nombre', 'apellidos', 'edad', 'salario'];
}
