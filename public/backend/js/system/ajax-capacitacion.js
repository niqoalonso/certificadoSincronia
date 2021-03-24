jQuery('#FormCapacitacion').on("submit", function (e) {
    e.preventDefault();
    $('.btn-ingreso').html('<button type="button" disabled class="buttonload btn btn-warning btn-round"><i class="fa fa-spinner fa-spin"></i>Espere...</button>');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/capacitacion",
        method: 'POST',
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (result) {
            notify("right","fa fa-check","success", result);
            $('#FormCapacitacion')[0].reset();
            $('.btn-ingreso').html('<button class="btn btn-primary btn-round" type="submit"><i class="feather icon-save"></i> Registrar</button>');
            table.ajax.reload();
            $(".js-example-basic-single").select2();
        },
        error: function (result) {
            console.clear();
            $('.btn-ingreso').html('<button class="btn btn-primary btn-round" type="submit"><i class="feather icon-save"></i> Registrar</button>');
            $.each(result.responseJSON.errors, function (v, i) {
              notify("right","fa fa-ban","danger", i);
            })
        }
    });
  });
  
  jQuery('#FormCapacitacionEdit').on("submit", function (e) {
    e.preventDefault();
    $('.btn-update').html('<button type="button" disabled class="buttonload btn btn-warning btn-round"><i class="fa fa-spinner fa-spin"></i>Espere...</button>');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/capacitacion/"+$('.id').val(),
        method: 'POST',
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false, 
        processData: false,
        success: function (result) {
          notify("right","fa fa-check","success", result);
          $('#FormCapacitacionEdit')[0].reset();
          $('.btn-update').html('<button class="btn btn-danger btn-round" onclick="CancelarEdicionCapacitacion()" type="submit"><i class="feather icon-close"></i> Cancelar</button> <button class="btn btn-primary btn-round" type="submit"><i class="feather icon-save"></i> Actualizar</button>');
          $('.inscripcion').show();
          $('.edicion').hide();
          table.ajax.reload();
          $(".js-example-basic-single").select2();
        },
        error: function (result) {
            console.clear();
            $('.btn-update').html('<button class="btn btn-danger btn-round" onclick="CancelarEdicionCapacitacion()" type="submit"><i class="feather icon-close"></i> Cancelar</button> <button class="btn btn-primary btn-round" type="submit"><i class="feather icon-save"></i> Actualizar</button>');
            $.each(result.responseJSON.errors, function (v, i) {
              notify("right","fa fa-ban","danger", i);
            })
        }
    });
  });
  
  function EditarCapacitacion(id)
  { 
    $.ajaxSetup({ 
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/capacitacion/"+id+"/edit",
        method: 'GET',
        success: function(result){
          notify("right","fa fa-info","info", "Capacitación cargada para edición");
          $('.id').val(result.id);
          $('.titulo').val(result.nombre);
          $('.hr_pedagogicas').val(result.hr_pedagogicas);
          $('.modalidad').val(result.modalidad_id).trigger('change'); 
          if(result.tipo_capacitacion_id == 1){
            $('.curso').prop('checked', true);
            $('.diplomado').prop('checked', false);
            $('.postitulo').prop('checked', false);
          }else if(result.tipo_capacitacion_id == 2){
            $('.diplomado').prop('checked', true);
            $('.curso').prop('checked', false);
            $('.postitulo').prop('checked', false);
          }else if(result.tipo_capacitacion_id == 3){
            $('.diplomado').prop('checked', false);
            $('.curso').prop('checked', false);
            $('.postitulo').prop('checked', true);
          }
          $('.inscripcion').hide();
          $('.edicion').show();
          $(".js-example-basic-single").select2();
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
  
  function CancelarEdicionCapacitacion()
  {
    $('.inscripcion').show();
    $('.edicion').hide();
    $('#FormCapacitacionEdit')[0].reset();
    $(".js-example-basic-single").select2();
    notify("right","fa fa-ban","danger", "Edición de capacitación cancelada.");
  }

  function ConfirmarEliminar(id)
  { 
    $.ajaxSetup({ 
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    jQuery.ajax({
        url: "/CheckCertificados/"+id,
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
        url: "/capacitacion/"+id,
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
      url: "/capacitacionForce/"+id,
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

function CertificadoView(id)
{ 
  ViewCertificado(id);
  $('#ModalView').modal('show');
}

$('.btn-desactivados').on('click', function(){
  $.ajaxSetup({ 
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });
  jQuery.ajax({
      url: "/capacitacionDeleteGet",
      method: 'GET',
      success: function(result){
       console.log(result);
      },
      error: function(result){
        console.clear();
          $.each(result.responseJSON.errors, function (v, i) {
            notify("right","fa fa-ban","danger", i);
          });
      }
  });
}); 

function ActivarCapacitacionConfirmar(id)
{
  $('.btn-activar-capacitacion').val(id);
  $('#ModalConfirmActivar').modal('show');
}

$('.btn-activar-capacitacion').on('click', function(e){
  $.ajaxSetup({ 
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });
  jQuery.ajax({
      url: "/capacitacionReactivar/"+$('.btn-activar-capacitacion').val(),
      method: 'GET',
      success: function(result){
        notify("right","fa fa-ban","success", result);
        $('#ModalConfirmActivar').modal('hide');
        $('#ModalViewDelete').modal('hide');
        ViewCapacitacionDelete();
        table.ajax.reload();
      },
      error: function(result){
        console.clear();
          $.each(result.responseJSON.errors, function (v, i) {
            notify("right","fa fa-ban","danger", i);
          });
      }
  });
}); 