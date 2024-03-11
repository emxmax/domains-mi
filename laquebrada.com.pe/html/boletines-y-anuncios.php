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
      			<li class="active">BOLETINES Y ANUNCIOS</li>
      			<li><a href="documentos.php">DOCUMENTOS IMPORTANTES</a></li>
            <li><a href="sociales.php">SOCIALES</a></li>
      		</ol>
          <h1>Boletines y anuncios</h1>
          <?php
          for($n = 0; $n < $nAnuncio; $n++){
            $anun_id = mysql_result($rsAnuncio,$n,"anun_id");
            $anun_titulo = mysql_result($rsAnuncio,$n,"anun_titulo");
            $anun_img = mysql_result($rsAnuncio,$n,"anun_img");
            $anun_desc = mysql_result($rsAnuncio,$n,"anun_desc");
            $anun_arch = mysql_result($rsAnuncio,$n,"anun_arch");
          ?>
          <div class="row menorca-doc-bloque">
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12 text-center">
              <a href="#">
              <div class="menorca-doc-ico">
                <img src="admin/mod-anuncios/img/<?php echo $anun_img; ?>"/>
              </div>
              </a>
            </div>
            <div class="col-lg-7 col-md-8 col-sm-9 col-xs-12">
              <div class="row menorca-anexo">
                 <h3><?php echo $anun_titulo; ?></h3>
                 <p><?php echo $anun_desc; ?>, lee el comunicado completo <b><a class="view-pdf" style="color: white;" href="admin/mod-anuncios/archivo/<?php echo $anun_arch; ?>">aquí</a></b></p>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
    </div>

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