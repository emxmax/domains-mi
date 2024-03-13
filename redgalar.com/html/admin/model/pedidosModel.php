<?php 
class Pedidos extends Conectar
{
	private $prores;

	public function __construct(){
		$this->prores=array();
	}
	
	//lista de Productos
	public function mispedidos(){
		//sql
		if($_SESSION["ses_perfil"]=="Administrador"){
			$sql = "SELECT
			pedido.pe_id,
			pedido.id_codigo,
			pedido.pe_fecha,
			producto.pro_name,
			usuario.user_name,
			pedido.pe_fecha_pe,
			pedido.pe_horario,
			estado_pedido.es_name AS estado,
			pedido.es_id,
			pedido.id_empresa
			FROM
			pedido
			INNER JOIN producto ON pedido.pro_id = producto.pro_id
			INNER JOIN estado_pedido ON pedido.es_id = estado_pedido.es_id
			INNER JOIN usuario ON pedido.user_id = usuario.user_id
			WHERE pedido.es_id <> 1";
		}
		else{
			$iu=$_SESSION["ses_id"];
			
			$sql ="SELECT
			pedido.pe_id,
			pedido.id_codigo,
			pedido.pe_fecha,
			producto.pro_name,
			usuario.user_name,
			pedido.pe_fecha_pe,
			pedido.pe_horario,
			estado_pedido.es_name AS estado,
			pedido.es_id,
			pedido.id_empresa
			FROM
			pedido
			INNER JOIN producto ON pedido.pro_id = producto.pro_id
			INNER JOIN estado_pedido ON pedido.es_id = estado_pedido.es_id
			INNER JOIN usuario ON pedido.user_id = usuario.user_id
			WHERE pedido.id_empresa=".$iu." and pedido.es_id <> 1";	
		}
		//Listando pedidos
		$res = mysql_query($sql,Conectar::con());
		while($resl=mysql_fetch_array($res)){
			$this->prores[]=$resl;
		}
		return $this->prores;
	}
	
	public function allpedidos(){
		//sql
		if($_SESSION["ses_perfil"]=="Administrador"){
			$sql = "SELECT
			pedido.pe_id,
			pedido.pe_fecha,
			producto.pro_name,
			usuario.user_name,
			pedido.pe_fecha_pe,
			pedido.pe_horario,
			estado_pedido.es_name AS estado,
			pedido.es_id,
			distrito.dis_name
			FROM
			pedido
			INNER JOIN producto ON pedido.pro_id = producto.pro_id
			INNER JOIN estado_pedido ON pedido.es_id = estado_pedido.es_id
			INNER JOIN usuario ON pedido.user_id = usuario.user_id
			INNER JOIN distrito ON pedido.pe_distrito = distrito.dis_id";		
		}
		else{
			$iu=$_SESSION["ses_id"];
			
			$sql ="SELECT
			pedido.pe_id,
			pedido.pe_fecha,
			producto.pro_name,
			usuario.user_name,
			pedido.pe_fecha_pe,
			pedido.pe_horario,
			estado_pedido.es_name AS estado,
			pedido.es_id,
			distrito.dis_name,
			pedido.id_empresa
			FROM
			pedido
			INNER JOIN producto ON pedido.pro_id = producto.pro_id
			INNER JOIN estado_pedido ON pedido.es_id = estado_pedido.es_id
			INNER JOIN usuario ON pedido.user_id = usuario.user_id
			INNER JOIN distrito ON pedido.pe_distrito = distrito.dis_id
			WHERE pedido.id_empresa=".$iu;
		}
		//Listando pedidos
		$res = mysql_query($sql,Conectar::con());
		while($resl=mysql_fetch_array($res)){
			$this->prores[]=$resl;
		}
		return $this->prores;
	}
	
	//obtener el pedido
	public function idpepedido(){
		$id = $_GET["id"];
		$sql = "SELECT	*
			FROM
			pedido
			INNER JOIN producto ON pedido.pro_id = producto.pro_id
			INNER JOIN usuario ON pedido.user_id = usuario.user_id
			WHERE
			pedido.pe_id = ".$id;
		$res = mysql_query($sql,Conectar::con());
		$resl=mysql_fetch_array($res);
		$this->pro=$resl;
		return $this->pro;
	}
	
