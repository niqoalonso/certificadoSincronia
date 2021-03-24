<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;

class Alumno extends Authenticatable
{
    use SoftDeletes;
    use HasRolesAndPermissions;
    use Notifiable;

    protected $fillable = [
        'rut', 'celular', 'apellidos', 'nombres', 'email', 'password', 'deleted_at',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function Certificado()
    {
    	return $this->hasMany('App\Certificado');
    }
}
