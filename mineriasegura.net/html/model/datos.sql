-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.16 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para mineriasegura
CREATE DATABASE IF NOT EXISTS `mineriasegura` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `mineriasegura`;


-- Volcando estructura para tabla mineriasegura.archivos
CREATE TABLE IF NOT EXISTS `archivos` (
  `idArchivo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `ruta` mediumtext NOT NULL,
  `tamano` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idArchivo`),
  KEY `fk_archivos_usuarios1_idx` (`idUsuario`),
  CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.archivos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `archivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivos` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.campos_formulario
CREATE TABLE IF NOT EXISTS `campos_formulario` (
  `idCampoFormulario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `idCampo` varchar(45) NOT NULL,
  `claseCampo` varchar(45) NOT NULL,
  `placeholder` varchar(45) DEFAULT NULL,
  `longitud` int(11) DEFAULT NULL,
  `idElementoFormulario` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `idFormulario` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idCampoFormulario`),
  KEY `fk_campos_formulario_elementos_formulario1_idx` (`idElementoFormulario`),
  KEY `fk_campos_formulario_formularios1_idx` (`idFormulario`),
  CONSTRAINT `campos_formulario_ibfk_1` FOREIGN KEY (`idElementoFormulario`) REFERENCES `elementos_formulario` (`idElementoFormulario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `campos_formulario_ibfk_2` FOREIGN KEY (`idFormulario`) REFERENCES `formularios` (`idFormulario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.campos_formulario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `campos_formulario` DISABLE KEYS */;
/*!40000 ALTER TABLE `campos_formulario` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcionCategoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `url1` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `url2` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla mineriasegura.categorias: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`idCategoria`, `descripcionCategoria`, `estado`, `url1`, `url2`) VALUES
	(1, 'Medio Ambiente', 1, 'medio-ambiente', '?sec=medio-ambiente'),
	(2, 'Noticias', 1, 'noticias', '?sec=noticias'),
	(3, 'Inversi&oacute;n', 1, 'inversion', '?sec=inversion'),
	(4, 'Seguridad', 1, 'seguridad', '?sec=seguridad');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.comentario_post
CREATE TABLE IF NOT EXISTS `comentario_post` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estado` int(11) NOT NULL DEFAULT '1',
  `idUsuario` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  PRIMARY KEY (`idComentario`),
  KEY `fk_comentarios_post_usuarios_1` (`idUsuario`),
  KEY `fk_comentarios_post_post_1` (`idPost`),
  CONSTRAINT `comentario_post_ibfk_1` FOREIGN KEY (`idPost`) REFERENCES `post` (`idPost`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `comentario_post_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.comentario_post: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `comentario_post` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario_post` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.contenido
CREATE TABLE IF NOT EXISTS `contenido` (
  `idContenido` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `subTitulo` varchar(250) DEFAULT NULL,
  `texto` mediumtext,
  `estado` int(11) NOT NULL DEFAULT '1',
  `link` varchar(50) DEFAULT NULL,
  `urlLink` varchar(250) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idContenido`),
  KEY `fk_contenido_usuarios1_idx` (`idUsuario`),
  CONSTRAINT `contenido_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.contenido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `contenido` DISABLE KEYS */;
/*!40000 ALTER TABLE `contenido` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.contenido_archivos
CREATE TABLE IF NOT EXISTS `contenido_archivos` (
  `idContenido` int(11) NOT NULL,
  `idArchivo` int(11) NOT NULL,
  KEY `fk_contenido_archivos_archivos1_idx` (`idArchivo`),
  KEY `fk_contenido_archivos_contenido1_idx` (`idContenido`),
  CONSTRAINT `contenido_archivos_ibfk_1` FOREIGN KEY (`idArchivo`) REFERENCES `archivos` (`idArchivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `contenido_archivos_ibfk_2` FOREIGN KEY (`idContenido`) REFERENCES `contenido` (`idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.contenido_archivos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `contenido_archivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contenido_archivos` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.contenido_formulario
CREATE TABLE IF NOT EXISTS `contenido_formulario` (
  `idContenido` int(11) NOT NULL,
  `idFormulario` int(11) NOT NULL,
  KEY `fk_contenido_formulario_contenido1_idx` (`idContenido`),
  KEY `fk_contenido_formulario_formularios1_idx` (`idFormulario`),
  CONSTRAINT `contenido_formulario_ibfk_1` FOREIGN KEY (`idContenido`) REFERENCES `contenido` (`idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `contenido_formulario_ibfk_2` FOREIGN KEY (`idFormulario`) REFERENCES `formularios` (`idFormulario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.contenido_formulario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `contenido_formulario` DISABLE KEYS */;
/*!40000 ALTER TABLE `contenido_formulario` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.contenido_has_tabs
CREATE TABLE IF NOT EXISTS `contenido_has_tabs` (
  `idContenido` int(11) NOT NULL,
  `idTab` int(11) NOT NULL,
  PRIMARY KEY (`idContenido`,`idTab`),
  KEY `fk_contenido_has_tabs_tabs1_idx` (`idTab`),
  KEY `fk_contenido_has_tabs_contenido1_idx` (`idContenido`),
  CONSTRAINT `contenido_has_tabs_ibfk_1` FOREIGN KEY (`idContenido`) REFERENCES `contenido` (`idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `contenido_has_tabs_ibfk_2` FOREIGN KEY (`idTab`) REFERENCES `tabs` (`idTab`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.contenido_has_tabs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `contenido_has_tabs` DISABLE KEYS */;
/*!40000 ALTER TABLE `contenido_has_tabs` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.elementos_formulario
CREATE TABLE IF NOT EXISTS `elementos_formulario` (
  `idElementoFormulario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`idElementoFormulario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.elementos_formulario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `elementos_formulario` DISABLE KEYS */;
/*!40000 ALTER TABLE `elementos_formulario` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.formularios
CREATE TABLE IF NOT EXISTS `formularios` (
  `idFormulario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  `claseFormulario` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idFormulario`),
  KEY `fk_formularios_usuarios1_idx` (`idUsuario`),
  CONSTRAINT `formularios_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.formularios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `formularios` DISABLE KEYS */;
/*!40000 ALTER TABLE `formularios` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.imagenes
CREATE TABLE IF NOT EXISTS `imagenes` (
  `idImagen` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `alt` varchar(250) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idImagen`),
  KEY `fk_imagenes_usuarios1_idx` (`idUsuario`),
  CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.imagenes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `imagenes` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.imagenes_contenidos
CREATE TABLE IF NOT EXISTS `imagenes_contenidos` (
  `idImagen` int(11) NOT NULL,
  `idContenido` int(11) NOT NULL,
  KEY `fk_imagenes_contenidos_imagenes1_idx` (`idImagen`),
  KEY `fk_imagenes_contenidos_contenido1_idx` (`idContenido`),
  CONSTRAINT `imagenes_contenidos_ibfk_1` FOREIGN KEY (`idContenido`) REFERENCES `contenido` (`idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `imagenes_contenidos_ibfk_2` FOREIGN KEY (`idImagen`) REFERENCES `imagenes` (`idImagen`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.imagenes_contenidos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `imagenes_contenidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagenes_contenidos` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.item_menu
CREATE TABLE IF NOT EXISTS `item_menu` (
  `idItemMenu` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  `url1` varchar(250) NOT NULL,
  `url2` varchar(250) NOT NULL,
  `orden` int(11) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '1',
  `tipo` int(11) NOT NULL DEFAULT '1',
  `idMenu` int(11) NOT NULL,
  `imagen` mediumtext,
  PRIMARY KEY (`idItemMenu`),
  KEY `fk_item_menu_menu1_idx` (`idMenu`),
  CONSTRAINT `item_menu_ibfk_1` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`idMenu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.item_menu: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `item_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_menu` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.item_menu_pagina
CREATE TABLE IF NOT EXISTS `item_menu_pagina` (
  `idItemMenu` int(11) NOT NULL,
  `idPagina` int(11) NOT NULL,
  KEY `fk_item_menu_pagina_item_menu1_idx` (`idItemMenu`),
  KEY `fk_item_menu_pagina_pagina1_idx` (`idPagina`),
  CONSTRAINT `item_menu_pagina_ibfk_1` FOREIGN KEY (`idItemMenu`) REFERENCES `item_menu` (`idItemMenu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `item_menu_pagina_ibfk_2` FOREIGN KEY (`idPagina`) REFERENCES `pagina` (`idPagina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.item_menu_pagina: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `item_menu_pagina` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_menu_pagina` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  `url1` varchar(250) NOT NULL,
  `url2` varchar(250) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '1',
  `idUsuario` int(11) NOT NULL,
  `main` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idMenu`),
  KEY `fk_menu_usuarios1_idx` (`idUsuario`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.menu: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.menu_has_item_menu
CREATE TABLE IF NOT EXISTS `menu_has_item_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idItemMenu` int(11) NOT NULL,
  `idMenu` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_menu_has_item_menu_item_menu1_idx` (`idItemMenu`),
  KEY `fk_menu_has_item_menu_menu1_idx` (`idMenu`),
  CONSTRAINT `menu_has_item_menu_ibfk_1` FOREIGN KEY (`idItemMenu`) REFERENCES `item_menu` (`idItemMenu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `menu_has_item_menu_ibfk_2` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`idMenu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.menu_has_item_menu: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `menu_has_item_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_has_item_menu` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.pagina
CREATE TABLE IF NOT EXISTS `pagina` (
  `idPagina` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `url1` varchar(250) DEFAULT NULL,
  `url2` varchar(250) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idPagina`),
  KEY `fk_pagina_usuarios1_idx` (`idUsuario`),
  CONSTRAINT `pagina_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.pagina: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pagina` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagina` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.pagina_has_contenido
CREATE TABLE IF NOT EXISTS `pagina_has_contenido` (
  `idPagina` int(11) NOT NULL,
  `idContenido` int(11) NOT NULL,
  `orden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPagina`,`idContenido`),
  KEY `fk_pagina_has_contenido_contenido1_idx` (`idContenido`),
  KEY `fk_pagina_has_contenido_pagina1_idx` (`idPagina`),
  CONSTRAINT `pagina_has_contenido_ibfk_1` FOREIGN KEY (`idContenido`) REFERENCES `contenido` (`idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pagina_has_contenido_ibfk_2` FOREIGN KEY (`idPagina`) REFERENCES `pagina` (`idPagina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.pagina_has_contenido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pagina_has_contenido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagina_has_contenido` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.panel_tab
CREATE TABLE IF NOT EXISTS `panel_tab` (
  `nombre` varchar(50) NOT NULL,
  `contenido` mediumtext NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT '1',
  `idTab` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  KEY `fk_panel_tab_tabs1_idx` (`idTab`),
  CONSTRAINT `panel_tab_ibfk_1` FOREIGN KEY (`idTab`) REFERENCES `tabs` (`idTab`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.panel_tab: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `panel_tab` DISABLE KEYS */;
/*!40000 ALTER TABLE `panel_tab` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.post
CREATE TABLE IF NOT EXISTS `post` (
  `idPost` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `contenido` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `contenidoMuestra` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `mostrarImagen` int(11) NOT NULL DEFAULT '1',
  `imagenPortada` mediumtext COLLATE utf8_spanish_ci,
  `imagenPost` mediumtext COLLATE utf8_spanish_ci,
  `url1` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `url2` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `fechaRegistro` date NOT NULL DEFAULT '0000-00-00',
  `fechaPublicacion` date NOT NULL DEFAULT '0000-00-00',
  `estado` int(11) NOT NULL DEFAULT '1',
  `idUsuario` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`idPost`),
  KEY `fk_post_usuarios_1` (`idUsuario`),
  KEY `post_categorias_1` (`idCategoria`),
  CONSTRAINT `post_categorias_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.post: ~39 rows (aproximadamente)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`idPost`, `titulo`, `contenido`, `contenidoMuestra`, `mostrarImagen`, `imagenPortada`, `imagenPost`, `url1`, `url2`, `fechaRegistro`, `fechaPublicacion`, `estado`, `idUsuario`, `idCategoria`) VALUES
	(32, 'Minsur es reconocida como la empresa minera m&aacute;s segura del pa&iacute;s', '<p>Tras llevarse a cabo el XVIII Concurso Nacional de Seguridad Minera, la cual premia la correcta seguridad y salud en el trabajo de las mineras en el pa&iacute;s, Minsur fue reconocida, en sus tres operaciones, como la empresa minera m&aacute;s segura del Per&uacute;, ya que ha logrado reducir en un 86% el &iacute;ndice de accidentes incapacitantes dentro de las minas de gran tama&ntilde;o.</p>', '<p>Tras llevarse a cabo el XVIII Concurso Nacional de Seguridad Minera, la cual premia la correcta seguridad y salud en el trabajo de las mineras en el pa&iacute;s, Minsur fue reconocida, en sus tres operaciones, como la empresa minera m&aacute;s segura del Per&uacute;, ya que ha logrado reducir en un 86% el &iacute;ndice de accidentes incapacitantes dentro de las minas de gran tama&ntilde;o.</p>', 1, 'minsur.jpg', 'minsur.jpg', 'minsur-es-reconocida-como-la-empresa-minera-mas-segura-del-pais', '?sec=minsur-es-reconocida-como-la-empresa-minera-mas-segura-del-pais', '2015-08-04', '0000-00-00', 1, 2, 4),
	(35, 'Mineros de Ananea se capacitaron en seguridad minera y medio ambiente', '<p>La Direcci&oacute;n Regional de Energ&iacute;a y Minas de Puno, junto a la central de cooperativas mineras de Rinconada y cerro Lunar de Oro, capacitaron cerca de 2 mil mineros.</p>', '<p>La Direcci&oacute;n Regional de Energ&iacute;a y Minas de Puno, junto a la central de cooperativas mineras de Rinconada y cerro Lunar de Oro, capacitaron cerca de 2 mil mineros.</p>', 1, 'seguridadminera.jpg', 'seguridadminera.jpg', 'mineros-de-ananea-se-capacitaron-en-seguridad-minera-y-medio-ambiente', '?sec=mineros-de-ananea-se-capacitaron-en-seguridad-minera-y-medio-ambiente', '0000-00-00', '0000-00-00', 1, 2, 1),
	(38, 'Producci&oacute;n del sector miner&iacute;a e hidrocarburos avanza positivamente&nbsp;&nbsp;', '<p>Seg&uacute;n el Instituto Nacional de Estad&iacute;stica e Inform&aacute;tica (INEI), la producci&oacute;n de este importante sector creci&oacute; en un 1.49% en el pa&iacute;s, a comparaci&oacute;n del a&ntilde;o pasado.</p>\r\n\r\n<p>Buenas noticias para el sector miner&iacute;a e hidrocarburos, pues la producci&oacute;n de este importante sector creci&oacute; en 1.49% en este a&ntilde;o y gracias a ello, se acumulan tres meses de crecimiento continuo para la miner&iacute;a peruana.</p>\r\n\r\n<p>&ldquo;Este crecimiento se debi&oacute; principalmente por el desempe&ntilde;o positivo del subsector miner&iacute;a met&aacute;lica que aument&oacute; en 8.69%. Contribuyeron con este comportamiento, la mayor producci&oacute;n de cobre con 18.21%; oro, 9.28%; molibdeno avanz&oacute; 37.12%; y plomo, 2.35%&rdquo;, dio a conocer el Instituto Nacional de Estad&iacute;stica e Inform&aacute;tica (INEI).</p>\r\n\r\n<p>En tanto, a los que no les fue tan bien, pues retrocedieron en la extracci&oacute;n de metales, fueron: zinc (-3.65%), plata (-14.47%), hierro (-25.38%) y esta&ntilde;o (-14.29%). As&iacute; tambi&eacute;n, la producci&oacute;n del subsector hidrocarburos disminuy&oacute; en 22.10% por la menor extracci&oacute;n de petr&oacute;leo crudo (-14.95%), l&iacute;quidos de gas (31.70%) y gas natural (-12.61%).</p>\r\n\r\n<p>Fuente: Andina</p>\r\n\r\n<p>03 de agosto, 2015.</p>\r\n', '<p>Seg&uacute;n el Instituto Nacional de Estad&iacute;stica e Inform&aacute;tica (INEI), la producci&oacute;n de este importante sector creci&oacute; en un 1.49% en el pa&iacute;s, a comparaci&oacute;n del a&ntilde;o pasado.</p>', 1, 'captura-de-pantalla-2015-08-24-a-las-12-31-59.png', 'captura-de-pantalla-2015-08-24-a-las-12-31-59.png', 'produccion-del-sector-mineria-e-hidrocarburos-avanza-positivamente', '?sec=produccion-del-sector-mineria-e-hidrocarburos-avanza-positivamente', '2015-08-03', '0000-00-00', 1, 2, 3),
	(41, 'El oro brilla m&aacute;s que nunca', '<p>El Minem inform&oacute; que la producci&oacute;n de oro creci&oacute; 7,&nbsp;92% entre enero y mayo de este a&ntilde;o</p>\r\n\r\n<p>El pa&iacute;s empieza a tener un brillo especial, sobre todo, para La Libertad, Cajamarca y Arequipa,&nbsp;quienes lideran la producci&oacute;n nacional de este importante metal que creci&oacute; significativamente&nbsp;(7,92%) entre enero y mayo, seg&uacute;n inform&oacute; el Ministerio de Energ&iacute;a&nbsp;y Minas (Minem).</p>\r\n\r\n<p>La Libertad se lleva el oro mayor, pues se ha convertido en l&iacute;der de la producci&oacute;n nacional de&nbsp;este precioso metal, aportando el&nbsp;35.21% del volumen nacional (665,249 onzas finas), con un&nbsp;incremento de 15.77% en mayo.</p>\r\n\r\n<p>Cajamarca no se queda atr&aacute;s, pues esta aporta el 29.42% en la producci&oacute;n de oro, tras obtener&nbsp;un volumen de extracci&oacute;n de&nbsp;555,897 onzas finas de&nbsp;este metal. En tanto, Arequipa tambi&eacute;n&nbsp;aport&oacute; el 9.75% del total nacional que son 1,889,542 onzas finas,&nbsp;manteniendo as&iacute; su&nbsp;tendencia incremental de 3.72% en el mes de mayo.</p>\r\n\r\n<p>Sin duda, una fiesta para todos los productores de&nbsp;oro. Eso s&iacute;, los otros metales no tienen nada&nbsp;que envidiarle, pues el Minem indic&oacute;&nbsp;que el crecimiento entre enero y mayo se dio en la&nbsp;producci&oacute;n de todos los metales, a excepci&oacute;n del esta&ntilde;o. El cobre creci&oacute; 6.29%, el zinc 13.19%,&nbsp;la plata 2.84%, el plomo 18.85% y finalmente el hierro 2.27%.</p>', '<p>El Minem inform&oacute; que la producci&oacute;n de oro creci&oacute; 7,&nbsp;92% entre enero y mayo de este a&ntilde;o</p>\r\n', 1, 'mina-oro.jpg', 'mina-oro.jpg', 'el-oro-brilla-mas-que-nunca', '?sec=el-oro-brilla-mas-que-nunca', '0000-00-00', '0000-00-00', 1, 2, 2),
	(51, 'Cajamarca est&aacute; en regla con el medio ambiente', '<p>El Organismo de Evaluaci&oacute;n y Fiscalizaci&oacute;n Ambiental (OEFA) le otorga a Cajamarca el primer lugar, tras cumplir con todas las reglas ambientales en la peque&ntilde;a miner&iacute;a.</p>\r\n\r\n<p>Si est&aacute;s en regla con el medio ambiente, est&aacute;s en regla con la poblaci&oacute;n. Y en ese sentido, el Gobierno Regional de Cajamarca al parecer est&aacute; trabajando cada vez mejor en la peque&ntilde;a miner&iacute;a y la miner&iacute;a artesanal, pues seg&uacute;n el informe 2014 del Organismo de Evaluaci&oacute;n y Fiscalizaci&oacute;n Ambiental (OEFA), la regi&oacute;n se encuentra liderando el cuadro con 59,86 puntos, sobre un tope de 100, lo que le da un promedio de 11,97 en el r&aacute;nking de cumplimiento.</p>\r\n\r\n<p>As&iacute; tambi&eacute;n, a Cajamarca le siguen La Libertad con un promedio de 11,25; &Aacute;ncash con 10,83; Madre de Dios con 9,97 y Jun&iacute;n con 9,44 de promedio. De igual forma, Moquegua logr&oacute; un promedio de 9,42; San Mart&iacute;n 8,61; Piura 8,06; Arequipa 7,61; Ica 7,39; Cusco 7,31; Lambayeque 6,94; Tacna 6,92; Tumbes 6,92; Pasco 6,86; Puno 6,75; Amazonas 6,72; Huancavelica 6,42; Hu&aacute;nuco 6,36; Loreto y Apur&iacute;mac 6,06; Lima con 5,42 de promedio; Ucayali 5,82; Ayayucho 5,03 y Callao con 3,97.</p>\r\n\r\n<p>Continuando con este compromiso de trabajar cuidando el medio ambiente, se inform&oacute; que en este a&ntilde;o el OEFA continuar&aacute; supervisando a las entidades encargadas de la fiscalizaci&oacute;n ambiental, llevando a cabo las actividades necesarias para fortalecer a&uacute;n m&aacute;s las capacidades de los funcionarios regionales.</p>\r\n\r\n<p>(Fuente: Andina)</p>\r\n\r\n<p>03 de agosto, 2015.</p>\r\n', '<p>El Organismo de Evaluaci&oacute;n y Fiscalizaci&oacute;n Ambiental (OEFA) le otorga a Cajamarca el primer lugar, tras cumplir con todas las reglas ambientales en la peque&ntilde;a miner&iacute;a.</p>', 1, '', '', 'cajamarca-esta-en-regla-con-el-medio-ambiente', '?sec=cajamarca-esta-en-regla-con-el-medio-ambiente', '0000-00-00', '0000-00-00', 1, 2, 1),
	(53, 'Apuntando hacia una miner&iacute;a efectiva desde lo alto', '<p>Crece el inter&eacute;s por el uso de drones para obtener datos importantes en la actividad minera</p>\r\n\r\n<p>Todo vale cuando se trata de conseguir datos exactos en el sector minero. Es as&iacute; que el uso de drones cada vez genera un mayor inter&eacute;s en la actividad minera, pues gracias a su aplicaci&oacute;n, se puede conseguir avances topogr&aacute;ficos detallados en terrenos extensos, modelamiento 2D/3D de estos sectores, inspecci&oacute;n y monitoreo, entre muchas otras labores.</p>\r\n\r\n<p>A pesar que los drones, denominados Veh&iacute;culo A&eacute;reo No Tripulado &ndash; VANT, fueron en un principio creados con fines militares, ahora esta tecnolog&iacute;a es utilizada en la miner&iacute;a, tanto para estudiar de manera exacta los terrenos como para la identificaci&oacute;n temprana de riesgos en este sector.</p>\r\n\r\n<p>La incorporaci&oacute;n de esta tecnolog&iacute;a en el &aacute;mbito productivo de la miner&iacute;a, energ&iacute;a u otros sectores productivos de un pa&iacute;s, &ldquo;es un fen&oacute;meno creciente y que no se detendr&aacute;, por los variados beneficios que ofrece a costos razonables&rdquo;, asegura Jorge Pimentel, Gerente de Negocios Miner&iacute;a de la empresa chilena Sisdef Ingenier&iacute;a e Integraci&oacute;n.</p>\r\n\r\n<p>(Fuente: Horizonte Minero)</p>\r\n\r\n<p>03 de agosto, 2015</p>', '<p>Crece el inter&eacute;s por el uso de drones para obtener datos importantes en la actividad minera</p>', 1, '', '', 'apuntando-hacia-una-mineria-efectiva-desde-lo-alto', '?sec=apuntando-hacia-una-mineria-efectiva-desde-lo-alto', '0000-00-00', '0000-00-00', 1, 2, 2),
	(54, '&Aacute;ncash se lleva todo el cobre', '<p>Seg&uacute;n el Ministerio de Energ&iacute;a y Minas (MEN), la regi&oacute;n &Aacute;ncash lidera en la producci&oacute;n de este&nbsp;valioso metal</p>', '<p>Seg&uacute;n el Ministerio de Energ&iacute;a y Minas (MEN), la regi&oacute;n &Aacute;ncash lidera en la producci&oacute;n de este&nbsp;valioso metal</p>', 1, 'ancash.jpg', 'ancash.jpg', 'ancash-se-lleva-todo-el-cobre', '?sec=ancash-se-lleva-todo-el-cobre', '0000-00-00', '0000-00-00', 1, 2, 2),
	(56, 'La miner&iacute;a crece y los empleos en el sector le siguen el ritmo', '<p>El Ministerio de Energ&iacute;a y Minas asegura que los empleos en el sector minero aumentaron&nbsp;7.5%</p>\r\n\r\n<p>La demandante actividad en el sector minero peruano&nbsp;ha generado un importante crecimiento&nbsp;en el &aacute;rea laboral, pues solo en mayo&nbsp;se registraron un total de 197,476 puestos de trabajo&nbsp;directos, logrando as&iacute; un aumento de 7.5% a comparaci&oacute;n del a&ntilde;o&nbsp;pasado, que se registraron&nbsp;183,695 empleos, seg&uacute;n inform&oacute; la Direcci&oacute;n General&nbsp;de Miner&iacute;a del Ministerio de Energ&iacute;a y&nbsp;Minas (MEM), en un reporte sobre la actividad minera al quinto mes del este a&ntilde;o.</p>\r\n\r\n<p>As&iacute; tambi&eacute;n, se nombr&oacute; a la regi&oacute;n que consigui&oacute; el&nbsp;mayor n&uacute;mero de empleados en el sector&nbsp;minero y Arequipa se llev&oacute; el primer&nbsp;lugar, pues le&nbsp;dio empleo a 38,003 trabajadores mineros&nbsp;que representan el 19.24% del total. De igual forma&nbsp;la regi&oacute;n Apur&iacute;mac obtuvo el segundo&nbsp;lugar generando 18,916 empleos directos (9.58%).</p>\r\n\r\n<p>Asimismo, del total de empleos registrados en mayo,&nbsp;134,811 fueron generados por los&nbsp;contratistas mineros y las empresas&nbsp;conexas, mientras que las compa&ntilde;&iacute;as mineras titulares de&nbsp;los proyectos participaron con la generaci&oacute;n de 62,665 puestos de trabajo.</p>', '<p>El Ministerio de Energ&iacute;a y Minas asegura que los empleos en el sector minero aumentaron&nbsp;7.5%</p>', 1, 'minerosempleo.jpg', 'minerosempleo.jpg', 'la-mineria-crece-y-los-empleos-en-el-sector-le-siguen-el-ritmo', '?sec=la-mineria-crece-y-los-empleos-en-el-sector-le-siguen-el-ritmo', '0000-00-00', '0000-00-00', 1, 2, 2),
	(58, 'China en el ojo de la miner&iacute;a peruana', '<p>La delegaci&oacute;n peruana, liderada por el Ministerio de Energ&iacute;a y Minas, expondr&aacute; en el China Mining 2015 sobre las oportunidades de inversi&oacute;n minera en nuestro pa&iacute;s.</p>\r\n\r\n<p>La miner&iacute;a peruana sigue dando que hablar en todo el mundo, por eso la delegaci&oacute;n peruana, liderada por el Ministerio de Energ&iacute;a y Minas, estar&aacute; presente en el evento internacional China Mining 2015, que se realizar&aacute; del 20 al 23 de octubre en la ciudad de china, Tianjin; para promover las oportunidades de inversi&oacute;n minera en nuestro pa&iacute;s, as&iacute; como el acercamiento entre el Estado y empresariado peruano con sus pares chinos y la regi&oacute;n asi&aacute;tica.</p>\r\n\r\n<p>&ldquo;China es el primer inversionista en el sector minero peruano y se perfila como gran potencia mundial. Dentro de nuestra cartera de inversiones mineras estimada en 63,115 millones de d&oacute;lares; 22,659 millones (35.9%) corresponden a inversiones del gigante pa&iacute;s asi&aacute;tico, que cuenta con megaproyectos como Toromocho y Las Bambas, cuya operaci&oacute;n comercial est&aacute; prevista a inicios del 2016&rdquo;, asegur&oacute; el viceministro de Minas, Guillermo Shinno.</p>\r\n\r\n<p>Es importante mencionar que esta ser&aacute; la s&eacute;ptima vez que la delegaci&oacute;n peruana participar&aacute; del China Mining, evento internacional que re&uacute;ne a los principales l&iacute;deres de la industria minera global con las autoridades de gobierno de alto nivel de los principales pa&iacute;ses mineros, y Per&uacute; estar&aacute; presente.</p>\r\n\r\n<p>03 de agosto, 2015.</p>', '<p>La delegaci&oacute;n peruana, liderada por el Ministerio de Energ&iacute;a y Minas, expondr&aacute; en el China Mining 2015 sobre las oportunidades de inversi&oacute;n minera en nuestro pa&iacute;s.</p>', 1, '1mineria_peru.jpg', '1mineria_peru.jpg', 'china-en-el-ojo-de-la-mineria-peruana', '?sec=china-en-el-ojo-de-la-mineria-peruana', '2015-08-03', '0000-00-00', 1, 2, 3),
	(59, 'Ola de proyectos mineros para los pr&oacute;ximos 5 a&ntilde;os', '<p>El Ministerio de Energ&iacute;a y Minas inform&oacute; que tiene programado una cartera de 51 proyectos mineros para trabajar y las inversiones ascender&iacute;an a m&aacute;s de 63 mil millones de d&oacute;lares.</p>', '<p>El Ministerio de Energ&iacute;a y Minas inform&oacute; que tiene programado una cartera de 51 proyectos mineros para trabajar y las inversiones ascender&iacute;an a m&aacute;s de 63 mil millones de d&oacute;lares.</p>', 1, '', '', 'ola-de-proyectos-mineros-para-los-proximos-5-anos', '?sec=ola-de-proyectos-mineros-para-los-proximos-5-anos', '2015-08-03', '0000-00-00', 1, 2, 3),
	(61, 'El complemento perfecto para una miner&iacute;a segura', '<p>El Programa de Pasant&iacute;as Mineras brinda capacitaci&oacute;n a los l&iacute;deres y autoridades de los poblados donde se realizar&aacute;n las pr&oacute;ximas actividades mineras.</p>\r\n\r\n<p>Para lograr una miner&iacute;a responsable y segura, es importante mantener siempre informado y capacitado a su gente sobre los beneficios de esta. Por eso, con el fin de generar proyectos de confianza, el Ministerio de Energ&iacute;a y Minas (MEM), a trav&eacute;s del Programa de Pasant&iacute;as Mineras, instruy&oacute; entre el 2011 y 2015 a 2 mil 691 l&iacute;deres y autoridades de diferentes centros poblados, comunidades campesinas y caser&iacute;os de 19 regiones del pa&iacute;s donde se desarrolla o se tiene planificado desarrollar actividades mineras.</p>\r\n\r\n<p>Las regiones que participaron de esta importante capacitaci&oacute;n fueron: Amazonas, &Aacute;ncash, Apur&iacute;mac, Arequipa, Ayacucho, Cajamarca, Cusco, Huancavelica, Hu&aacute;nuco, Jun&iacute;n, La Libertad, Lambayeque, Lima, Moquegua, Pasco, Puno y Tacna. Eso s&iacute;, del total de participantes, 732 fueron capacitados en pasant&iacute;as mineras realizadas en Lima, mientras que el resto fue instruido a trav&eacute;s de 33 r&eacute;plicas de las pasant&iacute;as, organizadas en distintas provincias del pa&iacute;s.</p>\r\n\r\n<p>&ldquo;Adem&aacute;s de difundir las actividades de la miner&iacute;a moderna a las comunidades y pueblos donde se realiza o se tiene planificado realizar actividad minera, el objetivo general del Programa de Pasant&iacute;as Mineras es fortalecer la capacidad de los l&iacute;deres comunales y autoridades representativas, a fin de que implementen planes de gesti&oacute;n y de desarrollo, promoviendo el progreso sostenible de sus lugares de origen&rdquo;, se&ntilde;al&oacute; el director general de Miner&iacute;a del MEM, Marcos Villegas Aguilar.</p>\r\n\r\n<p>03 de agosto, 2015</p>', '<p>El Programa de Pasant&iacute;as Mineras brinda capacitaci&oacute;n a los l&iacute;deres y autoridades de los poblados donde se realizar&aacute;n las pr&oacute;ximas actividades mineras.</p>', 1, '1.jpg', '1.jpg', 'el-complemento-perfecto-para-una-mineria-segura', '?sec=el-complemento-perfecto-para-una-mineria-segura', '2015-08-03', '0000-00-00', 1, 2, 4),
	(62, 'Miner&iacute;a subterr&aacute;nea en acci&oacute;n', '<p>Ferreyros trae al Per&uacute; el cargador para miner&iacute;a subterr&aacute;nea m&aacute;s grande de Caterpillar</p>\r\n\r\n<p>La miner&iacute;a peruana se beneficia cada vez m&aacute;s con nuevas herramientas. Esta vez, Ferreyros se encarg&oacute; de contribuir con este importante sector, introduciendo al Per&uacute; el cargador de bajo perfil m&aacute;s grande de Caterpillar: el R3000H, siendo el primer pa&iacute;s minero en Latinoam&eacute;rica en recibirlo.</p>\r\n\r\n<p>Con la llegada de este equipo, que por cierto ya empez&oacute; a operar con &eacute;xito en la mina subterr&aacute;nea Cerro Lindo, de la Compa&ntilde;&iacute;a Minera Milpo, se ampl&iacute;an las herramientas mineras en el mercado nacional.</p>\r\n\r\n<p>Cabe resalar que Los cargadores de bajo perfil Caterpillar son l&iacute;deres en su segmento, de 4 yd3 a 11.6 yd3, con niveles de 88% de participaci&oacute;n de mercado, seg&uacute;n cifras anuales de importaci&oacute;n a mayo de 2015.</p>\r\n\r\n<p>Fuente: Difusi&oacute;n</p>\r\n\r\n<p>03 de agosto, 2015</p>', '<p>Ferreyros trae al Per&uacute; el cargador para miner&iacute;a subterr&aacute;nea m&aacute;s grande de Caterpillar</p>', 1, '11111111.jpg', '11111111.jpg', 'mineria-subterranea-en-accion', '?sec=mineria-subterranea-en-accion', '2015-08-03', '0000-00-00', 1, 2, 2),
	(63, 'Los drones entran en marcha', '<p>El Organismo Supervisor de la Inversi&oacute;n en Energ&iacute;a&nbsp;y Miner&iacute;a (Osinergmin) inici&oacute; su programa&nbsp;piloto para supervisar a la mediana y&nbsp;gran miner&iacute;a.</p>', '<p>El Organismo Supervisor de la Inversi&oacute;n en Energ&iacute;a&nbsp;y Miner&iacute;a (Osinergmin) inici&oacute; su programa&nbsp;piloto para supervisar a la mediana y&nbsp;gran miner&iacute;a.</p>', 1, '', '', 'los-drones-entran-en-marcha', '?sec=los-drones-entran-en-marcha', '0000-00-00', '0000-00-00', 1, 2, 3),
	(65, 'Proyecciones que enriquecen', '<p>El Ministerio de Energ&iacute;a y Minas (Minem) estima que&nbsp;este a&ntilde;o el sector minero crecer&iacute;a un 4%</p>', '<p>El Ministerio de Energ&iacute;a y Minas (Minem) estima que&nbsp;este a&ntilde;o el sector minero crecer&iacute;a un 4%</p>', 1, '', '', 'proyecciones-que-enriquecen', '?sec=proyecciones-que-enriquecen', '0000-00-00', '0000-00-00', 1, 2, 2),
	(67, 'Con miras de mayor producci&oacute;n de cobre para el 2016', '<p>El ministro de Energ&iacute;a y Minas, Eleodoro Mayorga, asegura que el Per&uacute; est&aacute; pr&oacute;ximo en&nbsp;convertirse en el segundo productor mundial de cobre en 2016</p>', '<p>El ministro de Energ&iacute;a y Minas, Eleodoro Mayorga, asegura que el Per&uacute; est&aacute; pr&oacute;ximo en&nbsp;convertirse en el segundo productor mundial de cobre en 2016</p>', 1, '', '', 'con-miras-de-mayor-produccion-de-cobre-para-el-2016', '?sec=con-miras-de-mayor-produccion-de-cobre-para-el-2016', '0000-00-00', '0000-00-00', 1, 2, 2),
	(69, 'Per&uacute; tiene potencial para llevar a cabo grandes proyectos mineros', '<p>Roque Benavides, presidente del Comit&eacute; Organizador&nbsp;de la 32&ordf; Convenci&oacute;n Minera (Perumin),&nbsp;asegura que la miner&iacute;a peruana&nbsp;contribuye cada vez&nbsp;m&aacute;s al desarrollo nacional.</p>\r\n\r\n<p>Arequipa se prepara para recibir la 32&ordf; Convenci&oacute;n&nbsp;Minera (Perumin), que se realizar&aacute; en&nbsp;setiembre, y junto con &eacute;l, se espera que&nbsp;este evento sirva de oportunidad para demostrar que&nbsp;la miner&iacute;a peruana contribuye al desarrollo nacional y que el Per&uacute; goza de&nbsp;un gran potencial&nbsp;para llevar a cabo grandes proyectos mineros, como&nbsp;es el caso de Cerro Verde, en Arequipa.</p>\r\n\r\n<p>&ldquo;Ser&aacute; la planta concentradora m&aacute;s grande del mundo,&nbsp;con una inversi&oacute;n de 4,600 millones de&nbsp;d&oacute;lares. A ello se suma que Arequipa&nbsp;es el departamento que m&aacute;s ha crecido en los &uacute;ltimos&nbsp;a&ntilde;os, lo que tiene que ver con la ampliaci&oacute;n de Cerro Verde, la&nbsp;construcci&oacute;n de centros&nbsp;comerciales, y la cantidad de industrias que proveen a las empresas mineras. Hay aspectos que&nbsp;pueden&nbsp;ser negativos, pero tambi&eacute;n se pueden enumerar muchos m&aacute;s que s&iacute; son positivos&rdquo;,&nbsp;asegur&oacute; Roque Benavides,&nbsp;presidente del Comit&eacute; Organizador de la 32&ordf; Convenci&oacute;n Minera&nbsp;(Perumin).</p>\r\n\r\n<p>Para lograr mejores resultados, Benavides tiene claro que el di&aacute;logo es la mejor herramienta&nbsp;para promover el concepto de miner&iacute;a&nbsp;segura entre todas las poblaciones. As&iacute; tambi&eacute;n,&nbsp;mientras las industrias provean mejores productos a&nbsp;las empresas&nbsp;mineras, se lograr&aacute; un&nbsp;mejor trabajo, como es el caso de EXSA con su tecnolog&iacute;a Quantex, que reduce el costo total&nbsp;de&nbsp;fragmentaci&oacute;n de roca en la miner&iacute;a de tajo abierto y la construcci&oacute;n.</p>\r\n\r\n<p>Mencionando adem&aacute;s, que a trav&eacute;s de la tecnolog&iacute;a Quantex, se reduce en 18% las emisiones&nbsp;de Gases de Efecto Invernadero&nbsp;(GEI)&nbsp;en su fase de uso, en comparaci&oacute;n a los productos&nbsp;tradicionales. &ldquo;Como l&iacute;deres en soluciones para el&nbsp;mercado de&nbsp;productos y servicios de&nbsp;fragmentaci&oacute;n de roca en el Per&uacute;, en EXSA estamos comprometidos con la protecci&oacute;n y&nbsp;sostenibilidad&nbsp;del medio ambiente, de una forma transversal e integral a toda nuestra cadena&nbsp;de valor y grupos de inter&eacute;s&rdquo;, sostuvo&nbsp;Karl Maslo,&nbsp;Gerente General de EXSA.</p>\r\n\r\n<p>Cabe recordar que este a&ntilde;o la 32&ordf; Convenci&oacute;n Minera&nbsp;(Perumin) reunir&aacute; a m&aacute;s de 100,000&nbsp;personas, entre estudiantes, profesionales y empresarios mineros procedentes de 50 pa&iacute;ses,&nbsp;las cuales se reunir&aacute;n en el campus de la Universidad Nacional de San Agust&iacute;n (UNSA), que se&nbsp;llevar&aacute; a cabo del 21 al 25 de setiembre.</p>\r\n\r\n<p>(Fuente: El Peruano</p>', '<p>Roque Benavides, presidente del Comit&eacute; Organizador&nbsp;de la 32&ordf; Convenci&oacute;n Minera (Perumin),&nbsp;asegura que la miner&iacute;a peruana&nbsp;contribuye cada vez&nbsp;m&aacute;s al desarrollo nacional.</p>', 1, '', '', 'peru-tiene-potencial-para-llevar-a-cabo-grandes-proyectos-mineros', '?sec=peru-tiene-potencial-para-llevar-a-cabo-grandes-proyectos-mineros', '0000-00-00', '0000-00-00', 1, 2, 2),
	(70, 'Per&uacute; en el puesto 30 del r&aacute;nking general de miner&iacute;a', '<p>El pa&iacute;s se impone a M&eacute;xico, Colombia, Ecuador y Bolivia en la tabla que mide el &Iacute;ndice de&nbsp;Competitividad Minera (ICM)</p>', '<p>El pa&iacute;s se impone a M&eacute;xico, Colombia, Ecuador y Bolivia en la tabla que mide el &Iacute;ndice de&nbsp;Competitividad Minera (ICM)</p>', 1, '', '', 'peru-en-el-puesto-30-del-ranking-general-de-mineria', '?sec=peru-en-el-puesto-30-del-ranking-general-de-mineria', '0000-00-00', '0000-00-00', 1, 2, 2),
	(71, 'Mujeres mineras apuestan por el desarrollo del turismo regional', '<p>La Asociaci&oacute;n Femenina Auxiliar al Instituto Americano de Ingenieros de Minas, Metal&uacute;rgica y&nbsp;Petr&oacute;leo busca &ldquo;resaltar la&nbsp;importancia de esta actividad para el desarrollo sostenible del&nbsp;pa&iacute;s&rdquo;.</p>\r\n\r\n<p>Ellas entran en acci&oacute;n. La Asociaci&oacute;n Femenina Auxiliar al Instituto Americano de Ingenieros de&nbsp;Minas, Metal&uacute;rgica y Petr&oacute;leo&nbsp;Metal&uacute;rgica y Petr&oacute;leo (WAAIME), present&oacute; el VIII Congreso&nbsp;Internacional sobre &ldquo;La Miner&iacute;a, Energ&iacute;a y Petr&oacute;leo&nbsp;impulsando el Turismo&rdquo;, que busca&nbsp;fomentar el desarrollo sostenible del pa&iacute;s, a trav&eacute;s del turismo en el sector minero.</p>\r\n\r\n<p>&ldquo;Las mujeres relacionadas con la miner&iacute;a en el Per&uacute;&nbsp;queremos no solo resaltar la importancia&nbsp;de esta actividad para el desarrollo&nbsp;sostenible del&nbsp;pa&iacute;s. Adem&aacute;s, es necesario que, con&nbsp;humildad, sigamos mejorando para lograr que la inversi&oacute;n en&nbsp;responsabilidad social se haga de&nbsp;manera sostenible, mediante la promoci&oacute;n de negocios como los relacionados con el turismo.&nbsp;Solo as&iacute; lograremos que se incrementen de manera sostenible los ingresos de las poblaciones&nbsp;rurales con las que&nbsp;interact&uacute;an las industrias minera, energ&eacute;tica y petrolera&rdquo;, dijo Mar&iacute;a Jes&uacute;s&nbsp;Baertl Presidenta de WAAIME Per&uacute;.</p>\r\n\r\n<p>&ldquo;Con nuestro Congreso (que se realiz&oacute; en abril del&nbsp;2015), esperamos poner en agenda el tema&nbsp;de la promoci&oacute;n del turismo por parte&nbsp;de las empresas que representamos&rdquo;, concluy&oacute; Isabel&nbsp;Arias, Presidenta del Comit&eacute; Organizador del VIII Congreso&nbsp;Internacional de Mujeres en&nbsp;Miner&iacute;a, Energ&iacute;a y Petr&oacute;leo.</p>\r\n\r\n<p>Fuente: Rumbo Minero</p>\r\n', '<p>La Asociaci&oacute;n Femenina Auxiliar al Instituto Americano de Ingenieros de Minas, Metal&uacute;rgica y&nbsp;Petr&oacute;leo busca &ldquo;resaltar la&nbsp;importancia de esta actividad para el desarrollo sostenible del&nbsp;pa&iacute;s&rdquo;.</p>', 1, '', '', 'mujeres-mineras-apuestan-por-el-desarrollo-del-turismo-regional', '?sec=mujeres-mineras-apuestan-por-el-desarrollo-del-turismo-regional', '0000-00-00', '0000-00-00', 1, 2, 2),
	(72, 'Una gran oportunidad de reconciliaci&oacute;n entre la Miner&iacute;a y la agricultura', '<p>El presidente de comit&eacute; organizador de Perumin, Roque Benavides, asegura que este&nbsp;importante evento servir&aacute; para mostrar la&nbsp;importancia en conjunto entre ambos sectores.</p>\r\n\r\n<p>La 32 Convenci&oacute;n Minera (Perumin) llega m&aacute;s prepara&nbsp;da que nunca en esta nueva edici&oacute;n,&nbsp;pues contar&aacute; con la participaci&oacute;n de una&nbsp;delegaci&oacute;n&nbsp;de caficultores asesorados por Sierra&nbsp;Exportadora, quienes ayudar&aacute;n a mostrar en este importante evento lo que se&nbsp;puede hacer&nbsp;con las riquezas naturales del Per&uacute; como el caf&eacute;, la quinua, entre otros productos&nbsp;agropecuarios.</p>\r\n\r\n<p>&ldquo;Es una magn&iacute;fica oportunidad para mostrar que la miner&iacute;a y la agricultura deben estar&nbsp;hermanadas y no discutir por el agua.&nbsp;Tenemos punto&nbsp;de encuentro, tanto los mineros como&nbsp;los agricultores, porque por ejemplo los mineros es&nbsp;t&aacute;n en &aacute;reas rurales&rdquo;, dijo Roque Benavides&nbsp;presidente de comit&eacute; organizador de Perumin, convenci&oacute;n minera que se llevar&aacute; a cabo del 21&nbsp;al 25&nbsp;de setiembre, en Arequipa.</p>\r\n\r\n<p>(FIN) LBH/JCC</p>\r\n', '<p>El presidente de comit&eacute; organizador de Perumin, Roque Benavides, asegura que este&nbsp;importante evento servir&aacute; para mostrar la&nbsp;importancia en conjunto entre ambos sectores.</p>', 1, '', '', 'una-gran-oportunidad-de-reconciliacion-entre-la-mineria-y-la-agricultura', '?sec=una-gran-oportunidad-de-reconciliacion-entre-la-mineria-y-la-agricultura', '0000-00-00', '0000-00-00', 1, 2, 2),
	(74, 'R&oacute;mulo Mucho: &ldquo;Se necesitan 1,500 millones de soles para formalizar la miner&iacute;', '<p>El l&iacute;der de la agrupaci&oacute;n Per&uacute; en Acci&oacute;n espera que con este monto los mineros artesanales empiecen a operar de acuerdo a m&aacute;rgenes de seguridad ambiental.</p>\r\n\r\n<p>&ldquo;Yo he estimado m&aacute;s o menos 1,500 millones de soles inicialmente para poder correr con el gasto del IGAC (Instrumento de Gesti&oacute;n Ambiental Correctivo), que llega a costar hasta 100 mil d&oacute;lares&rdquo;, asegur&oacute; el l&iacute;der de la agrupaci&oacute;n Per&uacute; en Acci&oacute;n, R&oacute;mulo Mucho, con el fin de formalizar a los mineros que operan al margen de la ley.</p>\r\n\r\n<p>En ese sentido, Mucho dijo que el Estado deber&iacute;a asumir inicialmente este monto a fin de que los mineros artesanales empiecen a operar de acuerdo a m&aacute;rgenes de seguridad ambiental establecidos por la normatividad e impulsando la econom&iacute;a local a su alrededor, pues conforme se formalicen progresivamente, los mineros artesanales empezar&aacute;n a pagar impuestos por sus operaciones en el sector extractivo.</p>\r\n\r\n<p>Fuente: Canaln.pe &ndash; La Hora N</p>', '<p>El l&iacute;der de la agrupaci&oacute;n Per&uacute; en Acci&oacute;n espera que con este monto los mineros artesanales empiecen a operar de acuerdo a m&aacute;rgenes de seguridad ambiental.</p>', 1, '', '', 'romulo-mucho-se-necesitan-1500-millones-de-soles-para-formalizar-la-mineria', '?sec=romulo-mucho-se-necesitan-1500-millones-de-soles-para-formalizar-la-mineria', '0000-00-00', '0000-00-00', 1, 2, 1),
	(75, 'La miner&iacute;a peruana demuestra todo su potencial', '<p>Inversi&oacute;n minera creci&oacute; 142% en &uacute;ltimos cuatro a&ntilde;os, alcanzando los US$ 34,020 millones</p>\r\n\r\n<p>&ldquo;El notable crecimiento acumulado en los &uacute;ltimos cuatro a&ntilde;os se sustenta en el gran potencial de la miner&iacute;a peruana. Estas inversiones se han dado en rubros tan distintos como infraestructura, explotaci&oacute;n de mina, equipamiento de planta, exploraci&oacute;n, equipamiento minero y preparaci&oacute;n de mina&rdquo;, dijo el director general del Ministerio de Energ&iacute;a y Minas (MEM), Marcos Villegas, tras conocerse que las inversiones mineras en el Per&uacute; crecieron en 142%.</p>\r\n\r\n<p>Este dato le otorga al sector minero un positiva inversi&oacute;n de US$ 34,020 millones, a comparaci&oacute;n con lo invertido entre el 2006 y 2011 (US$ 14,039 millones), inform&oacute; hoy la Direcci&oacute;n General de Miner&iacute;a (DGM) del Ministerio de Energ&iacute;a y Minas (MEM), aun as&iacute;, se espera tambi&eacute;n que a julio de 2016, el nivel de inversiones mineras realizadas en el actual gobierno alcance los US$ 42,610 millones, triplicando la inversi&oacute;n obtenida en la gesti&oacute;n anterior.</p>\r\n\r\n<p>No obstante, con la ejecuci&oacute;n de los proyectos mineros en cartera, se espera duplicar la producci&oacute;n actual de cobre, asegurando recursos para que este y los siguientes gobiernos puedan implementar y continuar los programas sociales que la poblaci&oacute;n necesita. &ldquo;Adem&aacute;s, ser&aacute; una gran oportunidad de desarrollo para los pueblos m&aacute;s alejados del pa&iacute;s, all&iacute; donde se desarrolla actividad minera moderna&rdquo;, dijo Villegas.</p>\r\n\r\n<p>(Fuente: Gesti&oacute;n)</p>\r\n\r\n<p>03 de agosto, 2015.</p>', '<p>Inversi&oacute;n minera creci&oacute; 142% en &uacute;ltimos cuatro a&ntilde;os, alcanzando los US$ 34,020 millones</p>', 1, '', '', 'la-mineria-peruana-demuestra-todo-su-potencial', '?sec=la-mineria-peruana-demuestra-todo-su-potencial', '2015-08-03', '0000-00-00', 1, 2, 3),
	(76, 'Miner&iacute;a e Hidrocarburos en lo m&aacute;s alto', '<p>El INEI report&oacute; que la producci&oacute;n de este importante sector aument&oacute; en 10.33%, alcanzando en junio la tasa m&aacute;s alta en lo que va del a&ntilde;o</p>\r\n\r\n<p>La producci&oacute;n del sector Miner&iacute;a e Hidrocarburos super&oacute; su marca del a&ntilde;o pasado, pues seg&uacute;n&nbsp; el Instituto Nacional de Estad&iacute;stica e Inform&aacute;tica (INEI), este aument&oacute; en 10.33% en el mes de junio, gracias al subsector de miner&iacute;a met&aacute;lica (14.15 por ciento), logrando obtener la tasa m&aacute;s alta en lo que va del a&ntilde;o.</p>\r\n\r\n<p>Esto debido a la mayor producci&oacute;n de cobre (17.13%), oro (6.97%), zinc (14.05%), plata (6.99%), molibdeno (43.66%) y plomo (11.90%), impulsada por el ingreso de nuevas unidades mineras (polimet&aacute;licas) como Chinalco-Toromocho y Hudbay Per&uacute;. En tanto, la producci&oacute;n de hierro disminuy&oacute; (-6.42 por ciento) y esta&ntilde;o (-17.87).</p>\r\n\r\n<p>Cabe mencionar que la producci&oacute;n del subsector hidrocarburos disminuy&oacute; en 3.42 por ciento por la menor producci&oacute;n de petr&oacute;leo crudo (-23.47 por ciento); sin embargo, creci&oacute; la producci&oacute;n de l&iacute;quidos de gas natural (2.21) y gas natural (21.46).</p>\r\n\r\n<p>(FIN) JCC/JCC</p>\r\n\r\n<p>03 de agosto, 2015.</p>', '<p>El INEI report&oacute; que la producci&oacute;n de este importante sector aument&oacute; en 10.33%, alcanzando en junio la tasa m&aacute;s alta en lo que va del a&ntilde;o</p>', 1, '', '', 'mineria-e-hidrocarburos-en-lo-mas-alto', '?sec=mineria-e-hidrocarburos-en-lo-mas-alto', '2015-08-03', '0000-00-00', 1, 2, 2),
	(77, 'Procesos m&aacute;s simples para una miner&iacute;a formal', '<p>El Ministerio de Energ&iacute;a y Minas implementa nuevas acciones para mejorar la formalizaci&oacute;n en el sector minero</p>\r\n\r\n<p>Con el fin de simplificar el proceso de formalizaci&oacute;n minera y dinamizar los tr&aacute;mites que realizan los mineros informales en todas las regiones, el Ministerio de Energ&iacute;a y Minas dispuso la reestructuraci&oacute;n del sistema de informaci&oacute;n de la ventanilla &uacute;nica.</p>\r\n\r\n<p>Con esta reestructuraci&oacute;n del sistema, se espera mejorar la atenci&oacute;n hacia los administrados y agilizar los tr&aacute;mites que realizan los mineros informales a trav&eacute;s de la ventanilla &uacute;nica, asegur&oacute; Paca Palao, coordinador nacional de esta ventanilla &uacute;nica.</p>\r\n\r\n<p>&ldquo;Se han generado diversos documentos para poder darle ese dinamismo a la ventanilla &uacute;nica, tanto en los procedimientos de evaluaci&oacute;n y algunas mejoras sustanciales en el tema de seguridad del sistema. Por ende, queremos que esta informaci&oacute;n sea estandarizada en todo el pa&iacute;s, sobre todo al personal que labora en ventanilla &uacute;nica&rdquo;, agreg&oacute; Palao.</p>\r\n\r\n<p>03 de agosto, 2015.</p>\r\n', '<p>El Ministerio de Energ&iacute;a y Minas implementa nuevas acciones para mejorar la formalizaci&oacute;n en el sector minero</p>', 1, '', '', 'procesos-mas-simples-para-una-mineria-formal', '?sec=procesos-mas-simples-para-una-mineria-formal', '2015-08-03', '0000-00-00', 1, 2, 2),
	(79, 'Alianzas estrat&eacute;gicas para acabar con lo ilegal', '<p>Per&uacute; se une a Colombia, Ecuador y Bolivia para combatir juntos la miner&iacute;a ilegal en dichos pa&iacute;ses</p>\r\n\r\n<p>&ldquo;Como ocurre con el narcotr&aacute;fico, la miner&iacute;a ilegal tiene una gran magnitud. Para ello ten&iacute;amos que buscar aliados estrat&eacute;gicos (Colombia, Ecuador y Bolivia) y lo hemos hecho. Tenemos una comisi&oacute;n t&eacute;cnica de trabajo con Ecuador, tambi&eacute;n con Bolivia y con Colombia. Nos falta cerrar el tema con Brasil&rdquo;, detall&oacute; el alto comisionado en asuntos de formalizaci&oacute;n de la miner&iacute;a, interdicci&oacute;n de la miner&iacute;a ilegal y remediaci&oacute;n ambiental, Antonio Fern&aacute;ndez.</p>\r\n\r\n<p>Con esta importante alianza entre Per&uacute;, Colombia, Ecuador y Bolivia, se coordinar&aacute;n acciones simult&aacute;neas contra la miner&iacute;a ilegal, pues dichos pa&iacute;ses compartir&aacute;n informaci&oacute;n importante sobre la materia, para as&iacute; establecer comisiones t&eacute;cnicas y grupos ad hoc, con miras a ejecutar labores de interdicci&oacute;n de manera paralela.</p>\r\n\r\n<p>Cabe resaltar que la viceministra de Seguridad de Ecuador, Natalia C&aacute;rdenas, comparti&oacute; con el pa&iacute;s, hace algunos d&iacute;as, valiosa informaci&oacute;n para empezar a combatir esta il&iacute;cita activad.</p>\r\n\r\n<p>MVF/FHG</p>\r\n\r\n<p>03 de agosto, 2015.</p>', '<p>Per&uacute; se une a Colombia, Ecuador y Bolivia para combatir juntos la miner&iacute;a ilegal en dichos pa&iacute;ses</p>', 1, '', '', 'alianzas-estrategicas-para-acabar-con-lo-ilegal', '?sec=alianzas-estrategicas-para-acabar-con-lo-ilegal', '2015-08-03', '0000-00-00', 1, 2, 2),
	(80, 'Miner&iacute;a peruana firme ante la ca&iacute;da del oro', '<p>El oro se encuentra debajo de los US$ 1,000 y el sector minero del Per&uacute; est&aacute; listo para resistirlo.</p>\r\n\r\n<p>Las empresas mineras del mundo se encuentran preparadas para resistir el oro debajo de los US$ 1,000, y las firmas mineras peruanas no se quedan atr&aacute;s, pues seg&uacute;n Jos&eacute; Miguel Morales, expresidente de la Sociedad Nacional de Miner&iacute;a, Petr&oacute;leo y Energ&iacute;a (SNMPE), asegura que la gran ventaja de nuestro pa&iacute;s es que la energ&iacute;a en el Per&uacute; es barata y, adem&aacute;s, limpia.</p>\r\n\r\n<p>&ldquo;Nosotros estamos en mejores condiciones que las firmas extranjeras porque tenemos un insumo muy importante que es la energ&iacute;a, bastante m&aacute;s barata, entonces s&iacute;, estamos preparados para soportar precios del oro debajo de los US$ 1,000&rdquo;, dijo el expresidente de la SNMPE. Este costo -estim&oacute;- representa el 25% del total de costos directos para las empresas mineras, mientras que un 40% es mano de obra y el resto son otros insumos.</p>\r\n\r\n<p>Cabe mencionar que la cotizaci&oacute;n internacional del oro cerr&oacute; la semana pasada en US$ 1,095 por onza. Esta lectura es su punto m&aacute;s bajo desde diciembre del 2009; a&ntilde;o en que la crisis internacional afect&oacute; fuertemente a los mercados financieros y de bienes. Aun as&iacute;, la miner&iacute;a peruana se encuentra preparada para resistirlo.</p>\r\n\r\n<p>(Gesti&oacute;n)</p>\r\n\r\n<p>24.08.2015</p>\r\n', '<p>El oro se encuentra debajo de los US$ 1,000 y el sector minero del Per&uacute; est&aacute; listo para resistirlo.</p>', 1, '', '', 'mineria-peruana-firme-ante-la-caida-del-oro', '?sec=mineria-peruana-firme-ante-la-caida-del-oro', '2015-08-24', '0000-00-00', 1, 2, 2),
	(81, 'Una nueva forma de comunicaci&oacute;n entre la prensa y el sector minero', '<p>El Ministerio de Energ&iacute;a y Minas otorg&oacute; talleres informativos a periodistas de las ciudades de Lima, Arequipa, Cusco, Puno, Cajamarca, Tacna, Moquegua, Ilo, Huaraz y Trujillo.</p>\r\n\r\n<p>Con la idea de estrechar mejores v&iacute;nculos con los representantes de la prensa peruana, el Ministerio de Energ&iacute;a y Minas llev&oacute; a cabo un ciclo de talleres informativos para que los periodistas del pa&iacute;s conozcan detalles sobre el desarrollo de la actividad minera en sus respectivas regiones, as&iacute; como la normatividad e instrumentos de gesti&oacute;n ambiental aplicados en los proyectos mineros que ejecutan las empresas extractivas en su jurisdicci&oacute;n.</p>\r\n\r\n<p>&ldquo;Estos di&aacute;logos abiertos con los periodistas forman parte de la nueva pol&iacute;tica comunicativa del Ministerio de Energ&iacute;a y Minas, a fin de estrechar v&iacute;nculos con los medios de comunicaci&oacute;n de todo el pa&iacute;s. Este ciclo de talleres que acaba de concluir confirma la necesidad de mantener este acercamiento para fomentar un adecuado conocimiento de la actividad minera y entregar a la poblaci&oacute;n una informaci&oacute;n precisa y objetiva del sector minero&rdquo;, enfatiz&oacute; el viceministro de Minas, Guillermo Shinno Huaman&iacute;.</p>\r\n\r\n<p>Cabe mencionar los talleres tuvieron una gran acogida en la prensa, pues lograron un total de 260 periodistas instruidos, permitiendo despejar sus dudas y, sobre todo, mitos de la actividad minera.</p>\r\n\r\n<p>Fuente: (Correo)</p>\r\n\r\n<p>24.08.2015</p>', '<p>El Ministerio de Energ&iacute;a y Minas otorg&oacute; talleres informativos a periodistas de las ciudades de Lima, Arequipa, Cusco, Puno, Cajamarca, Tacna, Moquegua, Ilo, Huaraz y Trujillo.</p>', 1, '', '', 'una-nueva-forma-de-comunicacion-entre-la-prensa-y-el-sector-minero', '?sec=una-nueva-forma-de-comunicacion-entre-la-prensa-y-el-sector-minero', '2015-08-24', '0000-00-00', 1, 2, 2),
	(82, 'Las Rutas del Oro: documental sobre la miner&iacute;a ilegal en la Amazon&iacute;a entra en acci&oacute;n', '<p>Se estren&oacute; el primer webdocumental sobre esta il&iacute;cita actividad en la Amazon&iacute;a del Per&uacute;, Ecuador y Brasil.</p>\r\n\r\n<p>Grandes sucesos sobre la miner&iacute;a ilegal est&aacute;n punto de ocurrir y el protagonista puede ser cualquiera.&nbsp; A&nbsp; trav&eacute;s de este webdocumental: Las Rutas del Oro (que estar&aacute; disponible solo a trav&eacute;s del sitio web&nbsp;<a href="http://www.lasrutasdeloro.com/" rel="nofollow">http://www.lasrutasdeloro.com</a>), el p&uacute;blico en general podr&aacute; participar de esta problem&aacute;tica, tras conocer los lugares donde la miner&iacute;a ilegal ha causado graves impactos.</p>\r\n\r\n<p>El usuario podr&aacute; conocer la opini&oacute;n de expertos y afectados de pa&iacute;ses como Brasil, Ecuador, Colombia, Bolivia y Per&uacute;, e incluso decidir&aacute; los temas que m&aacute;s le interesan y el orden en el que quiere ver el contenido de la actividad minera, desde la extracci&oacute;n hasta su comercializaci&oacute;n.</p>\r\n\r\n<p>Este documental, proyecto de la Sociedad Peruana de Derecho Ambiental (SPDA) y IUCN Holanda, le mostrar&aacute; al usuario c&oacute;mo operan las dragas en Brasil, c&oacute;mo se comercializa oro ilegal en la frontera con Bolivia y c&oacute;mo es que un solo soldado protege la frontera con Ecuador y vigila a los mineros ilegales extranjeros que pasan a territorio peruano.</p>\r\n\r\n<p>(Fuente: Gesti&oacute;n)</p>\r\n\r\n<p>24.08.2015</p>\r\n', '<p>Se estren&oacute; el primer webdocumental sobre esta il&iacute;cita actividad en la Amazon&iacute;a del Per&uacute;, Ecuador y Brasil.</p>', 1, 'amazonia.jpg', 'amazonia.jpg', 'las-rutas-del-oro-documental-sobre-la-mineria-ilegal-en-la-amazonia-entra-en-accion', '?sec=las-rutas-del-oro-documental-sobre-la-mineria-ilegal-en-la-amazonia-entra-en-accion', '2015-08-24', '0000-00-00', 1, 2, 2),
	(83, 'Juntos por la miner&iacute;a', '<p>El Ministerio de Energ&iacute;a y Minas se reuni&oacute; con el Ministerio P&uacute;blico para hablar acerca de la Estrategia de Saneamiento en la peque&ntilde;a miner&iacute;a y miner&iacute;a artesanal.</p>\r\n\r\n<p>Se dice que las estrechas relaciones ayudan a crear una mejor visi&oacute;n. Es as&iacute; que el Ministerio de Energ&iacute;a y Minas (MEM), a trav&eacute;s de la Direcci&oacute;n General de Formalizaci&oacute;n Minera (DGFM),&nbsp; convoc&oacute; a ochenta funcionarios pertenecientes a las Fiscal&iacute;as Especializas en Materia Ambiental, Anticorrupci&oacute;n y de Lavado de Activos, para que hablaran a fondo sobre la Estrategia de Saneamiento de la Peque&ntilde;a Miner&iacute;a y Miner&iacute;a Artesanal y su normativa complementaria.</p>\r\n\r\n<p>&ldquo;M&aacute;s que una capacitaci&oacute;n es una interacci&oacute;n entre ambas instituciones &ndash;Ministerio P&uacute;blico y MEM- y ver, c&oacute;mo en el futuro podemos trabajar m&aacute;s coordinado para lograr el objetivo de la formalizaci&oacute;n de los mineros artesanales y la interdicci&oacute;n de los mineros ilegales&rdquo;, asegur&oacute; el viceministro de Minas, Guillermo Shinno Huamani, tras inaugurar el evento en el auditorio de la sede del MEM, en San Borja.</p>\r\n\r\n<p>Asimismo, la Dra. Alessandra Herrera Jara, directora de la DGFM, sostuvo que esta capacitaci&oacute;n generar&iacute;a un trabajo en conjunto entre los funcionarios de ambas instituciones participantes.</p>\r\n\r\n<p>Fuente: Prensa MEM</p>\r\n\r\n<p>24.08.2015</p>', '<p>El Ministerio de Energ&iacute;a y Minas se reuni&oacute; con el Ministerio P&uacute;blico para hablar acerca de la Estrategia de Saneamiento en la peque&ntilde;a miner&iacute;a y miner&iacute;a artesanal.</p>', 1, 'captura-de-pantalla-2015-08-24-a-las-12-46-16.png', 'captura-de-pantalla-2015-08-24-a-las-12-46-16.png', 'juntos-por-la-mineria', '?sec=juntos-por-la-mineria', '2015-08-24', '0000-00-00', 1, 2, 1),
	(84, 'M&aacute;s seguros que nunca', '<p>La miner&iacute;a peruana apuesta por los mejores Equipos de Protecci&oacute;n Personal.</p>\r\n\r\n<p>Hablar de miner&iacute;a en Per&uacute;, es hablar de una cultura de Salud y Seguridad. Y es que seg&uacute;n Oscar Pizarro, director comercial de 3M Per&uacute;, nuestro pa&iacute;s se preocupa cada vez m&aacute;s por los equipos de protecci&oacute;n personal (EPP) en el trabajo minero, pues gracias a ello, el Per&uacute; contin&uacute;a avanzando y creciendo de manera productiva y segura.</p>\r\n\r\n<p>&ldquo;Los productos que contribuyan a la seguridad, salud ocupacional y medio ambiente, tienen que ser cada vez m&aacute;s innovadores, porque ayudan a elevar la calidad y productividad de las operaciones mineras&rdquo;, explic&oacute; Manuel Ocssa, l&iacute;der de las ventas de MSA, quien adem&aacute;s asegur&oacute; que &ldquo;el Per&uacute; tiene un alt&iacute;simo nivel en seguridad laboral&rdquo;.</p>\r\n\r\n<p>En tanto, Oscar Pizarro recuerda que el boom de la seguridad y salud en el trabajo se origin&oacute; gracias a las empresas transnacionales, pues estas influyeron de manera positiva a las empresas mineras y contratistas locales, logrando imitar este est&aacute;ndar para trabajar con las compa&ntilde;&iacute;as extranjeras. &ldquo;Desde ah&iacute; se empieza a generar un mejor nivel en la seguridad y salud en dicho sector del trabajo&rdquo;.</p>\r\n\r\n<p>24.08.2015</p>', '<p>La miner&iacute;a peruana apuesta por los mejores Equipos de Protecci&oacute;n Personal.</p>', 1, 'captura-de-pantalla-2015-08-24-a-las-12-43-41.png', 'captura-de-pantalla-2015-08-24-a-las-12-43-41.png', 'mas-seguros-que-nunca', '?sec=mas-seguros-que-nunca', '2015-08-24', '0000-00-00', 1, 2, 4),
	(86, 'Mineros ilegales cumplir&aacute; conden', '<p>Por primera vez el Per&uacute; sentencia a prisi&oacute;n suspendida a personas involucradas con la miner&iacute;a ilegal.</p>\r\n\r\n<p>El Juzgado de Investigaci&oacute;n Preparatoria Transitoria Ambiental con sede en el Cusco, sentenci&oacute; a cuatro a&ntilde;os de pena privativa de la libertad con car&aacute;cter suspendido, a siete mineros ilegales que ejerc&iacute;an dicha actividad en el distrito de Ananea, en Puno.</p>\r\n\r\n<p>Adem&aacute;s de los cuatro a&ntilde;os de pena privativa suspendida, por el delito de miner&iacute;a ilegal, cada uno de ellos deber&aacute; abonar la suma de S/. 38.700 nuevos soles, obedeciendo tambi&eacute;n algunas reglas de conducta por el tiempo que dura la condena.</p>\r\n\r\n<p>Como se recuerda, el pasado 4 de marzo de este a&ntilde;o todos los sentenciados fueron hallados en plena faena de trabajo minero ilegal durante una operaci&oacute;n de interdicci&oacute;n antiminera ejecutada por disposici&oacute;n de la Fiscal&iacute;a Ambiental de Puno en el sector La Pampilla, jurisdicci&oacute;n del distrito de Ananea.</p>\r\n\r\n<p>Fuente: El Comercio.</p>\r\n\r\n<p>24.08.2015</p>', '<p>Por primera vez el Per&uacute; sentencia a prisi&oacute;n suspendida a personas involucradas con la miner&iacute;a ilegal.</p>', 1, 'captura-de-pantalla-2015-08-24-a-las-12-35-12.png', 'captura-de-pantalla-2015-08-24-a-las-12-35-12.png', 'mineros-ilegales-cumpliran-condena', '?sec=mineros-ilegales-cumpliran-condena', '2015-08-24', '0000-00-00', 1, 2, 2),
	(87, 'Mujeres del futuro en las industrias de energ&iacute;a, miner&iacute;a e hidrocarburo', '<p>Ejecutivos de las industrias de miner&iacute;a, hidrocarburos, energ&iacute;a y relacionados, aseguran que la participaci&oacute;n de las mujeres en esos sectores ser&aacute; mayor en los pr&oacute;ximos 10 a&ntilde;os.</p>\r\n\r\n<p>&ldquo;Si bien este tipo de industrias siempre ha sido vinculado con hombres, me ha sorprendido gratamente ubicar a m&aacute;s de 200 ejecutivas peruanas de segunda l&iacute;nea de reporte tan bien posicionadas. Y es un hecho que ser&aacute;n cada vez m&aacute;s las profesionales peruanas que se abrir&aacute;n camino en estas industrias&rdquo;, dijo Beatriz Boza, Socia de Gobernanza y Sostenibilidad Corporativa de EY, tras realizar el estudio &ldquo;El ADN del Profesional del Futuro&rdquo;.</p>\r\n\r\n<p>A pesar que el porcentaje de mujeres que conforman el directorio de las industrias de energ&iacute;a y ciencias de la tierra en el Per&uacute; es bajo, pues el 67% de los ejecutivos encuestados sostuvo que menos de 10% del directorio de sus empresas es conformado por mujeres, Boza asegura que la tendencia ser&iacute;a creciente en el transcurso de los pr&oacute;ximos 10 a&ntilde;os.</p>\r\n\r\n<p>Cabe mencionar que de acuerdo al estudio &ldquo;Talento en la mesa: &Iacute;ndice de mujeres en energ&iacute;a 2015&rdquo;, las empresas de energ&iacute;a con mayor diversidad (mayor n&uacute;mero de mujeres en el directorio) alcanzaban un retorno sobre el capital (ROE) mayor en 1,5% que las empresas del sector con menos diversidad en su directorio.</p>\r\n\r\n<p>Fuente: El Economista</p>\r\n\r\n<p>24.08.2015</p>\r\n', '<p>Ejecutivos de las industrias de miner&iacute;a, hidrocarburos, energ&iacute;a y relacionados, aseguran que la participaci&oacute;n de las mujeres en esos sectores ser&aacute; mayor en los pr&oacute;ximos 10 a&ntilde;os.</p>', 1, 'captura-de-pantalla-2015-08-24-a-las-12-31-59.png', 'captura-de-pantalla-2015-08-24-a-las-12-31-59.png', 'mujeres-del-futuro-en-las-industrias-de-energia-mineria-e-hidrocarburo', '?sec=mujeres-del-futuro-en-las-industrias-de-energia-mineria-e-hidrocarburo', '2015-08-24', '0000-00-00', 1, 2, 2),
	(88, 'El &lsquo;empujoncito&rsquo; que necesitan los proyectos mineros', '<p>El presidente de la Compa&ntilde;&iacute;a de Minas Buenaventura, Roque Benavides, asegur&oacute; que el Per&uacute; cuenta con proyectos &ldquo;bien estructurados&rdquo; y solo necesitan respaldo del Gobierno.</p>\r\n\r\n<p>Lo bueno se apoya y Roque Benavides, presidente de la Compa&ntilde;&iacute;a de Minas Buenaventura, lo sabe perfectamente.&nbsp; &ldquo;Hay proyectos mineros bien estructurados que deben recibir el respaldo del Gobierno, por ello felicit&oacute; al ministro de Econom&iacute;a, Alonso Segura, que se salga en defensa de estos proyectos&rdquo;, dijo, afirmando tambi&eacute;n que estos contribuyen al desarrollo del pa&iacute;s.</p>\r\n\r\n<p>Pues cabe recordar que el ministro de Econom&iacute;a, Alonso Segura, manifest&oacute; que la voluntad pol&iacute;tica del Gobierno pasa por apoyar los proyectos mineros serios y que generen desarrollo, por lo que en esa labor se est&aacute; trabajando con la finalidad de permitir que se concreten. En ese sentido, Benavides indic&oacute; que los proyectos mineros serios permitir&aacute;n que la econom&iacute;a y las obras de construcci&oacute;n consigan un mayor crecimiento.</p>\r\n\r\n<p>&ldquo;Hay una cartera de proyectos mineros que est&aacute;n en el orden de los 30,000 millones de d&oacute;lares y que por supuesto se van a realizar en el corto plazo&rdquo;, dijo, a&ntilde;adiendo que si se le dar&iacute;a el valor necesario, estas &ldquo;realmente contribuir&iacute;an enormemente al desarrollo, especialmente, de las zona rurales y alto andinas de la patria&rdquo;.</p>\r\n\r\n<p>(FIN) LBH/JCC</p>\r\n\r\n<p>24.08.2015</p>', '<p>El presidente de la Compa&ntilde;&iacute;a de Minas Buenaventura, Roque Benavides, asegur&oacute; que el Per&uacute; cuenta con proyectos &ldquo;bien estructurados&rdquo; y solo necesitan respaldo del Gobierno.</p>', 1, 'captura-de-pantalla-2015-08-24-a-las-12-38-10.png', 'captura-de-pantalla-2015-08-24-a-las-12-38-10.png', 'el-empujoncito-que-necesitan-los-proyectos-mineros', '?sec=el-empujoncito-que-necesitan-los-proyectos-mineros', '2015-08-24', '0000-00-00', 1, 2, 2),
	(89, 'Miner&iacute;a ilegal en el ojo de la tormenta', '<p>La Superintendencia Nacional de Aduanas y de Administraci&oacute;n Tributaria (Sunat) incaut&oacute; 30&nbsp;kilos de mercurio destinados a la&nbsp;miner&iacute;a ilegal</p>', '<p>La Superintendencia Nacional de Aduanas y de Administraci&oacute;n Tributaria (Sunat) incaut&oacute; 30&nbsp;kilos de mercurio destinados a la&nbsp;miner&iacute;a ilegal</p>', 1, 'captura-de-pantalla-2015-08-24-a-las-12-28-17.png', 'captura-de-pantalla-2015-08-24-a-las-12-28-17.png', 'mineria-ilegal-en-el-ojo-de-la-tormenta', '?sec=mineria-ilegal-en-el-ojo-de-la-tormenta', '0000-00-00', '0000-00-00', 1, 2, 2),
	(90, 'Gold Oil preparado para invertir US$ 54.60 millones en exploraci&oacute;n del Lote XXI de Piura', '<p>Ministerio de Energ&iacute;a y Minas aprob&oacute; el Estudio de Impacto Ambiental del proyecto de &ldquo;Prospecci&oacute;n S&iacute;smica 2D y Perforaci&oacute;n de 30 Pozos Exploratorios en el Lote XXI&rdquo;.</p>\r\n\r\n<p>La Direcci&oacute;n General de Asuntos Ambientales Energ&eacute;ticos (DGAAE) del Ministerio de Energ&iacute;a y Minas dio el visto bueno para que la empresa Gold Oil Per&uacute; empiece el Estudio de Impacto Ambiental del proyecto de &ldquo;Prospecci&oacute;n S&iacute;smica 2D y Perforaci&oacute;n de 30 Pozos Exploratorios en el Lote XXI (ubicado en la provincia de Piura)&rdquo;, llev&aacute;ndoles a invertir US$ 54.60 millones.</p>\r\n\r\n<p>En ese sentido, la mano de obra que requerir&aacute; Gold Oil Per&uacute; ser&aacute; de 164 personas para la fase de s&iacute;smica 2D, de las cuales 132 ser&aacute;n de origen local (35 ser&aacute;n mano de obra especializada y 97 no especializada), mientras que 32 trabajadores no ser&aacute;n de la localidad. En tanto, para la fase de perforaci&oacute;n de 30 pozos exploratorios se necesitar&aacute;n 67 trabajadores, de los cuales 57 ser&aacute;n fuerza laboral local y 10 no local.</p>\r\n\r\n<p>De esta manera, el Proyecto de Prospecci&oacute;n de S&iacute;smica 2D abarcar&aacute; un total de 64 l&iacute;neas s&iacute;smicas e involucra la realizaci&oacute;n de cuatro etapas principales: Movilizaci&oacute;n, Construcci&oacute;n, Operaci&oacute;n y Abandono. La misma cantidad de etapas tendr&aacute; la fase de perforaci&oacute;n de 30 pozos exploratorios.</p>\r\n\r\n<p>(Fuente: Gesti&oacute;n)</p>\r\n\r\n<p>24.08.2015</p>', '<p>Ministerio de Energ&iacute;a y Minas aprob&oacute; el Estudio de Impacto Ambiental del proyecto de &ldquo;Prospecci&oacute;n S&iacute;smica 2D y Perforaci&oacute;n de 30 Pozos Exploratorios en el Lote XXI&rdquo;.</p>', 1, 'captura-de-pantalla-2015-08-24-a-las-12-21-35.png', 'captura-de-pantalla-2015-08-24-a-las-12-21-35.png', 'gold-oil-preparado-para-invertir-us-54-60-millones-en-exploracion-del-lote-xxi-de-piura', '?sec=gold-oil-preparado-para-invertir-us-54-60-millones-en-exploracion-del-lote-xxi-de-piura', '2015-08-24', '0000-00-00', 1, 2, 1),
	(91, 'Se extiende la exploraci&oacute;n del Lote 76', '<p>El Ministerio de Energ&iacute;a y Minas (MEM) otorga tres a&ntilde;os m&aacute;s de exploraci&oacute;n del Lote 76, ubicado entre las provincias de Madre de Dios, Cusco y Puno.</p>\r\n\r\n<p>El lote que fue entregado en concesi&oacute;n el 6 de octubre del 2005, fecha en que se aprob&oacute; la Cesi&oacute;n de Posici&oacute;n Contractual del Contrato de Licencia para la Exploraci&oacute;n y Explotaci&oacute;n de Hidrocarburos a favor de Hunt Oil, seguir&aacute; siendo explorada por tres a&ntilde;os m&aacute;s, seg&uacute;n anunci&oacute; el Ministerio de Energ&iacute;a y Minas (MEM).</p>\r\n\r\n<p>En tal sentido, la fase de exploraci&oacute;n del Lote 76, ubicado entre las provincias de Manu y Tambopata (Madre de Dios), Paucartambo y Quispicanchi (Cusco) y Carabaya (Puno), otorga la autorizaci&oacute;n a Petroper&uacute; para suscribir con las empresas Hunt Oil Exploration and Production Company of Peru, Sucursal del Per&uacute;, Pluspetro Peru Corporation y Hunt Oil Company of Peru, Sucursal del Per&uacute;, la modificaci&oacute;n del Contrato de Licencia para la Exploraci&oacute;n y Explotaci&oacute;n de Hidrocarburos en el Lote 76.</p>\r\n\r\n<p>(Fuente: Andina)</p>\r\n\r\n<p>24.08.2015</p>', '<p>El Ministerio de Energ&iacute;a y Minas (MEM) otorga tres a&ntilde;os m&aacute;s de exploraci&oacute;n del Lote 76, ubicado entre las provincias de Madre de Dios, Cusco y Puno.</p>', 1, 'captura-de-pantalla-2015-08-24-a-las-12-13-20.png', 'captura-de-pantalla-2015-08-24-a-las-12-13-20.png', 'se-extiende-la-exploracion-del-lote-76', '?sec=se-extiende-la-exploracion-del-lote-76', '2015-08-24', '0000-00-00', 1, 2, 2),
	(92, '&iexcl;Preparados y bien armados!', '<p>Autoridades y pobladores de la comunidad de Oxapampa fueron capacitados para reconocer los efectos negativos de la miner&iacute;a ilegal.</p>\r\n\r\n<p>No hay nada mejor que estar bien preparados ante cualquier ataque, como es el caso de la miner&iacute;a ilegal, que tiene como fin destruir todo a su alrededor. Es por ello que autoridades y pobladores de la comunidad de Oxapampa, fueron capacitados por el Servicio Nacional de &Aacute;reas Naturales Protegidas por el Estado (Sernanp), en la implementaci&oacute;n de estrategias frente a la miner&iacute;a ilegal en la reserva comunal El Sira.&nbsp;</p>\r\n\r\n<p>Para esto, se llev&oacute; el taller &ldquo;Marco Jur&iacute;dico de la Miner&iacute;a en el Per&uacute;, da&ntilde;os ambientales y a la salud por la miner&iacute;a ilegal&rdquo; en la comunidad nativa de San Francisco de Cahuapanas (Oxapampa), ubicada en la zona de amortiguamiento de la reserva comunal El Sira. Dicho taller les permiti&oacute; conocer el marco jur&iacute;dico de la actividad minera en nuestro pa&iacute;s, enfocado en la gesti&oacute;n de las &aacute;reas protegidas y las competencias del Sernanp en el proceso de formalizaci&oacute;n minera.</p>\r\n\r\n<p>Con esto, se busca generar conciencia entre la poblaci&oacute;n local sobre los efectos negativos a la salud y el ambiente que ocasiona la miner&iacute;a ilegal, as&iacute; como las oportunidades de desarrollar otras actividades sostenibles en el &aacute;mbito de la Reserva y su zona de amortiguamiento.</p>\r\n\r\n<p><a href="http://www.andina.com.pe/agencia/noticia-implementaran-estrategia-frente-a-mineria-ilegal-reserva-comunal-sira-571306.aspx">http://www.andina.com.pe/agencia/noticia-implementaran-estrategia-frente-a-mineria-ilegal-reserva-comunal-sira-571306.aspx</a></p>\r\n\r\n<p>(FIN) NDP/LIT</p>\r\n\r\n<p>25.08.2015</p>', '<p>Autoridades y pobladores de la comunidad de Oxapampa fueron capacitados para reconocer los efectos negativos de la miner&iacute;a ilegal.</p>', 1, 'captura-de-pantalla-2015-08-25-a-las-11-53-54.png', 'captura-de-pantalla-2015-08-25-a-las-11-53-54.png', 'preparados-y-bien-armados', '?sec=preparados-y-bien-armados', '2015-08-25', '0000-00-00', 1, 2, 1),
	(93, 'Robots facilitan operaciones mineras', '<p>Empresas mineras inviertan cerca de US$10 millones anuales en innovaci&oacute;n tecnol&oacute;gica, como robots y dispositivos m&oacute;viles para mejorar su productividad.</p>\r\n\r\n<p>Hoy en d&iacute;a existe una gran demanda tecnol&oacute;gica en el sector minero peruano, pues las compa&ntilde;&iacute;as mineras m&aacute;s grandes no dudan en invertir cerca de US$10 millones anuales en innovaci&oacute;n tecnol&oacute;gica, con el fin de mejorar la productividad de sus operaciones y el desarrollo sostenible de las comunidades; tanto as&iacute; que muchas de las minas ya utilizan robots en sus operaciones y usan dispositivos m&oacute;viles para monitorear su producci&oacute;n.&nbsp;</p>\r\n\r\n<p>&ldquo;Es el caso de Sociedad Minera Cerro Verde, que usa robots para hacer medici&oacute;n de espesores; y Minera Yanacocha, que utiliza un robot para labores de exploraci&oacute;n&rdquo;, cont&oacute; Rafael Estrada, presidente del VI Simposium de Tecnolog&iacute;a de Informaci&oacute;n del Sector Minero-energ&eacute;tico. &ldquo;En paralelo, las mineras han desarrollado un abanico de soluciones que funcionan en smartphones y tablets, que permiten monitorear el proceso y enterarse de mantenimiento, desde un dispositivo m&oacute;vil&rdquo;, agreg&oacute;.</p>\r\n\r\n<p>Fuente: El Comercio</p>\r\n\r\n<p><a href="http://elcomercio.pe/economia/peru/mineras-peruanas-ya-utilizan-robots-sus-operaciones-noticia-1833784">http://elcomercio.pe/economia/peru/mineras-peruanas-ya-utilizan-robots-sus-operaciones-noticia-1833784</a></p>\r\n\r\n<p>25.08.2015</p>', '<p>Empresas mineras inviertan cerca de US$10 millones anuales en innovaci&oacute;n tecnol&oacute;gica, como robots y dispositivos m&oacute;viles para mejorar su productividad.</p>', 1, 'captura-de-pantalla-2015-08-25-a-las-11-58-35.png', 'captura-de-pantalla-2015-08-25-a-las-11-58-35.png', 'robots-facilitan-operaciones-mineras', '?sec=robots-facilitan-operaciones-mineras', '2015-08-25', '0000-00-00', 1, 2, 3),
	(94, 'Per&uacute; y Colombia crean el mejor equipo', '<p>Ambos pa&iacute;ses se unen para combatir juntos la miner&iacute;a ilegal en &aacute;reas naturales de frontera.</p>\r\n\r\n<p>Cuando hablamos de cosas ilegales, los mejores equipos dejan de lado su camiseta para unirse y crear el mejor equipo para combatir lo malo, como es el caso de Per&uacute; y Colombia que se juntaron para las actividades criminales en el sector minero dentro de la zona frontera entre ambos pa&iacute;ses.&nbsp;</p>\r\n\r\n<p>&ldquo;Sabemos los colombianos y los peruanos que el problema de la miner&iacute;a ilegal en el Putumayo es severo. Y cuando Colombia descubre una draga, esa draga cruza al otro lado de la ribera del r&iacute;o, le pone bandera peruana y entonces escapa del control colombiano, y viceversa&rdquo;, asegur&oacute; Manuel Pulgar-Vidal, titular del Ministerio del Ambiente (Minam).</p>\r\n\r\n<p>En tanto, Pulgar Vidal tambi&eacute;n agreg&oacute; que &ldquo;debemos tener mecanismos que desde la conservaci&oacute;n nos permita cooperar para luchar contra ese tipo amenazas&rdquo;, pues gracias a este tipo de acuerdos se pueden establecer mecanismos de conservaci&oacute;n y colaboraci&oacute;n que permitan enfrentar amenazas como la tala ilegal, el tr&aacute;fico de diversidad biol&oacute;gica e incluso el narcotr&aacute;fico.</p>\r\n\r\n<p>(FIN) LIT/MAO</p>\r\n\r\n<p>JRA</p>\r\n\r\n<p><a href="http://www.andina.com.pe/agencia/noticia-peru-y-colombia-combatiran-mineria-ilegal-areas-naturales-frontera-570124.aspx">http://www.andina.com.pe/agencia/noticia-peru-y-colombia-combatiran-mineria-ilegal-areas-naturales-frontera-570124.aspx</a></p>\r\n\r\n<p>25.08.2015</p>', '<p>Ambos pa&iacute;ses se unen para combatir juntos la miner&iacute;a ilegal en &aacute;reas naturales de frontera.</p>', 1, 'captura-de-pantalla-2015-08-25-a-las-12-03-07.png', 'captura-de-pantalla-2015-08-25-a-las-12-03-07.png', 'peru-y-colombia-crean-el-mejor-equipo', '?sec=peru-y-colombia-crean-el-mejor-equipo', '0000-00-00', '0000-00-00', 1, 2, 2),
	(95, 'Drones se apoderan del sector minero', '<p>La Feria Internacional de Arequipa (FIA) mostr&oacute; una gran variedad de drones que prometen mejorar los resultados en la miner&iacute;a peruana.</p>\r\n\r\n<p>Empresarios le sacaron el jugo a la Feria Internacional de Arequipa (FIA), tras ofrecer lo mejor de sus productos tecnol&oacute;gicos para el sector minero, entre ellos, los drones. Un peque&ntilde;o veh&iacute;culo a&eacute;reo no tripulado, utilizado en varios sectores por su efectividad de captaci&oacute;n, que ahora se ha convertido en un boom en la miner&iacute;a peruana.&nbsp;</p>\r\n\r\n<p>&ldquo;(Los drones en la miner&iacute;a) se utilizan para hacer estudios de fotogrametr&iacute;a, topograf&iacute;a y cartograf&iacute;a&rdquo;, dijo Juan Padilla, representante de la empresa arequipe&ntilde;a Importaciones Pe&ntilde;aranda Corrales, asegurando que las empresas mineras solicitan los servicios de estas sofisticadas m&aacute;quinas para el estudio de los terrenos m&aacute;s dif&iacute;ciles en el sector.</p>\r\n\r\n<p><a href="http://larepublica.pe/impresa/economia/399861-ofertan-drones-y-nanocomputadoras-para-mineria-en-fia">http://larepublica.pe/impresa/economia/399861-ofertan-drones-y-nanocomputadoras-para-mineria-en-fia</a></p>\r\n\r\n<p>25.08.2015</p>', '<p>La Feria Internacional de Arequipa (FIA) mostr&oacute; una gran variedad de drones que prometen mejorar los resultados en la miner&iacute;a peruana.</p>', 1, 'captura-de-pantalla-2015-08-25-a-las-12-05-15.png', 'captura-de-pantalla-2015-08-25-a-las-12-05-15.png', 'drones-se-apoderan-del-sector-minero', '?sec=drones-se-apoderan-del-sector-minero', '0000-00-00', '0000-00-00', 1, 2, 2);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.tabs
CREATE TABLE IF NOT EXISTS `tabs` (
  `idTab` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(45) NOT NULL,
  `class` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idTab`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.tabs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tabs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tabs` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idUsuario`, `nombre`, `usuario`, `clave`, `estado`) VALUES
	(2, 'john', 'jfalcon', '12345', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;


-- Volcando estructura para tabla mineriasegura.valores_select
CREATE TABLE IF NOT EXISTS `valores_select` (
  `valor` varchar(50) NOT NULL,
  `texto` varchar(250) NOT NULL,
  `idCampoFormulario` int(11) NOT NULL,
  KEY `fk_valores_select_campos_formulario1_idx` (`idCampoFormulario`),
  CONSTRAINT `valores_select_ibfk_1` FOREIGN KEY (`idCampoFormulario`) REFERENCES `campos_formulario` (`idCampoFormulario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla mineriasegura.valores_select: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `valores_select` DISABLE KEYS */;
/*!40000 ALTER TABLE `valores_select` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
