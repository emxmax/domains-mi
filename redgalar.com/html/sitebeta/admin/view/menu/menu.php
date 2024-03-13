<?php
	$full_name = $_SERVER['REQUEST_URI'];
	$name_array = explode( '=', $full_name );

	$name_array1 = explode( '&', $name_array[1]);

	if($name_array1[0]){
	  $page_name = $name_array1[0];
	}
	else{
	  $count = count( $name_array );
	  $page_name = $name_array[$count-1];
	}
?>
<header class="main-header hidden-print">
	<a class="logo" href="?accion=index"><img src="<?php echo Conectar::ruta();?>template/images/logo-blanco.png" alt="logo"></a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
		  <a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!-- User Menu-->
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="?accion=perfil"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
                  <li><a href="?accion=salir"><i class="fa fa-sign-out fa-lg"></i> Salir</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
			<?php
			if($_SESSION["ses_avatar"] != ""){
			?>
				<img class="img-circle" src="upload/user/<?php echo $_SESSION["ses_avatar"]?>" alt="<?php echo $_SESSION["ses_avatar"]?>">
			<?php
			}
			else{
			?>
				<img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="Avatar">
			<?php
			}
			?>
			</div>
            <div class="pull-left info">
              <p><?php echo $_SESSION["ses_nombre"]?></p>
              <p class="designation"><?php echo $_SESSION["ses_perfil"]?></p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="<?php echo ($page_name=='index')?'active':'';?>"><a href="?accion=index"><i class="fa fa-dashboard"></i><span>Escritorio</span></a></li>
            <?php
			if($_SESSION["ses_perfil"]=="Administrador"){
			?>
			<li class="<?php echo ($page_name=='pedidos')?'active':'';?> <?php echo ($page_name=='allpedidos')?'active':'';?> treeview">
				<a href="?accion=pedidos"><i class="fa fa-shopping-bag"></i><span>Pedidos</span><i class="fa fa-angle-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="?accion=pedidos"><i class="fa fa-circle-o"></i> Pedidos</a></li>
					<li><a href="?accion=allpedidos"><i class="fa fa-circle-o"></i> All Pedidos</a></li>
				</ul>
			</li>
            <li class="<?php echo ($page_name=='newusuario')?'active':'';?> <?php echo ($page_name=='usuarios')?'active':'';?> treeview">
				<a href="#"><i class="fa fa-user"></i><span>Usuarios</span><i class="fa fa-angle-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="?accion=usuarios"><i class="fa fa-circle-o"></i> Usuarios</a></li>
					<li class="<?php echo ($page_name=='newusuario')?'active':'';?>"><a href="?accion=newusuario"><i class="fa fa-circle-o"></i> Nuevo Usuario</a></li>
				</ul>
            </li>
			<li class="<?php echo ($page_name=='newproducto')?'active':'';?> <?php echo ($page_name=='productos')?'active':'';?> treeview">
				<a href="#"><i class="fa fa-ship"></i><span>Productos</span><i class="fa fa-angle-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="?accion=productos"><i class="fa fa-circle-o"></i> Productos</a></li>
					<li><a href="?accion=newproducto"><i class="fa fa-circle-o"></i> Nuevo Producto</a></li>
				</ul>
            </li>
			<?php
			}
			else{
			?>
			<li class="<?php echo ($page_name=='pedidos')?'active':'';?> <?php echo ($page_name=='allpedidos')?'active':'';?> treeview">
				<a href="?accion=pedidos"><i class="fa fa-shopping-bag"></i><span>Pedidos</span><i class="fa fa-angle-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="?accion=pedidos"><i class="fa fa-circle-o"></i> Pedidos</a></li>
					<li><a href="?accion=allpedidos"><i class="fa fa-circle-o"></i> All Pedidos</a></li>
				</ul>
			</li>
			
			<li class="<?php echo ($page_name=='newproducto')?'active':'';?> <?php echo ($page_name=='productos')?'active':'';?> treeview">
				<a href="#"><i class="fa fa-ship"></i><span>Productos</span><i class="fa fa-angle-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="?accion=productos"><i class="fa fa-circle-o"></i> Productos</a></li>
					<li><a href="?accion=newproducto"><i class="fa fa-circle-o"></i> Nuevo Producto</a></li>
				</ul>
            </li>
			
			<li class="<?php echo ($page_name=='newprecios')?'active':'';?> <?php echo ($page_name=='precios')?'active':'';?> treeview">
				<a href="#"><i class="fa fa-ship"></i><span>Precios x distrito</span><i class="fa fa-angle-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="?accion=precios"><i class="fa fa-circle-o"></i> Precios x distrito</a></li>
				</ul>
            </li>
			<?php
			}
			?>
			
			
          </ul>
        </section>
      </aside>