<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SolicitudCertificado;
use App\Certificado;
use App\Mail\SendCertificadoEmpresa;
use Illuminate\Support\Facades\URL;
use PDF;
use Mail;

class SolicitudEmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('backend.pages.solicitud.index');
    }

    public function obtenerFechaEnLetra($fecha){
        $num = date("j", strtotime($fecha));
        $anno = date("Y", strtotime($fecha));
        $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $mes = $mes[(date('m', strtotime($fecha))*1)-1];
        return ['dia_mes' => $num.' de '.$mes, 'anno' => 'del '.$anno];
    }

    public function SendCertificado($id)
    {
        $solicitud = SolicitudCertificado::find($id);
        $emailsend = $solicitud->email;
 
        $certificado = $solicitud->Certificado;
        $qrcode = base64_encode(\QrCode::format('png')->size(100)->generate(URL::signedRoute('validate.certificado', ['id' => $certificado->codigo_cert])));
        $pdf = PDF::loadView('backend.pages.certificado.pdf2', compact('qrcode', 'certificado'))->setPaper('a4', 'landscape');

        Mail::to($emailsend)->send(new SendCertificadoEmpresa($pdf, $solicitud));

        SolicitudCertificado::destroy($id);
       
        return "Certificado enviado exitosamente a destinatario.";
    }

    public function show($id)
    {
        $mensaje = SolicitudCertificado::select(['mensaje'])->where('id', $id)->first();
        return response()->json($mensaje);
    }

    public function destroy($id)
    {
        SolicitudCertificado::destroy($id);
        return response()->json("Solicitud eliminada exitosamente");
    }
}
