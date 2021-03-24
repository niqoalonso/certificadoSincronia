<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Certificado;
use App\SolicitudCertificado;
use DB;
use Mail;
use App\Mail\SendMail;
use App\Mail\SendMailSolicitud;
use App\Http\Requests\Frontend\SendMailSolicitudRequest;
use App\Http\Requests\Frontend\SendMailRequest;

class WebMasterController extends Controller
{   
    public function home()
    {
        return view('frontend.pages.home');
    }

    public function certificacion()
    {
        return view('frontend.pages.certificado');
    }

    public function CertficateValidate($id)
    {   
        $certificado = Certificado::where('codigo_cert', $id)->first();
        return view('frontend.pages.certificado_qr', compact('certificado'));
    }

    public function contactenos()
    {
        return view('frontend.pages.contacto');
    }

    public function getRut($id)
    {   
        $alumno = Alumno::where('rut', $id)->first();
        $certificados = Certificado::where('alumno_id', $alumno->id)->get();
        $certificados->load('alumno', 'capacitacion', 'capacitacion.TipoCapacitacion');
        return response()->json($certificados);
    }

    public function getNombre($nombre)     {   
       
        $alumno = Alumno::select(['id'])->where(DB::raw("CONCAT(alumnos.nombres, \" \",alumnos.apellidos)"), 'LIKE', "%".$nombre."%")->get();      
        
        $certificados = Certificado::whereIn('alumno_id', $alumno->pluck('id')->toArray())->get();
        $certificados->load('alumno', 'capacitacion', 'capacitacion.TipoCapacitacion');
        
        return response()->json($certificados);
    }

    public function getCodigo($codigo)
    {   
        $certificados = Certificado::where('codigo_cert', $codigo)->get();
        $certificados->load('alumno', 'capacitacion', 'capacitacion.TipoCapacitacion');
        return response()->json($certificados);
    }

    public function SendMail(SendMailRequest $request)
    {
       $emailsend = "contacto@sincronialtda.cl";
       $motivo      = $request->motivo;
       $mensaje 	= $request->mensaje; 
       $nombre      = $request->nombre;
       $email       = $request->email;

       Mail::to($emailsend)->send(new SendMail($nombre, $email, $motivo, $mensaje));
       
       return response()->json("Correo electronico enviado exitosamente.");
    }

    public function SendMailSolicitud(SendMailSolicitudRequest $request)
    {   
        $codigo = Certificado::where('codigo_cert', $request->codigo)->first();
        
        SolicitudCertificado::create(['nombre' => $request->nombre, 'empresa' => $request->empresa, 'email' => $request->email, 'mensaje' => ucfirst($request->mensaje), 'certificado_id' => $codigo->id]);
 
       $emailsend   = "contacto@sincronialtda.cl";
       $empresa     = $request->empresa;
       $mensaje 	= $request->mensaje;
       $nombre      = $request->nombre;
       $email       = $request->email;

       Mail::to($emailsend)->send(new SendMailSolicitud($nombre, $email, $empresa, $mensaje, $codigo));
       
       return response()->json("Solicitud enviado exitosamente.");
    }
    
}
