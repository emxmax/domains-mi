<script src="js/vistas/Menu.js" type="text/javascript"></script>
<ul id="myTab" class="nav nav-pills nav-justified">
   <li id="opRepMenu" class="active"><a href="#reporteMenu" data-toggle="tab">Reporte</a></li>
   <li id="opNewMenu"><a href="#nuevoMenu" data-toggle="tab">Nuevo</a></li>
</ul>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="reporteMenu">
      	<table id="tblMenu" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
				    <th width="40">Item</th>
				    <th width="40">Código</th>
				    <th>Descripción</th>
				    <th>url 1</th>
				    <th>url 2</th>
				    <th width="40">Main</th>
				    <th width="70">Acciones</th>
				</tr>
			</thead>
			<tbody>
				                				                    
			</tbody>
		</table>
   </div>
   <div class="tab-pane fade" id="nuevoMenu">
		<div class="form-horizontal" role="form">                     
            <div class="panel panel-primary">
                <div class="panel-heading">Datos</div>
                <div class="panel-body" id="panelChecks">
                    <div class="form-group">
                        <label for="txtNombreMenu" class="col-sm-1 control-label">Nombre</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control mayus" id="txtNombreMenu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtLink1Menu" class="col-sm-1 control-label">Link 1</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="txtLink1Menu" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtLink2Menu" class="col-sm-1 control-label">Link 2</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="txtLink2Menu" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Menú Principal</label>
                    	<div class="col-sm-11">
                            <select class="form-control" id="lstTipoMenu">
                            	<option value="0">No</option>
                            	<option value="1">Sí</option>
                            </select>
                        </div>
                    </div>
                    <div class="row botonera">
                    	<button type="button" class="btn btn-primary" id="btnGrabarMenu">Grabar</button>
                		<button type="button" class="btn btn-info limpiar" id="btnLimpiarMenu" data-section="nuevoMenu">Limpiar</button>
                    </div>                                                             
                </div>
            </div>
        </div>
   </div>
</div>
<script>
	var menus=new Menu();
	$(function(){
		menus.iniciar();
	})
</script>