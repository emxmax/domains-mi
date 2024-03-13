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
	//eliminar el envio
	$sql2 = "delete  from temp_envio where idUser='".$user_id."'";
	mysql_query($sql2);
	
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
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com | Carrito de Compras</title>
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
        <ol>
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Registro</a></li>
          <li class="active">Carrito</li>
        </ol>
        <h2>Carrito</h2>
      </div>
    </div>  
  </div>
  <div class="container-fluid" id="carrito">
    <div class="container">
	<form role="form" id="add_comprar_pro" method="POST">
      <div class="row">
        <div class="col-lg-8">
            <h3>Carrito de Compras</h3>
          <div class="row">
          </div>
          <div class="list-carrito">
			<?php
			$nn = 0;
			$total = 0;
			$cant = 0;
			while ($fila = mysql_fetch_array($empresas)) {
			if($nn > 0){echo "<br>";}
			?>
			<div class="row box-items-prod">
				<div class="col-lg-12">
					<h4>Proveedor: <?php echo $fila["empresa"];?></h4>
				</div>
				<div class="col-lg-5">
			<?php
			//consultamos los productos conforme a la empresa y el usuario
				$sql ="SELECT
				carrito.id,
				carrito.user_id,
				carrito.pro_id,
				carrito.id_empresa,
				carrito.pe_cant,
				carrito.pe_subtotal,
				carrito.pe_p_adicional,
				carrito.estado,
				producto.pro_name,
				producto.pro_img
				FROM
				carrito
				INNER JOIN producto ON carrito.pro_id = producto.pro_id
				WHERE
				carrito.user_id = $user_id AND
				carrito.id_empresa = ".$fila["id_empresa"];
				$productos = mysql_query($sql);
				while ($list = mysql_fetch_array($productos)) {
					?>
						<div class="row pedido-carrito">
						  <div class="col-lg-4 text-center">
							<!--<img src="admin/upload/<?php echo $list["pro_img"]?>" alt="<?php echo $list["pro_img"]?>">-->
							<img src="img/<?php echo $list["pro_img"]?>" alt="<?php echo $list["pro_img"]?>">
						  </div>
						  <div class="col-lg-8">
							<h4><?php echo utf8_encode($list["pro_name"])?></h4>
							<span>S/ <?php echo $list["pe_subtotal"]?>  | Cant: <?php echo $list["pe_cant"]?></span>
							<?php if($list["pe_p_adicional"] > 0){?>
							<h5>+ Adicional: S/ <?php echo number_format($list["pe_p_adicional"], 2, ',', ' ');?></h5>
							<?php }?>
						  </div>
						  <a href="#" class="btn-eliminar btn-delete-item" data-id="<?php echo $list["id"]?>">X</a>
						</div>
					  
					  
					<?php
					$cant = $cant + $list["pe_cant"];
					$total = $total + ($list["pe_cant"] * $list["pe_subtotal"]);
					if($list["pe_p_adicional"] > 0){
						$total = $total + $list["pe_p_adicional"];
					}
				}
				$nn=$nn+1;
				//calculamos el igv
				$igv = $total * 0.18;
				$subtotal = $total - $igv;
				?>
				 </div>
				  <div class="col-lg-7 box-envio-<?php echo $nn?>">
					<div class="row">
					  <div class="col-lg-6 frm_mas_data">
						<input type="text" class="form-control datepicker" placeholder="*Fecha de envio" name="fecha" id="fecha<?php echo $nn?>" required>
					  </div>
					  <div class="col-sm-6 frm_mas_data">
						<select name="hora" id="hora<?php echo $nn?>" required class="form-control" required>
							<option value="">Seleccione el horario</option>
							<option value="08:00 - 11:00">08:00 - 11:00</option>
							<option value="11:00 - 14:00">11:00 - 14:00</option>
							<option value="14:00 - 17:00">14:00 - 17:00</option>
							<option value="17:00 - 20:00">17:00 - 20:00</option>
						</select>
					  </div>
					  <div class="col-lg-6 frm_mas_data">
					  <?php
					    $sql2 = "SELECT
						distrito.dis_name,
						precio_empresa.id_distrito,
						precio_empresa.precio,
						precio_empresa.id,
						precio_empresa.id_emp
						FROM
						precio_empresa
						INNER JOIN distrito ON precio_empresa.id_distrito = distrito.dis_id
						WHERE precio_empresa.id_emp = ".$fila["id_empresa"];
						$distrito = mysql_query($sql2);
					  ?>
						<select class="form-control distrito_val" id="distrito<?php echo $nn?>" name="distrito" required>
							<option value="" data-emp="<?php echo $fila["id_empresa"];?>">Distrito</option>
							<?php
							while ($dd = mysql_fetch_array($distrito)) {
							?>
							<option value="<?php echo $dd["precio"];?>" data-id="<?php echo $dd["id_distrito"]?>" data-emp="<?php echo $fila["id_empresa"];?>"><?php echo utf8_encode($dd["dis_name"]);?> - S/.<?php echo $dd["precio"];?></option>
							<?php
							}
							?>
						</select>
					  </div>
					  <div class="col-lg-6 frm_mas_data">
						<input type="email" class="form-control" id="mi_email<?php echo $nn?>"   placeholder="Mi email" required>
					  </div>
					  <div class="col-lg-12 frm_mas_data">
						<textarea class="form-control" id="direccion<?php echo $nn?>"  name="direccion" placeholder="Ingrese dirección" required></textarea>
					  </div>
					  <div class="col-lg-12 frm_mas_data">
						<textarea class="form-control" id="per_referencia<?php echo $nn?>"  placeholder="Referencia" ></textarea>
					  </div>
					  <?php
						if($nn > 1){
						echo '<div class="col-lg-6 frm_mas_data">
								<div class="checkbox">
								<label>
								<input type="checkbox" id="datadireccion'.$nn.'" name="datadireccion'.$nn.'" class="datadireccion" value="'.$nn.'"> Repetir datos de destino
								</label>
								</div>
							</div>
							<div class="col-lg-6 frm_mas_data">
								<a href="#" class="vermas vermas'.$nn.'" data-ver="bloque'.$nn.'">Ver más datos de destino</a>
							</div>
							<div class="bloque'.$nn.'" style="display:none;">';
						}
					  ?>
					  <div class="col-lg-12 frm_mas_data">
						<h4>Datos de destino</h4>
					  </div>
					  <div class="col-lg-6 frm_mas_data">
						<input type="text" class="form-control" id="telf_contacto<?php echo $nn?>"  placeholder="Teléfono de destinatario" >
					  </div>
					  <div class="col-lg-6 frm_mas_data">
						<input type="text" class="form-control" id="mi_telf<?php echo $nn?>"   placeholder="Mi teléfono">
					  </div>
					  <div class="col-lg-12 frm_mas_data">
						<input type="text" class="form-control" id="persona_contacto<?php echo $nn?>"  placeholder="Persona de contacto" >
					  </div>
					  <div class="col-lg-12 frm_mas_data">
						<textarea type="text" class="form-control" id="comentarios_conduc<?php echo $nn?>"  name="comentarios_conduc" placeholder="Comentario al courier"></textarea>
					  </div>
					  <?php
						if($nn > 1){
						echo "</div>";
						}
					  ?>
					</div>
				  </div>
				</div>
				<!--<input type="hidden" id="<?php echo "distrito_".$fila["id_empresa"];?>" value="">-->
				<input type="hidden" id="empresa<?php echo $nn?>" value="<?php echo $fila["id_empresa"];?>">
				<input type="hidden" id="emp_id_<?php echo $fila["id_empresa"]?>" value="<?php echo $fila["id_empresa"];?>">
				<?php
			}
			?>
				<input type="hidden" name="data-total" id="data-total" value="<?php echo $total;?>">
				<input type="hidden" name="box-envio" id="box-envio" value="<?php echo $nn;?>">
				<input type="hidden" name="data-igv" id="data-igv" value="<?php echo $igv;?>">
				<input type="hidden" name="cant" value="<?php echo $cant;?>">
          </div>
		  <div class="row">
			<div class="col-md-12">
				<hr>
				<div class="form-group">
					<h4 class="col-sm-12 control-labels">Ingrese cupón: </h4>
					<div class="col-xs-4">
						<input type="text" name="pe_cupon" class="form-control" id="pe_cupon">
					</div>
					<div class="col-xs-4">
						<a href="#" name="cupon" class="btn btn-complete cupon">Aplicar</a>
					</div>
				</div>
			</div>
		  </div>
        </div>
        <div class="col-lg-4">
		  <div class="comprobante">
			<div class="row">
				<div class="col-md-12">
					<h5>COMPROBANTE</h5>
				</div>
				<div class="col-md-6">
					<div class="radio">
					  <label>
						<input type="radio" name="tipo_doc" class="tipo_doc" id="boleta" value="boleta" checked>
						BOLETA
					  </label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="radio">
					  <label>
						<input type="radio" name="tipo_doc" class="tipo_doc" id="ruc" value="factura">
						FACTURA
					  </label>
					</div>
				</div>
				<div id="doc_nume" class="col-md-12">
					<label>DNI:</label>
					<input type="text" minlength="5" maxlength="12" class="form-control" name="doc_num" id="doc_num">
				</div>
				<div id="doc_nomb" class="col-md-12">
					<label>Nombre:</label>
					<input type="text" class="form-control" name="doc_nom" id="doc_nom">
				</div>
				<div class="col-md-12" id="doc_direc" style="display:none">
					<label>Domicilio Fiscal:</label>
					<input type="text" class="form-control" name="doc_direc" id="doc_dire">
				</div>
			</div>
          </div>
          <div class="resumen">
            <ul>
              <li><h5>RESUMEN DE TU PEDIDO</h5></li>
              <li>
                <p>Subtotal (<?php echo $cant;?>)</p> <span>S/. <span id="val_subtotal"><?php echo number_format($subtotal, 2, ',', ' ');?></span></span>
              </li>
              <li>
                <p>Envío</p> <span>S/. <span id="val_envio">0.00</span></span>
              </li>
              <!--<li>
                <p>Calcular envió</p> <span>S/. 0.00</span>
              </li>-->
              <li>
                <p>Aplicar cupón</p> <span>-S/. <span id="val_cupon">0.00</span></span>
              </li>
			  <li>
                <p>IGV</p> <span>S/. <span id="igv"><?php echo number_format($igv, 2, ',', ' ');?></span></span>
              </li>
              <li>
                <p>TOTAL</p> <span> S/. <span id="total"><?php echo number_format($total, 2, ',', ' ');?></span></span>
              </li>
              <li>
				<button type="submit" class="btn-100 btn-complete">PROCESAR COMPRA</button>
                <!--<a id="comprar" href="#">PROCESAR COMPRA</a>-->
              </li>
            </ul>
          </div>
        </div>
      </div>
    </form>
	</div>
  </div>
