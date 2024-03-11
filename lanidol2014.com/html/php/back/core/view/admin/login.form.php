<script type="text/javascript">
$(document).ready(function() {
	$('#userName').focus();
});
</script>
<div id="divLogin">
	<div class="header">
		<img src="../core/assets/admin/images/logo.jpg" />
	</div>
	<TABLE BORDER="0" align="center" width="280" cellpadding="3">
	<TR> 
		<TD width="80" valign="bottom">Usuario</TD>
		<TD valign="bottom">
			<input type="text" id="userName" name="userName" class="textbox" value="<?php echo $userName; ?>" />
		</TD>
	</TR>
	<TR> 
		<TD valign="bottom">Contrase&ntilde;a</TD>
		<TD valign="bottom">
			<input type="password" id="password" name="password" class="textbox" />
		</TD>
	</TR>
	<TR> 
		<TD></TD>
		<TD valign="bottom">
			<input type="submit" class="admButton" value="ingresar" name="btSubmit" />
			<input type="reset" class="admButton" value="limpiar" name="btReset" />
		</TD>
	</TR>
	<TR> 
		<TD colspan="2"><div class="msgErr"><?php echo ADMLogin::GetErrorMsg();?></div>&nbsp;</TD>
	</TR>
	</TABLE>
</div>
    <p align="center">
                    dominio: <?php echo $WEBSITE["DOMAIN"];?>
    </p>
