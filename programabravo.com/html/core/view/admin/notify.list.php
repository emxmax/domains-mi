<?php
$userAdmin      =AdmLogin::getUserSession();
$contactGroupID =0; //Initialized
?>
    <fieldset id="fldFiltro" style="text-align: right; width:490px;">
        <legend accesskey="F">Filtros</legend>
        <table width="100%">
          <tr>
            <td align="right">Formulario:
            <select name="formID" onChange="this.form.submit();" style="width:220px">
            <?php
                $list=CrmForm::getList();
                foreach ($list as $obj) {
                    if(!isset($oItem->formID)) $oItem->formID=$obj->formID;
                    echo "<option value=\"".$obj->formID."\"";
                    if($obj->formID==$oItem->formID){
                        $contactGroupID=$obj->contactGroupID;
                        echo " selected";
                    }

                    echo ">".$obj->formName."</option>";
                }
                ?>
            </select></td>
            <?php
            if($contactGroupID>0){
            ?>
            <td align="right">Asunto:
            <select name="contactID" onChange="this.form.submit();" style="width:220px">
            <?php
                $list= CmsParameterLang::getList($contactGroupID, 1); //default language
                foreach ($list as $obj) {
                    if(!isset($oItem->contactID)) $oItem->contactID=$obj->parameterID;
                    echo "<option value=\"".$obj->parameterID."\"";
                    if($obj->parameterID==$oItem->contactID) echo " selected";
                    echo ">".$obj->parameterName."</option>";
                }
                ?>
            </select></td>
            <?php 
            }
            ?>
            </tr>
          </table>
      </fieldset>

      <table width="500" class="tblList" cellpadding="0" cellspacing="0">
          <tr> 
            <th width="35">&nbsp;</th>
            <th width="260"><?php echo $MODULE->getSortingHeader("firstName", "Nombre");?></th>
            <th width="130"><?php echo $MODULE->getSortingHeader("email", "Email");?></th>
            <th width="60"><?php echo $MODULE->getSortingHeader("active", "Estado");?></th>
          </tr>
    <?php $DAO=$MODULE->StaticDAO;//CrmFormNotify
	$list=$DAO::getList_Paging($userAdmin["clientID"], $oItem->formID, $oItem->contactID);
	foreach ($list as $oItem) {
	?>
        <tr>
          <td nowrap="nowrap"><a href="<?php echo "javascript:Edit(".$oItem->userID.");"; ?>"><img title="Editar" src="../core/assets/admin/images/i_edit.gif" border="0" /></a>
              <a href="<?php echo "javascript:Delete(".$oItem->userID.");"; ?>"><img title="Eliminar" src="../core/assets/admin/images/i_delete.gif" border="0" /></a>
                                  </td>
          <td><?php echo $oItem->firstName; ?> <?php echo $oItem->lastName; ?></td>
          <td><?php echo $oItem->email;?></td>
          <td align="center"><?php echo $DAO::getActive($oItem->active);?></td>
        </tr>
        <?php } ?>
      </table>
      <table width="500">
        <tr height="30"> 
          <td align="left">
              <input type="button" class="admButton" value="nuevo &iacute;tem" name="btnNew" onClick="addNew(this.form)"></td>
            <td align="right">&nbsp;<?php echo $MODULE->getPaging($DAO);?></td>
        </tr>
      </table>
