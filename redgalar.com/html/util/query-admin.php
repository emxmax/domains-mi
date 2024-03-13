<?php
	
	include "fns_db.php";
	$cn = db_connect();
	
	$sqlPedidos = "SELECT pe.*, es.* FROM pedido pe INNER JOIN estado_pedido es ON pe.es_id=es.es_id";
	$rsPedidos = mysql_query($sqlPedidos);
	$nPedidos = mysql_num_rows($rsPedidos);

?>