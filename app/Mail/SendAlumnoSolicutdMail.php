<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendAlumnoSolicutdMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tittle = "CERTIFICADO SINCRONÍA Ltda.";
    public $motivo;
    public $mensaje;
    public $alumno;

    public function __construct($motivo, $mensaje, $alumno)
    {   
        $this->motivo = $motivo;
        $this->mensaje = $mensaje;
        $this->alumno = $alumno;
    }

    public function build()
    {   
        $send_tittle = $this->tittle;
        $send_motivo = $this->motivo;
        $send_mensaje = $this->mensaje;
        $send_alumno = $this->alumno;
        return $this->view('mail.sendalumnosolicitud', compact('send_motivo', 'send_mensaje', 'send_alumno'))->subject($send_tittle);
    }
}
