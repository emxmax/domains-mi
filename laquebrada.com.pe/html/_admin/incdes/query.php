	<?php
	include "fns_db.php";
	$cn = db_connect();
	
	$sqlAnuncioAdmin = "SELECT anun_id, anun_titulo, anun_img, anun_desc ,nivel_id FROM anuncio";
	$rsAnuncioAdmin = mysql_query($sqlAnuncioAdmin);
	$nAnuncioAdmin = mysql_num_rows($rsAnuncioAdmin);

	$sqlNivelAdmin = "SELECT nivel_id, nivel_name FROM nivel where nivel_id NOT LIKE 4";
	$rsNivelAdmin = mysql_query($sqlNivelAdmin);
	$nNivelAdmin = mysql_num_rows($rsNivelAdmin);

	$sqlNivel2Admin = "SELECT nivel_id, nivel_name FROM nivel where nivel_id NOT LIKE 3";
	$rsNivel2Admin = mysql_query($sqlNivel2Admin);
	$nNivel2Admin = mysql_num_rows($rsNivel2Admin);

	$sqlDocumentoAdmin = "SELECT doc_id, doc_name, doc_img, doc_arch ,nivel_id FROM documento";
	$rsDocumentoAdmin = mysql_query($sqlDocumentoAdmin);
	$nDocumentoAdmin = mysql_num_rows($rsDocumentoAdmin);

	$sqlAnexoAdmin = "SELECT anex.anex_id, anex.anex_name, anex.anex_titulo, anex.anex_arch ,
	tarch.tarch_name, doc.doc_name FROM anexo anex
	INNER JOIN documento doc ON anex.doc_id=doc.doc_id INNER JOIN tarchivo tarch ON anex.tarch_id=tarch.tarch_id ORDER BY anex.anex_id";
	$rsAnexoAdmin = mysql_query($sqlAnexoAdmin);
	$nAnexoAdmin = mysql_num_rows($rsAnexoAdmin);

	$sqlTarchivoAdmin = "SELECT tarch_id, tarch_name, tarch_img FROM tarchivo";
	$rsTarchivoAdmin = mysql_query($sqlTarchivoAdmin);
	$nTarchivoAdmin = mysql_num_rows($rsTarchivoAdmin);

	$sqlUsuarioAdmin = "SELECT user.user_id, user.user_name, user.user_nick, user.user_pass, ni.nivel_name FROM usuario user INNER JOIN nivel ni ON user.nivel_id=ni.nivel_id ORDER BY user.user_id";
	$rsUsuarioAdmin = mysql_query($sqlUsuarioAdmin);
	$nUsuarioAdmin = mysql_num_rows($rsUsuarioAdmin);

	$sqlFotoAdmin = "SELECT fot_id, fot_name, fot_img FROM foto";
	$rsFotoAdmin = mysql_query($sqlFotoAdmin);
	$nFotoAdmin = mysql_num_rows($rsFotoAdmin);

	$sqlVideoAdmin = "SELECT vid_id, vid_name, vid_url FROM video";
	$rsVideoAdmin = mysql_query($sqlVideoAdmin);
	$nVideoAdmin = mysql_num_rows($rsVideoAdmin);

	$sqlPlanoAdmin = "SELECT plan_id, plan_name, plan_img, plan_arch FROM plano";
	$rsPlanoAdmin = mysql_query($sqlPlanoAdmin);
	$nPlanoAdmin = mysql_num_rows($rsPlanoAdmin);

	$sqlGaleriaAdmin = "SELECT gal_id, gal_titulo, gal_desc, gal_img FROM galeria";
	$rsGaleriaAdmin = mysql_query($sqlGaleriaAdmin);
	$nGaleriaAdmin = mysql_num_rows($rsGaleriaAdmin); 

	$sqlFGaleriaAdmin = "SELECT fg.fgal_id, fg.fgal_img, g.gal_titulo FROM foto_galeria fg inner join galeria g on fg.gal_id=g.gal_id";
	$rsFGaleriaAdmin = mysql_query($sqlFGaleriaAdmin);
	$nFGaleriaAdmin = mysql_num_rows($rsFGaleriaAdmin); 

	$sqlTituloGaleriaAdmin = "SELECT gal_id, gal_titulo FROM galeria";
	$rsTituloGaleriaAdmin = mysql_query($sqlTituloGaleriaAdmin);
	$nTituloGaleriaAdmin = mysql_num_rows($rsTituloGaleriaAdmin); 

	?>