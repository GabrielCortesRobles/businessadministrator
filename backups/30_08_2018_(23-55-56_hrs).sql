SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS systelecoms;

USE systelecoms;

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
  `municipio` varchar(50) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `activo` varchar(10) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `ultima_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO cliente VALUES("1","","Juan","Cortez","Alavez","","0000-00-00","NiÃ±os heroes","56","0","Alvaro Obregon","Lerma","52010","juan@gmail.com","7224556789","Hombre","1","0000-00-00 00:00:00","0000-00-00 00:00:00");
INSERT INTO cliente VALUES("3","123","Fernanda","Flores","Fierro","","0000-00-00","","0","0","","","0","","","Hombre","1","2016-03-14 00:00:00","2018-07-21 00:20:18");
INSERT INTO cliente VALUES("5","12345","Juan","Flores","Fierro","","0000-00-00","","0","0","","","0","","","Hombre","1","0000-00-00 00:00:00","2018-07-21 00:00:00");
INSERT INTO cliente VALUES("7","1939","Maria","Zamora","Huertas","ZAHJ971101MMCMRS05","0000-00-00","","0","0","","","0","","","","0","2018-07-12 00:00:00","2018-07-21 17:02:54");
INSERT INTO cliente VALUES("8","CORG270898","Gabriel","Cortes","Robles","CORG270898hdfrbb06","1998-08-27","Tres cerritos","45","0","Alvaro Obregon","Alvaro Obregon","52010","gabriel@gmail.com","72283673","Hombre","1","2018-07-12 00:00:00","2018-07-21 17:36:14");
INSERT INTO cliente VALUES("9","123456","Maria","Zamora","Huertas","ZAHJ971101MMCMRS05","1997-11-01","NiÃ±o perdido","611","0","Bo. San Lucas","San Mateo Atenco","52100","al221610112@gmail.com","","","0","2018-07-12 00:00:00","2018-07-21 17:39:36");
INSERT INTO cliente VALUES("10","1234","Juan","","","","0000-00-00","","0","0","","","0","","","","0","2018-07-12 00:00:00","2018-07-21 17:45:22");
INSERT INTO cliente VALUES("11","6765","Meery","","","","0000-00-00","","0","0","","","0","","","","0","2018-07-12 00:00:00","2018-07-21 17:46:24");
INSERT INTO cliente VALUES("14","CORG980898","Gabo","Robles","Cortes","CORG270898HDFRBB06","1998-08-27","Tres cerritos","45","0","Alvaro Obregon","Lerma","52010","","","Hombre","0","2018-07-16 00:00:00","2018-07-21 22:55:06");
INSERT INTO cliente VALUES("15","CORG980898","Gabriel","Robles","Zamora","CORG","1998-08-27","Tres cerritos","45","0","Alvaro Obregon","Lerma","52010","gabriel_robles@gmail.com","7226565108","Hombre","Si","2018-07-16 00:00:00","2018-07-21 23:01:25");
INSERT INTO cliente VALUES("16","ROTF7707178A4","FERNANDO","ROMERO","TELLEZ","ROTF770717876543","1977-07-17","GUANAJUATO","214","0","INDEPENDENCIA","TOLUCA","50070","fernando.romero@systelecom.mx","7225258705","Hombre","Si","2018-07-19 00:00:00","2018-07-21 11:19:12");
INSERT INTO cliente VALUES("17","CORG270898","Gabriel","Cortez","Robles","","0000-00-00","Tres cerritos","78","45","Alvaro Obregon","Alvaro Obregon","52010","gabriel.cortes@gmail.com","7226565108","Hombre","1","2018-07-26 08:18:37","2018-07-26 08:29:16");



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
  CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`),
  CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO detalle_venta VALUES("1","20","4","12","156");
