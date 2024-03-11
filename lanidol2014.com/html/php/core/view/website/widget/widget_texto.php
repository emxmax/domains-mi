<?php
$media=XMLParser::getArray_Media($oWidget->media);
$parameter=XMLParser::getArray_Parameter($oWidget->parameter);

$icono=isset($media['icono'])? $URL_ROOT.$media['icono']['Url']: '';
$imagen=isset($media['imagen'])? '<img src="'.$URL_ROOT.$media['imagen']['Url'].'" />': '';

$estilo=isset($parameter['estilo'])? $parameter['estilo']: '';
$oLink=SEO::get_ContentLink($oWidget);
?>        
    <div class="modulos-linea-titulo titulo-<?php echo $estilo;?>"><?php echo TextParser::UpperCase($oWidget->title);?></div>
    <div class="modulos-linea-container">  
        <div class="texto-linea">
        <?php echo $oWidget->resumen;?>
        </div>
    </div>
