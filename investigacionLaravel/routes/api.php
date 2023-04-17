<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Metodos HTTP
//Por defecto toma la ruta API

//Este método muestra todos los registros
<<<<<<< HEAD
Route::get('/empleado','App\Http\Controllers\EmpleadoController@index');

//Ruta para ver solo un registro
Route::get('/empleado/{id}','App\Http\Controllers\EmpleadoController@show');

//Este método crea un registro y sigue siendo la misma ruta, 
//pues la API identifica por el método HTTP invocado
Route::post('/empleado','App\Http\Controllers\EmpleadoController@store');
=======
Route::get('/empleados','App\Http\Controllers\EmpleadoController@index');

//Ruta para ver solo un registro
Route::get('/empleados/{id}','App\Http\Controllers\EmpleadoController@show');

//Este método crea un registro y sigue siendo la misma ruta, 
//pues la API identifica por el método HTTP invocado
Route::post('/empleados','App\Http\Controllers\EmpleadoController@store');
>>>>>>> 265ddc2ab1be391e6608a6e67160d2bbd653db51

//Este método actualiza un registro
//Es la misma ruta, pero se pasa un parámetro y así identificamos qué registro será actualizado
// además de identificar el método HTTP de la solicitud (PUT y PATCH para actualizar un registro)
<<<<<<< HEAD
Route::put('/empleado/{id}','App\Http\Controllers\EmpleadoController@update');
Route::patch('/empleado/{id}','App\Http\Controllers\EmpleadoController@updatePATCH');
//Este método elimina un registro
//La ruta es similar a la del método put pero cambia el método relacionado al controllador
Route::delete('/empleado/{id}','App\Http\Controllers\EmpleadoController@destroy');
=======
Route::put('/empleados/{id}','App\Http\Controllers\EmpleadoController@update');
Route::patch('/empleados/{id}','App\Http\Controllers\EmpleadoController@update');
//Este método elimina un registro
//La ruta es similar a la del método put pero cambia el método relacionado al controllador
Route::delete('/empleados/{id}','App\Http\Controllers\EmpleadoController@destroy');
>>>>>>> 265ddc2ab1be391e6608a6e67160d2bbd653db51
