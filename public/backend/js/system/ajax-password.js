$('#changePassword').on('click', function(){
    $('#exampleModal').modal('show');
});

jQuery('#formPassword').on("submit", function (e) {
    e.preventDefault();
    $('.btn-ingreso').html('<button type="button" disabled class="buttonload btn btn-warning btn-round"><i class="fa fa-spinner fa-spin"></i>Espere...</button>');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/changePassword",
        method: 'POST',
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (result) {
            console.log(result);
            notify("right","fa fa-check","success", result);
            $('#formPassword')[0].reset();
            $('#exampleModal').modal('hide');
            $('#changePassword').removeClass('pcoded-trigger');
        },
        error: function (result) {
            console.clear();
            $.each(result.responseJSON.errors, function (v, i) {
              notify("right","fa fa-ban","danger", i);
            })
        }
    });
  });

$('.cancelarPassword').on('click', function(){
    $('#changePassword').removeClass('pcoded-trigger');
});