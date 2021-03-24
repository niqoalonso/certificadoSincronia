<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body style="margin:0px; background: #f8f8f8; ">
<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
  <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
      <tbody>
        <tr>
          <td style="vertical-align: top; padding-bottom:30px;" align="center">
            <a href="http://sincronialtda.cl" target="_blank">
            <img height="100px" src="https://www.sincronialtda.cl/assets/images/sincronia-logo.png"  style="border:none"></a>
            <br/>
          </td>
        </tr>
      </tbody>
    </table>
    <div style="padding: 40px; background: #fff;">
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td><b>Estimado(a) {{$send_certificado->Alumno->nombres}} {{$send_certificado->Alumno->apellidos}}</b><br>

            @if($tipo == 1)

                <p>SINCRONÍA OTEC le hace envio de su certificado de aprobación por la realización de la siguiente capacitación.</p>

            @else

                <p>SINCRONÍA OTEC le hace envio de su certificado.</p>

            @endif
              <hr>
              <p><b>Curso:</b> {{$send_certificado->Capacitacion->nombre}}</p>
              <p><b>Tipo:</b> {{$send_certificado->Capacitacion->TipoCapacitacion->tipo}}</p>
              <p><b>Calificación:</b> {{substr($send_certificado->nota,0,1).'.'.substr($send_certificado->nota,-1,1)}}</p>
              <p><b>Profesional:</b> {{$send_certificado->Alumno->nombres}} {{$send_certificado->Alumno->apellidos}}</p>
              <p><b>Certificado:</b> {{$send_certificado->codigo_cert}}</p>
                
              <p>Te esperamos en tu nueva capacitación.</p>
              <b>Muchas Gracias.</b> </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
      <p><a href="https://www.sincronialtda.cl" target="_blank">SINCRONÍA OTEC</a><br>        
    </div>
  </div>
</div>
</body>
</html>
