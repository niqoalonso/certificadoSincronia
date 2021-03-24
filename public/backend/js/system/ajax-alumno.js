jQuery('#FormAlumno').on("submit", function (e) {
  e.preventDefault();
  $('.btn-ingreso').html('<button type="button" disabled class="buttonload btn btn-warning btn-round"><i class="fa fa-spinner fa-spin"></i>Espere...</button>');
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
  });
  jQuery.ajax({
      url: "/alumno",
      method: 'POST',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (result) {
        notify("right","fa fa-check","success", result);
        $('#FormAlumno')[0].reset();
        limpiarFormulario();
        $('.btn-ingreso').html('<button class="btn btn-primary btn-round btn-register" type="submit" disabled=""><i class="feather icon-save"></i> Registrar</button>');
        table.ajax.reload();
      },
      error: function (result) {
          console.clear();
          $('.btn-ingreso').html('<button class="btn btn-primary btn-round btn-register" type="submit"><i class="feather icon-save"></i> Registrar</button>');
          $.each(result.responseJSON.errors, function (v, i) {
            notify("right","fa fa-ban","danger", i);
          })
          
      }
  });
});

jQuery('#FormAlumnoEdit').on("submit", function (e) {
  $('.btn-update').html('<button type="button" disabled class="buttonload btn btn-warning btn-round"><i class="fa fa-spinner fa-spin"></i>Espere...</button>');
  event.preventDefault();
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
  });
  jQuery.ajax({
      url: "/alumno/"+$('.id').val(),
      method: 'POST',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function (result) {
        notify("right","fa fa-check","success", result);
        $('#FormAlumnoEdit')[0].reset();
        $('.btn-update').html('<button class="btn btn-danger btn-round" onclick="CancelarEdicionAlumno()" type="submit"><i class="feather icon-close"></i> Cancelar</button> <button class="btn btn-primary btn-round btn-edit" type="submit"><i class="feather icon-save"></i> Actualizar</button>');
        $('.inscripcion').show();
        $('.edicion').hide();
        table.ajax.reload();
      }, 
      error: function (result) {
          console.clear();
          $('.btn-update').html('<button class="btn btn-danger btn-round" onclick="CancelarEdicionAlumno()" type="submit"><i class="feather icon-close"></i> Cancelar</button> <button class="btn btn-primary btn-round btn-edit" type="submit"><i class="feather icon-save"></i> Actualizar</button>');
          $.each(result.responseJSON.errors, function (v, i) {
            notify("right","fa fa-ban","danger", i);
          })
      }
  });
});

function EditarAlumno(id)
{ 
  $.ajaxSetup({ 
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
  });
  jQuery.ajax({
      url: "/alumno/"+id+"/edit",
      method: 'GET',
      success: function(result){
        notify("right","fa fa-info","info", "Alumno cargador para edición");
        $('.id').val(result.id);
        $('.rut').val(result.rut);
        $('.nombres').val(result.nombres);
        $('.apellidos').val(result.apellidos);
        $('.correo').val(result.email);
        $('.celular').val(result.celular);
        $('.inscripcion').hide();
        $('.edicion').show();
      },
      error: function(result){
        console.clear();
          $.each(result.responseJSON.errors, function (v, i) {
            notify("right","fa fa-ban","danger", i);
          });
      }
  });
}

function CancelarEdicionAlumno()
{
  $('.inscripcion').show();
  $('.edicion').hide();
  $('#FormAlumnoEdit')[0].reset();
  notify("right","fa fa-ban","danger", "Edición de alumno cancelada.");
}

function ConfirmarEliminar(id)
  { 
    $.ajaxSetup({ 
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    jQuery.ajax({
        url: "/CheckCertificadosAlumnos/"+id,
        method: 'GET',
        success: function(result){
          if(result > 0){
            $('.bodyEliminar').html('<h5>¿Esta seguro que desea eliminar esta capacitación?</h5>'+
                                    '<p>Tienes dos modos de eliminar:</p>'+
                                    '<p> <h5>Parcial: </h5> Da de baja la capacitación y los ceritificados de este curso no seran eliminar y aun seguiran vigentes.</p>'+
                                    '<p> <h5>Completa: </h5>Se eliminara completamente la capacitación y todos los certifiados asociados a esta.</p>');

            $('.bodyBotones').html('<button type="button" class="btn btn-danger btn-sm waves-effect waves-light" onclick="DeleteParcial(this.value)" value="'+id+'"><i class="fa fa-trash"></i> Eliminacion Parcial</button>'+
                                   '<button type="button" class="btn btn-danger btn-sm waves-effect waves-light btn-delete-completa" onclick="DeleteForce(this.value)" value="'+id+'"><i class="fa fa-trash"></i> Eliminación Completa</button>');
            
          }else if(result == 0){
            $('.bodyEliminar').html('<h5>¿Esta seguro que desea eliminar esta capacitación?</h5>'+
                                    '<p>Esta capacitación sera eliminada completamente del sistema.</p>');

            $('.bodyBotones').html('<button type="button" class="btn btn-danger btn-sm waves-effect waves-light btn-delete-completa" onclick="DeleteForce(this.value)" value="'+id+'"><i class="fa fa-trash"></i> Eliminacion </button>');
          }
          $('#ModalDelete').modal('show');
        },
        error: function(result){
          console.clear();
            $.each(result.responseJSON.errors, function (v, i) {
              notify("right","fa fa-ban","danger", i);
            });
        }
    });
  }

  function DeleteParcial(id){
    $.ajaxSetup({ 
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/alumno/"+id,
        method: 'DELETE',
        success: function(result){
          $('#ModalDelete').modal('hide');
          notify("right","fa fa-ban","warning", result);
          table.ajax.reload();
        },
        error: function(result){
          console.clear();
            $.each(result.responseJSON.errors, function (v, i) {
              notify("right","fa fa-ban","danger", i);
            });
        }
    });
}


function DeleteForce(id){
  $.ajaxSetup({ 
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
  });
  jQuery.ajax({
      url: "/alumnoForce/"+id,
      method: 'DELETE',
      success: function(result){
        $('#ModalDelete').modal('hide');
        notify("right","fa fa-ban","danger", result);
        table.ajax.reload();
      },
      error: function(result){
        console.clear();
          $.each(result.responseJSON.errors, function (v, i) {
            notify("right","fa fa-ban","danger", i);
          });
      }
  });
}

function CertificadoViewAlumno(id)
{ 
  ViewCertificado(id);
  $('#ModalView').modal('show');
}