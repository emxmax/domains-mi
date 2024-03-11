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
        <div class="modulos-linea-imagen"><?php echo $imagen;?></div>
        <div class="modulos-linea-contenido">
        <span class="modulos-linea-contenido-texto"><?php echo $oWidget->resumen;?></span>
        <span class="modulos-linea-contenido-a a-<?php echo $estilo;?>"><a href="<?php echo $oLink->url;?>" target="<?php echo $oLink->target;?>">VER M&Aacute;S</a></span>
        </div>
    </div>
