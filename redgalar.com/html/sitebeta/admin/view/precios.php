<?php require_once("menu/head.php");?>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <?php require_once("menu/menu.php");?>
	  <!-- End Navbar-->
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>Precios por distrito</h1>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Precio</li>
              <li class="active"><a href="#">Lista de precios</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<form id="add_precio_redgalar" data-validate="parsley" >
							<div class="row">
								<div class="col-md-12">
								  <h3>Nuevo Precio</h3>
								  <div class="form-group">
									<label class="control-label">Distrito</label>
									<select class="form-control" name="distrito" data-required="true">
									<?php
										foreach($distritos as $d){
										?>
										<option value="<?php echo $d["dis_id"]?>"><?php echo $d["dis_name"];?></option>
										<?php
										}
									?>
									</select>
								  </div>
								  <div class="form-group">
									<label class="control-label">Precio</label>
									<input class="form-control" name="precio" type="text" placeholder="Precio" data-required="true">
								  </div>
								  <input type="hidden" id="acc" name="acc" value="1">
								  <button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registar</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-6">
						<table class="table table-hover table-bordered" id="sampleTable">
						  <thead>
							<tr>
							  <th>De</th>
							  <th>Horario</th>
							  <th>Estado</th>
							  <th></th>
							</tr>
						  </thead>
						  <tbody>
						  <?php
							$n=1;
							foreach($listprecio as $p){
							?>
							<tr>
							  <td><?php echo $n?></td>
							  <td><?php echo $p["dis_name"]?></td>
							  <td><?php echo $p["precio"]?></td>
							  <td><a href="?accion=precios&id=<?php echo $p["id"]?>" class="btn btn-primary2 btn-min"><i class="fa fa-eye"></i></a>
								<a href="#" data-id="<?php echo $p["id"]?>" class="btn btn-danger btn-min btn-eliminar-precio"><i class="fa fa-close"></i></a></td>
							</tr>
							<?php
							$n = $n +1;
							}
						  ?>
						  </tbody>
						</table>
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
	<script type="text/javascript" src="<?php echo Conectar::ruta();?>template/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo Conectar::ruta();?>template/js/plugins/dataTables.bootstrap.min.js"></script>
	<!-- parsley -->
	<script src="<?php echo Conectar::ruta();?>template/js/parsley/parsley.min.js"></script>
	<script src="<?php echo Conectar::ruta();?>template/js/parsley/parsley.extend.js"></script>
	<script src="<?php echo Conectar::ruta();?>template/js/plugins/bootstrap-notify.min.js"></script>
	<script src="<?php echo Conectar::ruta();?>template/js/newprecio.js"></script>
	<script type="text/javascript">$('#sampleTable').DataTable();</script>
  </body>
</html>