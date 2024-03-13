<?php
$URL_BASE=SEO::get_URLRoot()."content/";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $PAGE->pageTitle;?></title>
<link rel="stylesheet" href="<?php echo $URL_BASE;?>css/<?php echo(isset($oContentLang) && $oContentLang->templateID==54)? 'contacto': 'popup'; ?>.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $URL_BASE;?>css/jqtransform.css" />
<script type="text/javascript" src="<?php echo $URL_BASE;?>js/modernizr.js"></script>
<script type="text/javascript" src="<?php echo $URL_BASE;?>js/jquery.js"></script>
<?php
if(isset($oContentLang) && in_array($oContentLang->templateID, array(44, 46, 47, 48, 49, 52, 53, 54, 65))){
?>
<script type="text/javascript" src="<?php echo $URL_BASE;?>js/jquery.placeholder.js"></script>
<script type="text/javascript" src="<?php echo $URL_BASE;?>js/jquery.jqtransform.js" ></script>
<script type="text/javascript" src="<?php echo $URL_BASE;?>js/jquery.validation.js"></script>
<?php
}
?>
</head>
<body>
<?php
$file_view ='../core/view/website/' . $PAGE->getFormView() ;
if( file_exists( $file_view ) )
	include $file_view ;
else
	$PAGE->addError("No se puede cargar el archivo => ".$file_view) ;
?>
<?php
$msgErr=$PAGE->getErrorMessage();
if($msgErr!="" && $WEBSITE["DEBUG_MODE"]) echo '<div id="divError">Error:<br />'.$msgErr.'</div>';
?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36970048-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
