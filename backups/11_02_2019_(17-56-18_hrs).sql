SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS systelecoms;

USE systelecoms;

DROP TABLE IF EXISTS almacen;

CREATE TABLE `almacen` (
  `id_almacen` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`id_almacen`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_empleado` (`id_empleado`),
  CONSTRAINT `almacen_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`),
  CONSTRAINT `almacen_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS almacen_detalle;

CREATE TABLE `almacen_detalle` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_almacen` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `id_almacen` (`id_almacen`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `almacen_detalle_ibfk_1` FOREIGN KEY (`id_almacen`) REFERENCES `almacen` (`id_almacen`),
  CONSTRAINT `almacen_detalle_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO almacen_detalle VALUES("1","","1","500","2500");
INSERT INTO almacen_detalle VALUES("2","","1","500","2500");
INSERT INTO almacen_detalle VALUES("3","","1","500","1500");



DROP TABLE IF EXISTS cliente;

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `rfc_cliente` varchar(50) DEFAULT NULL,
  `nom_cliente` varchar(50) DEFAULT NULL,
  `ap_cliente` varchar(50) DEFAULT NULL,
  `am_cliente` varchar(50) DEFAULT NULL,
  `curp_cliente` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `numero_interior` int(11) DEFAULT NULL,
  `numero_exterior` int(11) DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `id_municipio` int(11) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `sexo` varchar(6) DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `ultima_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `id_municipio` (`id_municipio`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

INSERT INTO cliente VALUES("1","XAXX010101","","","","XAXX010101","0000-00-00","","0","0","","1","0","","","","Si","0000-00-00 00:00:00","0000-00-00 00:00:00");
INSERT INTO cliente VALUES("3","123","Fernanda","Flores","Fierro","","0000-00-00","","0","0","","1","0","","","Hombre","Si","2016-03-14 00:00:00","2018-07-21 00:20:18");
INSERT INTO cliente VALUES("5","12345","Juan","Flores","Fierro","","0000-00-00","","0","0","","1","0","","","Hombre","Si","0000-00-00 00:00:00","2018-07-21 00:00:00");
INSERT INTO cliente VALUES("7","1939","Maria","Zamora","Huertas","ZAHJ971101MMCMRS05","0000-00-00","","0","0","","1","0","","","","Si","2018-07-12 00:00:00","2018-07-21 17:02:54");
INSERT INTO cliente VALUES("8","CORG270898","Gabriel","Cortes","Robles","CORG270898hdfrbb06","1998-08-27","Tres cerritos","45","0","Alvaro Obregon","1","52010","gabriel@gmail.com","72283673","Hombre","Si","2018-07-12 00:00:00","2018-07-21 17:36:14");
INSERT INTO cliente VALUES("9","123456","Maria","Zamora","Huertas","ZAHJ971101MMCMRS05","1997-11-01","NiÃ±o perdido","611","0","Bo. San Lucas","1","52100","al221610112@gmail.com","","","Si","2018-07-12 00:00:00","2018-07-21 17:39:36");
INSERT INTO cliente VALUES("10","1234","Juan","","","","0000-00-00","","0","0","","1","0","","","","Si","2018-07-12 00:00:00","2018-07-21 17:45:22");
INSERT INTO cliente VALUES("11","6765","Meery","","","","0000-00-00","","0","0","","1","0","","","","Si","2018-07-12 00:00:00","2018-07-21 17:46:24");
INSERT INTO cliente VALUES("14","CORG980898","Gabo","Robles","Cortes","CORG270898HDFRBB06","1998-08-27","Tres cerritos","45","0","Alvaro Obregon","1","52010","","","Hombre","Si","2018-07-16 00:00:00","2018-07-21 22:55:06");
INSERT INTO cliente VALUES("15","CORG980898","Gabriel","Robles","Zamora","CORG","1998-08-27","Tres cerritos","45","0","Alvaro Obregon","1","52010","gabriel_robles@gmail.com","7226565108","Hombre","Si","2018-07-16 00:00:00","2018-07-21 23:01:25");
INSERT INTO cliente VALUES("16","ROTF7707178A4","FERNANDO","ROMERO","TELLEZ","ROTF770717876543","1977-07-17","GUANAJUATO","214","0","INDEPENDENCIA","1","50070","fernando.romero@systelecom.mx","7225258705","Hombre","Si","2018-07-19 00:00:00","2018-07-21 11:19:12");
INSERT INTO cliente VALUES("17","CORG270898","Gabriel","Cortez","Robles","","0000-00-00","Tres cerritos","78","45","Alvaro Obregon","1","52010","gabriel.cortes@gmail.com","7226565108","Hombre","Si","2018-07-26 08:18:37","2018-07-26 08:29:16");
INSERT INTO cliente VALUES("18","CORG270898","Hanna","Zamora","Huertas","CORG270898HDFRBB06","1998-08-27","Tres Cerritos","45","52","Alvaro Obregon","23","52010","al221610637@gmail.com","7225656108","hombre","si","2018-09-24 01:01:54","");



DROP TABLE IF EXISTS detalle_factura;

CREATE TABLE `detalle_factura` (
  `id_detallefac` int(11) NOT NULL AUTO_INCREMENT,
  `id_factura` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `clave_unidad` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `unidad` int(11) DEFAULT NULL,
  `num_identificacion` int(11) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `valor_unitario` double DEFAULT NULL,
  `importe` double DEFAULT NULL,
  `descuento` double DEFAULT NULL,
  `adicionales_impuestos` tinyint(1) DEFAULT NULL,
  `adicionales_informacion` tinyint(1) DEFAULT NULL,
  `adicionales_cuenta` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_detallefac`),
  KEY `id_factura` (`id_factura`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`),
  CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS detalle_venta;

CREATE TABLE `detalle_venta` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` varchar(10) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `id_venta` (`id_venta`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

INSERT INTO detalle_venta VALUES("1","1","4","12","156");
INSERT INTO detalle_venta VALUES("2","20","1","45","202.5");
INSERT INTO detalle_venta VALUES("3","21","1","45","202.5");
INSERT INTO detalle_venta VALUES("4","21","4","20","260");
INSERT INTO detalle_venta VALUES("5","22","1","12","60");
INSERT INTO detalle_venta VALUES("6","23","4","7","91");
INSERT INTO detalle_venta VALUES("8","24","4","45","562.5");
INSERT INTO detalle_venta VALUES("9","25","4","5","65");
INSERT INTO detalle_venta VALUES("10","25","7","4","7.2");
INSERT INTO detalle_venta VALUES("11","26","4","45","562.5");
INSERT INTO detalle_venta VALUES("12","27","7","11","19.8");
INSERT INTO detalle_venta VALUES("13","28","1","40","180");
INSERT INTO detalle_venta VALUES("14","28","5","6","90");
INSERT INTO detalle_venta VALUES("15","28","4","50","625");
INSERT INTO detalle_venta VALUES("16","35","4","45","562.5");
INSERT INTO detalle_venta VALUES("17","36","4","45","562.5");
INSERT INTO detalle_venta VALUES("18","36","1","78","312");
INSERT INTO detalle_venta VALUES("19","37","1","24","108");
INSERT INTO detalle_venta VALUES("20","38","4","45","562.5");
INSERT INTO detalle_venta VALUES("22","39","4","70","840");
INSERT INTO detalle_venta VALUES("25","40","4","14","182");
INSERT INTO detalle_venta VALUES("27","41","6","98","490");
INSERT INTO detalle_venta VALUES("32","51","4","100","99.99");
INSERT INTO detalle_venta VALUES("33","52","4","50","99.99");
INSERT INTO detalle_venta VALUES("34","53","4","50","99.99");
INSERT INTO detalle_venta VALUES("35","54","4","50","99.99");
INSERT INTO detalle_venta VALUES("36","55","4","50","99.99");
INSERT INTO detalle_venta VALUES("37","56","4","50","625");
INSERT INTO detalle_venta VALUES("38","57","4","50","625");
INSERT INTO detalle_venta VALUES("39","57","1","100","10");
INSERT INTO detalle_venta VALUES("40","57","4","100","10");
INSERT INTO detalle_venta VALUES("41","58","4","100","1200");
INSERT INTO detalle_venta VALUES("42","59","1","50","225");
INSERT INTO detalle_venta VALUES("43","59","1","500","1500");



DROP TABLE IF EXISTS empleado;

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `rfc_empleado` varchar(200) DEFAULT NULL,
  `nom_empleado` varchar(200) DEFAULT NULL,
  `ap_empleado` varchar(200) DEFAULT NULL,
  `am_empleado` varchar(200) DEFAULT NULL,
  `curp_empleado` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `calle` varchar(200) DEFAULT NULL,
  `numero_interior` varchar(10) DEFAULT NULL,
  `numero_exterior` varchar(10) DEFAULT NULL,
  `colonia` varchar(100) DEFAULT NULL,
  `id_municipio` int(11) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `correo` varchar(300) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `id_tipoempleado` int(50) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `activo` varchar(10) DEFAULT NULL,
  `contrasena` varchar(200) DEFAULT NULL,
  `privilegio_venta` tinyint(4) DEFAULT NULL,
  `privilegio_almacen` tinyint(4) DEFAULT NULL,
  `privilegio_caja` tinyint(4) DEFAULT NULL,
  `privilegio_admin` tinyint(4) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `ultima_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `id_tipoempleado` (`id_tipoempleado`),
  KEY `id_municipio` (`id_municipio`),
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_tipoempleado`) REFERENCES `tipo_empleado` (`id_tipoempleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

INSERT INTO empleado VALUES("1","CORG270898HDFRBB06","Gabriel","Cortes","Robles","CORG270898HDFRBB06","1998-08-27","Tres cerritos","78","85","Alvaro Obregon","53","52010","gabriel@gmail.com","7226565108","1","Hombre","Si","7c4a8d09ca3762af61e59520943dc26494f8941b","0","0","0","1","2018-07-12 00:00:00","2018-07-22 00:24:23");
INSERT INTO empleado VALUES("2","ZAHMA101197","Maria de Jesus","Huertas","Huertas","ZAHMA101197","1997-11-01","NiÃ±o perdido","85","","San Mateo Atenco","53","52012","maria@gmail.com","7228989456","1","Mujer","Si","7c4a8d09ca3762af61e59520943dc26494f8941b","1","0","0","0","2018-07-12 00:00:00","2018-07-21 03:55:00");
INSERT INTO empleado VALUES("5","CORG","Gabriel","Zamora","Robles","CORG","1998-08-27","Tres cerritos","45","","Alvaro Obregon","53","52010","gabriel_empleado@gmail.com","5569687998","2","Hombre","Si","7c4a8d09ca3762af61e59520943dc26494f8941b","0","1","0","0","0000-00-00 00:00:00","0000-00-00 00:00:00");
INSERT INTO empleado VALUES("7","ROTF","Fernando","Romero","Tellez","ROTF","1995-10-05","Tres cerritos","45","","Alvaro Obregon","53","52010","fernando@gmail.com","7225656807","2","Hombre","Si","123456","1","0","0","0","0000-00-00 00:00:00","2018-07-21 14:37:58");
INSERT INTO empleado VALUES("8","EDU","Eduardo","Flores","Reyes","EDU","1995-02-05","Tres cerritos","45","","Alvaro Obregon","53","52010","eduardo@gmail.com","722164689","3","Hombre","Si","7c4a8d09ca3762af61e59520943dc26494f8941b","0","0","1","0","2018-07-14 00:00:00","2018-07-21 14:56:26");
INSERT INTO empleado VALUES("13","RECD","Diana","Reyes","Cano","RECD","1997-06-06","La purisima","85","","Oyamel","53","856012","diana@gmail.com","7228956203","2","Mujer","Si","7c4a8d09ca3762af61e59520943dc26494f8941b","0","0","1","0","2018-07-16 00:00:00","2018-07-21 12:53:48");
INSERT INTO empleado VALUES("14","ROGM","Martin","Romero","Garcia","ROGM","1998-11-11","Juan escutia","65","","Alvaro Obregon","53","52010","martin@gmail.com","7225653012","1","Hombre","No","7c4a8d09ca3762af61e59520943dc26494f8941b","1","0","1","0","2018-07-16 00:00:00","2018-07-21 12:57:43");
INSERT INTO empleado VALUES("15","GAER","Remedios Isela","Garcia","Ezquivel","GAER","1997-09-01","Chabelolandia","98","","Villa ","53","856012","chavela@gmail.com","7221613420","3","Mujer","Si","7c4a8d09ca3762af61e59520943dc26494f8941b","1","0","1","0","2018-07-16 00:00:00","2018-07-21 13:04:21");
INSERT INTO empleado VALUES("17","DOPD","Daniel","Drantez","Perez","DOPD","1995-05-12","Tres cerritos","85","","Alvaro Obregon","53","52010","daniel@gmail.com","7225656456","2","Hombre","Si","7c4a8d09ca3762af61e59520943dc26494f8941b","1","1","0","0","2018-07-16 00:00:00","2018-07-21 23:07:00");
INSERT INTO empleado VALUES("18","SRD1308181234","Sofia Fernanda","Romero","Diaz","SRD1308181234","2018-07-19","RUTA DE LA INDEPENDENCIA","625","","Independencia","53","50070","fernando.romero@systelecom.mx","7225258705","3","Hombre","Si","7c4a8d09ca3762af61e59520943dc26494f8941b","0","0","1","0","2018-07-19 00:00:00","2018-07-21 11:16:47");
INSERT INTO empleado VALUES("20","ROTF","Maria de Jesus","Zamora","Huertas","ROTF","2016-05-19","NiÃ±os heroes","","","Alvaro Obregon","53","52010","maria.jesus@gmail.com","7253547","1","Hombre","Si","7c4a8d09ca3762af61e59520943dc26494f8941b","0","1","1","0","2018-07-21 16:09:01","0000-00-00 00:00:00");
INSERT INTO empleado VALUES("22","CORG270898","Hanna","Zamora","Huertas","CORG270898HDFRBB06","1998-08-27","Tres Cerritos","45","52","","23","52010","al221610637@gmail.com","7225656108","2","hombre","si","123456","1","0","0","0","2018-09-22 23:51:24","");
INSERT INTO empleado VALUES("23","CORG270898","Hanna","Cortes","Zamora","CORG270898HDFRBB06","1998-08-27","Tres Cerritos","45","52","","23","52010","al221610637@gmail.com","7225656108","2","hombre","si","123456","1","0","0","0","2018-09-24 16:25:37","");



DROP TABLE IF EXISTS empresas;

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `rfc_empresa` varchar(100) DEFAULT NULL,
  `nom_empresa` varchar(300) DEFAULT NULL,
  `imagen_empresa` varchar(300) DEFAULT NULL,
  `razon_social` varchar(500) DEFAULT NULL,
  `calle` varchar(100) DEFAULT NULL,
  `num_calle` int(11) DEFAULT NULL,
  `colonia` varchar(100) DEFAULT NULL,
  `municipio` varchar(200) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `correo` varchar(300) DEFAULT NULL,
  `regimen_fiscal` varchar(500) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `ultima_modificacion` datetime DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO empresas VALUES("1","SYS","systelecom","empressa.jpg","Redes y telecomunicaciones","Av. de la independencia","6225","Reforma","Toluca","56564","722454582","systelecom@systelecom.mx","Regimen general de ley de personas morales","2018-07-14 00:00:00","0000-00-00 00:00:00","1");



DROP TABLE IF EXISTS factura;

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `rfc_empresa` varchar(50) DEFAULT NULL,
  `nom_razonsocial` varchar(200) DEFAULT NULL,
  `regimen_fiscal` varchar(200) DEFAULT NULL,
  `tipo_factura` varchar(100) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `uso_factura` varchar(100) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `base` varchar(50) DEFAULT NULL,
  `impuesto` varchar(50) DEFAULT NULL,
  `tasa_cuota` varchar(50) DEFAULT NULL,
  `valor_tasa` varchar(50) DEFAULT NULL,
  `impuestos_importe` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO factura VALUES("1","SDFGHJL","ASDFGHJKL","sdfghjklñ","sdfghjkl","1","dfghjkl","","","","","","","","");



DROP TABLE IF EXISTS municipios;

CREATE TABLE `municipios` (
  `id_municipio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_municipio` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_municipio`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO municipios VALUES("1","Acambay");
INSERT INTO municipios VALUES("2","Acolman");
INSERT INTO municipios VALUES("3","Aculco");
INSERT INTO municipios VALUES("4","Almoloya de Alquisiras");
INSERT INTO municipios VALUES("5","Almoloya de Juarez");
INSERT INTO municipios VALUES("6","Almoloya del Río");
INSERT INTO municipios VALUES("7","Amanalco");
INSERT INTO municipios VALUES("8","Amatepec");
INSERT INTO municipios VALUES("9","Amecameca");
INSERT INTO municipios VALUES("10","Apaxco");
INSERT INTO municipios VALUES("11","Atenco");
INSERT INTO municipios VALUES("12","Atizapán");
INSERT INTO municipios VALUES("13","Atizapán de Zaragoza");
INSERT INTO municipios VALUES("14","Atlacomulco");
INSERT INTO municipios VALUES("15","Atlautla");
INSERT INTO municipios VALUES("16","Axapusco");
INSERT INTO municipios VALUES("17","Ayapango");
INSERT INTO municipios VALUES("18","Calimaya");
INSERT INTO municipios VALUES("19","Capulhuac");
INSERT INTO municipios VALUES("20","Chalco");
INSERT INTO municipios VALUES("21","Chapa de Mota");
INSERT INTO municipios VALUES("22","Chapultepec");
INSERT INTO municipios VALUES("23","Chiautla");
INSERT INTO municipios VALUES("24","Chicoloapan");
INSERT INTO municipios VALUES("25","Chiconcuac");
INSERT INTO municipios VALUES("26","Chimalhuacán");
INSERT INTO municipios VALUES("27","Coacalco");
INSERT INTO municipios VALUES("28","Coatepec Harinas");
INSERT INTO municipios VALUES("29","Cocotitlán");
INSERT INTO municipios VALUES("30","Coyotepec");
INSERT INTO municipios VALUES("31","Cuautitlán");
INSERT INTO municipios VALUES("32","Cuautitlán Izcalli");
INSERT INTO municipios VALUES("33","Donato Guerra");
INSERT INTO municipios VALUES("34","Ecatepec");
INSERT INTO municipios VALUES("35","Ecatzingo");
INSERT INTO municipios VALUES("36","El Oro");
INSERT INTO municipios VALUES("37","Huehuetoca");
INSERT INTO municipios VALUES("38","Hueypoxtla");
INSERT INTO municipios VALUES("39","Huixquilucan");
INSERT INTO municipios VALUES("40","Isidro Fabela");
INSERT INTO municipios VALUES("41","Ixtapaluca");
INSERT INTO municipios VALUES("42","Ixtapan de la Sal");
INSERT INTO municipios VALUES("43","Ixtapan del Oro");
INSERT INTO municipios VALUES("44","Ixtlahuaca");
INSERT INTO municipios VALUES("45","Jaltenco");
INSERT INTO municipios VALUES("46","Jilotepec");
INSERT INTO municipios VALUES("47","Jilotzingo");
INSERT INTO municipios VALUES("48","Jiquipilco");
INSERT INTO municipios VALUES("49","Jocotitlán");
INSERT INTO municipios VALUES("50","Joquicingo");
INSERT INTO municipios VALUES("51","Juchitepec");
INSERT INTO municipios VALUES("52","La Paz");
INSERT INTO municipios VALUES("53","Lerma de Villada");
INSERT INTO municipios VALUES("54","Luvianos");
INSERT INTO municipios VALUES("55","Malinalco");
INSERT INTO municipios VALUES("56","Melchor Ocampo");
INSERT INTO municipios VALUES("57","Metepec");
INSERT INTO municipios VALUES("58","Mexicaltzingo");
INSERT INTO municipios VALUES("59","Morelos");
INSERT INTO municipios VALUES("60","Naucalpan");
INSERT INTO municipios VALUES("61","Nextlalpan");
INSERT INTO municipios VALUES("62","Nezahualcóyotl");
INSERT INTO municipios VALUES("63","Nicolas Romero");
INSERT INTO municipios VALUES("64","Nopaltepec");
INSERT INTO municipios VALUES("65","Ocoyoacac");
INSERT INTO municipios VALUES("66","Ocuilan");
INSERT INTO municipios VALUES("67","Otumba");
INSERT INTO municipios VALUES("68","Otzoloapan");
INSERT INTO municipios VALUES("69","Otzolotepec");
INSERT INTO municipios VALUES("70","Ozumba");
INSERT INTO municipios VALUES("71","Papalotla");
INSERT INTO municipios VALUES("72","Polotitlán");
INSERT INTO municipios VALUES("73","Rayón");
INSERT INTO municipios VALUES("74","San Antonio la Isla");
INSERT INTO municipios VALUES("75","San Felipe del Progreso");
INSERT INTO municipios VALUES("76","San José del Rincón");
INSERT INTO municipios VALUES("77","San Martín de las Pirámides");
INSERT INTO municipios VALUES("78","San Mateo Atenco");
INSERT INTO municipios VALUES("79","San Simón de Guerrero");
INSERT INTO municipios VALUES("80","Santo Tomás de los Plátanos");
INSERT INTO municipios VALUES("81","Soyaniquilpan de Juárez");
INSERT INTO municipios VALUES("82","Sultepec");
INSERT INTO municipios VALUES("83","Tecámac");
INSERT INTO municipios VALUES("84","Tejupilco");
INSERT INTO municipios VALUES("85","Temamatla");
INSERT INTO municipios VALUES("86","Temascalapa");
INSERT INTO municipios VALUES("87","Temascalcingo");
INSERT INTO municipios VALUES("88","Temascaltepec");
INSERT INTO municipios VALUES("89","Temoaya");
INSERT INTO municipios VALUES("90","Tenancingo");
INSERT INTO municipios VALUES("91","Tenango del Aire");
INSERT INTO municipios VALUES("92","Tenango del Valle");
INSERT INTO municipios VALUES("93","Teoloyucan");
INSERT INTO municipios VALUES("94","Teotihuacán");
INSERT INTO municipios VALUES("95","Tepetlaoxtoc");
INSERT INTO municipios VALUES("96","Tepetlixpa");
INSERT INTO municipios VALUES("97","Tepotzotlán");
INSERT INTO municipios VALUES("98","Tequixquiac");
INSERT INTO municipios VALUES("99","Texcaltitlán");
INSERT INTO municipios VALUES("100","Texcalyacac");
INSERT INTO municipios VALUES("101","Texcoco");
INSERT INTO municipios VALUES("102","Tezoyuca");
INSERT INTO municipios VALUES("103","Tianguistenco");
INSERT INTO municipios VALUES("104","Timilpan");
INSERT INTO municipios VALUES("105","Tlalmanalco");
INSERT INTO municipios VALUES("106","Tlalnepantla de Baz");
INSERT INTO municipios VALUES("107","Tlatlaya");
INSERT INTO municipios VALUES("108","Toluca de Lerdo");
INSERT INTO municipios VALUES("109","Tonanitla");
INSERT INTO municipios VALUES("110","Tonatico");
INSERT INTO municipios VALUES("111","Tultepec");
INSERT INTO municipios VALUES("112","Tultitlán");
INSERT INTO municipios VALUES("113","Valle de Bravo");
INSERT INTO municipios VALUES("114","Valle de Chalco Solidaridad");
INSERT INTO municipios VALUES("115","Villa de Allende");
INSERT INTO municipios VALUES("116","Villa del Carbón");
INSERT INTO municipios VALUES("117","Villa Guerrero");
INSERT INTO municipios VALUES("118","Villa Victoria");
INSERT INTO municipios VALUES("119","Xalatlaco");
INSERT INTO municipios VALUES("120","Xonacatlán");
INSERT INTO municipios VALUES("121","Zacazonapan");
INSERT INTO municipios VALUES("122","Zacualpan");
INSERT INTO municipios VALUES("123","Zinacantepec");
INSERT INTO municipios VALUES("124","Zumpahuacán");
INSERT INTO municipios VALUES("125","Zumpango");



DROP TABLE IF EXISTS producto;

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nom_producto` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `marca` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `codigo_int` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `codigo_sat` int(11) DEFAULT NULL,
  `cantidad_prod` int(11) DEFAULT NULL,
  `descripcion` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `precio_adquisicion` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio_cu` double DEFAULT NULL,
  `precio_menudeo` double DEFAULT NULL,
  `precio_mayoreo` double DEFAULT NULL,
  `activo` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `piezas_mediomayoreo` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `piezas_mayoreo` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `ultima_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_proveedor` (`id_proveedor`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO producto VALUES("1","Lapicero azul punto fino","Bic","1","Z001","564556","1250","Lapicero azul punto fino marca bic","","5","4.5","4","1","20","50","2018-07-12 00:00:00","0000-00-00 00:00:00");
INSERT INTO producto VALUES("4","Corrector 15 ml","Pelikan","14","Z002","8888","395","Corrector para boligrafo marca pelikan ","","13","12.5","12","","30","50","2018-07-16 00:00:00","2018-07-21 23:13:31");
INSERT INTO producto VALUES("5","Calculadora","Sony","15","1234aeiou","12345678","10","Calculadora cientifica","","15","13","11","Si","5","10","2018-07-17 00:00:00","2018-07-21 11:20:29");
INSERT INTO producto VALUES("6","Lapicero negro","bic","1","Z078","123456","100","lapicero tinta negra","4.20","6","5.5","5","Si","30","60","2018-07-19 00:00:00","2018-07-21 08:46:13");
INSERT INTO producto VALUES("7","lapiz amarillo com goma roja","Pelika","15","123awe3","123423","1000","Lapiz de madera color amarillo","1","1.8","1.5","120","Si","10","50","2018-07-19 00:00:00","2018-07-21 10:52:39");
INSERT INTO producto VALUES("8","008","Pelikan","15","123456","111555444","1000","","","20","19","18","Si","30","50","","");



DROP TABLE IF EXISTS proveedor;

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `rfc_proveedor` varchar(200) DEFAULT NULL,
  `nom_empresa` varchar(200) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `correo` varchar(300) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `activo` varchar(10) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `ultima_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO proveedor VALUES("1","123456","Bic","Av. de la evangelizacion","Admin@bic.com","7227985203","Si","0000-00-00 00:00:00","0000-00-00 00:00:00");
INSERT INTO proveedor VALUES("6","1234","Pluss","Venustiano Carranza","pluss123@gmail.com","722548595","Si","0000-00-00 00:00:00","0000-00-00 00:00:00");
INSERT INTO proveedor VALUES("7","1234","Pluss","Venustiano Carranza","pluss123@gmail.com","722548595","Si","0000-00-00 00:00:00","0000-00-00 00:00:00");
INSERT INTO proveedor VALUES("9","12845","Bonafont","Venustiano Carranza","722438573","200","Si","2018-07-16 00:00:00","2018-07-21 16:57:14");
INSERT INTO proveedor VALUES("10","Scribe","Scribe","Juarez sur #514","scribe@gmail.com","7223634852","activo","2018-07-16 00:00:00","2018-07-21 17:06:28");
INSERT INTO proveedor VALUES("11","Sys","systelecom","Ruta de la independencia #625","systelecom@systelecom.mx","7226563456","Si","2018-07-16 00:00:00","2018-07-26 08:46:12");
INSERT INTO proveedor VALUES("13","COCA","Coca-cola","Independencia","7227897456","100","Si","2018-07-16 00:00:00","2018-07-21 21:31:51");
INSERT INTO proveedor VALUES("14","PEL","Pelikan","Juarez sur","7225659789","100","Si","2018-07-16 00:00:00","2018-07-21 22:21:03");
INSERT INTO proveedor VALUES("15","ROTF7707178A4","rodhisa S.A de C.V","Ruta de la independencia #625","fernando.romero@systelecom.mx","7225258705","Si","2018-07-17 00:00:00","2018-07-21 11:05:48");
INSERT INTO proveedor VALUES("16","123456","la abejita","Av. de la evangelizacion","abejita@gmail.com","7221646795","Si","","");



DROP TABLE IF EXISTS tipo_empleado;

CREATE TABLE `tipo_empleado` (
  `id_tipoempleado` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_empleado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipoempleado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tipo_empleado VALUES("1","Ventas");
INSERT INTO tipo_empleado VALUES("2","Almacen");
INSERT INTO tipo_empleado VALUES("3","Caja");



DROP TABLE IF EXISTS ventas;

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `cant_recibida` double DEFAULT NULL,
  `cambio` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora_venta` time DEFAULT NULL,
  `codigo_venta` varchar(50) DEFAULT NULL,
  `subtotal` decimal(19,4) DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_empleado` (`id_empleado`),
  CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

INSERT INTO ventas VALUES("1","8","7","Pagado","1105","0","2018-08-16","23:25:27","","15.0000","500");
INSERT INTO ventas VALUES("20","1","1","Pagado","200","20","2018-08-30","15:54:54","","","358.5");
INSERT INTO ventas VALUES("21","1","1","Pagado","500","37.5","2018-08-30","16:34:42","","","260");
INSERT INTO ventas VALUES("22","1","1","Pagado","100","40","2018-08-30","16:40:46","","","60");
INSERT INTO ventas VALUES("23","1","1","Pagado","100","9","2018-08-30","16:42:13","","","91");
INSERT INTO ventas VALUES("24","1","2","Pagado","0","0","2018-08-31","14:16:48","","","562.5");
INSERT INTO ventas VALUES("25","1","2","Pagado","0","0","2018-08-31","14:18:36","","","72.2");
INSERT INTO ventas VALUES("26","1","2","Pagado","600","37.5","2018-08-20","14:20:08","","","562.5");
INSERT INTO ventas VALUES("27","1","2","Pagado","20","0.2","2018-08-31","14:22:14","","","19.8");
INSERT INTO ventas VALUES("28","16","18","Pagado","900","5","2018-09-06","12:19:15","","","895");
INSERT INTO ventas VALUES("35","1","1","Pagado","600","37.5","2018-09-18","12:07:10","","","562.5");
INSERT INTO ventas VALUES("36","1","1","Pagado","1000","125.5","2018-09-18","12:11:55","","","874.5");
INSERT INTO ventas VALUES("37","1","1","Pagado","110","2","2018-09-18","12:13:20","","","108");
INSERT INTO ventas VALUES("38","1","1","Pagado","1000","221.5","2018-09-18","12:15:07","","","778.5");
INSERT INTO ventas VALUES("39","1","1","Pagado","1000","160","2018-09-20","09:34:15","","","840");
INSERT INTO ventas VALUES("40","1","1","Pagado","200","18","2018-09-20","09:34:40","","","182");
INSERT INTO ventas VALUES("41","1","1","Pagado","500","10","2018-09-20","09:40:56","","","490");
INSERT INTO ventas VALUES("43","1","1","Pendiente","0","0","2018-09-23","14:48:11","","","1200");
INSERT INTO ventas VALUES("44","1","1","Pendiente","0","0","2018-09-23","14:48:41","","","1200");
INSERT INTO ventas VALUES("45","1","1","Pendiente","0","0","2018-09-23","14:49:09","","","1200");
INSERT INTO ventas VALUES("46","1","1","Pendiente","0","0","2018-09-23","14:50:35","","","1200");
INSERT INTO ventas VALUES("47","1","1","Pendiente","0","0","2018-09-23","14:50:52","","","1200");
INSERT INTO ventas VALUES("48","1","1","Pendiente","0","0","2018-09-23","14:50:53","","","1200");
INSERT INTO ventas VALUES("49","1","1","Pendiente","0","0","2018-09-23","14:50:54","","","1200");
INSERT INTO ventas VALUES("50","1","1","Pendiente","0","0","2018-09-23","14:50:54","","","1200");
INSERT INTO ventas VALUES("51","1","1","Pendiente","0","0","2018-09-23","14:51:22","","","1200");
INSERT INTO ventas VALUES("52","1","1","Pendiente","0","0","2018-09-23","14:53:05","","","850");
INSERT INTO ventas VALUES("53","1","1","Pendiente","0","0","2018-09-23","14:53:17","","","850");
INSERT INTO ventas VALUES("54","1","1","Pendiente","0","0","2018-09-23","14:53:17","","","850");
INSERT INTO ventas VALUES("55","1","1","Pagado","1000","150","2018-09-23","14:53:18","","","850");
INSERT INTO ventas VALUES("56","1","1","Pagado","900","50","2018-09-23","14:55:47","","","850");
INSERT INTO ventas VALUES("57","1","1","Pendiente","0","0","2018-09-23","15:00:20","","","850");
INSERT INTO ventas VALUES("58","1","1","Pendiente","0","0","2018-09-23","15:10:21","","","1425");
INSERT INTO ventas VALUES("59","1","1","Pagado","851","0.7","2018-09-23","15:13:36","","","850.3");



SET FOREIGN_KEY_CHECKS=1;