<?php
$imagen=isset($oContentLang->media['imagen']['Url'])? '<span class="texto-imagen-big"><img src="'.$URL_ROOT.$oContentLang->media['imagen']['Url'].'" /></span>': NULL;
?>
<div class="titulo"><?php echo TextParser::UpperCase($oContentLang->title);?></div>
<div class="texto">
<?php

	echo $oContentLang->description;
	echo $imagen;

?>
</div>
