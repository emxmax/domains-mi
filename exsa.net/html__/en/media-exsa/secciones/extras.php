<div class="modal fade" id="alertaEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>                    
            </div>
            <input type="hidden" id="seccionEliminar">
            <input type="hidden" id="idEliminar">
            <input type="hidden" id="idCampoEliminar">
            <div class="modal-body">
                <p class="modal-title" id="myModalLabel">Desea eliminar este registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSiOcultar">Sí</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="alertaRecuperar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>                    
            </div>
            <input type="hidden" id="seccionRecuperar">
            <input type="hidden" id="idRecuperar">
            <input type="hidden" id="idCampoRecuperar">
            <div class="modal-body">
                <p class="modal-title" id="myModalLabel">Desea recuperar este registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSiRecuperar">Sí</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="asignarContenido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Asignar Contenido</h4>
           </div>
            <div class="modal-body">
                <div class="form-horizontal" role="form">                     
                    <div class="panel panel-info">
                        <div class="panel-heading">Datos</div>
                        <div class="panel-body" id="panelChecks">  
                            <div class="form-group">
                                <label for="txtContenidoAsignar" class="col-sm-2 control-label">Contenido</label>
                                <div class="col-sm-10">
                                    <input type="text" data-id="" class="form-control" id="txtContenidoAsignar" disabled="disabled">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lstPagina" class="col-sm-2 control-label">Página</label>
                                <div class="col-sm-10">
                                    <select class="form-control input-sm" id="lstPagina">

                                    </select>
                                </div>
                            </div>                                                                                      
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnGrabarAsignacionContenido">Grabar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>