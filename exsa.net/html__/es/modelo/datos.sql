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

-- Volcando estructura de base de datos para exsa
CREATE DATABASE IF NOT EXISTS `exsa` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `exsa`;


-- Volcando estructura para tabla exsa.archivos
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
  CONSTRAINT `fk_archivos_usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.archivos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `archivos` DISABLE KEYS */;
INSERT INTO `archivos` (`idArchivo`, `nombre`, `ruta`, `tamano`, `tipo`, `estado`, `idUsuario`) VALUES
	(1, 'Demo', 'demo.pdf', '831 KB', 'pdf', 1, 1);
/*!40000 ALTER TABLE `archivos` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.campos_formulario
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
  CONSTRAINT `fk_campos_formulario_elementos_formulario1` FOREIGN KEY (`idElementoFormulario`) REFERENCES `elementos_formulario` (`idElementoFormulario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_campos_formulario_formularios1` FOREIGN KEY (`idFormulario`) REFERENCES `formularios` (`idFormulario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.campos_formulario: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `campos_formulario` DISABLE KEYS */;
INSERT INTO `campos_formulario` (`idCampoFormulario`, `nombre`, `idCampo`, `claseCampo`, `placeholder`, `longitud`, `idElementoFormulario`, `orden`, `idFormulario`, `estado`) VALUES
	(1, 'Nombre', 'txtNombreContacto', 'text', 'Nombre', 250, 1, 1, 1, 1),
	(2, 'Asunto', 'txtAsuntoContacto', 'text', 'Asunto', 50, 1, 2, 1, 1),
	(3, 'Sexo', 'lstSexoContacto', 'select', '', NULL, 5, 3, 1, 1),
	(4, 'Mensaje', 'txtMensajeContacto', 'text', 'Mensaje', NULL, 6, 4, 1, 1);
/*!40000 ALTER TABLE `campos_formulario` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.contenido
CREATE TABLE IF NOT EXISTS `contenido` (
  `idContenido` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) DEFAULT NULL,
  `subTitulo` varchar(250) DEFAULT NULL,
  `texto` mediumtext,
  `estado` int(11) NOT NULL DEFAULT '1',
  `link` varchar(50) DEFAULT NULL,
  `urlLink` varchar(250) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idContenido`),
  KEY `fk_contenido_usuarios1_idx` (`idUsuario`),
  CONSTRAINT `fk_contenido_usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.contenido: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `contenido` DISABLE KEYS */;
INSERT INTO `contenido` (`idContenido`, `titulo`, `subTitulo`, `texto`, `estado`, `link`, `urlLink`, `idUsuario`) VALUES
	(1, '', '', '<p><img alt="" src="http://exsa.net/wp-content/uploads/2013/09/peru-flag.jpg" style="border-style:solid; border-width:1px; float:right; width:250px" /></p>\n\n<p style="text-align: justify;">EXSA cuenta en el Per&uacute; con tres plantas industriales localizadas en Lur&iacute;n, Tacna y Trujillo. Asimismo cuenta con polvorines, centros de almacenamiento y distribuci&oacute;n en Lur&iacute;n, Trujillo, Tacna, Arequipa, Cusco y una serie de activos a nivel nacional.</p>\n\n<p style="text-align: justify;">Para atender a sus clientes con servicios de voladura, cuenta con silos de emulsi&oacute;n,&nbsp; tanques cisternas, camiones f&aacute;brica,&nbsp; gr&uacute;as,&nbsp; mini cargadores,&nbsp; m&oacute;dulos UBT, entre otros.</p>\n', 1, NULL, NULL, 1),
	(2, 'Contenido Demo 2', NULL, '<p>Hola otra vez</p>', 0, NULL, NULL, 1),
	(3, '', '', '<p><img alt="" src="http://exsa.net/wp-content/uploads/2013/08/panama-flag-300x199.jpg" style="float:right; height:199px; width:300px" /></p>\n\n<p style="text-align: justify;">EXSA est&aacute; presente en Panam&aacute; desde julio del 2010, a trav&eacute;s de INBLAST.</p>\n\n<p style="text-align: justify;">Desde Panam&aacute; se atiende todo el mercado de Centroam&eacute;rica y el Caribe.</p>\n\n<p style="text-align: justify;"><strong>Ricardo Silva</strong><br />\nGerente General<br />\nEXSA<br />\nTel (507) 838.9810<br />\nCel (507) 6246.4638<br />\n<a href="mailto:rsilva.panama@exsa.net">email: rsilva@exsa.net</a></p>\n', 1, NULL, NULL, 1),
	(4, '', '', '<p><img alt="" src="http://exsa.net/wp-content/uploads/2013/08/colombia-flag-300x199.jpg" style="border-style:solid; border-width:1px; float:right; height:199px; width:300px" /></p>\n\n<p style="text-align: justify;">EXSA est&aacute; presente en Colombia desde febrero del 2013, bajo el nombre de EXSA COLOMBIA SAS.</p>\n\n<p style="text-align: justify;">En Colombia, la compa&ntilde;&iacute;a se especializa en prestaci&oacute;n de Soluciones de fragmentaci&oacute;n de roca a los clientes. Su principal enfoque es la prestaci&oacute;n de servicios de asistencia t&eacute;cnica, log&iacute;sticos y cargu&iacute;o de voladura.</p>\n\n<p style="text-align: justify;"><strong>Hans Kulp</strong><br />\nGerente General<br />\nExsa Colombia S.A.S.<br />\nCalle 108 N&deg; 45-30 Torre 2 Of. 1307 B.<br />\nCentro Empresarial Paralelo 108.<br />\nPBX. 571-3000994<br />\nCelular 57-3183228697<br />\n<a href="mailto:hkulp@exsa.net">email: hkulp@exsa.net</a><br />\nBogot&aacute; &ndash; Colombia.</p>\n', 1, NULL, NULL, 1);
