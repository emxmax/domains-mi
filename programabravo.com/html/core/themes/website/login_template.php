<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Programa Bravo | LAN Perú</title>
<link href="<?php echo $URL_BASE;?>styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo $URL_BASE;?>css/jquery.validation.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $URL_BASE;?>js/jquery.validation.js"></script>
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
<!-- Begin View -->
<?php
    include '../core/view/website/panel_login.php';
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