	//actualizar el pedido
	public function updatepepedido(){
		$id = $_POST["id"];
		$e = $_POST["e"];
		//insertar tarea
		$sql = "UPDATE pedido 
			SET es_id = '".$e."'			
			WHERE pe_id =".$id;
		$res = mysql_query($sql,Conectar::con());
		if(isset($res)){
			//actualizamos todos los estados de los productos del pedido
			if($e == 4 and $_SESSION["ses_perfil"]=="Administrador"){
				$sql = "SELECT	*
				FROM
				pedido
				WHERE
				pedido.pe_id = '".$id."'";
				$res = mysql_query($sql,Conectar::con());
				$resl=mysql_fetch_array($res);
				$idc = $resl["id_codigo"];
				
				$sql = "UPDATE pedido SET es_id = '".$e."' WHERE id_codigo = '".$idc."'";
				$res = mysql_query($sql,Conectar::con());
			}
    		echo "exito";
		}
		else{echo "error";}
	}
	
	//obtener el pedido datos de envio
	public function datospedidos($id,$ide){
		$sql = "SELECT	*
			FROM
			pedido_envio
			INNER JOIN distrito ON pedido_envio.id_distrito = distrito.dis_id
			WHERE
			pedido_envio.pe_codigo = '".$id."' AND	pedido_envio.id_emp = ".$ide;
		$res = mysql_query($sql,Conectar::con());
		$resl=mysql_fetch_array($res);
		$this->pro=$resl;
		return $this->pro;
	}
	
	public function detallepedido($id){
		$sql = "SELECT	*
			FROM
			detalle_pedido
			WHERE
			detalle_pedido.pe_codigo = '".$id."'";
		$res = mysql_query($sql,Conectar::con());
		$resl=mysql_fetch_array($res);
		$this->pro=$resl;
		return $this->pro;
	}
	
	//obtener el pedido cliente
	public function getpepedido(){
		$id = $_GET["id"];
		$i = $_SESSION["ses_id"];
		//insertar tarea
		$sql = "SELECT	*
			FROM
			pedido
			INNER JOIN producto ON pedido.pro_id = producto.pro_id
			INNER JOIN usuario ON pedido.user_id = usuario.user_id
			WHERE
			pedido.pe_id = ".$id." and pedido.id_empresa=".$i;
		$res = mysql_query($sql,Conectar::con());
		$resl=mysql_fetch_array($res);
		$this->pro=$resl;
		return $this->pro;
	}
	
	//obtener el pedido
	public function estados(){
		//insertar tarea
		$sql = "SELECT	*
			FROM
			estado_pedido";
		$res = mysql_query($sql,Conectar::con());
		while($resl=mysql_fetch_array($res)){
			$this->prores[]=$resl;
		}
		return $this->prores;
	}
	

