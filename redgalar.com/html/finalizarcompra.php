<?php 
  ob_start("ob_gzhandler");
  session_start();

  include("util/query.php");
  include("util/url.php");

  if(!isset($_SESSION['email'])){
    header("Location:" . $url . "logout.php");
  }
	$user_email=$_SESSION['email'];

    $sqlUsuario = "SELECT * FROM usuario WHERE user_email='$user_email'";
    $rsUsuario = mysql_query($sqlUsuario);
	$cn = mysql_result($rsUsuario,0,"user_name");
	$eee = mysql_result($rsUsuario,0,"user_email");
	
    $user_id = mysql_result($rsUsuario,0,"user_id");
	//obetenemos el codigo de compra
	$getCod = $_GET["cod"];
	$sql ="SELECT *,
	admin.user_name as empresa
	FROM
	pedido
	INNER JOIN admin ON pedido.id_empresa = admin.user_id
	WHERE
	pedido.id_codigo = '".$getCod."'
	GROUP BY
	pedido.id_empresa";
	$empresas = mysql_query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com | Finalizar Compra</title>
  <link href="<?php echo $url; ?>img/ico.png" rel="shortcut icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="<?php echo $url; ?>css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>css/jquery.bxslider.css">
  <link type="text/css" rel="stylesheet" href="<?php echo $url; ?>css/responsive-tabs.css" />
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApzy0CShzBoU83-HLZs9mJa8GbeqlpmDU"></script>
  <script src="https://checkout.culqi.com/v2"></script>
