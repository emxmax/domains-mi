<?php require_once('../Connections/conec.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_info = 4;
$pageNum_info = 0;
if (isset($_GET['pageNum_info'])) {
  $pageNum_info = $_GET['pageNum_info'];
}
$startRow_info = $pageNum_info * $maxRows_info;

mysql_select_db($database_conec, $conec);
$query_info = "SELECT * FROM peru_testimonios ORDER BY id ASC";
$query_limit_info = sprintf("%s LIMIT %d, %d", $query_info, $startRow_info, $maxRows_info);
$info = mysql_query($query_limit_info, $conec) or die(mysql_error());
$row_info = mysql_fetch_assoc($info);

if (isset($_GET['totalRows_info'])) {
  $totalRows_info = $_GET['totalRows_info'];
} else {
  $all_info = mysql_query($query_info);
  $totalRows_info = mysql_num_rows($all_info);
}
$totalPages_info = ceil($totalRows_info/$maxRows_info)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Eco consultores PERU</title>


	
<link rel="stylesheet" type="text/css" href="../pro_drop_1/pro_drop_1.css" />

<script src="../pro_drop_1/stuHover.js" type="text/javascript"></script>

<style type="text/css">
<!--
body {
	margin-top: 0px;
}
.Estilo1 {color: #a12928}
-->
</style>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<link href="../eco2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
<style type="text/css">
<!--
a:link {
	text-decoration: none;
	color: #E8B3B3;
}
a:visited {
	text-decoration: none;
	color: #E8B3B3;
}
a:hover {
	text-decoration: none;
	color: #FFFFFF;
}
a:active {
	text-decoration: none;
	color: #E8B3B3;
}
.Estilo2 {color: #000000}
-->
</style>
<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"/>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><table width="990" height="155" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="top"><table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="270" valign="top"><a href="../index_peru.php"><img src="../imgs/logo_eco_consultores_peru.jpg" width="270" height="155" border="0" /></a></td>
            <td width="720" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td width="30%" rowspan="2" align="center" valign="middle"><a href="http://www.ecoconsultores.com.pe/premio2011/" target="_blank"><img src="../premio-2011.jpg" alt="Premio Empresa Peruana del Año 2011" title="Premio Empresa Peruana del Año 2011" width="166" height="84" border="0" /></a></td>
                <td width="70%"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','500','height','60','src','../swfs_peru/mapas_peru','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../swfs_peru/mapas_peru' ); //end AC code
        </script>
                  <noscript>
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="500" height="60">
                      <param name="movie" value="../swfs_peru/mapas_peru.swf" />
                      <param name="quality" value="high" />
                      <embed src="../swfs_peru/mapas_peru.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="500" height="60"></embed>
                    </object>
                  </noscript></td>
              </tr>
              <tr>
                <td align="right"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','460','height','50','src','../swfs_peru/clientes_peru','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../swfs_peru/clientes_peru' ); //end AC code
        </script>
                  <noscript>
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="460" height="50">
                      <param name="movie" value="../swfs_peru/clientes_peru.swf" />
                      <param name="quality" value="high" />
                      <embed src="../swfs_peru/clientes_peru.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="460" height="50"></embed>
                    </object>
                  </noscript></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><table width="497" height="40" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="15" align="right" valign="top"><img src="../imgs/borde.gif" width="15" height="28" /></td>
                    <td width="462" align="left" valign="top"><ul id="nav">
                      <li class="top"><a href="../index_peru.php" id="contacts" class="top_link"><span class="Estilo1">Inicio</span></a></li>
                      <li class="top"><a href="nosotros.php" class="top_link" id="services"><span class="down Estilo1">Nosotros</span></a></li>
                      <li class="top"><a href="talento_humano.php" id="contacts" class="top_link"><span class="Estilo1">Talento Humano</span></a></li>
                      <li class="top"><a href="testimonios.php" id="shop" class="top_link"><span class="Estilo1">Testimonios</span></a></li>
                      <li class="top"><a href="contacto.php" id="privacy" class="top_link"><span class="Estilo1">Contacto</span></a><span class="preload2"></span></li>
                    </ul>
                      <span class="preload1"></span></td>
                    <td width="20" align="left" valign="top"><img src="../imgs/bord2.gif" width="15" height="28" /></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
      <table width="990" height="290" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','990','height','290','src','../swfs_peru/carga_peru','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash' ); //end AC code
</script>
<noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="990" height="290">
            
            <param name="quality" value="high" /><param name="SRC" value="../swfs_peru/carga_peru.swf" />
            <embed src="../swfs_peru/carga_peru.swf" width="990" height="290" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash"></embed>
          </object></noscript></td>
        </tr>
      </table>
      <table width="990" height="460" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><table width="990" height="401" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="401" align="center" valign="top"><table width="970" height="30" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="left" valign="top"><img src="../imgs/peru_conta.jpg" width="970" height="30" /></td>
                </tr>
              </table>
                <table width="970" height="348" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="799" height="320" align="center" valign="top"><span class="eco2"><a href="talento_humano_det.php?id=<?php echo $row_info['id']; ?>"></a></span> <br />
                    <table width="666" height="293" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="554" align="center" valign="top"><form id="form1" name="form1" method="post" action="">
                          <table width="474" height="230" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="126" align="right" valign="middle" class="tex234">Nombre:</td>
                                  <td width="26">&nbsp;</td>
                                  <td width="456" align="left" valign="middle"><label>
                                    <input name="nombre" type="text" class="tex234" id="nombre" size="50" />
                                    </label></td>
                                </tr>
                            <tr>
                              <td align="right" valign="middle" class="tex234">Email:</td>
                                  <td>&nbsp;</td>
                                  <td align="left" valign="middle"><input name="email" type="text" class="tex234" id="email" size="50" /></td>
                                </tr>
                            <tr>
                              <td align="right" valign="middle" class="tex234">Empresa:</td>
                                  <td>&nbsp;</td>
                                  <td align="left" valign="middle"><input name="empresa" type="text" class="tex234" id="empresa" size="50" /></td>
                                </tr>
                            <tr>
                              <td align="right" valign="middle" class="tex234">Comentario:</td>
                                  <td>&nbsp;</td>
                                  <td rowspan="4" align="left" valign="middle"><label>
                                    <textarea name="comentario" id="comentario" cols="38" rows="5"></textarea>
                                    </label></td>
                                </tr>
                            <tr>
                              <td align="right" valign="middle" class="tex234">&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                            <tr>
                              <td align="right" valign="middle" class="tex234">&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                            <tr>
                              <td align="right" valign="middle" class="tex234">&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                            <tr>
                              <td align="right" valign="middle">&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td align="left" valign="middle"><label>
                                    <input name="button2" type="reset" class="tex56" id="button2" value="Restablecer" />
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input name="button" type="submit" class="tex56" id="button" value="Enviar" />
                                    </label></td>
                                </tr>
                            </table>
                                                      </form>                          </td>
                            <td width="360">&nbsp;</td>
                          </tr>
                    </table></td><td width="171" align="center" valign="top" background="../imgs/ecop.jpg"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                      <tr>
                        <td><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','170','height','210','src','../swfs_peru/videos','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../swfs_peru/videos' ); //end AC code
                    </script>
                          <noscript>
                            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="170" height="210">
                              <param name="movie" value="../swfs_peru/videos.swf" />
                              <param name="quality" value="high" />
                              <embed src="../swfs_peru/videos.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="170" height="210"></embed>
                            </object>
                          </noscript></td>
                      </tr>
                      <tr>
                        <td align="center" valign="top"><object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="165" height="148">
                          <param name="movie" value="../cdr.swf" />
                          <param name="quality" value="high" />
                          <param name="wmode" value="opaque" />
                          <param name="swfversion" value="6.0.65.0" />
                          <!-- Esta etiqueta param indica a los usuarios de Flash Player 6.0 r65 o posterior que descarguen la versión más reciente de Flash Player. Elimínela si no desea que los usuarios vean el mensaje. -->
                          <param name="expressinstall" value="Scripts/expressInstall.swf" />
                          <!-- La siguiente etiqueta object es para navegadores distintos de IE. Ocúltela a IE mediante IECC. -->
                          <!--[if !IE]>-->
                          <object type="application/x-shockwave-flash" data="../cdr.swf" width="165" height="148">
                            <!--<![endif]-->
                            <param name="quality" value="high" />
                            <param name="wmode" value="opaque" />
                            <param name="swfversion" value="6.0.65.0" />
                            <param name="expressinstall" value="Scripts/expressInstall.swf" />
                            <!-- El navegador muestra el siguiente contenido alternativo para usuarios con Flash Player 6.0 o versiones anteriores. -->
                            <div>
                              <h4>El contenido de esta página requiere una versión más reciente de Adobe Flash Player.</h4>
                              <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtener Adobe Flash Player" width="112" height="33" /></a></p>
                              </div>
                            <!--[if !IE]>-->
                            </object>
                          <!--<![endif]-->
                        </object></td>
</tr>
                      <tr> </tr>
                      <tr> </tr>
                    </table></td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="990" height="68" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="68" align="left" valign="middle" background="../imgs/logo_eco_consultores_inferior.jpg"><table width="990" height="61" border="0" cellpadding="0" cellspacing="0">

            <tr>
              <td width="55" height="34">&nbsp;</td>
              <td width="842" align="center" valign="middle" class="eco2"><a href="../index_peru.php">Inicio</a><span class="tex_bl">&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;<a href="../php/usa/servicios_usa.php">&nbsp;</a></span><a href="nosotros.php">Nosotros</a><span class="tex_bl">&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;</span><a href="talento_humano.php">Talento Humano</a><span class="tex_bl">&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;</span><a href="testimonios.php">Testimonios</a><span class="tex_bl">&nbsp;&nbsp;&nbsp;</span><span class="tex_bl">•&nbsp;&nbsp;&nbsp;</span><a href="contacto.php">Contácto</a></td>
              <td width="93">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" valign="bottom"><table width="50" height="24" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="right" valign="bottom" background="../imgs/creas.png"><div class="menu_creas" id="menu_cre"><a href="http://www.creadoresdeideas.com" target="_blank">Creas</a></div></td>
                </tr>
              </table></td>
              <td align="center" valign="middle" class="tex_bl2">Lima Centro Emprersarial José Pardo&nbsp;&nbsp; •&nbsp;&nbsp;Pasaje Mártir Olaya 129 Ofc. 807&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;Miraflores, &nbsp;&nbsp;PERU<br />
T. (51 1) 242 6984&nbsp;&nbsp;&nbsp; (51 1) 242 6642 &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;<a href="mailto:infoperu@ecocomunicaciones.com">infoperu@ecocomunicaciones.com</a></td>
              <td>&nbsp;</td>
            </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($info);
?>