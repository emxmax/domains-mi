<?php
$parentContentID=0;
$sectionID=$PAGE->sectionID;
$langID=$PAGE->langID;
$minisiteID=$PAGE->minisiteID;

$lGaleria=CmsContentLang::getWebList_Likes($parentContentID, $sectionID, $langID, $minisiteID);
?>
  <div class="photo-grid">
  	<ul class="photo-feed">

<?php
foreach ($lGaleria as $oItem) {
$media=XMLParser::getArray_Media($oItem->media);	
$titulo=$oItem->title;
$img_icono=isset($media['icono']['Url'])? $media['icono']['Url']: null;
$url_foto=SEO::get_URLContent($oItem, 'lightbox=1');
$id_foto=$oItem->contentID;
$totalLikes=$oItem->totalLikes;
?>  
<li class="photo">
<div class="photo-wrapper">
<a id="various5" href="<?php echo $url_foto;?>" class="bg"></a>
<div class="photo-date">
<span><?php echo $titulo;?></span>
</div>
<a id="various5" href="<?php echo $url_foto;?>">
<div class="imgContainer imgLoaded imgWithTransition">
<div class="imgImg image" style="background-image:url(<?php echo $URL_ROOT.$img_icono;?>);"></div>
</div>
<div class="photoShadow"></div>
</a>
<ul class="photo-stats">
<li class="stat-likes" rel="<?php echo $id_foto;?>"><b><?php echo $totalLikes;?></b></li>
</ul>
</div>
</li>
<?php
}
?>

</ul>
  
</div>