</head>
<body>

  <?php include "header.php";?>

  <div class="container-fluid cabecera-breadcrumbs">
    <div class="container">
      <div class="row">
        <ol>
          <!-- <li><a href="#">Inicio</a></li>
          <li><a href="#">Registro</a></li> -->
          <li class="active">Finalizar Compra</li>
        </ol>
        <h2>Carrito</h2>
      </div>
    </div>  
  </div>
  <div class="container-fluid" id="carrito">
		<div id="x" data-x="<?php echo $pe_lat; ?>"></div>
		<div id="y" data-y="<?php echo $pe_lng; ?>"></div>

		<input type="hidden" id="user_id" value="<?php echo $user_id; ?>">
		<input type="hidden" id="pro_id" value="<?php echo $pro_id; ?>">
		<input type="hidden" id="pe_id" value="<?php echo $pe_id; ?>">
		<input type="hidden" id="codigo_pedido" value="<?php echo $getCod; ?>">
		<input type="hidden" id="user_email" value="<?php echo $user_email; ?>">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">	<!-- PEDIDO-->
            <h3>Pedido: <?php echo $getCod;?></h3>
          <div class="row">
          </div>
          <div class="list-carrito">
			<?php
			$nn = 0;
			$subtotal = 0;
			$cant = 0;
			while ($fila = mysql_fetch_array($empresas)) {
			if($nn > 0){echo "<br>";}
			?>
			<div class="row box-items-prod box-compra-lista">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<h4>Proveedor: <span><?php echo $fila["empresa"];?></span></h4>
				</div>
				<div class="col-lg-5 col-md-5 col-sm-5">
			<?php
			//consultamos los productos conforme a la empresa y el usuario
				$sql ="SELECT
				pedido.user_id,
				pedido.pro_id,
				pedido.id_empresa,
				pedido.pe_cant,
				pedido.pe_subtotal,
				pedido.pe_p_adicional,
				pedido.id_codigo,
				producto.pro_name,
				producto.pro_img
				FROM
				pedido
				INNER JOIN producto ON pedido.pro_id = producto.pro_id
				WHERE
				pedido.id_codigo = '".$getCod."' AND
				pedido.id_empresa = ".$fila["id_empresa"];
				$productos = mysql_query($sql);
				while ($list = mysql_fetch_array($productos)) {
					?>
						<div class="row pedido-carrito">
						  <div class="col-lg-4 col-md-4 col-sm-4 text-center">
							<img src="img/<?php echo $list["pro_img"]?>" alt="<?php echo $list["pro_img"]?>">
						  </div>
						  <div class="col-lg-8 col-md-8 col-sm-8">
							<h4><?php echo utf8_encode($list["pro_name"])?></h4>
							<span>S/ <?php echo $list["pe_subtotal"]?>  | Cant: <?php echo $list["pe_cant"]?></span>
							<?php if($list["pe_p_adicional"] > 0){?>
							<h5>+ Adicional: S/ <?php echo number_format($list["pe_p_adicional"], 2, ',', ' ');?></h5>
							<?php }?>
						  </div>
						</div>
					  
					  
					<?php
				$cant = $cant + $list["pe_cant"];
				$subtotal = $subtotal + ($list["pe_cant"] * $list["pe_subtotal"]);
				}
				$nn=$nn+1;
				?>
				 </div>
				  <div class="col-lg-7 col-md-7 col-sm-7 box-frm-envio">
					<div class="row">
					  <div class="col-lg-12 col-md-12 col-sm-12">
						<h4>Datos de envio:</h4>
					  </div>
					  <div class="col-lg-6 col-md-6 col-sm-6">
						<?php
							//consultamos el dato de envio
							$sql2 = "SELECT
							pedido_envio.id_distrito,
							pedido_envio.direccion,
							pedido_envio.precio,
							pedido_envio.fecha,
							pedido_envio.hora,
							pedido_envio.id_emp,
							distrito.dis_name
							FROM
							pedido_envio
							INNER JOIN distrito ON pedido_envio.id_distrito = distrito.dis_id
							WHERE
							pedido_envio.id_emp = ".$fila["id_empresa"]." AND
							pedido_envio.pe_codigo = '".$getCod."'";
							$denv = mysql_query($sql2);
							$ee = mysql_fetch_array($denv);
							//print_r($ee);
						?>
							<p><strong>Distrito:</strong> <?php echo utf8_encode($ee["dis_name"]);?></p>
							<p><strong>Direccion:</strong> <?php echo utf8_encode($ee["direccion"]);?></p>
					  </div>
					  <div class="col-lg-6 col-md-6 col-sm-6">
							<p><strong>Fecha:</strong> <?php echo $ee["fecha"];?></p>
							<p><strong>Hora:</strong> <?php echo $ee["hora"];?></p>
					  </div>
					</div>
				  </div>
				</div>
				<?php
			}
			?>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12"><!-- COMPROBANTES -->

		  <?php
			//obetemos los precios
			$sqld = "SELECT *
			FROM
			detalle_pedido
			WHERE
			detalle_pedido.pe_codigo = '".$getCod."' and detalle_pedido.estado='T'";
			$dd = mysql_query($sqld);
			$pp = mysql_fetch_array($dd);
		  ?>
		  <div class="comprobante">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<h5>COMPROBANTE</h5>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
					<p><strong>Tipo:</strong> <?php echo $pp["pe_c_tipo"];?></p>
					<?php
						if($pp["pe_c_tipo"]=="boleta"){
						?>
						<p><strong>DNI:</strong> <?php echo $pp["pe_c_num"];?></p>
						<p><strong>Nombre:</strong> <?php echo $pp["pe_c_razon"];?></p>
						<?php
						}
						else{
						?>
						<p><strong>RUC:</strong> <?php echo $pp["pe_c_num"];?></p>
						<p><strong>Razon Social:</strong> <?php echo $pp["pe_c_razon"];?></p>
						<p><strong>Direccion:</strong> <?php echo $pp["pe_c_direccion"];?></p>
						<?php
						}
					?>
				</div>
			</div>
          </div>
          <div class="resumen">
            <ul>
              <li><h5>RESUMEN DE TU PEDIDO</h5></li>
              <li>
                <p>Subtotal (<?php echo $cant;?>)</p> <span>S/. <?php echo number_format($pp["subtotal"], 2, '.', ' ');?></span>
              </li>
              <li>
                <p>Envío</p> <span>S/. <?php echo $pp["pe_envio"];?></span>
              </li>
              <li>
                <p>Cupón</p> <span>-S/. <?php echo number_format($pp["cupon"], 2, '.', ' ');?></span>
              </li>
			  <li>
				<?php
					$igv = $pp["igv"];
				?>
                <p>IGV</p> <span>S/. <span id="igv"><?php echo number_format($igv, 2, '.', ' ');?></span></span>
              </li>
              <li>
                <p>TOTAL</p> <span>S/. <?php echo $pp["total"];?></span>
				<?php 
				$total = str_replace('.', '', $pp["total"]);
				?>
				<input type="hidden" id="total_pedido" value="<?php echo $total;?>">
              </li>
            </ul>
          </div>
        </div>
      </div>
	  <div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-center btn-fin-compra">
			<div class="form-group">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="checkbox">
						<label>
						<input type="checkbox" id="terminos">
						Acepto los <a href="./terminos.php" target="_blank">términos y condiciones</a>
						</label>
					</div>
				</div>
				<div class="col-md-5 col-sm-12 col-xs-12">
					<a class="boton-red" href="deposito.php?cod=<?php echo $_GET['cod']?>">Depósito Bancario</a>
					<button class="boton-red" id="miBoton">Pargar con Tarjeta</button>
				</div>
			</div>
			<div id="exito">Ocurrió algunos problemas con la tarjeta, inténtelo de nuevo.</div>
		</div>
	  </div>
	</div>
  </div>

  <!-- Modal -->
