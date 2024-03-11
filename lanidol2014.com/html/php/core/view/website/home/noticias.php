<?php
$langID=$PAGE->langID;
$minisiteID=$PAGE->minisiteID;

if(!isset($oItem)){
	$sectionID=1;
	$templateID=17; //Noticias (acceso directo)
	$lTmp=CmsContentLang::getWebList_Template($templateID, $sectionID, $langID, $minisiteID);
	$oItem=($lTmp->getLength()>0)? $lTmp->getItem(0): NULL;
}

$templateID=34; //Página de Noticias
$sectionID=5; //Acerda de
$lPaginaNoticia=CmsContentLang::getWebList_Template($templateID, $sectionID, $langID, $minisiteID);

if($oItem!=NULL && $lPaginaNoticia->getLength()>0){
	$oPaginaNoticia=$lPaginaNoticia->getItem(0);
?>
    	<div id="noticias-eventos">
            <div id="noticias-titulo"><?php echo TextParser::UpperCase($oItem->title);?></div>
                <div id="titulares">
                
                    <div class="CajaItem">
                    <ul>

		<?php
		$i=0;

		$lNoticia=CmsContentLang::getWebList($oPaginaNoticia->contentID, $sectionID, $langID, $minisiteID, 'clan.date DESC', true);
		$rows=$lNoticia->getLength();
        foreach($lNoticia as $oItem){

			$fecha=strtotime($oItem->date);
			$dia=date("d", $fecha);
			$mes=strtoupper(strftime("%b", $fecha));
		
			if(($i%2==0)) echo "<li>";
		?>
                      
                        <div>
                            <div class="noticias-fecha">
                                <span class="noticias-fecha-dia"><?php echo $dia;?></span><br />
                                <span class="noticias-fecha-mes"><?php echo $mes;?></span>
                            </div>
                            <div class="noticias-texto">
                            <span class="noticias-texto-titulo"><?php echo $oItem->title;?></span>
                            <span class="noticias-texto-contenido"><?php echo $oItem->resumen;?></span><br>
                            <a class="noticias-texto-vermas" href="<?php echo SEO::get_URLContent($oPaginaNoticia, 'nID='.$oItem->contentID); ?>">VER M&Aacute;S</a><br><br>
                            </div>
                        </div>
                        <div class="clear"></div>
		<?php
			$i++;
			if(($i%2==0) || $rows==$i) echo "</li>";
        }
		?>
					</ul>
                  </div>
            </div>
        </div>
<?php
}
?>
