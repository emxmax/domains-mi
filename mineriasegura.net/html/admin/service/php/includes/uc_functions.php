<?php

//--
//-- Utils
//--

function uc_sqlDate($zonaHoraria = 'America/Lima' )
{
	date_default_timezone_set($zonaHoraria);
	return date('Y-m-d H:i:s');
}

function uc_boolToString( $var )
{
	if( $var ) return "TRUE";
	else return "FALSE";
}

function uc_decToHex($dec) 
{ 
    $sign = ""; // suppress errors 
    if( $dec < 0){ $sign = "-"; $dec = abs($dec); } 
    $hex = Array( 0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 
                  6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 'a', 
                  11 => 'b', 12 => 'c', 13 => 'd', 14 => 'e',    
                  15 => 'f' ); 
    do 
    { 
        $h = $hex[($dec%16)] . $h; 
        $dec /= 16; 
    } 
    while( $dec >= 1 ); 
    return $sign . $h; 
}

function uc_sanitize( $cadena ) 
{
	// Si la cadena viene de flash usarlo de la siguien manera 
	// uc_sanitize(utf8_decode($cadena));
    $cadena = strtolower( utf8_encode( strtr( trim( $cadena ),
						utf8_decode( ' ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ' ),
						'-aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr' ) ) );
	return ereg_replace( '[^ A-Za-z0-9_-]', '', $cadena );							
}

// crea un idUnico, util para crear nombres unicos para las imagenes. la direccion es de al menos 70 caracteres
function uc_makeUID( $base = '' )
{
	//return $this->idUsuario . time(). rand();
	return uc_decToHex( $base ) . uc_decToHex( time() ) . uc_decToHex( rand() );
}

?>