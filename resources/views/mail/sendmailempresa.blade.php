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
            <img height="100px" src="https://certificado.sincronialtda.cl/backend/img/logo_pdf.png"  style="border:none"></a>
            <br/>
          </td>
        </tr>
      </tbody>
    </table>
    <div style="padding: 40px; background: #fff;">
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td><b>Estimado(a) {{$send_solicitud->nombre}}</b><br>
              <p>SINCRONÍA Ltda. le hace envio de certificado solicitado mediante nuestro sitio web.</p>
              <hr>
              <p><b>Profesional:</b> {{$send_solicitud->Certificado->Alumno->nombres}} {{$send_solicitud->Certificado->Alumno->apellidos}}</p>
              <p><b>Certificado:</b> {{$send_solicitud->Certificado->codigo_cert}}</p>
              
              <a href="mailto:contacto@sincronialtda.cl"  style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #00c0c8; border-radius: 60px; text-decoration:none;"> Responder Email </a>

              <p>Puedes responder este mensaje via correo electronico dando clic en responder correo.</p>
              <b>Muchas Gracias.</b> </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
      <p><a href="https://www.sincronialtda.cl" target="_blank">OTEC SINCRONÍA</a><br>        
    </div>
  </div>
</div>
</body>
</html>
