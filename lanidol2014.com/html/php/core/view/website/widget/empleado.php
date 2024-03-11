<?php
$parameter=XMLParser::getArray_Parameter($oWidget->parameter);

$sectionID=5; //Acerda de
$lEmpleado=CmsContentLang::getWebList($oWidget->linkContentID, $sectionID, $langID, $minisiteID);
?>        
    <div class="modulos-linea-titulo titulo-<?php echo $estilo;?>"><?php echo TextParser::UpperCase($oWidget->title);?></div>
    <div class="modulos-linea-container">  
<?php foreach($lEmpleado as $oItem){ ?>
	
<?php } ?>
    </div>
