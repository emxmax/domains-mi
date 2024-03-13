<?php
	
	include "util/funciones.php";
	include "util/fns_db.php";
	$cn = db_connect();

	$pro_id = $_POST["pro_id"];
	$user_id = $_POST["user_id"];

	$pe_de = $_POST["pe_de"];
	$pe_para = $_POST["pe_para"];
	$pe_dedicatoria = $_POST["pe_dedicatoria"];
	$pe_frase1 = $_POST["pe_frase1"];
	$pe_frase2 = $_POST["pe_frase2"];
	$pe_frase3 = $_POST["pe_frase3"];
	$pe_tema = $_POST["pe_tema"];
	$pe_tema_otro = $_POST["pe_tema_otro"];
	$pe_jugo = $_POST["pe_jugo"];
	$pe_bebida = $_POST["pe_bebida"];
	$pe_cerveza = $_POST["pe_cerveza"];
	$pe_aperitivo = $_POST["pe_aperitivo"];
	$pe_sandwiches = $_POST["pe_sandwiches"];
	$pe_salado = $_POST["pe_salado"];
	$pe_dulce = $_POST["pe_dulce"];
	$pe_galletas_artesanales = $_POST["pe_galletas_artesanales"];
	$pe_fo_1 = $_POST["pe_fo_1"];
	$pe_fo_2 = $_POST["pe_fo_2"];
	$pe_fo_3 = $_POST["pe_fo_3"];
	$pe_fo_4 = $_POST["pe_fo_4"];
	$pe_adicional_1 = $_POST["pe_adicional_1"];
	$pe_adicional_2 = $_POST["pe_adicional_2"];
	$pe_comenta = $_POST["pe_comenta"];
	$pe_persona_c = $_POST["pe_persona_c"];
	$pe_telf_dest = $_POST["pe_telf_dest"];
	$pe_telf_tu = $_POST["pe_telf_tu"];
	$pe_distrito = $_POST["pe_distrito"];
	$pe_lat = $_POST["pe_lat"];
	$pe_lng = $_POST["pe_lng"];
	$pe_direccion = $_POST["pe_direccion"];
	$pe_referencia = $_POST["pe_referencia"];
	$pe_fecha_pe = $_POST["pe_fecha_pe"];
	$pe_horario = $_POST["pe_horario"];
	$pe_comentario = $_POST["pe_comentario"];
	$pe_comprobante = $_POST["pe_comprobante"];
	$pe_c_tipo = $_POST["pe_c_tipo"];
	$pe_c_razon = $_POST["pe_c_razon"];
	$pe_c_direccion = $_POST["pe_c_direccion"];
	
	//cantidad and empresa
	$pe_cant = $_POST["pe_cant"];
	$id_empresa = $_POST["id_empresa"];
	
	$subprecio = $_POST["pe_precio"];
	$pe_p_delivery = $_POST["pe_p_delivery"];
	
	$pe_adicional = 0;
	if($pe_adicional_1 != ""){
		$pe_adicional = $pe_adicional + 12;
	}
	if($pe_adicional_2 != ""){
		$pe_adicional = $pe_adicional + 12;
	}
	
	if(!strcasecmp($_POST["pe_cupon"],"Redgalar2017")){
		//descontamos el 10%
		$d=1;
		$subprecio = $subprecio * $pe_cant;
		$subprecio = $subprecio - (0.10*$subprecio);
	}
	else{
		$subprecio = $subprecio * $pe_cant;
	}

	if($_FILES["pe_fo_1"]["name"]!==""){
		// Capturando el archivo
		$tmp_name_file1 = $_FILES["pe_fo_1"]["tmp_name"];
		$pe_fo_1 = generarCodigo(15).".jpg";
			
		// Moviendo el archivo a un directorio
		move_uploaded_file($tmp_name_file1,"fotos/$pe_fo_1");
	}else{
		$pe_fo_1 = "";
	}

	if($_FILES["pe_fo_2"]["name"]!==""){
		// Capturando el archivo
		$tmp_name_file2 = $_FILES["pe_fo_2"]["tmp_name"];
		$pe_fo_2 = generarCodigo(15).".jpg";
			
		// Moviendo el archivo a un directorio
		move_uploaded_file($tmp_name_file2,"fotos/$pe_fo_2");
	}else{
		$pe_fo_2 = "";
	}

	if($_FILES["pe_fo_3"]["name"]!==""){
		// Capturando el archivo
		$tmp_name_file3 = $_FILES["pe_fo_3"]["tmp_name"];
		$pe_fo_3 = generarCodigo(15).".jpg";
			
		// Moviendo el archivo a un directorio
		move_uploaded_file($tmp_name_file3,"fotos/$pe_fo_3");
	}else{
		$pe_fo_3 = "";
	}

	if($_FILES["pe_fo_4"]["name"]!==""){
		// Capturando el archivo
		$tmp_name_file4 = $_FILES["pe_fo_4"]["tmp_name"];
		$pe_fo_4 = generarCodigo(15).".jpg";
			
		// Moviendo el archivo a un directorio
		move_uploaded_file($tmp_name_file4,"fotos/$pe_fo_4");
	}else{
		$pe_fo_4 = "";
	}


	//Inserción en utf8
	mysql_query("SET NAMES 'utf8");

	$fecha= strftime( "%Y-%m-%d %H:%M:%S", time() );

	// Registrar datos a la tabla
	$sql = "INSERT INTO pedido (pe_fecha,pe_de,pe_para,pe_dedicatoria,pe_frase1,pe_frase2,pe_frase3,pe_tema,pe_tema_otro,pe_jugo,pe_bebida,pe_cerveza,pe_aperitivo,pe_sandwiches,pe_salado,pe_dulce,pe_galletas_artesanales,pe_fo_1,pe_fo_2,pe_fo_3,pe_fo_4,pe_adicional_1,pe_adicional_2,pe_comenta,pe_persona_c,pe_telf_dest,pe_telf_tu,pe_distrito,pe_direccion,pe_lat,pe_lng,pe_referencia,pe_fecha_pe,pe_horario,pe_comentario,pe_comprobante,pe_c_tipo,pe_c_razon,pe_c_direccion,user_id,pro_id,es_id,id_empresa,pe_cant,pe_subtotal,pe_p_adicional,pe_p_delivery) VALUES ('$fecha','$pe_de','$pe_para','$pe_dedicatoria','$pe_frase1','$pe_frase2','$pe_frase3','$pe_tema','$pe_tema_otro','$pe_jugo','$pe_bebida','$pe_cerveza','$pe_aperitivo','$pe_sandwiches','$pe_salado','$pe_dulce','$pe_galletas_artesanales','$pe_fo_1','$pe_fo_2','$pe_fo_3','$pe_fo_4','$pe_adicional_1','$pe_adicional_2','$pe_comenta','$pe_persona_c','$pe_telf_dest','$pe_telf_tu','$pe_distrito','$pe_direccion','$pe_lat','$pe_lng','$pe_referencia','$pe_fecha_pe','$pe_horario','$pe_comentario','$pe_comprobante','$pe_c_tipo','$pe_c_razon','$pe_c_direccion','$user_id','$pro_id',3,'$id_empresa','$pe_cant','$subprecio','$pe_adicional','$pe_p_delivery')";
	//$sql = "INSERT INTO pedido (pe_fecha,pe_de,pe_para,pe_dedicatoria,pe_frase1,pe_frase2,pe_frase3,pe_tema,pe_tema_otro,pe_jugo,pe_bebida,pe_cerveza,pe_aperitivo,pe_sandwiches,pe_salado,pe_dulce,pe_galletas_artesanales,pe_fo_1,pe_fo_2,pe_fo_3,pe_fo_4,pe_adicional_1,pe_adicional_2,pe_comenta,pe_persona_c,pe_telf_dest,pe_telf_tu,pe_distrito,pe_direccion,pe_lat,pe_lng,pe_referencia,pe_fecha_pe,pe_horario,pe_comentario,pe_comprobante,pe_c_tipo,pe_c_razon,pe_c_direccion,user_id,pro_id,es_id,id_empresa,pe_cant) VALUES ('$fecha','$pe_de','$pe_para','$pe_dedicatoria','$pe_frase1','$pe_frase2','$pe_frase3','$pe_tema','$pe_tema_otro','$pe_jugo','$pe_bebida','$pe_cerveza','$pe_aperitivo','$pe_sandwiches','$pe_salado','$pe_dulce','$pe_galletas_artesanales','$pe_fo_1','$pe_fo_2','$pe_fo_3','$pe_fo_4','$pe_adicional_1','$pe_adicional_2','$pe_comenta','$pe_persona_c','$pe_telf_dest','$pe_telf_tu','$pe_distrito','$pe_direccion','$pe_lat','$pe_lng','$pe_referencia','$pe_fecha_pe','$pe_horario','$pe_comentario','$pe_comprobante','$pe_c_tipo','$pe_c_razon','$pe_c_direccion','$user_id','$pro_id',3,'$id_empresa','$pe_cant')";

	if(mysql_query($sql,$cn)){
		$pe_id=mysql_insert_id();
		header("Location:detallepedido.php?pe_id=$pe_id");
	}else{
		header("Location:index.php");
	}
?>