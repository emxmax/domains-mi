<script type="text/javascript">
$(document).ready(function() {
    $('#userName').focus();
    function Login(){
        if($('#userName').val()===''){
            alert('Ingrese su usuario'); $('#userName').focus();
            return;
        }
        if($('#password').val()===''){
            alert('Ingrese su contrase\xF1a'); $('#password').focus();
            return;
        }

        $('#Command').val('login');
        $('form').submit();
    }
	
    $('#btnSubmit').click(function(){
        Login();
    });
    $('#password').keypress(function(event){
        if ( event.which == 13 ) {
            event.preventDefault();
            Login();
        }
    });
});
</script>
<div id="divLogin">
    <div class="header">
        website: <?php echo $WEBSITE["DOMAIN"].$WEBSITE["ROOT"];?>
    </div>
    <div id="logo">
        <img src="../core/assets/admin/images/logo_login.png" />
    </div>
    <table border="0" align="center" width="310" cellpadding="3">
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
            <input type="button" id="btnSubmit" name="btSubmit" class="admButton" value="ingresar" />
            <input type="reset" id="btnReset" name="btReset" class="admButton" value="limpiar" />
        </td>
    </tr>
    </table>
</div>
