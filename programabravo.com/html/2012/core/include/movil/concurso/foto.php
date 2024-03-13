<?php
$arrMedia=XMLParser::getArray_Media($objFoto->media);
$arrParameter=XMLParser::getArray_Parameter($objFoto->parameter);

$imgFoto	=isset($arrMedia["imagen"]) ? "../".$arrMedia["imagen"]["Url"] : NULL;

$lblTitulo		=$objFoto->title; 
$lblEmpleado	=isset($arrParameter["empleado"]) ? htmlentities($arrParameter["empleado"]) : NULL; 
$lblGerencia	=isset($arrParameter["gerencia"]) ? htmlentities($arrParameter["gerencia"]) : NULL; 

$cantVotos=CmsContentLikes::getTotalLikes($objFoto->contentID);
?> 
    <div class="celda">
    <table width="202" height="202" border="0" align="center" cellpadding="0" cellspacing="0" background="images/concursotabla01.png" >
      <tr>
        <td height="4" valign="top"></td>
      </tr>
      <tr>
        <td height="168" valign="top"><table width="202" height="168" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4">&nbsp;</td>
            <td align="left" valign="bottom" background="<?php echo $imgFoto;?>"><a class="like" href="javascript:;" rel="<?php echo $objFoto->contentID;?>"><img src="images/like.png" width="38" height="33" vspace="6" border="0" /></a></td>
            <td width="4">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="6">
          <tr>
            <td><span class="letra12negro"><strong>Título:</strong> <?php echo $lblTitulo;?><br />
                <strong>De: </strong><?php echo $lblEmpleado;?></span><span class="letra14rojo"><br />
              </span><span class="letra14azul">me gusta </span><span class="letra14azul" id="like<?php echo $objFoto->contentID;?>"><?php echo $cantVotos;?></span></td>
            </tr>
        </table></td>
      </tr>
    </table>
    </div>