				<script src="js/vistas/Paginas.js" type="text/javascript"></script>
				<div class="panel panel-primary">
				  	<div class="panel-heading">Archivos <button class="nuevo btn btn-default" id="btnNuevaPagina" data-form="nuevaPagina"><span class="glyphicon glyphicon-plus"></span> Nuevo</button></div>
				  	<div class="panel-body">
				    	<table id="tblPaginas" class="table table-striped table-bordered table-hover tblDetalle" cellspacing="0" width="100%">
				            <thead>
				                <tr>
				                    <th>Item</th>
				                    <th>Código</th>
				                    <th>Nombre</th>
				                    <th>url 1</th>
				                    <th>url 2</th>
				                    <th>Orden</th>
				                    <th>Size Articulo</th>
				                    <th>Acciones</th>
				                </tr>
				            </thead>
				            <tbody>
				                				                    
				            </tbody>
				        </table>
				  	</div>
				</div>

				<script>
				var paginas=new Paginas();
				$(function(){
					paginas.iniciar();
				})
				</script>