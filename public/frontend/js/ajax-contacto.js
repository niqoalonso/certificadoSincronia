jQuery('#FormSendMail').on("submit", function (e) {
    event.preventDefault();
    $('.btn-enviar').html('<button type="submit" disabled class="btn btn-certificado"><i class="bx bx-send"></i> Enviado...</button>');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/sendmail",
        method: 'POST',
        data: new FormData(this),
        dataType: 'JSON', 
        contentType: false,
        cache: false,
        processData: false,
        success: function (result) {
          $('#FormSendMail')[0].reset();
          $('.btn-enviar').html('<button type="submit" class="buttonload btn btn-certificado"><i class="bx bx-send"></i> Enviar</button>');
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