<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendCertificadoEmpresa extends Mailable
{
    use Queueable, SerializesModels;

    public $tittle = "Nuevo mensaje de conatcto de CERTIFICADO SINCRONÍA Ltda.";
    public $pdf;
    public $solicitud;

    public function __construct($pdf, $solicitud)
    {   
        $this->pdf = $pdf;
        $this->solicitud = $solicitud;
    }   

    public function build()
    {   
        $send_tittle = $this->tittle;
        $send_pdf   = $this->pdf;
        $send_solicitud = $this->solicitud;
 
        return $this->view('mail.sendmailempresa', compact('send_solicitud'))->subject($send_tittle)->attachData($send_pdf->output(), "invoice.pdf");
    }
}
