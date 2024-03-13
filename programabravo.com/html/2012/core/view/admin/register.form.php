<?php
//Actualizar estado a Revisado
if($oItem->state==2){
	$oItem->state=1; //Revisado
	CrmRegisterForm::Update_State($oItem);
}

//Obtener Pais
$oCountry=UbgCountry::getItem($oItem->countryID);
//Obtener Asunto de Contacto
$oContact= CmsParameterLang::getItem($oItem->contactID, 1);
//Obtener Lista de Datos Adicionales
$lRegFields=CrmRegisterField::getList($kID);
?>
<script type="text/javascript" src="../core/plugins/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
// Notice: The simple theme does not use all options some of them are limited to the advanced theme
tinyMCE.init({
	mode : "textareas",
	theme : "simple"
});

function on_submit(xform){

	xform.Command.value="<?php echo ($MODULE->FormView=="edit") ?"update":"";?>";
	xform.submit();
}
</script>

<div class="modalContent" style="height:335px; width:530px;">
    <strong>Datos Comunes:</strong><br>
    <div>
	<table cellspacing="0" cellpadding="4" border="0" width="500" class="tblView">
          <tr>
            <td width="150" class="tdTitle">Nombres</td>
            <td><?php echo $oItem->name;?></td>
          </tr>
          <tr class="trAlt">
            <td class="tdTitle">Apellido Paterno</td>
            <td><?php echo $oItem->lastname;?></td>
          </tr>
          <tr>
            <td class="tdTitle">Apellido Materno</td>
            <td><?php echo $oItem->surname;?></td>
          </tr>
          <tr class="trAlt">
            <td class="tdTitle">Tel&eacute;fono</td>
            <td><?php echo $oItem->phone;?></td>
          </tr>
          <tr>
            <td class="tdTitle">Pa&iacute;s</td>
            <td><?php echo ($oCountry!=NULL)? $oCountry->countryName: '';?></td>
          </tr>
          <tr class="trAlt">
            <td class="tdTitle">Ciudad</td>
            <td><?php echo $oItem->city;?></td>
          </tr>
          <tr>
            <td class="tdTitle">Distrito</td>
            <td><?php echo $oItem->district;?></td>
          </tr>
          <tr class="trAlt">
            <td class="tdTitle">E-mail</td>
            <td><?php echo $oItem->email;?></td>
          </tr>
          <tr>
            <td class="tdTitle">Asunto</td>
            <td><?php if($oContact!=NULL) echo $oContact->parameterName;?></td>
          </tr>
          <tr class="trAlt">
            <td class="tdTitle">Comentario</td>
            <td><?php echo $oItem->comment;?></td>
          </tr>
          <tr>
            <td class="tdTitle">Fecha de Registro</td>
            <td><?php echo $oItem->registerDate;?></td>
          </tr>
          <tr class="trAlt">
            <td class="tdTitle">Estado</td>
            <td><?php echo $DAO::getState($oItem->state);?></td>
          </tr>
	</table>
	</div>
    <br>
    <strong>Datos Adicionales: </strong>
    <br>
    <div>
	<table cellspacing="0" cellpadding="4" border="0" width="500" class="tblView">
    <?php
	$idx=0;
	foreach($lRegFields as $obj){ ?>
		<tr <?php if($idx%2==1) echo 'class="trAlt"'; ?>>
			<td class="tdTitle" width="150"><?php echo $obj->fieldName;?></td><td><?php echo CrmRegisterField::getValue($obj, $oItem->formID);?></td>
		</tr>
    <?php
		$idx++;
	}
	?>
	</table>
	</div>
</div>
<div style="padding-top:8px;">
<input type="button" class="admButton" name="btnCancel" value="cerrar" onClick="javascript:Back();">
</div>
