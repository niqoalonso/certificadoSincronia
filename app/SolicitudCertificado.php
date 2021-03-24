<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudCertificado extends Model
{
    protected $fillable = [
        'nombre', 'empresa', 'email', 'mensaje', 'certificado_id'
    ];


    public function Certificado()
    {
    	return $this->belongsTo('App\Certificado');
    }
}
