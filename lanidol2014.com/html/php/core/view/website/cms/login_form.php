<?php


?>
<style type="text/css">
#tdLogin{
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #bbbbbb;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$("#btnSubmit").click(function(){
		if($("#userName").val()==""){
			alert("Debe ingresar su Usuario");
			$("#userName").focus(); return;
		}
		if($("#password").val()==""){
			alert("Debe ingresar su Clave");
			$("#password").focus(); return;
		}
		
		fields='user='+$('#userName').val()+'&pwd='+$('#password').val();
		$('#tdLogin').append('<div id="loading"><img src="<?php echo $URL_BASE;?>images/loader.gif" width="200px" /></div>');
		$.getJSON('<?php echo SEO::get_URLRoot();?>ajax/login.php?cmd=login&'+fields+'&callback=?', function(data) {
		  	$("#loading").remove();
			if(data.retval==1)
				location.href='<?php echo SEO::get_URLHome(); ?>';
			else
				alert(data.message);
		});

	});
});
</script>
<form id="frmLogin" name="frmLogin" method="post" action="">
              
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="12" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="42" valign="top"><input name="userName" type="text" class="defaultInputValue" id="userName" style="font-family: Impact, Haettenschweiler, Franklin Gothic Bold, Arial Black, sans-serif;font-size: 12px;border: 2px solid #10255a;height: 30px;width: 247px;padding-left: 10px;border-radius: 10px;color: #10255a;text-transform: uppercase;" title="Tu número de DNI" /></td>
            </tr>
            <tr>
              <td height="42" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                  <tr>
                    <td><input name="password" type="text" class="defaultInputValue" id="password" style="font-family: Impact, Haettenschweiler, Franklin Gothic Bold, Arial Black, sans-serif;font-size: 12px;border: 2px solid #10255a;height: 30px;width: 146px;padding-left: 10px;border-radius: 10px;color: #10255a;text-transform: uppercase;" title="4 últimos dígitos de tu dni" /></td>
                    <td align="right"><a id="btnSubmit" href="#"><img src="<?php echo $URL_BASE;?>images/botoningresar.png" width="94" height="35" border="0" /></a></td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
            <tr>
              <td id="tdLogin"></td>
            </tr>
            <tr>
              <td></td>
            </tr>
          </table>
              
</form>