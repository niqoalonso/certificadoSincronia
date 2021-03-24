<div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar Capacitación</h4>
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
                    <table id="CertificadosViewTable"  class="table table-sm">
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

<div class="modal fade" id="ModalViewDelete" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Capacitaciones Desactivadas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="CapacitacionViewDeleteTable"  class="table table-sm">
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

<div class="modal fade" id="ModalConfirmActivar" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmar Activación</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
            </div>
            <div class="modal-body">
                <h6>¿Seguro que quiere reactivar esta capacitación?</h6>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-sm btn-activar-capacitacion"><i class="fa fa-book"></i> Activar</button>
            </div>
        </div>
    </div>
</div>