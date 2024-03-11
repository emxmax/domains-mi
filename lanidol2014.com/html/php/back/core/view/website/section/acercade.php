<?php 
$lModulos=CmsContentLang::getWebList(0, $oSectionLang->sectionID, $oSectionLang->langID, $oSectionLang->minisiteID);
?>
<div class="titulo"><?php echo TextParser::UpperCase($oSectionLang->subTitle);?></div>
    <div class="texto">
<?php 
		
	echo $oSectionLang->description;

	$i=0;
    foreach($lModulos as $oItem){
	$oItem->resumen=TextParser::CleanText($oItem->resumen);
	$oItem->media=XMLParser::getArray_Media($oItem->media);
	$oItem->media['seccion_icono']=isset($oItem->media['seccion_icono'])? $oItem->media['seccion_icono']: NULL;
	$i++;
	?>
      <div class="modulos-cortos<?php if(($i%4)==0) echo " ultimo"; ?>">
            <img src="<?php echo $URL_ROOT.$oItem->media['seccion_icono']['Url'];?>" />
            <span class="subtitulo-cortos"><?php echo $oItem->title; ?></span>
            <div style="min-height:65px"><span class="texto-cortos"><?php echo (strlen($oItem->resumen)>105? substr($oItem->resumen,0, 105).'...': $oItem->resumen); ?></span></div>
            <span class="modulos-linea-contenido-a a-azul"><a href="<?php echo SEO::get_URLContent($oItem); ?>">VER M&Aacute;S</a></span>
      </div>
      <?php if(($i%4)==0) echo "<div class='clear'></div>"; ?>
<?php
    }
?>
    </div>
