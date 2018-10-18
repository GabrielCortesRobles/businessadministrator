/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.19-MariaDB : Database - systelecoms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`systelecoms` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `systelecoms`;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `rfc_cliente` varchar(50) DEFAULT NULL,
  `nom_cliente` varchar(50) DEFAULT NULL,
  `ap_cliente` varchar(50) DEFAULT NULL,
  `am_cliente` varchar(50) DEFAULT NULL,
  `curp_cliente` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `num_calle` int(11) DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `cliente` */

insert  into `cliente`(`id_cliente`,`rfc_cliente`,`nom_cliente`,`ap_cliente`,`am_cliente`,`curp_cliente`,`fecha_nacimiento`,`calle`,`num_calle`,`colonia`,`municipio`,`cp`,`correo`,`telefono`,`sexo`,`activo`,`fecha`,`hora`) values (1,'','','','','','0000-00-00','',0,'','',0,'','','',0,NULL,NULL),(2,'123456','Fernando','Romero','Tellez','ROTF751103HMDFKO','0000-00-00','',0,'','',0,'','','Hombre',1,NULL,NULL),(3,'123','Fernanda','Flores','Fierro','','0000-00-00','',0,'','',0,'','','Hombre',1,'2016-03-14','00:20:18'),(5,'12345','Juan','Flores','Fierro','','0000-00-00','',0,'','',0,'','','Hombre',1,'0000-00-00','00:00:00'),(6,'CORG980898','Gabriel','Cortes','Robles','CORG270898','0000-00-00','',0,'','',0,'','','Hombre',1,'0000-00-00','00:00:00'),(7,'1939','Maria','Zamora','Huertas','ZAHJ971101MMCMRS05','0000-00-00','',0,'','',0,'','','',0,'2018-07-12','17:02:54'),(8,'CORG270898','Gabriel','Cortes','Robles','CORG270898hdfrbb06','1998-08-27','Tres cerritos',45,'Alvaro Obregon','Alvaro Obregon',52010,'gabriel@gmail.com','72283673','Hombre',1,'2018-07-12','17:36:14'),(9,'123456','Maria','Zamora','Huertas','ZAHJ971101MMCMRS05','1997-11-01','Niño perdido',611,'Bo. San Lucas','San Mateo Atenco',52100,'al221610112@gmail.com','','',0,'2018-07-12','17:39:36'),(10,'1234','Juan','','','','0000-00-00','',0,'','',0,'','','',0,'2018-07-12','17:45:22'),(11,'6765','Meery','','','','0000-00-00','',0,'','',0,'','','',0,'2018-07-12','17:46:24'),(12,'','Fernando','','','','0000-00-00','',0,'','',0,'','7253547','Hombre',1,'2018-07-12','17:52:10'),(13,'CORG','Gabriel','Cortes','Robles','CORG','1998-08-27','Tres cerritos',45,'Alvaro Obregon','Alvaro Obregon',52010,'gabriel@gmail.com','7253547','Hombre',1,'2018-07-12','17:53:22');

/*Table structure for table `empleado` */

DROP TABLE IF EXISTS `empleado`;

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `rfc_empleado` varchar(200) DEFAULT NULL,
  `codigo_empleado` varchar(100) DEFAULT NULL,
  `nom_empleado` varchar(200) DEFAULT NULL,
  `ap_empleado` varchar(200) DEFAULT NULL,
  `am_empleado` varchar(200) DEFAULT NULL,
  `curp_empleado` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `calle` varchar(200) DEFAULT NULL,
  `numero_calle` int(11) DEFAULT NULL,
  `colonia` varchar(100) DEFAULT NULL,
  `municipio` varchar(100) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `correo` varchar(300) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `id_tipoempleado` int(50) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `activo` varchar(10) DEFAULT NULL,
  `nom_usuario` varchar(200) DEFAULT NULL,
  `contrasena` varchar(200) DEFAULT NULL,
  `privilegio_venta` tinyint(4) DEFAULT NULL,
  `privilegio_almacen` tinyint(4) DEFAULT NULL,
  `privilegio_caja` tinyint(4) DEFAULT NULL,
  `privilegio_admin` tinyint(4) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `id_tipoempleado` (`id_tipoempleado`),
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_tipoempleado`) REFERENCES `tipo_empleado` (`id_tipoempleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `empleado` */

