<?php
	define("_URL_", "https://exsa.net/");
	$title = "Exsa - soluciones";
	$descripcion = "";
	$keywords = "Exsa, soluciones";
	$titulo_oculto = "";
	if (!isset($_GET['sec'])){
		$title = "Exsa - soluciones exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		$descripcion = "Conoce más de Exsa, nuestros productos y servicios orientados a las necesidades de nuestros clientes";
		$keywords = "Exsa, soluciones exactas, fragmentación de roca, industria minera, minería, infraestructura, servicios, productos, responsabilidad social, La Tecnología Quantex, presencia regional, asistencia técnica";
	}else{
		switch ($_GET['sec']) {
			case "http://exsa.net/":
				$title = "EXSA Soluciones Exactas";
				$titulo_oculto = "EXSA Soluciones Exactas";
				$descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
				$keywords = "Exsa, exsa soluciones, soluciones, soluciones exactas, fragmentación de roca, fragmentación roca, roca, voladura, voladuras, minería, minería subterránea, tajo abierto, tajo, productos exsa, servicios exsa, industria minera, mineras, infraestructura, responsabilidad social, tecnología, tecnología quantex, quantex, presencia regional, asistencia técnica, empresa responsable, empresa socialmente responsable, socialmente responsable";
				break;
		    case "nosotros":
		        $title = "EXSA Soluciones Exactas - Nosotros";
		        $titulo_oculto = "EXSA Soluciones Exactas - Nosotros";
				$descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
				$keywords = "Exsa, Soluciones exactas, fragmentación de roca, industria minera, minería, infraestructura, voladuras, tajo abierto, minería subterránea, foco en el cliente, gestión proactiva, manejo de riesgos externos, excelencia, colaboradores";
		        break;

		    case "modelo-de-negocio":
		        $title = "EXSA Soluciones Exactas – Perfil Empresarial";
		        $titulo_oculto = "EXSA Soluciones Exactas – Perfil Empresarial";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Modelo de negocio, empresa peruana, soluciones exactas, fragmentación de rocas, fragmentación, industria minera, infraestructura, cadena productiva, valor agregado, relaciones de largo plazo, soporte analítico, abastecimiento continuo, capacitación de personal, eficiencia operativa, negocios integrales, visión integral, cadena operativa";
		     	break;
		    case "mision-vision-y-valores":
		        $title = "EXSA Soluciones Exactas – Misión, Visión y Valores";
		        $titulo_oculto = "EXSA Soluciones Exactas – Misión, Visión y Valores";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto.";
		        $keywords = "Misión, visión, brindar soluciones, soluciones, fragmentación, fragmentación de roca, desarrollo sustentable, colaboradores, accionistas, sociedad, líderes globales, buena actividad, desarrollo personal, valores, generar calidad, calidad, valor agregado, productos, servicios, seguridad, exigentes normas de seguridad, cultura de respeto, integridad física, integridad mensual, colaboradores, técnicas, procedimientos, minimizar el riesgo, minimizar riesgo, minimizar accidentes, seguridad de anticipación, anticipación, evaluación de riesgos, análisis, cumplimiento de las normas, esfuerzos integrados, mejor solución, necesidades, responsables, satisfacción, integridad, honestidad, solidaridad, transparencia, conductas, prácticas integras, valores éticos, respeto, compromiso, justicia, principio de verdad, excelencia, superar expectativas, valor sostenido, alcanzar resultados, satisfacción plena, mejorar continuamente, confianza, ambiente de confianza, comunicación abierta, retos, logros, pasión, cumplir obligaciones, promover el desarrollo, cuidado del medio ambiente, medio ambiente, comunidades, bienestar, entorno";
		    	# code...
		    	break;
		    case "historia":
		        $title = "EXSA Soluciones Exactas - Historia";
		        $titulo_oculto = "EXSA Soluciones Exactas - Historia";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto.";
		        $keywords = "Historia, línea de tiempo, exsa, explosivos, 1959, inicia operaciones, Lurín, exigentes niveles de seguridad, tecnología, 1960, compañía peruana, electrodos oerlikon, producción de electrodos, consumibles para soldadura, moderna tecnología, maquinaria, equipos, soldadura, 1964, 1971, fusión, división soldaduras, 1977, planta fundentes, arco sumergido, 1992, emulsiones explosivas, 1995, remodelación, 1996, fontangern Latinoamérica, 1997, autoabastecimiento, ácido nítrico, segunda planta, sama, las yaras, Tacna, frontera sur, perú, 2000, centro tecnológico de voladora, ctve, capacitaciones, exportación, dinamitas, mercado norteamericano, 2003, certificado iso 9001, gestión de calidad, 2004, iso 14001, gestión ambiental, 2006, certificación basc, 2007, valores lurin, soldexa, asociación de buenos empleadores, certificación ohsas 18001, 2010, panamá, 2013, Colombia, cambio de imagen";
		    	# code...
		    	break;
		    case "equipo-directivo":
		        $title = "EXSA Soluciones Exactas – Equipo Directivo";
		        $titulo_oculto = "EXSA Soluciones Exactas – Equipo Directivo";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto.";
		        $keywords = "Karl Maslo, Gustavo Gómez-Sánchez, Francisco Vásquez, Nancy Fernández, Alex Fry, Ronald Añazco, Tommy Muhvic-Pintar, César Velasco, Heberth Ruíz, Aldolfo Sánchez, equipo directivo, ceo regional, gerente general, perú, gerente cadena suministro, gerente gestión humana, gerente administración y finanzas, gerente comercial, gerente regional marketing, gerente desarrollo negocios internacionales, gerente producción, gerente sustentabilidad";
		    	# code...
		    	break;
		    case "peru":
		        $title = "EXSA Soluciones Exactas – Presencia Regional: Perú";
		        $titulo_oculto = "EXSA Soluciones Exactas – Presencia Regional: Perú";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Presencia regional, presencia internacional, perú, peru, chile, Colombia, panamá, minería Colombia, minería chile, minería panamá, minería peru, exsa, soluciones exactas, fragmentación de roca, industria minera, minería, infraestructura, voladuras, tajo abierto, minería subterránea, foco en el cliente, Exsa Perú, Exsa Colombia, Exsa Chile, Exsa Panamá, INBLAST, Lurín, Trujillo, Tacna, Arequipa, Cusco, silos de emulsión, tanques cisternas, camiones fábricas, grúas, mini cargadores, módulos UBT, sistema integrado de gestión, gestión de calidad, gestión ambiental, gestión de seguridad";
		    	# code...
		    	break;
		    case "panama":
		        $title = "EXSA Soluciones Exactas – Presencia Regional: Panamá";
		        $titulo_oculto = "EXSA Soluciones Exactas – Presencia Regional: Panamá";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto.";
		        $keywords = "Presencia regional, presencia internacional, perú, peru, chile, Colombia, panamá, minería Colombia, minería chile, minería panamá, minería peru, exsa, soluciones exactas, fragmentación de roca, industria minera, minería, infraestructura, voladuras, tajo abierto, minería subterránea, foco en el cliente, Exsa Perú, Exsa Colombia, Exsa Chile, Exsa Panamá, INBLAST, Lurín, Trujillo, Tacna, Arequipa, Cusco, silos de emulsión, tanques cisternas, camiones fábricas, grúas, mini cargadores, módulos UBT, sistema integrado de gestión, gestión de calidad, gestión ambiental, gestión de seguridad";
		    	# code...
		    	break;
		    case "colombia":
		        $title = "EXSA Soluciones Exactas – Presencia Regional: Colombia";
		        $titulo_oculto = "EXSA Soluciones Exactas – Presencia Regional: Colombia";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto.";
		        $keywords = "Presencia regional, presencia internacional, perú, peru, chile, Colombia, panamá, minería Colombia, minería chile, minería panamá, minería peru, exsa, soluciones exactas, fragmentación de roca, industria minera, minería, infraestructura, voladuras, tajo abierto, minería subterránea, foco en el cliente, Exsa Perú, Exsa Colombia, Exsa Chile, Exsa Panamá, INBLAST, Lurín, Trujillo, Tacna, Arequipa, Cusco, silos de emulsión, tanques cisternas, camiones fábricas, grúas, mini cargadores, módulos UBT, sistema integrado de gestión, gestión de calidad, gestión ambiental, gestión de seguridad";
		    	# code...
		    	break;
		    case "brasil":
		        $title = "EXSA Soluciones Exactas – Presencia Regional: Brasil";
		        $titulo_oculto = "XSA Soluciones Exactas – Presencia Regional: Brasil";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto.";
		        $keywords = "Presencia regional, presencia internacional, perú, peru, chile, Colombia, panamá, minería Colombia, minería chile, minería panamá, minería peru, exsa, soluciones exactas, fragmentación de roca, industria minera, minería, infraestructura, voladuras, tajo abierto, minería subterránea, foco en el cliente, Exsa Perú, Exsa Colombia, Exsa Chile, Exsa Panamá, INBLAST, Lurín, Trujillo, Tacna, Arequipa, Cusco, silos de emulsión, tanques cisternas, camiones fábricas, grúas, mini cargadores, módulos UBT, sistema integrado de gestión, gestión de calidad, gestión ambiental, gestión de seguridad";
		    	# code...
		    	break;
		    case "gestion-de-seguridad-salud-y-ocupacional":
		        $title = "EXSA Soluciones Exactas – Gestión de Seguridad y Salud Ocupacional";
		        $titulo_oculto = "EXSA Soluciones Exactas – Gestión de Seguridad y Salud Ocupacional";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Sistema gestión de seguridad, seguridad, gestión de seguridad, salud ocupacional, norma internacional, OHSAS 18001:2007, legislación vigente, buenas prácticas, prevenir accidentes, puesta en marcha, concientizar, colaboradores, autocuidado, comportamiento, SAFEX INTERNACIONAL, INSTITUTE OF MAKERS OF EXPLOSIVES, INTERNATIONAL SOCIETY OF EXPLOSIVE ENGINEERS, altos estándares mundiales, líder en seguridad";
		    	# code...
		    	break;
		    case "gestion-de-calidad":
		        $title = "EXSA Soluciones Exactas – Gestión de Calidad";
		        $titulo_oculto = "EXSA Soluciones Exactas – Gestión de Calidad";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Sistema gestión de calidad, gestión de calidad, calidad, norma ISO 9001:2008, mejorar satisfacción, incrementar eficiencia, eficiencia en procesos, cultura de calidad, brindar soluciones, mejora continua, líneas de acción, enfoque al cliente, alineamiento estratégico, excelencia operacional, equipo de mejora continua, una idea una mejora";
		    	# code...
		    	break;
		    case "gestion-ambiental":
		        $title = "EXSA Soluciones Exactas – Gestión Ambiental";
		        $titulo_oculto = "EXSA Soluciones Exactas – Gestión Ambiental";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Desarrollo sostenible, programa de gestión ambiental, uso eficiente de recursos, recursos naturales, prevenir contaminación, monitoreo mensual, consumo de agua, energía eléctrica, combustible, papel, indicadores, generación de residuos sólidos, materiales reciclables, compromiso, colaboradores, cuidado, cultura, huella de carbono, emisiones de gases, efecto invernadero, carbono neutral";
		    	# code...
		    	break;
		    case "sistema-de-gestion-de-control-y-seguridad-basc":
		        $title = "EXSA Soluciones Exactas – Sistema de Gestión de Control y Seguridad: BASC";
		        $titulo_oculto = "EXSA Soluciones Exactas – Sistema de Gestión de Control y Seguridad: BASC";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto.";
		        $keywords = "Sistema de control y seguridad, world basc organization wbo basc, WBO BASC, BASC, prevención, organizaciones ilícitas, comercio exterior, implementación, estrictos controles de seguridad, control de seguridad, seguridad física, control de proveedores, clientes, seguridad informática, selección de personal, inspecciones de carga, confiabilidad, relaciones comerciales, clientes internacionales";
		    	# code...
		    	break;
		    case "soluciones":
		        $title = "EXSA Soluciones Exactas – Soluciones";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, servicios, productos, asistencia técnica, minería subterránea, tajo abierto, servicio integral de voladura, voladura, SIVE, servicio de mezclado, agentes de voladura, servicio de ingeniería, ingeniería, dinamitas, EXSABLOCK, SEMEXA 45, SEMEXA 65, SEMEXA 80, EXADIT 45, EXADIT 65, GELATINA ESPECIAL 75, emulsiones encartuchadas, EMULEX 45, EMULEX 65, EMULEX 80, EXAGEL-E 65, EXAGEL-E 80, SEMEXA-E 65, SEMEXA-E 80, PLASTEX-E, SLURREX AP 60, SLURREX AP 80, ANFO-EXAMON-P, emulsiones a granel, SLURREX BS, SLURREX MA, SLURREX TC, SLURREX G, NITRATO DE AMONIO, accesorios de voladura, fulminante simple n 8, mecha de seguridad, mecha rápida, detonador ensamblado, detonador no eléctrico, línea silenciosa, cordón detonante, booster pentolita";
		    	# code...
		    	break;
		    case "servicios":
		        $title = "EXSA Soluciones Exactas – Soluciones: Servicios";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Servicios";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto.";
		        $keywords = "SIVE, servicio integral de voladura, tajo abierto, procesos de voladura, accidente, uso de explosivos, explosivos, emulsiones, nitrato de amonio, calibración de camiones fábrica, transporte de explosivos, estaqueado, taladro, profundidad, accesorios de voladura, primado y carguío de taladros, áreas de influencia, volquetes, minicargadores, mini cargadores, Exsa, asistencia técnica, minería subterránea, tajo abierto, perforación, voladuras, monitoreo, vibraciones, parámetros de perforación, ANFO, velocidad de detonación, gases de voladuras, explosivos, explosiones, roca, tipo de roca, accidente, accidentes, explosión, eficiencia operacional, proceso de voladura, reducir costos, reducción de costos";
		    	# code...
		    	break;
		    case "asis-tec-en-mineria-subterranea-y-a-tajo-abierto":
		        $title = "EXSA Soluciones Exactas  Asistencia Técnica Minería Subterránea y Tajo Abierto";
		        $titulo_oculto = "EXSA Soluciones Exactas  Asistencia Técnica Minería Subterránea y Tajo Abierto";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Asistencia técnica, minería de tajo abierto, reducir costos, aumentar eficiencia, eficiencia operacional, procesos de perforación, uso de productos, aplicación de productos, monitoreo de vibraciones, campo cercano, campo lejano, monitoreo de ruido, servicio de diseño, programación, conexiones, ejecución de voladuras electrónicas, diseño de parámetros de perforación, velocidad de detonación, VOD, monitoreo, control de calidad, control de densidad de mezclas, ANFO, heavy ANFOs, evaluación técnica, explosivos, accesorios, agentes de voladura, capacitación, análisis de fragmentación de material, determinación de onda P, modelamiento de vibraciones, estudio de la onda elemental, estudio de movimiento del burden, burden, filmación de voladuras, establecer criterio de daño, determinar filtro de precorte, análisis de dispersiones de retardos, control de paredes finales, reducción de costos, guía de selección, evitar accidentes";
		    	# code...
		    	break;
		    case "servicio-integral-de-voladura-exsa-sive":
		        $title = "EXSA Soluciones Exactas – Soluciones: Servicios | Servicio Integral de Voladura";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Servicios | Servicio Integral de Voladura";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "SIVE, servicio integral de voladura, tajo abierto, procesos de voladura, accidente, uso de explosivos, explosivos, emulsiones, nitrato de amonio, calibración de camiones fábrica, transporte de explosivos, estaqueado, taladro, profundidad, accesorios de voladura, primado y carguío de taladros, áreas de influencia, volquetes, minicargadores, mini cargadores, abastecimiento de camiones, diésel 2, accesorios de voladura, estaqueado, profundidad real, diseño, altura de agua, número de malla, taladro, asegurar profundidad correcta, distribución de accesorios, tapado de taladros, amarre y conexión de taladros, ubicación de vigías, revisión y bloqueos de áreas de influencia, ejecución de voladura, soporte técnico, camiones fábrica, grúas, montacargas, silos móviles, volquetes";
		    	# code...
		    	break;
		    case "servicio-de-mezclado-de-agentes-de-voladura":
		        $title = "EXSA Soluciones Exactas – Soluciones: Servicios | Servicio de Mezclado de Agentes de Voladura";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Servicios | Servicio de Mezclado de Agentes de Voladura";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Operaciones de tajo abierto, reducir costos, aumentar eficiencia operacional, procesos de voladura, servicios, operadores certificados, camiones mezcladores de explosivos, camiones fábrica, materias primas, agentes, emulsiones, nitrato de amonio, diésel 2, calibración periódica de camiones fabrica, carguío mecánico, camiones con sistema bombeable, vaceable, gasificable, carguío homogéneo, capacidad de carga 12 a 23 TN, disponibilidad mecánica mayor a 85%";
		    	# code...
		    	break;
		    case "servicio-de-ingenieria":
		        $title = "EXSA Soluciones Exactas – Soluciones: Servicios | Servicio de Ingeniería";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Servicios | Servicio de Ingeniería";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Servicio de ingeniería, garantizar continuidad de operaciones, trabajos no tradicionales, conocimiento particular, voladuras controladas, voladuras, servicio controlado, voladuras para construcción, construcción, equipos, módulos UBT, gasificación, emulsiones, emulsión para túneles, sismógrafos, cámaras de alta velocidad, geófonos, VOD";
		    	# code...
		    	break;
		    case "productos":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, productos, dinamitas, booster, emulsiones, accesorios, anfo examon, Exsablock, Semexsa, Exadit, Gelatina especial, emulex, exagel, semexsa, plastex, slurrex, nitrato de amonio, quantex, mecha de seguridad, mecha rápida, detonador, ensamblado, booster pentolita, cordon detonante, plastex – e, dinamita, emulsion, emulsiones encartuchadas, emulsiones a granel, accesorios de voladura";
		    	# code...
		    	break;
		    case "dinamitas":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Dinamitas";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Dinamitas";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto.";
		        $keywords = "Soluciones, productos, dinamitas, booster, emulsiones, accesorios, anfo examon, Exsablock, Semexsa, Exadit, Gelatina especial, emulex, exagel, semexsa, plastex, slurrex, nitrato de amonio, quantex, mecha de seguridad, mecha rápida, detonador, ensamblado, booster pentolita, cordon detonante, plastex – e, dinamita, emulsion, emulsiones encartuchadas, emulsiones a granel, accesorios de voladura";
		    	# code...
		    	break;
		    case "exsablock":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Dinamitas: EXSABLOCK";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Dinamitas: EXSABLOCK";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto.";
		        $keywords = "Soluciones, productos, dinamitas, exsablock, dinamita de baja densidad, reducir daño al macizo rocoso, reducir niveles de vibración, disminución de sobre dilución, reducción de sobrecostos, voladura de contorno en roca blanda, coronas, hastiales, detonador 8, hoja de seguridad";
		    	# code...
		    	break;
		    case "semexsa-45-65-y-80":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Dinamitas: SEMEXSA";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Dinamitas: SEMEXSA";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto.";
		        $keywords = "Soluciones exsa, productos, dinamitas, semexsa, minimizar costos, roca semidura, roca dura, buena fragmentación, macizo rocoso, carguío de taladro, terrenos fracturados, reducir tiempos de manipulación, detonador 8";
		    	# code...
		    	break;
		    case "exadit-45-y-65":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Dinamitas: EXADIT";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Dinamitas: EXADIT";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones exsa, productos, dinamitas, exadit, optimizar eficiencia explotación, explotación de tajeos, poder rompedor, alto empuje, voladuras controladas, roca intermedia, roca dura, obras de gran volumen, material poco consolidado, pre facturado, detonador 8";
		    	# code...
		    	break;
		    case "gelatina-especial-75":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Dinamitas: Gelatina Especial";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Dinamitas: Gelatina Especial";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Dinamita elaborado, reducir costos, soluciones, productos, dinamitas, gelatina especial, procesos de limpieza, acarreo, chancado de material, alta velocidad de detonación, excelente fragmentación, roca dura, roca muy dura, taladros de arranque, frentes difíciles, taladros de arrastre, voladura tipo ANFO, ANFO, detonador 8";
		    	# code...
		    	break;
		    case "emulsiones-encartuchadas":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones Encartuchadas";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones Encartuchadas";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, productos, emulsiones, emulsiones encartuchadas, EMULEX 45, EMULEX 65, EMULEX 80, EXAGEL-E 65, EXAGEL-E 80, SEMEXA-E 65, SEMEXA-E 80, PLASTEX-E, SLURREX AP 60, SLURREX AP 80";
		    	# code...
		    	break;
		    case "emulex-45-65-y-80":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones Encartuchadas: EMULEX";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones Encartuchadas: EMULEX";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, productos, emulsiones, emulsiones encartuchadas, EMULEX 45, EMULEX 65, EMULEX 80, EXAGEL-E 65, EXAGEL-E 80, SEMEXA-E 65, SEMEXA-E 80, PLASTEX-E, SLURREX AP 60, SLURREX AP 80, carguío de taladros positivos, excelente consistencia, alto poder rompedor, apropiada como cebo, primera carga, taladros de diámetros pequeños, minería subterránea, tajo abierto, obras civiles, canteras, excelente resistencia al agua, taladros húmedos, taladros inundados, bajo nivel de gases, reduce tiempos muertos, barrenos de gran profundidad";
		    	# code...
		    	break;
		    case "exagel-e-65-y-80":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones Encartuchadas: EXAGEL-E";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones Encartuchadas: EXAGEL-E";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, productos, emulsiones, emulsiones encartuchadas, EMULEX 45, EMULEX 65, EMULEX 80, EXAGEL-E 65, EXAGEL-E 80, SEMEXA-E 65, SEMEXA-E 80, PLASTEX-E, SLURREX AP 60, SLURREX AP 80, emulsión explosiva, alto poder rompedor, ideal para taladros negativos, piques en rocas duras, rocas muy duras, roca dura, reduce costos de chancado, alto nivel de energía, gran capacidad de confinamiento, acoplamiento en frentes horizontales, consistencia viscosa, excelente resistencia al agua, resistente al agua, túneles, minería subterránea, galerías, desarrollos, rampas, profundización de piques, tajos de producción, taladros con agua, taladros inundados, agua dinámica";
		    	# code...
		    	break;
		    case "semexsa-e-65-y-80":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones Encartuchadas: SEMEXSA-E";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones Encartuchadas: SEMEXSA-E";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, productos, emulsiones, emulsiones encartuchadas, EMULEX 45, EMULEX 65, EMULEX 80, EXAGEL-E 65, EXAGEL-E 80, SEMEXA-E 65, SEMEXA-E 80, PLASTEX-E, SLURREX AP 60, SLURREX AP 80, papel parafinado, alto rendimiento, buen poder rompedor, taladros de difícil carguío, plasticidad, buen acoplamiento, excelente resistencia al agua, resistencia al agua, taladros sumergidos, detonador 8";
		    	# code...
		    	break;
		    case "plastex-e":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones Encartuchadas: PLASTEX-E";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones Encartuchadas: PLASTEX-E";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, productos, emulsiones, emulsiones encartuchadas, EMULEX 45, EMULEX 65, EMULEX 80, EXAGEL-E 65, EXAGEL-E 80, SEMEXA-E 65, SEMEXA-E 80, PLASTEX-E, SLURREX AP 60, SLURREX AP 80, emulsión moldeable, adherente, voladuras secundarias, eliminación de bolones, minería, obras civiles, componentes energizantes, agentes sensibilizantes, alta velocidad, presión de detonación, detonador 8";
		    	# code...
		    	break;
		    case "slurrex-ap-60-y-80":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones Encartuchadas: SLURREX AP";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones Encartuchadas: SLURREX AP";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, productos, emulsiones, emulsiones encartuchadas, EMULEX 45, EMULEX 65, EMULEX 80, EXAGEL-E 65, EXAGEL-E 80, SEMEXA-E 65, SEMEXA-E 80, PLASTEX-E, SLURREX AP 60, SLURREX AP 80, emulsión encartuchada, lamina plástica, sacos de polipropileno, reduce costos de carguío, taladros inundados, operaciones de tajo abierto, taladros sumergidos, agua dinámica, soporta altas presiones hidrostáticas, mejor fragmentación, desplazamiento de roca";
		    	# code...
		    	break;
		    case "anfo-examon-p":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | ANFO EXAMON P";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | ANFO EXAMON P";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $titulo_oculto = "";
		        $keywords = "Soluciones, productos, emulsiones, emulsiones encartuchadas, agente de voladura, versatilidad, alto nivel de energía, alto volumen de gases, excelente fragmentación de rocas, baja sensibilidad, excelente desempeño, empuje de roca, minería, obras civiles, nitrato de amonio, aditivos antiestáticos, carguío neumático, barrenos secos, tajo abierto, subterránea, canteras, voladura";
		    	# code...
		    	break;
		    case "nitrato-de-amonio":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Nitrato de Amonio";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Nitrato de Amonio";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, servicios, productos, baja densidad, minimizar costos, buena fragmentación, fragmentación de roca, elevada velocidad de detonación, fabricación de ANFO, ANFO, perforación de grandes diámetros, perforaciones grandes, minería, obras civiles, diésel 2";
		    	# code...
		    	break;
		    case "emulsiones-a-granel":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones a Granel";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones a Granel";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, servicios, productos, emulsiones a granel, emulsiones, SLURREX BS, SLURREX MA, SLURREX TC, SLURREX G";
		    	# code...
		    	break;
		    case "slurrex-bs":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones a Granel: SLURREX BS";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones a Granel: SLURREX BS";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, servicios, productos, emulsiones a granel, emulsiones, SLURREX BS, SLURREX MA, SLURREX TC, SLURREX G, dinamita, minimiza costos de chancado, voladuras, roca semidura, roca dura, buena fragmentación, macizo rocoso, carguío de taladros, terrenos fracturados, reducir tiempos de manipulación, emulsión gasificable";
		    	# code...
		    	break;
		    case "slurrex-ma":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones a Granel: SLURREX MA";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones a Granel: SLURREX MA";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, servicios, productos, emulsiones a granel, emulsiones, SLURREX BS, SLURREX MA, SLURREX TC, SLURREX G, emulsión oxidante, carguío mecanizado, minería, tajo abierto, taladros de gran diámetro, agente de voladura, gran poder rompedor, no sensitiva al booster, ANFO,  ";
		    	# code...
		    	break;
		    case "slurrex-tc":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones a Granel: SLURREX TC";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones a Granel: SLURREX TC";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, servicios, productos, emulsiones a granel, emulsiones, SLURREX BS, SLURREX MA, SLURREX TC, SLURREX G, taladros calientes, minimiza generación de humos naranjas, taladros grandes, gran diámetro, minería superficial, emulsión no sensitiva al booster, ANFO";
		    	# code...
		    	break;
		    case "slurrex-g":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones a Granel: SLURREX G";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Emulsiones a Granel: SLURREX G";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, servicios, productos, emulsiones a granel, emulsiones, SLURREX BS, SLURREX MA, SLURREX TC, SLURREX G, reducción de gases nitrosos, usar en taladro con agua, reducción de costos, control de densidad, gran poder energético, aplicable a taladros de grandes dimensiones, taladros grandes, emulsión gasificable, bombeo al taladro, sales especiales";
		    	# code...
		    	break;
		    case "accesorios-de-voladura":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, productos, accesorios de voladura, fulminante simple 8, mecha de seguridad, mecha rápida, detonador ensamblado, detonador no eléctrico, línea silenciosa, cordón detonante, booster pentolita";
		    	# code...
		    	break;
		    case "fulminante-simple-n-8":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura: Fulminante Simple N.8";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura: Fulminante Simple N.8";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, productos, accesorios de voladura, fulminante simple 8, mecha de seguridad, mecha rápida, detonador ensamblado, detonador no eléctrico, línea silenciosa, cordón detonante, booster pentolita, voladura, casquillo cilíndrico de aluminio, carga primaria, explosivo sensible a la chispa, carga segundaria, alto poder explosivo, buen funcionamiento";
		    	# code...
		    	break;
		    case "mecha-de-seguridad":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura: Mecha de Seguridad";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura: Mecha de Seguridad";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, productos, accesorios de voladura, voladura, mecha de seguridad, sistema tradicional, capas de diferentes materiales, núcleo de pólvora, recubrimiento plástico, excelente impermeabilidad, buena resistencia a la abrasión, alta potencia, chispa activa";
		    	# code...
		    	break;
		    case "mecha-rapida":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura: Mecha Rápida";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura: Mecha Rápida";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, productos, accesorios de voladura, voladura, sistema tradicional, complementa, fulminante simple, conector de ignición, ranura de conectores, collar plástico";
		    	# code...
		    	break;
		    case "detonador-ensamblado":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura: Detonador Ensamblado";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura: Detonador Ensamblado";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, servicios, productos, accesorios de voladura, voladura, detonador ensamblado, fulminante simple 8, cobertura plástica reforzada, conector de ignición, collar plástico incorporado, mecha rápida, voladura planificada";
		    	# code...
		    	break;
		    case "detonador-no-electrico":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura: Detonador No Eléctrico";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura: Detonador No Eléctrico";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, productos, accesorios de voladuras, voladuras, detonador, detonador no eléctrico, EXSANEL, nuevo, alta calidad, especificaciones técnicas exigentes, altos explosivos, seguro, fulminante número 12, fulminante 12, tubo de choque, alta resistencia a la tracción, alta resistencia a la abrasión, conector plástico resistente j, roca fragmentada, mayor control, mejor rango de tiempo, fiabilidad en la transmisión";
		    	# code...
		    	break;
		    case "linea-silenciosa":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura: Línea Silenciosa";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura: Línea Silenciosa";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, productos, accesorios de voladuras, voladuras, sistema silencioso, sistema de iniciación, iniciación silenciosa, no eléctrico, sistema no eléctrico, detonador instantáneo, tubo de choque, minería subterránea, minería, tajo abierto, obras civiles, iniciación a distancia, mayor seguridad, operación de conexión simple";
		    	# code...
		    	break;
		    case "cordon-detonante":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura: Cordón Detonante";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura: Cordón Detonante";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, productos, accesorios de voladuras, voladuras, cordón detonante, accesorio para voladura, núcleo granulado fino, núcleo de pentrita, PETN, penta-erythritol tetranitrate, fibras sintéticas, hilos de algodón, activación por fulminante común, fulminante común, fulminante eléctrico, fulminante no eléctrico, minería, canteras, movimientos de tierra, ingeniería civil";
		    	# code...
		    	break;
		    case "booster-pentolita":
		        $title = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura: Booster Pentolita";
		        $titulo_oculto = "EXSA Soluciones Exactas – Soluciones: Productos | Accesorios de Voladura: Booster Pentolita";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Soluciones, productos, accesorios de voladuras, voladuras, cargas explosivas, alta potencia, gran seguridad, iniciación de agentes de voladura, agentes de voladura, envase de plástico, mezcla explosiva, insensible a golpes, mayor resistencia al agua, resistencia al agua, eficiente iniciador, más eficiente iniciador, diámetros medianos, diámetros grandes";
		    	# code...
		    	break;
		    case "centro-tecnologico-de-voladuras-exsa-ctve":
		        $title = "EXSA Soluciones Exactas – Capacitación: Centro Tecnológico de Voladura EXSA (CTVE)";
		        $titulo_oculto = "EXSA Soluciones Exactas – Capacitación: Centro Tecnológico de Voladura EXSA (CTVE)";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Capacitación, centro tecnológico, voladuras, EXSA, formación persona, educación personal, ayuda, cumplir normativas, reglamentación, correcto uso, uso seguro, manipuleo de productos, selección de explosivos, evitar accidentes, eficiencia operativa, maximizar beneficio de productos, ventajas, beneficios, ventajas de productos, modalidades, inhouse";
		    	# code...
		    	break;
		    case "programa-ctve-2016-lima":
		        $title = "EXSA Soluciones Exactas – Capacitación: Centro Tecnológico de Voladura EXSA (CTVE) | Programa CTVE 2016";
		        $titulo_oculto = "EXSA Soluciones Exactas – Capacitación: Centro Tecnológico de Voladura EXSA (CTVE) | Programa CTVE 2016";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Capacitaciones, capacitación, CTVE, 2016, programa 2016, cursos, mejorar operaciones, seguridad, evitar accidentes, accidente, cero accidentes, explosivos, cursos gratuitos, sector minería, centro tecnológico, tecnología, capacitación, capacitaciones, capacitación minera, capacitación tecnología, tecnología de voladura, voladuras, criterios de selección, evitar accidentes, cero accidentes, SNMPE";
		    	# code...
		    	break;
		    case "politicas-de-responsabilidad-social":
		        $title = "EXSA Soluciones Exactas – Responsabilidad Social: Política de Responsabilidad Social";
		        $titulo_oculto = "EXSA Soluciones Exactas – Responsabilidad Social: Política de Responsabilidad Social";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Responsabilidad social, políticas, identificar, fomentar, desarrollar, actividades sostenibles, sostenibilidad, ética, marco legal, fortalezas de la empresa, seguridad, generar mayor impacto, mayor impacto, acciones RSE";
		    	# code...
		    	break;
		    case "campana-de-donaciones-de-ropa-y-frazadas-abriguemos-a-nuestra-comunidad":
		        $title = "EXSA Soluciones Exactas – Responsabilidad Social: Grupos de Interés | Comunidad: Campaña de Donaciones";
		        $titulo_oculto = "EXSA Soluciones Exactas – Responsabilidad Social: Grupos de Interés | Comunidad: Campaña de Donaciones";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Campaña, campaña donaciones, donaciones, ropa, frazadas, abrigo, comunidad, prendas donadas, colaboradores, empresas, empresas colaboradoras, pobreza, necesidades, necesidades de la comunidad";
		    	# code...
		    	break;
		    case "campana-de-entrega-de-barriles-para-segregacion-de-residuos-en-colegios-del-aid":
		        $title = "EXSA Soluciones Exactas – Responsabilidad Social: Grupos de Interés | Comunidad: Campaña de Entrega de Barriles para Segregación de Residuos en Colegios del AID";
		        $titulo_oculto = "EXSA Soluciones Exactas – Responsabilidad Social: Grupos de Interés | Comunidad: Campaña de Entrega de Barriles para Segregación de Residuos en Colegios del AID";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Campaña, comunidad, barriles, colegios, Lurín, Pachacamac, incentivar, cultura, desarrollo, protección ambiental, ambiente, medio ambiente, protección medio ambiente, herramientas, capacitación, colegios, comunidad, EXSA, donación";
		    	# code...
		    	break;
		    case "proyecto-colegios-seguros-con-exsa":
		        $title = "EXSA Soluciones Exactas – Responsabilidad Social: Grupos de Interés | Comunidad: Proyecto “Colegios Seguros con EXSA";
		        $titulo_oculto = "EXSA Soluciones Exactas – Responsabilidad Social: Grupos de Interés | Comunidad: Proyecto “Colegios Seguros con EXSA";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Exsa, responsabilidad social, grupos de interés, comunidad, proyecto, colegios seguros, proyecto colegios seguros, proyecto colegios, colegios, cultura de educación, educación en seguridad, principio de responsabilidad social, empresa comprometida, compromiso, área de influencia, educar, capacitar, inculcar, reflexionar, líderes, alumnos, seguridad preventiva, desastres naturales";
		    	# code...
		    	break;
		    case "sembrando-talentos":
		        $title = "EXSA Soluciones Exactas – Responsabilidad Social: Grupos de Interés | Comunidad: Sembrando Talentos";
		        $titulo_oculto = "EXSA Soluciones Exactas – Responsabilidad Social: Grupos de Interés | Comunidad: Sembrando Talentos";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Exsa, responsabilidad social, grupos de interés, comunidad, proyecto, sembrando talentos, desarrollo, desarrollar profesionales, desafíos actuales, desafíos futuros, foco en el cliente, seguridad, excelencia operativa, innovación, talentos potenciales, puestos ejecutivos, fortalecer la industrias, desarrollar industria, capital humano, capital humano estratégico, industria de explosivos, procesos industriales, cultura de seguridad";
		    	# code...
		    	break;
		    case "colaboradores":
		        $title = "EXSA Soluciones Exactas – Responsabilidad Social: Grupos de Interés | Colaboradores";
		        $titulo_oculto = "EXSA Soluciones Exactas – Responsabilidad Social: Grupos de Interés | Colaboradores";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Exsa, responsabilidad, grupos de interés, colaboradores, comité de damas, social, necesidades, entorno familiar, familia, colaboradores, soluciones eficientes, trabajo en equipo, comité de jubilados, jubilados, camaradería, ex colaboradores, compartir, vivencias, experiencias, actividades, diversas actividades, vacaciones divertidas, espacio de recreación, hijos de colaboradores, lima, escolar, etapa escolar, niños, actividades divertidas, integración, sano esparcimiento, verano, sembrando talentos, foco en el cliente, seguridad, excelencia operativa, innovación, talentos potenciales, puestos ejecutivos, fortalecer industria, capital humano, procesos industriales, cultura de seguridad";
		    	# code...
		    	break;
		    case "iso-14001":
		        $title = "EXSA Soluciones Exactas – Responsabilidad Social: Grupos de Interés | Medio Ambiente: ISO14001";
		        $titulo_oculto = "EXSA Soluciones Exactas – Responsabilidad Social: Grupos de Interés | Medio Ambiente: ISO14001";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Exsa, responsabilidad social, grupos de interés, medio ambiente, iso 14001, desarrollo sostenible, programa gestión ambiental, gestión ambiental, certificación, uso eficiente, recursos naturales, prevención, prevenir contaminación, contaminación ambiental, monitoreo mensual, consumo de agua, energía eléctrica, combustible, papel, indicadores, residuos sólidos, materiales reciclables, compromiso, colaboradores, huella de carbono, emisiones de gases, efecto invernadero, carbono neutral";
		    	# code...
		    	break;
		    case "iso-9001":
		        $title = "EXSA Soluciones Exactas – Responsabilidad Social: Grupos de Interés | Clientes: ISO 9001";
		        $titulo_oculto = "EXSA Soluciones Exactas – Responsabilidad Social: Grupos de Interés | Clientes: ISO 9001";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Exsa, sistema, clientes, gestión de calidad, iso 9001, norma, mejorar satisfacción de clientes, incrementar eficiencia de procesos, eficiencia, cultura de calidad, brindar soluciones, soluciones de negocio, gestión de calidad, mejora continua, líneas de acción, enfoque al cliente, alineamiento estratégico, excelencia operacional, participación colaboradores, equipos de mejora continua, una idea una mejora, mejoras significativas";
		    	# code...
		    	break;
		    case "politica-de-compras":
		        $title = "EXSA Soluciones Exactas – Proveedores: Política de Compras";
		        $titulo_oculto = "EXSA Soluciones Exactas – Proveedores: Política de Compras";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Exsa, proveedores, político de compras, relación confiable, estándares éticos";
		    	# code...
		    	break;
		    case "calificacion-de-proveedores":
		        $title = "EXSA Soluciones Exactas – Proveedores: Calificación de Proveedores";
		        $titulo_oculto = "EXSA Soluciones Exactas – Proveedores: Calificación de Proveedores";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Exsa, proveedores, calificación de proveedores, proveedor, materia prima, bienes, servicios, evaluación, formato de calificación, copras exsa, compras, actualización de datos";
		    	# code...
		    	break;
		    case "administracion-de-proveedores":
		        $title = "EXSA Soluciones Exactas – Proveedores: Administración de Proveedores";
		        $titulo_oculto = "EXSA Soluciones Exactas – Proveedores: Administración de Proveedores";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Exsa, proveedores, administración de proveedores, proceso de administración, proveedores, procedimientos, documentos adjuntos, capacitación de planeamiento, modelo de SLA";
		    	# code...
		    	break;
		    case "gestion-de-pagos-a-proveedores":
		        $title = "EXSA Soluciones Exactas – Proveedores: Gestión de Pago a Proveedores";
		        $titulo_oculto = "EXSA Soluciones Exactas – Proveedores: Gestión de Pago a Proveedores";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Exsa, proveedores, gestión de pagos, cronograma de cierre y apertura, recepción de documentos, comunicados spot, carta de devolución, rxh, recepción de comprobantes, canales de seguimiento, emisores electrónicos, factura negociable, cierre cxp 2016, horario de verano";
		    	# code...
		    	break;
		    case "noticias":
		        $title = "EXSA Soluciones Exactas – Sala de Prensa: Noticias";
		        $titulo_oculto = "EXSA Soluciones Exactas – Sala de Prensa: Noticias";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Exsa, soluciones exactas, noticias, novedades, sector minero, sector construcción, minería, minas, construcción, seguridad, soluciones, tecnología, innovación, proyectos, misión tecnológica, PERUMIN, twitter, Facebook, linkedin";
		    	# code...
		    	break;
		    case "noticias":
		        $title = "EXSA Soluciones Exactas – Contáctenos";
		        $titulo_oculto = "EXSA Soluciones Exactas – Contáctenos";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "noticias exsa";
		    	# code...
		    	break;
		    case "oficinas":
		        $title = "EXSA Soluciones Exactas – Responsabilidad Social: Grupos de Interés | Clientes";
		        $titulo_oculto = "EXSA Soluciones Exactas – Responsabilidad Social: Grupos de Interés | Clientes";
		        $descripcion = "EXSA Soluciones Exactas para fragmentación de roca, voladuras, minería subterránea y de tajo abierto";
		        $keywords = "Contactos, clientes, perú, Trujillo, Tacna, panamá, proexsa, Colombia";
		    	# code...
		    	break;
		    
		    case "peru":
		        $title = "Exsa, soluciones para fragmentación – Presencia Regional";
		        $titulo_oculto = "Exsa, soluciones para fragmentación – Presencia Regional";
				$descripcion = "Exsa está presente a nivel regional en Perú, Chile, Colombia y Panamá";
				$keywords = "Empresa peruana, empresa líder, exsa, soluciones exactas, fragmentación de roca, industria minera, minería, infraestructura, voladuras, tajo abierto, minería subterránea, foco en el cliente, gestión proactiva, manejo de riesgos externos, excelencia, colaboradores, ";
		        break;
		    case "servicio-integral-de-voladura-exsa-sive":
		        $title = "Exsa Soluciones Exactas – Servicio Integral de Voladura";
		        $titulo_oculto = "Exsa Soluciones Exactas – Servicio Integral de Voladura";
				$descripcion = "Exsa es la empresa peruana líder en la oferta de soluciones exactas en fragmentación de roca, para las industrias de minería e infraestructura";
				$keywords = "SIVE, servicio integral de voladura, tajo abierto, procesos de voladura, accidente, uso de explosivos, explosivos, emulsiones, nitrato de amonio, calibración de camiones fábrica, transporte de explosivos, estaqueado, taladro, profundidad, accesorios de voladura, primado y carguío de taladros, áreas de influencia, volquetes, minicargadores";
		        break;
		    case "productos":
		        $title = "Exsa Soluciones Exactas – Dinamitas, emulsiones encartuchadas, emulsiones a granel, accesorios de voladura";
		        $titulo_oculto = "Exsa Soluciones Exactas – Dinamitas, emulsiones encartuchadas, emulsiones a granel, accesorios de voladura";
				$descripcion = "Exsa ofrece una gama de productos enfocados en sus clientes";
				$keywords = "Productos, dinamitas, booster, emulsiones, accesorios, anfo examon, Exsablock, Semexsa, Exadit, Gelatina especial, emulex, exagel, semexsa, plastex, slurrex, nitrato de amonio, quantex, mecha de seguridad, mecha rápida, detonador, ensamblado, booster pentolita, cordon detonante, plastex - e";
		        break;
		    case "programa-ctve-2016-lima":
		        $title = "Exsa – Centro tecnológico de voladuras Exsa (CTVE)";
		        $titulo_oculto = "Exsa – Centro tecnológico de voladuras Exsa (CTVE)";
				$descripcion = "Se dictan capacitaciones respecto al correcto y seguro uso y manipuleo de nuestros productos y criterios de selección de explosivos, con el fin evitar posibles accidentes";
				$keywords = "CTVE, 2016, programa 2016, cursos, mejorar operaciones, seguridad, evitar accidentes, accidente, cero accidentes, explosivos, cursos gratuitos, sector minería";
		        break;
		    case "noticias":
		        $title = "Exsa – principales noticias de Exsa en el sector minero";
		        $titulo_oculto = "Exsa – principales noticias de Exsa en el sector minero";
				$descripcion = "Exsa participa activamente de los principales eventos del sector, lee nuestras principales noticias";
				$keywords = "Exsa, responsabilidad social, RSE, Quantex, Karl Maslo, cursos gratuitos, CTVE, sector minero, La Tecnología Quantex, noticias";
		        break;
		}
	}
