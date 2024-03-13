<!DOCTYPE html>
<html lang="es">
<?php
	include('head.php');
?>
<body>
	<?php
		include('secciones/menu.php');
		

		if(isset($_GET['sec'])){
		   $seccion=$_GET['sec'];
		   if($seccion=='inicio'){
		   		include('secciones/header.php');
				include('secciones/galeriaHome.php');
	
		   }else{
		   		include('secciones/header-'.$seccion.'.php');
		        include('secciones/'.$seccion.'.php');
		   }
		}else{
			$seccion='inicio';
			include('secciones/header.php');
		    include('secciones/galeriaHome.php');
		}
		include('secciones/footer.php');
	?>
</body>
<script type="text/javascript" src="slider/engine1/wowslider.js"></script>
<script type="text/javascript" src="slider/engine1/script.js"></script>
<script type="text/javascript" src="js/App.js"></script>
</html>