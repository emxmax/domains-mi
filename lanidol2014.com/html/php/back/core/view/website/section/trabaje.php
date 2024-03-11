<?php 
$oSectionLang=$PAGE->oSectionLang;
?>
        <div class="titulo"><?php echo $oSectionLang->title;?></div>
        <div class="texto">
           	  <div class="modulos-largo">
                    <div class="texto">
                    <?php echo $oSectionLang->description;?>
		<?php
		$lModulo=CmsContentLang::getWebList_Scheme(81, $oSectionLang->langID, $oSectionLang->minisiteID);
		if($lModulo->getLength()>0){
        ?>
                    <ul class="fila-imagenesazul">
				<?php
				foreach($lModulo as $oItem){
					$oItem->media=XMLParser::getArray_Media($oItem->media);
					if(!isset($oItem->media['icono'])) $oItem->media['icono']=NULL;
					$oLink=SEO::get_ContentLink($oItem);
				?>
                    	<li><img src="<?php echo $URL_ROOT.$oItem->media['icono']['Url'];?>" alt="<?php echo $oLink->title; ?>" /><span><a href="<?php echo $oLink->url; ?>"><?php echo $oLink->text; ?></a></span></li>
				<?php } ?>
                    </ul>
		<?php
        }
        ?>
                	</div>
             </div>
       </div>
