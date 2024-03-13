<?php
	include '../../util/fns_db.php';
	$cn = db_connect();
	
	$pe_id = $_GET['pe_id'];

	$sql = "UPDATE pedido SET 
				es_id = '1' 			
			WHERE pe_id = $pe_id";

	if(mysql_query($sql, $cn)){
		header("Location:index.php");
	}
?>