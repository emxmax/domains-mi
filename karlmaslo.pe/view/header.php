<!DOCTYPE html>
<html lang="es" ng-app="karlMaslo">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titlelang;?></title>
    <meta name="description" content="<?php echo $metadescripcion;?>" />
    <meta name="keywords" content="<?php echo $metakey;?>">
    <meta name="image" content="<?php echo _URL_;?>adminkarl/resources/assets/image/bibliografia/<?php echo $imagen;?>">

    <link href="<?php echo _URL_;?>img/ico.png" rel="shortcut icon">
    <link rel="apple-touch-icon" href="<?php echo _URL_;?>img/ico.png"/>

    <link href="<?php echo _URL_;?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo _URL_;?>css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    	.par .sombra{
    		display: none;
    	}
    </style>
</head>
<body>
	<?php include('menu.php'); ?>