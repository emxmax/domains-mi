<?php

?>
<script type="text/javascript">
$(document).ready(function(){
	$.ajax({
	  url: "../core/ajax/postit.php?cmd=<?php echo $PAGE->Command;?>&filtro=<?php echo $typeList?>&pID=<?php echo $PAGE->UsrSession["personaID"];?>&query=<?php echo $txtSearch?>",
	  success: function(data){
		$("#postitList").html(data);
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

	  }
	});
});
</script>
<table width="842" height="124" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><img src="images/header_reconocer.png" width="841" height="124" border="0" usemap="#Map2" /></td>
  </tr>
</table>
<map name="Map2" id="Map2">
  <area shape="rect" coords="26,33,127,51" href="logoff.php" />
</map>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">
    <div id="postitList" style="height:301px"></div>
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
