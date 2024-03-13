<?php
$autor		=isset( $_REQUEST['autor'] ) ? $_REQUEST['autor'] : '' ;
$publicacion=isset( $_REQUEST['publicacion'] ) ? $_REQUEST['publicacion'] : '' ;
$tema		=isset( $_REQUEST['tema'] ) ? $_REQUEST['tema'] : '' ;
$mes		=isset( $_REQUEST['mes'] ) ? $_REQUEST['mes'] : '' ;
$anio		=isset( $_REQUEST['anio'] ) ? $_REQUEST['anio'] : '' ;
$tipoID		=isset( $_REQUEST['tipoID'] ) ? $_REQUEST['tipoID'] : '' ;
$accion		=isset( $_REQUEST['accion'] ) ? $_REQUEST['accion'] : '' ;
$page		=isset( $_REQUEST['page'] ) ? $_REQUEST['page'] : 0 ;

include 'index.php' ;

/*switch( $accion )
{
	case 'search_publicacion':
		
	break;
}*/

?>