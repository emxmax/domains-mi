<?php
$userAdmin	=AdmLogin::getUserSession();
?>
<script type="text/javascript">
function on_submit(xform){
    if(xform.userName.value ===""){
        alert("Debe ingresar un nombre de  usuario");
        xform.userName.focus(); return false;
    }
    if(xform.password.value ===""){
        alert("Debe ingresar una contrase\xF1a");
        xform.password.focus(); return false;
    }
    if(xform.firstName.value ===""){
        alert("Debe ingresar un nombre");
        xform.firstName.focus(); return false;
    }
    if(xform.email.value ===""){
        alert("Debe ingresar un email");
        xform.email.focus(); return false;
    }
    if(!validateEmail(xform.email.value)){
        alert("Debe ingresar un email v\xE1lido");
        xform.email.focus(); return false;
    }

    xform.Command.value="<?php echo ($MODULE->FormView=="edit") ?"update":"insert";?>";
    xform.submit();
}
</script>
    <table class="tblForm" width="400">
      <tr>
        <td>Perfil</td>
        <td>
    <?php
	if($MODULE->FormView=="edit"){
            $oProfile=AdmProfile::getItem($oItem->profileID);
            echo '<strong>'.$obj->profileName.'</strong>';
            echo '<input type="hidden" name="profileID" value="'.$oItem->profileID.'" />';
        }
        else{
        
            $list = AdmProfile::getList();
            echo '<select name="profileID">';
            foreach ($list as $obj) {
                echo "<option value=\"".$obj->profileID."\"";
                if($obj->profileID==$oItem->profileID) echo " selected";
                echo ">".$obj->profileName."</option>";
            }
            echo '</select>';
        }
    ?>
        </td>
      </tr>
      <tr>
        <td>Usuario</td>
        <td>
    <?php
	if($MODULE->FormView=="edit"){
            echo '<strong>'.$oItem->userName.'</strong>';
            echo '<input type="hidden" name="userName" value="'.$oItem->userName.'" />';
        }
        else{
            echo '<input name="userName" type="text" id="userName" autocomplete="off" value="'.$oItem->userName.'" size="20" maxlength="15">';
        }
    ?>
        </td>
      </tr>
      <tr> 
        <td>Contrase&ntilde;a</td>
        <td><input name="password" type="password" id="password" autocomplete="off" class="text" value="<?php echo $oItem->password; ?>" size="20" maxlength="15"></td>
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