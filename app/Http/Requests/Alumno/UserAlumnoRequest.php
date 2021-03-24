<?php

namespace App\Http\Requests\Alumno;

use Illuminate\Foundation\Http\FormRequest;

class UserAlumnoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'correo'     => ['required',($this->method() == 'POST') ? 'unique:alumnos,email': 'unique:alumnos,email,'.$this->id.''],
            'celular'    => ['numeric', 'max:99999999'],

        ];
    }

    public function messages()
    {
        return [
            'correo.required'    => 'Campo correo electronico es obligatorio.',
            'correo.unique'      => 'Correo electronico ya ha sido ingresado.',
            'celular.numeric'    => 'Campo celular solo adminite numeros.',
            'celular.max'        => 'Celular no puede tener mas de 8 numeros.'
        ];
    }
}
