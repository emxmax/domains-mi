<?php //Predefined Fields
$oItem->title=($oItem->title!="") ? $oItem->title : $oItem->contentName;

//Get MediaGroup
$media_group=array();
$list=CmsMediaGroup::getList();
foreach($list as $obj) $media_group["$obj->alias"]=$obj->groupID;

?>
<script type="text/javascript" src="../core/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../core/plugins/ckfinder/ckfinder.js"></script>
<?php include("../core/plugins/media-picker/media-picker_loader.php");?>
<script type="text/javascript">
$(document).ready(function(){

    CKFinder.setupCKEditor( null, '../core/plugins/ckfinder/' );

    $("#btnSave").click(function(){
        var inputNeed='';
        $("form: input").each(function() {
            if ($(this).hasClass('required') && $(this).val()==''){
                inputNeed =inputNeed+'- '+$(this).attr('placeholder')+"\n";
            }
        });
        
        if(inputNeed!=''){
            alert("Debe completar lo siguiente:\n"+inputNeed);
            return;
        }
        
        $("#Command").val("<?php echo ($MODULE->FormView=="edit") ?"update":"insert";?>");
        $("form").submit();
    });
});
</script>
<input type="hidden" name="parentContentID" value="<?php echo $oItem->parentContentID; ?>" />
<input type="hidden" name="schemeID" value="<?php echo $oItem->schemeID; ?>" />
<input type="hidden" name="langID" value="<?php echo $oItem->langID; ?>" />

<table width="100%">
<tr>
<td valign="top">
    <table class="tblForm" width="600">
        <tr>
          <td style="width:90px" id="tdTitulo">T&iacute;tulo</td>
          <td><input name="title" type="text" id="title" placeholder="Ingrese un t&iacute;tulo" class="required" value="<?php echo $oItem->title; ?>" size="70" maxlength="255"></td>
        </tr>
        <?php
        if($oScheme!=null){
            $file_template="../core/view/admin/cms/".$oScheme->admSource.".php";
            if(file_exists($file_template)){
                include($file_template);
                            }
            else
                $MODULE->addError("No se puede localizar el archivo: ".$file_template);
        }
        else
            $MODULE->addError("No existe un esquema para esta plantilla");
        ?>
        <tr>
            <td>Estado</td>
            <td><label><input type="checkbox" name="active" value="1" <?php if($oItem->active==1 || $oItem->active==NULL) print "checked";?>> Activo</label></td>
        </tr>
        <tr> 
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr> 
            <td colspan="2">
        <?php 
        if($oScheme!=NULL){
        ?>
            <input type="button" class="admButton" value="guardar" id="btnSave" name="btnSave">
        <?php 
        }
        ?>
            <input type="button" class="admButton" id="btnCancel" name="btnCancel" value="cancelar" onClick="javascript:Back();"></td>
          </tr>
        </table>
    </td>
   <td valign="top">
<?php
if($oScheme->isPage){
?>
    <table class="cmsRight" width="250">
        <tr>
          <th class="thParametro">Meta-tags de p&aacute;gina</th>
        </tr>
        <tr>
          <td>Title<br />
          <textarea name="metaTag[title]" rows="4" cols="20" style="width:200px;" class="mceNoEditor"><?php echo $oItem->metaTag["title"];?></textarea>
          <div class="tagleyend">(*) T&iacute;tulo de la p&aacute;gina</div>
          </td>
        </tr>
        <tr>
          <td>Description<br />
          <textarea name="metaTag[description]" rows="4" cols="20" style="width:200px;" class="mceNoEditor"><?php echo $oItem->metaTag["description"];?></textarea>
          <div class="tagleyend">(*) Breve resumen de la p&aacute;gina</div>
          </td>
        </tr>
        <tr>
          <td>Keywords<br />
          <textarea name="metaTag[keywords]" rows="4" cols="20" style="width:200px;" class="mceNoEditor"><?php echo $oItem->metaTag["keywords"];?></textarea>
          <div class="tagleyend">(*) Palabras relacionadas a la p&aacute;gina, separadas por comas</div>
          </td>
        </tr>
    </table>
<?php
}

if($MODULE->FormView=="edit" && $oItem->staticURL!=''){
?>
    <br />
    <table class="cmsRight" width="250">
        <tr>
              <th class="thParametro">URL Est&aacute;tica</th>
        </tr>
        <tr>
            <td>
                <input type="text" name="staticURL" id="staticURL" placeholder="Ingrese url est&aacute;tica" class="required" value="<?php echo $oItem->staticURL;?>" style="width: 200px" maxlength="255" />
                <div class="tagleyend">(*) Nombre de ruta amigable, sin espacios ni caracteres especiales.</div>
            </td>
        </tr>
    </table>
<?php
}
?>
     </td>
</tr>
</table>