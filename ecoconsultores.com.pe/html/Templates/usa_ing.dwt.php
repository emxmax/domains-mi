
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
$query_info1 = "SELECT * FROM servicios_ce ORDER BY id DESC";
$info1 = mysql_query($query_info1, $conec) or die(mysql_error());
$row_info1 = mysql_fetch_assoc($info1);
$totalRows_info1 = mysql_num_rows($info1);

mysql_select_db($database_conec, $conec);
$query_info2 = "SELECT * FROM servicios_gc ORDER BY id DESC";
$info2 = mysql_query($query_info2, $conec) or die(mysql_error());
$row_info2 = mysql_fetch_assoc($info2);
$totalRows_info2 = mysql_num_rows($info2);

mysql_select_db($database_conec, $conec);
$query_info3 = "SELECT * FROM servicios_dh ORDER BY id DESC";
$info3 = mysql_query($query_info3, $conec) or die(mysql_error());
$row_info3 = mysql_fetch_assoc($info3);
$totalRows_info3 = mysql_num_rows($info3);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Eco consultong USA</title>
<!-- TemplateEndEditable -->

	
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
-->
</style>
<!-- TemplateBeginEditable name="head" --><!-- TemplateEndEditable -->
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><table width="990" height="155" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="top"><table width="990" height="155" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="270" align="left" valign="top"><img src="../imgs/logo_eco_consultores_usa.jpg" width="270" height="155" /></td>
            <td width="720" align="left" valign="top"><table width="720" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="80" align="right" valign="top"><table width="519" height="79" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="right" valign="bottom"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','500','height','60','src','../../swfs/idioma','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','wmode','transparent','movie','../../swfs/idioma' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="500" height="60">
                      <param name="movie" value="../../swfs/idioma.swf" />
                      <param name="quality" value="high" />
                      <param name="wmode" value="transparent" />
                      <embed src="../../swfs/idioma.swf" width="500" height="60" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" wmode="transparent"></embed>
                    </object>
</noscript></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="35" align="left" valign="top"><table width="720" height="35" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="right" valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','433','height','35','src','../../swfs/clientes_usa','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','wmode','transparent','movie','../../swfs/clientes_usa' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="433" height="35">
                      <param name="movie" value="../../swfs/clientes_usa.swf" />
                      <param name="quality" value="high" />
                      <param name="wmode" value="transparent" />
                      <embed src="../../swfs/clientes_usa.swf" width="433" height="35" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" wmode="transparent"></embed>
                    </object>
</noscript></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="40" align="right" valign="top"><table width="651" height="40" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="15" align="right" valign="top"><img src="../imgs/borde.gif" width="15" height="28" /></td>
                    <td width="626" align="left" valign="top"><ul id="nav">
                      <li class="top"><a href="../php/usa/index_usa_ing.php" id="contacts" class="top_link"><span class="Estilo1">Home</span></a> </li>
                      <li class="top"><a href="../php/usa/servicios_usa_ing.php" class="top_link" id="services"><span class="down Estilo1">Services</span></a> </li>
                      <li class="top"><a href="../php/usa/datos_de_interes_usa_ing.php" id="services" class="top_link"><span class="Estilo1">Interesting</span></a></li>
                      <li class="top"><a href="../php/usa/equipo_usa_ing.php" id="contacts" class="top_link"><span class="Estilo1">Our team</span></a></li>
                      <li class="top"><a href="../php/usa/casos_de_exito_usa_ing.php" id="shop" class="top_link"><span class="Estilo1">Success stories</span></a> </li>
                      <li class="top"><a href="../php/usa/clientes_usa_ing.php" id="shop" class="top_link"><span class="Estilo1">Clients</span></a> </li>
                      <li class="top"><a href="../php/usa/contacto_usa_ing.php" id="privacy" class="top_link"><span class="Estilo1">Contact Us</span></a><span class="preload2"></span></li>
                    </ul>                      <span class="preload1"></span></td>
                    <td width="21" align="left" valign="top"><img src="../imgs/bord2.gif" width="15" height="28" /></td>
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
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','990','height','290','src','../swfs/carga_usa','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../swfs/carga_usa' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="990" height="290">
            <param name="movie" value="../../swfs/carga_usa.swf" />
            <param name="quality" value="high" />
            <embed src="../swfs/carga_usa.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="990" height="290"></embed>
          </object></noscript></td>
        </tr>
      </table>
      <table width="990" height="460" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><table width="990" height="460" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="770" align="left" valign="top"><!-- TemplateBeginEditable name="g" -->
                <table width="770" height="432" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                </table>
              <!-- TemplateEndEditable --></td>
              <td width="220" align="left" valign="top"><table width="220" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="left" valign="top">&nbsp;</td>
                </tr>
              </table>
                </td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="990" height="68" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="68" align="left" valign="middle" background="../imgs/logo_eco_consultores_inferior.jpg"><table width="990" height="61" border="0" cellpadding="0" cellspacing="0">

            <tr>
              <td width="55" height="34">&nbsp;</td>
              <td width="842" align="center" valign="middle" class="eco2"><a href="index_usa_ing.php">Home</a><span class="tex_bl">&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;<a href="../php/usa/servicios_usa.php">&nbsp;</a></span><a href="servicios_usa_ing.php">Services</a><span class="tex_bl">&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="datos_de_interes_usa_ing.php">Interesting</a><span class="tex_bl">&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;</span><a href="equipo_usa_ing.php">Our team</a><span class="tex_bl">&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;</span><a href="casos_de_exito_usa_ing.php">Success stories</a><span class="tex_bl">&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;</span><a href="clientes_usa_ing.php">Clients</a><span class="tex_bl">&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;</span><a href="contacto_usa_ing.php">Contact Us</a></td>
              <td width="93">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="center" valign="middle" class="tex_bl2">1111 Brickell Avenue, Suite 1100 Miami, Florida 33131<br />
Office (305) 913-8577 Cell: (786) 488-5683</td>
              <td>&nbsp;</td>
            </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($info3);

mysql_free_result($info1);

mysql_free_result($info2);


?>