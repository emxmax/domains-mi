<?php

define('ZONA_HORARIA','America/Lima');

define("PRODUCTION_SERVER", false);

if(PRODUCTION_SERVER){
	
	define('CANVAS_URL', 'http://scdsistemas.com/service' );
	define('PHPDIR', dirname(__FILE__).'/');
	define('INCDIR', PHPDIR.'includes/');
}else{
	define('CANVAS_URL', 'http://localhost/administracionTablets/service/' );
	define('PHPDIR', dirname(__FILE__).'/');
	define('INCDIR', PHPDIR.'includes/');
}


//--
//-- AMFPHP stuff
//--

define('AMFCORE', INCDIR.'amfphp/core/'); //  directorio de las clases de amfphp
define('SRVPATH', PHPDIR.'services/'); // carpeta donde estan los servicios del amfphp
define('VOPATH', PHPDIR.'services/vo/'); // carpeta donde estan los vo que usan los servicios

//--
//-- MySQL stuff
//--
if(PRODUCTION_SERVER)
{
	define("DB_HOST", "internal-db.s77722.gridserver.com");
	define("DB_USER", "db77722_sonrie");
	define("DB_PASS", "50rie14n");
	define("DB_NAME", "db77722_norvial");

	//define("DB_HOST", "localhost");
	//define("DB_USER", "sisvenAdmin");
	//define("DB_PASS", "sisven123");
	//define("DB_NAME", "sisven");

}
else
{
	
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	//define("DB_NAME", "andes");
	define("DB_NAME", "mineriasegura");
}

//--
//-- Log stuff
//--

// la carpeta logs debe tener permisos de escritura si se va utilizar un archivo de log
define('LOG_DIR', PHPDIR.'logs' );
define('LOG_BASE', 'log_app' );

?>
