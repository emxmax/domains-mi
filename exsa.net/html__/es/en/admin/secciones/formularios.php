<script src="js/vistas/Formularios.js" type="text/javascript"></script>
<ul id="myTab" class="nav nav-pills nav-justified">
   <li id="opRepFormulario" class="active"><a href="#reporteFormulario" data-toggle="tab">Reporte</a></li>
   <li id="opNewFormulario"><a href="#nuevoFormulario" data-toggle="tab">Nuevo</a></li>
   <li id="creteCampos"><a href="#camposFormulario" data-toggle="tab">Campos</a></li>
</ul>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="reporteFormulario">
        <table id="tblFormularios" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="40">Item</th>
                    <th width="40">Id Formulario</th>
                    <th>Descripción</th>
                    <th>Clase</th>
                    <th width="70">Acciones</th>
                </tr>
            </thead>
            <tbody>
                                                                    
            </tbody>
        </table>
   </div>
   <div class="tab-pane fade" id="nuevoFormulario">
        <div class="form-horizontal" role="form">                     
            <div class="panel panel-primary">
                <div class="panel-heading">Datos</div>
                <div class="panel-body" id="panelChecks">
                    <div class="form-group">
                        <label class="col-sm-1 control-label" for="lstContenidoForm">Contenido</label>
                        <div class="col-sm-11">
                            <select class="form-control" id="lstContenidoForm">

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtDescripcionFormulario" class="col-sm-1 control-label">Descripción</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control mayus" id="txtDescripcionFormulario">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtClaseFormulario" class="col-sm-1 control-label">Class</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="txtClaseFormulario">
                        </div>
                    </div>
                    <div class="row botonera">
                        <button type="button" class="btn btn-primary" id="btnGrabarFromulario">Grabar</button>
                        <button type="button" class="btn btn-info limpiar" id="btnLimpiarFormulario" data-section="nuevoFormulario">Limpiar</button>
                    </div>                                                             
                </div>
            </div>
        </div>
   </div>
   <div class="tab-pane fade" id="camposFormulario">
        <div class="form-horizontal" role="form">                     
            <div class="panel panel-primary">
                <div class="panel-heading">Datos</div>
                <div class="panel-body" id="panelChecks">
                    <div class="form-group w49 paralel">
                        <label for="lstFormulario" class="col-sm-3 control-label">Formulario</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="lstFormulario">

                            </select>
                        </div>
                    </div>
                    <div class="form-group w49 paralel">
                        <label class="col-sm-3 control-label" for="lstElementoFormulario">Elemento</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="lstElementoFormulario">

                            </select>
                        </div>
                    </div>
                    <div class="form-group paralel w33">
                        <label for="txtNombreCampo" class="col-sm-3 control-label">Nombre</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="txtNombreCampo">
                        </div>
                    </div>
                    <div class="form-group paralel w33">
                        <label for="txtIdCampo" class="col-sm-3 control-label">idCampo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="txtIdCampo">
                        </div>
                    </div>
                    <div class="form-group paralel w33">
                        <label for="txtClaseCampo" class="col-sm-3 control-label">Clase</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="txtClaseCampo">
                        </div>
                    </div>
                    <div class="form-group w40 paralel">
                        <label for="txtPlaceHolder" class="col-sm-3 control-label">Texto muestra</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="txtPlaceHolder">
                        </div>
                    </div>
                    <div class="form-group w40 paralel">
                        <label for="txtCaracteresCampo" class="col-sm-3 control-label">Caracteres</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="txtCaracteresCampo">
                        </div>
                    </div>
                    <div class="form-group w10 paralel">
                        <button type="button" class="btn btn-success" id="btnAgregar">Agregar</button>
                    </div>
                    <table id="tblCamposFormulario" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Ref</th>
                                <th>Elemento</th>
                                <th>Nombre</th>
                                <th>Id</th>
                                <th>Clase</th>
                                <th>Texto</th>
                                <th>Caracteres</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                                                                                
                        </tbody>
                    </table>            
                    <div class="row botonera">
                        <button type="button" class="btn btn-primary" id="btnGrabarCampos">Grabar</button>
                        <button type="button" class="btn btn-info limpiar" id="btnLimpiarCampos" data-section="camposFormulario">Limpiar</button>
                    </div>                                                             
                </div>
            </div>
        </div>
   </div>
</div>
<script>
    var formul=new Formularios();
    $(function(){
        formul.iniciar();
    })
</script>