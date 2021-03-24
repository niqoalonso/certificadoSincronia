var table = $('#Alumnos').DataTable({
    "serverSide": true,
    "ajax": "api/alumno",
    "columns": [
        {data: 'rut'},
        {data: 'nameFull'},
        {data: 'email'},
        {data: 'celular'},
        {data: 'btn'},
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
    $("#CertificadosViewAlumnoTable").dataTable().fnDestroy();
    $('#CertificadosViewAlumnoTable').DataTable({
        "serverSide": true,
        "ajax": "certificadoViewAlumno/"+id,
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

$(document).ready(function(){
    $('#Alumnos').DataTable().ajax.reload();
});
