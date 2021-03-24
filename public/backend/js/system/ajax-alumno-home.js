jQuery('#FormAlumnoEdit').on("submit", function (e) {
    event.preventDefault();
    $('.btn-update').html('<button type="button" disabled class="buttonload btn btn-warning btn-round"><i class="fa fa-spinner fa-spin"></i>Espere...</button>');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/UpdateAlumnoUser/"+$('.id_useralumno').val(),
        method: 'POST',
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (result) {
            notify("right","fa fa-check","success", result);
            $('.btn-update').html('<button class="btn btn-primary btn-round btn-register" type="submit"><i class="feather icon-save"></i> Actualizar Información</button>');
        }, 
        error: function (result) {
            console.clear();
            $('.btn-update').html('<button class="btn btn-primary btn-round btn-register" type="submit"><i class="feather icon-save"></i> Actualizar Información</button>'); 
            $.each(result.responseJSON.errors, function (v, i) {
              notify("right","fa fa-ban","danger", i);
            })
        }
    });
  });

  jQuery('#SendSolicitudAlumno').on("submit", function (e) {
    event.preventDefault();
    $('.btn-solicitud').html('<button type="button" disabled class="buttonload btn btn-warning btn-round"><i class="fa fa-spinner fa-spin"></i>Espere...</button>');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/SendMailAlumno",
        method: 'POST',
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (result) {
            $('#SendSolicitudAlumno')[0].reset();
            notify("right","fa fa-check","success", result);
            $('.btn-solicitud').html('<button class="btn btn-success btn-round btn-register" type="submit"><i class="feather icon-mail"></i> Enviar solicitud</button>');
        }, 
        error: function (result) {
            console.clear();
            $('.btn-solicitud').html('<button class="btn btn-success btn-round btn-register" type="submit"><i class="feather icon-mail"></i> Enviar solicitud</button>');
            $.each(result.responseJSON.errors, function (v, i) { 
              notify("right","fa fa-ban","danger", i);
            })
        }
    });
  });

 