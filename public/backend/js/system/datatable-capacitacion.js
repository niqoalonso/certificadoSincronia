var table = $('#Capacitaciones').DataTable({
    "serverSide": true,
    "ajax": "api/capacitacion",
    "columns": [
        {data: 'codigo'},
        {data: 'tipo'},
        {data: 'nombre'},
        {data: 'hr_pedagogicas'},
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

function ViewCertificado(id){
    $("#CertificadosViewTable").dataTable().fnDestroy();
    $('#CertificadosViewTable').DataTable({
        "serverSide": true,
        "ajax": "certificadoView/"+id,
        "columns": [
            {data: 'codigo_cert'},
            {data: 'alumno'},
            {data: 'capacitacion'},
            {data: 'notas'},
            {data: 'btn'},
        ],
        "scrollY": 200,
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
}
 

function ViewCapacitacionDelete(){
    $("#CapacitacionViewDeleteTable").dataTable().fnDestroy();
    $('#CapacitacionViewDeleteTable').DataTable({
        "serverSide": true,
        "ajax": "capacitacionDeleteGet",
        "columns": [
            {data: 'codigo'},
            {data: 'tipo'},
            {data: 'nombre'},
            {data: 'hr_pedagogicas'},
            {data: 'btn'},
        ],
        "scrollY": 200,
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
    $('#ModalViewDelete').modal('show');
}

$(document).ready(function(){
    table.ajax.reload();
});
