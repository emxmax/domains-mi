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
              <li class="active"><a href="#">Lista de pedidos</a></li>
            </ul>
          </div>
		  <div>
			<a href="excel/allpedidos.php" target="_blank" class="btn btn-success"><i class="fa fa-file-excel-o"></i> DESCARGAR</a>
		  </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Producto</th>
                      <th>Comprador</th>
                      <th>Distrito</th>
                      <th>Fecha E.</th>
                      <th>Estado</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php
					foreach($pedidos as $p){
					?>
                    <tr>
                      <td><?php echo $p["pe_fecha"]?></td>
                      <td><?php echo utf8_encode ($p["pro_name"])?></td>
                      <td><?php echo $p["user_name"]?></td>
                      <td><?php echo $p["dis_name"]?></td>
                      <td><?php echo $p["pe_fecha_pe"]." ".$p["pe_horario"]?></td>
                      <td><?php echo $p["estado"]?></td>
					  <td><a href="?accion=pedidos&id=<?php echo $p["pe_id"]?>" class="btn btn-primary2 btn-min"><i class="fa fa-eye"></i></a></td>
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
	
	
    <!-- Javascripts-->
    <?php require_once("menu/footerjs.php");?>
	<script type="text/javascript" src="<?php echo Conectar::ruta();?>template/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo Conectar::ruta();?>template/js/plugins/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">$('#sampleTable').DataTable();</script>
  </body>
</html>