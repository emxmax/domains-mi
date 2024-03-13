<!DOCTYPE html>
<html id="app" lang="es" data-estado="<?php echo $estado; ?>">
<?php
	//diseno 1 es el menú sobre el banner, diseno 2 es el banner sobre el menú 
	$diseno=1;
	//bannerStyle 1 es banner con una sola imagen, bannerStyle 2 es una banner animado con arias imágenes
	$bannerStyle=1;
	//menu true es cuando va haber menú, de lo contrario no hay
	$menu=true;
	//slider true es cuando va haber menú, de lo contrario no hay
	$slider=true;
	include('head.php');
?>
<body id="body">
<?php
	include('workSpace.php');
?>
<!--<iframe src="http://exsa.net/contactenos/formulario-de-contacto#ufo-form-id-3" frameborder="0"></iframe>-->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">
</body>
</html>