	//Nuevo Pedido por el vendedor y admin
	public function newpedido(){
		$array = json_decode($_POST['data']);
		$idVendedor = $_SESSION["ses_id"];
		$nVendedor = $_SESSION["ses_nombre"]." ".$_SESSION["ses_apellidos"];
		$idBotica = $_POST['idBotica'];
		$nbotica = $_POST['nbotica'];
		$ndistribucion = $_POST['ndistribucion'];
		$iddistribucion = $_POST['iddistribucion'];
		$TTotal = $_POST['TTotal'];
		$ex=0;
		foreach ($array as $k => $v2) {
			//antes de insertar, diminuimos el stck del producto a comprar
			$idproducto = $v2->idP;
			$cantVend = $v2->cantidad;
			$sql1 = "select *
					FROM
					producto
					WHERE
					producto.id_producto = ".$idproducto;
			$res1 = mysql_query($sql1,Conectar::con());
			$resl1=mysql_fetch_array($res1);
			$stockAct=$resl1["stock"];

			$stock = $stockAct - $cantVend;
			//ejecutamos sql y actualizamos stock
			$sql = "update producto set stock='".$stock."' where id_producto='".$idproducto."' and estado='A'";
			$res = mysql_query($sql,Conectar::con());
			if(isset($res)){
	    		$ex= 1;
			}
			else{$ex = 0;}
		}
		//comprovamos si se actualizo correctamente el stock de los productos
		if($ex == 1){
			//print_r(json_encode($array));
			$sql2 = "insert into pedidos values(null,'".$nbotica."','".$nVendedor."','".$ndistribucion."','".$TTotal."','".json_encode($array)."','".$idBotica."','".$iddistribucion."','".$idVendedor."',now(),'A',null)";

			$res2 = mysql_query($sql2,Conectar::con());
			if(isset($res2)){
				//consultamos correos a enviar pedido
				//obtener correo de botica
				$sql3 = "select *
						FROM
						botica
						WHERE
						botica.id_botica = ".$idBotica;
				$res3 = mysql_query($sql3,Conectar::con());
				$resl3=mysql_fetch_array($res3);
				$emailb=$resl3["emails"];
				//obtener correo de distribuidor
				$sql4 = "select *
						FROM
						distribuidor
						WHERE
						distribuidor.id_distribuidor = ".$iddistribucion;
				$res4 = mysql_query($sql4,Conectar::con());
				$resl4=mysql_fetch_array($res4);
				$emaild=$resl4["emails"];
				date_default_timezone_set("America/Lima"); 
				$fechap = date("d/m/Y h:i");
				//aqui envio el correo con los pedidos
				//$correos .= $resl2["correo"].",";
				$para  = $emailb.','.$emaild.',';
				$para .= 'cpprueba28@gmail.com';
				 
				// Asunto
				$titulo = 'Detalle del Pedido, realizado:'.date("Y-m-d");
				 
				// Cuerpo o mensaje
				$mensaje = '
				<html>
				<head>
				  <title>Detalle del pedido</title>
				</head>
				<body>
				  <p>Botica: '.$nbotica.'</p>
				  <p>Distribuidor: '.$ndistribucion.'</p>
				  <p>Vendedor: '.$nVendedor.'</p>
				  <p>Fecha: '.$fechap.'</p>
				  <table rules="all" style="border-color: #666;" cellpadding="10">
				    <tr style="background: #eee;">
				      <th>Producto</th><th>Precio</th><th>Cant.</th><th>Subtotal</th>
				    </tr>';
				    $STotal= 0;
				    foreach ($array as $k => $v2) {
				    	$mensaje.='<tr><td>'.$v2->nombre.'</td><td>'.$v2->precio.'</td><td>'.$v2->cantidad.'</td><td>'.$v2->subtotal.'</td></tr>';
				    	$STotal =$STotal + $v2->subtotal;
					}
					$IGV1 = $STotal*(18/100);
		            $IGV = number_format((float)$IGV1, 2, '.', '');
		            $Total1 = $STotal+$IGV;
		            $Total = number_format((float)$Total1, 2, '.', '');
				$mensaje.='<tr style="border-top:2px solid #000;">
				      <td></td><td></td><td>SubTotal</td><td>'.$STotal.'</td></tr>
				      <tr><td></td><td></td><td>IGV</td><td>'.$IGV.'</td></tr>
				      <tr><td></td><td></td><td><strong>TOTAL</strong></td><td><strong>'.$Total.'</strong></td>
				    </tr>
				  </table>
				</body>
				</html>';
				 
				// Cabecera que especifica que es un HMTL
				$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
				$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				 
				// Cabeceras adicionales
				$cabeceras .= 'From: Pedidos <crearperu@example.com>' . "\r\n";
				$cabeceras .= 'Cc: crearperu@example.com' . "\r\n";
				$cabeceras .= 'Bcc: crearperu@example.com' . "\r\n";
				 
				// enviamos el correo!
				mail($para, $titulo, $mensaje, $cabeceras);
				//fin de envio
	    		echo "exito";
			}
			else{echo "error";}
		}
		else{
			echo "error1";
		}
	}

