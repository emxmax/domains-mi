<?php
	include("../core/include/website/menu_sitemap.php");

$sectionID=3;
$langID=$PAGE->langID;
$minisiteID=$PAGE->minisiteID;
$parentContentID=0; //root

$lPie=CmsContentLang::getWebList($parentContentID, $sectionID, $langID, $minisiteID);
if($lPie->getLength()>0){
$lRedes=new Collection();
?>
<footer>
  <div class="section">
  
    <div class="footer-contenido">
	<?php
    foreach($lPie as $oItem){
		$lAcceso=CmsContentLang::getWebList($oItem->contentID, $oItem->sectionID, $oItem->langID, $oItem->minisiteID);
		if($oItem->schemeID==75){
			$lRedes=$lAcceso;
			continue;
		}
		
		if($oItem->schemeID==76){
			$legal='<span>LEGAL: </span>';
			$cls='politicas-footer';
			$fbox='class="pie" data-fancybox-type="iframe"';
		} 
		else{
			$legal='';
			$cls='links-footer';
			$fbox='';
		}
		
    ?>
        <div class="<?php echo $cls; ?>">
        	<?php echo $legal; ?>
        	<ul>
			<?php
            foreach($lAcceso as $oItem){
                $oItem->media=XMLParser::getArray_Media($oItem->media);
                $icono=isset($oItem->media['icono']['Url'])? '<img src="'.$URL_ROOT.$oItem->media['icono']['Url'].'" />': NULL;
                $oLink=SEO::get_ContentLink($oItem);
				if($fbox!='') $oLink->url.='?lightbox=1';
            ?>
            	<li><a href="<?php echo $oLink->url;?>" target="<?php echo $oLink->target;?>" <?php echo $fbox; ?> ><?php echo TextParser::UpperCase($oLink->text);?></a></li>
			<?php 
            }
            ?>
            </ul>
        </div>
	<?php 
    }
    ?>
    </div>
	<?php
    if($lRedes->getLength()>0){
    ?>
    <div class="redes-footer">
		<?php
		foreach($lRedes as $oItem){
			$oItem->media=XMLParser::getArray_Media($oItem->media);
			$icono=isset($oItem->media['icono']['Url'])? '<img src="'.$URL_ROOT.$oItem->media['icono']['Url'].'" />': NULL;
			$oLink=SEO::get_ContentLink($oItem);
		?>
        <div><a href="<?php echo $oLink->url;?>" target="<?php echo $oLink->target;?>"><?php echo $icono; ?></a></div>
		<?php } ?>
    </div>
	<?php 
    }
    ?>
  </div>
</footer>
<script type="text/javascript">
	$(".pie").fancybox({
		padding: 0,
		margin: 0,
		width: 550,
		fitToView	: false,
		autoSize	: true,
		closeClick	: false,
		openEffect	: 'fade',
		closeEffect	: 'fade',
		tpl: {
			closeBtn: '<div title="Close" class="fancybox-item fancybox-closeb"></div>'
		}			
	});
</script>
<?php
}
?>