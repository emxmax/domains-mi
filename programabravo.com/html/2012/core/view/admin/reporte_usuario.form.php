<?php
$DAO=$MODULE->StaticDAO;
$obj=$DAO::getItem($kID);
if($obj!=NULL){
    if (!isset($oItem->nombres))            $oItem->nombres         =$obj->nombres;
    if (!isset($oItem->apellido1))          $oItem->apellido1       =$obj->apellido1;
    if (!isset($oItem->apellido2))          $oItem->apellido2       =$obj->apellido2;
    if (!isset($oItem->dni))                $oItem->dni             =$obj->dni;
    if (!isset($oItem->clave))              $oItem->clave           =$obj->clave;
    if (!isset($oItem->fechaNacimiento))    $oItem->fechaNacimiento =$obj->fechaNacimiento;
    if (!isset($oItem->posicion))           $oItem->posicion        =$obj->posicion;
    if (!isset($oItem->unidadOrganizativa)) $oItem->unidadOrganizativa  =$obj->unidadOrganizativa;
    if (!isset($oItem->superiorID))         $oItem->superiorID      =$obj->superiorID;
    if (!isset($oItem->superiorNombre))     $oItem->superiorNombre  =$obj->superiorNombre;
    if (!isset($oItem->gerencia))           $oItem->gerencia        =$obj->gerencia;
    if (!isset($oItem->email))              $oItem->email           =$obj->email;
    if (!isset($oItem->estado))             $oItem->estado          =$obj->estado;
}
else
    $MODULE->addError($DAO::GetErrorMsg());

?>

<table class="tblForm" width="500">
  <tr>
    <td>Nombres</td>
    <td><strong><?php echo $oItem->nombres; ?></strong></td>
  </tr>
  <tr>
    <td>Apellido Paterno</td>
    <td><strong><?php echo $oItem->apellido1; ?></strong></td>
  </tr>
  <tr>
    <td>Apellido Materno </td>
    <td><strong><?php echo $oItem->apellido2; ?></strong></td>
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
    <td><strong><?php echo $oItem->posicion; ?></strong></td>
  </tr>
  <tr>
    <td>Gerencia (Mundo)</td>
    <td><strong><?php echo $oItem->gerencia; ?></strong></td>
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
          <input type="button" class="admButton" name="btnCancel" value="cancelar" onClick="javascript:Back();"></td>
    </tr>
  </table>
