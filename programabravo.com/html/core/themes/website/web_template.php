<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Programa Bravo | LAN Perú</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $URL_BASE;?>js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo $URL_BASE;?>fancybox/jquery.fancybox.js?v=2.1.4"></script>
<script type="text/javascript" src="<?php echo $URL_BASE;?>fancybox/myfancybox.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $URL_BASE;?>fancybox/jquery.fancybox.css?v=2.1.4" media="screen" />
<link href="<?php echo $URL_BASE;?>styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- Begin View -->
<?php
    include '../core/view/website/panel_content.php';
?>
<!-- End view -->
<?php
$msgErr=$PAGE->getErrorMessage();
if($msgErr!="" && $WEBSITE["DEBUG_MODE"]) echo '<div id="divError">Error:<br />'.$msgErr.'</div>';
?>
<script type="text/javascript">
/*
 * Google Analytics Script
*/
</script>
</body>
</html>