/*!40000 ALTER TABLE `contenido` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.contenido_archivos
CREATE TABLE IF NOT EXISTS `contenido_archivos` (
  `idContenido` int(11) NOT NULL,
  `idArchivo` int(11) NOT NULL,
  KEY `fk_contenido_archivos_archivos1_idx` (`idArchivo`),
  KEY `fk_contenido_archivos_contenido1_idx` (`idContenido`),
  CONSTRAINT `fk_contenido_archivos_archivos1` FOREIGN KEY (`idArchivo`) REFERENCES `archivos` (`idArchivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contenido_archivos_contenido1` FOREIGN KEY (`idContenido`) REFERENCES `contenido` (`idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.contenido_archivos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `contenido_archivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contenido_archivos` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.contenido_formulario
CREATE TABLE IF NOT EXISTS `contenido_formulario` (
  `idContenido` int(11) NOT NULL,
  `idFormulario` int(11) NOT NULL,
  KEY `fk_contenido_formulario_contenido1_idx` (`idContenido`),
  KEY `fk_contenido_formulario_formularios1_idx` (`idFormulario`),
  CONSTRAINT `fk_contenido_formulario_contenido1` FOREIGN KEY (`idContenido`) REFERENCES `contenido` (`idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contenido_formulario_formularios1` FOREIGN KEY (`idFormulario`) REFERENCES `formularios` (`idFormulario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.contenido_formulario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `contenido_formulario` DISABLE KEYS */;
INSERT INTO `contenido_formulario` (`idContenido`, `idFormulario`) VALUES
	(1, 1);
/*!40000 ALTER TABLE `contenido_formulario` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.contenido_has_tabs
CREATE TABLE IF NOT EXISTS `contenido_has_tabs` (
  `idContenido` int(11) NOT NULL,
  `idTab` int(11) NOT NULL,
  PRIMARY KEY (`idContenido`,`idTab`),
  KEY `fk_contenido_has_tabs_tabs1_idx` (`idTab`),
  KEY `fk_contenido_has_tabs_contenido1_idx` (`idContenido`),
  CONSTRAINT `fk_contenido_has_tabs_contenido1` FOREIGN KEY (`idContenido`) REFERENCES `contenido` (`idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contenido_has_tabs_tabs1` FOREIGN KEY (`idTab`) REFERENCES `tabs` (`idTab`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.contenido_has_tabs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `contenido_has_tabs` DISABLE KEYS */;
INSERT INTO `contenido_has_tabs` (`idContenido`, `idTab`) VALUES
	(1, 1);
/*!40000 ALTER TABLE `contenido_has_tabs` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.elementos_formulario
CREATE TABLE IF NOT EXISTS `elementos_formulario` (
  `idElementoFormulario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`idElementoFormulario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.elementos_formulario: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `elementos_formulario` DISABLE KEYS */;
INSERT INTO `elementos_formulario` (`idElementoFormulario`, `descripcion`, `type`) VALUES
	(1, 'texto', 'text'),
	(2, 'numero', 'number'),
	(3, 'correo', 'email'),
	(4, 'password', 'password'),
	(5, 'combo', 'select'),
	(6, 'contenido', 'textarea');
