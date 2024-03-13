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
              <li>Pedidos</li>
              <li class="active"><a href="#">Nuevos pedidos</a></li>
            </ul>
          </div>
		  <div>
		  <?php 
		  if($_SESSION["ses_perfil"]=="Administrador"){
		  ?>
			<a href="excel/pedidos.php" target="_blank" class="btn btn-success"><i class="fa fa-file-excel-o"></i> DESCARGAR</a>
		  <?php
		  }
		  else{
		  ?>
			<a href="excel/pedidosc.php" target="_blank" class="btn btn-success"><i class="fa fa-file-excel-o"></i> DESCARGAR</a>
		  <?php
		  }
		  ?>
		  </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Producto</th>
                      <th>Comprador</th>
                      <th>Distrito</th>
                      <th>Fecha E.</th>
                      <th>Estado</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php
					foreach($pedidos as $p){
					?>
                    <tr>
                      <td><?php echo $p["id_codigo"]?></td>
                      <td><?php echo utf8_encode ($p["pro_name"])?></td>
                      <td><?php echo $p["user_name"]?></td>
                      <td><?php echo utf8_encode ($p["dis_name"])?></td>
                      <td><?php echo $p["pe_fecha_pe"]." ".$p["pe_horario"]?></td>
                      <td><?php echo $p["estado"]?></td>
					  <td><a href="?accion=pedidos&id=<?php echo $p["pe_id"]?>" class="btn btn-primary2 btn-min"><i class="fa fa-eye"></i></a></td>
					  <td>
					  <?php if ($p["estado"]!="entregado"){
					  ?>
						<!--<a href="#" data-id="<?php echo $p["pe_id"]?>" class="btn btn-success btn-min btn-activar-pedido"><i class="fa fa-check"></i></a>-->
						<button data-estado="<?php echo $p["estado"]?>" data-id="<?php echo $p["pe_id"]?>" class="btn btn-success btn-min btn_get_estado" data-toggle="modal" data-target=".modalestado"><i class="fa fa-check"></i></button>
					  <?php
					  }?>
					  </td>
                    </tr>
					<?php
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
	
	<!-- Modal -->
	<div class="modalestado modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Actualizar Estado</h4>
		  </div>
		  <div class="modal-body" id="modalP">
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			<a href="#" id="estadoModal" class="btn btn-primary">Actualizar estado</a>
		  </div>
		</div>
	  </div>
	</div>
    <!-- Javascripts-->
    <?php require_once("menu/footerjs.php");?>
	<script type="text/javascript" src="<?php echo Conectar::ruta();?>template/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo Conectar::ruta();?>template/js/plugins/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo Conectar::ruta();?>template/js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript" src="<?php echo Conectar::ruta();?>template/js/pedidos.js"></script>
  </body>
</html>