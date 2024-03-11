    <div class="container-fluid" id="menorca-sesion">
      <div class="row">
        <div class="container text-right">
          <?php 
            if(isset($_SESSION['user2'])){
              echo "Bienvenido(a): " . ucwords(strtolower($_SESSION['nombre'])) . "&nbsp;&nbsp; | &nbsp;&nbsp;<a href='" . $url . "logout.php'>Cerrar Sesión</a>";
            }else{
              header("Location:" . $url . "logout.php");
          }?>
        </div>
		<div class="container text-right">
          <a data-toggle="modal" data-target="#cambioPass" style="font-size:12px;">Cambiar Contraseña</a>
        </div>
      </div>
    </div>
    <header class="container-fluid">
      <div class="row">
        <div class="col-lg-2 col-lg-offset-5 col-md-2 col-md-offset-5 col-sm-12 hidden-xs">
          <img class="logo" src="img/logo_empresa.png"  style="position:absolute;top:-20px;width: 100%;"/>
        </div>
      </div>
    </header>
    <div class="container-fluid" id="menorca-slider">
      <div class="row">
        <img src="img/banner_home2.jpg" alt="">
      </div>
    </div>
	<!-- Modal -->
	<div class="modal fade bs-example-modal-sm" id="cambioPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  		<div class="modal-dialog modal-sm" role="document">
   			<div class="modal-content menorca-login-sesion">
      			<div class="modal-header text-center" style="padding-top: 0px !important; padding-right: 0px !important; padding-left: 0px !important;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute !important;
    right: 20px !important;
    top: 10px !important;"><span style="color:white;" aria-hidden="true">&times;</span></button>
              <img src="img/login_m.png" width="100%;">
            </div>
            <div class="modal-body">
              <div>
                  <div class="form-group">
                    <label class="control-label ">Contraseña Actual:</label>
                    <input type="text" class="form-control" id="passuseractual"/>
              <input type="hidden" class="form-control" id="iduser" value="<?php echo $_SESSION['iduser'];?>"/>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Contraseña Nueva:</label>
                    <input type="text" class="form-control" id="passusernueva"/>
                  </div>
              </div>
            </div>
            <div class="modal-footer" style="text-align:center !important;">
              <button type="button" class="btn btn-success" id="btn-change">CAMBIAR</button>
            </div>
            <div id="result"></div>
        </div>
      </div>
  </div>