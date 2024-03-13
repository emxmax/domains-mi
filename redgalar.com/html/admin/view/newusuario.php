<?php require_once("menu/head.php");?>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <?php require_once("menu/menu.php");?>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-user"></i> Usuario</h1>
            <p>Nuevo usuario / Nueva empresa</p>
          </div>
		  <div>
            <a class="btn btn-info btn-flat" href="?accion=usuarios"><i class="fa fa-mail-reply"></i></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
				<form id="add_user_redgalar" enctype="multipart/form-data" data-validate="parsley" >
					<div class="row">
						<div class="col-md-6">
						  <div class="form-group">
							<label class="control-label">Empresa</label>
							<input class="form-control" name="nombre" type="text" placeholder="Nombre" data-required="true">
						  </div>
						  <div class="form-group">
							<label class="control-label">Email</label>
							<input class="form-control" name="email" type="email" placeholder="Email" data-required="true">
						  </div>
						  <div class="form-group">
							<label class="control-label">Representante</label>
							<input class="form-control" name="representante" type="text" placeholder="Representante" data-required="true">
						  </div>
						  <div class="form-group">
								<label class="control-label">DNI / RUC (usuario)</label>
								<input class="form-control" name="dni" type="number" placeholder="RUC / DNI" data-required="true">
						  </div>
						</div>
						<div class="col-md-6">
							
							<div class="form-group">
								<label class="control-label">Contrase&ntilde;a</label>
								<input class="form-control" name="pass" type="password" placeholder="Contrase&ntilde;a" data-required="true">
							</div>
							
							<div class="form-group">
								<label class="control-label">Foto:</label>
								<br>
								<?php
									if($usuario["user_foto"]){
									?>
									<img src="<?php echo Conectar::ruta();?>upload/user/<?php echo $usuario["user_foto"]?>" id="img_avatar" class="img-thumbnail img-redgalar" alt="<?php echo $pedido["user_foto"]?>">
									<?php
									}
									else{
									?>
									<img src="../img/select.png" alt="" id="img_avatar" class="img-thumbnail avatar-redgalar">
									<?php
									}
								?>
								<div class="form-group">
									<br>
									<input class="form-control" type="file" name="foto" id="load_img">
								</div>
							</div>
							
						</div>
						<div class="col-md-12">
							<div class="card-footer">
								<input type="hidden" id="acc" name="acc" value="1">
								<button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="?accion=usuarios"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
							</div>
						</div>
					</div>
                </form>
			  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <?php require_once("menu/footerjs.php");?>
	<!-- parsley -->
	<script src="<?php echo Conectar::ruta();?>template/js/parsley/parsley.min.js"></script>
	<script src="<?php echo Conectar::ruta();?>template/js/parsley/parsley.extend.js"></script>
	<script src="<?php echo Conectar::ruta();?>template/js/plugins/bootstrap-notify.min.js"></script>
	<script src="<?php echo Conectar::ruta();?>template/js/newuser.js"></script>
  </body>
</html>