INSERT INTO detalle_venta VALUES("2","20","1","45","202.5");
INSERT INTO detalle_venta VALUES("3","21","1","45","202.5");
INSERT INTO detalle_venta VALUES("4","21","4","20","260");
INSERT INTO detalle_venta VALUES("5","22","1","12","60");
INSERT INTO detalle_venta VALUES("6","23","4","7","91");



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
  `municipio` varchar(100) DEFAULT NULL,
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
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_tipoempleado`) REFERENCES `tipo_empleado` (`id_tipoempleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO empleado VALUES("1","CORG270898HDFRBB06","Gabriel","Cortes","Robles","CORG270898HDFRBB06","1998-08-27","Tres cerritos","78","85","Alvaro Obregon","Alvaro Obregon","52010","gabriel@gmail.com","7226565108","1","Hombre","1","7c4a8d09ca3762af61e59520943dc26494f8941b","0","0","0","1","2018-07-12 00:00:00","2018-07-22 00:24:23");
INSERT INTO empleado VALUES("2","ZAHMA101197","Maria de Jesus","Zamora","Huertas","ZAHMA101197","1997-11-01","NiÃ±o perdido","85","","San Mateo Atenco","Metepec","52012","maria@gmail.com","7228989456","1","Mujer","1","7c4a8d09ca3762af61e59520943dc26494f8941b","1","0","0","0","2018-07-12 00:00:00","2018-07-21 03:55:00");
INSERT INTO empleado VALUES("5","CORG","Gabriel","Zamora","Robles","CORG","1998-08-27","Tres cerritos","45","","Alvaro Obregon","Lerma","52010","gabriel_empleado@gmail.com","5569687998","2","Hombre","1","7c4a8d09ca3762af61e59520943dc26494f8941b","0","1","0","0","0000-00-00 00:00:00","0000-00-00 00:00:00");
INSERT INTO empleado VALUES("7","ROTF","Fernando","Romero","Tellez","ROTF","1995-10-05","Tres cerritos","45","","Alvaro Obregon","Alvaro Obregon","52010","fernando@gmail.com","7225656807","2","Hombre","1","123456","0","1","0","0","0000-00-00 00:00:00","2018-07-21 14:37:58");
INSERT INTO empleado VALUES("8","EDU","Eduardo","Flores","Reyes","EDU","1995-02-05","Tres cerritos","45","","Alvaro Obregon","Lerma","52010","eduardo@gmail.com","722164689","3","Hombre","1","7c4a8d09ca3762af61e59520943dc26494f8941b","0","0","1","0","2018-07-14 00:00:00","2018-07-21 14:56:26");
INSERT INTO empleado VALUES("13","RECD","Diana","Reyes","Cano","RECD","1997-06-06","La purisima","85","","Oyamel","Xonatatlan","856012","diana@gmail.com","7228956203","2","Mujer","0","7c4a8d09ca3762af61e59520943dc26494f8941b","0","0","1","0","2018-07-16 00:00:00","2018-07-21 12:53:48");
INSERT INTO empleado VALUES("14","ROGM","Martin","Romero","Garcia","ROGM","1998-11-11","Juan escutia","65","","Alvaro Obregon","Lerma","52010","martin@gmail.com","7225653012","1","Hombre","No","7c4a8d09ca3762af61e59520943dc26494f8941b","1","0","1","0","2018-07-16 00:00:00","2018-07-21 12:57:43");
INSERT INTO empleado VALUES("15","GAER","Remedios Isela","Garcia","Ezquivel","GAER","1997-09-01","Chabelolandia","98","","Villa ","Xonatatlan","856012","chavela@gmail.com","7221613420","3","Mujer","Si","7c4a8d09ca3762af61e59520943dc26494f8941b","1","0","1","0","2018-07-16 00:00:00","2018-07-21 13:04:21");
INSERT INTO empleado VALUES("17","DOPD","Daniel","Drantez","Perez","DOPD","1995-05-12","Tres cerritos","85","","Alvaro Obregon","Lerma","52010","daniel@gmail.com","7225656456","2","Hombre","Si","7c4a8d09ca3762af61e59520943dc26494f8941b","1","1","0","0","2018-07-16 00:00:00","2018-07-21 23:07:00");
INSERT INTO empleado VALUES("18","SRD1308181234","Sofia Fernanda","Romero","Diaz","SRD1308181234","2018-07-19","RUTA DE LA INDEPENDENCIA","625","","Independencia","Toluca","50070","fernando.romero@systelecom.mx","7225258705","3","Hombre","Si","7c4a8d09ca3762af61e59520943dc26494f8941b","0","0","1","0","2018-07-19 00:00:00","2018-07-21 11:16:47");
INSERT INTO empleado VALUES("20","ROTF","Maria de Jesus","Zamora","Huertas","ROTF","2016-05-19","NiÃ±os heroes","","","Alvaro Obregon","Lerma","52010","gabriel@gmail.com","7253547","1","Hombre","Si","7c4a8d09ca3762af61e59520943dc26494f8941b","1","0","0","0","2018-07-21 16:09:01","0000-00-00 00:00:00");
INSERT INTO empleado VALUES("21","","","","","","0000-00-00","","","","","","0","","","0","","","","0","0","0","0","2018-07-24 18:02:04","0000-00-00 00:00:00");



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
  `clave_producto` varchar(100) DEFAULT NULL,
  `clave_unidad` varchar(100) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `unidad` varchar(100) DEFAULT NULL,
  `num_identificacion` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `valor_unitario` varchar(50) DEFAULT NULL,
  `importe` varchar(50) DEFAULT NULL,
  `descuento` varchar(50) DEFAULT NULL,
  `adicionales_impuestos` varchar(50) DEFAULT NULL,
  `adicionales_informacion` varchar(50) DEFAULT NULL,
  `adicionales_cuenta` varchar(50) DEFAULT NULL,
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

