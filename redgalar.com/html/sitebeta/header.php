        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-97499713-1', 'auto');
          ga('send', 'pageview');

        </script>
        <header class="container-fluid">
          <div class="row container-header">
            <div class="container">
              <div class="row">
                <div class="col-lg-7 col-sm-7 col-xs-4">
                  <div class="row">
                    <div class="col-lg-2 col-sm-2 align col-xs-4 col-sm-push-2">
                      <div class="row">
                        <a href="javascript: void(0);" id="btn-category"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a>
                        <ol>
                          <li><a href="<?php echo $url;?>categorias/regalos-personalizados"><img src="<?php echo $url;?>img/regalos-personalizados.png" alt=""> Regalos personalizados</a></li>
                          <li><a href="<?php echo $url;?>categorias/regalos-novedosos"><img src="<?php echo $url;?>img/regalos-novedosos.png" alt=""> Regalos Novedosos</a></li>
                          <li><a href="#"><img src="<?php echo $url;?>img/cuidado-personal.png" alt=""> Cuidado personal</a></li>
                          <li><a href="<?php echo $url;?>categorias/desayunos"><img src="<?php echo $url;?>img/desayunos.png" alt=""> Desayunos</a></li>
                          <li><a href="#"><img src="<?php echo $url;?>img/flores.png" alt=""> Flores</a></li>
                          <li><a href="<?php echo $url;?>categorias/comidas-saludables"><img src="<?php echo $url;?>img/productos-ecologicos.png" alt=""> Comidas saludables</a></li>
                          <li><a href="#"><img src="<?php echo $url;?>img/articulos-deportivos.png" alt=""> Articulos deportivos</a></li>
                          <!--<li><a href="#"><img src="<?php echo $url;?>img/regalos-para-mascotas.png" alt=""> Regalos para mascotas</a></li>-->
						  <li><a href="<?php echo $url;?>categorias/antojitos"><img src="<?php echo $url;?>img/Antojitos.png" alt=""> Antojitos</a></li>

                        </ol>
                      </div>
                    </div>

                    <div class="col-lg-2 col-sm-3 col-xs-8 col-sm-pull-2">
                      <a href="<?php echo $url; ?>"><img src="<?php echo $url; ?>img/logo.png" alt="" id="logo"></a>
                    </div>
                    
                    <div class="col-lg-8 col-sm-7 col-xs-12 search">
                        <form action="<?php echo $url; ?>busqueda.php" method="post" enctype="multipart/form-data" id="buscar">
                          <input type="text" id="search" name="busqueda" placeholder="Estoy buscando...">
                        </form>
                        <p id="closer" class="visible-xs">Cerrar</p>
                    </div>
                  </div>
                </div>

              <!--Iconos-->
                <div class="col-lg-5 col-sm-5 col-xs-8">
                  <div class="row">
                    <ul class="iconos">

                      <li class="hidden-sm"><a href="https://www.facebook.com/redgalar" target="_blank"><img src='<?php echo $url; ?>img/facebook.png' ><span class="hidden-xs">Síguenos</span></a></li>
                      <!--li><a href="<?php echo $url; ?>carrito"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i><span>Carrito</span></a></li-->
                      <!--li><a href=""><i class="fa fa-heart-o fa-2x" aria-hidden="true"></i><span>Mis deseos</span></a></li-->
                        <?php 
                          if(isset($_SESSION['email'])){
                              $sqlUsuarioHeader = "SELECT * FROM usuario WHERE user_email='".$_SESSION['email']."'";
                              $rsUsuarioHeader = mysql_query($sqlUsuarioHeader);

                              $user_id = mysql_result($rsUsuarioHeader,0,"user_id");
                              $user_provider = mysql_result($rsUsuarioHeader,0,"user_provider");

                              if($user_provider=="facebook"){
                                $user_foto_header = mysql_result($rsUsuarioHeader,0,"user_foto");
                              }else{
                                $user_fo = mysql_result($rsUsuarioHeader,0,"user_foto");
                                $user_foto_header = $url."img/".$user_fo;
                              }
							  //obtenemos la cantidad de productos en el producto
							  $cantI = 0;
							  $sql ="SELECT *
								FROM
								carrito
								WHERE
								carrito.user_id = $user_id";
								$cantItem = mysql_query($sql);
								while ($cItem = mysql_fetch_array($cantItem)) {
									$cantI = $cantI + $cItem["pe_cant"];
								}
								if($cantI == 0){
									$spanItem = '';
								}
								else{
									$spanItem = '<span class="cantItem">'.$cantI.'</span>';
								}
                          ?>
                            <li><a href="<?php echo $url.'carrito' ?>"><img src="<?php echo $url.'img/cart.png'?>" alt="" class='foto-nav'><span class="hidden-xs">Carrito</span><?php echo $spanItem;?></a></li>
                            <!--<li><a href="<?php echo $url.'perfil' ?>"><img src="<?php echo $url.'img/deseo.png'?>" alt="" class='foto-nav'><span class="hidden-xs">Mis deseos</span></a></li>-->
                            <li><a href="<?php echo $url.'perfil' ?>"><img src="<?php echo $user_foto_header ?>" alt="" class='foto-nav'><span class="hidden-xs">Mi Perfil</span></a></li>
                          <?php
                           }else{
                            ?>
                            <li><a href="<?php echo $url.'registro' ?>"><img src="<?php echo $url.'img/user.png'?>" alt="" ><span class="hidden-xs">Identifícate</span></a></li>
                            <?php
                        }?>
                         <li id="open" class="hidden-lg"><img src="<?php echo $url; ?>img/searcha.png"></li>
                    </ul>
                  </div>
                </div>
                <!--end iconos-->

              </div>
            </div>
        </div>
    </header>




<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.9&appId=204408609988063";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <div class="container-fluid" id="menu-short">
    <div class="row">
      <div class="container">
        <div class="row">     
          <div class="col-xs-12">
            <ul>
              <li><a href="<?php echo $url; ?>">Inicio</a></li>
              <!--li><a href="#">Vende con nosotros</a></li>
              <li><a href="#">Contácto</a></li-->
              <li><a href="<?php echo $url; ?>ayuda">Ayuda</a></li>
              <!--li><a href="#">Cómo comprar</a></li-->
              <li><div class="fb-like" data-href="https://www.facebook.com/redgalar/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div></li>
            </ul>
            </div> 
        </div>
      </div>
    </div>
  </div>
