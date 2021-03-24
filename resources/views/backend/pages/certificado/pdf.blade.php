<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documento</title>
    
    <style>
        @font-face {
            font-family: 'Slabo27px-Regular';
            src: url('Slabo27px-Regular.ttf');
        }
        body {            
            border:1px solid #B5DEC6;
            background-image: url("incap.png");
            
        }
        p{
            font-family: 'arial';
        }


    </style>
</head>
<body>
    <div style="text-align: right;">
        <div style="float: left; margin-left: 5px; margin-top: 5px;">
            <img src="data:image/png;base64, {!! $qrcode !!}"><br>
            <small style="text-align: center;">{{$certificado->codigo_cert}}</small>
        </div>
        <div style="float: right; margin-right: 5px; margin-top: 5px;">
            
        </div>        
    </div>
    <div style="text-align: center; padding-top: 155px; margin-bottom: 50px;">
        <img src="logo.png" width="40%" />
    </div>
    <div style="text-align: center;">
        <p style="font-size: 30px;"><b>CENTRO DE CAPACITACIÓN</b></p>
        <p style="font-size: 27px;"><b> SINCRONÍA LTDA </b></p>
    </div>
    <div style="text-align: center; margin-top: 30px;">
        <p style="font-size: 20px;">CERTIFICA LA APROBACIÓN DEL {{mb_strtoupper($certificado->Capacitacion->TipoCapacitacion->tipo)}}</p>
        <p style="font-size: 24px;"><b>{{mb_strtoupper($certificado->Capacitacion->nombre)}}</b></p>
        <p style="font-size: 20px;">APROBANDO CON UNA CALIFICACIÓN DE <b> {{substr($certificado->nota,0,1).'.'.substr($certificado->nota,-1,1)}} </b></p>
        <br>
        <p style="font-size: 20px;">a Don(ña):</p>
        <p style="font-size: 24px;"><b>{{mb_strtoupper($certificado->Alumno->nombres).' '.mb_strtoupper($certificado->Alumno->apellidos)}}</b></p>
    </div>
    <div style="text-align: center; margin-top: 30px; margin-bottom: 0px;">
        <?php
            if ($fecha_inicio['anno'] == $fecha_termino['anno']) {
        ?>
                <p style="font-size: 15px;">REALIZADO ENTRE EL {{ mb_strtoupper($fecha_inicio['dia_mes'])}} AL {{ mb_strtoupper($fecha_termino['dia_mes'])}} {{mb_strtoupper($fecha_termino['anno'])}} .</p>
        <?php
            }else{
        ?>
                <p style="font-size: 15px;">REALIZADO ENTRE EL {{ mb_strtoupper($fecha_inicio['dia_mes'])}} {{mb_strtoupper($fecha_inicio['anno'])}} AL {{ mb_strtoupper($fecha_termino['dia_mes'])}} {{mb_strtoupper($fecha_termino['anno'])}} .</p>
        <?php
            }
        ?>
        
        <p><b>EQUIVALENTE A {{$certificado->Capacitacion->hr_pedagogicas}} Hrs PEDAGÓGICAS.</b></p>
    </div>
    <div style="text-align: center; margin-top: 30px; margin-bottom: 0px;">
        <img src="firm.png" width="40%" />
    </div>

</body>
</html>