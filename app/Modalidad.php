<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    protected $primaryKey = 'id_modalidad';

    protected $fillable = ['nombre'];
}
