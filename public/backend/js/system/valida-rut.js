function CheckAlumnoDelete(rut)
{ 
  $.ajaxSetup({ 
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
  });
  jQuery.ajax({
      url: "/alumnoComprobarEliminado/"+rut,
      method: 'GET',
      success: function(result){ 
        if(result > 0){
            $('.btn-activar').val(result);
            $('#ModalActivar').modal('show');
            limpiarFormulario();
        }else{
            ActivarFormulario(); 
        }
      },
      error: function(result){
        console.clear();
          $.each(result.responseJSON.errors, function (v, i) {
            notify("right","fa fa-ban","danger", i);
          });
      }
  });
}

jQuery('#FormAlumnoActivar').on("submit", function (e) {
    event.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "/alumnoActivar/"+$('.btn-activar').val(),
        method: 'POST',
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (result) {
            $('#ModalActivar').modal('hide');
          $('#input_usuario').val('');
          notify("right","fa fa-ban","success", result);
          table.ajax.reload();
        }, 
        error: function (result) {
            console.clear();
            $.each(result.responseJSON.errors, function (v, i) {
              notify("right","fa fa-ban","danger", i);
            })
        }
    });
  });

function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo + '-'+ dv
    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { limpiarFormulario(); $('#input_usuario').css({"border-color":"red","boder":"1px solid red"}); $('.btn-register').prop('disabled', true); return false;}
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { limpiarFormulario(); $('#input_usuario').css({"border-color":"red","boder":"1px solid red"}); $('.btn-register').prop('disabled', true); return false; }
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
    $('#input_usuario').css({"border-color":"#40A944","boder":"1px solid #40A944"});
    $('.btn-register').prop('disabled', false); 
    CheckAlumnoDelete($('input[name=rut]').val());

}

function limpiarFormulario()
{
    $('input[name="nombres"]').val('');
    $('input[name="apellidos"]').val('');
    $('input[name="correo"]').val('');
    $('input[name="celular"]').val('');

    $('.nombres_new').prop('disabled', true);
    $('.apellidos_new').prop('disabled', true);
    $('.correo_new').prop('disabled', true);
    $('.celular_new').prop('disabled', true);

    $('#input_usuario').css({"border-color":"#ccc","boder":"1px solid #ccc"})
}

function ActivarFormulario()
{
    $('input[name="nombres"]').prop('disabled', false);
    $('input[name="apellidos"]').prop('disabled', false);
    $('input[name="correo"]').prop('disabled', false);
    $('input[name="celular"]').prop('disabled', false);
}

function checkRutEdit(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo + '-'+ dv
    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { DesactivarFormulario(); $('#input_usuario').css({"border-color":"red","boder":"1px solid red"}); $('.btn-edit').prop('disabled', true); return false;}
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { DesactivarFormulario(); $('#input_usuario').css({"border-color":"red","boder":"1px solid red"}); $('.btn-edit').prop('disabled', true); return false; }
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
    $('#input_usuario').css({"border-color":"#40A944","boder":"1px solid #40A944"});
    $('.btn-edit').prop('disabled', false); 
    ActivarFormularioEdit(); 

}

function DesactivarFormulario()
{
    $('.nombres').prop('disabled', true);
    $('.apellidos').prop('disabled', true);
    $('.correo').prop('disabled', true);
    $('.celular').prop('disabled', true);
}

function ActivarFormularioEdit()
{
    $('.nombres').prop('disabled', false);
    $('.apellidos').prop('disabled', false);
    $('.correo').prop('disabled', false);
    $('.celular').prop('disabled', false);
}
