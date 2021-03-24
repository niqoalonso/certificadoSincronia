<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Certificado;
use App\SolicitudCertificado;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Alumno\ChangePasswordRequest;

class WebBackendController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function prueba()
    {
        return view('layouts.backend');
    }

    public function home()
    {   
        if(Auth()->user()->hasRole('useradmin')){
            $certificados = count(Certificado::all());
            $solicitudes =  count(SolicitudCertificado::all());
            $alumnos = count(Alumno::where('deleted_at', null)->whereHas('roles', function($q){
                        $q->where('slug','!=', 'useradmin');
                        })->get());
    	    return view('backend.pages.home.index', compact('certificados', 'alumnos', 'solicitudes'));
        }else if(Auth()->user()->hasRole('useralumno')){
            $certificados = count(Certificado::where('alumno_id', Auth()->user()->id)->get());            
    	    return view('backend.pages.home.index', compact('certificados'));
        }
    }

    public function MiPerfil()
    {   
        $alumno = Alumno::find(Auth()->User()->id);
        return view('backend.pages.home.miperfil', compact('alumno'));
    }

    public function MiCertificado()
    {   
        return view('backend.pages.home.miscertificados');
    }

    public function changePassword(ChangePasswordRequest $request)
    {   
        Alumno::updateOrCreate(['id'=> Auth()->user()->id],['password' => Hash::make($request->contrasena)]);
        return response()->json("Contraseña actualizada.");
    }
}
