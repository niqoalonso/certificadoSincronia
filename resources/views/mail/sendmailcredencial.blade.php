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
            <td><b>Estimado(a) {{$send_alumno->nombres}} {{$send_alumno->apellidos}}</b><br>
              <p>Has sido registrado en la plataforma de certificados digitales de SINCRONÍA OTEC.</p>
              <hr>
              <p><b>USUARIO:</b> {{$send_alumno->rut}}</p>
              <p><b>CONTRASEÑA:</b> {{$pass}}</p>
              @if(empty($send_alumno->celular))
              <hr>
              <p style="color: red"><em>Segun nuestros registros no tenemos registro de tu numero de celular para contactarte, te solicitamos que accedas a nuestra plataforma con tus credenciales y actualices tu información personal.</em></p>
              @endif
              <hr>
              <p><em>En esta plataforma encontraras todos tus certificados vigentes y podras exportarlos en pdf. Junto con ello SINCRONÍA implemento codigo QR para la seguridad de tu certificado, evitando que pueda ser falsificado, esto lo podra observar en la esquina superior derecha de tu certificado.</em></p>
              
              <a href="https://certificado.sincronialtda.cl/login" target="_blank"  style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #00c0c8; border-radius: 60px; text-decoration:none;"> ACCESO PLATAFORMA</a>

              <p>Puedes revisar la vigencia de tu certificado consultando desde el siguiente <a href="https://certificado.sincronialtda.cl/certificacion">Link</a>.</p>
              <b>Muchas Gracias.</b> 
              <br>
              <p><em><small><b>Si te ha llegado este correo por error, por favor respondenos a este correo. <a href="mailto:contacto@sincronialtda.cl?subject=ENTREGA%20INCORRECTA%20DE%20CREDENCIALES&body=Este%20correo%20no%20me%20pertenece.">contacto@sincronialtda.cl</a></b></small></em></p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
      <p><a href="https://www.sincronialtda.cl" target="_blank">SINCRONÍA Ltda.</a><br>        
    </div>
  </div>
</div>
</body>
</html>
