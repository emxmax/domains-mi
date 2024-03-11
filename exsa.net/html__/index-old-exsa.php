<!DOCTYPE html>
<html lang="es">
<head>
  <link href="https://exsa.net/imagenes/fav-exsa.png" rel="shortcut icon">
  <link rel="apple-touch-icon" href="https://exsa.net/imagenes/fav-exsa.png"/>
  <!--fuente-->
  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:700" rel="stylesheet">
  <!--end fuente-->

  <style>
    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {

/*    background-color: #fefefe;*/
    margin: 2% auto; /* 15% from the top and centered */
    padding: 25px;
    border: 1px solid #888;
    width: 40%; /* Could be more or less, depending on screen size */
    height: auto;
    padding-bottom: 70px;
    background-image: url("https://www.mediaimpact.pe/demo/popup/img/fondo.jpg");
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    font-style: "EurostileBold";
    font-family: 'IBM Plex Sans', sans-serif;
    color: #FFFFFF;
    font-size: 25px;
}

/* The Close Button */

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

</style>
  <?php
  include('head.php');
?>
<script type="text/javascript">
var cfJsHost = (("https:" == document.location.protocol) ? "https://" : "http://");
document.write(unescape("%3Cscript src='" + cfJsHost + "www123cf-3244.kxcdn.com/includes/tinybox/tinybox.js.minified.js?1c6dc1e' type='text/javascript'%3E%3C/script%3E"));
</script>

<link href="//www123cf-3244.kxcdn.com/includes/tinybox/tinyboxstyle.css.minified.css?1c6dc1e" rel="stylesheet" type="text/css"  />
  <link href="css/lity.css" rel="stylesheet">
  <!--<script src="js/jquery.js"></script>-->
  <script src="js/lity.js"></script>
</head>
<body>
  <section style="background-color: #FEC52E;padding: 0px 15px;">
    <p style="color: blacK;text-align: center;font:14px 'open_sansregular';padding: 5px;"><a target="_blank" href="noticias/Comunicado Cierre Documentario - EXSA.pdf" style="color: black;text-decoration: none">ANUNCIO IMPORTANTE PARA NUESTROS PROVEEDORES</a></p>
  </section>
	<?php
    $titulo_oculto = "";
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
      include('secciones/sec-noticia.php');
    }
    include('secciones/footer.php');
  ?>	



</body>
<script type="text/javascript" src="js/App.js"></script>
<style>
body{
  margin-top: -20px;
}
.banner_home{
	height: 518px;
  overflow: hidden;
  position: relative;
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
#header{
  border-bottom: 3px solid #227CBD;
}
.rrss>ul{
  list-style: none;
  display: inline-flex;
  padding-left: 0px;
}
</style>



<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal

var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal

var span = document.getElementsByClassName("close")[0];

span.onclick = function() {
    modal.style.display = "none";
    $("#video").each(function () { this.pause() });
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        $("#video").each(function () { this.pause() });
    }

}
</script>


</html>