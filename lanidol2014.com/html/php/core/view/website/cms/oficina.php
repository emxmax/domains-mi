<?php 
$oParent=CmsContentLang::getItem($oContentLang->parentContentID, $oContentLang->langID, $oContentLang->minisiteID);

$direccion=TextParser::nl2BR($oContentLang->resumen);
$telefono=isset($oContentLang->parameter['telefono'])? $oContentLang->parameter['telefono']: NULL;
$fax=isset($oContentLang->parameter['fax'])? $oContentLang->parameter['fax']: NULL;
$email=($oContentLang->subTitle!='')? '<span class="mail-cortos"><a href="mailto:'.$oContentLang->subTitle.';">'.$oContentLang->subTitle.'</a></span>':NULL;
$icono=isset($oContentLang->media['icono']['Url'])? '<img src="'.$URL_ROOT.$oContentLang->media['icono']['Url'].'" />': NULL;

if($telefono!=NULL) $direccion .= "<br /><strong>T: </strong>".$telefono;
if($fax!=NULL) $direccion .= "<br /><strong>F: </strong>".$fax;
$contacto='<span class="texto-cortos"><strong>Direcci&oacute;n: </strong>'.$direccion .'</span>'.$email;

$lat=isset($oContentLang->parameter['lat'])? $oContentLang->parameter['lat']: NULL;
$lng=isset($oContentLang->parameter['lng'])? $oContentLang->parameter['lng']: NULL;

?>
<div class="titulo"><?php echo TextParser::UpperCase($oParent->title);?></div>
<div class="texto">
    <?php if($oContentLang->description!="") echo "<p>".$oContentLang->description."</p>";?>
	<?php echo $contacto; ?>
	<div id="map"></div>
</div>
<?php
if($lat!=NULL && $lng!=NULL){
?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="<?php echo $URL_BASE;?>js/gmaps.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var map = new GMaps({
	div: '#map',
	lat: <?php echo $lat;?>,
	lng: <?php echo $lng;?>,
	zoom: 16
	});
	
	map.addMarker({	
	lat: <?php echo $lat;?>,
    lng: <?php echo $lng;?>,
	title: '<?php echo $oContentLang->title;?>',
        infoWindow: { content: '<div class="imagen-small"><?php echo $icono;?></div><div class="modulos-cortos-gmaps"><?php echo $contacto;?></div>'}
	});
})
</script>
<?php
}
?>
