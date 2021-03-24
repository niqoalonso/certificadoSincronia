<?php

namespace App\Http\Requests\Capacitacion;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CapacitacionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo'            => ['required', 'max:150'],
            'hr_pedagogicas'    => ['required', 'numeric', 'max:9999'],
            'tipo'              => ['required', 'numeric', 'min:1', 'max:3'],
            'modalidad'         => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'titulo.required'               => 'Campo titulo es obligatorio',
            'titulo.max'                    => 'El titulo no puede exceder los 150 caracteres.',
            'hr_pedagogicas.required'       => 'Campo Hr. Pedagogicas es obligatorio.',
            'hr_pedagogicas.numeric'        => 'Hr. Pedagogicas solo admite numeros.',
            'hr_pedagogicas.max'            => 'Hr. Pedagogicas admite un maximo de 9999Hrs.',
            'tipo.required'                 => 'Debes seleccionar algun tipo.',
            'tipo.numeric'                  => 'Tipo solo admite numeros.',
            'tipo.min'                      => 'Error al ingresar tipo, Comunicarse con soporte.',
            'tipo.min'                      => 'Error al ingresar tipo, Comunicarse con soporte.',
            'modalidad.required'            =>  'Debes seleccionar la modalidad.',
            'modalidad.numeric'             =>  'Error al ingresar modalidad, Comunarse con soporte.',
        ];
    }
}
