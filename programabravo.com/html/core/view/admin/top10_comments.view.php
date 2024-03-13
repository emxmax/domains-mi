<?php
require("../core/include/admin/ordering.php");

$oEmpleado = CrmEmpleado::getItem($personaID);
$empleadoInfo = ($oEmpleado!=NULL)? $oEmpleado->nombres.' '.$oEmpleado->apellido1.' '.$oEmpleado->apellido2: '';
$filtroInfo = (($filtro_mes!='')? Fecha::getNombreMes($filtro_mes).'/': '').' A&ntilde;o '.$filtro_anio;
?>
<h3><?php echo $empleadoInfo. ': '.$filtroInfo;?></h3>
<input type="hidden" name="filtro_mes" value="<?php echo $filtro_mes;?>" />
<input type="hidden" name="filtro_anio" value="<?php echo $filtro_anio;?>" />
<input type="hidden" name="personaID"  value="<?php echo $personaID;?>" />

    <table width="800" class="tblList" cellpadding="0" cellspacing="0">
        <tr> 
          <th width="30">&nbsp;</th>
          <th width="60"><b><?php echo showHeader('fechaRegistro', 'Fecha Registro')?></b></th>
          <th width="170"><b><?php echo showHeader('origen', 'Origen')?></b></th>
          <th width="120"><b><?php echo showHeader('mundoOrigen','Mundo Origen')?></b></th>
          <th width="170"><b><?php echo showHeader('destino','Destino')?></b></th>
          <th width="120"><b><?php echo showHeader('mundoDestino','Mundo Destino')?></b></th>
          <th width="30"><b><?php echo showHeader('votos','Votos')?></b></th>
          <th width="40"><b><?php echo showHeader('estado','Estado')?></b></th>
        </tr>
<?php
    $list = CrmPostIt::getList_User($personaID, $filtro_anio, $filtro_mes);
    foreach ($list as $oItem) {
?>
        <tr>
          <td><a href="<?php echo "javascript:Edit(".$oItem->postitID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
          </td>
          <td><?php echo $oItem->fechaRegistro; ?></td>
          <td><?php echo $oItem->origen; ?></td>
          <td><?php echo $oItem->mundoOrigen; ?></td>
          <td><?php echo $oItem->destino; ?></td>
          <td><?php echo $oItem->mundoDestino; ?></td>
          <td align="center"><?php echo $oItem->votos; ?></td>
          <td align="center"><?php echo CrmPostIt::getEstado($oItem->estado);?></td>
        </tr>
<?php } ?>
      </table>
      <div id="divViewForm" style="display:none; height:400px; width:450px;">
          <img src="../core/assets/admin/images/i_loading.gif" align="absbottom" /> Cargando...
      </div>
      <table width="800">
        <tr height="30">
            <td align="left">
                <input type="button" class="admButton" value="exportar excel" name="btnExport" onClick="Export(this.form)">
                <input type="button" class="admButton" name="btnCancel" value="regresar" onClick="javascript:Back();">
            </td>
            <td align="right"><?php echo $MODULE->getPaging();?></td>
        </tr>
      </table>
