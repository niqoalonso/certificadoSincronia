<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCertificadoAlumno extends Mailable
{
    use Queueable, SerializesModels;

    public $tittle = "CERTIFICADO SINCRONÍA Ltda.";
    public $pdf;
    public $certificado;
    public $tipo;

    public function __construct($pdf, $certificado,$tipo)
    {   
        $this->pdf = $pdf;
        $this->certificado = $certificado;
        $this->tipo = $tipo;
    }   

    public function build()
    {   
        $send_tittle = $this->tittle;
        $send_pdf   = $this->pdf;
        $send_certificado = $this->certificado;
        $send_tipo = $this->tipo;
 
        return $this->view('mail.sendmailalumnocertificado', compact('send_certificado', 'send_tipo'))->subject($send_tittle)->attachData($send_pdf->output(), "certificado.pdf");
    }
}
