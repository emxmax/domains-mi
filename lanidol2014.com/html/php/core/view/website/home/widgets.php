<?php

$sectionID=1;
$langID=$PAGE->langID;
$minisiteID=$PAGE->minisiteID;
$parentTemplateID=16; //Bloque de widgets
$lWidgets=CmsContentLang::getWebList_ParentTemplate($parentTemplateID, $sectionID, $langID, $minisiteID);
?>
<div class="modulos">
<?php
foreach($lWidgets as $oWidget){
   	$media=XMLParser::getArray_Media($oWidget->media);
   	$parameter=XMLParser::getArray_Parameter($oWidget->parameter);

	$icono=isset($media['icono'])? $URL_ROOT.$media['icono']['Url']: '';
	$imagen=isset($media['imagen'])? '<img src="'.$URL_ROOT.$media['imagen']['Url'].'" />': '';

	$estilo=isset($parameter['estilo'])? $parameter['estilo']: '';

?>        
            <div>
                <div class="modulos-titulo <?php echo $estilo;?>" style="background: transparent url(<?php echo $icono;?>) left 1px no-repeat;"><?php echo TextParser::UpperCase($oWidget->title);?></div>
                   <div class="modulos-container"> 
	<?php
    	if($oWidget->templateID==11){
			$lSubNivel=CmsContentLang::getWebList($oWidget->contentID, $oWidget->sectionID, $oWidget->langID, $oWidget->minisiteID);
			foreach($lSubNivel as $oItem){
			$oLink=SEO::get_ContentLink($oItem);
    ?>
                    <span class="modulos-contenido-subtitulo sub-analisis"><?php echo $oItem->title;?></span>
                    <span class="modulos-contenido-texto texto-analisis"><?php echo $oItem->resumen;?><a class="a-analisis" href="<?php echo $oLink->url;?>" target="<?php echo $oLink->target;?>">[+]</a></span>
    <?php
			}
    	}
		else{
	
		$oLink=SEO::get_ContentLink($oWidget);
	?>
                        <div class="modulos-imagen"><?php echo $imagen;?></div>
                        <div class="modulos-contenido">
                        <span class="modulos-contenido-subtitulo" style="width:100%"><?php echo $oWidget->subTitle;?></span>
                        <span class="modulos-contenido-texto"><?php echo $oWidget->resumen;?></span>
                        <span class="a-<?php echo $estilo;?>"><a href="<?php echo $oLink->url;?>" target="<?php echo $oLink->target;?>">INGRESAR</a></span>
	<?php
    	}
    ?>
                    </div>
                </div>
            </div>
<?php
	}
?>
</div>
