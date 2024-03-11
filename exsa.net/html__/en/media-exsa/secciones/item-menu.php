<script src="js/vistas/ItemMenu.js" type="text/javascript"></script>
<ul id="myTab" class="nav nav-pills nav-justified">
   <li id="opRepItemMenu" class="active"><a href="#reporteItemMenu" data-toggle="tab">Reporte</a></li>
   <li id="opNewItemMenu"><a href="#nuevoItemMenu" data-toggle="tab">Nuevo</a></li>
</ul>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="reporteItemMenu">
      	<table id="tblItemMenu" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
				    <th width="40">Item</th>
				    <th width="40">Código</th>
				    <th>Descripción</th>
				    <th>url 1</th>
				    <th>url 2</th>
				    <th>Menu</th>
                    <th width="40">Orden</th>
                    <th width="40">Imagen</th>
				    <th width="70">Acciones</th>
				</tr>
			</thead>
			<tbody>
				                				                    
			</tbody>
		</table>
   </div>
   <div class="tab-pane fade" id="nuevoItemMenu">
		<div class="form-horizontal" role="form">                     
            <div class="panel panel-primary">
                <div class="panel-heading">Datos</div>
                <div class="panel-body" id="panelChecks">
                    <div class="form-group">
                        <label for="txtNombreItemMenu" class="col-sm-1 control-label">Nombre</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control mayus" id="txtNombreItemMenu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtLink1ItemMenu" class="col-sm-1 control-label">Link 1</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="txtLink1ItemMenu" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtLink2ItemMenu" class="col-sm-1 control-label">Link 2</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="txtLink2ItemMenu" disabled="disabled">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="lstMenu" class="col-sm-1 control-label">Menú</label>
                        <div class="col-sm-11">
                            <select class="form-control" id="lstMenu">
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtOrdenItemMenu" class="col-sm-1 control-label">Orden</label>
                        <div class="col-sm-11">
                            <input type="number" class="form-control" id="txtOrdenItemMenu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Imagen</label>
                        <div class="col-sm-11">
                            <input id="imgItemMenu" type="file" class="file form-control" data-img="prevImgItemMenu" accept="image/*">
                            <img src="" id="prevImgItemMenu" class="imgPreview img-thumbnail">
                        </div>
                    </div>                             
                    <div class="row botonera">
                    	<button type="button" class="btn btn-primary" id="btnGrabarItemMenu">Grabar</button>
                		<button type="button" class="btn btn-info limpiar" id="btnLimpiarItemMenu" data-section="nuevoItemMenu">Limpiar</button>
                    </div>                                                             
                </div>
            </div>
        </div>
   </div>
</div>
<script>
	var imenu=new ItemMenu();
	$(function(){
		imenu.iniciar();
	})
</script>