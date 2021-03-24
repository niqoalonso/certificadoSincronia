var table = $('#Certificado').DataTable({
    "serverSide": true,
    "ajax": "api/certificadoAlumno/"+$('.id_alumno').val(),
    "columns": [
        {data: 'codigo_cert'},
        {data: 'alumno'},
        {data: 'capacitacion'},
        {data: 'notas'},
        {data: 'btn'}
    ],
    "scrollY": 550,
    "language": {
        "search" : "Buscar:",
        "info"   : "Mostrando _START_ al _END_ de _TOTAL_ Totales",
        "lengthMenu":    "Mostrar _MENU_",
        paginate: {
            first:      "Primero",
            previous:   "Anterior",
            next:       "Siguiente",
            last:       "Anterior"
        },        
    },
  });

$(document).ready(function(){
    table.ajax.reload();
});
