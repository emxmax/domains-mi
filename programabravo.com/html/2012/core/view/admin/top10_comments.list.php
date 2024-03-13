<?php
require("../core/include/admin/ordering.php");
?>
<script type="text/javascript">
function Detail(kID){
    xform=resetForm();
    xform.FormView.value="view";
    xform.personaID.value=kID;
    xform.submit();
}
</script>
<input type="hidden" name="personaID" />

<fieldset id="fldFiltro" style="text-align: right; width:590px;">
  <legend accesskey="F">Filtros</legend>
  <table width="100%">
  <tr>
    <td align="right" valign="middle">
        <select name="filtro_mes" id="filtro_mes" onchange="Search(this.form)">
            <option value="">Todos los meses</option>
<?php
    $arrMes = Fecha::getArray_Meses();
    for($i=0;$i<count($arrMes);$i++){
        $selected=($filtro_mes==($i+1))? 'selected="true"': '';
        echo '<option value="'.($i+1).'" '.$selected.'>'.$arrMes[$i].'</option>';
    }
?>
        </select>
        <select name="filtro_anio" id="filtro_anio" onchange="Search(this.form)">
<?php
    for($i=2013; $i<=date("Y"); $i++){
        $selected=($filtro_anio==$i)? 'selected="true"': '';
        echo '<option value="'.$i.'" '.$selected.'>A&ntilde;o '.$i.'</option>';
    }
?>
        </select>
    </td>
    <td width="70">
        <input name="btnSearch" type="button" value="Buscar" class="admButton" onclick="Search(this.form)">
    </td>
  </tr>
  </table>
</fieldset>

    <table width="600" class="tblList" cellpadding="0" cellspacing="0">
        <tr> 
          <th width="30">&nbsp;</th>
          <th width="60"><b><?php echo showHeader('destino', 'Empleado')?></b></th>
          <th width="120"><b><?php echo showHeader('mundoDestino','Mundo')?></b></th>
          <th width="30"><b><?php echo showHeader('votos','Total')?></b></th>
          <th width="40"><b><?php echo showHeader('estado','Estado')?></b></th>
        </tr>
<?php
    $list = CrmPostIt::getList_TopUsers($filtro_anio, $filtro_mes);
    foreach ($list as $oItem) {
?>
        <tr>
          <td><a href="<?php echo "javascript:Detail(".$oItem->destinoID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
          </td>
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
      <table width="600">
        <tr height="30">
            <td align="left">
                <input type="button" class="admButton" value="exportar excel" name="btnExport" onClick="Export(this.form)">
            </td>
            <td align="right"><?php echo $MODULE->getPaging();?></td>
        </tr>
      </table>
