				<script src="js/vistas/Usuarios.js" type="text/javascript"></script>
				<div class="panel panel-warning">
				  	<div class="panel-heading">Usuarios <button class="nuevo btn btn-default" id="btnNuevoUsuario" data-form="nuevoUsuario"><span class="glyphicon glyphicon-plus"></span> Nuevo</button></div>
				  	<div class="panel-body">
				    	<table id="tblUsuarios" class="table table-striped table-bordered table-hover tblDetalle" cellspacing="0" width="100%">
				            <thead>
				                <tr>
				                    <th>Item</th>
				                    <th>Código</th>
				                    <th>Nombre</th>
				                    <th>Rol</th>
				                    <th>Usuario</th>
				                    <th>Clave</th>
				                    <th>Acciones</th>
				                </tr>
				            </thead>
				            <tbody>
				                				                    
				            </tbody>
				        </table>
				  	</div>
				</div>

				<script>
				var usuarios=new Usuarios();
				$(function(){
					usuarios.iniciar();
				})
				</script>