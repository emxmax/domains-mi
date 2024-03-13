<?php require_once("menu/head.php");?>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <?php require_once("menu/menu.php");?>
	  <!-- End Navbar-->
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>Productos</h1>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Productos</li>
              <li class="active"><a href="#">Lista de Productos</a></li>
            </ul>
          </div>
		  <div>
			<span href="#" class="btn-danger text-inf"><i class="fa fa-close"></i> = Inactivar</span>
			<span href="#" class="btn-success text-inf "><i class="fa fa-check"></i> = Activar</span>
			<a class="btn btn-info btn-flat" href="?accion=newusuario"><i class="fa fa-plus"></i></a>
		  </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Precio</th>
                      <th>Precio Oferta</th>
                      <th>Estado</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php
					foreach($productos as $p){
					?>
                    <tr>
                      <td><?php echo $p["pro_codigo"]?></td>
                      <td><?php echo utf8_encode ($p["pro_name"])?></td>
                      <td><?php echo $p["pro_precio_n"]?></td>
                      <td><?php echo $p["pro_precio_o"]?></td>
                      <td><?php if($p["pro_estado"] == 1){
						echo "Activo";
					  }else{
						echo "Inactivo";
					  }?>
					  </td>
					  <td>
					  <a href="?accion=productos&id=<?php echo $p["pro_id"]?>"class="btn btn-primary2 btn-min"><i class="fa fa-edit"></i></a>
					  <?php if ($p["pro_estado"]== 1){
					  ?>
						<a href="#" data-id="<?php echo $p["pro_id"]?>" class="btn btn-danger btn-min btn-eliminar-user"><i class="fa fa-close"></i></a>
					  <?php
					  }else{
					   ?>
						<a href="#" data-id="<?php echo $p["pro_id"]?>" class="btn btn-success btn-min btn-activar-user"><i class="fa fa-check"></i></a>
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
    <!-- Javascripts-->
    <?php require_once("menu/footerjs.php");?>
	<script type="text/javascript" src="<?php echo Conectar::ruta();?>template/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo Conectar::ruta();?>template/js/plugins/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo Conectar::ruta();?>template/js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript" src="<?php echo Conectar::ruta();?>template/js/productos.js"></script>
  </body>
</html>