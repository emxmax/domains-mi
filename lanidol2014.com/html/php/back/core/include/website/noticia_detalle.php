<?php
$oNoticia=CmsContentLang::getItem($noticiaID, $PAGE->langID);
if($oNoticia!=NULL){
$media=XMLParser::getArray_Media($oNoticia->media);
?>
      <div class="item">
        <h2><?php echo $oNoticia->title;?></h2>
        <p class="textoSub"><?php echo $oNoticia->resumen;?></p>
	<?php 
		if(isset($media['imagen']) && $media['imagen']['Url']!=""){
	?>
            <div class="divImg">
              <p><img src="<?php echo $URL_ROOT.$media['imagen']['Url']; ?>" alt="<?php echo htmlentities($oNoticia->title);?>"></p>
              <p><?php echo $oNoticia->subTitle;?></p>
            </div>
	<?php
    	}
    	echo $oNoticia->description;
	?>
	</div>
<?php
}
?>