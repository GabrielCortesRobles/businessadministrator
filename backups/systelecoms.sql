/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.13-MariaDB : Database - systelecomss
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`systelecomss` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `systelecomss`;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cliente` */

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
  `activo` tinyint(4) DEFAULT NULL,
  `nom_usuario` varchar(200) DEFAULT NULL,
  `contraseña` varchar(50) DEFAULT NULL,
  `privilegio_venta` tinyint(4) DEFAULT NULL,
  `privilegio_almacen` tinyint(4) DEFAULT NULL,
  `privilegio_caja` tinyint(4) DEFAULT NULL,
  `privilegio_admin` tinyint(4) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `id_tipoempleado` (`id_tipoempleado`),
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_tipoempleado`) REFERENCES `tipo_empleado` (`id_tipoempleado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `empleado` */

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
  `regimen fiscal` varchar(500) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `empresas` */

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
  PRIMARY KEY (`id_producto`),
  KEY `id_proveedor` (`id_proveedor`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `producto` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `proveedor` */

/*Table structure for table `tipo_empleado` */

DROP TABLE IF EXISTS `tipo_empleado`;

CREATE TABLE `tipo_empleado` (
  `id_tipoempleado` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_empleado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipoempleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipo_empleado` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ventas` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
