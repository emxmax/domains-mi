<?php
$sectionID=$PAGE->sectionID;
$langID=$PAGE->langID;
$minisiteID=$PAGE->minisiteID;
$parentTemplateID=16; //Bloque de Widgets
$lWidgets=CmsContentLang::getWebList_ParentTemplate($parentTemplateID, $sectionID, $langID, $minisiteID);

if($lWidgets->getLength()>0){
?>
	<div class="section right">
    	<div class="modulos-linea">
<?php
	$w_i=0;
	$w_rows=$lWidgets->getLength();
	foreach($lWidgets as $oWidget){
		$w_i++;
		$oScheme=CmsScheme::getItem($oWidget->schemeID);
		$file_view ='../core/view/website/widget/'. $oScheme->webSource.'.php';
		if( file_exists( $file_view ) ){
			$class=($w_i==$w_rows || $w_rows<3)?'modulo':'';
			echo '<div class="'.(($oWidget->templateID==17)?'largo': $class).'">';
			include $file_view ;
			echo '</div>';
		}
		else
			$PAGE->addError("No se puede cargar el archivo => ".$file_view) ;
	}
?>
        </div>
    </div>
<?php
}
?>