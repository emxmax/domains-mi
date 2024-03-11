<?php
$DAO=$MODULE->StaticDAO;
if($MODULE->FormView=="edit"){
	$obj=$DAO::getItem($kID);
	if($obj!=NULL){
		if (!isset($oItem->nombres))			$oItem->nombres		=$obj->nombres;
		if (!isset($oItem->apellido1))			$oItem->apellido1	=$obj->apellido1;
		if (!isset($oItem->apellido2))			$oItem->apellido2	=$obj->apellido2;
		if (!isset($oItem->dni))				$oItem->dni			=$obj->dni;
		if (!isset($oItem->clave))				$oItem->clave		=$obj->clave;
		if (!isset($oItem->fechaNacimiento))	$oItem->fechaNacimiento	=$obj->fechaNacimiento;
		if (!isset($oItem->posicion))			$oItem->posicion	=$obj->posicion;
		if (!isset($oItem->unidadOrganizativa))	$oItem->unidadOrganizativa	=$obj->unidadOrganizativa;
		if (!isset($oItem->superiorID))			$oItem->superiorID		=$obj->superiorID;
		if (!isset($oItem->superiorNombre))		$oItem->superiorNombre	=$obj->superiorNombre;
		if (!isset($oItem->gerencia))			$oItem->gerencia		=$obj->gerencia;
		if (!isset($oItem->email))				$oItem->email			=$obj->email;
		if (!isset($oItem->estado))				$oItem->estado			=$obj->estado;
	}
	else
		$MODULE->addError($DAO::GetErrorMsg());
}

$cUbigeo = new Ubigeo();

?>
<script language="javascript" type="text/javascript">

function on_submit(xform){
	if(xform.nombres.value ==""){
		alert("Por favor, ingresar [Nombres]");
		xform.nombres.focus();
		return false;
	}

	xform.Command.value="<?php echo ($MODULE->FormView=="edit") ?"update":"insert";?>";
	xform.submit();
}
</script>

                <table class="tblForm" width="500">
                  <tr>
                    <td>Nombres</td>
                    <td><input name="nombres" type="text" class="text" id="nombres" value="<?php echo $oItem->nombres; ?>" size="45" maxlength="255"></td>
                  </tr>
                  <tr>
                    <td>Apellido Paterno</td>
                    <td><input name="apellido1" type="text" class="text" id="apellido1" value="<?php echo $oItem->apellido1; ?>" size="45" maxlength="255"></td>
                  </tr>
                  <tr>
                    <td>Apellido Materno </td>
                    <td><input name="apellido2" type="text" class="text" id="apellido2" value="<?php echo $oItem->apellido2; ?>" size="45" maxlength="255"></td>
                  </tr>
                  <tr>
                    <td><strong>DNI</strong> </td>
                    <td><input name="dni" type="text" class="text" id="dni" value="<?php echo $oItem->dni; ?>" size="45" maxlength="50"></td>
                  </tr>
                  <tr>
                    <td><strong>Clave</strong></td>
                    <td><input name="clave" type="clave" class="text" id="clave" value="<?php echo $oItem->clave; ?>" size="15" maxlength="20"></td>
                  </tr>
                  <tr>
                    <td>Unidad Organizativa</td>
                    <td><input name="unidadOrganizativa" type="text" class="text" id="unidadOrganizativa" value="<?php echo $oItem->unidadOrganizativa; ?>" size="45" maxlength="255"></td>
                  </tr>
                  <tr>
                    <td>Posición</td>
                    <td><input name="posicion" type="text" class="text" id="posicion" value="<?php echo $oItem->posicion; ?>" size="45" maxlength="255"></td>
                  </tr>
                  <tr>
                    <td>Gerencia (Mundo)</td>
                    <td><input name="gerencia" type="text" class="text" id="gerencia" value="<?php echo $oItem->gerencia; ?>" size="45" maxlength="255"></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><input name="email" type="text" class="text" id="email" value="<?php echo $oItem->email; ?>" size="45" maxlength="255"></td>
                  </tr>
                  <tr>
                    <td>Fecha de Nacimiento</td>
                    <td><input name="fechaNacimiento" type="text" class="text" id="fechaNacimiento" value="<?php echo $oItem->fechaNacimiento; ?>" size="15" maxlength="10">(año-mes-día)</td>
                  </tr>
                  <tr>
                    <td>Estado</td>
                    <td>
					  <input type="radio" name="estado" value="1" <?php if($oItem->estado==1) print "checked";?>> 
					  Activo
                      <input type="radio" name="estado" value="0" <?php if($oItem->estado==0) print "checked";?>> 
                      Inactivo
					</td>
                  </tr>
                  
                      <tr> 
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td colspan="2"><input type="button" class="admButton" value="guardar" id="sbmSave" name="btnSave" onClick="javascript:on_submit(this.form);">
						<input type="button" class="admButton" name="btnCancel" value="cancelar" onClick="javascript:Back();"></td>
                      </tr>
                    </table>