<!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialoga" role="document">
    <div class="modal-content">
      <div class="row">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="row">
      	<img src="img/deposito.png" alt="" style="width:100%;">
      </div>
    </div>
  </div>
</div>-->

<div id="alerta_carrito"></div>
  <?php  include "footer.php" ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".header-chat").click(function(){
		$(".box-mensaje-red").toggle();
	});
});
</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function() {

    $('#miBoton').on('click', function(e) {
      // Abre el formulario con las opciones de Culqi.configurar
      if($("#terminos").is(':checked')) {  
        Culqi.open();
      }else{
      	alert("Debe aceptar los términos y condiciones.");
      }
    });

  });
  </script>
  <script>  
    Culqi.publicKey = 'pk_live_grBETfIamgjuKkkU';

    var precio = $("#total_pedido").val(); 
    var nombre_producto =  $("#codigo_pedido").val();

    var user_id = $("#user_id").val();
    //var pro_id = $("#pro_id").val();
    var pe_id = $("#codigo_pedido").val();
	var user_email = $("#user_email").val();

    Culqi.settings({  
            title: 'Redgalar.com',
            currency: 'PEN',
            description: nombre_producto,
            amount: precio,
            guardar: true
    });
    // Recibimos Token del Culqi.js
    function culqi() {
		$("#alerta_carrito").css("display","block");
		$("#alerta_carrito").html('<div><img src="https://www.redgalar.com/img/chat.jpg" alt=""><p><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i> Procesando pedido</p></div>');
      if(Culqi.error){
        $("#alerta_carrito div").html('<img src="https://www.redgalar.com/img/chat.jpg" alt=""><div class="alert-danger">Error: Pedido no realizado</div>');
		setTimeout($("#alerta_carrito div").remove(), 200);
		setTimeout($("#alerta_carrito").hide(), 200);
		 // Mostramos JSON de objeto error en consola
         console.log(Culqi.error);

      }else{
         $.post("tarjeta.php", {token: Culqi.token.id, amount: precio, description: nombre_producto, email: Culqi.token.email, user_id: user_id, pe_id: pe_id,user_email: user_email}, function(data, status){
              if(data=="ok"){
				$("#alerta_carrito div").html('<img src="https://www.redgalar.com/img/chat.jpg" alt=""><div class="alert-success">Exíto: Pedido realizado exitosamente</div>');
              	window.location = 'gracias';
              }else{
                //$("#exito").show();
				$("#alerta_carrito div").html('<img src="https://www.redgalar.com/img/chat.jpg" alt=""><div class="alert-danger">Error: Error: Pedido no realizado</div>');
				setTimeout($("#alerta_carrito div").remove(), 2200);
				$("#alerta_carrito").hide();
              }
          });
      }

    };
  </script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

<!-- <script src="https://localhost/redgalar/js/jquery.responsiveTabs.js"></script>
<script>
  $(document).ready(function ($) {
    $('#responsiveTabsDemo').responsiveTabs({
      startCollapsed: 'accordion'
    });
  });
</script>-->

  <script>
  	 $('.slider-for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
		arrows: false,
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.slider-for',
	  dots: false,
	  centerMode: true,
	  focusOnSelect: true
	});
  </script>

	<script type="text/javascript">
	$(document).ready(function(){
		//nos desplazamos entre todos los divs
		$('a.ancla').click(function(e){
		e.preventDefault();
		enlace  = $(this).attr('href');
		$('html, body').animate({
			scrollTop: $(enlace).offset().top
		}, 900);
		});
	});
	</script>

</body>
</html>