INSERT INTO factura VALUES("1","SDFGHJL","ASDFGHJKL","sdfghjklñ","sdfghjkl","1","dfghjkl","ghjklñ","","15","","","asdfghjk","15","15","15","ghj","fghjk","dfghj","","","","","","","","");



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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO producto VALUES("1","Lapicero azul punto fino","Bic","1","Z001","564556","500","Lapicero azul punto fino marca bic","","5","4.5","4","1","20","50","2018-07-12 00:00:00","0000-00-00 00:00:00");
INSERT INTO producto VALUES("4","Corrector 15 ml","Pelikan","14","Z002","8888","100","Corrector para boligrafo marca pelikan ","","13","12.5","12","","30","50","2018-07-16 00:00:00","2018-07-21 23:13:31");
INSERT INTO producto VALUES("5","Calculadora","Sony","15","1234aeiou","12345678","10","Calculadora cientifica","","15","13","11","Si","5","10","2018-07-17 00:00:00","2018-07-21 11:20:29");
INSERT INTO producto VALUES("6","Lapicero negro","bic","1","Z078","123456","100","lapicero tinta negra","4.20","6","5.5","5","Si","30","60","2018-07-19 00:00:00","2018-07-21 08:46:13");
INSERT INTO producto VALUES("7","lapiz amarillo com goma roja","Pelika","15","123awe3","123423","1000","Lapiz de madera color amarillo","1","1.8","1.5","120","Si","10","50","2018-07-19 00:00:00","2018-07-21 10:52:39");



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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO proveedor VALUES("1","123456","Bic","Av. de la evangelizacion","Admin@bic.com","7227985203","Si","0000-00-00 00:00:00","0000-00-00 00:00:00");
INSERT INTO proveedor VALUES("6","1234","Pluss","Venustiano Carranza","pluss123@gmail.com","722548595","Si","0000-00-00 00:00:00","0000-00-00 00:00:00");
INSERT INTO proveedor VALUES("7","1234","Pluss","Venustiano Carranza","pluss123@gmail.com","722548595","Si","0000-00-00 00:00:00","0000-00-00 00:00:00");
INSERT INTO proveedor VALUES("9","12845","Bonafont","Venustiano Carranza","722438573","200","Si","2018-07-16 00:00:00","2018-07-21 16:57:14");
INSERT INTO proveedor VALUES("10","Scribe","Scribe","Juarez sur #514","scribe@gmail.com","7223634852","activo","2018-07-16 00:00:00","2018-07-21 17:06:28");
INSERT INTO proveedor VALUES("11","Sys","systelecom","Ruta de la independencia #625","systelecom@systelecom.mx","7226563456","Si","2018-07-16 00:00:00","2018-07-26 08:46:12");
INSERT INTO proveedor VALUES("13","COCA","Coca-cola","Independencia","7227897456","100","Si","2018-07-16 00:00:00","2018-07-21 21:31:51");
INSERT INTO proveedor VALUES("14","PEL","Pelikan","Juarez sur","7225659789","100","Si","2018-07-16 00:00:00","2018-07-21 22:21:03");
INSERT INTO proveedor VALUES("15","ROTF7707178A4","rodhisa S.A de C.V","Ruta de la independencia #625","fernando.romero@systelecom.mx","7225258705","Si","2018-07-17 00:00:00","2018-07-21 11:05:48");



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
  `precio` double DEFAULT NULL,
  `cant_recibida` double DEFAULT NULL,
  `cambio` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora_venta` time DEFAULT NULL,
  `codigo_venta` varchar(50) DEFAULT NULL,
  `subtotal` varchar(50) DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_empleado` (`id_empleado`),
  CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

INSERT INTO ventas VALUES("1","8","7","","1200","95","2018-08-03","23:25:27","","","1105");
INSERT INTO ventas VALUES("20","1","1","","0","0","2018-08-30","15:54:54","","","358.5");
INSERT INTO ventas VALUES("21","1","1","","500","37.5","2018-08-30","16:34:42","","","462.5");
INSERT INTO ventas VALUES("22","1","1","","90","30","2018-08-30","16:40:46","","","60");
INSERT INTO ventas VALUES("23","1","1","","0","8","2018-08-30","16:42:13","","","91");



SET FOREIGN_KEY_CHECKS=1;