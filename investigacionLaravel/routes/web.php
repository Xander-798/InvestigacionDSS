<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('empleado');
});

/*
//Ruta que permite acceder a la vista principal
Route::get('/empleado', function () {
    return view('empleado.index');
});




*/

//Ruta para acceder al formulario de registro de un nuevo empleado (método HTTP GET)
Route::get('/empleado/create', [EmpleadosController::class, 'create']);

//Ruta para ver todos los registros (método HTTP GET)
Route::get('/empleado', [EmpleadosController::class, 'index']);

//Ruta para ver un registro en especifico (método HTTP GET)
Route::get('/empleado/{id}', [EmpleadosController::class, 'show']);
 

//Ruta para enviar los parmetros para insertar el nuevo registro en la tabla de la bdd (método HTTP POST)
Route::post('/empleado', [EmpleadosController::class, 'store']);

//Ruta para acceder al formulario de edición de un registro existente (método HTTP GET)
Route::get('/empleado/{id}/edit', [EmpleadosController::class, 'edit']);

//Ruta para enviar los parmetros modificados que serán actualizados en el registro especificado (método HTTP PUT)
Route::put('/empleado/{id}', [EmpleadosController::class, 'update']);

//Ruta para enviar los parmetros modificados que serán actualizados en el registro especificado (método HTTP PATCH)
Route::patch('/empleado/{id}', [EmpleadosController::class, 'update']);

//Ruta para enviar el parámetro "id" que coincida con un registro de la tabla en la bdd
// para eliminarlo (método HTTP DELETE)
Route::delete('/empleado/{id}', [EmpleadosController::class, 'destroy']);


//Forma más sencilla de manejar rutas relacionadas con métodos de un controlador
//distingue de cada método en base a la estructura de las rutas
Route::resource('empleado', EmpleadosController::class);