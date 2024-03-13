<script src="js/vistas/Asignacion.js" type="text/javascript"></script>
<ul id="myTab" class="nav nav-pills nav-justified">
   <li id="opRepAsignacion" class="active"><a href="#reporteAsignacion" data-toggle="tab">Reporte</a></li>
   <li id="opNewAsignacion"><a href="#nuevaAsignacion" data-toggle="tab">Nuevo</a></li>
</ul>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="reporteAsignacion">
      	<table id="tblAsignacion" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
				    <th width="40">Item</th>
				    <th width="40">Id Item</th>
				    <th>Item Menú</th>
				    <th width="40">Id Menú</th>
				    <th>Menú</th>
				    <th width="70">Acciones</th>
				</tr>
			</thead>
			<tbody>
				                				                    
			</tbody>
		</table>
   </div>
   <div class="tab-pane fade" id="nuevaAsignacion">
		<div class="form-horizontal" role="form">                     
            <div class="panel panel-primary">
                <div class="panel-heading">Datos</div>
                <div class="panel-body" id="panelChecks">
                    <div class="form-group">
                        <label for="lstAsignaItemMenu" class="col-sm-1 control-label">Item Menú</label>
                        <div class="col-sm-11">
                            <select class="form-control" id="lstAsignaItemMenu">

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label" for="lstAsignaMenu">Menú</label>
                    	<div class="col-sm-11">
                            <select class="form-control" id="lstAsignaMenu">

                            </select>
                        </div>
                    </div>
                    <div class="row botonera">
                    	<button type="button" class="btn btn-primary" id="btnGrabarAsignacion">Grabar</button>
                		<button type="button" class="btn btn-info limpiar" id="btnLimpiarPagina" data-section="nuevaAsignacion">Limpiar</button>
                    </div>                                                             
                </div>
            </div>
        </div>
   </div>
</div>
<script>
	var asigna=new Asignacion();
	$(function(){
		asigna.iniciar();
	})
</script>