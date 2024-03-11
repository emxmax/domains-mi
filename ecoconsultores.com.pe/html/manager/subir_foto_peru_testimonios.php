<?php

include_once ("conexion.php");
$link= conectarse();

if (is_uploaded_file($_FILES['foto']['tmp_name']))    {

	$nombre=$_FILES['foto']['name'];
	
	move_uploaded_file ($_FILES['foto']['tmp_name'] , "imgs_dinamicas/imgs_peru_testimonios/".$nombre);
	
	mysql_query("insert into peru_img_testimonios (foto) values ('".$nombre."')", $link);
	
	//mysql_query("INSERT INTO imagenes (nombre,imagen) VALUES ('$nombre','$imagen')");
	
	//echo "Archivo: $nombre tipo: $tipo Peso: $peso";
	
	mysql_close ($link);
	
	header("Location: buscar_peru_img_testimonios.php?".rand(1,9999));exit;
	}
?>