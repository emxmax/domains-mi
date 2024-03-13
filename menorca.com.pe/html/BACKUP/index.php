<!DOCTYPE html>
<html lang="es">
<?php
	include('head.php');
?>
<body>
	<?php
		include('secciones/menu.php');
		include('secciones/header.php');
		if(isset($_GET['sec'])){
		    $seccion=$_GET['sec'];
		    if($seccion=='inicio'){
		        include('secciones/secproyectos.php');
			include('secciones/secmejora.php');
			include('secciones/sectestimonios-min.php');
		    }else{
		        include('secciones/'.$seccion.'.php');
		    }
		}else{
			$seccion='inicio';
		    	include('secciones/secproyectos.php');
			//echo "ss";
			include('secciones/secmejora.php');
			include('secciones/sectestimonios-min.php');
		}
		include('secciones/enlaces.php');
		include('secciones/footer.php');
	?>
	<script>
		var seccion=$("#footer").attr('data-id');
		$(".itemMenu").removeClass('active');
		$(".itemMenu-"+seccion).addClass('active');
	</script>
</body>

</html>