<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.bordeazul {
	background-color: #1c5380;
	border: 1px solid #1c5380;
	margin: 8px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FFF;
	padding: 2px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
}
.blanco {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FFF;
	text-decoration: none;
}
</style>
</head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56025701-1', 'auto');
  ga('send', 'pageview');

</script>
<body style="overflow: hidden">
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
</body>
</html>
