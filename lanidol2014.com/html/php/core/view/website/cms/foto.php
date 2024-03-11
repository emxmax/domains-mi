<?php
$img_foto=isset($oContentLang->media['imagen']['Url'])? $oContentLang->media['imagen']['Url']: null;

$usrSession=WebLogin::getUserSession();
$personaID=$usrSession['personaID'];

$contentID=$oContentLang->contentID;

$oLike=CmsContentLikes::getItem($contentID, $personaID);
$isLiked=($oLike!=null);

$totalLikes= CmsContentLikes::getTotalLikes($contentID);
?>
<table width="771" height="480" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="720" valign="top"><img src="<?php echo $URL_ROOT.$img_foto;?>" width="720" height="480" /></td>
    <td width="51" align="center" valign="top" background="<?php echo $URL_BASE;?>images/franjafoto.png"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">
        	<a class="likethis" href="#"><img src="<?php echo $URL_BASE;?>images/corazon.png" width="26" height="23" border="0" /></a><br /><a href="#" class="likethis blanco">me gusta</a></td>
      </tr>
      <tr>
        <td height="40" align="center"><div id="totalLikes" class="bordeazul"><?php echo $totalLikes;?></div></td>
      </tr>
      <tr>
        <td height="40" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td height="40" align="center" ><a href="#" class="likethis blanco">video para celular</a></td>
      </tr>
    </table></td>
  </tr>
</table>
<script type="text/javascript">
	$(document).ready(function(){
        var isLiked=<?php echo ($isLiked)?'true': 'false'; ?>;
		
		$('.likethis').click(function(){
			//alert(window.parent.rated); return;
			
			if(isLiked){
				alert('Lo sentimos, pero ya has votado por esta foto. Gracias');
				return;
			}

			var contentID='<?php echo $contentID?>';
			var url='<?php echo SEO::get_URLRoot();?>ajax/content_likes.php?cmd=like&pID='+contentID+'&callback=?';
			$.getJSON(url, function(data) {
				
				if(data.retval>0){
					$('#totalLikes').html(data.retval);
					isLiked=true;
					//window.parent.rated=true;
					v=window.parent.$(".stat-likes");
					$(v).each(function(){
						if($(this).attr('rel')==contentID){
							$(this).html(data.retval);
							return;
						}
					});
				}
				
				alert(data.message);
			});
		});
		
	});
</script>