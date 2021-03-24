<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    protected $table = "certificados";

    protected $fillable = [
        'codigo_cert', 'fecha_inicio', 'fecha_termino', 'vigencia', 'nota_porcentaje', 'nota', 'alumno_id', 'capacitacion_id', 'asistencia'
    ];

    public function Capacitacion()
    {
    	return $this->belongsTo('App\Capacitacion')->withTrashed();
    }

    public function Alumno()
    {
    	return $this->belongsTo('App\Alumno')->withTrashed();
    }
}
