<?php
$oItem = CrmPostIt::getItem($oItem->postitID);

$postit_view=file_get_contents("../core/view/website/postit/view_default.html");
$postit_view=str_replace("%%ID%%", $oItem->postitID, $postit_view);
$postit_view=str_replace("%%ORIGEN%%", ucwords(strtolower($oItem->origen)), $postit_view);
$postit_view=str_replace("%%DESTINO%%", ucwords(strtolower($oItem->destino)), $postit_view);
$postit_view=str_replace("%%MUNDO%%", ucwords(strtolower($oItem->mundo)), $postit_view);
$postit_view=str_replace("%%MENSAJE%%", "&ldquo;".$oItem->mensaje."&rdquo;", $postit_view);
$postit_view=str_replace("%%VOTOS%%", $oItem->votos, $postit_view);

$postit_view='
<table width="300" border="0" cellspacing="0" cellpadding="0">
      <tr><td valign="top"><div class="reconoce'.$oItem->typeID.'">'.$postit_view.'</div></td>
	  <tr>
</table>';

?>
<script type="text/javascript">
$(document).ready(function(){

	$('.like').click(function(){
		pstID=$(this).attr('rel');
		voto=$("#like"+pstID).html();
		$.ajax({
		  url: "../core/ajax/postit.php?cmd=like&pstID="+pstID,
		  success: function(data){
			if(parseInt(data)>voto){
				$("#like"+pstID).html(data);
				showAlert("Excelente!", "Gracias por valorar esta nota.");
			}
			else
				showError("Ya has valorado esta nota antes, gracias.");
		  }
		});
		
	});

});
</script>
<table width="100%" height="124" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><img src="images/header_reconocer.png" width="841" height="124" border="0" usemap="#Map2" /></td>
  </tr>
</table>
<map name="Map2" id="Map2">
  <area shape="rect" coords="26,33,127,51" href="logoff.php" />
</map>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" align="center">
    <div id="postitList" style="height:301px">
<?php
	echo $postit_view;
?>
    </div>
    </td>
  </tr>
</table>
<table width="842" height="202" border="0" align="center" cellpadding="0" cellspacing="0" background="images/footer_reconocer.png">
  <tr>
    <td height="40" valign="top"><a href="index.php?module=postit&formView=type"></a></td>
  </tr>
  <tr>
    <td height="50" valign="top"><a href="index.php?module=postit&formView=type"><img src="images/space.png" width="240" height="50" border="0" /></a></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="386" valign="top">&nbsp;</td>
        <td valign="top"><?php include("../core/include/website/search.php");?></td>
      </tr>
    </table>
	</td>
  </tr>
</table>
<p>&nbsp;</p>
