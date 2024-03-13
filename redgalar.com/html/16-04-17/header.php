
        <header class="container-fluid">
          <div class="row container-header">
            <div class="container">
              <div class="row">
                <div class="col-lg-8 col-sm-8 col-xs-12">
                  <div class="row">
                    <div class="col-lg-2 col-sm-2 text-center col-xs-4">
                      <div class="row">
                        <a href="javascript: void(0);" id="btn-category"><i class="fa fa-bars fa-2x" aria-hidden="true"></i><span>Categorías</a></span>
                        <ol>
                          <li><a href="<?php echo $url;?>categorias/regalos-personalizados"><img src="<?php echo $url;?>img/regalos-personalizados.png" alt=""> Regalos personalizados</a></li>
                          <li><a href="#"><img src="<?php echo $url;?>img/regalos-novedosos.png" alt=""> Regalos Novedosos</a></li>
                          <li><a href="#"><img src="<?php echo $url;?>img/cuidado-personal.png" alt=""> Cuidado personal</a></li>
                          <li><a href="#"><img src="<?php echo $url;?>img/desayunos.png" alt=""> Desayunos</a></li>
                          <li><a href="#"><img src="<?php echo $url;?>img/flores.png" alt=""> Flores</a></li>
                          <li><a href="#"><img src="<?php echo $url;?>img/productos-ecologicos.png" alt=""> Productos ecológicos</a></li>
                          <li><a href="#"><img src="<?php echo $url;?>img/articulos-deportivos.png" alt=""> Articulos deportivos</a></li>
                          <li><a href="#"><img src="<?php echo $url;?>img/regalos-para-mascotas.png" alt=""> Regalos para mascotas</a></li>
                        </ol>
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-3 col-xs-8">
                      <a href="<?php echo $url; ?>"><img src="<?php echo $url; ?>img/logo.png" alt="" id="logo"></a>
                    </div>
                    <div class="col-lg-7 col-sm-7 col-xs-12">
                        <form action="<?php echo $url; ?>busqueda.php" method="post" enctype="multipart/form-data">
                          <input type="text" id="search" name="busqueda" placeholder="Encuentra un registro">
                        </form>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-xs-12">
                  <div class="row">
                    <ul >
                      <li><a href="https://www.facebook.com/redgalar" target="_blank"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i><span>Síguenos</span></a></li>
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

                            echo "<li><a href='" . $url . "perfil'><img src='$user_foto_header' alt='' class='foto-nav'><span>Mi Perfil</span></a></li><li><a href='" . $url . "logout.php'><i class='fa fa-sign-out fa-2x' aria-hidden='true'></i><span>Cerrar Sesión</span></a></li>";
                          }else{
                            echo "<li><a href='" . $url . "registro'><i class='fa fa-user fa-2x' aria-hidden='true'></i><span>Identificate</span></a></li>";
                        }?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="container">
            <nav class="row">
              <ul>
                <li><a href="<?php echo $url; ?>">Inicio</a></li>
                <!--li><a href="">Blog</a></li>
                <li><a href="">Vende</a></li-->
                <li><a href="<?php echo $url; ?>ayuda">Ayuda</a></li>
                <!--li><a href="">Cómo comprar</a></li-->
                <!--li><a href="">Opciones de envío</a></li-->
              </ul>
            </nav>
          </div>
        </div>
    </header>
