-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.5.23 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para cms
CREATE DATABASE IF NOT EXISTS `cms` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `cms`;


-- Volcando estructura para tabla cms.archivo
CREATE TABLE IF NOT EXISTS `archivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `Tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0' COMMENT '1 Imagen 2 Otros',
  `Peso` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `Fecha` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla cms.archivo: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `archivo` DISABLE KEYS */;
INSERT INTO `archivo` (`id`, `Nombre`, `Tipo`, `Peso`, `Fecha`) VALUES
	(1, '140514041351.jpg', '1', '13068', '2014-05-14 04:13:51');
/*!40000 ALTER TABLE `archivo` ENABLE KEYS */;


-- Volcando estructura para tabla cms.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla cms.categoria: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id`, `Nombre`) VALUES
	(1, 'Novedades'),
	(2, 'Deporte'),
	(3, 'Politica'),
	(5, 'Eventos'),
	(6, 'Gastronomia'),
	(7, 'Cine'),
	(9, 'Curiosidades');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


-- Volcando estructura para tabla cms.entrada
CREATE TABLE IF NOT EXISTS `entrada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Eliminado` tinyint(4) NOT NULL DEFAULT '0',
  `Tipo` tinyint(4) NOT NULL COMMENT '1 Blog 2 Paginas',
  `Nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Contenido` text COLLATE utf8_spanish_ci,
  `Tags` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Fecha` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Lectura` int(11) DEFAULT '0',
  `Imagen` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla cms.entrada: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `entrada` DISABLE KEYS */;
INSERT INTO `entrada` (`id`, `Eliminado`, `Tipo`, `Nombre`, `Descripcion`, `Contenido`, `Tags`, `Fecha`, `Lectura`, `Imagen`) VALUES
	(1, 0, 1, 'Nosotros', 'Todo acerca de nosotros.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n\n<p><img alt="" src="http://bienesraicesfortaleza.com/wp-content/uploads/2014/01/img1_nosotros_0.jpg" style="float:right; height:400px; width:500px" /></p>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n', 'nosotros, quienes somos', '2014-05-14 04:14:25', 0, NULL),
	(2, 0, 2, 'Midori de Habich: "Nuevos pedidos de los mÃ©dicos son inviables"', 'Ministra de Salud considerÃ³ "difÃ­cil" entender la intencionalidad de los dirigentes de la FederaciÃ³n MÃ©dica Peruana', '<p>La ministra de Salud, <a href="http://elcomercio.pe/noticias/midori-habich-380093?ref=nota_lima&amp;ft=contenido">Midori de Habich Rospigliosi</a>, calific&oacute; de &quot;inviables&quot; los nuevos pedidos presentados por la <a href="http://elcomercio.pe/noticias/federacion-medica-peruana-514932?ref=nota_lima&amp;ft=contenido">Federaci&oacute;n M&eacute;dica Peruana</a> para el levantamiento de la huelga iniciada hoy a nivel nacional.</p>\r\n\r\n<p>&quot;Me resulta muy dif&iacute;cil entender la intencionalidad de los dirigentes porque ellos tienen que saber que este nuevo pliego no es viable. C&aacute;lculos r&aacute;pidos nos dicen que estar&iacute;amos hablando de no menos de S/.1.300 millones de soles a&ntilde;o para poder satisfacer estos bonos y nuevas escalas. <strong>Este es un monto absolutamente inviable</strong>&quot;, manifest&oacute;.</p>\r\n\r\n<p>No obstante, la titular del <a href="http://elcomercio.pe/noticias/minsa-515191?ref=nota_lima&amp;ft=contenido">Ministerio de Salud</a> (Minsa) se&ntilde;al&oacute; que la cartera a su cargo no renunciar&aacute; al di&aacute;logo con los galenos del pa&iacute;s.</p>\r\n\r\n<p>&quot;En primer lugar, nunca el di&aacute;logo se puede cerrar. Siempre podemos sentarnos, siempre estamos llamando al di&aacute;logo. En la medida en que esto se vaya dando, nosotros tenemos que ser vigilantes para poner a disposici&oacute;n de los pacientes <strong>todas las alternativas posibles para que se interrumpa lo menos posible su atenci&oacute;n</strong>&quot;, a&ntilde;adi&oacute;.</p>\r\n\r\n<p>De Habich Rospigliosi record&oacute; que todos los afiliados al Seguro Integral de Salud pueden acudir a los 27 <a href="http://elcomercio.pe/noticias/hospitales-solidaridad-192714?ref=nota_lima&amp;ft=contenido">Hospitales de la Solidaridad</a> que hay en Lima.&nbsp;</p>\r\n', '', '2014-05-14 04:15:15', 0, '140514044113.jpg'),
	(3, 0, 2, '"Harry Potter": spin-off de la saga se estrenarÃ¡ en el 2016', 'Warner Bros. dio a conocer mÃ¡s detalles de las cintas de  "Fantastic Beasts and Where to Find Them"', '<p>Inspirados en lo que hizo&nbsp;<a href="http://elcomercio.pe/noticias/peter-jackson-137242?ref=nota_luces&amp;ft=contenido">&nbsp;Peter Jackson</a> con <a href="http://elcomercio.pe/noticias/hobbit-124827?ref=nota_luces&amp;ft=contenido">&quot;El Hobbit&quot;</a>&nbsp;tras el final de <a href="http://elcomercio.pe/noticias/el-senor-de-los-anillos-111912?ref=nota_luces&amp;ft=contenido">&quot;El se&ntilde;or de los anillos&quot;</a>, <a href="http://elcomercio.pe/noticias/warner-bros-146561?ref=nota_luces&amp;ft=contenido">Warner Bros.</a> anunci&oacute; que en el 2016 el universo de <a href="http://elcomercio.pe/noticias/harry-potter-411113?ref=nota_luces&amp;ft=contenido">&quot;Harry Potter&quot;</a> regresar&aacute; a las pantallas de cine con un spin-off.</p>\r\n\r\n<p>El portal <a href="http://variety.com/2014/film/news/harry-potter-spinoff-fantastic-beasts-to-hit-theaters-nov-18-2016-1201179553/">&quot;Variety&quot;</a>&nbsp;inform&oacute; que la primera entrega de la trilog&iacute;a que traer&aacute; de vuelta la saga que hizo famosa a <a href="http://elcomercio.pe/noticias/jk-rowling-117576?ref=nota_luces&amp;ft=contenido">J.K Rowling</a>&nbsp;se estrenar&aacute; el 18 de noviembre de dicho a&ntilde;o y estar&aacute; basada en&nbsp;<strong>&quot;Animales fant&aacute;sticos y d&oacute;nde encontrarlos&quot;</strong> (Fantastic Beasts and Where to Find Them), libro publicado en el 2001 poco antes de la aparici&oacute;n de&nbsp;&quot;Harry Potter y la orden del f&eacute;nix&quot;.</p>\r\n\r\n<p>Esta nueva saga se centra en los estudios de&nbsp;Newt Scamander,&nbsp;un magizo&oacute;logo (persona que&nbsp;se encarga del estudio, cuidado&nbsp;y ocultamiento de las Criaturas Animales Fant&aacute;sticos, de acuerdo a la historia creada por Rowling) que es de lectura obligatoria para los alumnos de Hogwarts.</p>\r\n\r\n<p>Hasta el momento, se desconoce qui&eacute;nes ser&aacute;n los directores y actores de esta nueva cinta, aunque la p&aacute;gina de <a href="http://www.mtv.com/news/1823972/harry-potter-trio-to-reunite-for-gringotts-bank-ride/">&quot;MTV&quot;</a>&nbsp;inform&oacute; que <a href="http://elcomercio.pe/noticias/emma-watson-518715?ref=nota_luces&amp;ft=contenido">Emma Watson</a>, <a href="http://elcomercio.pe/noticias/daniel-radcliffe-516733?ref=nota_luces&amp;ft=contenido">Daniel Radcliffe</a>&nbsp;y <a href="http://elcomercio.pe/noticias/rupert-grint-136569?ref=nota_luces&amp;ft=contenido">Rubert Grint</a>&nbsp;grabar&iacute;an nuevas escenas para esta pel&iacute;cula.</p>\r\n', '', '2014-05-14 04:41:57', 0, '140514044157.jpg'),
	(4, 0, 2, 'Efectivas: prueban que las mujeres tendrÃ­an un mayor liderazgo', 'Una investigaciÃ³n en EE.UU. demostrÃ³ que las lÃ­deres femeninas cuentan con una mayor percepciÃ³n de eficacia que los hombres', '<p>Desde hace buen tiempo, los prejuicios acerca de que las mujeres no pueden mantener cargos importantes al igual que los hombres han ido disminuyendo. Sin embargo, un estudio probar&iacute;a que ese estereotipo nunca tuvo raz&oacute;n de ser.</p>\r\n\r\n<p>Seg&uacute;n una investigaci&oacute;n publicada por la Asociaci&oacute;n Americana de Psicolog&iacute;a (APA), <strong>cuando analizaron la percepci&oacute;n de un <a href="http://elcomercio.pe/viu/trabajo/5-formas-resolver-conflicto-trabajo-noticia-1724115?ref=nota_viu&amp;ft=contenido">liderazgo eficaz</a>, las mujeres han recibido una valoraci&oacute;n muy alta</strong>, superando incluso la de sus pares masculinos.</p>\r\n\r\n<p>El an&aacute;lisis descubri&oacute; que mientras que los hombres tienden a considerarse significativamente como &quot;l&iacute;deres m&aacute;s exitosos&quot;, <strong>la percepci&oacute;n general de los participantes en las pruebas coincidi&oacute; en que la eficacia ejecutiva de las mujeres era mucho mayor</strong>.</p>\r\n\r\n<p>&quot;A medida que m&aacute;s mujeres han ido teniendo&nbsp;&eacute;xito en posiciones de liderazgo, <strong>lo m&aacute;s probable es que los <a href="http://elcomercio.pe/viu/trabajo/estos-son-temas-que-no-debes-hablar-trabajo-noticia-1722829?ref=nota_viu&amp;ft=contenido">estereotipos</a> de aquellos que asocian el liderazgo con la masculinidad, se hayan ido disolviendo lentamente en el tiempo</strong>&quot;, indica Samantha Paustian, coautora del estudio.</p>\r\n\r\n<p><strong>EL DATO</strong></p>\r\n\r\n<p>Para realizar el estudio, <strong>los investigadores analizaron 99 conjuntos de datos compilados en 58 publicaciones en revistas, 30 disertaciones y tesis in&eacute;ditas, 5 libros, entre otros</strong>.</p>\r\n\r\n<p>Los tama&ntilde;os de muestra variaron de 10 a 60.470 l&iacute;deres en los EE.UU. y Canad&aacute;.</p>\r\n', '', '2014-05-14 04:42:49', 0, '140514044249.jpg'),
	(5, 0, 2, 'Hijo de Will Smith se suma a la polÃ©mica con esta fotografÃ­a', 'Tras el escÃ¡ndalo protagonizado por su hermana, Jaden Smith se retratÃ³ semidesnudo junto a la hermana de Kim Kardashian', '<p><a href="http://elcomercio.pe/noticias/jaden-smith-150538?ref=nota_tvmas&amp;ft=contenido">Jaden Smith</a>, el hijo mayor de <a href="http://elcomercio.pe/noticias/will-smith-518337?ref=nota_tvmas&amp;ft=contenido">Will Smith</a>, se sum&oacute; a la pol&eacute;mica protagonizada por su hermana <a href="http://elcomercio.pe/noticias/willow-smith-187870?ref=nota_tvmas&amp;ft=contenido">Willow</a> al fotografiarse de&nbsp;manera similar con&nbsp;<a href="http://elcomercio.pe/noticias/kylie-jenner-305332?ref=nota_tvmas&amp;ft=contenido">Kylie Jenner</a>, una de las m&aacute;s j&oacute;venes del clan Kardashian.</p>\r\n\r\n<p><a href="http://kalifornia-klasss.tumblr.com/">A trav&eacute;s de su cuenta de Tumblr</a>, Jenner, de 15 a&ntilde;os de edad, comparti&oacute; un retrato que la muestra en una cama con el actor de 16 a&ntilde;os que luce &uacute;nicamente unos boxers.</p>\r\n\r\n<p>Como se recuerda,&nbsp;Willow, la hermana de 13 a&ntilde;os de Jaden, se gan&oacute; las cr&iacute;ticas la semana pasada por un retrato que&nbsp;<a href="http://elcomercio.pe/tvmas/hollywood/hija-will-smith-causa-polemica-esta-fotografia-noticia-1727914?ref=nota_tvmas&amp;ft=contenido">la mostraba en una cama junto al actor Moises Arias</a>, de 20 a&ntilde;os de edad.</p>\r\n\r\n<p>Ante ello, <a href="http://elcomercio.pe/noticias/jada-pinkett-smith-302190?ref=nota_tvmas&amp;ft=contenido">Jada Pinkett Smith</a>, la madre de los adolescentes, <a href="http://elcomercio.pe/tvmas/hollywood/will-smith-esposa-hablo-sobre-controvertida-foto-su-hija-noticia-1728104?ref=nota_tvmas&amp;ft=contenido">dijo</a>:&nbsp;&ldquo;La cosa es as&iacute;: no hay nada sexual en esa fotograf&iacute;a o en esa situaci&oacute;n.&nbsp;Ustedes est&aacute;n proyectando su basura en ella, y est&aacute;n actuando como ped&oacute;filos encubiertos. Eso no est&aacute; bien&quot;.</p>\r\n', '', '2014-05-14 04:47:34', 0, '140514044741.jpg'),
	(6, 0, 2, 'Juicio oral a 53 denunciados por el â€˜Baguazoâ€™ se inicia hoy', 'FiscalÃ­a ha pedido para los acusados penas entre los 6 aÃ±os de cÃ¡rcel y cadena perpetua, segÃºn su grado de responsabilidad', '<p>Desde hoy, el <strong>Poder Judicial iniciar&aacute; proceso oral a 53 implicados</strong> en los <a href="http://elcomercio.pe/noticias/baguazo-106144?ref=nota_peru&amp;ft=contenido">luctuosos sucesos ocurridos el 5 de junio del 2009</a> en la denominada &lsquo;Curva del diablo&rsquo;, <a href="http://elcomercio.pe/tag/9100/bagua?ref=nota_peru&amp;ft=contenido">Bagua</a>, que dejaron 33 fallecidos (23 polic&iacute;as y 10 civiles) y <a href="http://elcomercio.pe/peru/lima/anos-baguazo-ya-no-se-que-persona-ir-llorar-dice-padre-mayor-bazan-noticia-1585506?ref=nota_peru&amp;ft=contenido">un desaparecido</a>.</p>\r\n\r\n<p>Las personas a ser juzgadas, entre los que hay 23 nativos, han sido <strong>acusadas por homicidio calificado, lesiones graves, rebeli&oacute;n, sedici&oacute;n, mot&iacute;n, delito contra la tranquilidad p&uacute;blica</strong>, as&iacute; como arrebato de armamento y municiones.</p>\r\n\r\n<p>El <strong>Ministerio P&uacute;blico ha solicitado para ellos sentencias que van desde los seis a&ntilde;os de prisi&oacute;n hasta cadena perpetua</strong>, seg&uacute;n su grado de responsabilidad en las violentas protestas iniciadas con el bloqueo de la carretera Fernando Belaunde Terry.</p>\r\n\r\n<p>Los ind&iacute;genas hab&iacute;an obstaculizado la referida v&iacute;a buscando la derogatoria de una serie de decretos leg</p>\r\n', '', '2014-05-14 05:19:09', 0, '140514051909.jpg'),
	(7, 0, 2, 'Meme del bus de la selecciÃ³n peruana: "Nos vamos a Brasil..."', 'A prÃ³sito de las frases oficiales aprobadas por FIFA, la broma sobre la blanquirroja no podÃ­a faltar en redes sociales', '<p>Durante el <a href="http://elcomercio.pe/brasil2014?ref=nota_deporte-total&amp;ft=contenido">mundial</a> los buses de cada selecci&oacute;n son decorados con una frase que describe al equipo al que trasladan. Esto despert&oacute; la imaginaci&oacute;n de los aficionados peruanos quienes no dudaron en crear un meme con una frase alusiva a la <a href="http://elcomercio.pe/noticias/seleccion-peruana-514181?ref=nota_deporte-total&amp;ft=contenido">selecci&oacute;n peruana</a>.</p>\r\n\r\n<p><strong>&quot;Nos vamos a Brasil... a Brasil con Garz&oacute;n&quot;</strong>, es la frase para Per&uacute; que hace referencia a las conocidas avenidas del distrito de Jes&uacute;s Mar&iacute;a, pese a que estas no se cruzan.</p>\r\n', '', '2014-05-14 05:19:41', 0, '140514051950.jpg'),
	(8, 0, 2, 'Huelguistas del PJ trabajarÃ¡n sÃ¡bados por procesos pendientes', 'AsÃ­ lo anunciÃ³ Enrique Mendoza, quien dijo que tambiÃ©n se ampliarÃ¡n los horarios 4 horas en Lima y 3 en provincias', '<p>El presidente del&nbsp;<a href="http://elcomercio.pe/noticias/poder-judicial-514296?ref=nota_lima&amp;ft=contenido">Poder Judicial</a>,&nbsp;<a href="http://elcomercio.pe/noticias/enrique-mendoza-515127?ref=nota_lima&amp;ft=contenido">Enrique Mendoza</a>, anunci&oacute; que los trabajadores judiciales que acataron la huelga indefinida que&nbsp;<a href="http://elcomercio.pe/politica/justicia/huelga-poder-judicial-levantada-luego-46-dias-noticia-1728312?ref=nota_lima&amp;ft=contenido">dur&oacute; 46 d&iacute;as</a>&nbsp;y que termin&oacute; el pasado viernes 9 de mayo<strong>&nbsp;</strong><strong>trabajar&aacute;n los s&aacute;bados a lo largo de, por lo menos, medio a&ntilde;o, para recuperar las horas que no laboraron.</strong></p>\r\n\r\n<p>&ldquo;Se han producido p&eacute;rdidas y hay un gran da&ntilde;o que no podemos recuperar, el tiempo perdido y los gastos ocasionados por la huelga&rdquo;, dijo en una conferencia de prensa desde el Congreso.</p>\r\n\r\n<p>A&ntilde;adi&oacute; que&nbsp;<strong>en los pr&oacute;ximos d&iacute;as se dar&aacute;n detalles de esta medida</strong>, as&iacute; como de la ampliaci&oacute;n de la jornada laboral por cuatro horas adicionales en Lima y tres horas en provincias.</p>\r\n\r\n<p>&ldquo;Hemos tomado estas medidas para atender este&nbsp;<a href="http://elcomercio.pe/lima/judiciales/largas-colas-reinicio-actividades-poder-judicial-noticia-1728918?ref=nota_lima&amp;ft=contenido">embalse o acumulaci&oacute;n de peticiones</a>&nbsp;de parte del p&uacute;blico y&nbsp;<strong>esperamos en dos d&iacute;as m&aacute;s tener resultados y normalizar la tensi&oacute;n&rdquo;</strong>, a&ntilde;adi&oacute;.</p>\r\n\r\n<p>Tambi&eacute;n destac&oacute; el hecho de que ya est&aacute; funcionando la Corte Superior de Lima Este y que tienen planeado implementar otros distritos judiciales para los distritos de Ventanilla y Anc&oacute;n, adem&aacute;s de otro m&aacute;s para la zona sur de la capital.</p>\r\n\r\n<p><strong>P&Eacute;RDIDAS ECON&Oacute;MICAS</strong></p>\r\n\r\n<p>Mendoza inform&oacute; que la p&eacute;rdida econ&oacute;mica que dej&oacute; la paralizaci&oacute;n de trabajadores del Poder Judicial es equivalente a&nbsp;<a href="http://elcomercio.pe/politica/gobierno/mendoza-huelga-judicial-dejo-perdidas-s-250-millones-noticia-1729195?ref=nota_lima&amp;ft=contenido">unos S/.250 millones de soles</a>, cifra mayor a los S/.124 millones que representaba el incremento de las remuneraciones de los trabajadores a lo largo de un a&ntilde;o.</p>\r\n', '', '2014-05-14 05:20:43', 0, '140514052043.jpg');
/*!40000 ALTER TABLE `entrada` ENABLE KEYS */;


-- Volcando estructura para tabla cms.entradacategoria
CREATE TABLE IF NOT EXISTS `entradacategoria` (
  `Entrada_id` int(11) NOT NULL DEFAULT '0',
  `Categoria_id` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `entrada_categoria` (`Entrada_id`,`Categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla cms.entradacategoria: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `entradacategoria` DISABLE KEYS */;
INSERT INTO `entradacategoria` (`Entrada_id`, `Categoria_id`) VALUES
	(2, 1),
	(3, 7),
	(5, 1),
	(5, 7),
	(5, 9),
	(6, 3),
	(7, 1),
	(8, 1);
/*!40000 ALTER TABLE `entradacategoria` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
