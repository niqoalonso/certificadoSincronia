<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Capacitacion extends Model    
{   
    use SoftDeletes;

    protected $table = "capacitacion";

    protected $fillable = [
        'codigo', 'nombre', 'hr_pedagogicas', 'tipo_capacitacion_id', 'modalidad_id'
    ];

    public function TipoCapacitacion()
    {
    	return $this->belongsTo('App\Tipo_Capacitacion');
    }

    public function Modalidad()
    {
    	return $this->belongsTo('App\Modalidad', 'modalidad_id', 'id_modalidad');
    }

    public function Certificado()
    {
    	return $this->hasMany('App\Certificado');
    }


}
