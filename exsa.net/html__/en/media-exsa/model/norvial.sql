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

-- Volcando estructura de base de datos para norvial
CREATE DATABASE IF NOT EXISTS `norvial` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `norvial`;


-- Volcando estructura para tabla norvial.app
CREATE TABLE IF NOT EXISTS `app` (
  `textoNoticias` mediumtext,
  `url1Noticias` varchar(250) DEFAULT NULL,
  `url2Noticias` varchar(250) DEFAULT NULL,
  `textoGuia` mediumtext,
  `url1Guia` varchar(250) DEFAULT NULL,
  `url2Guia` varchar(250) DEFAULT NULL,
  `textoVideos` mediumtext,
  `url1Videos` varchar(250) DEFAULT NULL,
  `url2Videos` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla norvial.app: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `app` DISABLE KEYS */;
INSERT INTO `app` (`textoNoticias`, `url1Noticias`, `url2Noticias`, `textoGuia`, `url1Guia`, `url2Guia`, `textoVideos`, `url1Videos`, `url2Videos`) VALUES
	('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, perferendis quo voluptates tempore odit fugit veniam. Inventore deleniti quibusdam tenetur facere quod, magni quos veritatis officiis aperiam aspernatur consequatur alias.', 'noticias', '?opt=noticias', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, perferendis quo voluptates tempore odit fugit veniam. Inventore deleniti quibusdam tenetur facere quod, magni quos veritatis officiis aperiam aspernatur consequatur alias.', 'guia-norvial', '?opt=guia-norvial', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, perferendis quo voluptates tempore odit fugit veniam. Inventore deleniti quibusdam tenetur facere quod, magni quos veritatis officiis.', 'videos', '?opt=videos');
/*!40000 ALTER TABLE `app` ENABLE KEYS */;


-- Volcando estructura para tabla norvial.articulos
CREATE TABLE IF NOT EXISTS `articulos` (
  `idArticulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `url1` varchar(250) NOT NULL,
  `url2` varchar(250) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `idPagina` int(11) DEFAULT NULL,
  PRIMARY KEY (`idArticulo`),
  KEY `fk_articulos_paginas1_idx` (`idPagina`),
  CONSTRAINT `fk_articulos_paginas1` FOREIGN KEY (`idPagina`) REFERENCES `paginas` (`idPagina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla norvial.articulos: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` (`idArticulo`, `nombre`, `url1`, `url2`, `estado`, `idPagina`) VALUES
	(3, 'QUIÃ‰NES SOMOS', 'quienes-somos', '&sb-sec=quienes-somos', 1, 2),
	(4, 'MISIÃ“N', 'mision', '&sb-sec=mision', 1, 2),
	(5, 'VISIÃ“N', 'vision', '&sb-sec=vision', 1, 2),
	(6, 'VIDEOS', 'videos', '&sb-sec=videos', 1, 13),
	(7, 'GUÃA NORVIAL', 'guia-norvial', '&sb-sec=guia-norvial', 1, 12),
	(8, 'NOTICIAS', 'noticias', '&sb-sec=noticias', 1, 14),
	(9, 'DOCUMENTOS', 'documentos', '&sb-sec=documentos', 1, 6),
	(10, 'SERVICIOS', 'servicios', '&sb-sec=servicios', 1, 4),
	(11, 'RESPONSABILIDAD SOCIAL', 'responsabilidad-social', '&sb-sec=responsabilidad-social', 1, 5),
	(12, 'OBRAS SOCIALES', 'obras-sociales', '&sb-sec=obras-sociales', 1, 5),
	(13, 'EDUCACIÃ“N VIAL', 'educacion-vial', '&sb-sec=educacion-vial', 1, 5),
	(14, 'CONTACTO', 'contacto', '&sb-sec=contacto', 1, 7),
	(15, 'HISTORIA', 'historia', '&sb-sec=historia', 1, 2),
	(16, 'TRAMO', 'tramo', '&sb-sec=tramo', 1, 2),
	(17, 'PLAZO', 'plazo', '&sb-sec=plazo', 1, 2),
	(18, 'MODALIDAD', 'modalidad', '&sb-sec=modalidad', 1, 2);
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;


-- Volcando estructura para tabla norvial.articulos_has_contenidos
CREATE TABLE IF NOT EXISTS `articulos_has_contenidos` (
  `idArticulo` int(11) NOT NULL,
  `idContenido` int(11) NOT NULL,
  PRIMARY KEY (`idArticulo`,`idContenido`),
  KEY `fk_articulos_has_contenidos_contenidos1_idx` (`idContenido`),
  KEY `fk_articulos_has_contenidos_articulos1_idx` (`idArticulo`),
  CONSTRAINT `fk_articulos_has_contenidos_articulos1` FOREIGN KEY (`idArticulo`) REFERENCES `articulos` (`idArticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_articulos_has_contenidos_contenidos1` FOREIGN KEY (`idContenido`) REFERENCES `contenidos` (`idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla norvial.articulos_has_contenidos: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `articulos_has_contenidos` DISABLE KEYS */;
INSERT INTO `articulos_has_contenidos` (`idArticulo`, `idContenido`) VALUES
	(3, 1),
	(4, 2),
	(5, 3),
	(10, 13),
	(11, 20),
	(14, 21),
	(15, 24),
	(16, 25),
	(17, 26),
	(18, 27);
/*!40000 ALTER TABLE `articulos_has_contenidos` ENABLE KEYS */;


-- Volcando estructura para tabla norvial.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `idBanner` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `linkImagen` varchar(250) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idBanner`),
  KEY `fk_banners_usuarios1_idx` (`idUsuario`),
  CONSTRAINT `fk_banners_usuarios1_idx` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla norvial.banners: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` (`idBanner`, `nombre`, `linkImagen`, `estado`, `idUsuario`) VALUES
	(1, 'Cover1', 'slider-images/cover1.jpg', 1, 1),
	(2, 'Cover2', 'slider-images/cover2.jpg', 1, 1);
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;


-- Volcando estructura para tabla norvial.contenidos
CREATE TABLE IF NOT EXISTS `contenidos` (
  `idContenido` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) DEFAULT NULL,
  `urlImagen` mediumtext,
  `contenido` mediumtext NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idContenido`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla norvial.contenidos: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `contenidos` DISABLE KEYS */;
INSERT INTO `contenidos` (`idContenido`, `titulo`, `urlImagen`, `contenido`, `estado`) VALUES
	(1, 'QuiÃ©nes Somos', NULL, 'Somos Norvial, empresa que administra la Red Vial NÂ° 5, nuestra responsabilidad es supervisar, operar, construir y dar mantenimiento a la infraestructura vÃ­al en la ruta AncÃ³n -  Huacho â€“ Pativilca de la Carretera Panamericana Norte. Conforme dicta el acuerdo al contrato de concesiÃ³n suscrito con el Estado.', 1),
	(2, 'MisiÃ³n', NULL, 'Nuestra misiÃ³n consiste en participar eficientemente en el desarrollo de la infraestructura nacional de carreteras, dando mantenimiento  y gestiÃ³n adecuados a la carretera a travÃ©s del tiempo, con la finalidad de proporcionar seguridad, comodidad y economÃ­a a los vehÃ­culos, viajeros y poblaciones vecinas a la carretera, contribuyendo de esta manera al progreso regional y nacional.', 1),
	(3, 'VisiÃ³n', NULL, 'En los prÃ³ximos aÃ±os el PerÃº habrÃ¡ desarrollado de manera importante su infraestructura vial, integrando eficientemente su territorio para comunicar a sus poblaciones. La concesiÃ³n AncÃ³n â€“ Huacho â€“ Pativilca, como la primera de su generaciÃ³n, habrÃ¡ contribuido de manera importante con su ejemplo a sentar las bases de este importante desarrollo.', 1),
	(13, 'Servicios', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio maiores repellat magni, assumenda optio omnis sed error aut eos officia nulla neque quibusdam accusantium voluptatum facere laudantium fuga et earum.', 1),
	(20, 'Responsabilidad Social', NULL, 'Nuestro compromiso impulsa el crecimiento y desarrollo de las comunidades aledaÃ±as, a partir del acceso a mejoras de las infraestructuras pÃºblicas y el desarrollo de las capacidades de cada una de ellas; promoviendo conductas responsables, conscientes y seguras sobre su bienestar. Desde fomentar prÃ¡cticas y acciones sobre el cuidado del medio ambiente hasta enfocados en fomentar una cultura vial en los usuarios y las comunidades aledaÃ±as al tramo; ademÃ¡s de difundir el cuidado consciente de nuestro medio ambiente.', 1),
	(21, 'Datos de contacto', NULL, 'TelÃ©fono: 203-5160 Fax: 203-5189<br /><br />\nCorreo: atencion_al_cliente@norvial.com.pe<br /><br />\nDirecciÃ³n: Av. Paseo de la RepÃºblica 4675 | Surquillo - Lima 34 - PerÃº.', 1),
	(23, 'Demo', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, perferendis quo voluptates tempore odit fugit veniam. Inventore deleniti quibusdam tenetur facere quod, magni quos veritatis officiis aperiam aspernatur consequatur alias.', 1),
	(24, 'Historia', NULL, 'El 15 de enero del 2003 se firmÃ³ el contrato de concesiÃ³n entre el Estado Peruano, representado por el Ministerio de Transportes y Comunicaciones, y Norvial S.A. para la entrega en concesiÃ³n por 25 aÃ±os del tramo AncÃ³n â€“ Huacho â€“ Pativilca de la carretera Panamericana Norte. Este tramo tambiÃ©n se denomina la Red Vial 5. <br /><br />\nEste proyecto ha sido el primero de su generaciÃ³n, como parte de una polÃ­tica de desarrollo de carreteras mediante concesiones viales en el PerÃº.  En los aÃ±os siguientes el Estado ha otorgado en concesiÃ³n muchos otros tramos de carretera bajo esta modalidad. <br /><br />\nEn una concesiÃ³n vial como la Red Vial 5, el concesionario actÃºa por cuenta del Estado, responsabilizÃ¡ndose por cumplir todas las obligaciones que le han sido impuestas, incluyendo la construcciÃ³n y mantenimiento de carreteras, asÃ­ como  brindar servicios a los usuarios de la carretera, cobrando las tarifas seÃ±aladas en el contrato de concesiÃ³n, y actuando en el marco de las leyes del PerÃº. <br /><br />\n', 1),
	(25, 'Tramo', NULL, 'El tramo AncÃ³n â€“ Huacho â€“ Pativilca de la carretera Panamericana Norte. Incluye: El SerpentÃ­n de Pasamayo (de 22 kilÃ³metros de longitud). La autopista AncÃ³n â€“ Huacho, de 103 kilÃ³metros, empezando en el kilÃ³metro 44, en el intercambio vial de AncÃ³n, hasta el ingreso a la ciudad de Huacho. Esta es una autopista de doble calzada. La carretera Huacho â€“ Pativilca, de 57 kilÃ³metros de longitud, que une las ciudades de Huacho, Huaura, Medio Mundo, Supe, Barranca y Pativilca.<br />\n<br />\nTodo el tramo hace en total una distancia de 182 Km., en los que, considerando las dobles calzadas, a la fecha existen 285 Km. de vÃ­a, que se convertirÃ¡n en 342 Km cuando se concluya la segunda etapa, la misma que actualmente se haya en construcciÃ³n.', 1),
	(26, 'Plazo', NULL, 'La concesiÃ³n se otorga por 25 aÃ±os, empezando a contar desde el 15 de enero de 2003. ', 1),
	(27, 'Modalidad', NULL, 'La concesiÃ³n es autofinanciada, a tÃ­tulo oneroso. Norvial cobra peaje incluido IGV  y debe pagar el 5.5% de la recaudaciÃ³n neta a favor del Ministerio de Transportes. ', 1);
/*!40000 ALTER TABLE `contenidos` ENABLE KEYS */;


-- Volcando estructura para tabla norvial.documentos
CREATE TABLE IF NOT EXISTS `documentos` (
  `idDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `urlImagen` mediumtext NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `peso` varchar(45) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `link` mediumtext NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `idArticulo` int(11) NOT NULL,
  PRIMARY KEY (`idDocumento`),
  KEY `fk_documentos_articulos1_idx` (`idArticulo`),
  CONSTRAINT `fk_documentos_articulos1` FOREIGN KEY (`idArticulo`) REFERENCES `articulos` (`idArticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla norvial.documentos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
INSERT INTO `documentos` (`idDocumento`, `titulo`, `urlImagen`, `tipo`, `peso`, `descripcion`, `link`, `estado`, `idArticulo`) VALUES
	(9, 'DÃPTICO INFORMATIVO DEL PROYECTO', 'images/docs/DIPTICO-INFORMATIVO-DEL-PROYECTO.jpg', 'pdf', '830.37 KB', 'MÃ¡s de 45 aÃ±os despuÃ©s de proyectada, la construcciÃ³n de la VÃ­a Expresa Sur estÃ¡ por iniciarse', 'documentos/dipticoviaexpresasur.pdf', 1, 9),
	(10, 'TRÃPTICO DE IDENTIFICACIÃ“N Y RECONOCIMIENTO DE LOS PREDIOS EN LA ZONA DE INFLUENCIA DE LA VÃA EXPRESA SUR', 'images/docs/TRIPTICO-DE-IDENTIFICACION-Y-RECONOCIMIENTO-DE-LOS-PREDIOS-EN-LA-ZONA-DE-INFLUENCIA-DE-LA-VIA-EXPRESA-SUR.jpg', 'pdf', '422.16 KB', 'IdentificaciÃ³n y reconocimiento paso a paso', 'documentos/triptico.pdf', 1, 9),
	(12, 'RESOLUCION DIRECTORAL DEL MINISTERIO DE TRANSPORTES Y COMUNICACIONES DEL PERU NÂ° 072-2015-MTC/16', 'images/docs/RESOLUCION-DIRECTORAL-DEL-MINISTERIO-DE-TRANSPORTES-Y-COMUNICACIONES-DEL-PERU-N-072-2015-MTC16.jpg', 'pdf', '1.09 MB', 'Ministerio de Transportes y Comunicaciones del PerÃº otorga la CertificaciÃ³n Ambiental al proyecto de la VÃ­a Expresa Sur', 'documentos/resolucion_directoral_0722015mtc16.pdf', 1, 9);
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;


-- Volcando estructura para tabla norvial.enlacesexternos
CREATE TABLE IF NOT EXISTS `enlacesexternos` (
  `idEnlaceExterno` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  `link` mediumtext NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idEnlaceExterno`),
  KEY `fk_enlacesexternos_usuarios1_idx` (`idUsuario`),
  CONSTRAINT `fk_enlacesexternos_usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla norvial.enlacesexternos: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `enlacesexternos` DISABLE KEYS */;
INSERT INTO `enlacesexternos` (`idEnlaceExterno`, `descripcion`, `link`, `estado`, `idUsuario`) VALUES
	(1, 'Ministerio de Transportes', 'http://www.mtc.gob.pe/portal/inicio.html', 1, 1),
	(2, 'Ositran', 'http://www.ositran.gob.pe/0/home.aspx', 1, 1),
	(3, 'Municipalidad de AncÃ³n', 'http://www.muniancon.gob.pe/portal/', 1, 1),
	(4, 'Municipalidad de Barranca', 'http://www.munibarranca.gob.pe/', 1, 1),
	(5, 'Municipalidad de Huaral', 'http://pomu.munihuaral.gob.pe/', 1, 1),
	(6, 'Municipalidad de Pativilca', 'http://www.munipativilca.gob.pe/', 1, 1),
	(7, 'Municipalidad de Pativilca', 'http://www.munipativilca.gob.pe/', 1, 1);
/*!40000 ALTER TABLE `enlacesexternos` ENABLE KEYS */;


-- Volcando estructura para tabla norvial.guianorvial
CREATE TABLE IF NOT EXISTS `guianorvial` (
  `idGuiaNorvial` int(11) NOT NULL AUTO_INCREMENT,
  `idArticulo` int(11) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `link` mediumtext NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idGuiaNorvial`),
  KEY `fk_guiaNorvial_articulos1_idx` (`idArticulo`),
  CONSTRAINT `fk_guiaNorvial_articulos1` FOREIGN KEY (`idArticulo`) REFERENCES `articulos` (`idArticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla norvial.guianorvial: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `guianorvial` DISABLE KEYS */;
INSERT INTO `guianorvial` (`idGuiaNorvial`, `idArticulo`, `descripcion`, `titulo`, `link`, `estado`) VALUES
	(1, 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'GuÃ­a del norte chico', 'http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf?mode=mini&amp;backgroundColor=%23222222&amp;documentId=110913171549-e0339567883145aebec915e179deb05c', 1),
	(2, 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'AncÃ³n - Huaral', 'http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf?mode=mini&amp;backgroundColor=%23222222&amp;documentId=110913172642-f95e67ae3a324753bd857459e2aacd63', 1),
	(3, 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Huaral - Huacho', 'http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf?mode=mini&amp;backgroundColor=%23222222&amp;documentId=110913175516-edd32f4704284b4abad7c7ba41391f15', 1),
	(4, 7, 'Esta guÃ­a es parte de nuestra apuesta por el desarrollo local y el crecimiento del turismo, \n\nprincipalmente el interno. En ella no sÃ³lo hemos recogido los recursos turÃ­sticos de mayor \n\ninterÃ©s que existen a lo largo de la concesiÃ³n, sino que hacemos un detallado recuento de los \n\nservicios que el viajero puede encontrar en ella. TambiÃ©n queremos ir mÃ¡s allÃ¡, ofreciendo toda \n\nla informaciÃ³n necesaria para que el viajero pueda acceder a varios de los lugares de mayor \n\ninterÃ©s a los que se llega desde la concesiÃ³n: el valle de Huaral y Rupac, los baÃ±os termales y \n\nlas iglesias doctrinarias de OyÃ³n y la ciudadela Caral que presentamos en las denominadas \n\nRutas de Escape.', 'Huacho - Pativilca', 'http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf?mode=mini&backgroundColor=%23222222&documentId=110913175902-7485d3b23acf40b2b24a5485b210281a', 1);
/*!40000 ALTER TABLE `guianorvial` ENABLE KEYS */;


-- Volcando estructura para tabla norvial.noticias
CREATE TABLE IF NOT EXISTS `noticias` (
  `idNoticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `url1` mediumtext,
  `url2` mediumtext,
  `imagen1` mediumtext,
  `imagen2` mediumtext,
  `imagen3` mediumtext,
  `contenido` mediumtext NOT NULL,
  `idArticulo` int(11) NOT NULL DEFAULT '8',
  `estado` varchar(45) NOT NULL DEFAULT '1',
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`idNoticia`),
  KEY `fk_noticias_articulos1_idx` (`idArticulo`),
  CONSTRAINT `fk_noticias_articulos1` FOREIGN KEY (`idArticulo`) REFERENCES `articulos` (`idArticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla norvial.noticias: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
INSERT INTO `noticias` (`idNoticia`, `titulo`, `url1`, `url2`, `imagen1`, `imagen2`, `imagen3`, `contenido`, `idArticulo`, `estado`, `fecha`) VALUES
	(7, 'Cientos gozaron en Ã¡mbar con IX Festival del Queso 2015', 'cientos-gozaron-en-ambar-con-ix-festival-del-queso-2015', '?not=cientos-gozaron-en-ambar-con-ix-festival-del-queso-2015', 'images/noticias/cientos-gozaron-en-ambar-con-ix-festival-del-queso-2015-1.jpg', 'images/noticias/cientos-gozaron-en-ambar-con-ix-festival-del-queso-2015-2.jpg', '', 'En medio de ritmo, color y sabor se desarrollÃ³ el IX noveno festival del Queso de Ãmbar (Provincia de Huaura), en medio de gran expectativa y ante la presencia de cientos de visitantes.<br />\n<br />\nUna variopinta gama de quesos fueron exhibidos en diferentes stands donde los productores hacÃ­an gala de sus dotes de preparaciÃ³n ante un jurado calificador encargado de la elecciÃ³n del mejor de ellos.<br />\n<br />\nLa gastronomÃ­a y las bondades frutÃ­colas de la zona tambiÃ©n estuvieron presentes en un ambiente de fiesta que cautivÃ³ a propios y extraÃ±os.<br />\n<br />\nâ€œQueremos que la provincia conozca mÃ¡s sobre nuestra querida Ãmbar, la sucursal del cielo, y vea el potencial de nuestros productores de queso que es el producto banderaâ€ dijo, SimÃ³n Alor, alcalde distrital.<br />\n<br />\nTras estas palabras se procediÃ³ a la premiaciÃ³n de los ganadores a la mejor producciÃ³n de queso con tres vaquillones, asÃ­ como tambiÃ©n a los mejores platillos de la zona presentes en el festival.<br />\n<br />\nUna delegaciÃ³n de autoridades provinciales y representantes de la sociedad civil se hizo presente para disfrutar de esta fiesta popular que fue galardonada por la banda de mÃºsica de la instituciÃ³n educativa emblemÃ¡tica Luis Fabio Xammar.', 8, '1', '2015-06-02 18:04:41'),
	(8, 'VECINOS DE BARRANCO Y SURCO PARTICIPARON EN AUDIENCIAS PÃšBLICAS SOBRE PROYECTO VÃA EXPRESA SUR', NULL, NULL, 'images/noticias/vecinos-de-barranco-y-surco-participaron-en-audiencias-publicas-sobre-proyecto-via-expresa-sur-1.jpg', '', '', 'Los vecinos de los distritos de Barranco y Surco participaron en las audiencias pÃºblicas sobre el proyecto VÃ­a Expresa Sur, obra vial a implementarse desde Barranco hasta la Panamericana Sur. Este espacio de participaciÃ³n ciudadana fue organizado por la Municipalidad Metropolitana de Lima, a travÃ©s de la Gerencia de PromociÃ³n de la InversiÃ³n Privada y la concesionaria del proyecto VÃ­a Expresa Sur. Durante las jornadas, realizadas del 16 al 18 de octubre del presente aÃ±o, los funcionarios ediles y de la empresa concesionaria absolvieron las distintas interrogantes formuladas por los vecinos de ambos distritos.', 8, '1', '2014-07-05 13:02:02');
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;


-- Volcando estructura para tabla norvial.paginas
CREATE TABLE IF NOT EXISTS `paginas` (
  `idPagina` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `url1` varchar(250) NOT NULL,
  `url2` varchar(250) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `idUsuario` int(11) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '1',
  `orden` int(11) NOT NULL,
  PRIMARY KEY (`idPagina`),
  KEY `fk_paginas_usuarios_idx` (`idUsuario`),
  CONSTRAINT `fk_paginas_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla norvial.paginas: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `paginas` DISABLE KEYS */;
INSERT INTO `paginas` (`idPagina`, `nombre`, `url1`, `url2`, `estado`, `idUsuario`, `tipo`, `orden`) VALUES
	(0, 'SIN PÃGINA', '', '', 0, 1, 0, 0),
	(1, 'INICIO', 'inicio', '?opt=inicio', 1, 1, 1, 1),
	(2, 'QUIÃ‰NES SOMOS', 'quienes-somos', '?opt=quienes-somos', 1, 1, 1, 2),
	(3, 'LA CONCESIÃ“N', 'concesion', '?opt=concesion', 1, 1, 1, 3),
	(4, 'SERVICIOS', 'servicios', '?opt=servicios', 1, 1, 1, 4),
	(5, 'RESPONSABILIDAD SOCIAL', 'responsabilidad-social', '?opt=responsabilidad-social', 1, 1, 1, 5),
	(6, 'DOCUMENTOS', 'documents', '?opt=documents', 1, 1, 1, 6),
	(7, 'CONTÃCTANOS', 'contacto', '?opt=contacto', 1, 1, 1, 7),
	(12, 'GUIA NORVIAL', 'guia-norvial', '?opt=guia-norvial', 1, 1, 0, 8),
	(13, 'VIDEOS', 'videos', '?opt=videos', 1, 1, 0, 9),
	(14, 'NOTICIAS', 'noticias', '?opt=noticias', 1, 1, 0, 10);
/*!40000 ALTER TABLE `paginas` ENABLE KEYS */;


-- Volcando estructura para tabla norvial.paginas_has_contenidos
CREATE TABLE IF NOT EXISTS `paginas_has_contenidos` (
  `idPagina` int(11) NOT NULL,
  `idContenido` int(11) NOT NULL,
  PRIMARY KEY (`idPagina`,`idContenido`),
  KEY `fk_paginas_has_contenidos_contenidos1_idx` (`idContenido`),
  KEY `fk_paginas_has_contenidos_paginas1_idx` (`idPagina`),
  CONSTRAINT `fk_paginas_has_contenidos_contenidos1` FOREIGN KEY (`idContenido`) REFERENCES `contenidos` (`idContenido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_paginas_has_contenidos_paginas1` FOREIGN KEY (`idPagina`) REFERENCES `paginas` (`idPagina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla norvial.paginas_has_contenidos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `paginas_has_contenidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `paginas_has_contenidos` ENABLE KEYS */;


-- Volcando estructura para tabla norvial.redes_sociales
CREATE TABLE IF NOT EXISTS `redes_sociales` (
  `idRedesSociales` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `link` mediumtext NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idRedesSociales`),
  KEY `fk_redes_sociiales_usuarios1_idx` (`idUsuario`),
  CONSTRAINT `fk_redes_sociiales_usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla norvial.redes_sociales: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `redes_sociales` DISABLE KEYS */;
INSERT INTO `redes_sociales` (`idRedesSociales`, `nombre`, `link`, `estado`, `idUsuario`) VALUES
	(1, 'Facebook', 'https://www.facebook.com/Norvial?fref=ts', 1, 1),
	(2, 'Twitter', '#', 0, 1),
	(3, 'Youtube', 'https://www.youtube.com/channel/UC375WtjRwN0Z0r0egrO174A', 1, 1);
/*!40000 ALTER TABLE `redes_sociales` ENABLE KEYS */;


-- Volcando estructura para tabla norvial.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla norvial.roles: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`idRol`, `descripcion`) VALUES
	(1, 'SuperAdmin'),
	(2, 'Admin'),
	(3, 'Redactor'),
	(4, 'Usuario');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Volcando estructura para tabla norvial.roles_has_secciones
CREATE TABLE IF NOT EXISTS `roles_has_secciones` (
  `idRol` int(11) DEFAULT NULL,
  `idSeccion` int(11) DEFAULT NULL,
  KEY `fk_roles_has_secciones_roles1` (`idRol`),
  KEY `fk_roles_has_secciones_secciones1` (`idSeccion`),
  CONSTRAINT `fk_roles_has_secciones_roles1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_roles_has_secciones_secciones1` FOREIGN KEY (`idSeccion`) REFERENCES `secciones` (`idSeccion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla norvial.roles_has_secciones: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `roles_has_secciones` DISABLE KEYS */;
INSERT INTO `roles_has_secciones` (`idRol`, `idSeccion`) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(1, 4),
	(1, 5),
	(1, 6),
	(1, 7),
	(1, 8),
	(1, 9),
	(1, 10),
	(2, 1),
	(2, 2),
	(2, 3),
	(2, 4),
	(2, 5),
	(2, 6),
	(2, 7),
	(2, 8),
	(2, 9);
/*!40000 ALTER TABLE `roles_has_secciones` ENABLE KEYS */;


-- Volcando estructura para tabla norvial.secciones
CREATE TABLE IF NOT EXISTS `secciones` (
  `idSeccion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `referencia` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  PRIMARY KEY (`idSeccion`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla norvial.secciones: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `secciones` DISABLE KEYS */;
INSERT INTO `secciones` (`idSeccion`, `nombre`, `referencia`, `estado`) VALUES
	(1, 'PÃ¡ginas', 'paginas', 1),
	(2, 'ArtÃ­culos', 'articulos', 1),
	(3, 'Contenidos', 'contenidos', 1),
	(4, 'Noticias', 'noticias', 1),
	(5, 'GuÃ­a Norvial', 'guianorvial', 1),
	(6, 'Videos', 'videos', 1),
	(7, 'Documentos', 'documentos', 1),
	(8, 'Enlaces Externos', 'enlacesexternos', 1),
	(9, 'Banners', 'banners', 1),
	(10, 'Usuarios', 'usuarios', 1);
/*!40000 ALTER TABLE `secciones` ENABLE KEYS */;


-- Volcando estructura para tabla norvial.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `idRol` int(11) NOT NULL DEFAULT '1',
  `avatar` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_usuarios_roles1_idx` (`idRol`),
  CONSTRAINT `fk_usuarios_roles1_idx` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla norvial.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idUsuario`, `nombre`, `usuario`, `clave`, `estado`, `idRol`, `avatar`) VALUES
	(1, 'Segundo Carmen', 'scarmen', '45629406', 1, 1, 'segundo.jpg'),
	(4, 'Jorge Maza', 'jmaza', 'jmaza', 1, 2, 'jorge-maza.jpg');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;


-- Volcando estructura para tabla norvial.videos
CREATE TABLE IF NOT EXISTS `videos` (
  `idVideo` int(11) NOT NULL AUTO_INCREMENT,
  `idArticulo` int(11) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '1',
  `descripcion` mediumtext,
  `titulo` varchar(250) NOT NULL,
  `link` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idVideo`),
  KEY `fk_videos_articulos1_idx` (`idArticulo`),
  CONSTRAINT `fk_videos_articulos1` FOREIGN KEY (`idArticulo`) REFERENCES `articulos` (`idArticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla norvial.videos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` (`idVideo`, `idArticulo`, `tipo`, `descripcion`, `titulo`, `link`, `estado`) VALUES
	(1, 6, 1, 'Lorem ipsum dolor sit amet.', 'GyM - NORVIAL Seguridad Vial', 'https://www.youtube.com/embed/kzblhMjPSog', 1),
	(2, 6, 1, 'Conozcamos las distintas formas en cÃ³mo podemos cuidar el medio ambiente, gracias a los \n\nconsejos y tips NORVIAL.', 'NORVIAL Video Ambiental', 'https://www.youtube.com/embed/Y0Jaq-27z5Y', 1);
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
