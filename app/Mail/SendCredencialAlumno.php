<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCredencialAlumno extends Mailable
{
    use Queueable, SerializesModels;

    public $tittle = "Nuevo acceso a plataforma CERTIFICADO SINCRONÍA OTEC.";
    public $alumno;
    public $pass;

    public function __construct($alumno, $pass)
    {   
        $this->alumno   = $alumno;
        $this->pass     = $pass;
    }

    public function build()
    {   
        $send_tittle    = $this->tittle;
        $send_alumno    = $this->alumno;
        $send_pass      = $this->pass;

        return $this->view('mail.sendmailcredencial', compact('send_alumno','send_pass'))->subject($send_tittle);
    }
}
