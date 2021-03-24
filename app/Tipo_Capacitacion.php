<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Capacitacion extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = ['tipo'];
}
