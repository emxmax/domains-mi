<?php $ar=explode("/",$_SERVER['REQUEST_URI']);$prosub=1;$df=explode(".",$ar[2]);
	  //print_r($ar);
	  	  switch($df[0]){
		  case 'index':$prosub=1;break;
		  case 'ventajas':$prosub=2;break;
		  case 'como-acceder-a-los-comprobantes':$prosub=3;break;
		  case 'pago-y-registro-de-comprobantes':$prosub=4;break;
		  case 'refacturacion-notas-de-credito-y-de-debito':$prosub=5;break;
		  case 'facturacion-electronica':$prosub=6;break;
	  }
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <base href="http://exsa.net/facturacion-electronica/">
  <title>EXSA - Plataforma de Facturación Electrónica</title>
  <link href='http://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
  <link href="public/assets/css/style.css" rel="stylesheet" />
  <link rel="shortcut icon" href="http://exsa.net/wp-content/uploads/2013/09/favicon1.ico" type="image/x-icon" />
  <!--[if IE 7]>
   <style type="text/css">
  	#header .menu ul li a h2 span{
		position:absolute;
	}
  </style>
  <script src="public/assets/js/jquery.js" type="text/javascript"></script>
  <script type="text/javascript">
  	$(document).ready(function(e) {
		$("#header .menu ul li a h2 span").each(function(index, element) {THIS=$(this);
			alto=parseInt(THIS.height()); ancho=parseInt(THIS.width());
            var top=(($(this).parent().height()-alto)/2);
			var left=(($(this).parent().width()-ancho)/2);
			THIS.css({"left":left,"top":top});
        });
    });
  </script>
<![endif]-->
</head>
<body>
<div id="wrapper_boxed" class="clearfix">
	<div class="site_wrapper clearfix">
    	<div id="header" class="clearfix">
        	<div class="content_header">
            	<div class="content clearfix">
                    <h1 class="logo-wrapper">
                        <a href="http://exsa.net/">
                            <img src="public/assets/images/logoexsa.gif" width="183" height="82" alt="">
                        </a>
                    </h1>
                    <div class="title_page">
                        <h1>PLATAFORMA DE<br />FACTURACIÓN ELECTRÓNICA</h1>
                    </div>
            	</div>
            </div>
            <div class="menu">
            	<ul class="clearfix list_reset">
                	<li class="item1"><a class="item1<?php echo ($prosub == 1) ? ' active' : '';?>" href="index.php"><h2><span>BIENVENIDA</span></h2></a></li>
                    <li class="item2"><a class="item2<?php echo ($prosub == 2) ? ' active' : '';?>" href="ventajas.php"><h2><span>VENTAJAS</span></h2></a></li>
                    <li class="item3"><a class="item3<?php echo ($prosub == 3) ? ' active' : '';?>" href="como-acceder-a-los-comprobantes.php"><h2><span>CÓMO ACCEDER A LOS<br /> COMPROBANTES</span></h2></a></li>
                    <li class="item4"><a class="item4<?php echo ($prosub == 4) ? ' active' : '';?>" href="pago-y-registro-de-comprobantes.php"><h2><span>PAGO Y REGISTRO DE<br /> COMPROBANTES.</span></h2></a></li>
                    <li class="item5"><a class="item5<?php echo ($prosub == 5) ? ' active' : '';?>" href="refacturacion-notas-de-credito-y-de-debito.php"><h2><span>REFACTURACIÓN, NOTAS DE<br /> CRÉDITO Y DE DÉBITO.</span></h2></a></li>
                </ul>
            </div>
        </div>   