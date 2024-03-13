<?php
require("../core/include/admin/ordering.php");
?>
<script type="text/javascript">
function Detail(gerencia){
	xform=document.forms[0];
	xform.gerencia.value=gerencia;
	xform.FormView.value="list";
	xform.criterio.value="";
	xform.moduleID.value=23;
	xform.submit();
}
</script>
<fieldset id="fldFiltro" style="text-align: right; width:590px;">
  <legend accesskey="F">Filtros</legend>
  <table width="100%">
  <tr>
    <td align="right" valign="middle">
        <select name="filtro_tipo" id="filtro_tipo" onchange="Search(this.form)">
            <option value="">Todas las categorias</option>
<?php
$lPostitTipo = CrmPostItType::getList();
foreach ($lPostitTipo as $oType){
        $selected=($filtro_tipo==$oType->typeID)? 'selected="true"': '';
        echo '<option value="'.$oType->typeID.'" '.$selected.'>'.$oType->typeName.'</option>';
}
?>
        </select>
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
        <input name="criterio" id="criterio" type="text" class="text" value="<?php echo $criterio?>" onkeypress="if(event.keyCode==13)Search(this.form);" placeholder="Mundo o &Aacute;rea" size="35" maxlength="255">
    </td>
    <td width="70">
        <input name="btnSearch" type="button" value="Buscar" class="admButton" onclick="Search(this.form)">
    </td>
  </tr>
  </table>
</fieldset>

<table width="600" class="tblList" cellpadding="0" cellspacing="0">
    <tr> 
      <th width="16">&nbsp;</th>
      <th width="450"><b><?php echo showHeader('gerencia','Mundo')?></b></th>
      <th width="50"><b><?php echo showHeader('enviados','Enviados')?></b></th>
      <th width="50"><b><?php echo showHeader('recibidos','Recibidos')?></b></th>
    </tr>
<?php
    $list = CrmEmpleado::getList_ReporteArea($criterio, $filtro_tipo, $filtro_anio, $filtro_mes);
    foreach ($list as $oItem) {
?>
    <tr>
      <td><a href="<?php echo "javascript:Detail('".$oItem->gerencia."');"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a></td>
      <td><?php echo $oItem->gerencia; ?></td>
      <td align="right"><?php echo $oItem->enviados;?></td>
      <td align="right"><?php echo $oItem->recibidos;?></td>
    </tr>
<?php } ?>
</table>
<table width="600">
    <tr height="30">
      <td align="left">
        <input type="hidden" id="gerencia" name="gerencia" value="<?php echo $gerencia;?>">
        <input type="button" class="admButton" value="exportar excel" name="btnExport" onClick="Export(this.form)">
      </td>
      <td align="right"><?php echo $MODULE->getPaging();?></td>
  </tr>
</table>