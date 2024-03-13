<?php require_once("menu/head.php");?>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <?php require_once("menu/menu.php");?>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-user"></i> Usuario</h1>
            <p><?php echo $usuario["user_name"]?></p>
          </div>
		  <div>
            <a class="btn btn-info btn-flat" href="?accion=usuarios"><i class="fa fa-mail-reply"></i></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
				<form >
					<div class="row">
						<div class="col-md-6">
						  <div class="form-group">
							<label class="control-label">Empresa</label>
							<input class="form-control" name="nombre" type="text" value="<?php echo $usuario["user_name"]?>" disabled>
						  </div>
						  <div class="form-group">
							<label class="control-label">Email</label>
							<input class="form-control" name="email" type="email" value="<?php echo $usuario["user_email"]?>" disabled>
						  </div>
						  <div class="form-group">
							<label class="control-label">Representante</label>
							<input class="form-control" name="representante" type="text" value="<?php echo $usuario["user_representante"]?>" disabled>
						  </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">DNI / RUC</label>
								<input class="form-control" name="dni" type="number" value="<?php echo $usuario["user_dni"]?>" disabled>
							</div>
							<div class="form-group">
								<label class="control-label">Foto:</label>
								<br>
								<?php
									if($usuario["user_foto"]){
									?>
									<img src="<?php echo Conectar::ruta();?>upload/user/<?php echo $usuario["user_foto"]?>" class="img-thumbnail img-redgalar" alt="<?php echo $pedido["user_foto"]?>">
									<?php
									}
								?>
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
  </body>
</html>