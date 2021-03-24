<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class SendMailSolicitudRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
           'nombre'   => ['required', 'max:100'],
           'email'    => ['required', 'email'],
           'empresa'  => ['required', 'max:100'],
           'mensaje'  => ['max:250'],
           'codigo'   => ['required'],
        ];
    }


    public function messages()
    {
        
        return [
            'nombre.required'       => 'Debes ingresar un nombre',
            'nombre.max'            => 'Nombre no puede exceder los 100 caracteres.',
            'email.required'        => 'Debes ingresar un correo electronico.',
            'email.email'           => 'Correo electronico no tiene un formato verdadero.',
            'empresa.required'      => 'Debe ingresar el nombre de la institucion o empresa.',
            'empresa.max'           => 'Empresa no puede exceder lo 100 caracteres.',
            'mensaje.max'           => 'Mensaje no puede exceder los 250 caracteres.',
            'codigo.required'       => 'Ha ocurrido un error, comunicarse con soporte.',
        ];
    }
}
