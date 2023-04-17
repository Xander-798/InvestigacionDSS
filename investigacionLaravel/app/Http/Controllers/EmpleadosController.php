<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;


class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //en este arreglo asociativo, se guardan los registros en la tabla
        //el método "paginate()" indica cuantos registros se mostrán por consulta
        // se usa junto a la clase Paginator: Illuminate\Pagination\Paginator
        // que se llama en la clase AppServiceProvider ubicado en el archivo
        // AppServiceProvider.php en el directorio "Providers" en "app"
        // Se usa para mostra registros a través de paginaciones y se declara en 
        // el método boot() de la clase mencionada de la siguiente manera: 
        //  Paginator::useBootstrap();
        // pues se apoyará de bootstrap para los el diseño y forma de mostrar las páginas.
        
        $datos['empleados']=Empleado::paginate(3);

        //Devuelve la vista index con los datos encontrados.
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Al acceder a este método, nos devuelve una vista crear, donde está el formulario
    // para enviar los campos para generar un nuevo registro que se enviará al 
    // método "store".
    public function create()
    {
        //
        return view('empleado.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //este método es la que inserta el registro en la tabla
    public function store(Request $request)
    {
        //estas son las validaciones de cada campo recibido
        $campos = [
            'nombre'=>'required|string|max:30',
            'apellidos'=>'required|string|max:50',
            'edad'=>'required|integer|between:1,99',
            'salario'=>'required|numeric|between:100,10000'
        ];
        //mensajes de error asignados para cada restriccion
        $mensajes = [
            'required' => 'El campo :atribute es requerido',
            'edad.between' => 'El campo edad es debe estar entre 1 y 100',
            'salario.between' => 'El campo salario es debe estar entre 100 y 10,000'
        ];

        //Se ejecuta una validación, si no se cumplen los requisitos: nos devuelve
        // a donde se envio la solicitud (formulario de creación),
        // en caso de ser correcto solo sigue el flujo de este método.
        $this->validate($request, $campos, $mensajes);

        //$datosEmpleado= request()->all();

        //Se almacenan los datos recibidos excluyendo el "token" que 
        // se envia como "certificado" de peticiones válidas.
        $datosEmpleado = request()->except('_token');

        //Con la clase Empleado, se llama a este método para insertar el nuevo registro en
        // la tabla
        Empleado::insert($datosEmpleado);
        //return response()->json($datosEmpleado);

        //Tras finalizar, se redirige a la ruta "empleado" con una variable temporal para
        // indicar si se completo la solicitud, dicha variable es dura sólo esta transacción
        // ya no existe al recargar o moverse a una nueva solicitud.
        return redirect('empleado')->with('mensaje','¡Empleado agregado exitosamente!');
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
        //En base al parámetro "id" se almacena un registro que coincida 
        //con un id de la tabla
        $empleado = Empleado::findOrFail($id);

        //Una vez guardados los valores del registro, se redirige
        // a la vista con el formulario de editar con los datos del registro encontrado.
        return view('empleado.ver', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Al acceder a este método se busca el registro a modificar, para luego redirigir
    // al formulario de edición.
    public function edit($id)
    {
        //En base al parámetro "id" se almacena un registro que coincida 
        //con un id de la tabla
        $empleado = Empleado::findOrFail($id);

        //Una vez guardados los valores del registro, se redirige
        // a la vista con el formulario de editar con los datos del registro encontrado.
        return view('empleado.editar', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //se reciben los valores modificados del registro existente para actualizarlos en
    // la tabla, para luego volver a la vista principal y ver el éxito de este método
    public function update(Request $request, $id)
    {
        //las validaciones de cadad campo
        $campos = [
            'nombre'=>'required|string|max:30',
            'apellidos'=>'required|string|max:50',
            'edad'=>'required|integer|between:1,99',
            'salario'=>'required|numeric|between:100,10000'
        ];
        
        //mensajes de error
        $mensajes = [
            'required' => 'El campo :atribute es requerido',
            'edad.between' => 'El campo edad es debe estar entre 1 y 100',
            'salario.between' => 'El campo salario es debe estar entre 100 y 10,000'
        ];

        //Se realiza una validación.
        $this->validate($request, $campos, $mensajes);

        //Se almacenan los datos recibidos excluyendo el "token" que 
        // se envia como "certificado" de peticiones válidas y 
        // "method" que es el parametro que indica qué tipo de 
        // método HTTP se está enviando (para actualizar y segun las rutas
        // son PUT y PATH)
        $datosEmpleado= request()->except(['_token', '_method']);

        //Se busca el registro que coincida con el parámetro "id"
        // para luego actualizar el valor de sus campos.
        Empleado::where('id', '=',$id)->update($datosEmpleado);

        //No se utiliza, pero es para verificar si se actualiza la información.
        $empleado = Empleado::findOrFail($id);

        //Redirige a la ruta "empleado" para indicar que se realizó con éxito este método
        return redirect('empleado')->with('mensaje','¡Empleado modificado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Método para eliminar un registro que coincida con el parámetro "id"
    public function destroy($id)
    {
        //éste método permite eliminar un registro de la tabla que coinicida 
        // el parametro recibido con el campo "id" de la tabla
        Empleado::destroy($id);

        //Redirige a la ruta "empleado" para indicar que se concluyó con éxito la eliminación.
        return redirect('empleado')->with('mensaje','¡Empleado eliminado exitosamente!');
    }
}
