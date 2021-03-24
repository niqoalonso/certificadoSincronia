var table = $('#Solicitud').DataTable({
    "serverSide": true,
    "ajax": "api/solicitud",
    "columns": [
        {data: 'nombre'},
        {data: 'empresa'},
        {data: 'email'},
        {data: 'certificado'},
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