insert  into `empleado`(`id_empleado`,`rfc_empleado`,`codigo_empleado`,`nom_empleado`,`ap_empleado`,`am_empleado`,`curp_empleado`,`fecha_nacimiento`,`calle`,`numero_calle`,`colonia`,`municipio`,`cp`,`correo`,`telefono`,`id_tipoempleado`,`sexo`,`activo`,`nom_usuario`,`contrasena`,`privilegio_venta`,`privilegio_almacen`,`privilegio_caja`,`privilegio_admin`,`fecha`,`hora`) values (1,'CORG270898HDFRBB06','A001','Gabriel','Cortes','Robles','CORG270898HDFRBB06','1998-08-27','Tres cerritos',45,'Alvaro Obregon','Alvaro Obregon',52010,'gabriel@gmail.com','7226565108',NULL,'Hombre','1','gabriel_cortes','7c4a8d09ca3762af61e59520943dc26494f8941b',0,0,0,1,'2018-07-12','00:00:00'),(2,'ZAHMA101197','A002','Maria de Jesus','Zamora','Huertas','ZAHMA101197','1997-11-01','Niño perdido',85,'San Mateo Atenco','Metepec',52012,'maria@gmail.com','7228989456',NULL,'Mujer','1','maria_zamora','7c4a8d09ca3762af61e59520943dc26494f8941b',1,0,0,0,'2018-07-12','03:55:00'),(5,'CORG','A003','Gabriel','Zamora','Robles','CORG','1998-08-27','Tres cerritos',45,'Alvaro Obregon','Lerma',52010,'gabriel_empleado@gmail.com','5569687998',2,'Hombre','1','gabriel_empleado','7c4a8d09ca3762af61e59520943dc26494f8941b',0,1,0,NULL,NULL,NULL),(7,'FER','A0004','Fernando','Romero','Tellez','FER','1190-11-11','Tres cerritos',45,'Alvaro Obregon','Lerma',52010,'fernando@gmail.com','7225656807',2,'Hombre','1','fernando_romero','7c4a8d09ca3762af61e59520943dc26494f8941b',0,1,0,0,'2018-07-14','14:37:58'),(8,'EDU','A005','Eduardo','Flores','Reyes','EDU','1995-02-05','Tres cerritos',45,'Alvaro Obregon','Lerma',52010,'eduardo@gmail.com','722164689',3,'Hombre','1','eduardo_flores','7c4a8d09ca3762af61e59520943dc26494f8941b',0,0,1,0,'2018-07-14','14:56:26'),(13,'RECD','A005','Diana','Reyes','Cano','RECD','1997-06-06','La purisima',85,'Oyamel','Xonatatlan',856012,'diana@gmail.com','7228956203',2,'Mujer','0','diana_reyes','7c4a8d09ca3762af61e59520943dc26494f8941b',0,0,1,0,'2018-07-16','12:53:48'),(14,'ROGM','A006','Martin','Romero','Garcia','ROGM','1998-11-11','Juan escutia',65,'Alvaro Obregon','Lerma',52010,'martin@gmail.com','7225653012',1,'Hombre','No','martin_romero','7c4a8d09ca3762af61e59520943dc26494f8941b',1,0,1,0,'2018-07-16','12:57:43'),(15,'GAER','A007','Remedios Isela','Garcia','Ezquivel','GAER','1997-09-01','Chabelolandia',98,'Villa ','Xonatatlan',856012,'chavela@gmail.com','7221613420',3,'Mujer','Si','chavela_garcia','7c4a8d09ca3762af61e59520943dc26494f8941b',1,0,1,0,'2018-07-16','13:04:21');

/*Table structure for table `empresas` */

DROP TABLE IF EXISTS `empresas`;

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
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `empresas` */

insert  into `empresas`(`id_empresa`,`rfc_empresa`,`nom_empresa`,`imagen_empresa`,`razon_social`,`calle`,`num_calle`,`colonia`,`municipio`,`cp`,`telefono`,`correo`,`regimen_fiscal`,`fecha`,`hora`,`activo`) values (1,'SYS','systelecom','empressa.jpg','Redes y telecomunicaciones','Av. de la independencia',6225,'Reforma','Toluca',56564,'722454582','systelecom@systelecom.mx','Regimen general de ley de personas morales','2018-07-14',NULL,1);

