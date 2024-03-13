<?php require_once("menu/head.php");?>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <?php require_once("menu/menu.php");?>
	  <!-- End Navbar-->
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Escritorio</h1>
            <p>Bienvenido: <?php echo $_SESSION["ses_nombre"]?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-title">EN REGDALAR NOS ENCARGAMOS DE HACER FELICES A LAS PERSONAS QUE MÁS QUIERES</h3>
              <p>Somos Redgalar, un sitio de encuentro entre negocios y personas: nuestro fin es ofrecer los mejores productos y servicios para que nuestros clientes tengan una experiencia de compra única a través de la venta de regalos online ayudando a generar vínculos entre las personas que más quieres. </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <?php require_once("menu/footerjs.php");?>
  </body>
</html>