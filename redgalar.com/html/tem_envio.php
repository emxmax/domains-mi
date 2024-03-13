<?php
	ob_start("ob_gzhandler");
	session_start();

	include "util/url.php";
	include "util/query.php";
	$cn = db_connect();
	
	$user_email=$_SESSION['email'];

	$sqlUsuario = "SELECT * FROM usuario WHERE user_email='$user_email'";
	$rsUsuario = mysql_query($sqlUsuario);

	$user_id = mysql_result($rsUsuario,0,"user_id");
	
	if($_POST["acc"]=="envio"){
		$valor = $_POST["pr"];
		$id_emp = $_POST["ee"];
		
		//consultamos si ya exite el envio
		$sq2 = "SELECT *
		from temp_envio
		WHERE
		temp_envio.idemp = $id_emp AND
		temp_envio.idUser = $user_id";
		$res1 = mysql_query($sq2,$cn);
		if(mysql_num_rows($res1) < 1){
			$sql = "INSERT INTO temp_envio (valor,idemp,idUser) VALUES ('$valor','$id_emp','$user_id')";
		}
		else{
			$sql = "UPDATE temp_envio 
				SET valor = '".$valor."'
				WHERE idemp =".$id_emp." and idUser=".$user_id;
		}
		mysql_query($sql,$cn);
		//devolvemos la suma
		$sql ="SELECT *
		FROM
		temp_envio
		WHERE
		temp_envio.idUser = $user_id";
		$empresas = mysql_query($sql,$cn);
		$envio = 0;
		while ($fila = mysql_fetch_array($empresas)) {
			$envio = $envio + $fila["valor"];
		}
		echo $envio;
	}


	if($_POST["acc"]=="delete"){
		$id = $_POST["id"];
		$sql = "delete from carrito where id='".$id."'";
		$res = mysql_query($sql,$cn);
		if(isset($res)){
			echo "exito";
		}
		else{
			echo "error";
		}
	}

	if($_POST["acc"]=="delete_pedido"){
		$id = $_POST["id"];
		$sql = "delete from detalle_pedido where pe_codigo='".$id."'";
		$res = mysql_query($sql,$cn);
		if(isset($res)){
			echo "exito";
		}
		else{
			echo "error";
		}
	}


	if($_POST["acc"]=="comprar"){
		$dataenvio = json_decode($_POST['data']);
		$psubtotal = $_POST['subtotal'];
        $penvio = $_POST['penvio'];
		$cupon = $_POST['cupon'];
		$igv = $_POST['igv'];
        $total = $_POST['total'];
		$pe_c_tipo = $_POST['tipo_doc'];
		$pe_c_num = $_POST['doc_num'];
		$pe_c_razon = $_POST['doc_nom'];
		$pe_c_direccion = $_POST['doc_dire'];
		$fecha= strftime( "%Y-%m-%d %H:%M:%S", time() );
		//$user_id
		//insertamos el pedido
		$sql = "INSERT INTO detalle_pedido (subtotal,pe_envio,cupon,igv,total,pe_c_tipo,pe_c_num,pe_c_razon,pe_c_direccion,id_user,pe_fecha,estado) VALUES ('$psubtotal','$penvio','$cupon','$igv','$total','$pe_c_tipo','$pe_c_num','$pe_c_razon','$pe_c_direccion','$user_id','$fecha','T')";
		$res = mysql_query($sql,$cn);
		if($res){
			$iddtp = mysql_insert_id();
			//armanos el codigo relativo
			$cod = "1-000000";
			$cod .= $iddtp;
			$sql = "UPDATE detalle_pedido 
				SET pe_codigo = '".$cod."'
				WHERE id =".$iddtp;
			$res = mysql_query($sql,$cn);
			//insertamos los datos de envio
			foreach ($dataenvio as $k => $ee) {
				$id_distrito = $ee->iddis;
				$direccion = $ee->direc;
				$precio = $ee->pdis;
				$fecha = $ee->fecha;
				$hora = $ee->hora;
				$id_emp = $ee->emp;
				$pe_codigo = $cod;
				$per_referencia = $ee->per_referencia;
				$mi_email = $ee->mi_email;
				
				if($ee->repite == "1"){
					$sqle = "INSERT INTO pedido_envio (id_distrito,direccion,precio,fecha,hora,id_emp,personaconct,per_referencia,telf_contacto,mi_telf,mi_email,repite,pe_codigo) VALUES ('$id_distrito','$direccion','$precio','$fecha','$hora','$id_emp','$personaconct','$per_referencia','$telf_contacto','$mi_telf','$mi_email','1','$pe_codigo')";
				}
				else{
					$personaconct = $ee->personaconct;
					$telf_contacto = $ee->telf_contacto;
					$mi_telf = $ee->mi_telf;
					$comentarios_conduc = $ee->comentarios_conduc;
					$sqle = "INSERT INTO pedido_envio (id_distrito,direccion,precio,fecha,hora,id_emp,personaconct,per_referencia,telf_contacto,mi_telf,mi_email,comentarios_conduc,pe_codigo) VALUES ('$id_distrito','$direccion','$precio','$fecha','$hora','$id_emp','$personaconct','$per_referencia','$telf_contacto','$mi_telf','$mi_email','$comentarios_conduc','$pe_codigo')";
				}
				$res = mysql_query($sqle,$cn);
				if(isset($res)){
					$ex= 1;
				}
				else{$ex = 0;}
			}
			if($ex == 1){
				//pasamos los productos del carrito a la tabla pedidos
				$sql2="SELECT *
					FROM
					carrito
					WHERE
					carrito.user_id = $user_id";
				$productos = mysql_query($sql2,$cn);
				while ($ee = mysql_fetch_array($productos)) {
					$sql = "INSERT INTO pedido (pe_fecha,pe_de,pe_para,pe_dedicatoria,pe_frase1,pe_frase2,pe_frase3,pe_tema,pe_tema_otro,pe_jugo,pe_bebida,pe_cerveza,pe_aperitivo,pe_sandwiches,pe_salado,pe_dulce,pe_galletas_artesanales,pe_fo_1,pe_fo_2,pe_fo_3,pe_fo_4,pe_adicional_1,pe_adicional_2,pe_comenta,pe_persona_c,pe_telf_dest,pe_telf_tu,pe_distrito,pe_direccion,pe_lat,pe_lng,pe_referencia,pe_fecha_pe,pe_horario,pe_comentario,pe_comprobante,pe_c_tipo,pe_c_razon,pe_c_direccion,user_id,pro_id,es_id,id_empresa,pe_cant,pe_subtotal,pe_p_adicional,pe_p_delivery,id_codigo) VALUES ('".$ee['pe_fecha']."','".$ee['pe_de']."','".$ee['pe_para']."','".$ee['pe_dedicatoria']."','".$ee['pe_frase1']."','".$ee['pe_frase2']."','".$ee['pe_frase3']."','".$ee['pe_tema']."','".$ee['pe_tema_otro']."','".$ee['pe_jugo']."','".$ee['pe_bebida']."','".$ee['pe_cerveza']."','".$ee['pe_aperitivo']."','".$ee['pe_sandwiches']."','".$ee['pe_salado']."','".$ee['pe_dulce']."','".$ee['pe_galletas_artesanales']."','".$ee['pe_fo_1']."','".$ee['pe_fo_2']."','".$ee['pe_fo_3']."','".$ee['pe_fo_4']."','".$ee['pe_adicional_1']."','".$ee['pe_adicional_2']."','".$ee['pe_comenta']."','".$ee['pe_persona_c']."','".$ee['pe_telf_dest']."','".$ee['pe_telf_tu']."','".$ee['pe_distrito']."','".$ee['pe_direccion']."','".$ee['pe_lat']."','".$ee['pe_lng']."','".$ee['pe_referencia']."','".$ee['pe_fecha_pe']."','".$ee['pe_horario']."','".$ee['pe_comentario']."','".$ee['pe_comprobante']."','".$ee['pe_c_tipo']."','".$ee['pe_c_razon']."','".$ee['pe_c_direccion']."','".$ee['user_id']."','".$ee['pro_id']."',3,'".$ee['id_empresa']."','".$ee['pe_cant']."','".$ee['pe_subtotal']."','".$ee['pe_p_adicional']."','".$ee['pe_p_delivery']."','".$cod."')";
					$res = mysql_query($sql,$cn);
					if(isset($res)){
						$yy= 1;
					}
					else{$yy = 0;}
				}
				//eliminamos productos del carrito
				if($yy == 1){
					// $sql = "delete  from carrito where user_id='".$user_id."'";
					// $res = mysql_query($sql,$cn);
					// if(isset($res)){
					// 	echo $cod;
					// }
					// else{
					// 	"error";
					// }
					echo $cod;
				}
				else{
					"error";
				}
			}
			else{
				echo "error";
			}
		}
		else{
			echo "error";
		}
	}
?>