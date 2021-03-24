<?php

namespace App\Http\Requests\Alumno;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'contrasena' => ['required'],
        ];
    }

    public function messages()
    {
        return[
            'contrasena.required' =>  'Debes ingresar una contraseña',
        ];
    }
}
