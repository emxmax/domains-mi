<?php

$myimages[0]="fondo01.jpg";
$myimages[1]="fondo02.jpg";
$myimages[2]="fondo03.jpg";
$myimages[3]="fondo04.jpg";
$myimages[4]="fondo05.jpg";
$myimages[5]="fondo06.jpg";
$myimages[6]="fondo07.jpg";

$totalentries = count($myimages);

$i = mt_rand(0,$totalentries-1);

$topimage = $myimages[$i] ;

$j = $i;
while ( $j == $i ) { $j = mt_rand(0,$totalentries-1); }

$pickedimage = $myimages[$j];

?>
<style type="text/css">
<!--
.imgram {background-image: url(images/terapeuta/<?php echo $pickedimage; ?>) ; background-repeat: no-repeat;}
-->
</style>

<script type="text/javascript">
$(document).ready(function(){
	$.ajax({
	  url: "../core/ajax/respuesta.php?cmd=list",
	  success: function(data){
		  $("#respuesta").html(data);
	  }
	});
	
});
</script>
<table width="881" height="597" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="110" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" background="../content/images/textopostit2.gif">
          <tr>
            <td width="184" height="110">&nbsp;</td>
            <td height="110" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="90">&nbsp;</td>
              </tr>
              <tr>
                <td align="left"><span class="arial20azul">¡Bienvenido(a) <?php echo $nombreUsuario;?>!</span></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="565" valign="top"><table width="100%" height="565" border="0" cellpadding="0" cellspacing="0" class="imgram">
          <tr>
            <td valign="top"><table width="100%" height="565" border="0" cellpadding="0" cellspacing="0" background="../content/images/pregunta.gif">
              <tr>
                <td width="430" valign="top">&nbsp;</td>
                <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="230">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="335" valign="top">
                    <div id="respuesta"></div>
					</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