<div id="alerta_carrito"></div>
  <?php  include "footer.php" ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

	var RangeDates = ["5/21/2017", "5/28/2017"];
	var RangeDatesIsDisable = true;
	function DisableDays(date) {
	    var isd = RangeDatesIsDisable;
	    var rd = RangeDates;
	    var m = date.getMonth();
	    var d = date.getDate();
	    var y = date.getFullYear();
	    for (i = 0; i < rd.length; i++) {
	        var ds = rd[i].split(',');
	        var di, df;
	        var m1, d1, y1, m2, d2, y2;

	        if (ds.length == 1) {
	            di = ds[0].split('/');
	            m1 = parseInt(di[0]);
	            d1 = parseInt(di[1]);
	            y1 = parseInt(di[2]);
	            if (y1 == y && m1 == (m + 1) && d1 == d) return [!isd];
	        } else if (ds.length > 1) {
	            di = ds[0].split('/');
	            df = ds[1].split('/');
	            m1 = parseInt(di[0]);
	            d1 = parseInt(di[1]);
	            y1 = parseInt(di[2]);
	            m2 = parseInt(df[0]);
	            d2 = parseInt(df[1]);
	            y2 = parseInt(df[2]);

	            if (y1 >= y || y <= y2) {
	                if ((m + 1) >= m1 && (m + 1) <= m2) {
	                    if (m1 == m2) {
	                        if (d >= d1 && d <= d2) return [!isd];
	                    } else if (m1 == (m + 1)) {
	                        if (d >= d1) return [!isd];
	                    } else if (m2 == (m + 1)) {
	                        if (d <= d2) return [!isd];
	                    } else return [!isd];
	                }
	            }
	        }
	    }
	    return [isd];
	}

    $( ".datepicker" ).datepicker({
    	minDate: "+2d",
    	beforeShowDay: DisableDays
    });
  } );
  </script>
  <script>
  $(document).ready(function() {
	$('.datadireccion').on( 'click', function() {
		var ver = $(this).val();
		if( $(this).is(':checked') ){
			// Hacer algo si el checkbox ha sido seleccionado
			$(".vermas"+ver).css('display','none');
			var b = $(this).val();
			$(".bloque"+b).css('display','none');
		} else {
			// Hacer algo si el checkbox ha sido deseleccionado
			$(".vermas"+ver).css('display','block');
		}
	});
  //aqui es para mostrar los bloques en direccion
  $(".vermas").click(function(e){
	e.preventDefault();
	var bloq = $(this).attr("data-ver");
	$("."+bloq).toggle();
  });
  $(".cupon").click(function(e){
	e.preventDefault();
	var cupon = $("#pe_cupon").val();
	cupon = cupon.toLowerCase();
	var t = $("#data-total").val();
	var nt = $("#total").html();
	console.log(nt);
	if(cupon == 'redgalar2017')
	{
		var v = $("#val_cupon").html();
		if(v =='0.00'){
			console.log("descuento2");
			var c = parseFloat(nt)*0.10;
			$("#val_cupon").html(parseFloat(c).toFixed(2));
			var tt = parseFloat(nt)-parseFloat(c);
			$("#total").html(parseFloat(tt).toFixed(2));			
		}
	}
  });
  //aqui vamos a calcular el precio de envio
  $(".distrito_val").change(function(){
	var pr = $(this).val();
	var emp = $(this).find(':selected').attr('data-emp');
	
	var ee = $("#emp_id_"+emp).val();
	var data = {"ee": ee, "pr":pr, "acc": 'envio'}
	console.log(data);
	var subt = $("#data-total").val();
	console.log(subt);
	$.ajax({
		  data: data,
		  url:'tem_envio.php',
		  type:'POST',
		  beforeSend: function(){
			//$(".alerta").html("<span class='btn btn-s-md btn-info'>Procesando ...</span>");
		  },
		  success:  function (response) {
			var res = response;
			console.log(res);
			var env = parseFloat(res).toFixed(2);
			//calculamos el igv
			var total = parseFloat(env) + parseFloat(subt);
			console.log(total);
			var igv = total*0.18;
			var subigv = parseFloat(total) - (parseFloat(igv) + parseFloat(env));
			$("#val_envio").html(env);
			$("#igv").html(parseFloat(igv).toFixed(2));
			$("#total").html(parseFloat(total).toFixed(2));
			console.log(total);
			$("#val_subtotal").html(parseFloat(subigv).toFixed(2));
			//si tiene el cupon habilitado
			var cupon = $("#val_cupon").html();
			console.log(cupon);
			if(cupon != '0.00'){
				cupon = cupon.toLowerCase();
				var t = $("#total").html();
				var c = parseFloat(t)*0.10;
				var tt = parseFloat(t)-parseFloat(c);
				$("#val_cupon").html(parseFloat(c).toFixed(2));
				$("#total").html(parseFloat(tt).toFixed(2));
			}
		  }
	  });
  });
  
  //eliminar item del carrito
  $(".btn-delete-item").click(function(e){
	e.preventDefault();
	var id = $(this).attr("data-id");
	console.log(id);
	var data = {"id": id, "acc": 'delete'}
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
					setTimeout("window.location= window.location", 2200);
				}
				else{
					$("#alerta_carrito div").html('<img src="https://www.redgalar.com/img/chat.jpg" alt=""><div class="alert-danger">Error: producto no eliminado del carro de compras</div>');
					console.log(res);
				}
			  }
		  });
	}
  });
  $("input[name=tipo_doc]").click(function () {    
        var t_doc = $(this).val();
		if(t_doc == "factura"){
			$("#doc_direc").css("display","block");
			$("#doc_nume label").html("RUC:");
			$("#doc_num").attr("minlength","11");
			$("#doc_num").attr("maxlength","11");
			$("#doc_dire").attr("required","required");
			$("#doc_nomb label").html("Razón Social:");
		}
		else{
			$("#doc_direc").css("display","none");
			$("#doc_nume label").html("DNI:");
			$("#doc_nomb label").html("Nombre:");
			$("#doc_num").attr("minlength","9");
			$("#doc_num").attr("maxlength","9");
			$("#doc_dire").removeAttr("required");
		}
  });
  
  $('#add_comprar_pro').submit(function(e){
	e.preventDefault();
	var nn = $("#box-envio").val();
	var subtotal = $("#val_subtotal").html();
	var penvio = $("#val_envio").html();
	var cupon = $("#val_cupon").html();
	var igv = $("#igv").html();
	var total = $("#total").html();
	var tipo_doc = $('input:radio[name=tipo_doc]:checked').val();
	var doc_num = $("#doc_num").val();
	var doc_nom = $("#doc_nom").val();
	var doc_dire = $("#doc_dire").val();
	
	var lisarray = [];
	for(i = 1; i <= nn; i++){
		var dd = $("#distrito"+i).val();
		var iddd = $("#distrito"+i).find(':selected').attr('data-id');
		var direc = $("#direccion"+i).val();
		var fecha = $("#fecha"+i).val();
		var hora = $("#hora"+i).val();
		var empre = $("#empresa"+i).val();
		var personaconct = $("#persona_contacto"+i).val();
		var per_referencia = $("#per_referencia"+i).val();
		var telf_contacto = $("#telf_contacto"+i).val();
		var mi_telf = $("#mi_telf"+i).val();
		var mi_email = $("#mi_email"+i).val();
		var comentarios_conduc = $("#comentarios_conduc"+i).val();
		if(i > 1){
			if($("#datadireccion"+i).is(':checked') ){
				var repite = "1";
				console.log();
			}
			else{var repite = "0";}
		}
		else{var repite = "0";}
		lisarray.push({
		  "pdis" : dd,
		  "iddis" : iddd,
		  "direc" : direc,
		  "fecha": fecha,
		  "hora": hora,
		  "emp": empre,
		  "personaconct": personaconct,
		  "per_referencia": per_referencia,
		  "telf_contacto": telf_contacto,
		  "mi_telf": mi_telf,
		  "mi_email": mi_email,
		  "comentarios_conduc": comentarios_conduc,
		  "repite":repite
		});
	}
	var infoa = JSON.stringify(lisarray);
	var info ={'data':infoa,
          'subtotal':subtotal,
          'penvio':penvio,
          'cupon':cupon,
          'igv':igv,
          'total':total,
          'tipo_doc':tipo_doc,
          'doc_num':doc_num,
          'doc_nom':doc_nom,
          'doc_dire':doc_dire,
          "acc": 'comprar'
        };
	$.ajax({
		  data: info,
		  url:'tem_envio.php',
		  type:'POST',
		  beforeSend: function(){
			//$(".alerta").html("<span class='btn btn-s-md btn-info'>Procesando ...</span>");
		  },
		  success:  function (response) {
			var res = response;
			console.log(res);
			if(res != "error"){
				var url2 = 'finalizarcompra.php?cod='+res;
				window.location.href = url2;
			}
			else{
				alert("Error en el proceso a la compra");
			}
		  }
	  });
	});
    console.log( "Listos en Culqi. :)" );    

    $('#miBoton').on('click', function(e) {
      // Abre el formulario con las opciones de Culqi.configurar
      Culqi.abrir();
      e.preventDefault();
    });

  });
  </script>
  
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
</body>
</html>