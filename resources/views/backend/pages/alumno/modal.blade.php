<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar Alumno</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
            </div>
            <div class="modal-body bodyEliminar">
                
            </div>
            <div class="modal-footer bodyBotones">
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalActivar" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alumno encontrado</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
            </div>
            <form id="FormAlumnoActivar" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">
                <h6>¿Reactivar usuario?</h6>
                <p>Este alumno ya ha sido registrado anteriormente en nuestro sistema, pero esta desactivado.</p>
            </div>
            <div class="modal-footer">
                 <button type="submit" class="btn btn-success btn-sm btn-activar"><i class="fa fa-user"></i>Activar</button>   
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalView" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Certificados</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
            </div>
            <div class="modal-body">
                <input type="number" class="id_view_certificado" hidden>
                <div class="table-responsive">
                    <table id="CertificadosViewAlumnoTable"  class="table table-sm">
                        <thead>
                            <tr>
                                <th>CODIGO</th>
                                <th>ALUMNO</th>
                                <th>CAPACITACION</th>
                                <th>NOTA</th>
                                <th>&nbsp;</th>												
                            </tr>
                        </thead>
                        <tbody>														
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>