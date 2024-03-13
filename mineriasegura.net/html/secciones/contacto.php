<br><br>
<div class="panel panel-warning">
	<div class="panel-heading">Formulario de Contacto</div>
	<div class="panel-body">
		<form method="POST" action="mail.php">
			<div class="form-group">
				<label for="txtNombre">Nombre</label>
				<input type="text" name="txtNombre" class="form-control" id="txtNombre" placeholder="Nombre" required>
			</div>
			<div class="form-group">
				<label for="txtCorreo">Correo</label>
				<input type="email" name="txtCorreo" class="form-control" id="txtCorreo" placeholder="Correo" required>
			</div>
			<div class="form-group">
				<label for="txtTelefono">Teléfono</label>
				<input type="text" name="txtTelefono" class="form-control" id="txtTelefono" placeholder="Teléfono">
			</div>
			<div class="form-group">
				<label for="txtDescripcion">Descripción</label>
				<textarea rows="5" name="txtDescripcion" class="form-control" id="txtDescripcion" placeholder="Descripción" required></textarea>
			</div>
			<button type="submit" class="btn btn-default">Enviar</button>
		</form>		
	</div>
</div>