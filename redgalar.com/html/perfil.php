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
  $user_id = mysql_result($rsUsuario,0,"user_id");
  
  $user_name = mysql_result($rsUsuario,0,"user_name");
  $user_provider = mysql_result($rsUsuario,0,"user_provider");
  $user_email = mysql_result($rsUsuario,0,"user_email");
  $user_pass = mysql_result($rsUsuario,0,"user_pass");
  $user_celular = mysql_result($rsUsuario,0,"user_celular");
  $user_foto = mysql_result($rsUsuario,0,"user_foto");

  $sqlPedidoPro = "SELECT pe.pe_fecha, pro.* FROM pedido pe INNER JOIN producto pro ON pe.pro_id=pro.pro_id WHERE pe.user_id='$user_id'";
  $rsPedidoPro = mysql_query($sqlPedidoPro);
  // $nPedidoPro = mysql_num_rows($rsPedidoPro);
  
  $sql ="SELECT *
	FROM
	detalle_pedido
	WHERE
	id_user = $user_id
  ORDER BY pe_fecha DESC";
	$pedidos = mysql_query($sql);
	$nPedidoPro = mysql_num_rows($pedidos);


  $sql ="SELECT *,
  admin.user_name as empresa
  FROM
  carrito
  INNER JOIN admin ON carrito.id_empresa = admin.user_id
  WHERE
  carrito.user_id = $user_id
  GROUP BY
  carrito.id_empresa";
  $empresas = mysql_query($sql);



  $sql1 ="SELECT *
  FROM
  lista_deseo as ld
  INNER JOIN usuario as u 
  ON u.user_id = ld.user_id
  WHERE 
  ld.user_id = $user_id and ld.lista_estado='pu'";

  $sql2 ="SELECT *
  FROM
  lista_deseo as ld
  INNER JOIN usuario as u 
  ON u.user_id = ld.user_id
  WHERE 
  ld.user_id = $user_id and ld.lista_estado='pr'";

  $lista_deseos_pu = mysql_query($sql1);
  $lista_deseos_pu_n = mysql_num_rows($lista_deseos_pu);
  
  $lista_deseos_pr = mysql_query($sql2);
  $lista_deseos_pr_n = mysql_num_rows($lista_deseos_pr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com | Mi Perﬁl</title>
  <link href="<?php echo $url; ?>img/ico.png" rel="shortcut icon">
  <link href="<?php echo $url; ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $url; ?>css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body>

  <?php include "header.php";?>

  <div class="container-fluid cabecera-breadcrumbs">
    <div class="container">
      <div class="row">
        <h2>Perﬁl</h2>
      </div>
    </div>  
  </div>
  <div class="container-fluid" id="perfil">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-5">
          <div class="cuadro historial">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <?php 
				if($user_provider=="facebook"){ 
				 $iimg = $user_foto;
				}
				else{$iimg = $url."fotos/".$user_foto;}
				?>
                <?
					if($iimg){
						?>
						<img src="<?php echo $iimg; ?>" alt="">
						<?php
						}
					else{
						?>
						<img src="<?php echo $url; ?>img/user-foto.png" alt="">
						<?php
					}
                ?>
                <a href="" class="link"> </a>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <h4><?php echo $user_name; ?></h4>
                <h5><b>Telefono: </b><?php echo $user_celular;?></h5>
                <h5><b>Email: </b><?php echo $user_email;?></h5>
                <a href="" class="link"> </a>
                <br>
                <a href="https://www.redgalar.com/miperfil">Actualizar datos</a>
              </div>
              <div class="col-lg-12">
              <!--
                <ul>
                  <li><a href="">Pedidos <b>(<?php echo $nPedidoPro; ?>)</b></a></li>
                </ul>
              -->
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-lg-3 col-sm-4">
          <h2>Mis pedidos (<?php echo $nPedidoPro; ?>)</h2>
          <div class="row panel-pedidos">
			<?php
			while ($pedido = mysql_fetch_array($pedidos)){?>
				<div class="col-lg-12" id="pedido-perfil">
          <a href="" style="color: red;" class="btn-eliminar btn-delete-item text-right" data-id="<?php echo $pedido["pe_codigo"]?>">X</a>
				  <a href="verpedido.php?cod=<?php echo $pedido['pe_codigo']?>" class="contenido-pedido">
  					<h5>Pedido: <?php echo $pedido['pe_codigo']; ?></h5>
  					<div><i class="fa fa-calendar"></i> <?php echo $pedido['pe_fecha']; ?></div>
  					<span><i class="fa fa-credit-card"></i> S/. <?php echo $pedido['total']; ?></span>
            <?php if ($pedido['estado']=='T') {
              echo "<span style='color: red;display: block;'>Pedido pendiente</span>";}?>
  				</a>
				</div>
				<?php
			}
			?>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-3 col-sm-4 hidden-lg">
          <h2>Vistos recientemente</h2>
          <div class="row">
              <div class="col-lg-12"> <!-- <div class="col-lg-6">-->
                <div class="mas-comprados-producto">
                  <img src="<?php echo $url; ?>img/LMC1.jpg"/>
                  <h5>Cubeta Detallazo</h5>  
                  <span>s/ 100</span>  
                </div>
              </div>
          </div>
        </div>

        <div class="col-lg-4">
          <h2 class="text-center titulo-deseos">Lista de deseos</h2>
          <div class="row">
            <div class="col-lg-6 col-sm-4" style="border: 1px solid block;">
              <h3 class="text-center subtitulo_lista">Pública</h3>
              <div class="row">
                <?php
                  for($i=0;$i<$lista_deseos_pu_n;$i++){
                    $pro_id = mysql_result($lista_deseos_pu,$i,"pro_id");
                    $sql3 = "SELECT * FROM producto WHERE producto.pro_id = $pro_id";
                    $pr = mysql_query($sql3);

                    $sqlProductoUrl = "SELECT pro_url FROM producto WHERE pro_id = $pro_id";
                    $rsProductoUrl = mysql_query($sqlProductoUrl);
                    $pro_url = mysql_result($rsProductoUrl,0,"pro_url"); 
                  ?>
                    <div class="col-lg-6">
                      <a href="https://www.redgalar.com/productos/<?php echo $pro_url;?>" class="mas-comprados-producto">
                        <img src="img/<?php echo utf8_encode(mysql_result($pr,0,"pro_img"));?>" alt="" class="mi_lista_img">
                        <h5 class="mi_lista_titulo"><?php echo substr(utf8_encode(mysql_result($pr,0,"pro_name")),0,14) . "...";?></h5>
                        <span class="mi_lista_precio">s/ <?php echo utf8_encode(mysql_result($pr,0,"pro_precio_o"));?></span>
                      </a> 
                    </div>
                <?php
                  }
                ?>
              </div>
            </div>
            <div class="col-lg-6 col-sm-4" style="border: 1px solid block;">
              <h3 class="text-center subtitulo_lista">Privada</h3>
              <div class="row">
                <?php
                  for($i=0; $i<$lista_deseos_pr_n; $i++){
                    $pro_id = mysql_result($lista_deseos_pr,$i,"pro_id");
                    $sql4 = "SELECT * FROM producto WHERE producto.pro_id = $pro_id";
                    $pr = mysql_query($sql4);

                    $sqlProductoUrl = "SELECT pro_url FROM producto WHERE pro_id = '$pro_id'";
                    $rsProductoUrl = mysql_query($sqlProductoUrl);
                    $pro_url = mysql_result($rsProductoUrl, 0,"pro_url");
                ?>
                    <div class="col-lg-6">
                      <a href="https://www.redgalar.com/productos/<?php echo $pro_url;?>" class="mas-comprados-producto">
                        <img src="img/<?php echo utf8_encode(mysql_result($pr,0,"pro_img"));?>" alt="" class="mi_lista_img">
                        <h5 class="mi_lista_titulo"><?php echo substr(utf8_encode(mysql_result($pr,0,"pro_name")), 0,14) . "...";?></h5>
                        <span class="mi_lista_precio">s/ <?php echo utf8_encode(mysql_result($pr,0,"pro_precio_o"));?></span>
                      </a>
                    </div>
                <?php
                  }
                ?>
              </div>
            </div>
          </div>
        </div><!-- Aqui termina la lista de deseos-->
        <div class="col-lg-4 col-sm-4">
          <h2 class="text-center">Recomendados</h2>
          <!-- <div class="row"> -->
      <?php
        $sql ="SELECT *
        FROM
        producto
        WHERE
        pro_destacado = 1";
        $destacados = mysql_query($sql);
        while ($fila = mysql_fetch_array($destacados)){
          ?>
          <div class="col-lg-6">
            <a class="mas-comprados-producto" href="./productos/<?php echo $fila['pro_url'];?>">
              <img src="<?php echo $url; ?>img/<?php echo $fila['pro_img'];?>">
              <h5><?php echo utf8_encode($fila['pro_name']);?></h5>
              <span>s/ <?php echo $fila['pro_precio_o'];?></span>
            </a>
          </div>
          <?php
        }
      ?>
          </div>
        </div>
        <!-- </div> final del row         -->
      </div>
    </div>
  </div>

  <?php  include "footer.php" ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
  $(document).ready(function() {
      $('#btn-category').click(function(){
        var estado = $('header ol').css('display');
        if(estado=='none'){
          $('header ol').css('display','table');
        }else{
          $('header ol').css('display','none');
        }        
      });
  });
  </script>
  <script>
      $(".btn-delete-item").click(function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        console.log(id);
        var data = {"id": id, "acc": 'delete_pedido'} //pe_codigo
        var mensaje = confirm("Desea eliminar el producto");
        if (mensaje) {
          $.ajax({
            data: data,
            url:'tem_envio.php',
            type:'POST',
            beforeSend: function(){
              $("#alerta_carrito").css("display","block");
              $("#alerta_carrito").html('<div><img src="https://www.redgalar.com/img/chat.jpg" alt=""><p><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i> Eliminando producto</p></div>');
            },
            success:  function (response) {
              var res = response;
              if(res == "exito"){
                $("#alerta_carrito div").html('<img src="https://www.redgalar.com/img/chat.jpg" alt=""><div class="alert-success">Éxíto: producto eliminado del carro de compras</div>');
                  setTimeout("window.location= window.location", 800);
              }
              else{
                $("#alerta_carrito div").html('<img src="https://www.redgalar.com/img/chat.jpg" alt=""><div class="alert-danger">Error: producto no eliminado del carro de compras</div>');
                console.log(res);
              }
            }
          });
        }
      });
  </script>
</body>
</html>