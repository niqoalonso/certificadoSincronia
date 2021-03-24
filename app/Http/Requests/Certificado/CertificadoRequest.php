<?php

namespace App\Http\Requests\Certificado;

use Illuminate\Foundation\Http\FormRequest;

class CertificadoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'capacitacion'              => ['required', 'numeric'],
            'asistencia'                => ['required', 'numeric'],
            'tipo'                      => ['numeric'],
            'alumno'                    => ['required', 'numeric'],
            'f_inicio'                  => ['required', 'date', 'before_or_equal:f_termino'],
            'f_termino'                 => ['required', 'date', 'after:f_inicio'],
            'nota'                      => ['required', 'numeric', 'min:57', 'max:100'],
            'vigencia'                  => ['nullable','required_if:tipo, ==, 1', 'date', 'after:f_termino'],
        ];
    }


    public function messages()
    {
        return [
            'capacitacion.required'             => "Debes seleccionar una capacitacion.",
            'capacitacion.numeric'              => "Campo debe ser numerico, comunicarse con soporte.",
            'asistencia.required'               => "Debes ingresar el porcentaje de asistencia.",
            'asistencia.numeric'                => "Campo debe ser numerico, comunicarse con soporte.",
            'alumno.required'                   => "Debes seleccionar un alumno.",
            'alumno.numeric'                    => "Campo debe ser numerico, comunicarse con soporte.",
            'f_inicio.date'                     => "Ingrese fecha de inicio valida.",
            'f_inicio.required'                 => "Ingrese fecha de inicio de la capacitación.",
            'f_inicio.before_or_equal'          => "La Fecha inicio no puede ser mayor a la Fecha termino.",
            'f_termino.required'                => "Ingrese fecha de termino de la capacitación.",
            'f_termino.after'                   => "La Fecha termino no puede ser menor a la Fecha inicio.",
            'f_termino.date'                    => "Ingrese fecha de termino valida.",
            'nota.required'                     => "Debe ingresar el porcentaje de nota.",
            'nota.min'                          => "Debe ingresar una nota minimo de 56 hasta 100.",
            'nota.max'                          => "Debe ingresar una nota minimo de 56 hasta 100.",
            'nota.numeric'                      => "Haz ingresado un valor incorrecto de nota.",
            'vigencia.required_if'                 => "Debe ingresar una fecha de vigencia.",
            'vigencia.date'                     => "Ingrese una fecha de vigencia valida.",
            'vigencia.after'                    => "La fecha de vigencia debe ser mayor a la fecha de termion.",

        ];
    }
}
