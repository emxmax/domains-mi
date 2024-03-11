<!DOCTYPE html>
<html lang="es">
<?php
	include('head.php');
?>
<script type="text/javascript">
var cfJsHost = (("https:" == document.location.protocol) ? "https://" : "http://");
document.write(unescape("%3Cscript src='" + cfJsHost + "www123cf-3244.kxcdn.com/includes/tinybox/tinybox.js.minified.js?1c6dc1e' type='text/javascript'%3E%3C/script%3E"));
</script>

<link href="//www123cf-3244.kxcdn.com/includes/tinybox/tinyboxstyle.css.minified.css?1c6dc1e" rel="stylesheet" type="text/css"  />
<body>

	<?php
    
    $_title = "<hgroup style='display:none'>";
    $_title.= "<h1>$titulo_oculto</h1>";
    echo $_title.= "</hgroup>";
		include('secciones/menu.php');
		if(isset($_GET['sec'])){
			$seccion=$_GET['sec'];
			include('secciones/header.php');
			include('secciones/interna.php');			
		}else if(isset($_GET['s'])){
			$search=$_GET['s'];
			include('secciones/header.php');
			include('secciones/search.php');
		}else{
			include('secciones/slider.php');
		}
		include('secciones/footer.php')
	?>	
</body>
<script type="text/javascript" src="js/App.js"></script>
<style>
body{
  margin-top: -20px;
}
.banner_home{
	height: 577px;
  overflow: hidden;
}	
#hero-wrapper {
	height: 577px;
	width: 100%;
	position: absolute;
}
#hero-wrapper .carousel-wrapper,
#hero-carousel {
  height: 100%;
  width: 100%;
  position: absolute;
}
#hero-carousel img {
  left: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
  max-width: none;
  width: auto;
  height: auto;
}
#hero-carousel i {
  position: absolute;
  top: 50%;
}
.carousel-fade .carousel-inner .item {
  opacity: 0;
  transition-property: opacity;
}
.carousel-fade .carousel-inner .active {
  opacity: 1;
}
.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {
  left: 0;
  opacity: 0;
  z-index: 1;
}
.carousel-fade .carousel-inner .next.left,
.carousel-fade .carousel-inner .prev.right {
  opacity: 1;
}
.carousel-fade .carousel-control {
  z-index: 2;
}
.item>a{
  background-color: #ffcb05;
  color: #786D14;
  margin-bottom: 25px;
  padding: 8px 12px 10px 12px;
  display: inline-block;
  font-weight: bold;
  font-size: 15px;
  cursor: pointer;
  border-radius: 4px;
  box-shadow: 0px 1px 1px #666;
  position: absolute;
  top: 86%;
  left: 9%;
}
</style>
</html>