<?php 
  ob_start("ob_gzhandler");
  session_start();

  include "util/url.php";
  include "util/query.php";

  $cn = db_connect();
  $so_url=$_GET['so_url'];

  $sqlSo = "SELECT * FROM socio WHERE so_url='$so_url'";
  $rsSo = mysql_query($sqlSo);

  $so_id = mysql_result($rsSo,0,"so_id");
  $so_name = mysql_result($rsSo,0,"so_name");

  $sqlProducto = "SELECT * FROM producto WHERE so_id=$so_id AND pro_estado=1 ORDER BY pro_orden ASC";
  $rsProducto = mysql_query($sqlProducto);
  $nProducto = mysql_num_rows($rsProducto);

  require_once "fbsdk4-5.1.2/src/Facebook/autoload.php";
  require_once "credentials.php";

  $fb = new Facebook\Facebook([
    'app_id' => $app_id, // Replace {app-id} with your app id
    'app_secret' => $app_secret,
    'default_graph_version' => 'v2.2'
    ]);
  $helper = $fb->getRedirectLoginHelper();
  $permissions = ['email']; // permisos
  $loginUrl = $helper->getLoginUrl($login_url, $permissions);

  $em = $_SESSION["email"];
  $sqlIdUsuario = "SELECT user_id FROM usuario WHERE usuario.user_email = '$em'";
  $rsIdUsuario = mysql_query($sqlIdUsuario);
  $user_id = mysql_result($rsIdUsuario, 0 , 'user_id');

  $so_id = mysql_result($rsSo,0,"so_id");
  $so_name = mysql_result($rsSo,0,"so_name");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redgalar.com - Regalos personalizados en un click</title>
  <link href="<?php echo $url; ?>img/ico.png" rel="shortcut icon">
  <link href="<?php echo $url; ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $url; ?>css/estilos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>css/jquery.bxslider.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
  .joan_c {
    margin-left: 15px;
    margin-top: 2em;
    margin-bottom: 2em;
    /*min-width: 190px;*/
    padding: .5em;
    font-family: "GothamRnd";
    font-size: 12px;
    font-style: normal;
    font-weight: 500;
    border: 1px solid #e32a34;
    background-color: #e32a34;
    color: white;
    width: 12em;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 2px;
  }

  .joan_c > ul { display: none; list-style: none; padding-left: 0px}
  .joan_c:hover > ul {display: block; background: #f9f9f9; border: 1px solid #e32a34;}
  .joan_c:hover > ul > li { padding: 5px; border-bottom: 1px solid #6bb99c;}
  .joan_c:hover > ul > li:hover { background: white;}
  .joan_c:hover > ul > li:hover > a { color: red; }
</style>
</head>
<body>

  <?php include "header.php";?>

    <div class="container">
      <div class="row">
        <?php include('aside.php'); ?>

        <section class="col-lg-9 col-sm-8" id="listado-categoria">
          <div class="row">
            <div class="col-lg-12">
              <h2><?php echo $so_name; ?></h2>
            </div>
            <div class="col-lg-4">
              <span><?php echo $nProducto; ?> Resultados</span>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-sm-12">
              <?php
                for($i=0;$i<$nProducto;$i++){ 
                  $pro_id = mysql_result($rsProducto,$i,"pro_id");
                  $pro_name = mysql_result($rsProducto,$i,"pro_name");
                  $pro_url = mysql_result($rsProducto,$i,"pro_url");
                  $pro_img = mysql_result($rsProducto,$i,"pro_img");
                  $pro_img_name = mysql_result($rsProducto,$i,"pro_img_name");
                  $pro_detalles = mysql_result($rsProducto,$i,"pro_detalles");
                  $pro_precio_o = mysql_result($rsProducto,$i,"pro_precio_o");

                  $sql = "SELECT * from lista_deseo AS ld WHERE ld.pro_id = $pro_id AND ld.user_id = $user_id";

                  // echo $pro_id;

                  $pr = mysql_query($sql);

                  $sqlListaDeseo = "SELECT lista_estado 
                                    FROM lista_deseo 
                                    INNER JOIN producto 
                                    ON lista_deseo.pro_id = $pro_id
                                    WHERE lista_deseo.user_id = $user_id
                                    GROUP BY lista_estado";
                  $rsListaDeseo = mysql_query($sqlListaDeseo);

                  $nListaDeseo = mysql_num_rows($rsListaDeseo);

                  // echo $nListaDeseo . " ...";

                  if ($nListaDeseo > 0) {
                    $lista_estado = mysql_result($rsListaDeseo,0,'lista_estado');
                    // echo "<br>ENTRO :V";
                  }else{
                    $lista_estado = '';
                    // echo "<br>NO ENTRO :.V";
                  }
                  
                  // echo '<br>sqlListaDeseo ' . $lista_estado;
                  // $rsListaDeseo = mysql_query($sqlListaDeseo);
              ?>
              <div class="row">
                <div class="col-lg-12 col-sm-12">
                  <div class="publi-categoria">
                    <div class="col-lg-3 col-md-4 col-sm-5">
                      <div class="row">
                        <a href="<?php echo $url; ?>productos/<?php echo $pro_url;?>">
                          <img src="<?php echo $url; ?>img/<?php echo $pro_img; ?>" alt="<?php echo $pro_img_name; ?>">
                        </a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-5 col-sm-7">
                      <a href="<?php echo $url; ?>productos/<?php echo $pro_url;?>">
                        <h3><?php echo utf8_encode($pro_name);?></h3>
                      </a>
                      <span>S/ <?php echo $pro_precio_o;?></span>
                      <p><?php echo utf8_encode($pro_detalles);?></p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="row">
                        <div class="col-lg-6 col-sm-6 hidden-xs">
                          <div class="detalle">
                          </div>
                        </div>
                        <div class="col-lg-12 col-sm-6 col-md-12">
                          <a class="btn-cate" href="<?php echo $url; ?>productos/<?php echo $pro_url;?>">¡Comprar ya!</a>
                        </div>


                        <div class="col-lg-12 col-sm-6 col-md-12 joan_c text-center">
                          <label class="lista_deseo_text" style="cursor: pointer;">
                          <?php
                            if(isset($_SESSION['email'])){
                              //  Que muestre con normalidad las opciones
                          ?>
                          <?php
                            if($lista_estado == 'pr'){
                              echo "<span class='lista_deseo'>Privada</span> <i class='fa fa-check' aria-hidden='true'></i></label><br>
                            <ul>
                              <li><a href='#' class='lista_publica' data-producto = " . $pro_id ." >Pública</a></li>
                            </ul>";
                            }else if ($lista_estado == 'pu') {
                              echo "<span class='lista_deseo'>Pública</span> <i class='fa fa-check' aria-hidden='true'></i></label><br>
                              <ul>
                                <li><a href='#' class='lista_privada' data-producto = " . $pro_id ." >Privada</a></li>
                              </ul>";
                            }else{
                              echo "<span class='lista_deseo'>Agregar a mi lista</span> </label><br>
                            <ul>
                              <li><a href='#' class='lista_publica' data-producto = " . $pro_id ." >Pública</a></li>
                              <li><a href='#' class='lista_privada' data-producto = " . $pro_id ." >Privada</a></li>
                            </ul>";
                            }
                          ?>
                          <?php
                            }else{
                              // echo "<a class='btn comprar' data-toggle='modal' data-target='#myModal'>Agregar a mi lista de deseos</a>";
                              echo "<span class='lista_deseo' data-toggle='modal' data-target='#myModal'>Agregar a mi lista</span></label>";
                            }
                          ?>
                        </div>
                        <div class="col-lg-12">
                          <!--a href="" class="btn-blanco">Añadir a mi lista pública</a-->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php }?>
            </div>
          </div>
        </section>
        <?php include('mas-seguras.php'); ?> 
      </div>
    </div>


<!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialoga" role="document">
      <div class="modal-content">
        <div class="row">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>    
        <div class="row">
          <div class="col-xs-12">
            <h3>Iniciar sesión</h3>
          </div>
        </div>
        <label for="email">e-mail</label>
        <input type="email" name="email" id="nomuser">
        <label for="email">Contraseña</label>
        <input type="password" name="password" id="passuser">
        <!--p><a href="#">Olvidé mi contraseña</a></p-->
        <a id="btn-enviar" class="send red">Ingresar</a>
        <a href="<?php echo htmlspecialchars($loginUrl); ?>" class="send blue">Ingresar con FACEBOOK</a>
        <div id="result"></div>
      </div>
    </div>
  </div>

  <?php  include "footer.php" ?>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
  <script>
  $(document).ready(function() {
      $('#btn-category').click(function(){
        var estado = $('header ol').css('display');
        if(estado=='none'){
          $('header ol').css('display','table');
        }else{
          $('header ol').css('display','none');
        }
        
      });
  });
  </script>
  
  <script>
    $(document).ready(function() {
      $('.lista_publica').click(function(e){
        e.preventDefault();
        var id = $(this).attr("data-producto");
        var data = {"id": id, "acc": 'agregar_listadeseospu'} //pe_codigo

        $.confirm({
          title: 'REDGALAR',
          theme : 'jconfirm-ty-theme',
          content: '¿Desea agregar a lista de deseos pública?',
          closeIcon : true,
          buttons: {
            confirmar: function () {
              text: "Confirmar",
              $.ajax({
                data: data,
                url:'../agregar-listadeseos.php',
                type:'POST',                
                beforeSend: function(){                  
                },
                success: function (response) {
                  var res = response;
                  if(res == 'exito'){
                    console.log("EXITO!!! PUBLICA");
                    $(".lista_deseo_text").html("Pública");
                    
                    // alert("Se agrego a la \"Lista de deseos\"");
                    // location.reload();
                    // console.log($('.lista_publica').parent().parent().parent().children(".lista_deseo_text").html("Pública"));
                  }
                  else{
                    // $("#alerta_carrito div").html('<img src="https://www.redgalar.com/img/chat.jpg" alt=""><div class="alert-danger">Error: producto no agregado al carro de compras</div>');
                  }
                }
              });
              setTimeout("window.location= window.location", 1000);
              $.alert('Confirmado!');
            },
            cancelar: function () {
              //sin ninguna accion
            }
          }
        });
      });

      $('.lista_privada').click(function(e){
        e.preventDefault();
        var id = $(this).attr("data-producto");
        var data = {"id": id, "acc": 'agregar_listadeseospr'} //pe_codigo
        $.confirm({
          title: 'REDGALAR',
          theme : 'jconfirm-ty-theme',
          content: '¿Desea agregar a lista de deseos privada?',
          closeIcon : true,
          buttons: {
            confirmar: function () {
              text: "Confirmar",
              $.ajax({
                data: data,
                url:'../agregar-listadeseos.php',
                type:'POST',            
                beforeSend: function(){              
                },
                success: function (response) {
                  var res = response;
                  if(res == 'exito'){
                    console.log("EXITO!!! PRIVADA");
                    $(".lista_deseo_text").html("Privada");
                    // alert("Se agrego a la \"Lista de deseos\"");
                    // console.log($('.lista_publica').parent().parent().parent().children(".lista_deseo_text").html("Privada"));
                  }
                  else{
                  //$("#alerta_carrito div").html('<img src="https://www.redgalar.com/img/chat.jpg" alt=""><div class="alert-danger">Error: producto no agregado al carro de compras</div>');
                  }
                }
              });
              setTimeout("window.location= window.location", 1000);
              $.alert('Confirmado!');
            },
            cancelar: function () {
              //sin ninguna accion
            }
          }
        });
      });
    });
  </script>

  <script>
    $("#opciones .custom-select").each(function() {
      var classes = $(this).attr("class"),
      id      = $(this).attr("id"),
      name    = $(this).attr("name");
      var template =  '<div class="' + classes + '">';
      template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
      template += '<div class="custom-options">';
        $(this).find("option").each(function() {
          template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
        });
      template += '</div></div>';

      $(this).wrap('<div class="custom-select-wrapper"></div>');
      $(this).hide();
      $(this).after(template);
    });
    $(".custom-option:first-of-type").hover(function() {
      $(this).parents(".custom-options").addClass("option-hover");
    }, function() {
      $(this).parents(".custom-options").removeClass("option-hover");
    });
    $(".custom-select-trigger").on("click", function() {
      $('html').one('click',function() {
        $(".custom-select").removeClass("opened");
      });
      $(this).parents(".custom-select").toggleClass("opened");
      event.stopPropagation();
    });
    $(".custom-option").on("click", function() {
      $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
      $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
      $(this).addClass("selection");
      $(this).parents(".custom-select").removeClass("opened");
      $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
    });
  </script>

  <script>
  /* Iniciando jQuery */
  (function(){
    function fLogin(){
      // url_producto = $("body").data("producto");
      $.post("../query-valida.php",{
        "user" : $('#nomuser').val(),
        "pass" : $('#passuser').val(),
      },
        function (data){
          if(data==1){
            // var url = '../producto2.php?pro_url='+url_producto;
            // $(location).attr('href',url);
            setTimeout("window.location= window.location", 1000);
          }else{
            $('#result').fadeIn(500);//.fadeOut(6000)
            $('#result').html(data)
          }
        }
      )
    }
    $("#btn-enviar").on("click",function(){
      fLogin();
    })
  })()
  </script>
</body>
</html>