<?php
if(!isset($oItem->parameter['showtitle'])) $oItem->parameter['showtitle']=NULL;
if(!isset($oItem->media['icono'])) $oItem->media['icono']=NULL;

$groupID=($oItem->schemeID==27) ? $media_group["redes_icono"]: $media_group["acceso_icono"];
?>
<script type="text/javascript">
$(document).ready(function() {
CMSFileManager('icono', {title: 'Seleccione una imagen', groupID:  <?php echo $groupID;?>, fileExt: '*.jpg;*.gif;*.png'} ); //'userfiles/cms/local/imagen/' or 'userfiles/cms/galeria/imagen/'
});
</script>
<tr>
    <td>&nbsp;</td>
    <td><input name="parameter[showtitle]" type="checkbox" class="hidden" id="showtitle"<?php if($oItem->parameter['showtitle']=='1') echo " checked"; ?>>Mostrar T&iacute;tulo</td>
</tr>
<tr>
    <td>Imagen</td>
    <td><input name="media[icono]" type="text" class="hidden" id="icono" value="<?php echo $oItem->media['icono']['Id']; ?>"></td>
</tr>
<tr>
 <td>Enlace</td>
 <td><?php include("../core/include/admin/cms/enlace.php");?></td>
</tr>