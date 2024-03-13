<?php

class Fecha{
        private static $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        private static $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");

	public static function getNombreDia($diaID){
		
		return self::$dias[$diaID-1];
	}

	public static function getNombreMes($mesID){
            return self::$meses[$mesID-1];
	}

	public static function getArray_Meses(){
            return self::$meses;
	}

}

?>