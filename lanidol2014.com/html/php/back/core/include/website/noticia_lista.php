<?php
    $i=0;
    $lNoticia=CmsContentLang::getWebList($oContentLang->contentID, $oContentLang->sectionID, $oContentLang->langID, $oContentLang->minisiteID, 'clan.date DESC');
    foreach($lNoticia as $oItem){

        $fecha=strtotime($oItem->date);
        $dia=date("d", $fecha);
        $mes=strtoupper(strftime("%b", $fecha));
    
        $oLink=SEO::get_ContentLink($oContentLang, 'nID='.$oItem->contentID);
    ?>
      <div class="item">
        <div class="noticias-fecha"> <span class="noticias-fecha-dia"><?php echo $dia;?></span><br />
          <span class="noticias-fecha-mes"><?php echo $mes;?></span></div>
        <div class="noticia-texto"> <span class="noticias-texto-titulo"><?php echo $oItem->title;?></span> <span class="noticias-texto-contenido"><?php echo $oItem->resumen;?></span><br>
          <a class="noticias-texto-vermas" href="<?php echo $oLink->url; ?>" target="<?php echo $oLink->target; ?>">VER M&Aacute;S</a></div>
      </div>
      <div class="classHR"></div>
    <?php
    }
?>