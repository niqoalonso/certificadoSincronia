<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Certificado\CertificadoRequest;
use Illuminate\Support\Facades\URL;
use App\Mail\SendCertificadoAlumno;
use App\Capacitacion;
use App\Certificado;
use App\Alumno;
use PDF;
use Mail;

class CertificadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   
        $capacitaciones = Capacitacion::all();
        $alumnos = Alumno::whereHas('roles', function($q){
            $q->where('slug','!=', 'useradmin');
        })->get();
        return view('backend.pages.certificado.index', compact('capacitaciones', 'alumnos'));
    }

    public function obtenerFechaEnLetra($fecha){
        $num = date("j", strtotime($fecha));
        $anno = date("Y", strtotime($fecha));
        $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $mes = $mes[(date('m', strtotime($fecha))*1)-1];
        return ['dia_mes' => $num.' de '.$mes, 'anno' => 'del '.$anno];
    }

    public function getCertificado($id)
    {   
        $certificado = Certificado::find($id);
        $qrcode = base64_encode(\QrCode::format('png')->size(110)->generate(URL::signedRoute('validate.certificado', ['id' => $certificado->codigo_cert])));
        $pdf = PDF::loadView('backend.pages.certificado.pdf2', compact('qrcode', 'certificado'))->setPaper('a4', 'landscape');
        return $pdf->stream('CERTIFICADO.pdf', array("Attachment" => false));
    }
    
    public function getRandom()
    { 
        do {            
            $number = 'SCN'.rand();
            $codigo = Certificado::select('codigo_cert')->where('codigo_cert', $number)->first();
        } while (!empty($codigo->codigo_cert));

        return $number;
    }

    public function getNota($nota)
    {   $nota_final = 0;
        $nota_calcular = str_replace(',', '.', $nota);
        if($nota_calcular > 56){
            $nota_final = $nota_calcular*70/100;
        }

        return $nota_final;
    }

    public function store(CertificadoRequest $request)
    {           
        $capacitacion   = Capacitacion::select('tipo_capacitacion_id')->where('id', $request->capacitacion)->first();
        $certificado    = Certificado::create([
                                    'codigo_cert' => $this->getRandom(), 
                                    'fecha_inicio' => $request->f_inicio, 
                                    'fecha_termino' => $request->f_termino, 
                                    'vigencia' => ($capacitacion->tipo_capacitacion_id == 2) ? null  : $request->vigencia, 
                                    'nota_porcentaje' => $request->nota,
                                    'nota' => round($this->getNota($request->nota), 0, PHP_ROUND_HALF_UP),
                                    'alumno_id' => $request->alumno,
                                    'capacitacion_id' => $request->capacitacion,
                                    'asistencia'    =>  $request->asistencia,
                                    ]);  
        $tipo = 1;
        $qrcode = base64_encode(\QrCode::format('png')->size(110)->generate(URL::signedRoute('validate.certificado', ['id' => $certificado->codigo_cert])));
        $pdf = PDF::loadView('backend.pages.certificado.pdf2', compact('qrcode', 'certificado'))->setPaper('a4', 'landscape');

        Mail::to($certificado->Alumno->email)->send(new SendCertificadoAlumno($pdf, $certificado, $tipo));


        return response()->json("Certificado ".$certificado->codigo_cert." a sido creado exitosamente y enviado al alumno.");
    }

    public function show($id)
    {   
        $tipo = Capacitacion::select(['tipo_capacitacion_id'])->where('id', $id)->first();
        return response()->json($tipo);
    }

    public function edit($id)
    {
        $certificado = Certificado::where('id',$id)->first();
        $certificado->load('Capacitacion');
        return response()->json($certificado);
    }

    public function update(CertificadoRequest $request, $id)
    {   
        $capacitacion   = Capacitacion::select('tipo_capacitacion_id')->where('id', $request->capacitacion)->first();
        $certificado    = Certificado::updateOrCreate(['id' => $id],[
                                    'fecha_inicio' => $request->f_inicio, 
                                    'fecha_termino' => $request->f_termino, 
                                    'vigencia' => ($capacitacion->tipo_capacitacion_id == 2) ? null  : $request->vigencia, 
                                    'nota_porcentaje' => $request->nota,
                                    'nota' => round($this->getNota($request->nota), 0, PHP_ROUND_HALF_UP),
                                    'alumno_id' => $request->alumno,
                                    'capacitacion_id' => $request->capacitacion,
                                    'asistencia'    =>  $request->asistencia,
                                    ]);    
        $tipo = 2;   
        $qrcode = base64_encode(\QrCode::format('png')->size(110)->generate(URL::signedRoute('validate.certificado', ['id' => $certificado->codigo_cert])));
        $pdf = PDF::loadView('backend.pages.certificado.pdf2', compact('qrcode', 'certificado'))->setPaper('a4', 'landscape');

        Mail::to($certificado->Alumno->email)->send(new SendCertificadoAlumno($pdf, $certificado, $tipo));

        return response()->json("Certificado ".$certificado->codigo_cert." ha sido actualizado exitosamente.");
    }

    public function destroy($id)
    {
        Certificado::destroy($id);
        return response()->json("Certificado ha sido eliminar exitosamente.");
    }

}