/*Table structure for table `factura` */

DROP TABLE IF EXISTS `factura`;

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `rfc_empresa` varchar(50) DEFAULT NULL,
  `nom_razonsocial` varchar(200) DEFAULT NULL,
  `regimen_fiscal` varchar(200) DEFAULT NULL,
  `tipo_factura` varchar(100) DEFAULT NULL,
  `cliente_frecuente` varchar(100) DEFAULT NULL,
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
  PRIMARY KEY (`id_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `factura` */

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nom_producto` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `marca` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `codigo_int` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `codigo_sat` int(11) DEFAULT NULL,
  `cantidad_prod` int(11) DEFAULT NULL,
  `descripcion` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `precio_cu` double DEFAULT NULL,
  `precio_menudeo` double DEFAULT NULL,
  `precio_mayoreo` double DEFAULT NULL,
  `activo` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `piezas_mediomayoreo` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `piezas_mayoreo` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_proveedor` (`id_proveedor`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `producto` */

insert  into `producto`(`id_producto`,`nom_producto`,`marca`,`id_proveedor`,`codigo_int`,`codigo_sat`,`cantidad_prod`,`descripcion`,`precio_cu`,`precio_menudeo`,`precio_mayoreo`,`activo`,`piezas_mediomayoreo`,`piezas_mayoreo`,`fecha`,`hora`) values (1,'Lapicero azul punto fino','Bic',1,'Z001',564556,500,'Lapicero azul punto fino marca bic',5,4.5,4,'1','20','50','2018-07-12',NULL),(2,'Lapicero rojo punto fino','Bic',1,'A002',45645,500,'Lapicero rojo punto fino marca bic',5.5,5,4.5,NULL,'30','60',NULL,NULL);

/*Table structure for table `proveedor` */

DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `rfc_proveedor` varchar(200) DEFAULT NULL,
  `nom_empresa` varchar(200) DEFAULT NULL,
  `nom_producto` varchar(200) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `correo` varchar(300) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `cant_surt` varchar(100) DEFAULT NULL,
  `precio` varchar(100) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `proveedor` */

insert  into `proveedor`(`id_proveedor`,`rfc_proveedor`,`nom_empresa`,`nom_producto`,`direccion`,`correo`,`telefono`,`cant_surt`,`precio`,`activo`,`fecha`,`hora`) values (1,'123456','Bic','Lapicero azul punto mediano','Av. de la evangelizacion','Admin@bic.com','7227985203','500','2500',1,NULL,NULL),(6,'1234','Pluss','Goma de buho','Venustiano Carranza','pluss123@gmail.com','722548595','211','3000',1,NULL,NULL),(7,'1234','Pluss','Goma de figura','Venustiano Carranza','pluss123@gmail.com','722548595','211','3000',1,NULL,NULL),(8,'12345','Rosa','Lapices punto fino ','Industria','al221610637@gmail.com','722548595','210','3000',1,NULL,NULL);

/*Table structure for table `tipo_empleado` */

DROP TABLE IF EXISTS `tipo_empleado`;

CREATE TABLE `tipo_empleado` (
  `id_tipoempleado` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_empleado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipoempleado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_empleado` */

insert  into `tipo_empleado`(`id_tipoempleado`,`tipo_empleado`) values (1,'Ventas'),(2,'Almacen'),(3,'Caja');

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `cantidad_prod` varchar(10) DEFAULT NULL,
  `cant_recibida` double DEFAULT NULL,
  `cambio` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora_venta` time DEFAULT NULL,
  `codigo_venta` varchar(50) DEFAULT NULL,
  `subtotal` varchar(50) DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `id_producto` (`id_producto`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_empleado` (`id_empleado`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ventas` */

insert  into `ventas`(`id_venta`,`id_producto`,`id_cliente`,`id_empleado`,`precio`,`cantidad_prod`,`cant_recibida`,`cambio`,`fecha`,`hora_venta`,`codigo_venta`,`subtotal`,`total`) values (4,1,2,1,5,'12',100,90,'2018-07-16','16:32:18','0001','',10);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
