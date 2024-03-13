<?php
$DAO='CrmEmpleado';
$oItem=$DAO::getItem($kID);
if($oItem==NULL)
	$MODULE->addError($DAO::GetErrorMsg());
?>
<input type="hidden" name="gerencia" value="<?php echo $gerencia;?>" />
<input type="hidden" name="filtro_tipo" value="<?php echo $filtro_tipo;?>" />
<input type="hidden" name="filtro_mes" value="<?php echo $filtro_mes;?>" />
<input type="hidden" name="filtro_anio" value="<?php echo $filtro_anio;?>" />
    <table class="tblForm" width="500">
      <tr>
        <td>Nombres</td>
        <td><strong><?php echo utf8_decode($oItem->nombres); ?></strong></td>
      </tr>
      <tr>
        <td>Apellido Paterno</td>
        <td><strong><?php echo utf8_decode($oItem->apellido1); ?></strong></td>
      </tr>
      <tr>
        <td>Apellido Materno </td>
        <td><strong><?php echo utf8_decode($oItem->apellido2); ?></strong></td>
      </tr>
      <tr>
        <td>DNI </td>
        <td><strong><?php echo $oItem->dni; ?></strong></td>
      </tr>
      <tr>
        <td>Unidad Organizativa</td>
        <td><strong><?php echo $oItem->unidadOrganizativa; ?></strong></td>
      </tr>
      <tr>
          <td>Posici&oacute;n</td>
        <td><strong><?php echo utf8_decode($oItem->posicion); ?></strong></td>
      </tr>
      <tr>
        <td>Gerencia (Mundo)</td>
        <td><strong><?php echo utf8_decode($oItem->gerencia); ?></strong></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><strong><?php echo $oItem->email; ?></strong></td>
      </tr>
      <tr>
        <td>Fecha de Nacimiento</td>
        <td><strong><?php echo $oItem->fechaNacimiento; ?></strong>
        (a&ntilde;o-mes-d&iacute;a)</td>
      </tr>
      <tr>
        <td>Estado</td>
        <td><strong><?php echo $DAO::getEstado($oItem->estado);?></strong></td>
      </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr> 
          <td colspan="2">
            <input type="button" class="admButton" value="regresar" id="btnBack" name="btnBack" onclick="GetBackTo()">
            </td>
          </tr>
        </table>
