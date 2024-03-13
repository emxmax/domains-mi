<?php require_once("menu/head.php");?>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <?php require_once("menu/menu.php");?>
	  <!-- End Navbar-->
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>Pedidos</h1>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Precios</li>
              <li class="active"><a href="#">Detalle</a></li>
            </ul>
          </div>
		  <div>
            <a class="btn btn-info btn-flat" href="javascript:history.go(-1);"><i class="fa fa-mail-reply"></i></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<form id="act_precio_redgalar" data-validate="parsley" >
							<div class="row">
								<div class="col-md-12">
								  <h3>Editar Precio</h3>
								  <div class="form-group">
									<label class="control-label">Distrito</label>
									<?php
										foreach($distritos as $d){
											if($precios["id_distrito"] == $d["dis_id"]){
											?>
											<input type="text" class="form-control" name="distrito" value="<?php echo $d["dis_name"]?>" disabled>
											<?php
											}
										}
									?>
								  </div>
								  <div class="form-group">
									<label class="control-label">Precio</label>
									<input class="form-control" name="precio" type="text" placeholder="Precio" value="<?php echo $precios["precio"]?>" data-required="true">
								  </div>
								  <input type="hidden" id="id_p" name="id_p" value="<?php echo $precios["id"]?>">
								  <input type="hidden" id="acc" name="acc" value="4">
								  <button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Actualizar</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-6">

					</div>
				</div>
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
	<script src="<?php echo Conectar::ruta();?>template/js/newprecio.js"></script>
  </body>
</html>