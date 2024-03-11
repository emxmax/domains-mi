<script src="js/vistas/Contenidos.js" type="text/javascript"></script>
<ul id="myTab" class="nav nav-pills nav-justified">
   <li id="opRepContenido" class="active"><a href="#reporteContenidos" data-toggle="tab">Reporte</a></li>
   <li id="opNewContenido"><a href="#nuevoContenido" data-toggle="tab">Nuevo</a></li>
</ul>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="reporteContenidos">
      	<table id="tblContenidos" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
				    <th width="40">Item</th>
				    <th width="40">Código</th>
                    <th width="100">Nombre</th>
				    <th width="100">Título</th>
				    <th width="100">Sub Título</th>
				    <th>Texto</th>
				    <th width="70">Acciones</th>
				</tr>
			</thead>
			<tbody>
				                				                    
			</tbody>
		</table>
   </div>
   <div class="tab-pane fade" id="nuevoContenido">
		<div class="form-horizontal" role="form">                     
            <div class="panel panel-primary">
                <div class="panel-heading">Datos</div>
                <div class="panel-body" id="panelChecks">
                    <div class="form-group">
                        <label for="txtNombreContenido" class="col-sm-1 control-label">Nombre</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control mayus" id="txtNombreContenido">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtTituloContenido" class="col-sm-1 control-label">Título</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="txtTituloContenido">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtSubTituloContenido" class="col-sm-1 control-label">Sub Título</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="txtSubTituloContenido">
                        </div>
                    </div>
                    <div class="form-group">
		                <label for="txtContenido" class="col-sm-1 control-label">Contenido</label>
		                <div class="col-sm-11">
		                    <textarea id="txtContenido" cols="60" rows="6" class="editor"></textarea>
		                </div>
		            </div>
                    <div class="row botonera">
                    	<button type="button" class="btn btn-primary" id="btnGrabarContenido">Grabar</button>
                		<button type="button" class="btn btn-info limpiar" id="btnLimpiarContenido" data-section="nuevoContenido">Limpiar</button>
                    </div>                                                             
                </div>
            </div>
        </div>
   </div>
</div>
<script>
	var cont=new Contenido();
	$(function(){
		cont.iniciar();
	})
</script>