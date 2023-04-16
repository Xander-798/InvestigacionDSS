<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Invocamos el modelo de Empleados
use App\Models\Empleado;
use App\Http\Requests\EmpleadoRequest;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Extrae todos los registros de la tabla Empleado en la bdd "laravel"
        //Se guardan en una variable(arreglo) para devolverlos como respuesta de la API
        $empleados = Empleado::all();
        return $empleados;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function create()
    {
        //
    }
    */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoRequest $request)
    {
        //Esta función es para generar una nueva instancia de la clase Empleado
        //La cual se guardará/almacenará en la tabla correspondiente
        $empleado = new Empleado();

        //Cada atributo del objeto es obtenido de "Request" o solicitud
        //pues la variable $request trae variables con los valores necesarios
        //que se guardan en el objeto Empleado creado
        $empleado->nombre = $request->nombre;
        $empleado->apellidos = $request->apellidos;
        $empleado->edad = $request->edad;
        $empleado->salario = $request->salario;
        
        //Se guardan los datos con este método
        $empleado->save();
        
        //mostramos todos los registros
        $empleados = Empleado::all();
        return $empleados;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $empleados = Empleado::findOrFail($id);
        return $empleados;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function edit($id)
    {
        //
    }
    */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoRequest $request)
    {
        //Esta función se utiliza para actualizar un registro, se le elimino el parámetro $id
        // ya que no es necesario en la lógica de esta aplicación

        //Usamos este método para encontrar el registro, validando que exista
        $empleado = Empleado::findOrFail($request->id);

        //Cada atributo del objeto es obtenido de "Request" o solicitud
        //pues la variable $request trae variables con los valores necesarios
        //que se guardan en el objeto Empleado creado
        $empleado->nombre = $request->nombre;
        $empleado->apellidos = $request->apellidos;
        $empleado->edad = $request->edad;
        $empleado->salario = $request->salario;
        
        //Se guardan los datos con este método
        $empleado->save();

        //Devuelve qué empleado fue modificado
        return $empleado;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Se modifica al elimiar el parametro id y reemplazandolo con el objeto Request $request
        //por la lógica de esta aplicación

        //Esté método se usa para eliminar un registro de la tabla Empleado
        $empleado = Empleado::destroy($request->id);
        
        $empleados = Empleado::all();
        return $empleados;
    }
}
