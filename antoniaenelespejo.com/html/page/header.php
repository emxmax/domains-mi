<?php 
define("_URL2_", "http://antoniaenelespejo.com/");

?>
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107888218-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-107888218-1');
</script>

<div ng-controller="MenuMovilCrtl" class="mainMenuMovil">
  <div class="inner-option">
    <div class="row"><a href="<?php echo _URL2_?>">
        <figure><img src="<?php echo _URL2_?>resources/assets/image/logo.png" alt=""></figure></a></div>
    <div class="inner-right">
      <div class="row"><a href="javascript:void(0)" ng-click="mostrarBuscador()"><i class="icon-search"></i></a></div>
      <div class="row"><a href="javascript:void(0)" ng-click="verMenu($event)" class="menuoption">
          <div class="line"></div>
          <div class="line"></div>
          <div class="line"></div></a></div>
    </div>
  </div>
  <nav id="navMovil" class="nav">
    <ul>
      <li><a href="<?php echo _URL2_?>tu-mejor-version">TU MEJOR VERSION </a></li>
      <li><a href="<?php echo _URL2_?>mujeres-que-inspiran">MUJERES QUE INSPIRAN</a></li>
      <li><a href="<?php echo _URL2_?>nuestra-casa">NUESTRA CASA</a></li>
      <li><a href="<?php echo _URL2_?>antonia">ANTONIA</a></li>
    </ul>
    <div class="separadorMenu"></div>
    <ul class="redesMovil">
      <li><a href="https://www.facebook.com/antoniaenelespejo" target="_blank"><i class="icon-facebook"></i><span>Facebook/AntoniaenelEspejo</span></a></li>
      <li><a href="https://twitter.com/antoenelespejo" target="_blank"><i class="icon-twitter"></i><span>Instagram/AntoniaenelEspejo</span></a></li>
      <li><a href="https://www.instagram.com/antoniaenelespejo/" target="_blank"><i class="icon-instagram"></i><span>Pinterest/AntoniaenelEspejo</span></a></li>
      <li><a href="https://www.pinterest.es/antoniaenelespejo/" target="_blank"><i class="icon-pinterest"></i><span>Twitter/AntoniaenelEspejo</span></a></li>
    </ul>
  </nav>
  <div class="inner-buscar">
    <input type="text" ng-keypress="$event.keyCode === 13 && buscarAnto(e)" ng-model="txtbuscar" placeholder="buscar...">
  </div>
</div>
<header ng-controller="MenuCrtl">
  <div class="inner-menu">
    <div class="row"><a href="<?php echo _URL2_?>"><img src="<?php echo _URL2_?>resources/assets/image/logo.png" alt="Antonia"></a></div>
    <div class="row navHeader">
      <!--.ocultar-->
      <nav>
        <ul>
          <li><a id="menu_1" href="<?php echo _URL2_?>tu-mejor-version">TU MEJOR VERSIÓN</a></li>
          <li>
            <p>*</p>
          </li>
          <li><a id="menu_2" href="<?php echo _URL2_?>mujeres-que-inspiran">MUJERES QUE INSPIRAN</a></li>
          <li>
            <p>*</p>
          </li>
          <li><a id="menu_3" href="<?php echo _URL2_?>nuestra-casa">NUESTRA CASA</a></li>
          <li>
            <p>*</p>
          </li>
          <li><a id="menu_4" href="<?php echo _URL2_?>antonia">ANTONIA </a></li>
        </ul>
      </nav>
    </div>
    <div class="row navHeader">
      <ul>
        <li class="rrss"><a href="https://www.facebook.com/antoniaenelespejo" target="_blank"><i class="icon-facebook"></i></a></li>
        <li class="rrss"><a href="https://twitter.com/antoenelespejo" target="_blank"><i class="icon-twitter"></i></a></li>
        <li class="rrss"><a href="https://www.instagram.com/antoniaenelespejo/" target="_blank"><i class="icon-instagram"></i></a></li>
        <li class="rrss"><a href="https://www.pinterest.es/antoniaenelespejo/ " target="_blank"><i class="icon-pinterest"></i></a></li>
        <li class="rrss"><a href="javascript:void(0)" ng-click="mostrarBuscador()"><i class="icon-search"></i></a></li>
      </ul>
    </div>
    <div class="inner-buscar">
      <input type="text" ng-keypress="$event.keyCode === 13 && buscarAnto(e)" ng-model="txtbuscar" placeholder="buscar...">
    </div>
  </div>
</header>