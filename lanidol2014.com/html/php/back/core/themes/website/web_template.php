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
</head>
<body>
<div>
<div class="root noScroll">
<div class="page">
<div class="main">
<section class="feed-photos" role="main">
<img src="<?php echo $URL_BASE;?>images/top.png" width="1024" height="193" style="none;"><div>
<?php
if(isset($oContentLang))
	include '../core/view/website/panel_content.php';
else{
	if(isset($oSectionLang))
		include '../core/view/website/panel_section.php';
	else
		include '../core/view/website/panel_home.php';
}
?>
</div>
<img src="<?php echo $URL_BASE;?>images/footer.png" width="1024" height="103" style="none;">
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
