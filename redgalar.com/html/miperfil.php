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
  $user_apellido = mysql_result($rsUsuario,0,"user_apellido");
  $user_provider = mysql_result($rsUsuario,0,"user_provider");
  $user_email = mysql_result($rsUsuario,0,"user_email");
  $user_pass = mysql_result($rsUsuario,0,"user_pass");
  $user_celular = mysql_result($rsUsuario,0,"user_celular");
  $user_foto = mysql_result($rsUsuario,0,"user_foto");

  $user_tlfijo= mysql_result($rsUsuario,0,"user_tlfijo");
  $user_direccion=mysql_result($rsUsuario,0,"user_direccion");
  $user_direccion1=mysql_result($rsUsuario,0,'user_direccion1');
  $user_direccion2=mysql_result($rsUsuario,0, 'user_direccion2');
  $user_referencia=mysql_result($rsUsuario,0,"user_referencia");
  $user_fnacimiento=mysql_result($rsUsuario,0,"user_fnacimiento");

  $sqlPedidoPro = "SELECT pe.pe_fecha, pro.* FROM pedido pe INNER JOIN producto pro ON pe.pro_id=pro.pro_id WHERE pe.user_id='$user_id'";
  $rsPedidoPro = mysql_query($sqlPedidoPro);
  //$nPedidoPro = mysql_num_rows($rsPedidoPro);
  
  $sql ="SELECT *
  FROM
  detalle_pedido
  WHERE
  id_user = $user_id";
  $pedidos = mysql_query($sql);
  $nPedidoPro = mysql_num_rows($pedidos);
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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body>

  <?php include "header.php";?>

  <div class="container-fluid cabecera-breadcrumbs">
    <div class="container">
      <div class="row">
        <h2>Mi Perﬁl</h2>
      </div>
    </div>
  </div>

    <div class="container-fluid" id="registrar">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-4 text-center">
              
			<form role="form" id="add_foto_user" method="POST" enctype="multipart/form-data">
                <?php if(empty($user_foto)){
					?>
					<img src="./img/user-foto.png" id="img_perfil" alt="Mi foto" width="250">
					<?php
				}
				else{
					?>
					<img src="./fotos/<?php echo $user_foto;?>" id="img_perfil" alt="Mi foto" width="250">
					<?php
				}
				?>
        <div class="contenido">
          <i class="fa fa-pencil fa-2x" aria-hidden="true" id="estilo-foto">
            <input type="file" name="fperfil" id="fperfil">
            <span class="texto-imagen"> Cambiar Imagen</span>
          </i>
        </div>


				<input type="hidden" name="id_usuario" value="<?php echo $user_id?>">
				<div class="infoimg"></div>
			</form>
            </div>
            <div class="col-md-8 text-center">
              
              <form id="actualizar_user">
                <input type="hidden" name="id_usuario" value="<?php echo $user_id?>">
                <div class="form form-registrar">
                  <h3>Mis datos</h3>
                  <div class="col-md-10">
                    <label>Nombres: </label>
                    <input type="text" placeholder="Nombres" id="nnombres" name="nnombres" value="<?php echo $user_name; ?>">
                  </div>
                  <div class="col-md-10">
                    <label>Apellidos: </label>
                    <input type="text" placeholder="Apellidos" id="napellidos" name="napellidos" value="<?php echo $user_apellido; ?>">
                  </div>
                  <div class="col-md-10">
                    <label>Celular: </label>
                    <input type="text" placeholder="Celular" id="ncelular" name="ncelular" value="<?php echo $user_celular; ?>">
                  </div>
                  <div class="col-md-10">
                    <label>Teléfono: </label>
                    <input type="text" placeholder="Teléfono fijo" id="nfijo" name="nfijo" value="<?php echo $user_tlfijo;?>">
                  </div>
                  <div class="col-md-10">
                    <label>E-mail: </label>
                    <input type="text" placeholder="E-mail" id="nemail" name="nemail" value="<?php echo $user_email; ?>">
                  </div>
                  <div class="col-md-10">
                    <label>Dirección: </label>
                    <input type="text" placeholder="Dirección" id="ndireccion" name="ndireccion" value="<?php echo $user_direccion;?>">
                  </div>
                  <!-- 28-10-17 -->
                  <div class="col-md-10">
                    <label>Dirección entrega 1: </label>
                    <input type="text" placeholder="Dirección de entrega 1" id="ndireccion1" name="ndireccion1" value="<?php echo $user_direccion1;?>">
                  </div>
                  <div class="col-md-10">
                    <label>Dirección entrega 2: </label>
                    <input type="text" placeholder="Dirección de entrega 2" id="ndireccion2" name="ndireccion2" value="<?php echo $user_direccion2;?>">
                  </div>
                  <!--  -->

                  <div class="col-md-10">
                    <label>Referencia: </label>
                    <input type="text" placeholder="Referencia" id="nreferencia" name="nreferencia" value="<?php echo $user_referencia;?>">
                  </div>
                  <div class="col-md-10">
                    <?php 
                        if ($user_fnacimiento!='0000-00-00') {
                          $originalDate = $user_fnacimiento;
                          $user_fnacimiento = date("d/m/Y", strtotime($originalDate));
                        }else{
                          $user_fnacimiento = '';
                        }
                    ?>
                    <label>Fecha Nacimiento: </label>
                    <input type="text" class="form-control datepicker fecha" placeholder="Fecha Nacimiento" id="ncumpleanos" name="ncumpleanos" value="<?php echo $user_fnacimiento?>">
                  </div>
                  <div class="text-center">
                    <!-- <button id="btn-actualizar" name="btn_actualizar">Actualizar</button> -->
                    <button type="submit" id="btn-actualizar" name="btn_actualizar">Actualizar</button>
                  </div>
                  <div id="alerta"></div>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php  include "footer.php" ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script><!-- carrusel desplegar animaciones incluida fecha -->
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
    $( function() {

     $.datepicker.regional['es'] = {
     closeText: 'Cerrar',
     prevText: '< Ant',
     nextText: 'Sig >',
     currentText: 'Hoy',
     monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
     dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
     weekHeader: 'Sm',
     dateFormat: 'dd/mm/yy',
     firstDay: 1,
     isRTL: false,
     showMonthAfterYear: false,
     yearSuffix: ''
     };
     $.datepicker.setDefaults($.datepicker.regional['es']);

    // var RangeDates = ["5/21/2017", "5/28/2017"];
    // var RangeDatesIsDisable = true;
    // function DisableDays(date) {
        // var isd = RangeDatesIsDisable;
        // var rd = RangeDates;
        // var m = date.getMonth();
        // var d = date.getDate();
        // var y = date.getFullYear();
        // for (i = 0; i < rd.length; i++) {
            // var ds = rd[i].split(',');
            // var di, df;
            // var m1, d1, y1, m2, d2, y2;

            // if (ds.length == 1) {
                // di = ds[0].split('/');
                // m1 = parseInt(di[0]);
                // d1 = parseInt(di[1]);
                // y1 = parseInt(di[2]);
                // if (y1 == y && m1 == (m + 1) && d1 == d) return [!isd];
            // } else if (ds.length > 1) {
                // di = ds[0].split('/');
                // df = ds[1].split('/');
                // m1 = parseInt(di[0]);
                // d1 = parseInt(di[1]);
                // y1 = parseInt(di[2]);
                // m2 = parseInt(df[0]);
                // d2 = parseInt(df[1]);
                // y2 = parseInt(df[2]);

                // if (y1 >= y || y <= y2) {
                    // if ((m + 1) >= m1 && (m + 1) <= m2) {
                        // if (m1 == m2) {
                            // if (d >= d1 && d <= d2) return [!isd];
                        // } else if (m1 == (m + 1)) {
                            // if (d >= d1) return [!isd];
                        // } else if (m2 == (m + 1)) {
                            // if (d <= d2) return [!isd];
                        // } else return [!isd];
                    // }
                // }
            // }
        // }
        // return [isd];
    // }
      $( ".datepicker" ).datepicker({
        //minDate: "+1d",
        //beforeShowDay: DisableDays
      });
    } );
  </script>


  <script>
   //carga de foto
   function mostrarImagen(input) {
       if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
         $('#img_perfil').attr('src', e.target.result);
			var formData = new FormData($("#add_foto_user")[0]);
			$.ajax({
			  data: formData,
			  url:'tem_actualizar.php',
			  type:'POST',
			  cache: false,
			  contentType: false,
			  processData: false,
			  beforeSend: function(){
				$(".infoimg").html("<span class='btn btn-s-md btn-info'>Procesando ...</span>");
				//$("#alerta_carrito").css("display","block");
				//$("#alerta_carrito").html('<div><img src="https://www.redgalar.com/img/chat.jpg" alt=""><p><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i> Procesando producto</p></div>');
			  },
			  success:  function (response) {
				var res = response;
				console.log(res);
				if(res == 'exito'){
					$(".infoimg").html("<span class='btn btn-s-md btn-info'>Exito: imagen subida</span>");
					setTimeout("window.location = window.location;",1500);
				}
				else{
					$("#alerta_carrito div").html('<img src="https://www.redgalar.com/img/chat.jpg" alt=""><div class="alert-danger">Error: producto no agregado al carro de compras</div>');
				}
			  }
			});
        }
        reader.readAsDataURL(input.files[0]);
       }
      }
       
      $("#fperfil").change(function(){
       mostrarImagen(this);
      });
	  
    //aqui vamos a Actualizar los datos
    $("#btn-actualizar").click(function(e){
      e.preventDefault();
      //alert("Hola");
        $.ajax({
          data: $("#actualizar_user").serialize(),
          url:'tem_actualizar2.php',
          type:'POST',
          beforeSend: function(){
          },
          success:  function (response) {
            var res = response;
            console.log(res);
            if (response == 'exito') {
                $("#alerta").html('<p style="background: #bff199;color: #65ab00;margin-top: 15px;padding-top: 5px;padding-bottom: 5px;">Se actualizaron los datos con éxito</p>');
				setTimeout(function(){
					window.location = window.location;
				},1500);
            }
            else{
              $("#alerta").html('<p style="background: #ffd3d1;color: #e70800;margin-top: 15px;padding-top: 5px;padding-bottom: 5px;">Error: No se actualizaron los datos</p>');
            }
          }
        });
    });	
	// $(window).on("click","#add_foto_user",function(e){
		// e.preventDefault();		
	// });
  </script>
</body>
</html>