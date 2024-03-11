	<?php
	include "fns_db.php";
	$cn = db_connect();

	$sqlClienteAdmin = "SELECT cli_id, cli_name, cli_codigo, cli_email FROM cliente";
	$rsClienteAdmin = mysql_query($sqlClienteAdmin);
	$nClienteAdmin = mysql_num_rows($rsClienteAdmin);

	$sqlReAdmin = "SELECT re.re_id, re.re_name, re.re_dir, re.re_email, re.re_telf, cli.cli_name FROM referido re INNER JOIN cliente cli ON cli.cli_email=re.cli_email";
	$rsReAdmin = mysql_query($sqlReAdmin);
	$nReAdmin = mysql_num_rows($rsReAdmin);

	?>