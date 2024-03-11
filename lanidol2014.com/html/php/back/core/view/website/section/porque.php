<?php
if(!isset($oSectionLang->parameter['video'])) $oSectionLang->parameter['video']=NULL;
if(!isset($oSectionLang->parameter['enlaceID'])) $oSectionLang->parameter['enlaceID']=NULL;
?>
<style type="text/css">
@import url('<?php echo $URL_BASE;?>css/verde.css');
</style>
	<div class="titulo"><?php echo TextParser::UpperCase($oSectionLang->title);?></div>
            <div class="texto">
           	  <div <?php if($oSectionLang->parameter['video']!="") echo 'class="content"'; ?>>
                    <div class="subtitulo-big"><?php echo TextParser::UpperCase($oSectionLang->subTitle);?></div>
                    <div class="texto">
<?php 

		echo $oSectionLang->description;

?>
                    </div>
                    <span class="a-verde"><a href="<?php echo SEO::get_URLRedirect($oSectionLang->parameter['enlaceID'], $oSectionLang->langID, $oSectionLang->minisiteID); ?>">VER M&Aacute;S</a></span>
              </div>
<?php if($oSectionLang->parameter['video']!=""){ ?>
        	<div class="video">
        	  <iframe width="335" height="220" src="<?php echo $oSectionLang->parameter['video']; ?>" frameborder="0" allowfullscreen></iframe>
        	</div>
            <div id="share">
                <div id="sharre" data-url="<?php echo $oSectionLang->parameter['video'];?>" data-text="Inteligo SAB" class="sharrre"><div class="box"><div class="left">Compatir</div><div class="middle"><a href="#" class="facebook">Facebook</a><a href="#" class="twitter">Twitter</a><a href="#" class="googlePlus">Google +</a></div><div class="right">1</div></div></div>
            </div>
<?php }?>
<?php
$lModulo=CmsContentLang::getWebList_Scheme(56, $oSectionLang->langID, $oSectionLang->minisiteID);
if($lModulo->getLength()>0){
?>
              <div class="modulos-largo-par">
				<?php
				foreach($lModulo as $oItem){
					$oItem->media=XMLParser::getArray_Media($oItem->media);
					if(!isset($oItem->media['icono'])) $oItem->media['icono']=NULL;

					$oLink=SEO::get_ContentLink($oItem);
				?>
                    <div>
                        <div class="subtitulo-par"><?php echo TextParser::UpperCase($oItem->title); ?></div>
                        <div class="modulos-par-container">  
                            <div class="imagen-big"><img src="<?php echo $URL_ROOT.$oItem->media['icono']['Url']; ?>" /></div>
                            <div class="texto"><?php echo $oItem->description; ?></div>
                            <span class="a-verde"><a href="<?php echo $oLink->url; ?>" target="<?php echo $oLink->target; ?>">VER M&Aacute;S</a></span>
                        </div>
                    </div>
				<?php } ?>
              </div>
<?php
}
?>
            </div>
        </div>