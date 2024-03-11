<?php
/*
//Home Values
$sectionID=1;
$langID=$PAGE->langID;
$minisiteID=$PAGE->minisiteID;
$parentContentID=0; //root

$lHome=CmsContentLang::getWebList($parentContentID, $sectionID, $langID, $minisiteID);
foreach($lHome as $oItem){
	
	switch($oItem->templateID){
	case 14:
		include("../core/view/website/home/animacion.php");
		break;
	case 22:
		include("../core/include/website/indicadores.php");
		break;
	case 15:
		include("../core/view/website/home/accesos.php");
		break;
	case 18:
		include("../core/view/website/home/galeria.php");
		break;
	}
}
*/

include("../core/view/website/home/galeria.php");

?>
