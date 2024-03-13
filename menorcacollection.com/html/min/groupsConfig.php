<?php
/**
 * Groups configuration for default Minify implementation
 * @package Minify
 */

/** 
 * You may wish to use the Minify URI Builder app to suggest
 * changes. http://yourdomain/min/builder/
 *
 * See http://code.google.com/p/minify/wiki/CustomSource for other ideas
 **/

return array(
	'default_js' => array('//js/jquery.js', '//js/jquery.easing.1.3.js', '//js/funciones.js', '//js/scrolltopcontrol.js'),
	'index_js' => array('//js/jquery.cycle.all.js', '//js/menorca.js'),
	'coleccion_js' => array('//js/jquery.cycle.all.js', '//js/jquery.validationEngine-es.js', '//js/jquery.validationEngine.js', '//js/jquery.infieldlabel.js', '//js/menorca.js'),
	'proyecto_js' => array('//js/jquery.cycle.all.js', '//js/jquery.validationEngine-es.js', '//js/jquery.validationEngine.js', '//js/fx_archivos/shadowbox.js', '//js/jquery.infieldlabel.js' , '//js/ag_scrollAnimado.js', '//js/menorca.js'),
	'contacto_js' => array('//js/jquery.validationEngine-es.js','//js/jquery.cycle.all.js', '//js/jquery.validationEngine.js', '//js/jquery.infieldlabel.js', '//js/menorca.js'),
	'generico_js' => array('//js/jquery.easing.1.3.js', '//js/dw_cookies.js', '//js/dw_sizerdx.js', '//js/fx_archivos/shadowbox.js', '//js/fx_archivos/fx_archivos_index.js', '//js/jquery.cycle.all.js', '//js/ag_slider/ag_slider.js', '//js/AG_menu_min.js', '//js/fonts.js', '//js/generico.js', '//js/listado.js'),
    'noticias_js' => array('//js/jquery.easing.1.3.js','//js/jquery.cycle.all.js'),
	'noticias_detalle_js' => array('//js/jquery.easing.1.3.js','//js/jquery.cycle.all.js', '//js/dw_cookies.js', '//js/dw_sizerdx.js', '//js/AG_menu_min.js', '//js/AG_ancla.js', '//js/fonts.js', '//js/generico.js'),
	'index_css' => array('//css/web.css', '//css/edi.css', '//js/fx_archivos/shadowbox.css'),
	'generico_css' => array('//css/web.css', '//css/edi.css', '//css/paginador.css', '//css/validationEngine.jquery.css', '//js/fx_archivos/shadowbox.css'),
);