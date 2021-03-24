<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailSolicitud extends Mailable
{
    use Queueable, SerializesModels;

    public $tittle = "Nuevo mensaje CONTACTO CERTIFICADO SINCRONÍA Ltda.";
    public $empresa;
    public $mensaje;
    public $nombre;
    public $email;
    public $codigo;

    public function __construct($nombre, $email, $empresa, $mensaje, $codigo)
    {   
        $this->empresa = $empresa;
        $this->mensaje = $mensaje;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->codigo = $codigo;
    }

    public function build()
    {   
        $send_tittle = $this->tittle;
        $send_empresa = $this->empresa;
        $send_mensaje = $this->mensaje;
        $send_nombre = $this->nombre;
        $send_email = $this->email;
        $send_codigo = $this->codigo;

        return $this->view('mail.sendmailsolicitud', compact('send_nombre','send_email','send_empresa', 'send_mensaje', 'send_codigo'))->subject($send_tittle);
    }
}
