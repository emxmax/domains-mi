<?php
if(isset($oItem))
	$lAnimacion=CmsContentLang::getWebList($oItem->contentID, $oItem->sectionID, $oItem->langID, $oItem->minisiteID);
else{
	$sectionID=1;
	$langID=$PAGE->langID;
	$minisiteID=$PAGE->minisiteID;
	$parentTemplateID=14; //Animacion Principal
	$lAnimacion=CmsContentLang::getWebList_ParentTemplate($parentTemplateID, $sectionID, $langID, $minisiteID);
}

if($lAnimacion->getLength()>0){
?>
<!-- section-banner -->
<div class="section-banner">
	<div class="section">
    	<div id="banner">
	<?php
    foreach($lAnimacion as $oItem){
        $oItem->parameter=XMLParser::getArray_Parameter($oItem->parameter);
        $oItem->media=XMLParser::getArray_Media($oItem->media);
		
        if(!isset($oItem->media['imagen'])) $oItem->media['imagen']=NULL;
        if(!isset($oItem->parameter['estilo']) || $oItem->parameter['estilo']=='') $oItem->parameter['estilo']='blanco';
		$oLink=SEO::get_ContentLink($oItem);
        ?>
            <div class="color-<?php echo $oItem->parameter['estilo'];?>" style="background:url(<?php echo $URL_ROOT.$oItem->media['imagen']["Url"];?>) right top no-repeat;">
                <span class="banner-titular"><?php echo (trim($oItem->title)!='')? $oItem->title: '&nbsp;';?></span>
                <span class="banner-texto"><?php echo $oItem->resumen;?></span><br>
                <?php if($oLink->url!='#'){?>
				<a class="banner-enlace" href="<?php echo $oLink->url;?>" target="<?php echo $oLink->target;?>">ver m&aacute;s</a>
                <?php }?>
            </div>
	<?php
    } ?>
        </div>
    </div>
</div>
<div class="clear"></div>
<?php
}
?>