/*!40000 ALTER TABLE `elementos_formulario` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.formularios
CREATE TABLE IF NOT EXISTS `formularios` (
  `idFormulario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  `claseFormulario` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idFormulario`),
  KEY `fk_formularios_usuarios1_idx` (`idUsuario`),
  CONSTRAINT `fk_formularios_usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.formularios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `formularios` DISABLE KEYS */;
INSERT INTO `formularios` (`idFormulario`, `descripcion`, `claseFormulario`, `estado`, `idUsuario`) VALUES
	(1, 'Contacto', 'formContacto', 1, 1);
/*!40000 ALTER TABLE `formularios` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.imagenes
CREATE TABLE IF NOT EXISTS `imagenes` (
  `idImagen` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `alt` varchar(250) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idImagen`),
  KEY `fk_imagenes_usuarios1_idx` (`idUsuario`),
  CONSTRAINT `fk_imagenes_usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.imagenes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `imagenes` DISABLE KEYS */;
INSERT INTO `imagenes` (`idImagen`, `title`, `url`, `alt`, `estado`, `idUsuario`) VALUES
	(1, 'Img Demo', 'demo.jpg', 'demo', 1, 1);
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.imagenes_contenidos
CREATE TABLE IF NOT EXISTS `imagenes_contenidos` (
  `idImagen` int(11) NOT NULL,
  `idContenido` int(11) NOT NULL,
  KEY `fk_imagenes_contenidos_imagenes1_idx` (`idImagen`),
  KEY `fk_imagenes_contenidos_contenido1_idx` (`idContenido`),
  CONSTRAINT `fk_imagenes_contenidos_contenido1` FOREIGN KEY (`idContenido`) REFERENCES `contenido` (`idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_imagenes_contenidos_imagenes1` FOREIGN KEY (`idImagen`) REFERENCES `imagenes` (`idImagen`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.imagenes_contenidos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `imagenes_contenidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagenes_contenidos` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.item_menu
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
  CONSTRAINT `fk_item_menu_menu1` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`idMenu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.item_menu: ~86 rows (aproximadamente)
/*!40000 ALTER TABLE `item_menu` DISABLE KEYS */;
INSERT INTO `item_menu` (`idItemMenu`, `descripcion`, `url1`, `url2`, `orden`, `estado`, `tipo`, `idMenu`, `imagen`) VALUES
	(1, 'NOSOTROS', 'nosotros', '?sec=nosotros', 1, 1, 0, 1, NULL),
	(2, 'SOLUCIONES', 'soluciones', '?sec=soluciones', 2, 1, 0, 1, NULL),
	(3, 'CAPACITACIÃ“N', 'capacitacion', '?sec=capacitacion', 3, 1, 0, 1, NULL),
	(4, 'RESPONSABILIDAD SOCIAL', 'responsabilidad-social', '?sec=responsabilidad-social', 4, 1, 0, 1, NULL),
	(5, 'PROVEEDORES', 'proveedores', '?sec=proveedores', 5, 1, 0, 1, NULL),
	(6, 'SALA DE PRENSA', 'sala-de-prensa', '?sec=sala-de-prensa', 6, 1, 0, 1, NULL),
	(7, 'CONTÃCTENOS', 'contactenos', '?sec=contactenos', 7, 1, 0, 1, NULL),
	(8, 'PERFIL EMPRESARIAL', 'perfil-empresarial', '?sec=perfil-empresarial', 1, 1, 1, 2, NULL),
	(9, 'PRESENCIA REGIONAL', 'presencia-regional', '?sec=presencia-regional', 2, 1, 1, 2, NULL),
	(10, 'SISTEMA INTEGRADO DE GESTIÃ“N', 'sistema-integrado-de-gestion', '?sec=sistema-integrado-de-gestion', 3, 1, 1, 2, NULL),
	(11, 'SERVICIOS', 'servicios', '?sec=servicios', 1, 1, 1, 3, NULL),
	(12, 'PRODUCTOS', 'productos', '?sec=productos', 2, 1, 1, 3, NULL),
	(13, 'CENTRO TECNOLÃ“GICO DE VOLADURIAS EXSA', 'centro-tecnologico-de-voladurias-exsa', '?sec=centro-tecnologico-de-voladurias-exsa', 1, 1, 1, 4, NULL),
	(14, 'POLÃTICAS DE RESPONSABILIDAD SOCIAL', 'politicas-de-responsabilidad-social', '?sec=politicas-de-responsabilidad-social', 1, 1, 1, 5, NULL),
	(15, 'GRUPOS DE INTERÃ‰S', 'grupos-de-interes', '?sec=grupos-de-interes', 2, 1, 1, 5, NULL),
	(16, 'POLÃTICA DE COMPRAS', 'politica-de-compras', '?sec=politica-de-compras', 1, 1, 1, 6, NULL),
	(17, 'CALIFICACIÃ“N DE PROVEEDORES', 'calificacion-de-proveedores', '?sec=calificacion-de-proveedores', 2, 1, 1, 6, NULL),
	(18, 'ADMINISTRACIÃ“N DE PROVEEDORES', 'administracion-de-proveedores', '?sec=administracion-de-proveedores', 3, 1, 1, 6, NULL),
	(19, 'GESTIÃ“N DE PAGOS A PROVEEDORES', 'gestion-de-pagos-a-proveedores', '?sec=gestion-de-pagos-a-proveedores', 4, 1, 1, 6, NULL),
	(20, 'NOTICIAS', 'noticias', '?sec=noticias', 1, 1, 1, 7, NULL),
	(21, 'OFICINAS', 'oficinas', '?sec=oficinas', 1, 1, 1, 8, NULL),
	(22, 'FORMULARIO DE CONTACTO', 'formulario-de-contacto', '?sec=formulario-de-contacto', 2, 1, 1, 8, NULL),
	(23, 'TRABAJA CON NOSOTROS', 'trabaja-con-nosotros', '?sec=trabaja-con-nosotros', 3, 1, 1, 8, NULL),
	(24, 'MODELO DE NEGOCIO', 'modelo-de-negocio', '?sec=modelo-de-negocio', 1, 1, 1, 9, NULL),
	(25, 'MISIÃ“N, VISIÃ“N Y VALORES', 'mision-vision-y-valores', '?sec=mision-vision-y-valores', 2, 1, 1, 9, NULL),
	(26, 'HISTORIA', 'historia', '?sec=historia', 3, 1, 1, 9, NULL),
	(27, 'EQUIPO DIRECTIVO', 'equipo-directivo', '?sec=equipo-directivo', 4, 1, 1, 9, NULL),
	(28, 'VIDEO INSTITUCIONAL', 'video-institucional', '?sec=video-institucional', 5, 1, 1, 9, NULL),
	(29, 'PERÃš', 'peru', '?sec=peru', 1, 1, 1, 10, NULL),
	(30, 'PANAMÃ', 'panama', '?sec=panama', 2, 1, 1, 10, NULL),
	(31, 'COLOMBIA', 'colombia', '?sec=colombia', 3, 1, 1, 10, NULL),
	(32, 'BRASIL', 'brasil', '?sec=brasil', 4, 1, 1, 10, NULL),
	(33, 'GESTIÃ“N DE SEGURIDAD Y SALUD OCUPACIONAL', 'gestion-de-seguridad-salud-y-ocupacional', '?sec=gestion-de-seguridad-salud-y-ocupacional', 1, 1, 1, 11, NULL),
	(34, 'GESTIÃ“N DE CALIDAD', 'gestion-de-calidad', '?sec=gestion-de-calidad', 2, 1, 1, 11, NULL),
	(35, 'GESTIÃ“N AMBIENTAL', 'gestion-ambiental', '?sec=gestion-ambiental', 3, 1, 1, 11, NULL),
	(36, 'SISTEMA DE GESTIÃ“N DE CONTROL Y SEGURIDAD BASC', 'sistema-de-gestion-de-control-y-seguridad-basc', '?sec=sistema-de-gestion-de-control-y-seguridad-basc', 4, 1, 1, 11, NULL),
	(37, 'ASIS. TEC. EN MINERÃA SUBTERRÃNEA Y A TAJO ABIERTO', 'asis-tec-en-mineria-subterranea-y-a-tajo-abierto', '?sec=asis-tec-en-mineria-subterranea-y-a-tajo-abierto', 1, 1, 1, 12, NULL),
	(38, 'SERVICIO INTEGRAL DE VOLADURA EXSA (SIVE)', 'servicio-integral-de-voladura-exsa-sive', '?sec=servicio-integral-de-voladura-exsa-sive', 2, 1, 1, 12, NULL),
	(39, 'SERVICIO DE MEZCLADO DE AGENTES DE VOLADURA', 'servicio-de-mezclado-de-agentes-de-voladura', '?sec=servicio-de-mezclado-de-agentes-de-voladura', 3, 1, 1, 12, NULL),
	(40, 'SERVICIO DE INGENIERÃA', 'servicio-de-ingenieria', '?sec=servicio-de-ingenieria', 4, 1, 1, 12, NULL),
	(41, 'DINAMITAS', 'dinamitas', '?sec=dinamitas', 1, 1, 1, 13, 'DINAMITAS_R.jpg'),
	(42, 'EMULSIONES ENCARTUCHADAS', 'emulsiones-encartuchadas', '?sec=emulsiones-encartuchadas', 2, 1, 1, 13, 'EMULEX-45-65-80.jpg'),
	(43, 'ANFO - EXAMON-P', 'anfo-examon-p', '?sec=anfo-examon-p', 3, 1, 1, 13, 'EXAMON-P.jpg'),
	(44, 'EMULSIONES A GRANEL', 'emulsiones-a-granel', '?sec=emulsiones-a-granel', 4, 1, 1, 13, 'emulsiones-a-granel.jpg'),
	(45, 'NITRATO DE AMONIO', 'nitrato-de-amonio', '?sec=nitrato-de-amonio', 5, 1, 1, 13, 'NITRATO-AMONIO.jpg'),
	(46, 'ACCESORIOS DE VOLADURA', 'accesorios-de-voladura', '?sec=accesorios-de-voladura', 6, 1, 1, 13, 'DETONADOR-NO-ELECTRICO.jpg'),
	(47, 'CENTRO TECNOLÃ“GICO DE VOLADURAS EXSA (CTVE)', 'centro-tecnologico-de-voladuras-exsa-ctve', '?sec=centro-tecnologico-de-voladuras-exsa-ctve', 1, 1, 1, 14, NULL),
	(48, 'PROGRAMA CTVE 2015 - LIMA', 'programa-ctve-2015-lima', '?sec=programa-ctve-2015-lima', 2, 1, 1, 14, NULL),
	(49, 'FORMULARIO DE INSCRIPCIÃ“N', 'formulario-de-inscripcion', '?sec=formulario-de-inscripcion', 3, 1, 1, 14, NULL),
	(50, 'COMUNIDAD', 'comunidad', '?sec=comunidad', 1, 1, 1, 17, NULL),
	(51, 'COLABORADORES', 'colaboradores', '?sec=colaboradores', 2, 1, 1, 17, NULL),
	(52, 'MEDIO AMBIENTE', 'medio-ambiente', '?sec=medio-ambiente', 3, 1, 1, 17, NULL),
	(53, 'CLIENTES', 'clientes', '?sec=clientes', 4, 1, 1, 17, NULL),
	(54, 'PROVEEDORES', 'proveedores', '?sec=proveedores', 5, 1, 1, 17, NULL),
	(55, 'ACCIONISTAS', 'accionistas', '?sec=accionistas', 6, 1, 1, 17, NULL),
	(56, 'GOBIERNO Y SOCIEDAD', 'gobierno-y-sociedad', '?sec=gobierno-y-sociedad', 7, 1, 1, 17, NULL),
	(57, 'EXSABLOK', 'exsablock', '?sec=exsablock', 1, 1, 1, 18, NULL),
	(58, 'SEMEXSA 45, 65 y 80', 'semexa-45-60-80', '?sec=semexa-45-60-80', 2, 1, 1, 18, NULL),
	(59, 'EXADIT 45 y 65', 'exadit-45-y-65', '?sec=exadit-45-y-65', 3, 1, 1, 18, NULL),
	(60, 'GELATINA ESPECIAL 75', 'gelatina-especial-75', '?sec=gelatina-especial-75', 4, 1, 1, 18, NULL),
	(61, 'EMULEX 45, 65 y 80', 'emulex-45-65-y-80', '?sec=emulex-45-65-y-80', 1, 1, 1, 19, NULL),
	(62, 'EXAGEL-E 65 Y 80', 'exagel-e-65-y-80', '?sec=exagel-e-65-y-80', 2, 1, 1, 19, NULL),
	(63, 'SEMEXSA-E 65 Y 80', 'semexa-e-65-y-80', '?sec=semexa-e-65-y-80', 3, 1, 1, 19, NULL),
	(64, 'PLASTEX-E', 'plastex-e', '?sec=plastex-e', 4, 1, 1, 19, NULL),
	(65, 'SLURREX AP 60 y 80', 'slurrex-ap-60-y-80', '?sec=slurrex-ap-60-y-80', 5, 1, 1, 19, NULL),
	(66, 'SLURREX BS', 'slurrex-bs', '?sec=slurrex-bs', 1, 1, 1, 20, NULL),
	(67, 'SLURREX MA', 'slurrex-ma', '?sec=slurrex-ma', 2, 1, 1, 20, NULL),
	(68, 'SLURREX TC#', 'slurrex-tc', '?sec=slurrex-tc', 3, 1, 1, 20, NULL),
	(69, 'SLURREX G', 'slurrex-g', '?sec=slurrex-g', 4, 1, 1, 20, NULL),
	(70, 'FULMINANTE SIMPLE NÂ° 8', 'fulminante-simple-nro-8', '?sec=fulminante-simple-nro-8', 1, 1, 1, 21, NULL),
	(71, 'MECHA DE SEGURIDAD', 'mecha-de-seguridad', '?sec=mecha-de-seguridad', 2, 1, 1, 21, NULL),
	(72, 'MECHA RÃPIDA', 'mecha-rapida', '?sec=mecha-rapida', 3, 1, 1, 21, NULL),
	(73, 'DETONADOR ENSAMBLADO', 'detonador-ensamblado', '?sec=detonador-ensamblado', 4, 1, 1, 21, NULL),
	(74, 'DETONADOR NO ELÃ‰CTRICO', 'detonador-no-electrico', '?sec=detonador-no-electrico', 5, 1, 1, 21, NULL),
	(75, 'LÃNEA SILENCIOSA', 'linea-silenciosa', '?sec=linea-silenciosa', 6, 1, 1, 21, NULL),
	(76, 'CORDON DETONANTE', 'cordon-detonante', '?sec=cordon-detonante', 7, 1, 1, 21, NULL),
	(77, 'BOOSTER PENTOLITA', 'booster-pentolita', '?sec=booster-pentolita', 8, 1, 1, 21, NULL),
	(78, 'CAMPANA DE DONACIONES DE ROPA Y FRAZADAS ABRIGUEMOS A NUESTRA COMUNIDAD', 'campana-de-donaciones-de-ropa-y-frazadas-abriguemos-a-nuestra-comunidad', '?sec=campana-de-donaciones-de-ropa-y-frazadas-abriguemos-a-nuestra-comunidad', 1, 1, 1, 22, NULL),
	(79, 'CAMPANA DE ENTREGA DE BARRILES PARA SEGREGACIÃ“N DE RESIDUOS EN COLEGIOS DEL AID', 'campana-de-entrega-de-barriles-para-segregacion-de-residuos-en-colegios-del-aid', '?sec=campana-de-entrega-de-barriles-para-segregacion-de-residuos-en-colegios-del-aid', 2, 1, 1, 22, NULL),
	(80, 'PROYECTO COLEGIOS SEGUROS CON EXSA', 'proyecto-colegios-seguros-con-exsa', '?sec=proyecto-colegios-seguros-con-exsa', 3, 1, 1, 22, NULL),
	(81, 'SEMBRANDO TALENTOS', 'sembrando-talentos', '?sec=sembrando-talentos', 4, 1, 1, 22, NULL),
	(82, 'ISO 14001', 'iso-14001', '?sec=iso-14001', 1, 1, 1, 23, NULL),
	(83, 'ISO 9001', 'iso-9001', '?sec=iso-9001', 1, 1, 1, 24, NULL),
	(84, 'HOMOLOGACIÃ“N SGS', 'homologacion-sgs', '?sec=homologacion-sgs', 1, 1, 1, 25, NULL),
	(85, 'BASC', 'basc', '?sec=basc', 2, 1, 1, 25, NULL),
	(86, 'TRANSPARENCIA Y COMPROMISO', 'transparencia-y-compromiso', '?sec=transparencia-y-compromiso', 1, 1, 1, 26, NULL);
/*!40000 ALTER TABLE `item_menu` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.item_menu_pagina
CREATE TABLE IF NOT EXISTS `item_menu_pagina` (
  `idItemMenu` int(11) NOT NULL,
  `idPagina` int(11) NOT NULL,
  KEY `fk_item_menu_pagina_item_menu1_idx` (`idItemMenu`),
  KEY `fk_item_menu_pagina_pagina1_idx` (`idPagina`),
  CONSTRAINT `fk_item_menu_pagina_item_menu1` FOREIGN KEY (`idItemMenu`) REFERENCES `item_menu` (`idItemMenu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_menu_pagina_pagina1` FOREIGN KEY (`idPagina`) REFERENCES `pagina` (`idPagina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.item_menu_pagina: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `item_menu_pagina` DISABLE KEYS */;
INSERT INTO `item_menu_pagina` (`idItemMenu`, `idPagina`) VALUES
	(29, 1),
	(30, 4),
	(31, 5);
/*!40000 ALTER TABLE `item_menu_pagina` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.menu
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
  CONSTRAINT `fk_menu_usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.menu: ~24 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`idMenu`, `descripcion`, `url1`, `url2`, `estado`, `idUsuario`, `main`) VALUES
	(1, 'Main', 'main', '?sec=main', 1, 1, 1),
	(2, 'Nosotros', 'nosotros', '?sec=nosotros', 1, 1, 0),
	(3, 'Soluciones', 'soluciones', '?sec=soluciones', 1, 1, 0),
	(4, 'CapacitaciÃ³n', 'capacitacion', '?sec=capacitacion', 1, 1, 0),
	(5, 'Responsabilidad Social', 'responsabilidad-social', '?sec=responsabilidad-social', 1, 1, 0),
	(6, 'Proveedores', 'proveedores', '?sec=proveedores', 1, 1, 0),
	(7, 'Sala de Prensa', 'sala-de-prensa', '?sec=sala-de-prensa', 1, 1, 0),
	(8, 'ContÃ¡ctanos', 'contactanos', '?sec=contactanos', 1, 1, 0),
	(9, 'Perfil Empresarial', 'perfil-empresarial', '?sec=perfil-empresarial', 1, 1, 0),
	(10, 'Presencia Regional', 'presencia-regional', '?sec=presencia-regional', 1, 1, 0),
	(11, 'Sistema Integrado de GestiÃ³n', 'sistema-integrado-de-gestion', '?sec=sistema-integrado-de-gestion', 1, 1, 0),
	(12, 'Servicios', 'servicios', '?sec=servicios', 1, 1, 0),
	(13, 'Productos', 'productos', '?sec=productos', 1, 1, 0),
	(14, 'Centro TecnolÃ³gico de Voladuras EXSA', 'centro-tecnologico-de-voladuras-exsa', '?sec=centro-tecnologico-de-voladuras-exsa', 1, 1, 0),
	(17, 'Grupos de InterÃ©s', 'grupos-de-interes', '?sec=grupos-de-interes', 1, 1, 0),
	(18, 'Dinamitas', 'dinamitas', '?sec=dinamitas', 1, 1, 0),
	(19, 'Emulsiones Encartuchadas', 'emulsiones-encartuchadas', '?sec=emilsiones-encartuchadas', 1, 1, 0),
	(20, 'Emulsiones a Granel', 'emulsiones-a-granel', '?sec=emulsiones-a-granel', 1, 1, 0),
	(21, 'Accesorios de Voladura', 'accesorios-de-voladura', '?sec=accesorios-de-voladura', 1, 1, 0),
	(22, 'Comunidad', 'comunidad', '?sec=comunidad', 1, 1, 0),
	(23, 'Medio Ambiente', 'medio-ambiente', '?sec=medio-ambiente', 1, 1, 0),
	(24, 'Clientes', 'clientes', '?sec=clientes', 1, 1, 0),
	(25, 'Proveedores', 'proveedores', '?sec=proveedores', 1, 1, 0),
	(26, 'Accionistas', 'accionistas', '?sec=accionistas', 1, 1, 0);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.menu_has_item_menu
CREATE TABLE IF NOT EXISTS `menu_has_item_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idItemMenu` int(11) NOT NULL,
  `idMenu` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_menu_has_item_menu_item_menu1_idx` (`idItemMenu`),
  KEY `fk_menu_has_item_menu_menu1_idx` (`idMenu`),
  CONSTRAINT `fk_menu_has_item_menu_item_menu1` FOREIGN KEY (`idItemMenu`) REFERENCES `item_menu` (`idItemMenu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_menu_has_item_menu_menu1` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`idMenu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.menu_has_item_menu: ~23 rows (aproximadamente)
/*!40000 ALTER TABLE `menu_has_item_menu` DISABLE KEYS */;
INSERT INTO `menu_has_item_menu` (`id`, `idItemMenu`, `idMenu`, `estado`) VALUES
	(1, 1, 2, 1),
	(2, 2, 3, 1),
	(3, 3, 4, 1),
	(4, 4, 5, 1),
	(5, 5, 6, 1),
	(6, 6, 7, 1),
	(7, 7, 8, 1),
	(8, 8, 9, 1),
	(9, 9, 10, 1),
	(10, 10, 11, 1),
	(11, 11, 12, 1),
	(12, 12, 13, 1),
	(13, 13, 14, 1),
	(14, 15, 17, 1),
	(15, 41, 18, 1),
	(16, 42, 19, 1),
	(17, 44, 20, 1),
	(18, 46, 21, 1),
	(19, 50, 22, 1),
	(20, 52, 23, 1),
	(21, 53, 24, 1),
	(22, 54, 25, 1),
	(23, 55, 26, 1);
/*!40000 ALTER TABLE `menu_has_item_menu` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.pagina
CREATE TABLE IF NOT EXISTS `pagina` (
  `idPagina` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `url1` varchar(250) DEFAULT NULL,
  `url2` varchar(250) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idPagina`),
  KEY `fk_pagina_usuarios1_idx` (`idUsuario`),
  CONSTRAINT `fk_pagina_usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.pagina: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `pagina` DISABLE KEYS */;
INSERT INTO `pagina` (`idPagina`, `titulo`, `url1`, `url2`, `estado`, `idUsuario`) VALUES
	(1, 'PERÃš', NULL, NULL, 1, 1),
	(4, 'PANAMÃ', NULL, NULL, 1, 1),
	(5, 'COLOMBIA', NULL, NULL, 1, 1);
/*!40000 ALTER TABLE `pagina` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.pagina_has_contenido
CREATE TABLE IF NOT EXISTS `pagina_has_contenido` (
  `idPagina` int(11) NOT NULL,
  `idContenido` int(11) NOT NULL,
  `orden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPagina`,`idContenido`),
  KEY `fk_pagina_has_contenido_contenido1_idx` (`idContenido`),
  KEY `fk_pagina_has_contenido_pagina1_idx` (`idPagina`),
  CONSTRAINT `fk_pagina_has_contenido_contenido1` FOREIGN KEY (`idContenido`) REFERENCES `contenido` (`idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagina_has_contenido_pagina1` FOREIGN KEY (`idPagina`) REFERENCES `pagina` (`idPagina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.pagina_has_contenido: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `pagina_has_contenido` DISABLE KEYS */;
INSERT INTO `pagina_has_contenido` (`idPagina`, `idContenido`, `orden`) VALUES
	(1, 1, 0),
	(1, 2, 0),
	(4, 3, 0),
	(5, 4, 0);
/*!40000 ALTER TABLE `pagina_has_contenido` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.panel_tab
CREATE TABLE IF NOT EXISTS `panel_tab` (
  `nombre` varchar(50) NOT NULL,
  `contenido` mediumtext NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT '1',
  `idTab` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  KEY `fk_panel_tab_tabs1_idx` (`idTab`),
  CONSTRAINT `fk_panel_tab_tabs1` FOREIGN KEY (`idTab`) REFERENCES `tabs` (`idTab`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.panel_tab: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `panel_tab` DISABLE KEYS */;
INSERT INTO `panel_tab` (`nombre`, `contenido`, `estado`, `idTab`, `orden`) VALUES
	('Item 1', '<p>Holaaa 1</p>', '1', 1, 1),
	('Item 2', '<p>Holaaa 2</p>', '1', 1, 2);
/*!40000 ALTER TABLE `panel_tab` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.tabs
CREATE TABLE IF NOT EXISTS `tabs` (
  `idTab` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(45) NOT NULL,
  `class` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idTab`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.tabs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tabs` DISABLE KEYS */;
INSERT INTO `tabs` (`idTab`, `id`, `class`, `estado`) VALUES
	(1, 'tbDemo', 'tbDemo', '1');
/*!40000 ALTER TABLE `tabs` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idUsuario`, `nombre`, `usuario`, `clave`, `estado`) VALUES
	(1, 'Segundo Carmen', 'scarmen', '45629406', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;


-- Volcando estructura para tabla exsa.valores_select
CREATE TABLE IF NOT EXISTS `valores_select` (
  `valor` varchar(50) NOT NULL,
  `texto` varchar(250) NOT NULL,
  `idCampoFormulario` int(11) NOT NULL,
  KEY `fk_valores_select_campos_formulario1_idx` (`idCampoFormulario`),
  CONSTRAINT `fk_valores_select_campos_formulario1` FOREIGN KEY (`idCampoFormulario`) REFERENCES `campos_formulario` (`idCampoFormulario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla exsa.valores_select: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `valores_select` DISABLE KEYS */;
INSERT INTO `valores_select` (`valor`, `texto`, `idCampoFormulario`) VALUES
	('h', 'Hombre', 3),
	('m', 'Mujer', 3);
/*!40000 ALTER TABLE `valores_select` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