?>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="author" content="http://mediaimpact.pe/  -  http://scdsistemas.com/es/">
	<meta name="description" content="<?php echo $descripcion; ?>" id="metaDesc">
	<meta content="<?php echo $keywords; ?>" name="keywords" />
	<META NAME="ROBOTS" CONTENT="Index , Follow ">
	<link href="https://exsa.net/imagenes/fav-exsa.png" rel="shortcut icon">
    <link rel="apple-touch-icon" href="https://exsa.net/imagenes/fav-exsa.png"/>
	<!--link rel="stylesheet" href="css/bootstrap.css"-->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/fontsawesome/css/font-awesome.css">
	<link rel="stylesheet" href="css/style.css">
	

	<!--link rel="stylesheet" type="text/css" href="imagenes/banners/engine1/style.css" /-->
	<!--script type="text/javascript" src="imagenes/banners/engine1/jquery.js"></script-->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:300,400">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/fuentes/stylesheet.css">

	<script type="text/javascript" src="js/utiles/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/utiles/bootstrap.js"></script>
	<script type="text/javascript" src="js/utiles/collapse.js"></script>
	<script type="text/javascript" src="js/utiles/menuresponsive.js"></script>
	
	<script type="text/javascript" src="js/F.js"></script>
	<script type="text/javascript" src="js/app/control/Helper.js"></script>
	<script type="text/javascript" src="js/proceso/proceso.js"></script>
	<script type="text/javascript" src="js/secciones/Sidebar.js"></script>
	<script type="text/javascript" src="js/secciones/Menu.js"></script>
	<script type="text/javascript" src="js/secciones/MapadeSitio.js"></script>
	<script type="text/javascript" src="js/secciones/Contenido.js"></script>

	<script type="text/javascript" src="js/AppIni.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  	var js, fjs = d.getElementsByTagName(s)[0];
	  	if (d.getElementById(id)) return;
	  		js = d.createElement(s); js.id = id;
	  		js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5&appId=737326289633298";
	  		fjs.parentNode.insertBefore(js, fjs);
		}
		(document, 'script', 'facebook-jssdk'));
	</script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-69938576-1', 'auto');
	  ga('send', 'pageview');

	</script>
	<title id="titleApp"><?php echo $title; ?></title>
</head>