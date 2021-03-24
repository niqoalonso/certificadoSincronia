function EnviarCertificado(id, btn)
{   
    $("#im"+id).attr('class', 'fa fa-spinner fa-spin');
    $('.btn-send-icon'+id).prop('disabled', true);
    
    $.ajaxSetup({ 
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });
      jQuery.ajax({
          url: "/solicitudCertificadoSend/"+id,
          method: 'GET',
          success: function(result){
            table.ajax.reload();
            notify("right","fa fa-ban","success", result);
          },
          error: function(result){
            console.clear();
              $.each(result.responseJSON.errors, function (v, i) {
                notify("right","fa fa-send","danger", i);
              });
          }
    });
}

function VerMensaje(id, btn)
{
  $.ajaxSetup({ 
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });
  jQuery.ajax({
      url: "/solicitudCertificado/"+id,
      method: 'GET',
      success: function(result){
        $('#ModalMensaje').modal('show');
        $('.body-mensaje').html('<p><em>'+result.mensaje+'</em></p>');
      },
      error: function(result){
        console.clear();
          $.each(result.responseJSON.errors, function (v, i) {
            notify("right","fa fa-send","danger", i);
          });
      }
});
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
        url: "/solicitudCertificado/"+$('.btn-delete').val(),
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