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

>>>>>>> 265ddc2ab1be391e6608a6e67160d2bbd653db51
    protected $fillable = ['nombre', 'apellidos', 'edad', 'salario'];
}
