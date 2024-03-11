<?php
$video_flv=isset($oContentLang->media['flv']['Url'])? $URL_ROOT.$oContentLang->media['flv']['Url']: null;
$video_3gp=isset($oContentLang->media['3gp']['Url'])? $URL_ROOT.$oContentLang->media['3gp']['Url']: null;
$OSplayer =$URL_BASE.'player/OSplayer';

$usrSession=WebLogin::getUserSession();
$personaID=$usrSession['personaID'];

$contentID=$oContentLang->contentID;

$oLike=CmsContentLikes::getItem($contentID, $personaID);
$isLiked=($oLike!=null);

$totalLikes= CmsContentLikes::getTotalLikes($contentID);
?>
<table width="771" height="480" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="720" valign="top">
 <script src='<?php echo $URL_BASE;?>player/AC_RunActiveContent.js' language='javascript'></script>
<!-- saved from url=(0013)about:internet -->
<script language='javascript'>
 AC_FL_RunContent('codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0', 'width', '720', 'height', '480', 'src', ((!DetectFlashVer(9, 0, 0) && DetectFlashVer(8, 0, 0)) ? 'OSplayer' : '<?php echo $OSplayer;?>'), 'pluginspage', 'http://www.macromedia.com/go/getflashplayer', 'id', 'flvPlayer', 'allowFullScreen', 'true', 'movie', ((!DetectFlashVer(9, 0, 0) && DetectFlashVer(8, 0, 0)) ? 'OSplayer' : '<?php echo $OSplayer;?>'), 'FlashVars', 'movie=<?php echo $video_flv;?>&btncolor=0x333333&accentcolor=0x20b3f7&txtcolor=0xffffff&volume=100&previewimage=previewimageurl&autoplay=on');
</script>
<noscript>
 <object width='720' height='480' id='flvPlayer'>
  <param name='allowFullScreen' value='true'>
  <param name='movie' value='<?php echo $OSplayer;?>.swf?movie=<?php echo $video_flv;?>&btncolor=0x333333&accentcolor=0x20b3f7&txtcolor=0xffffff&volume=100&previewimage=previewimageurl&autoplay=on'>
  <embed src='<?php echo $OSplayer;?>.swf?movie=<?php echo $video_flv;?>&btncolor=0x333333&accentcolor=0x20b3f7&txtcolor=0xffffff&volume=100&previewimage=previewimageurl&autoplay=on' width='720' height='480' allowFullScreen='true' type='application/x-shockwave-flash'>
 </object>
</noscript>
</td>
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
        <td height="40" align="center" ><?php if($video_3gp!=null){ ?><a href="<?php echo $video_3gp?>" class="blanco" target="_blank">video para celular</a><?php }?></td>
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