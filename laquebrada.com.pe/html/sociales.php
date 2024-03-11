<?php
  ob_start("ob_gzhandler");
  session_start();
  include "admin/incdes/variable.php";
  include "incdes/query.php";
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>La Quebrada / Bolentines y Anuncios</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        .carousel {
            margin-top: 20px;
        }
        .item .thumb {
          width: 25%;
          cursor: pointer;
          float: left;
        }
        .item .thumb img {
          width: 100%;
          margin: 2px;
        }
        .item img {
          width: 100%;  
        }
    </style>
  	<link rel="stylesheet" href="css/responsive.css">
  	<!--GoogleMaps -->
  	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <?php include_once("analyticstracking.php") ?>
  </head>
  <body>
    
    <?php include("header-intranet.php"); ?>

    <div class="container-fluid" id="menorca-documentos">
        <div class="container">
      		<ol class="breadcrumb">
      			<li><a href="boletines-y-anuncios.php">BOLETINES Y ANUNCIOS</a></li>
      			<li><a href="documentos.php">DOCUMENTOS IMPORTANTES</a></li>
            <li class="active">SOCIALES</li>
      		</ol>
          <div class="col-lg-10">
            <h1>Galería de Fotos</h1>
              <?php
              for($n = 0; $n < $nGaleria; $n++){
                $gal_id = mysql_result($rsGaleria,$n,"gal_id");
                $gal_titulo = mysql_result($rsGaleria,$n,"gal_titulo");
                $gal_desc = mysql_result($rsGaleria,$n,"gal_desc");
                $gal_img = mysql_result($rsGaleria,$n,"gal_img");
              ?>
              <div class="row menorca-doc-bloque">
                <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12 text-center">
                  <div class="menorca-doc-ico">
                    <a style="cursor:pointer;" data-toggle="modal" data-target="#modal-<?php echo $gal_id; ?>"><img src="admin/mod-galeria/img/<?php echo $gal_img; ?>"/></a>
                  </div>
                </div>
                <div class="col-lg-7 col-md-8 col-sm-9 col-xs-12">
                  <div class="row menorca-anexo">
                     <h3><?php echo $gal_titulo; ?></h3>
                     <p><?php echo $gal_desc; ?></p>
                  </div>
                </div>
              </div>
              <?php } ?>
          </div>
          <div class="col-lg-2">
            <h1>Publicaciones</h1>
            <a class="view-pdf" href="archivos/Evento Navidad.compressed.pdf"><img src="img/Evento-Navidad-1.png" width="100%" style="padding-bottom: 20px;"/></a>
            <a class="view-pdf" href="archivos/EVENTO MENORCA - 579.pdf"><img src="img/Evento-Navidad-2.png" width="100%" style="padding-bottom: 20px;"/></a>
          </div>
        </div>
    </div>


    <?php
      for($m = 0; $m < $nGaleria; $m++){
        $gal_id2 = mysql_result($rsGaleria,$m,"gal_id");
        $gal_titulo2 = mysql_result($rsGaleria,$m,"gal_titulo");
        $gal_desc2 = mysql_result($rsGaleria,$m,"gal_desc");
    ?>
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modal-<?php echo $gal_id2; ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color:#221B19 !important;">
          <div class="modal-header" style="border-bottom:none;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-7">
                  <div id="carousel-<?php echo $gal_id2; ?>" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                      <?php
                      $sqlFotoGaleria = "SELECT fgal_id, fgal_img, fgal_desc FROM foto_galeria WHERE gal_id=$gal_id2";
                      $rsFotoGaleria = mysql_query($sqlFotoGaleria);
                      $nFotoGaleria = mysql_num_rows($rsFotoGaleria);

                      for($nm = 0; $nm < $nFotoGaleria; $nm++){
                        $fgal_id = mysql_result($rsFotoGaleria,$nm,"fgal_id");
                        $fgal_img = mysql_result($rsFotoGaleria,$nm,"fgal_img");
                        $fgal_desc = mysql_result($rsFotoGaleria,$nm,"fgal_desc");

                      if($nm==0){ ?>
                          <div class="item active">
                              <img src="admin/mod-fgaleria/img/<?php echo $fgal_img; ?>" width="100%">
                          </div>
                      <?php }else{ ?>
                          <div class="item">
                              <img src="admin/mod-fgaleria/img/<?php echo $fgal_img; ?>" width="100%">
                          </div>
                      <?php }}?>
                      </div>
                      <a class="left carousel-control" href="#carousel-<?php echo $gal_id2; ?>" role="button" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                      </a>
                      <a class="right carousel-control" href="#carousel-<?php echo $gal_id2; ?>" role="button" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                      </a>
                  </div> 
              <div class="clearfix">
                  <div id="thumbcarousel-<?php echo $gal_id2; ?>" class="carousel slide" data-interval="false">
                      <div class="carousel-inner">
                          <?php
                            $sqlFotoGaleria = "SELECT fgal_id FROM foto_galeria WHERE gal_id=$gal_id2";
                            $rsFotoGaleria = mysql_query($sqlFotoGaleria);
                            $nFotoGaleria = mysql_num_rows($rsFotoGaleria);

                            $entero=$nFotoGaleria/4;
                            $resto=$nFotoGaleria%4;
                            $final=$entero+$resto;
                            $inicio=0;
                            $cantidad=4;
                            for($i=0;$i < $final; $i++){
                              $sqlFotoGaleria2 = "SELECT fgal_id, fgal_img, fgal_desc,gal_id FROM foto_galeria WHERE gal_id=$gal_id2 LIMIT $inicio,$cantidad";
                              //echo $sqlFotoGaleria2;
                              $rsFotoGaleria2 = mysql_query($sqlFotoGaleria2);
                              $nFotoGaleria2 = mysql_num_rows($rsFotoGaleria2);
                              $inicio=$inicio+$cantidad;                             
                              if($i==0){
                                $clase="active";
                              }else{
                                $clase="";
                              }
                              ?>
                              <div class="item <?php echo $clase; ?>">
                              <?php
                                for($x=0;$x < $nFotoGaleria2 ; $x++){
                                  $fgal_id = mysql_result($rsFotoGaleria2,$x,"fgal_id");
                                  $fgal_img = mysql_result($rsFotoGaleria2,$x,"fgal_img");
                                  $fgal_desc = mysql_result($rsFotoGaleria2,$x,"fgal_desc");
                                  $gal_id = mysql_result($rsFotoGaleria2,$x,"gal_id");
                                  $indice=$x+($cantidad*$i);
                                ?>
                                <div data-target="#carousel-<?php echo $gal_id; ?>" data-slide-to="<?php echo $indice; ?>" class="thumb"><img src="admin/mod-fgaleria/img/<?php echo $fgal_img; ?>" width="100%"></div>
                                <?php
                                }
                              ?>                              
                              </div>
                              <?php 
                            }
                          ?>
   
                      </div><!-- /carousel-inner -->
                      <a class="left carousel-control" href="#thumbcarousel-<?php echo $gal_id2; ?>" role="button" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                      </a>
                      <a class="right carousel-control" href="#thumbcarousel-<?php echo $gal_id2; ?>" role="button" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                      </a>
                  </div>
              </div>
              </div>
              <div class="col-sm-5 menorca-slide">
                  <h3><?php echo $gal_titulo2; ?></h3>
                  <p><?php echo $gal_desc2; ?></p>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>

    <?php include("footer.php");?>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
    /*
    * This is the plugin
    */
    (function(a){a.createModal=function(b){defaults={title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false};var b=a.extend({},defaults,b);var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";html='<div class="modal fade" id="myModal">';html+='<div class="modal-dialog">';html+='<div class="modal-content">';html+='<div class="modal-header">';html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';if(b.title.length>0){html+='<h4 class="modal-title">'+b.title+"</h4>"}html+="</div>";html+='<div class="modal-body" '+c+">";html+=b.message;html+="</div>";html+='<div class="modal-footer">';if(b.closeButton===true){html+='<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'}html+="</div>";html+="</div>";html+="</div>";html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){a(this).remove()})}})(jQuery);

    /*
    * Here is how you use it
    */
    $(function(){    
        $('.view-pdf').on('click',function(){
            var pdf_link = $(this).attr('href');
            //var iframe = '<div class="iframe-container"><iframe src="'+pdf_link+'"></iframe></div>'
            //var iframe = '<object data="'+pdf_link+'" type="application/pdf"><embed src="'+pdf_link+'" type="application/pdf" /></object>'        
            var iframe = '<object type="application/pdf" data="'+pdf_link+'" width="100%" height="500">No Support</object>'
            $.createModal({
                title:'La Quebrada - CIENEGUILLA -',
                message: iframe,
                closeButton:true,
                scrollable:false
            });
            return false;        
        });    
    })
    </script>
    <script type="text/javascript">

    /* Iniciando jQuery */
    (function(){
      function fChange(){
        $.post("query-change.php",{
          "passuseractual" : $('#passuseractual').val(),
          "passusernueva" : $('#passusernueva').val(),
          "iduser" : $('#iduser').val(),
        },
          function (data){
            if(data==1){
              $('#result').fadeIn(500);//.fadeOut(6000)
              $('#result').html("Contraseña cambiada")
            }else{
              $('#result').fadeIn(500);//.fadeOut(6000)
              $('#result').html(data)
            }
          }
        )
      }

      $("#btn-change").on("click",function(){
        fChange();
      })
    })()

  </script>
  </body>
</html>