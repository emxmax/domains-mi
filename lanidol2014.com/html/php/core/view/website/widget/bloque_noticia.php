<?php
$media=XMLParser::getArray_Media($oWidget->media);
$parameter=XMLParser::getArray_Parameter($oWidget->parameter);

$icono=isset($media['icono'])? $URL_ROOT.$media['icono']['Url']: '';
$imagen=isset($media['imagen'])? '<img src="'.$URL_ROOT.$media['imagen']['Url'].'" />': '';


$templateID=34; //Página de Noticias
$sectionID=5; //Acerda de
$lPaginaNoticia=CmsContentLang::getWebList_Template($templateID, $sectionID, $langID, $minisiteID);

if($oWidget!=NULL && $lPaginaNoticia->getLength()>0){
	$oPaginaNoticia=$lPaginaNoticia->getItem(0);
?>        
        <div class="largo-titulo"><?php echo TextParser::UpperCase($oWidget->title);?></div>
            <div class="largo-contenido">
		<?php
		$i=0;

		$lNoticia=CmsContentLang::getWebList($oPaginaNoticia->contentID, $sectionID, $langID, $minisiteID, 'clan.date DESC', true);
		$rows=$lNoticia->getLength();
        foreach($lNoticia as $oItem){

			$i++;
			$fecha=strtotime($oItem->date);
			$dia=date("d", $fecha);
			$mes=strtoupper(date("M", $fecha));
			
			$clsNoticia=($i%2==0)? 'ultimo': NULL;
		?>
                <div class="<?php echo $clsNoticia; ?>">
                    <div class="noticias-fecha">
                        <span class="noticias-fecha-dia"><?php echo $dia;?></span><br />
                        <span class="noticias-fecha-mes"><?php echo $mes;?></span>
                    </div>
                    <div class="largo-texto">
                        <span class="largo-texto-titulo"><?php echo $oItem->title;?></span>
                        <span class="noticias-texto-contenido"><?php echo $oItem->resumen;?></span><br>
                        <a class="noticias-texto-vermas" href="<?php echo SEO::get_URLContent($oPaginaNoticia, 'nID='.$oItem->contentID); ?>">VER M&Aacute;S</a>
                    </div>
                </div>
		<?php
			if($clsNoticia!=NULL) break;
        }
		?>
            </div>
<?php
}
?>