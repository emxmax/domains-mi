<script src="js/vistas/Menu.js" type="text/javascript"></script>
<ul id="myTab" class="nav nav-pills nav-justified">
   <li id="opRep" class="active"><a href="#reporte" data-toggle="tab">Reporte</a></li>
   <li id="opNuevo"><a href="#nuevo" data-toggle="tab">Nuevo</a></li>
</ul>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="reporte">
      	<table id="tblMenu" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
				    <th width="40">Item</th>
				    <th>Nombre</th>
				    <th>Url1</th>
				    <th>Url2</th>
				    <th>Orden</th>
				    <th>Nueva Pestaña</th>
				    <th width="70">Acciones</th>
				</tr>
			</thead>
			<tbody>
				                				                    
			</tbody>
		</table>
   </div>
   <div class="tab-pane fade" id="nuevo">
		<div class="form-horizontal" role="form">                     
            <div class="panel panel-warning">
                <div class="panel-heading">Datos</div>
                <div class="panel-body" id="panelChecks">
                    <div class="form-group">
                        <label for="txtNombre" class="col-sm-1 control-label">Nombre</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control mayus" id="txtNombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtLink1" class="col-sm-1 control-label">Link 1</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="txtLink1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtLink2" class="col-sm-1 control-label">Link 2</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="txtLink2" >
                        </div>
                    </div>        
                    <div class="form-group">
                        <label for="txtOrden" class="col-sm-1 control-label">Orden</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="txtOrden">
                        </div>
                    </div>                 
                    <div class="form-group">
                        <label for="lstNuevaPestana" class="col-sm-1 control-label">Nueva Pestaña</label>
                        <div class="col-sm-11">
                            <select id="lstNuevaPestana" class="form-control">
                            	<option value="0">No</option>
                            	<option value="1">Sí</option>
                            </select>
                        </div>
                    </div>
                    <div class="row botonera">
                    	<button type="button" class="btn btn-warning" id="btnGrabar">Grabar</button>
                		<button type="button" class="btn btn-info limpiar" id="btnLimpiarPost" data-section="nuevoPost">Limpiar</button>
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