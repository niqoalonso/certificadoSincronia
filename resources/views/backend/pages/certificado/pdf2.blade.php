<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CERTIFICADO</title>
    <style>
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            src: url(OpenSerif-Book.ttf) format('truetype');
        }
        body{
            border: #B0AC00 6px solid;
            background-image: url("fondo2.png");
            background-repeat: no-repeat;
        }
        p{
            font-family : 'Open Sans';
        }
        h1{
            font-family: 'Open Sans';
            font-size: 42px;
        }
        .fecha{
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div style="text-align: right;">
        <div style="float: left; margin-left: 5px; margin-top: 5px;">
            <img src="backend/img/logo_pdf.png" alt="" width="30%">
        </div>
        <div style="float: right; margin-right: 5px; margin-top: 5px;">
            <img src="data:image/png;base64, {!! $qrcode !!}"><br>
            <small style="text-align: center; padding: -8px;">{{$certificado->codigo_cert}}</small>
        </div>        
    </div>
    <div style="text-align: center; padding-top: 80px; margin-bottom: 10px; margin-left: 120px;">
        <h1>CERTIFICADO</h1>
    </div>
    <div style="text-align: center; margin-top: 20px;">
        <p style="font-size: 15px;">Se confiere el presente certificado a</p>
        <p style="font-size: 22px;"><b>{{mb_strtoupper($certificado->Alumno->nombres).' '.mb_strtoupper($certificado->Alumno->apellidos)}}</b></p>
        <p style="font-size: 15px;">Por haber aprobado el {{strtolower($certificado->Capacitacion->TipoCapacitacion->tipo)}}</p>
        <p style="font-size: 22px;"><b>"{{mb_strtoupper($certificado->Capacitacion->nombre)}}"</b></p>
        <p style="font-size: 15px;">En modalidad {{strtolower($certificado->Capacitacion->Modalidad->nombre)}} otorgado por el Centro de Capacitación Sincronía Ltda.</p>
        <p style="font-size: 12px;">DURACIÓN: {{$certificado->Capacitacion->hr_pedagogicas}} HORAS PEDAGÓGICAS / NOTA: {{$certificado->nota}} / {{$certificado->asistencia}}% ASISTENCIA</p>
        <p class="fecha">Fecha de realización: Desde el {{date('d/m/Y', strtotime($certificado->fecha_inicio))}} al {{date('d/m/Y', strtotime($certificado->fecha_termino))}}</p>
    </div>

    <div style="text-align: center; margin-top: 10px;">
        <img src="firma.png" alt="" width="25%" style="padding: 0px; margin: 0px;"><br>
        <span> DANILO RAMIREZ. </span><br>
        <span><small>Representante Legal</small></span>
    </div>
</body>
</html>