	//Nuevo Pedido por la botica
	public function bnewpedido(){
		$array = json_decode($_POST['data']);
		$idBotica = $_SESSION["ses_id"];
		$nbotica = $_SESSION["ses_nombre"];
		$ndistribucion = $_POST['ndistribucion'];
		$iddistribucion = $_POST['iddistribucion'];
		$TTotal = $_POST['TTotal'];
		$ex=0;
		foreach ($array as $k => $v2) {
			//antes de insertar, diminuimos el stck del producto a comprar
			$idproducto = $v2->idP;
			$cantVend = $v2->cantidad;
			$sql1 = "select *
					FROM
					producto
					WHERE
					producto.id_producto = ".$idproducto;
			$res1 = mysql_query($sql1,Conectar::con());
			$resl1=mysql_fetch_array($res1);
			$stockAct=$resl1["stock"];

			$stock = $stockAct - $cantVend;
			//ejecutamos sql y actualizamos stock
			$sql = "update producto set stock='".$stock."' where id_producto='".$idproducto."' and estado='A'";
			$res = mysql_query($sql,Conectar::con());
			if(isset($res)){
	    		$ex= 1;
			}
			else{$ex = 0;}
		}
		//comprovamos si se actualizo correctamente el stock de los productos
		if($ex == 1){
			$sql2 = "insert into pedidos values(null,'".$nbotica."',null,'".$ndistribucion."','".$TTotal."','".json_encode($array)."','".$idBotica."','".$iddistribucion."',null,now(),'A','".$idBotica."')";

			$res2 = mysql_query($sql2,Conectar::con());
			if(isset($res2)){
				//consultamos correos a enviar pedido
				//obtener correo de botica
				$sql3 = "select *
						FROM
						botica
						WHERE
						botica.id_botica = ".$idBotica;
				$res3 = mysql_query($sql3,Conectar::con());
				$resl3=mysql_fetch_array($res3);
				$emailb=$resl3["emails"];
				//obtener correo de distribuidor
				$sql4 = "select *
						FROM
						distribuidor
						WHERE
						distribuidor.id_distribuidor = ".$iddistribucion;
				$res4 = mysql_query($sql4,Conectar::con());
				$resl4=mysql_fetch_array($res4);
				$emaild=$resl4["emails"];
				date_default_timezone_set("America/Lima"); 
				$fechap = date("d/m/Y h:i");
				//aqui envio el correo con los pedidos
				//$correos .= $resl2["correo"].",";
				$para  = $emailb.','.$emaild.',';
				$para .= 'cpprueba28@gmail.com';
				 
				// Asunto
				$titulo = 'Detalle del Pedido, realizado:'.date("Y-m-d");
				
				// Cuerpo o mensaje
				$mensaje = '
				<html>
				<head>
				  <title>Detalle del pedido</title>
				</head>
				<body>
				  <p>Botica: '.$nbotica.'</p>
				  <p>Distribuidor: '.$ndistribucion.'</p>
				  <p>Vendedor: '.$nbotica.'</p>
				  <p>Fecha: '.$fechap.'</p>
				  <table rules="all" style="border-color: #666;" cellpadding="10">
				    <tr style="background: #eee;">
				      <th>Producto</th><th>Precio</th><th>Cant.</th><th>Subtotal</th>
				    </tr>';
				    $STotal= 0;
				    foreach ($array as $k => $v2) {
				    	$mensaje.='<tr><td>'.$v2->nombre.'</td><td>'.$v2->precio.'</td><td>'.$v2->cantidad.'</td><td>'.$v2->subtotal.'</td></tr>';
				    	$STotal =$STotal + $v2->subtotal;
					}
					$IGV1 = $STotal*(18/100);
		            $IGV = number_format((float)$IGV1, 2, '.', '');
		            $Total1 = $STotal+$IGV;
		            $Total = number_format((float)$Total1, 2, '.', '');
				$mensaje.='<tr style="border-top: 2px solid #000;">
				      <td></td><td></td><td>SubTotal</td><td>'.$STotal.'</td></tr>
				      <tr><td></td><td></td><td>IGV</td><td>'.$IGV.'</td></tr>
				      <tr><td></td><td></td><td><strong>TOTAL</strong></td><td><strong>'.$Total.'</strong></td>
				    </tr>
				  </table>
				</body>
				</html>';
				 
				// Cabecera que especifica que es un HMTL
				$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
				$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				 
				// Cabeceras adicionales
				$cabeceras .= 'From: Pedidos <crearperu@example.com>' . "\r\n";
				$cabeceras .= 'Cc: crearperu@example.com' . "\r\n";
				$cabeceras .= 'Bcc: crearperu@example.com' . "\r\n";
				 
				// enviamos el correo!
				mail($para, $titulo, $mensaje, $cabeceras);
	    		echo "exito";
			}
			else{echo "error";}
		}
		else{
			echo "error1";
		}
	}

