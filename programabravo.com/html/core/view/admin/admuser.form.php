<?php
$userAdmin	=AdmLogin::getUserSession();
?>
<script type="text/javascript">
function on_submit(xform){
	if(xform.password.value ==""){
		alert("Please, enter [Password]");
		xform.password.focus(); return false;}

	xform.Command.value="<?php echo ($MODULE->FormView=="edit") ?"update":"insert";?>";
	xform.submit();
}
</script>
                    <table class="tblForm" width="400">
					<?php
					if($userAdmin["profileID"]==1){
					?>
                      <tr>
                        <td>Cliente</td>
                        <td><select name="clientID">
    <?php
	$list=AdmClient::getList($userAdmin["clientID"]);
	foreach ($list as $obj) {
		echo "<option value=\"".$obj->clientID."\"";
		if($obj->clientID==$oItem->clientID) echo " selected";
		echo ">".$obj->company."</option>";
	}
	?>
                        </select></td>
                      </tr>
					<?php } 
					else 
						echo "<input type=\"hidden\" name=\"clientID\" value=\"".$userAdmin["clientID"]."\">";
					?>
                      <tr> 
                        <td>Usuario</td>
                        <td><input name="userName" type="text" id="userName" class="text" value="<?php echo $oItem->userName; ?>" size="20" maxlength="15" <?php echo ($MODULE->FormView=="edit") ?"readonly style='background-color:#999999'":"";?>></td>
                      </tr>
                      <tr> 
                        <td>Contrase&ntilde;a</td>
                        <td><input name="password" type="password" id="password" class="text" value="<?php echo $oItem->password; ?>" size="20" maxlength="15"></td>
                      </tr>
                      <tr> 
                        <td width="127">Nombre</td>
                        <td width="273"><input name="firstName" type="text" class="text" id="firstName" value="<?php echo $oItem->firstName; ?>" size="30" maxlength="30"></td>
                      </tr>
                      <tr> 
                        <td>Apellido </td>
                        <td><input name="lastName" type="text" class="text"id="lastName" value="<?php echo $oItem->lastName; ?>" size="30" maxlength="30"></td>
                      </tr>
                      <tr> 
                        <td height="24">Email</td>
                        <td> <input name="email" type="text" class="text"id="email" value="<?php echo $oItem->email; ?>" size="30" maxlength="40"></td>
                      </tr>
                      <tr> 
                        <td>Perfil</td>
                        <td><select name="profileID">
    <?php
	$list=AdmProfile::getList($userAdmin["clientID"]);
	foreach ($list as $obj) {
		echo "<option value=\"".$obj->profileID."\"";
		if($obj->profileID==$oItem->profileID) echo " selected";
		echo ">".$obj->profileName."</option>";
	}
	?>
                          </select></td>
                      </tr>
                      <tr> 
                        <td>Estado</td>
                        <td>
							<input type="radio" name="state" value="1" <?php if($oItem->state==1) echo "checked";?>>Activo 
							<input type="radio" name="state" value="2" <?php if($oItem->state==2) echo "checked";?>>Bloqueado
                            <input type="radio" name="state" value="0" <?php if($oItem->state==0) echo "checked";?>>Inactivo
						</td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                      </tr>
                    <tr> 
                      <td colspan="2"> <input type="button" class="admButton" value="guardar" id="sbmSave" name="btnSave" onClick="javascript:on_submit(this.form);">
                      <input type="button" class="admButton" name="btnCancel" value="cancelar" onClick="javascript:Back();"></td>
					</tr>
                  </table>
