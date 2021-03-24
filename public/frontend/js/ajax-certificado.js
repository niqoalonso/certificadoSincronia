jQuery('#FormRut').on("submit", function (e) {
    event.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/GetRut/"+$('input[name=rut]').val(),
        method: 'GET',
        success: function (result) {
          $('.body-certificado').empty();
          $.each(result, function(v, i) {
              if(i.vigencia == null){
                  var vigencia = "Vitalicio";
              }else{
                  var vigencia = i.vigencia; 
              }
            $('.body-certificado').append('<div class="col-lg-6">'+              
              '<div class="resume-item">'+
              '<em>Profesional: '+i.alumno.nombres+' '+i.alumno.apellidos+'</em><br>'+
              '<p><h4>'+i.capacitacion.nombre+' <a href=""><button type="button" onclick="SolicitudCertificado(this.id, this.value)" id="'+i.id+'" value="'+i.codigo_cert+'" class="btn btn-certificado btn-xs"><i class="bx bx-send"></i> Solicitar Certificado</button></a></h4></p>'+
              '<em>Tipo: '+i.capacitacion.tipo_capacitacion.tipo+'</em><br>'+
              '<em>Identificador: <b>'+i.codigo_cert+'</b></em><br>'+
              '<em>Realizado: </em><h5>'+i.fecha_inicio+' / '+i.fecha_termino+'</h5><br>'+
              '<em>Vigente:</em><h5>'+vigencia+'</h5>'+
              '<br>'+
              '</div>'+
              '</div>');
          });
          if(result.length > 0){
            toastr.success("Certificado asociados a RUT han sido encontrados");
            $('html, body').animate({
                scrollTop: $("#div1").offset().top
            }, 2000);
          }else{
            toastr.warning("RUT ingresado no registra certificados.");
          }
          $('#FormRut')[0].reset();
        }, 
        error: function (result) {
            console.clear();
            $.each(result.responseJSON.errors, function (v, i) {
              toastr.warning(i);
            })
        }
    });
});

jQuery('#FormNombre').on("submit", function (e) {
    event.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/GetNombre/"+$('input[name=nombre]').val(),
        method: 'GET',
        success: function (result) {
            console.log(result);
          $('.body-certificado').empty();
          $.each(result, function(v, i) {
            if(i.vigencia == null){
                var vigencia = "Vitalicio";
            }else{
                var vigencia = i.vigencia; 
            }
            $('.body-certificado').append('<div class="col-lg-6">'+              
              '<hr><div class="resume-item">'+
              '<em>Profesional: '+i.alumno.nombres+' '+i.alumno.apellidos+'</em><br>'+
              '<p><h4>'+i.capacitacion.nombre+' <a href=""><button type="button" onclick="SolicitudCertificado(this.id, this.value)" id="'+i.id+'" value="'+i.codigo_cert+'" class="btn btn-certificado btn-xs"><i class="bx bx-send"></i> Solicitar Certificado</button></a></h4></p>'+
              '<em>Tipo: '+i.capacitacion.tipo_capacitacion.tipo+'</em><br>'+
              '<em>Identificador: <b>'+i.codigo_cert+'</b></em><br>'+
              '<em>Realizado: </em><h5>'+i.fecha_inicio+' / '+i.fecha_termino+'</h5><br>'+
              '<em>Vigente:</em><h5>'+i.vigencia+'</h5>'+
              '<br>'+
              '</div>'+
              '</div>');
          });
          if(result.length > 0){
            toastr.success("Certificado asociados al nombre han sido encontrados");
            $('html, body').animate({
                scrollTop: $("#div1").offset().top
            }, 2000);
          }else{
            toastr.warning("Nombre ingresado no registra certificados.");
          }
          $('#FormNombre')[0].reset();
        }, 
        error: function (result) {
            console.clear();
            $.each(result.responseJSON.errors, function (v, i) {
              toastr.warning(i);
            })
        }
    });
});

jQuery('#FormCodigo').on("submit", function (e) {
    event.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/GetCodigo/"+$('input[name=codigo]').val(),
        method: 'GET',
        success: function (result) {
          $('.body-certificado').empty();
          $.each(result, function(v, i) {
              if(i.vigencia == null){
                  var vigencia = "Vitalicio";
              }else{
                  var vigencia = i.vigencia; 
              }
            $('.body-certificado').append('<div class="col-lg-6">'+              
              '<div class="resume-item">'+
              '<em>Profesional: '+i.alumno.nombres+' '+i.alumno.apellidos+'</em><br>'+
              '<p><h4>'+i.capacitacion.nombre+' <a href=""><button type="button" onclick="SolicitudCertificado(this.id, this.value)" id="'+i.id+'" value="'+i.codigo_cert+'" class="btn btn-certificado btn-xs"><i class="bx bx-send"></i> Solicitar Certificado</button></a></h4></p>'+
              '<em>Tipo: '+i.capacitacion.tipo_capacitacion.tipo+'</em><br>'+
              '<em>Identificador: <b>'+i.codigo_cert+'</b></em><br>'+
              '<em>Realizado: </em><h5>'+i.fecha_inicio+' / '+i.fecha_termino+'</h5><br>'+
              '<em>Vigente:</em><h5>'+vigencia+'</h5>'+
              '<br>'+
              '</div>'+
              '</div>');
          });
          if(result.length > 0){
            toastr.success("Certificado asociados a codigo han sido encontrados");
            $('html, body').animate({
                scrollTop: $("#div1").offset().top
            }, 2000);
          }else{
            toastr.warning("Codigo ingresado existe.");
          }
          $('#FormCodigo')[0].reset();
        }, 
        error: function (result) {
            console.clear();
            $.each(result.responseJSON.errors, function (v, i) {
              toastr.warning(i);
            })
        }
    });
});

jQuery('#FormSolicitudCertificado').on("submit", function (e) {
  event.preventDefault();
  $('.btn-enviar').html('<button type="submit" disabled class="btn btn-certificado btn-ts"><i class="bx bx-send"></i> Enviando...</button>');
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
  });
  jQuery.ajax({
      url: "/sendmailsolicitud",
      method: 'POST',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (result) {
        $('#FormSolicitudCertificado')[0].reset();
        $('.btn-enviar').html('<button type="submit" class="btn btn-certificado btn-ts"><i class="bx bx-send"></i> Solicitar</button>');
        $('#ModalSolicitud').modal('hide');
        toastr.success(result);
      }, 
      error: function (result) {
          console.clear();
          $.each(result.responseJSON.errors, function (v, i) {
              toastr.warning(i);
          })
      }
  });
});

function SolicitudCertificado(id, codigo)
{ 
  event.preventDefault();
  $('#FormSolicitudCertificado')[0].reset();
  $('.codigo_header').html('<small>'+codigo+'</small>');
  $('.codigo_id').val(codigo);
  $('#ModalSolicitud').modal('show');
}

