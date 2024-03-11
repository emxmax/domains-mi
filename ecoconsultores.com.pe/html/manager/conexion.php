<?php

function conectarse (){    
	
	
	//if (! ( $link= mysql_connect("localhost","ecoconsu","C8~uu#OM_#RH"))){
	if (! ( $link= mysql_connect("internal-db.s77722.gridserver.com","db77722_ecodb","dataXX145@eco"))){
	
   
	echo "erro al conectarse";
	exit();
}
 
	//if (! mysql_select_db("ecoconsu_eco", $link)){
	if (! mysql_select_db("db77722_eco", $link)){
	echo " La base de datos no existe";
	exit();
}
return $link;
}
$link= conectarse();
//echo " Conexion exitosa";
mysql_close ($link);
?>