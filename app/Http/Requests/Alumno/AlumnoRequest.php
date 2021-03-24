<?php

namespace App\Http\Requests\Alumno;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rut'        => ['required', ($this->method() == 'POST') ? 'unique:alumnos': 'unique:alumnos,id,'.$this->id.'', 'min:9', 'max:10'],
            'nombres'    => ['required', 'max:60'],
            'apellidos'  => ['required', 'max:60'],
            'correo'     => ['required',($this->method() == 'POST') ? 'unique:alumnos,email': 'unique:alumnos,email,'.$this->id.''],
            'celular'    => ['nullable','numeric', 'max:99999999'],

        ];
    }

    public function messages()
    {
        return [
            'rut.required'       => 'Campo RUT es obligatorio.',
            'rut.unique'         => 'RUT ingresado ya ha sido ingresado.',
            'rut.min'            => 'RUT debe contener entre 9 a 10 caracteres.',
            'rut.max'            => 'RUT debe contener entre 9 a 10 caracteres.',
            'nombres.required'   => 'Campo nombres es obligatorio.',
            'nombres.max'        => 'Nombres no puede exceder los 60 caracteres.',
            'apellidos.required' => 'Campo apellidos es obligatorio.',
            'apellidos.max'      => 'Apellidos no puede exceder los 60 caracteres.',
            'correo.required'    => 'Campo correo electronico es obligatorio.',
            'correo.unique'      => 'Correo electronico ya ha sido ingresado.',
            'celular.numeric'    => 'Campo celular solo adminite numeros.',
            'celular.max'        => 'Celular no puede tener mas de 8 numeros.'
        ];
    }
}
