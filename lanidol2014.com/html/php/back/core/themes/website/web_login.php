<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<script type="text/javascript" src="<?php echo $URL_BASE;?>js/jquery-1.10.1.min.js"></script>

<style type="text/css">
html body {
  background: #000;
  }

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.input1 {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 20px;
	border: 0px none #CCC;
	background-image: url(<?php echo $URL_BASE;?>images/fondoboton.png);
	height: 40px;
	width: 195px;
	padding-left: 20px;
	background-color: #E8E8E8;
}
</style>
<script>
(function($) {  
	  $.fn.defaultInputValue = function() {
	  		// Loops over all specified elements and sets default value
			// from the title attribule.
			this.each(function() {
				$(this).val($(this).attr('title'));
			});
			
			// If the value equals the title
			// it will be cleared when input is clicked.
	  		$(this).click(function(){
        		if ($(this).attr('title') == $(this).val()) {
        			$(this).val('');
        		}
        	});
        	
        	// When input lose its focus
        	// and if the value is empty the default text specified in the title
        	// will be set as value.
        	$(this).blur(function(){
        		if ($(this).val() == '') {
        			$(this).val($(this).attr('title'));
        		}
        });
	  };
	})(jQuery); 

    </script>
    <script type="text/javascript">
		$(document).ready(function() {
			$('.defaultInputValue').defaultInputValue();
		});
</script>
</head>
<body>



<table width="1024" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="513"><img src="<?php echo $URL_BASE;?>images/topprincipal.png" width="1024" height="513" border="0"></td>
  </tr>
  <tr>
    <td height="255"><table width="100%" height="255" border="0" cellspacing="0" cellpadding="0" background="<?php echo $URL_BASE;?>images/01principal.png">
      <tr>
        <td width="609"></td>
        <td valign="top"><?php
	include '../core/view/website/cms/login_form.php';
?></td>
        <td width="159"></td>
      </tr>
    </table></td>
  </tr>
</table>


<?php
$msgErr=$PAGE->getErrorMessage();
if($msgErr!="" && $WEBSITE["DEBUG_MODE"]) echo '<div id="divError">Error:<br />'.$msgErr.'</div>';
?>
<map name="Map" id="Map">
  <area shape="rect" coords="646,273,871,296" href="http://www.luisenriquerossel.com/" target="_blank" />
</map>
</body>
</html>
