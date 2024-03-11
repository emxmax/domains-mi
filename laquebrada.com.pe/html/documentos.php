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
    <title>La Quebrada / Documentos</title>
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
      			<li><a href="boletines-y-anuncios.php">BOLETINES Y ANUNCIOS</a></li>
      			<li class="active">DOCUMENTOS IMPORTANTES</li>
            <li><a href="sociales.php">SOCIALES</a></li>
      		</ol>
          <h1>Documentos importantes</h1>
          <?php
          for($n = 0; $n < $nDocumento; $n++){
            $doc_id = mysql_result($rsDocumento,$n,"doc_id");
            $doc_name = mysql_result($rsDocumento,$n,"doc_name");
            $doc_img = mysql_result($rsDocumento,$n,"doc_img");
            $doc_arch = mysql_result($rsDocumento,$n,"doc_arch");
          ?>
          <div class="row menorca-doc-bloque">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                <div class="menorca-doc-ico">
                  <img src="admin/mod-documentos/img/<?php echo $doc_img; ?>"/>
                </div>
              </div>
              <div class="col-lg-7 col-md-8 col-sm-8 col-xs-12">
                  <?php if($doc_arch){ ?>
                     <a href="admin/mod-documentos/archivo/<?php echo $doc_arch; ?>" class="view-pdf" style="text-decoration:none;cursor:pointer;">
                      <h1 style="color:white;font-size:20px;margin-top: 5px;"><?php echo $doc_name; ?></h1>
                     </a>
                  <?php }else{ ?>
                    <h1 style="color:white;font-size:20px;margin-top: 5px;"><?php echo $doc_name; ?></h1>
                  <?php } ?>

                  <?php

                  $sqlAnexo = "SELECT anex.anex_id, anex.anex_name, anex.anex_titulo, anex.anex_arch, ta.tarch_img, ta.tarch_name FROM anexo anex inner join tarchivo ta on anex.tarch_id=ta.tarch_id WHERE anex.doc_id=$doc_id ORDER BY anex.anex_id";
                  $rsAnexo = mysql_query($sqlAnexo);
                  $nAnexo = mysql_num_rows($rsAnexo);

                  for($m = 0; $m < $nAnexo; $m++){
                    $anex_id = mysql_result($rsAnexo,$m,"anex_id");
                    $anex_name = mysql_result($rsAnexo,$m,"anex_name");
                    $anex_titulo = mysql_result($rsAnexo,$m,"anex_titulo");
                    $anex_arch = mysql_result($rsAnexo,$m,"anex_arch");
                    $tarch_img = mysql_result($rsAnexo,$m,"tarch_img");
                    $tarch_name = mysql_result($rsAnexo,$m,"tarch_name");
                    
                    if($tarch_name=='pdf'){

                  ?>

                    <div class="row menorca-anexo">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <a class="view-pdf" href="admin/mod-anexo/archivo/<?php echo $anex_arch; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Click para Descargar">
                          <p><b><?php echo $anex_name; ?></b> <?php echo $anex_titulo; ?></p>
                        </a>
                      </div>
                    </div>
                    <?php }else{ ?>

                    <div class="row menorca-anexo">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <a href="admin/mod-anexo/archivo/<?php echo $anex_arch; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Click para Descargar">
                          <p><b><?php echo $anex_name; ?></b> <?php echo $anex_titulo; ?></p>
                        </a>
                      </div>
                    </div>

                  <?php }} ?>
              </div>
          </div>
          <?php } ?>
        </div>
    </div>

    <?php include("footer.php");?>
  	<style>
      .iframe-container {    
          padding-bottom: 60%;
          padding-top: 30px; height: 0; overflow: hidden;
      }
       
      .iframe-container iframe,
      .iframe-container object,
      .iframe-container embed{
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
      }

      .modal.in .modal-dialog {
        transform: none; /*translate(0px, 0px);*/
      }
    </style>
  	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
    <script>
    function mobile()
       {
           var isMobile = {
               Android: function() {
                   return navigator.userAgent.match(/Android/i);
               },
               BlackBerry: function() {
                   return navigator.userAgent.match(/BlackBerry/i);
               },
               iOS: function() {
                   return navigator.userAgent.match(/iPhone|iPad|iPod/i);
               },
               Opera: function() {
                   return navigator.userAgent.match(/Opera Mini/i);
               },
               Windows: function() {
                   return navigator.userAgent.match(/IEMobile/i);
               },
           };
           if (isMobile.Android())
           {
               return "Android";
           }
           else if (isMobile.BlackBerry())
           {
               return "BlackBerry";
           }
           else if (isMobile.iOS())
           {
               return "Iphone";
           }
           else if (isMobile.Opera())
           {
               return "Opera";
           }
           else if (isMobile.Windows())
           {
               return "IEMobile";
           }
           else
           {
               return "Default";
           }
       }  
    /*
    * This is the plugin
    */
    (function(a){a.createModal=function(b){defaults={title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false};var b=a.extend({},defaults,b);var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";html='<div class="modal fade" id="myModal">';html+='<div class="modal-dialog">';html+='<div class="modal-content">';html+='<div class="modal-header">';html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';if(b.title.length>0){html+='<h4 class="modal-title">'+b.title+"</h4>"}html+="</div>";html+='<div class="modal-body" '+c+">";html+=b.message;html+="</div>";html+='<div class="modal-footer">';if(b.closeButton===true){html+='<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'}html+="</div>";html+="</div>";html+="</div>";html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){a(this).remove()})}})(jQuery);

    /*
    * Here is how you use it
    */
    $(function(){

        if(mobile()=="Default")
        {
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
        }else{

        }


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