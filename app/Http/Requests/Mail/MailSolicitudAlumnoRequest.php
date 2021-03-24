<?php

namespace App\Http\Requests\Mail;

use Illuminate\Foundation\Http\FormRequest;

class MailSolicitudAlumnoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'mensaje'      =>  ['required', 'max:500'],
            'motivo'       =>  ['required', 'max:50'],
        ];
    }

    public function messages()
    {
        return [
            'mensaje.required'  => 'Debes ingresar la descripción de la solicitud.',
            'mensaje.max'       => 'Descripción no puede tener mas de 500 caracteres.',   
            'motivo.required'   => 'Debes ingresar el motivo de la solicitud',
            'motivo.max'        => 'Motivo no puede tener mas de 50 caracteres.',
        ];
    }
}
