<script type="text/javascript">
$(document).ready(function() {
	$('#userName').focus();
});
</script>
<div id="divLogin">
    <div class="header"> website: <?php echo $WEBSITE["DOMAIN"].$WEBSITE["ROOT"];?> </div>
    <div id="logo">
        <img src="../core/assets/admin/images/logo_login.png" />
    </div>
    <table border="0" align="center" width="300" cellpadding="3">
    <tr>
        <td align="right">Usuario :</td>
        <td>
            <input type="text" id="userName" name="userName" class="textbox" value="<?php echo $userName; ?>" />
        </td>
    </tr>
    <tr> 
        <td align="right">Contrase&ntilde;a :</td>
        <td>
            <input type="password" id="password" name="password" class="textbox" />
        </td>
    </tr>
    <tr> 
        <td></td>
        <td><div class="msgErr"><?php echo $MODULE->msgError;?></div></td>
    </tr>
    <tr> 
        <td>&nbsp;</td>
        <td>
            <input type="submit" class="admButton" value="ingresar" name="btSubmit" />
            <input type="reset" class="admButton" value="limpiar" name="btReset" />
        </td>
    </tr>
    </table>
    <p><?php echo CMS_VERSION.' &copy;'.CMS_YEAR.' '.CMS_AUTHOR; ?></p>
</div>
