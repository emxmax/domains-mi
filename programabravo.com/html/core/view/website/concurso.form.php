<?php
$templateID=10;
$sectionID=4;
$langID=1;
$minisiteID=0;
?>
<style type="text/css">
<!--
body {

	background-image: url(images/fondo07.jpg);
	background-repeat: no-repeat;
	background-position: center top;
}
-->
</style>
<script type="text/javascript">
var info;
	$(document).ready(function(){
		xform="#frmContent";
	    $('.like').click(function(){
			fotoID=$(this).attr('rel');
			voto=$("#like"+fotoID).html();
			$.ajax({
			  url: "../core/ajax/concurso.php?cmd=like&fotoID="+fotoID,
			  success: function(data){
				  if(parseInt(data)>voto){
				  	$("#like"+fotoID).html(data);
					alert("Gracias por valorar esta nota.");}
			  	  else
					alert("Ya has valorado esta nota antes, gracias.");
			  }
			});

		});
	});
</script>
<table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
<div id="fotosconcurso" style="alignment-adjust:central">
<table width="985" height="656" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="63" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" height="500" border="0" cellspacing="2" cellpadding="0">
<?php
$listFotos=CmsContentLang::getWebList_Template($templateID, $sectionID, $langID, $minisiteID);
$i=0;
foreach($listFotos as $objFoto){

	if($i%3==0){
		if($i>0) echo "</tr>\n";
		echo "</tr>\n";
	}
	
	if($i==0){
		echo '<td width="347" height="365" valign="top"><img src="images/concurso02texto.gif" width="347" height="365" /></td>';
		$i++;
	}
	
	echo '<td height="330" '.(($i%3==0)? 'align="center"':'width="311"').' valign="top">';
	include("../core/include/website/concurso/foto.php");
	echo '</td>';

	$i++;
}
echo "<tr>\n";
?>

    </table></td>
  </tr>
  <tr>
    <td height="140" valign="top">&nbsp;</td>
  </tr>
</table>
</div>
</td>
  </tr>
</table>
<div id="piepag3"></div>