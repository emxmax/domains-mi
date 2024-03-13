<?php

include '../adm/decon/connect.php';    
include '../lib/funciones.php';

//session_start();
ob_start();
extract($_REQUEST);

?>

<?php

    $url_modulo[0]='trabajos';
    $mb_modulo1 = recogerDatos(sprintf("SELECT {$url_modulo[0]}.titulo, {$url_modulo[0]}.resumen,{$url_modulo[0]}.area,{$url_modulo[0]}.estado, {$url_modulo[0]}.id, {$url_modulo[0]}.url, {$url_modulo[0]}.imagen FROM {$url_modulo[0]}
                                                                            WHERE {$url_modulo[0]}.perfil = '%d' and {$url_modulo[0]}.estado='1' order by {$url_modulo[0]}.prioridad, {$url_modulo[0]}.fecha desc limit %d,%d",$p,$hasta,$mostrar));
    
    $cont=0;
    $numColumna=3;
    
?>

<ul style="display:none;">
    <?php for($i=0;$i<count($mb_modulo1);$i++): ?>
    <?php $cont++; ?>
    <?php if($cont==$numColumna): ?>
    <li>
    <?php $cont=0; ?>
    <?php else: ?>
    <li class="margen">
    <?php endif; ?>
	<div class="datos">
	    <div class="bloque">
		<div class="desplazar">  
		    <?php $imagen1 =  explode("," , $mb_modulo1[$i]['imagen']); ?>
		    <div class="imagen">
			<img src="<?php echo $imagen1[1]; ?>" width="250" height="160" alt="" />
			<a class="info">info</a>
		    </div>
		    <div class="extra">
			<p><?php echo $mb_modulo1[$i]['resumen'];?></p>
			<span><a class="enlace verDetalle" rel="<?php echo site; ?>/portafolio.php?p=<?php echo $p; ?>&amp;d=<?php echo $mb_modulo1[$i]['id'];?>">ver trabajos</a></span>
			<a class="info">info</a>
		    </div><br />
		</div>
	    </div>
	    <h3><a class="verDetalle" rel="<?php echo site; ?>/portafolio.php?p=<?php echo $p; ?>&amp;d=<?php echo $mb_modulo1[$i]['id'];?>"><span>: </span><?php echo $mb_modulo1[$i]['titulo']; ?></a></h3>
	    <div class="tipo">
		<?php $area1 =  explode("," , $mb_modulo1[$i]['area']); ?>
		
		<?php for($a=0;$a<count($area1);$a++): ?>
		<span><?php echo $area1[$a]; ?></span>
		<?php endfor; ?><br />
	    </div>
	</div>
    </li>
    <?php endfor; ?>
</ul><br />