function ChangeCertificadoNuevo(id)
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/certificado/"+id,
        method: 'GET',
        success: function (result) {
          if(result.tipo_capacitacion_id == 1){
            $('.vigencia').html('<label class="col-sm-3 col-form-label">Vigencia</label><div class="col-9"> <input name="vigencia" class="form-control fill col-12 vigencia" type="date" required></div>');
            $('.vigencia').show();
          }else if(result.tipo_capacitacion_id == 2){
            $('.vigencia').hide();
            $('.vigencia').empty();
          }
        },
        error: function (result) {
            console.clear();
            $.each(result.responseJSON.errors, function (v, i) {
              notify("right","fa fa-ban","danger", i);
            })
        }
    });
}

function ChangeCertficiadoEdit(id, permiso)
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/certificado/"+id,
        method: 'GET',
        success: function (result) {
          if(permiso == 0){
            if(result.tipo_capacitacion_id == 1){
              $('.input_vigencia').val('');
              $('.edit_vigencia').show();
            }else if(result.tipo_capacitacion_id == 2){
              $('.edit_vigencia').hide();
            }
          }else{
            $('.capacitacion').attr("id", 0);
          }
          
        },
        error: function (result) {
            console.clear();
            $.each(result.responseJSON.errors, function (v, i) {
              notify("right","fa fa-ban","danger", i);
            })
        }
    });
}

jQuery('#FormCertificado').on("submit", function (e) {
    event.preventDefault();
    $('.btn-ingreso').html('<button type="button" disabled class="buttonload btn btn-warning btn-round"><i class="fa fa-spinner fa-spin"></i>Espere...</button>');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/certificado",
        method: 'POST',
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (result) {
            notify("right","fa fa-check","success", result);
            $('#FormCertificado')[0].reset();
            $('.btn-ingreso').html('<button class="btn btn-primary btn-round" type="submit"><i class="feather icon-save"></i> Crear Certificado</button>');
            $('.vigencia').hide();
            $('.vigencia').empty();
            table.ajax.reload();
            $(".js-example-basic-single").select2();
            ('.capacitacion').val("").trigger('change'); 
            ('.alumno').val("").trigger('change'); 
        },
        error: function (result) {
            console.clear();
            $('.btn-ingreso').html('<button class="btn btn-primary btn-round" type="submit"><i class="feather icon-save"></i> Crear Certificado</button>');
            $.each(result.responseJSON.errors, function (v, i) {
              notify("right","fa fa-ban","danger", i);
            })
        }
    });
  });

  jQuery('#FormCertificadoEdit').on("submit", function (e) {
    event.preventDefault();
    $('.btn-update').html('<button type="button" disabled class="buttonload btn btn-warning btn-round"><i class="fa fa-spinner fa-spin"></i>Espere...</button>');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/certificado/"+$('.id').val(),
        method: 'POST',
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (result) {
          notify("right","fa fa-check","success", result);
          $('#FormCertificadoEdit')[0].reset();
          $('.btn-update').html('<button class="btn btn-danger btn-round" onclick="CancelarEdicionCertificado()" type="button"><i class="feather icon-close"></i> Cancelar</button> <button class="btn btn-primary btn-round" type="submit"><i class="feather icon-save"></i> Actualizar</button>');
          $('.nota_porcentaje').val(' ');
          $('.inscripcion').show();
          $('.edicion').hide();
          $(".js-example-basic-single").select2();
          table.ajax.reload();
        },
        error: function (result) {
            console.clear();
            $('.btn-update').html('<button class="btn btn-danger btn-round" onclick="CancelarEdicionCertificado()" type="button"><i class="feather icon-close"></i> Cancelar</button> <button class="btn btn-primary btn-round" type="submit"><i class="feather icon-save"></i> Actualizar</button>');
            $.each(result.responseJSON.errors, function (v, i) {
              notify("right","fa fa-ban","danger", i);
            })
        }
    });
  });
  
  function EditarCertificado(id)
  { 
    $.ajaxSetup({  
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/certificado/"+id+"/edit",
        method: 'GET',
        success: function(result){
          $('.capacitacion').attr("id", 1);
          $('.id_tipo_capacitacion').val(result.capacitacion.tipo_capacitacion_id),
          $('.capacitacion').val(result.capacitacion_id).trigger('change');          
          $('.alumno').val(result.alumno_id).trigger('change');
          $('.asistencia').val(result.asistencia);
          $('.id').val(result.id);
          $('.inscripcion').hide();
          $('.edicion').show();
          $('.f_inicio').val(result.fecha_inicio);
          $('.f_termino').val(result.fecha_termino);
          $('.nota_porcentaje').val(result.nota_porcentaje);
          $('.codigo_header').html('<h5>CODIGO: '+result.codigo_cert+'</h5>');
          $('.nota_header').html('<h5>NOTA: '+result.nota+'</h5>');
          

          if(result.vigencia == null){
            $('.edit_vigencia').hide();
          }else{
            $('.edit_vigencia').show();
            $('.input_vigencia').val(result.vigencia);
          }

          $(".js-example-basic-single").select2();
       
          notify("right","fa fa-info","info", "Certificado cargado para edición");
          $('.capacitacion').attr("id", 1);

        },
        error: function(result){ 
          console.clear();
            $.each(result.responseJSON.errors, function (v, i) {
              notify("right","fa fa-ban","danger", i);
            });
        }
    });
  }
  
  function ChangeCaracter(valor)
  {
    $('input[name="nota"]').val(valor.replace(",", "."));
  }

  function CancelarEdicionCertificado()
  {
    $('.inscripcion').show();
    $('.edicion').hide();
    $('#FormCertificadoEdit')[0].reset();
    $(".js-example-basic-single").select2();
    notify("right","fa fa-ban","danger", "Edición de certificado cancelada.");
  }

  function ConfirmarDelete(id)
  {
    $('.btn-delete').val(id);
    $('#ModalDelete').modal('show');
  }

  $('.btn-delete').on('click', function(e){
    $.ajaxSetup({ 
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    jQuery.ajax({
        url: "/certificado/"+$('.btn-delete').val(),
        method: 'DELETE',
        success: function(result){
          $('#ModalDelete').modal('hide');
          table.ajax.reload();
          notify("right","fa fa-ban","danger", result);
        },
        error: function(result){
          console.clear();
            $.each(result.responseJSON.errors, function (v, i) {
              notify("right","fa fa-ban","danger", i);
            });
        }
    });
  });