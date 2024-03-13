<?php 

$totalRegistros = count($resultadoPaginacion);
$resultadoPaginacion->limit($porPagina,$porPagina * $pagina);
$totalRegistrosActual = count($resultadoPaginacion);

// Instanciamos la clase Paginador
$paginador = new Paginador();

// Configuramos cuanto registros por pagina que debe ser igual a el limit de la consulta mysql
$paginador->setCantidadRegistros($porPagina);
// Cantidad de enlaces del paginador sin contar los no numericos.
$paginador->setCantidadEnlaces($paginador->getCantidadPaginas());
$paginador->setUrlDestino(site);

$paginador->setOmitir(array('primero', 'bloqueAnterior', 'ultimo', 'bloqueSiguiente'));
$paginador->setMarcador(null, null);

// Agregamos estilos al Paginador
$paginador->setClass('primero',         'previous');
$paginador->setClass('bloqueAnterior',  'previous');
$paginador->setClass('anterior',        'previous');
$paginador->setClass('siguiente',       'next');
$paginador->setClass('bloqueSiguiente', 'next');
$paginador->setClass('ultimo',          'next');
$paginador->setClass('numero',          '<>');
$paginador->setClass('actual',          'active');

// Y mandamos a paginar desde la pagina actual y le pasamos tambien el total
// de registros de la consulta mysql.
$paginar=$paginador->paginar($pagina, $totalRegistros);

?>