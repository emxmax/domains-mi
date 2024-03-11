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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO peru_nosotros_titulo (id, titulo) VALUES (%s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['titulo'], "text"));

  mysql_select_db($database_conec, $conec);
  $Result1 = mysql_query($insertSQL, $conec) or die(mysql_error());

  $insertGoTo = "reporte_peru_item_nosotros.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_info = "-1";
if (isset($_GET['id'])) {
  $colname_info = $_GET['id'];
}
mysql_select_db($database_conec, $conec);
$query_info = sprintf("SELECT * FROM peru_nosotros_titulo WHERE id = %s", GetSQLValueString($colname_info, "int"));
$info = mysql_query($query_info, $conec) or die(mysql_error());
$row_info = mysql_fetch_assoc($info);
$totalRows_info = mysql_num_rows($info);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/dianmica.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Documento sin t&iacute;tulo</title>

 <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
     <script src="sample.js" type="text/javascript"></script>
     
     <!-- PESTAÑAS -->
     
     <link type="text/css" href="../parapestanas/css/ui-lightness/jquery-ui-1.8.9.customAZUL.css" rel="stylesheet" />	
<script type="text/javascript" src="../parapestanas/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="../parapestanas/js/jquery-ui-1.8.9.custom.min.js"></script>
<script type="text/javascript">
			$(function(){
	
				// Tabs
				$('#tabs').tabs();
				
				//hover states on the static widgets
				$('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				});
		</script>
        
        <!-- PESTAÑAS end-->

<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body {
	background-color: #F0F0F0;
}
-->
</style>
<link href="../eco.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<style type="text/css">
<!--
a:link {
	color: #333333;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #333333;
}
a:hover {
	text-decoration: none;
	color: #990000;
}
a:active {
	text-decoration: none;
	color: #333333;
}
-->
</style>

<link type="text/css" href="jquery_acordion_dina/css/ui-lightness/jquery-ui-1.8.12.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="jquery_acordion_dina/js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="jquery_acordion_dina/js/jquery-ui-1.8.12.custom.min.js"></script>
		<script type="text/javascript">
			$(function(){

				// Accordion
				$("#accordion").accordion({ header: "h3" });
				
				//hover states on the static widgets
				$('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				
			});
		</script></head>

<body>
<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#E5E5E5">
  <tr>
    <td align="center"><table width="990" height="39" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
      <table width="990" height="386" border="0" cellpadding="0" cellspacing="0">
        <tr bgcolor="#FFFFFF">
          <td align="left" valign="top"><table width="990" height="223" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="200" align="center" valign="top"><table width="185" border="0" cellpadding="0" cellspacing="0" bgcolor="#EBEBEB">
                  <tr>
                    <td height="15"><img src="imgs_manager/marcosup1.jpg" width="185" height="15" /></td>
                  </tr>
                  <tr>
                    <td height="50" align="center" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="20" align="center" valign="middle" bgcolor="#999999" class="tit_a"><strong>PERU</strong></td>
                        </tr>
                        
                      </table>
                        <table width="170" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="20" align="center" valign="middle" bgcolor="#CCCCCC" class="tit_a"><strong>SERVICIOS</strong></td>
                          </tr>
                        </table>
                        <table width="170" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;<span class="tit_b">&nbsp;<img src="imgs_manager/punto1.jpg" width="5" height="5" />Imagen</span></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" /> <a href="buscar_peru_img_servicios.php">Imágenes</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" bgcolor="#FFFFFF" class="eco">&nbsp;<span class="tit_b">&nbsp;<img src="imgs_manager/punto1.jpg" width="5" height="5" />GESTIÓN ESTRATÉGICA </span></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" /> <a href="crear_peru_servicios.php">Crear servicio</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp; &nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" /> <a href="reporte_peru_servicios.php">Servicios Existentes</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" bgcolor="#FFFFFF" class="eco">&nbsp;<span class="tit_b">&nbsp;<img src="imgs_manager/punto1.jpg" width="5" height="5" />PROGRAMAS DE FORMACIÓN Y TALLERES </span></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" /> <a href="crear_peru_servicios2.php">Crear servicio</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp; &nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" /> <a href="reporte_peru_servicios2.php">Servicios Existentes</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" bgcolor="#FFFFFF" class="eco">&nbsp;<span class="tit_b">&nbsp;<img src="imgs_manager/punto1.jpg" width="5" height="5" />GESTIÓN PARA EL DESARROLLO HUMANO  </span></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" /> <a href="crear_peru_servicios3.php">Crear servicio</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp; &nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" /> <a href="reporte_peru_servicios3.php">Servicios Existentes</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;</td>
                          </tr>
                        </table>
                        <table width="170" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="20" align="center" valign="middle" bgcolor="#CCCCCC" class="tit_a"><strong>NOSOTROS</strong></td>
                          </tr>
                        </table>
                        <table width="170" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;<span class="tit_b">&nbsp;<img src="imgs_manager/punto1.jpg" width="5" height="5" />Imagen para Nosotros</span></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" /><a href="buscar_img_peru_nosotros.php"> Imágenes</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;<span class="tit_b">&nbsp;<img src="imgs_manager/punto1.jpg" width="5" height="5" />Información Nosotros </span></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" /> <a href="crear_peru_nosotros.php">Crear info. Nosotros</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" /> <a href="reporte_peru_nosotros.php">Info. Nosotros existente</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;</td>
                          </tr>
                        </table>
                        <table width="170" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="20" align="center" valign="middle" bgcolor="#CCCCCC" class="tit_a"><strong>TALENTO HUMANO</strong></td>
                          </tr>
                        </table>
                        <table width="170" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="20" align="left" valign="middle" bgcolor="#FFFFFF" class="tit_a"><div align="center"><strong>INTEGRANTE</strong></div></td>
                          </tr>

                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" /><a href="buscar_peru_img_equipo.php"> Imágenes</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" />&nbsp;<a href="crear_peru_equipo.php">Nuevo Integrante</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" />&nbsp;<a href="reporte_peru_equipo.php">Integrantes existentes</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;</td>
                          </tr>
                        </table>
                        <table width="170" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="20" align="center" valign="middle" bgcolor="#CCCCCC" class="tit_a"><strong>TESTIMONIOS</strong></td>
                          </tr>
                        </table>
                        <table width="170" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;<span class="tit_b">&nbsp;<img src="imgs_manager/punto1.jpg" width="5" height="5" />Imagen para testimonios</span></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" /><a href="buscar_peru_img_testimonios.php"> Imágenes</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;<span class="tit_b">&nbsp;<img src="imgs_manager/punto1.jpg" width="5" height="5" />Información Testimonios</span></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" /> <a href="crear_peru_testimonios.php">Crear info. Testimonios</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" /> <a href="reporte_peru_testimonios.php">Info. Testimo. existente</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;</td>
                          </tr>
                      </table>
                        <table width="170" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="20" align="center" valign="middle" bgcolor="#CCCCCC" class="tit_a"><strong>VIDEOS</strong></td>
                          </tr>
                        </table>
                        <table width="170" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;<span class="tit_b">&nbsp;<img src="imgs_manager/punto1.jpg" width="5" height="5" />Imagen para Video</span></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" /> <a href="buscar_img_peru_videos.php">Imágenes</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;<span class="tit_b">&nbsp;<img src="imgs_manager/punto1.jpg" width="5" height="5" />Información Videos</span></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" /> <a href="crear_peru_videos.php">Crear Videos </a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;&nbsp;&nbsp;&nbsp;<img src="imgs_manager/punto_l.jpg" width="5" height="9" /> <a href="reporte_peru_videos.php">Videos existente</a></td>
                          </tr>
                          <tr>
                            <td height="15" align="left" valign="middle" class="eco">&nbsp;</td>
                          </tr>
                        </table></td>
                  </tr>
                  <tr>
                    <td height="15"><img src="imgs_manager/marcoinf1.jpg" width="185" height="15" /></td>
                  </tr>
                  <tr>
                    <td height="5" align="left" valign="top" bgcolor="#FFFFFF"><img src="imgs_manager/blanco.jpg" width="5" height="5" /></td>
                  </tr>
                </table>
                </td>
              <td width="790" align="left" valign="top"><!-- InstanceBeginEditable name="infodinamic" -->
                <table width="790" height="222" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left" valign="top" class="tit_c"><table width="790" height="290" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left" valign="top"><table width="790" height="31" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center" valign="middle" class="tit_c"><strong>PERU<br />
Editar Item para &quot;NOSOTROS&quot;<span class="eco"><br />
                              <br />
                              </span></strong></td>
                          </tr>
                        </table>
                          <table width="778" height="254" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="left" valign="top"><form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
                                <table width="753" height="251" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="left" valign="top"><div id="tabs">
                                        <ul>
                                          
                                          <li class="tex_c"><a href="#tabs-2" >Item</a></li>
                                          
                                         
                                        </ul>
                                        
                                   
                                      
                                     <div class="tex_c" id="tabs-2">
                                          <div align="left">
                                            <table width="746" height="72" border="0" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td height="20" align="center" valign="top"><span class="tit_c">Nombre o titulo del item</span><br />
                                                  <br />
                                                  <label>
                                                  <input name="titulo" type="text" class="tex_c" id="titulo" size="70" />
                                                  </label>
                                                  <br />
                                                  <br />
                                                  <br /></td>
                                              </tr>
                                            </table>
                                          </div>
                                      </div>
                                      
                                     
                                      
                                      <div class="tex_c" id="tabs-3">
                                          <div align="left"></div>
                                      </div>
                                        
                                  
                                       <div class="tex_c" id="tabs-4">
                                          <div align="left"></div>
                                      </div>
                                      
                                     
                                      
                                      
                                    </div></td>
                                  </tr>
                                </table>
                                                                                          <table width="756" height="37" border="0" cellpadding="0" cellspacing="0">
                                                                                            <tr>
                                                                                              <td align="center" valign="middle"><label>
                                                                                                <input name="button" type="submit" class="tex_c" id="button" value="Subir Información" />
                                                                                                <input name="id" type="hidden" id="id" value="<?php echo $row_info['id']; ?>" />
                                                                                              </label></td>
                                                                                            </tr>
                                                                                          </table>
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                          
                                                                                          <input type="hidden" name="MM_insert" value="form1" />
                              </form>
                              </td>
                            </tr>
                          </table></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
              <!-- InstanceEndEditable --></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($info);
?>