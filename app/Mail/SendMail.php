<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tittle = "Nuevo mensaje CONTACTO CERTIFICADO SINCRONÍA Ltda.";
    public $motivo;
    public $mensaje;
    public $nombre;
    public $email;

    public function __construct($nombre, $email, $motivo, $mensaje)
    {   
        $this->motivo = $motivo;
        $this->mensaje = $mensaje;
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function build()
    {   
        $send_tittle = $this->tittle;
        $send_motivo = $this->motivo;
        $send_mensaje = $this->mensaje;
        $send_nombre = $this->nombre;
        $send_email = $this->email;

        return $this->view('mail.sendmail', compact('send_nombre','send_email','send_motivo', 'send_mensaje'))->subject($send_tittle);
    }
}
