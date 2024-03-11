<?php
if(isset($oItem))
	$lAccesos=CmsContentLang::getWebList($oItem->contentID, $oItem->sectionID, $oItem->langID, $oItem->minisiteID);
else{
	$sectionID=1;
	$langID=$PAGE->langID;
	$minisiteID=$PAGE->minisiteID;
	$parentTemplateID=15; //Bloque de accesos
	$lAccesos=CmsContentLang::getWebList_ParentTemplate($parentTemplateID, $sectionID, $langID, $minisiteID);
}

if($lAnimacion->getLength()>0){
?>
<div class="section-content">
	<div class="section">
<?php
foreach($lAccesos as $oItem){
	
	switch($oItem->templateID){
	case 17:
		include("../core/view/website/home/noticias.php");
		break;
	case 16:
		include("../core/view/website/home/widgets.php");
		break;
	}
}
?>    
	</div>
</div>
<?php
}
?>