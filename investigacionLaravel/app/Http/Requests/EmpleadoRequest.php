<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


//Esta clase se usa para recibir las solicitudes que vienen de la API
// para evitar errores de inserción de datos y así tener un mejor control
// e intruccion para guardar los datos.
class EmpleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    //este método es el que permite que puedan hacer envío de peticiones,
    // ya que devuelve true.
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    //Se indican con este método las reglas a cumplirse en cada campo
    // que se recibe en una solicitud.
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:30'],
            'apellidos'=> ['required', 'string', 'max:50'],
            'edad' => ['required', 'numeric', 'between:1,99'],
            'salario' => ['required', 'numeric', 'between:100,10000']
        ];
    }

    //En caso de no cumplirse las reglas, devolverá el mensaje de error y
    // las reglas que no se han cumplido y cómo se deben cumplir
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'mensaje' => "Errores de validación",
            'dato' => $validator->errors()
        ]));
    }
}
