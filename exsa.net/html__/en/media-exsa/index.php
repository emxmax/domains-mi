<?php
//Inicio la sesión 
session_start(); 
//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO 
if(isset($_SESSION['Exsaestado'])){
	if ($_SESSION['Exsaestado'] == 1) { 
		$estado=$_SESSION['Exsaestado'];
	    $nombre=$_SESSION['Exsanombre'];
	    $idUsuario=$_SESSION['ExsaidUsuario'];
		$usuario=$_SESSION['Exsausuario'];
        $clave=$_SESSION['Exsaclave'];
	}else{
		$estado=0;
		header("Location: login.html"); 
	    exit(); 
	}
}else{
	$estado=0;
	header("Location: login.html"); 
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link type="image/x-icon" href="../images/favicon.ico" rel="icon" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css">
	<link href="css/sb-admin.css" rel="stylesheet">
	<link href="css/fontsawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/index.css" type="text/css">
    <link rel="shortcut icon" href="../ imagenes/favicon.ico" type="image/x-icon" id="lnkIcono"/>
	<script src="js/vendor/jquery-1.9.1.js" type="text/javascript"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckeditor/adapters/jquery.js"></script>
	<script src="js/vendor/bootstrap.js" type="text/javascript"></script>
	<script src="js/F.js" type="text/javascript"></script>
	<script src="js/proceso/proceso.js" type="text/javascript"></script>
    <script src="js/app/control/Helper.js" type="text/javascript"></script>
	


	<script type="text/javascript" src="dataTable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="dataTable/media/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="dataTable/extensions/Responsive/js/dataTables.responsive.js"></script>
    <link rel="stylesheet" type="text/css" href="dataTable/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="dataTable/media/css/dataTables.bootstrap.css">
	<link rel="stylesheet" type="text/css" href="dataTable/extensions/Responsive/css/dataTables.responsive.css">

	<link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <link href="css/menu.css" media="all" rel="stylesheet" type="text/css" />

	<title>::PANEL DE ADMINISTRACIÓN EXSA::</title>
</head>
<body>
<div id="nube2" style="display:none;">
    <div id="precarga2">
        <img src="imagenes/ajax-loader.gif" alt="">
    </div>
</div>
	<div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Exsa administración ...</a>
            </div>
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a id="userData" data-user="<?php echo $idUsuario; ?>" href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $nombre; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li id="optExit"><a><i class="fa fa-fw fa-power-off"></i> Salir</a></li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" id="seccionPaginas">
                    <li class="item-li item-menu"><a href="?sec=menu">Menú</a></li>
                    <li class="item-li item-item-menu"><a href="?sec=item-menu">Item Menú</a></li>
                    <li class="item-li item-asignar-menu"><a href="?sec=asignar-menu">Asignar Menú</a></li>
                    <li class="item-li item-paginas"><a href="?sec=paginas">Paginas</a></li>
                    <li class="item-li item-contenidos"><a href="?sec=contenidos">Contenidos</a></li>
                    <li class="item-li item-imagenes"><a href="?sec=imagenes">Imagenes</a></li>
                    <li class="item-li item-archivos"><a href="?sec=archivos">Archivos</a></li>
                    <li class="item-li item-tabs"><a href="?sec=tabs">Tabs</a></li>
                    <li class="item-li item-formularios"><a href="?sec=formularios">Formularios</a></li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
			<?php
		        if(isset($_GET['sec'])){
		            $seccion=$_GET['sec'];
		            include('secciones/'.$seccion.'.php');    
		        }else{
		            include('secciones/menu.php');
		        }
		    ?>
            </div>
            <?php
                include('secciones/extras.php');
            ?>
        </div>
    </div>
    <script src="js/vistas/Funciones.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
</body>
</html>