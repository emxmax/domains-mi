<html>
<head>
	<title><?php echo $MODULE->moduleName;?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" href="../core/assets/admin/css/estilos.css" type="text/css" />
	<link rel="stylesheet" href="../core/assets/admin/css/droplinetabs.css" type="text/css" />
	<link rel="stylesheet" href="../core/assets/admin/css/simplemodal.css" type="text/css" />
	<link rel="shortcut icon" href="../core/assets/admin/favicon.ico" type="image/x-icon" />
	<link rel="icon" href="../core/assets/admin/favicon.ico" type="image/ico" />
	<script type="text/javascript" src="../core/assets/admin/js/jquery.js"></script>
	<script type="text/javascript" src="../core/assets/admin/js/jquery.simplemodal.js"></script>
	<script type="text/javascript" src="../core/assets/admin/js/navigate.js"></script>
    <script type="text/javascript">
	<?php echo $MODULE->clientScript; ?>
    </script>
</head>

<body>
<div id="principal">
    <div class="titulo"><?php echo $MODULE->moduleName;?></div>
    <?php if($MODULE->FormView!="list"){ ?>
    <h2 class="subtitulo"><?php echo $MODULE->getFormTitle();?></h2>
    <?php } ?>
    <form name="frmBrowse" action="<?php echo $MODULE->getURL();?>" method="post">
        <input type="hidden" name="Command">
        <input type="hidden" name="moduleID" value="<?php echo $MODULE->moduleID; ?>">
        <input type="hidden" name="FormView" value="<?php echo $MODULE->FormView; ?>">
        <input type="hidden" name="kID" value="<?php echo $kID;?>">
        <input type="hidden" name="Page" value="<?php echo $MODULE->Page;?>">
        <input type="hidden" name="OrderBy" value="<?php echo $MODULE->OrderBy;?>">
        <?php
            $file_view="../core/view/admin/".$MODULE->getFormView();
            if(file_exists($file_view))
                include($file_view);
            else
                $MODULE->addError("No se puede localizar el archivo: ".$file_view);
        ?>
        <?php if($MODULE->msgError!=""){ ?>
            <div id="divError"><ul><?php echo $MODULE->msgError;?></ul></div>
        <?php }?>
        <?php if($MODULE->msgAlert!=""){ ?>
            <div id="divAlert"><ul><?php echo $MODULE->msgAlert;?></ul></div>
        <?php }?>
    </form>
</div>
</body>
</html>