	//Actualizar producto
	public function updateproducto(){
		$idU = $_POST["idproducto"];
		$cproducto = $_POST["cproducto"];
		$nproducto = $_POST["nproducto"];
		$dproducto = $_POST["dproducto"];
		$precio = $_POST["precio"];
		$stock = $_POST["stock"];

		$fotoelina = false;
		// foto
		if(isset($_POST["foto"])){
			$foto = $_POST['foto'];

			$porciones = explode(" ",utf8_decode($cproducto));
			$nombre = $porciones[0];
			$nombre .= date("Y-m-d");
			$nombre .= date("h-i-s");
			$nombre .= ".png";
			list(,$Base64img)=explode(',', $foto);
			list(,$Base64img)=explode(',', $foto);
			$Base64img=base64_decode($Base64img);
			file_put_contents("upload/".$nombre, $Base64img);


			///consultamos imagen para eliminar
			$sql1 = "select *
					FROM
					producto
					WHERE
					producto.id_producto = ".$idU;
			$res1 = mysql_query($sql1,Conectar::con());
			$resl1=mysql_fetch_array($res1);
			$fotoelina=$resl1["imagen"];

			//actualiza producto
			$sql = "update producto set codigo='".$cproducto."',nombre='".$nproducto."',descripcion='".$dproducto."',precio='".$precio."',stock='".$stock."',imagen='".$nombre."',estado='A' where id_producto='".$idU."'";
		}
		else{
		//actualiza tarea
		$sql = "update producto set codigo='".$cproducto."',nombre='".$nproducto."',descripcion='".$dproducto."',precio='".$precio."',stock='".$stock."',estado='A' where id_producto='".$idU."'";
		}

		$res = mysql_query($sql,Conectar::con());
		if(isset($res)){
			if($fotoelina){
				unlink("upload/".$fotoelina);
			}
    		echo "exito";
		}
		else{echo "error";}
	}

	//Eliminar Producto
	public function deleteproducto(){
		$idproducto = $_POST["idproducto"];
		///consultamos imagen para eliminar
		$sql = "select *
				FROM
				producto
				WHERE
				producto.id_producto = ".$idproducto;
		$res = mysql_query($sql,Conectar::con());
		$resl=mysql_fetch_array($res);
		$fotoelina=$resl["imagen"];

		$sql = "delete  from producto where id_producto='".$idproducto."'";
		$res = mysql_query($sql,Conectar::con());
		if(isset($res)){
			if($fotoelina){
				unlink("upload/".$fotoelina);
			}
    		echo "exito";
		}
		else{echo "error";}
	}

	// Obtener la lista de pedidos del vendedor
	public function vpedidos(){
		$idV =  $_SESSION["ses_id"];
		//insertar tarea
		$sql = "select *
				FROM
				pedidos
				WHERE
				pedidos.id_vendedor = ".$idV."
				ORDER BY
				pedidos.fecha DESC";
		$res = mysql_query($sql,Conectar::con());
		while($resl=mysql_fetch_array($res)){
			$this->prores[]=$resl;
		}
		return $this->prores;
	}

	// Obtener Producto para Modal
	public function idPedido(){
		$id = $_POST["idPedido"];
		//insertar tarea
		$sql = "select *
				FROM
				pedidos
				WHERE
				pedidos.id_pedido = ".$id;
		$res = mysql_query($sql,Conectar::con());
		$resl=mysql_fetch_array($res);
		$this->pro=$resl;
		return $this->pro;
	}
	// Obtener la lista de pedidos realizado por las boticas
	public function bpedidos(){
		$idV =  $_SESSION["ses_id"];
		//insertar tarea
		$sql = "select *
				FROM
				pedidos
				WHERE
				pedidos.idv_botica = ".$idV."
				ORDER BY
				pedidos.fecha DESC";
		$res = mysql_query($sql,Conectar::con());
		while($resl=mysql_fetch_array($res)){
			$this->prores[]=$resl;
		}
		return $this->prores;
	}
	// Obtener Producto para Modal por boticas
	public function idbPedido(){
		$id = $_POST["idPedido"];
		//insertar tarea
		$sql = "select *
				FROM
				pedidos
				WHERE
				pedidos.id_pedido = ".$id;
		$res = mysql_query($sql,Conectar::con());
		$resl=mysql_fetch_array($res);
		$this->pro=$resl;
		return $this->pro;
	}
	//para el administrador lista de pedidos
	public function listpedidos(){
		//insertar tarea
		$sql = "select *
				FROM
				pedidos
				WHERE
				pedidos.estado = 'A'
				ORDER BY
				pedidos.fecha DESC";
		$res = mysql_query($sql,Conectar::con());
		while($resl=mysql_fetch_array($res)){
			$this->prores[]=$resl;
		}
		return $this->prores;
	}
}