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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_info = 3;
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

$queryString_info = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_info") == false && 
        stristr($param, "totalRows_info") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_info = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_info = sprintf("&totalRows_info=%d%s", $totalRows_info, $queryString_info);
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
        <td align="left" valign="top"><table width="990" height="155" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="270" align="left" valign="top"><a href="../index_peru.php"><img src="../imgs/logo_eco_consultores_peru.jpg" width="270" height="155" border="0" /></a></td>
            <td width="720" align="left" valign="top"><table width="720" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="80" align="right" valign="top"><table width="519" height="79" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="right" valign="bottom"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','500','height','60','src','../swfs_peru/mapas_peru','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../swfs_peru/mapas_peru' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="500" height="60">
                      <param name="movie" value="../swfs_peru/mapas_peru.swf" />
                      <param name="quality" value="high" />
                      <embed src="../swfs_peru/mapas_peru.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="500" height="60"></embed>
                    </object></noscript></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="35" align="left" valign="top"><table width="720" height="35" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="right" valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','433','height','35','src','../swfs_peru/clientes_peru','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','../swfs_peru/clientes_peru' ); //end AC code
                    </script>
                      <noscript>
                      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="433" height="35">
                        <param name="movie" value="../swfs_peru/clientes_peru.swf" />
                        <param name="quality" value="high" />
                        <embed src="../swfs_peru/clientes_peru.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="433" height="35"></embed>
                      </object>
                      </noscript></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="40" align="right" valign="top"><table width="497" height="40" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="15" align="right" valign="top"><img src="../imgs/borde.gif" width="15" height="28" /></td>
                    <td width="462" align="left" valign="top"><ul id="nav">
                        <li class="top"><a href="../index_peru.php" id="contacts" class="top_link"><span class="Estilo1">Inicio</span></a> </li>
                      <li class="top"><a href="nosotros.php" class="top_link" id="services"><span class="down Estilo1">Nosotros</span></a> </li>
                      <li class="top"><a href="talento_humano.php" id="contacts" class="top_link"><span class="Estilo1">Talento Humano</span></a></li>
                      <li class="top"><a href="testimonios.php" id="shop" class="top_link"><span class="Estilo1">Testimonios</span></a> </li>
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
                  <td align="left" valign="top"><img src="../imgs/peru_testimonios.jpg" width="970" height="30" /></td>
                </tr>
              </table>
                <table width="970" height="412" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="384" align="center" valign="top"><table width="844" height="25" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="571">&nbsp;</td>
                        <td width="399" align="right" valign="middle"><div class="tex_bl2" id="linksINF"> <span class="tx_1">
                          <?php
for ($i=0; $i <= $totalPages_info; $i++) {
  $TFM_PagesEndCount = $i + 1;
  if($i != $pageNum_info) {
    printf('<a href="'."%s?pageNum_info=%d%s", $currentPage, $i, $queryString_info.'">'.$TFM_PagesEndCount."</a>");
  }else{
    echo("<strong>$TFM_PagesEndCount</strong>");
  }
  if($i != $totalPages_info) echo("<img src=\"../imgs/punto.png\" border=\"0\">");
}
 ?>
                        </span></div></td>
                      </tr>
                    </table>
                      <span class="eco2"><a href="talento_humano_det.php?id=<?php echo $row_info['id']; ?>"></a></span>
                      <table >
                        <tr>
                          <?php
$info_endRow = 0;
$info_columns = 1; // number of columns
$info_hloopRow1 = 0; // first row flag
do {
    if($info_endRow == 0  && $info_hloopRow1++ != 0) echo "<tr>";
   ?>
                          <td><table width="920" height="235" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="center" valign="top"><table width="902" height="238" border="0" cellpadding="0" cellspacing="0" bordercolor="0">
                                    <tr>
                                      <td height="218" align="center" valign="top"><table width="877" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td height="13"><img src="../imgs/tes1.jpg" width="877" height="13" /></td>
                                        </tr>
                                      </table>
                                        <table width="867" height="53" border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td height="13" align="center" valign="top" bgcolor="#F4EBEE"><table width="857" height="199" border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td width="204" align="center" valign="top"><span class="tit_eq"><a href="talento_humano_det.php?id=<?php echo $row_info['id']; ?>#p"><img src="../manager/imgs_dinamicas/imgs_peru_testimonios/<?php echo $row_info['img']; ?> " width="185" height="185" border="0" /></a></span></td>
                                                <td width="642" align="left" valign="top"><table width="632" height="29" border="0" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td align="left" valign="middle"><strong class="tx_1"><?php echo $row_info['titulo']; ?></strong></td>
                                                  </tr>
                                                </table>
                                                  <table width="632" height="162" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td align="left" valign="top"><strong class="tex234"></strong>
                                                        <div align="justify" class="tex234"><?php echo $row_info['text']; ?></div></td>
                                                    </tr>
                                                  </table></td>
                                                <td width="11">&nbsp;</td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table>
                                        <table width="877" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td height="14"><img src="../imgs/tes3.jpg" width="877" height="14" /></td>
                                          </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                      <td align="center" valign="top">&nbsp;</td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                          <?php  $info_endRow++;
if($info_endRow >= $info_columns) {
  ?>
                        </tr>
                        <?php
 $info_endRow = 0;
  }
} while ($row_info = mysql_fetch_assoc($info));
if($info_endRow != 0) {
while ($info_endRow < $info_columns) {
    echo("<td>&nbsp;</td>");
    $info_endRow++;
}
echo("</tr>");
}?>
                      </table>
                      </td>
                  </tr>
                  <tr>
                    <td align="center" valign="middle"><div class="tex_bl2" id="linksINF">
                      <span class="tx_1">
                      <?php
for ($i=0; $i <= $totalPages_info; $i++) {
  $TFM_PagesEndCount = $i + 1;
  if($i != $pageNum_info) {
    printf('<a href="'."%s?pageNum_info=%d%s", $currentPage, $i, $queryString_info.'">'.$TFM_PagesEndCount."</a>");
  }else{
    echo("<strong>$TFM_PagesEndCount</strong>");
  }
  if($i != $totalPages_info) echo("<img src=\"../imgs/punto.png\" border=\"0\">");
}
 ?>
                      </span></div></td>
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
</body>
</html>
<?php
mysql_free_result($info);
?>