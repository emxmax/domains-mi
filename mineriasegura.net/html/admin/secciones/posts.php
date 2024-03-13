<script src="js/vistas/Posts.js" type="text/javascript"></script>
<ul id="myTab" class="nav nav-pills nav-justified">
   <li id="opRep" class="active"><a href="#reporte" data-toggle="tab">Reporte</a></li>
   <li id="opNuevo"><a href="#nuevo" data-toggle="tab">Nuevo</a></li>
</ul>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="reporte">
      	<table id="tblPosts" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
				    <th width="40">Item</th>
				    <th width="40">Código</th>
				    <th>Título</th>
				    <th>url</th>
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
                        <label for="txtFechaPublicacion" class="col-sm-1 control-label">Fecha</label>
                        <div class="col-sm-11">
                            <input type="date" class="form-control mayus" id="txtFechaPublicacion">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lstCategoriaPost" class="col-sm-1 control-label">Categoría</label>
                        <div class="col-sm-11">
                            <select class="form-control" id="lstCategoriaPost">

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtTituloPost" class="col-sm-1 control-label">Título</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control mayus" id="txtTituloPost">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtLink1Post" class="col-sm-1 control-label">Link 1</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="txtLink1Post" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtLink2Post" class="col-sm-1 control-label">Link 2</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="txtLink2Post" disabled="disabled">
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label for="txtContenido" class="col-sm-1 control-label">Contenido</label>
                        <div class="col-sm-11">
                            <textarea id="txtContenido" cols="60" rows="6" class="editor"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtContenidoMuestra" class="col-sm-1 control-label">Texto Muestra</label>
                        <div class="col-sm-11">
                            <textarea id="txtContenidoMuestra" cols="60" rows="6" class="editor"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Imagen Portada</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input id="imgePostPortada" type="file" class="file form-control" data-img="imgPostPrwPortada" accept="image/*">
                                <img src="" id="imgPostPrwPortada" class="imgPreview img-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Imagen Principal</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input id="imgePostPrincipal" type="file" class="file form-control" data-img="imgPostPrwPrincipal" accept="image/*">
                                <img src="" id="imgPostPrwPrincipal" class="imgPreview img-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="row botonera">
                    	<button type="button" class="btn btn-warning" id="btnGrabarPost">Grabar</button>
                		<button type="button" class="btn btn-info limpiar" id="btnLimpiarPost" data-section="nuevoPost">Limpiar</button>
                    </div>                                                             
                </div>
            </div>
        </div>
   </div>
</div>
<script>
	var posts=new Posts();
	$(function(){
		posts.iniciar();
	})
</script>