<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="title" content="<?php echo $PAGE->metaTag['title']; ?>">
<meta name="keywords" content="<?php echo $PAGE->metaTag['keywords']; ?>">
<meta name="description" content="<?php echo $PAGE->metaTag['description']; ?>">
<meta name="distribution" content="Global">
<meta name="city" content="Lima">
<meta name="country" content="Peru">
<meta name="author" content="http://www.lan.com">
<title><?php echo htmlentities($PAGE->pageTitle);?></title>
<link rel="shortcut icon" href="<?php echo $URL_BASE;?>images/favicon.ico">
<link rel="icon" href="<?php echo $URL_BASE;?>images/favicon.ico" type="image/x-icon"/>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $URL_BASE;?>js/jquery.easing.min.js"></script>		
<script type="text/javascript" src="<?php echo $URL_BASE;?>fancybox/jquery.fancybox.js?v=2.1.4"></script>
<script type="text/javascript" src="<?php echo $URL_BASE;?>fancybox/myfancybox.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $URL_BASE;?>fancybox/jquery.fancybox.css?v=2.1.4" media="screen" />
<link href="<?php echo $URL_BASE;?>style.css" rel="stylesheet" type="text/css">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56025701-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
<div>
<div class="root noScroll">
<div class="page">
<div class="main">
<section class="feed-photos" role="main">
<table bgcolor="#eaeaea" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td height="193"><img src="<?php echo $URL_BASE;?>images/top.png" width="1024" height="193" usemap="#Map" style="none;" border="0">
<map name="Map" id="Map">
  <area shape="rect" coords="906,25,999,55" href="http://www.lanidol2014.com/php/logoff.php" />
</map>
</td>
    </tr>
    <tr>
      <td><div><?php
if(isset($oContentLang))
	include '../core/view/website/panel_content.php';
else{
	if(isset($oSectionLang))
		include '../core/view/website/panel_section.php';
	else
		include '../core/view/website/panel_home.php';
}
?></div></td>
    </tr>
    <tr>
      <td height="103"><img src="<?php echo $URL_BASE;?>images/footer.png" width="1024" height="103" style="none;"></td>
    </tr>
  </tbody>
</table>
</section>



<?php
$msgErr=$PAGE->getErrorMessage();
if($msgErr!="" && $WEBSITE["DEBUG_MODE"]) echo '<div id="divError">Error:<br />'.$msgErr.'</div>';
?>
</div>
</div>
</div>
</div>
</body>
</html>
