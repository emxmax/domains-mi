<?php
header('Content-Type: text/html; charset=ISO-8859-1');
require_once("../core/include/admin/header_ajax.php");
require_once("../core/config/main.php");

$command	=(isset($_REQUEST['cmd'])) 	? $_REQUEST['cmd'] : NULL;

if($command=="list")
	getRandomView();
else
	NotFound();


function getRandomView(){
$list=CmsContentLang::getWebList(0, 3, 1, 0);
$count=$list->getLength();

if($count==0){
	NotFound();
	return;
}

echo '<table width="100%" border="0" cellspacing="0" cellpadding="10">';

CmsContentLang::$page=rand(0, intval($count/5)-1);
$list=CmsContentLang::getWebList_Paging(0, 3, 1, 0);

foreach($list as $obj){
$arrMedia=XMLParser::getArray_Media($obj->media);
$img_bullet	=isset($arrMedia["bullet"]) ? $arrMedia["bullet"]["Url"] : NULL;

echo '  <tr>
		<td width="18" valign="top"><img src="../'.$img_bullet.'" width="20" height="20" /></td>
		<td valign="top"><a href="index.php?module=consejo&pID='.$obj->contentID.'" target="_top" class="arial14azul">'.$obj->title.'</a></td>
	  </tr>
	';
}
echo '</table>';
}
/*
function getRandomView(){
	$view="respuestas".rand(1, 4).".html";
	echo file_get_contents("../view/website/respuesta/".$view);
}
*/
function NotFound(){
	echo '<table width="725" height="366">
			<tr><th align="center">No se han encontrado resultados</th>
		<tr></table>';
}

?>
