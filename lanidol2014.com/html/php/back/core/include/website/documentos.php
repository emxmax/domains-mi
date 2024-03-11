<?php
if(isset($oItem))
	$lDocumentos=CmsContentLang::getWebList($oItem->contentID, $oItem->sectionID, $oItem->langID, $oItem->minisiteID);
else
{
	if(isset($oContentLang)){
		$templateID	=7; //Documentos
		$lDocumentos=CmsContentLang::getWebList_Template($templateID, $oContentLang->sectionID, $oContentLang->langID, $oContentLang->minisiteID);
	}
	else
		$lDocumentos=new Collection();
}

foreach($lDocumentos as $oDocumento){
	$oDocumento->media=XMLParser::getArray_Media($oDocumento->media);
	$title=TextParser::UpperCase($oDocumento->title);
	$resumen=$oDocumento->resumen;
	
	$fecha=date("d/m/Y", strtotime($oDocumento->date));
	$descarga=isset($oDocumento->media['documento']['Url'])? '<a href="'.$URL_ROOT.$oDocumento->media['documento']['Url'].'" target="_blank">Descargar documento</a>': $oDocumento->title;
?>
  <h3><?php echo $title; ?></h3>
  <span class="fecha">Fecha: <?php echo $fecha; ?></span>
    <?php echo $resumen; ?>
  <ul class="pdf">
    <li><?php echo $descarga;?></li>
  </ul>
  <div class="classHR"></div>
<?php
}
?>