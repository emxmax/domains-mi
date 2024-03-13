<?php
header('Content-Type: text/html; charset=UTF-8');
require_once("../core/include/admin/header_ajax.php");
require_once("../core/config/main.php");

$command	=(isset($_REQUEST['cmd'])) 	? $_REQUEST['cmd'] : NULL;
$query		=(isset($_REQUEST['query'])) ? $_REQUEST['query'] : NULL;

switch($command){
	case 'empleado':
		Empleado_GetList($query);
		break;
	case 'mundo':
		mundo_GetList($query);
		break;
}

function HTMLEncode($tring){
	$tring=rawurlencode(htmlentities($tring));
return $tring;
}


function Empleado_GetList($query){
global $WEBSITE;
	$list=CrmEmpleado::Buscar($query);
	
	echo '<ul>'."\n";
	foreach($list as $obj){
		$p = ucwords(strtolower($obj->nombres." ".$obj->apellido1." ".$obj->apellido2));
		$p = preg_replace('/(' . $query . ')/i', '<strong>$1</strong>', $p);
		echo "\t".'<li id="autocomplete_'.$obj->personaID.'" rel="'.$obj->personaID."_".ucwords(strtolower($obj->unidadOrganizativa)). '">'. utf8_encode( $p ) .'</li>'."\n";
	}
	echo '</ul>';
}
?>
