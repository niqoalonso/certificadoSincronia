<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Alumno;
use App\Mail\SendAlumnoSolicutdMail;
use App\Http\Requests\Mail\MailSolicitudAlumnoRequest;


class MailController extends Controller
{
    public function SendMailAlumno(MailSolicitudAlumnoRequest $request)
    {
       $emailsend   = "contacto@sincronialtda.cl";
       $alumno      = Alumno::find(Auth()->User()->id);
       $motivo      = $request->motivo;
       $mensaje 	= $request->mensaje;

       Mail::to($emailsend)->send(new SendAlumnoSolicutdMail($motivo, $mensaje, $alumno));
       
       return response()->json("Solicitud enviado exitosamente.");
    }

}
