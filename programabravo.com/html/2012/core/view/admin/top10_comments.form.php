<?php
if($MODULE->FormView=="edit"){
    $obj = CrmPostIt::getItem($kID);
    if($obj!=NULL){
        $oItem->typeID          =$obj->typeID;
        $oItem->typeName        =$obj->typeName;
        $oItem->origenID        =$obj->origenID;
        $oItem->destinoID       =$obj->destinoID;
        $oItem->origen          =utf8_decode($obj->origen);
        $oItem->destino         =utf8_decode($obj->destino);
        $oItem->mundo           =utf8_decode($obj->mundo);
        $oItem->votos           =$obj->votos;
        $oItem->fechaRegistro   =$obj->fechaRegistro;
        if (!isset($oItem->mensaje))    $oItem->mensaje =utf8_decode($obj->mensaje);
        if (!isset($oItem->estado))     $oItem->estado  =$obj->estado;
    }
    else
        $MODULE->addError(CrmPostIt::GetErrorMsg());
}

$cUbigeo = new Ubigeo();

?>
<script type="text/javascript">
function BackToView(xform){
    xform.FormView.value="view";
    xform.submit();
}

function on_submit(xform){
    if(xform.mensaje.value ==""){
            alert("Por favor, ingresar [mensaje]");
            xform.mensaje.focus();
            return false;
    }

    xform.Command.value="<?php echo ($MODULE->FormView=="edit") ?"update":"insert";?>";
    xform.submit();
}
</script>
<input type="hidden" name="filtro_mes" value="<?php echo $filtro_mes;?>" />
<input type="hidden" name="filtro_anio" value="<?php echo $filtro_anio;?>" />
<input type="hidden" name="personaID"  value="<?php echo $personaID;?>" />

<table class="tblForm" width="500">
  <tr>
    <td>De</td>
    <td><strong><?php echo $oItem->origen; ?></strong></td>
  </tr>
  <tr>
    <td>Para</td>
    <td><strong><?php echo $oItem->destino; ?></strong></td>
  </tr>
  <tr>
    <td>Categor&iacute;a</td>
    <td><strong><?php echo strtoupper($oItem->typeName); ?></strong></td>
  </tr>
  <tr>
    <td>Mundo</td>
    <td><strong><?php echo $oItem->mundo; ?></strong></td>
  </tr>
  <tr>
    <td>Votos</td>
    <td><strong><?php echo $oItem->votos; ?></strong></td>
  </tr>
  <tr>
    <td>Mensaje</td>
    <td><textarea name="mensaje" type="mensaje" id="mensaje" cols="70" rows="5"><?php echo $oItem->mensaje; ?></textarea></td>
  </tr>
  <tr>
    <td>Fecha de Registro</td>
    <td><?php echo $oItem->fechaRegistro; ?></td>
  </tr>
  <tr>
    <td>Estado</td>
    <td>
        <input type="radio" name="estado" value="1" <?php if($oItem->estado==1) print "checked";?>> Activo
        <input type="radio" name="estado" value="0" <?php if($oItem->estado==0) print "checked";?>> Inactivo
    </td>
  </tr>
    <tr> 
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2">
          <input type="button" class="admButton" value="guardar" id="sbmSave" name="btnSave" onClick="javascript:on_submit(this.form);">
          <input type="button" class="admButton" name="btnCancel" value="cancelar" onClick="javascript:BackToView(this.form);">
      </td>
    </tr>
  </table>
