	<?php
	include "fns_db.php";
	$cn = db_connect();

	$sqlDocumento = "SELECT doc_id, doc_name, doc_img, doc_arch FROM documento WHERE nivel_id=3 or nivel_id=".$_SESSION['nivel']." ORDER BY doc_pos";
	$rsDocumento = mysql_query($sqlDocumento);
	$nDocumento = mysql_num_rows($rsDocumento);
	
	$sqlAnuncio = "SELECT anun_id, anun_titulo, anun_img, anun_desc, anun_arch FROM anuncio WHERE nivel_id=3 or nivel_id=".$_SESSION['nivel'];
	$rsAnuncio = mysql_query($sqlAnuncio);
	$nAnuncio = mysql_num_rows($rsAnuncio);

	$sqlGaleria = "SELECT gal_id, gal_titulo, gal_desc, gal_img FROM galeria ORDER BY gal_id DESC";
	$rsGaleria = mysql_query($sqlGaleria);
	$nGaleria = mysql_num_rows($rsGaleria);

	?>