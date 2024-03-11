<?php
$imagen=isset($oContentLang->media['imagen']['Url'])? '<span class="texto-imagen-big"><img src="'.$URL_ROOT.$oContentLang->media['imagen']['Url'].'" /></span>': NULL;
?>
<script type="text/javascript" src="<?php echo $URL_BASE;?>js/jquery.tinyscrollbar.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#scrollbar1').tinyscrollbar();	
	});
</script>
<h1><?php echo TextParser::UpperCase($oContentLang->title);?></h1>
<div class="caja">
	<div id="scrollbar1">
		<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
		<div class="viewport">
			 <div class="overview">
			<?php
                echo $oContentLang->description;
                echo $imagen;
            ?>
			</div>
		</div>
	</div>
</div>
