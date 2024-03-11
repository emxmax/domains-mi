<?php
$lGroup=CmsTerminoGroup::getList();
if(CmsTerminoGroup::getErrorMsg()!="") $MODULE->addError(CmsTerminoGroup::getErrorMsg());

$lLang=CmsLang::getList_Active();
if(CmsLang::getErrorMsg()!="") $MODULE->addError(CmsLang::getErrorMsg());
?>
<fieldset id="fldFiltro" style="text-align: right; width:490px;">
    <legend accesskey="F">Filtros</legend>
    <table width="100%">
      <tr> 
        <td align="right" width="130">Grupo: 
            <select name="groupID" onChange="this.form.submit();">
        <?php
        foreach ($lGroup as $obj) {
            if(!isset($oItem->groupID)) $oItem->groupID=$obj->groupID;
            echo "<option value=\"$obj->groupID\"";
            if($obj->groupID==$oItem->groupID) print " selected";
            echo ">$obj->groupName</option>";
        }
        ?>
            </select>
        </td>
        <td align="right" width="130">Idioma: 
            <select name="langID" onChange="this.form.submit();">
        <?php
        foreach ($lLang as $obj) {
            if(!isset($oItem->langID)) $oItem->langID=$obj->langID;
            echo "<option value=\"$obj->langID\"";
            if($obj->langID==$oItem->langID) print " selected";
            echo ">$obj->alias</option>";
        }
        ?>
            </select>
         </td>
      </tr>
    </table>
</fieldset>

<table width="500" class="tblList" cellpadding="0" cellspacing="0">
    <tr> 
      <th width="35">&nbsp;</th>
      <th width="465"><?php echo $MODULE->getSortingHeader("terminoName", "Nombre");?></th>
    </tr>
    <?php
    $DAO=$MODULE->StaticDAO;//CmsTerminoLang
    $list=$DAO::getList_Paging($oItem->groupID, $oItem->langID);
    
    foreach ($list as $oItem) {
    ?>
    <tr>
      <td nowrap="nowrap"><a href="<?php echo "javascript:Edit(".$oItem->terminoID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
          <a href="<?php echo "javascript:Delete(".$oItem->terminoID.");"; ?>"><img title="Eliminar" src="../core/assets/admin/images/i_delete.gif" border="0" /></a>
      </td>
      <td><?php echo $oItem->terminoName; ?></td>
    </tr>
    <?php } ?>
</table>
<table width="500">
    <tr height="30">
      <td align="left">&nbsp;</td>
      <td align="right">&nbsp;<?php echo $MODULE->getPaging();?></td>
    </tr>
</table>
