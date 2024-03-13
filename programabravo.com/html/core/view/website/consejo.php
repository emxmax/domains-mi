<?php

$oContent=CmsContentLang::getWebItem($contentID, 1, 0);
if($oContent!=NULL){
$arrMedia=XMLParser::getArray_Media($oContent->media);
$arrParameter=XMLParser::getArray_Parameter($oContent->parameter);

$img_fondo	=isset($arrMedia["imagen"]) ? $arrMedia["imagen"]["Url"] : NULL;
$textcolor	=isset($arrParameter["textcolor"]) ? $arrParameter["textcolor"] : "blanco"; 
?>
<table width="1010" height="756" border="0" align="center" cellpadding="0" cellspacing="0" background="../<?php echo $img_fondo;?>">
  <tr>
    <td height="110" align="center" valign="top"><table width="881" border="0" align="center" cellpadding="0" cellspacing="0" background="images/textopostit2.gif">
      <tr>
        <td width="184">&nbsp;</td>
        <td height="110" valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="646" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="100">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><table width="500" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="150" valign="top">&nbsp;</td>
            <td align="left" valign="top"><p class="arial24<?php echo $textcolor;?>"><?php echo $nombreUsuario;?></p>
              <div class="arial18<?php echo $textcolor;?>">
              <?php echo $oContent->description;?>
              </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php
}
?>