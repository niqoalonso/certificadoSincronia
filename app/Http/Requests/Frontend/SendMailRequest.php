<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class SendMailRequest extends FormRequest
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
           'motivo'  => ['required', 'max:100'],
           'mensaje'  => ['required','max:400'],
        ];
    }


    public function messages()
    {
        
        return [
            'nombre.required'       => 'Debes ingresar un nombre',
            'nombre.max'            => 'Nombre no puede exceder los 100 caracteres.',
            'email.required'        => 'Debes ingresar un correo electronico.',
            'email.email'           => 'Correo electronico no tiene un formato verdadero.',
            'motivo.required'       => 'Debe ingresar un motivo.',
            'motivo.max'            => 'Motivo no puede exceder lo 100 caracteres.',
            'mensaje.max'           => 'Mensaje no puede exceder los 400 caracteres.',
        ];
    }
}
