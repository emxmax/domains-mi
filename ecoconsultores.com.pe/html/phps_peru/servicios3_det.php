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

mysql_select_db($database_conec, $conec);
$query_menus1 = "SELECT * FROM peru_servicios3 ORDER BY id ASC";
$menus1 = mysql_query($query_menus1, $conec) or die(mysql_error());
$row_menus1 = mysql_fetch_assoc($menus1);
$totalRows_menus1 = mysql_num_rows($menus1);

$colname_info_ser1 = "-1";
if (isset($_GET['id'])) {
  $colname_info_ser1 = $_GET['id'];
}
mysql_select_db($database_conec, $conec);
$query_info_ser1 = sprintf("SELECT * FROM peru_servicios3 WHERE id = %s", GetSQLValueString($colname_info_ser1, "int"));
$info_ser1 = mysql_query($query_info_ser1, $conec) or die(mysql_error());
$row_info_ser1 = mysql_fetch_assoc($info_ser1);
$totalRows_info_ser1 = mysql_num_rows($info_ser1);

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
.Estilo2 {font-size: 15px; color: 92282A; font-family: Verdana, Arial, Helvetica, sans-serif;}
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
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','990','height','290','src','../swfs_peru/carga_peru','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../swfs_peru/carga_peru' ); //end AC code
</script>
<noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="990" height="290">
            <param name="movie" value="../swfs_peru/carga_peru.swf" />
            <param name="quality" value="high" />
            <embed src="../swfs_peru/carga_peru.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="990" height="290"></embed>
          </object></noscript></td>
        </tr>
      </table>
      <table width="990" height="460" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><table width="990" height="453" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center" valign="top"><table width="970" height="30" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="left" valign="top"><a name="p" id="p"></a><img src="../imgs/servicio3_peru.jpg" width="990" height="30" border="0" usemap="#Map" /></td>
                </tr>
              </table>
                <table width="970" height="383" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="215" align="left" valign="top"><table width="215" height="25" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="10" align="left">&nbsp;</td>
                        <td width="205" align="center" valign="top" bgcolor="#DCDCDC"><?php do { ?>
                            <table border="0" cellpadding="0" cellspacing="0" width="205">
                              <!-- fwtable fwsrc="pper.png" fwpage="Página 1" fwbase="de.jpg" fwstyle="Dreamweaver" fwdocid = "1684877339" fwnested="0" -->
                              <tr>
                                <td><img src="../imgs/mar/spacer.gif" width="10" height="1" border="0" alt="" /></td>
                                <td><img src="../imgs/mar/spacer.gif" width="185" height="1" border="0" alt="" /></td>
                                <td><img src="../imgs/mar/spacer.gif" width="10" height="1" border="0" alt="" /></td>
                                <td><img src="../imgs/mar/spacer.gif" width="1" height="1" border="0" alt="" /></td>
                              </tr>
                              <tr>
                                <td height="6" colspan="3" align="left" valign="top"><img name="de_r1_c1" src="../imgs/mar/de_r1_c1.jpg" width="205" height="6" border="0" id="de_r1_c2" alt="" /></td>
                                <td><img src="../imgs/mar/spacer.gif" width="1" height="6" border="0" alt="" /></td>
                              </tr>
                              <tr>
                                <td background="../imgs/mar/de_r2_c1.jpg">&nbsp;</td>
                                <td align="left" valign="middle" bgcolor="#959595"><div class="tex_bl2" id="links_blan"><strong><a href="servicios3_det.php?id=<?php echo $row_menus1['id']; ?>#p"><?php echo $row_menus1['titulo']; ?></a></strong></div></td>
                                <td background="../imgs/mar/de_r2_c3.jpg">&nbsp;</td>
                                <td><img src="../imgs/mar/spacer.gif" width="1" height="10" border="0" alt="" /></td>
                              </tr>
                              <tr>
                                <td height="6" colspan="3" align="left" valign="top"><img name="de_r3_c1" src="../imgs/mar/de_r3_c1.jpg" width="205" height="6" border="0" id="de_r3_c1" alt="" /></td>
                                <td><img src="../imgs/mar/spacer.gif" width="1" height="6" border="0" alt="" /></td>
                              </tr>
                            </table>
                            <?php } while ($row_menus1 = mysql_fetch_assoc($menus1)); ?></td>
                      </tr>
                    </table>
                      <table width="215" height="10" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="10" height="10" align="left" valign="top">&nbsp;</td>
                            <td width="205" align="left" valign="top"><img src="../imgs/mb.jpg" width="205" height="10" /></td>
                          </tr>
                      </table></td>
                    <td width="755" align="left" valign="top"><table width="755" height="367" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="585" align="left" valign="top"><table width="581" height="368" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="19" height="24">&nbsp;</td>
                              <td width="338" align="left" valign="middle" class="tx_12"><strong class="tx_12" ><span class="tx_12a"><?php echo $row_info_ser1['titulo']; ?></span></strong></td>
                              <td width="224">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="15" colspan="3" align="center" valign="top">&nbsp;&nbsp;<img src="../imgs/bared.jpg" width="555" height="15" /></td>
                            </tr>
                            <tr>
                              <td align="left" valign="top">&nbsp;</td>
                              <td align="left" valign="top" class="tex234"><span class="tx_2"><?php echo $row_info_ser1['text']; ?></span><br /></td>
                              <td align="center" valign="top" class="Estilo2"><img src="../manager/imgs_dinamicas/imgs_peru_servicios/<?php echo $row_info_ser1['img']; ?>" width="209" /></td>
                            </tr>
                        </table></td>
                        <td width="170" align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="1">
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
                    </table>
                      </td>
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
                T. (51 1) 242 6984&nbsp;&nbsp;&nbsp; (51 1) 242 6642 &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;<a href="mailto: infoperu@ecocomunicaciones.com">infoperu@ecocomunicaciones.com</a></td>
              <td>&nbsp;</td>
            </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="848,5,981,27" href="../index_peru.php#p" />
</map>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($menus1);

mysql_free_result($info_ser1);
?>
