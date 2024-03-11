<?php
$URL_ROOT=SEO::get_URLRoot();
?>
<script type="text/javascript">
function Clear(xform){
	if(confirm("Esta acci\xf3n elminar\xe1 todos los votos registrados.\n\xbfEst\xe1 seguro de continuar?")){
		xform.Command.value="clear";
		xform.submit();
	}
}
</script>
<table width="500" class="tblList" cellpadding="0" cellspacing="0">
      <tr> 
        <th width="20" style="display: none"><?php echo $MODULE->getSortingHeader("totalLikes", "#");?></th>
        <th width="360">Nombre</th>
        <th width="80">Foto</th>
        <th width="60"><?php echo $MODULE->getSortingHeader("totalLikes", "Total");?></th>
      </tr>
    <?php
  $DAO=$MODULE->StaticDAO;//CmsContentLangLikes
	$list=$DAO::getListTotal_Paging();
	$langID=1;
	$i=1;
	foreach ($list as $oItem){
		$oContent=CmsContentLang::getItem($oItem->contentID, $langID);
		$oContent->media=XMLParser::getArray_Media($oContent->media);
		$img_icono=isset($oContent->media['icono']['Url'])? '<img src="'.$URL_ROOT.$oContent->media['icono']['Url'].'" width="50px" />': null;
		$img_imagen=isset($oContent->media['icono']['Url'])? $URL_ROOT.$oContent->media['icono']['Url']: '#';
	?>
      <tr>
        <td style="display: none"><?php echo $MODULE->Page+$i; ?></td>
        <td><?php echo $oContent->title; ?></td>
        <td><a href="<?php echo $img_imagen;?>" target="_blank"><?php echo $img_icono;?></a></td>
        <td align="center"><?php echo $oItem->totalLikes;?></td>
      </tr>
	<?php
	$i++;
	} ?>
    </table>
    <table width="500">
      <tr height="30"> 
        <td align="left"><input type="button" class="admButton" value="eliminar votaciones" name="btnClear" onClick="Clear(this.form)"></td>
          <td align="right">&nbsp;<?php echo $MODULE->getPaging($DAO);?></td>
      </tr>
    </table>
