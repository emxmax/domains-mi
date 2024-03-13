<?php
session_start();
//header("content-type: utf-8");
require_once("../core/config/main.php");
require_once("../core/include/website/page_request.php");
require_once("../core/include/website/logon.php");

$filtro     = isset($_REQUEST['filtro'])? intval($_REQUEST['filtro']): NULL;
$criterio   = isset($_REQUEST['criterio'])? $_REQUEST['criterio']: NULL;

switch ($filtro){
    case 1:
        $lPostIt=(isset($criterio))? CrmPostIt::getWebList_User($criterio, true): CrmPostIt::getWebList_User($personaID); break;
    case 2:
        $lPostIt=CrmPostIt::getWebList_TopLikes(); break;
    case 3:
        $lPostIt=CrmPostIt::getWebList_News(); break;
    case 4:
        $lPostIt=CrmPostIt::getWebList_TopUsers(); break;
    default:
        $lPostIt=CrmPostIt::Search($criterio); break;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include '../core/include/website/header.php';?>
<script type="text/javascript">
$(function(){
    $('.like').click(function(){
        pstID=$(this).attr('rel');
        voto=$("#like"+pstID).html();
        $.ajax({
          url: "../ajax/postit.php?cmd=like&pstID="+pstID,
          success: function(data){
            if(parseInt(data)>voto){
                $("#like"+pstID).html(data);
                ShowAlert("Excelente!, gracias por valorar esta nota.");
            }
            else
                ShowAlert("Ya has valorado esta nota antes, gracias.");
          }
        });
    });
});
</script>
<style type="text/css">
html {
   	overflow: auto;
}
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #4e5665;
	margin-left: 20px;
	margin-top: 20px;
	margin-right: 20px;
	margin-bottom: 20px;
	background: transparent;
	overflow-y: hidden;
	overflow-x: hidden;
}
.arialgray {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #89919c;
}
.arialazulbold {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #3b5998;
	font-weight: bold;
}
.arialazul {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #3b5998;
}

/* Let's get this party started */
::-webkit-scrollbar {
    width: 10px;
}
 
/* Track */
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 1px rgba(255,255,255,0.7);
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    background: rgba(59,89,152,1); 
    -webkit-box-shadow: inset 0 0 1px rgba(59,89,152,1); 
}
::-webkit-scrollbar-thumb:window-inactive {
	background: rgba(255,0,0,0.4); 
}
</style>
</head>
<body>

<?php
if($filtro==4){
    foreach($lPostIt as $oItem){
        $fecha=strtotime($oItem->fechaRegistro);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span class="arialazulbold"><?php echo $oItem->destino;?> / <?php echo $oItem->mundoDestino;?></span><br /></td>
  </tr>
  <tr>
    <td><a href="resultadodebusqueda.html?filtro=1&criterio=<?php echo $oItem->destinoID;?>" target="_parent" class="arialgray">Ver comentarios</a></td>
  </tr>
  <tr>
    <td height="16"></td>
  </tr>
</table>
<?php
    }
}
else{
    foreach($lPostIt as $oItem){
        $fecha=strtotime($oItem->fechaRegistro);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
      <td><a name="<?php echo $oItem->postitID;?>"></a><span class="arialazulbold">De: <?php echo $oItem->origen;?> / <?php echo $oItem->mundoOrigen;?></span> <?php echo $oItem->mensaje;?> <br />
      <span class="arialazulbold">Para: <?php echo $oItem->destino;?> / <?php echo $oItem->mundoDestino;?></span><br /></td>
  </tr>
  <tr>
    <td><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="arialgray"><?php echo date('d', $fecha);?> de <?php echo Fecha::getNombreMes(date('m', $fecha));?> a la(s) <?php echo date('H:i', $fecha);?></td>
        <td width="24" align="center" class="arialgray">*</td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="72" class="arialazul">Me gusta </td>
            <td width="20" align="center"><a rel="<?php echo $oItem->postitID;?>" class="like" href="javascript:;"><img src="images/star.png" width="14" height="14" border="0" /></a></td>
            <td align="right" class="arialazul"><span id="like<?php echo $oItem->postitID;?>"><?php echo $oItem->votos;?></span></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="16"></td>
  </tr>
</table>
<?php
    }
}
if($lPostIt->getLength()==0)
    echo '<span class="arialazulbold">No se han encontrado resultados.</span>';
?>

</body>
</html>
