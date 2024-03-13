<?php
  include "util/fns_db.php";
  $cn = db_connect();

  require 'library/requests-master/Requests.php';
  Requests::register_autoloader();
  require 'library/culqi-php-master/culqi.php';

  $tok = $_POST["token"];
  $ema = $_POST["email"];
  $pre = $_POST["amount"];
  $des = $_POST["description"];
  
  $user_id = $_POST["user_id"];
  // $pro_id = $_POST["pro_id"];
  $pe_id = $_POST["pe_id"];
  $user_email = $_POST["user_email"];
  
  $metodopago = "Tarjeta";
	/*CORREO*/
	//datos para el correo
	$sqlUsuario = "SELECT * FROM usuario WHERE user_email='$user_email'";
	$rsUsuario = mysql_query($sqlUsuario, $cn);
	$cnombre = mysql_result($rsUsuario,0,"user_name");
	$eee = mysql_result($rsUsuario,0,"user_email");
	//Enviar mensaje a redgalar
	include "emailredgalar.php";
	include "emailproveedor.php";
	
	//obtenmos los proveedores de la compra
	$sql ="SELECT *,
	admin.user_name as empresa
	FROM
	pedido
	INNER JOIN admin ON pedido.id_empresa = admin.user_id
	WHERE
	pedido.id_codigo = '".$pe_id."'
	GROUP BY
	pedido.id_empresa";
	$empresas = mysql_query($sql);
	$nn = 0;
	$subtotal = 0;
	$cant = 0;
	$htmlArt = "";
	$mi_correo = array();
	while ($fila = mysql_fetch_array($empresas)) {
		if($nn > 0){
			$htmlArt .= '<div class="bred" style="border-bottom: 1px solid #D2333D;"></div>';
		}
		$htmlArt .= '<div class="">
			<div class="col-lg-12" style="width: 100%;">
				<h4 style="color: #d2333d;font: 12px arial;font-weight: 900; padding-top: 12px;padding-bottom: 10px; margin: 0;">Proveedor: <span>'.$fila["empresa"].'</span></h4>
			</div>
			<div class="col-lg-5" style="color: #666666;">';
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
			pedido.id_codigo = '".$pe_id."' AND
			pedido.id_empresa = ".$fila["id_empresa"];
			$productos = mysql_query($sql);
			while ($list = mysql_fetch_array($productos)) {
				$htmlArt .='<div class="row pedido-carrito" style="display: flex;">
					  <div class="col-lg-4 text-center" style="width: 20%;">
						<img src="https://www.redgalar.com/img/'.$list["pro_img"].'" alt="'.$list["pro_img"].'" style="width:63px;">
					  </div>
					  <div class="col-lg-8" style="width: 70%;">
						<h4 style="color: #d2333d;font: 12px arial;font-weight: 600;padding-top: 12px; margin: 0; margin-bottom: 5px;">'.utf8_encode($list["pro_name"]).'</h4>
						<span style="font: 12px arial;">S/ '.$list["pe_subtotal"].'  | Cant: '.$list["pe_cant"].'</span>';
						if($list["pe_p_adicional"] > 0){
							$rv = number_format($list["pe_p_adicional"], 2, ',', ' ');
							$htmlArt .='<h5 style="margin: 0;font: 11px arial;">+ Adicional: S/ '.$rv.'</h5>';
						}
						
					  $htmlArt .='</div>
					</div>';
			$cant = $cant + $list["pe_cant"];
			$subtotal = $subtotal + ($list["pe_cant"] * $list["pe_subtotal"]);
			}
			$nn=$nn+1;
			
			$htmlArt .= '</div>
			  <div class="box-frm-envio" style="padding-bottom: 10px;color: #666666;">
				<div class="row">
				  <div class="col-lg-12">
					<h4 style="margin: 8px 0px 6px;color: #d2333d;margin-top: 3px;font: 13px arial;font-weight: 700;">Datos de envio:</h4>
				  </div>
				  <div class="col-lg-6" style="display: inline-block;width:50%;font: 11px arial;">';
					//consultamos el dato de envio
					$sql2 = "SELECT
					pedido_envio.id_distrito,
					pedido_envio.direccion,
					pedido_envio.precio,
					pedido_envio.fecha,
					pedido_envio.hora,
					pedido_envio.mi_email,
					pedido_envio.id_emp,
					distrito.dis_name
					FROM
					pedido_envio
					INNER JOIN distrito ON pedido_envio.id_distrito = distrito.dis_id
					WHERE
					pedido_envio.id_emp = ".$fila["id_empresa"]." AND
					pedido_envio.pe_codigo = '".$pe_id."'";
					$denv = mysql_query($sql2);
					$ee = mysql_fetch_array($denv);
					
					$htmlArt .= '<p style="margin: 0px;margin-bottom: 5px;"><strong>Distrito:</strong> '.utf8_encode($ee["dis_name"]).'</p>
								<p style="margin: 0px;margin-bottom: 5px;"><strong>Direccion:</strong> '.utf8_encode($ee["direccion"]).'</p>
						  </div>
						  <div class="col-lg-6" style="display: inline-block;width:49%;font: 11px arial;">
								<p style="margin: 0px;margin-bottom: 5px;"><strong>Fecha:</strong> '.$ee["fecha"].'</p>
								<p style="margin: 0px;margin-bottom: 5px;"><strong>Hora:</strong> '.$ee["hora"].'</p>
						  </div>
						</div>
					  </div>
					</div>';
				if($ee["mi_email"]){
					if (in_array($ee["mi_email"], $mi_correo)) {
						//echo "Si Existe";
					}
					else{
						array_push($mi_correo,$ee["mi_email"]);
						//echo "No Existe";
					}
				}
	}
	
	//obetemos los precios
	$sqld = "SELECT *
	FROM
	detalle_pedido
	WHERE
	detalle_pedido.pe_codigo = '".$pe_id."' and detalle_pedido.estado='T'";
	$dd = mysql_query($sqld);
	$pp = mysql_fetch_array($dd);
	if($pp["pe_c_num"]){
		$htmlBoleta = '<div class="bred" style="width: 90%; margin: auto;border-bottom: 1px solid #D2333D;"></div>
				<div class="inner" style="padding: 0 35px;">
					<h4 style="font: 12px arial;color: #D2333D;font-weight: 900;">Datos adicionales</h4>
					<div class="core">
						<div class="inner-row" style="display: flex;flex-flow: row wrap;">
							<div class="col" style="width: 30%;">
								<p style="text-align:right;margin: 9px 0px;"><b style="color:#666666;font:11px arial;font-weight:900;">Tipo:</b></p>
							</div>
							<div class="col" style="width: 42%;margin-left: 10px;">
								<p style="font:11px arial;color:#666666;font-weight:400;">'.$pp["pe_c_tipo"].'</p>
							</div>
						</div>';
					if($pp["pe_c_tipo"]=="boleta"){
						$htmlBoleta .='<div class="inner-row" style="display: flex;flex-flow: row wrap;">
							<div class="col" style="width: 30%;">
								<p style="text-align:right;margin: 9px 0px;"><b style="color:#666666;font:11px arial;font-weight:900;">DNI:</b></p>
							</div>
							<div class="col" style="width: 42%;margin-left: 10px;">
								<p style="font:11px arial;color:#666666;font-weight:400;">'.$pp["pe_c_num"].'</p>
							</div>
						</div>
						<div class="inner-row" style="display: flex;flex-flow: row wrap;">
							<div class="col" style="width: 30%;">
								<p style="text-align:right;margin: 9px 0px;"><b style="color:#666666;font:11px arial;font-weight:900;">Nombre:</b></p>
							</div>
							<div class="col" style="width: 42%;margin-left: 10px;">
								<p style="font:11px arial;color:#666666;font-weight:400;">'.$pp["pe_c_razon"].'</p>
							</div>
						</div>';
					}
					else{
						$htmlBoleta .='<div class="inner-row" style="display: flex;flex-flow: row wrap;">
							<div class="col" style="width: 30%;">
								<p style="text-align: right;margin: 9px 0px;"><b style="color:#666666;font:11px arial;text-align:center;font-weight:900;">RUC:</b></p>
							</div>
							<div class="col" style="width: 42%;margin-left: 10px;">
								<p style="font: 11px arial; color: #666666;font-weight: 400;"><b>'.$pp["pe_c_num"].'</b></p>
							</div>
						</div>
						<div class="inner-row" style="display: flex;flex-flow: row wrap;">
							<div class="col" style="width: 30%;">
								<p style="text-align: right;margin: 9px 0px;"><b style="color:#666666;font:11px arial;text-align:center;font-weight:900;">Razón Social:</b></p>
							</div>
							<div class="col" style="width: 42%;margin-left: 10px;">
								<p style="font: 11px arial; color: #666666;font-weight: 400;"><b>'.$pp["pe_c_razon"].'</b></p>
							</div>
						</div>
						<div class="inner-row" style="display: flex;flex-flow: row wrap;">
							<div class="col" style="width: 30%;">
								<p style="text-align: right;margin: 9px 0px;"><b style="color:#666666;font:11px arial;text-align:center;font-weight:900;">Dirección:</b></p>
							</div>
							<div class="col" style="width: 42%;margin-left: 10px;">
								<p style="font: 11px arial; color: #666666;font-weight: 400;"><b>'.$pp["pe_c_direccion"].'</b></p>
							</div>
						</div>';
					}
					$htmlBoleta .='</div>
				</div>';
	}
	else{
		$htmlBoleta = "";
	}
	//obetenemos detalle precio
	$st = number_format($pp["subtotal"], 2, '.', ' ');
	$dcp = number_format($pp["cupon"], 2, ',', ' ');
	$igv = $pp["igv"];
	$igv = number_format($igv, 2, ',', ' ');
	$htmlPrecio = '<div class="inner" style="padding: 0 35px;">
				<h4 style="font: 14px arial; color: #D2333D; font-weight: 900;">Resumen de pedido</h4>
				<div class="core">
					<div class="inner-row" style="display: flex;flex-flow: row wrap;">
						<div class="col" style="width: 30%;">
							<p class="titulo" style="text-align: right;font: 11px arial; color: #666666;"><b>Subtotal ('.$cant.'):</b></p>
						</div>
						<div class="col" style="width: 42%;margin-left: 10px;">
							<p style="font: 11px arial;color: #666666; font-weight: 400;">S/. '.$st.'</p>
						</div>
					</div>
					<div class="inner-row" style="display: flex;flex-flow: row wrap;">
						<div class="col" style="width: 30%;">
							<p class="titulo" style="text-align: right;font: 11px arial; color: #666666;"><b>Envío:</b></p>
						</div>
						<div class="col" style="width: 42%;margin-left: 10px;">
							<p style="font: 11px arial;color: #666666;font-weight: 400;">S/. '.$pp["pe_envio"].'</p>
						</div>
					</div>
					<div class="inner-row" style="display: flex;flex-flow: row wrap;">
						<div class="col" style="width: 30%;">
							<p class="titulo" style="text-align: right;font: 11px arial; color: #666666;"><b>Cupón:</b></p>
						</div>
						<div class="col" style="width: 42%;margin-left: 10px;">
							<p style="font: 11px arial;color: #666666;font-weight: 400;">-S/. '.$dcp.'</p>
						</div>
					</div>
					<div class="inner-row" style="display: flex;flex-flow: row wrap;">
						<div class="col" style="width: 30%;">
							<p class="titulo" style="text-align: right;font: 11px arial; color: #666666;"><b>IGV:</b></p>
						</div>
						<div class="col" style="width: 42%;margin-left: 10px;">
							<p style="font: 11px arial;color: #666666;font-weight: 400;">S/. '.$igv.'</p>
						</div>
					</div>
					<div class="inner-row" style="display: flex;flex-flow: row wrap;">
						<div class="col" style="width: 30%;">
							<p class="titulo" style="text-align: right;color: #d2333d;font: 14px arial;"><b style="font-weight: 900;">TOTAL:</b></p>
						</div>
						<div class="col" style="width: 42%;margin-left: 10px;">
							<p style="color: #d2333d;font: 14px arial;font-weight: 900;">S/. '.$pp["total"].'</p>
						</div>
					</div>
				</div>
			</div>';
	

	$bodyMsj = '<body>
		<div class="main-div" style="width: 470px;margin: auto;">
			<div class="header">
				<div class="inner-header" style="display: flex;height: 54px;margin-top: 23px;">
					<div class="col" style="background: #D2333D;border-radius: 5px;	width: 58%;display: inline-block">
						<h3 style="color: #fff;font: 15px arial;font-weight: 900;margin: 0;padding-left: 11px;">'.$cnombre.'</h3>
						<h4 style="color: #fff;margin: 0; padding-left: 11px;font: 15px arial;font-weight: 400;">¡Gracias por comprar en Redgalar!</h4>
					</div>
					<div class="col" style="width: 42%;text-align: center;">
						<img src="https://www.mediaimpact.pe/demo/redgalar-mailing/logo.png">
					</div>
				</div>
			</div>
			<div class="order" style="background: #F0F1F5;margin-top: 10px;border-radius: 4px;">
				<div class="inner-detallado" style="background-image: url(https://www.redgalar.com/img/email/fa-gift.png); background-repeat: no-repeat;background-position: 90% 45%;padding-left: 28px; padding-bottom: 10px;">
					<h4 style="color: #D2333D;font: 13px arial;font-weight: 900;padding-top: 12px;margin: 0;">Tu pedido ha sido procesado con éxito</h4>
					<p style="color: #666666;font: 11px arial; font-weight: 400; margin-top: 0;margin-bottom: 5px;width: 65%;">Si tienes alguna consulta sobre tu compra nuestro equipo estará dispuesto a ayudarte.</p>
					<p style="color: #666666;font: 11px arial; font-weight: 400; margin-top: 0; margin-bottom: 5px;width: 65%;">Nuestros canales de atención son:</p>
					<a href="https://www.redgalar.com" target="_blank" style="display: block;font: 11px arial;color: #666666;text-decoration: none;">www.redgalar.com</a>
					<a href="https://www.facebook.com/redgalar/" style="display: block;font: 11px arial;color: #666666;text-decoration: none;">facebook.com/redgala</a>
				</div>
				<div class="bred" style="width: 90%;margin: auto;border-bottom: 1px solid #D2333D;"></div>
				<div style="padding: 0 35px;">'.$htmlArt.'</div>
				<div class="bred" style="width: 90%;margin: auto;border-bottom: 1px solid #D2333D;"></div>
				'.$htmlPrecio.'
				<div class="bred" style="width: 90%; margin: auto;border-bottom: 1px solid #D2333D;"></div>
				<div class="inner" style="padding: 0 35px;">
					<h4 style="font: 12px arial; color: #D2333D; font-weight: 900;">Detalle de tu orden</h4>
					<div class="core">
						<div class="inner-row" style="display: flex;flex-flow: row wrap;">
							<div class="col" style="width: 30%;">
								<p class="titulo" style="text-align: right;font: 11px arial; color: #666666;"><b>Número de orden:</b></p>
							</div>
							<div class="col" style="width: 42%;margin-left: 10px;">
								<p style="font: 11px arial;color: #666666; font-weight: 400;">'.$pe_id.'</p>
							</div>
						</div>
						<div class="inner-row" style="display: flex;flex-flow: row wrap;">
							<div class="col" style="width: 30%;">
								<p class="titulo" style="text-align: right;font: 11px arial; color: #666666;"><b>Nombre:</b></p>
							</div>
							<div class="col" style="width: 42%;margin-left: 10px;">
								<p style="font: 11px arial;color: #666666;font-weight: 400;">'.$cnombre.'</p>
							</div>
						</div>
						<div class="inner-row" style="display: flex;flex-flow: row wrap;">
							<div class="col" style="width: 30%;">
								<p class="titulo" style="text-align: right;font: 11px arial; color: #666666;"><b>Email:</b></p>
							</div>
							<div class="col" style="width: 42%;margin-left: 10px;">
								<p style="font: 11px arial;color: #666666;font-weight: 400;">'.$mi_correo[0].'</p>
							</div>
						</div>
						<div class="inner-row" style="display: flex;flex-flow: row wrap;">
							<div class="col" style="width: 30%;">
								<p class="titulo" style="text-align: right;font: 11px arial; color: #666666;"><b>Método de Pago:</b></p>
							</div>
							<div class="col" style="width: 42%;margin-left: 10px;">
								<p style="font: 11px arial;color: #666666;font-weight: 400;">'.$metodopago.'</p>
							</div>
						</div>
					</div>
				</div>
				'.$htmlBoleta.'
			</div>
			<div class="footer" style="background: #D2333D;">
				<div class="inner-footer" style="display: flex;padding-top: 13px;flex-flow: row wrap;justify-content: space-around;">
					<div class="col"  style="width: 33.3%;">
						<a href="https://www.facebook.com/MediaImpactPeru/" target="_blank" style="text-decoration: none;">
							<img src="https://www.redgalar.com/img/email/logo-facebook.png" style="display: block;margin: auto;">
							<p style="text-align: center;color: #fff;font: 12px arial;margin: 0; font-weight: 400; margin-top: 5px; margin-bottom: 17px;">Facebook</p>
						</a>
					</div>
					<div class="col" style="width: 33.3%;">
						<a href="https://www.instagram.com/mediaimpactperu/" target="_blank" style="text-decoration: none;">
							<img src="https://www.redgalar.com/img/email/logo-instagram.png" style="display: block;margin: auto;">
							<p style="text-align: center;color: #fff;font: 12px arial;margin: 0; font-weight: 400; margin-top: 5px; margin-bottom: 17px;">Instagram</p>
						</a>
					</div>
					<div class="col" style="width: 33.3%;">
						<a href="mailto:empecemos@mediaimpact.pe" target="_top" style="text-decoration: none;">
							<img src="https://www.redgalar.com/img/email/logo-mail.png" style="display: block;margin: auto;">
							<p style="text-align: center;color: #fff;font: 12px arial;margin: 0; font-weight: 400; margin-top: 5px; margin-bottom: 17px;">Mail</p>
						</a>
					</div>
				</div>
				<div class="bwhite" style="border-bottom: 1px solid #fff; width: 90%;margin: auto;"></div>
				<h2 style="text-align: center;font: 10px arial;color: #fff;margin: 0; padding: 9px 0;">INNOVATIVA LATAM S.A.C.</h2>
			</div>
		</div>
	</body>';


	$para = "erick@redgalar.com,$user_email, $ema";
	foreach ($mi_correo as $pac){
		$para .= ",".$pac;
	}
	$titulo = "RESUMEN DE PEDIDO #".$pe_id." | REDGALAR.COM";

	$mensaje = $bodyMsj;

	$cabeceras = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$cabeceras .= 'From: Pedido Realizado <info@redgalar.com>';


	$resultado= @mail($para, $titulo, $mensaje, $cabeceras);
	if ($resultado == true) 
	{ 
		//echo "Gracias por rellenar el formulario. Se ha enviado correctamente a la dirección "; 
	}

	mysql_query("SET NAMES 'utf8");

	$sql = "UPDATE pedido SET es_id = 2 WHERE pe_id = $pe_id";

	mysql_query($sql, $cn);

	/*END CORREO*/

	$PUBLIC_KEY = "sk_test_QoyPKCji5KudUf2c";		//tarjeta  --  sk_live_4fnfp31YgNxgsJrI
	$culqi = new Culqi\Culqi(array('api_key' => $PUBLIC_KEY));
	

	try {  

	  $charge = $culqi->Charges->create(
	  array(
		"amount" => $pre,
		"capture" => true,
		"currency_code" => "PEN",
		"description" => $des,
		"email" => $ema,
		"installments" => 0,
		"source_id" => $tok 
	  ));

	  echo "ok";
	  $sql = "delete  from carrito where user_id='".$user_id."'";
	  
	} catch(Exception $e) {
	  // ERROR: El cargo tuvo algún error o fue rechazado
	  echo $e->getMessage();

	}

?>