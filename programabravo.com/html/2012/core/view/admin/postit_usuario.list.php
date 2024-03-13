<?php
require("../core/include/admin/ordering.php");
?>
<fieldset id="fldFiltro" style="text-align: right; width:740px;">
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
        <input name="criterio" id="criterio" type="text" class="text" value="<?php echo $criterio?>" onkeypress="if(event.keyCode==13)Search(this.form);" placeholder="Nombres o Apellidos" size="35" maxlength="255">
    </td>
    <td width="70">
        <input name="btnSearch" type="button" value="Buscar" class="admButton" onclick="Search(this.form)">
    </td>
  </tr>
  </table>
</fieldset>
<table width="750" class="tblList" cellpadding="0" cellspacing="0">
    <tr> 
      <th width="16">&nbsp;</th>
      <th width="50"><b><?php echo showHeader('dni', 'DNI')?></b></th>
      <th width="100"><b><?php echo showHeader('apellido1','Apellido P.')?></b></th>
      <th width="100"><b><?php echo showHeader('apellido2','Apellido M.')?></b></th>
      <th width="150"><b><?php echo showHeader('nombres','Nombres')?></b></th>
      <th width="200"><b><?php echo showHeader('gerencia','Mundo')?></b></th>
      <th width="50"><b><?php echo showHeader('enviados','Enviados')?></b></th>
      <th width="50"><b><?php echo showHeader('recibidos','Recibidos')?></b></th>
    </tr>
<?php
    $list = CrmEmpleado::getList_ReporteUsuario($criterio, $gerencia, $filtro_tipo, $filtro_anio, $filtro_mes);
    foreach ($list as $oItem) {
?>
    <tr>
      <td><a href="<? echo "javascript:Edit(".$oItem->personaID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a></td>
      <td><?php echo $oItem->dni; ?></td>
      <td><?php echo $oItem->apellido1; ?></td>
      <td><?php echo $oItem->apellido2; ?></td>
      <td><?php echo $oItem->nombres; ?></td>
      <td><?php echo $oItem->gerencia;?></td>
      <td align="right"><?php echo $oItem->enviados;?></td>
      <td align="right"><?php echo $oItem->recibidos;?></td>
    </tr>
    <?php } ?>
</table>
<table width="750">
    <tr height="30">
      <td align="left">
        <input type="hidden" id="gerencia" name="gerencia" value="<?php echo $gerencia;?>">
        <input type="button" class="admButton" value="exportar excel" name="btnExport" onClick="Export(this.form)">
      </td>
      <td align="right"><?php echo $MODULE->getPaging();?></td>
  </tr>
</table>
