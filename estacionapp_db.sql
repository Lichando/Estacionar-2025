/*
SQLyog Ultimate v12.09 (32 bit)
MySQL - 10.1.38-MariaDB : Database - db_cochera
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`estacionapp_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;

USE `estacionapp_db`;

/*Table structure for table `accesos_roles` */

DROP TABLE IF EXISTS `accesos_roles`;

CREATE TABLE `accesos_roles` (
  `idAccesoRol` INT(11) NOT NULL AUTO_INCREMENT,
  `idRol` INT(11) NOT NULL,
  `cochera` INT(5) NOT NULL,
  `franjas` INT(5) NOT NULL,
  `promociones` INT(5) NOT NULL,
  `fechaAlta` DATETIME NOT NULL,
  `fechaMod` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` INT(11) NOT NULL,
  PRIMARY KEY (`idAccesoRol`),
  KEY `cochera` (`cochera`),
  KEY `franjas` (`franjas`),
  KEY `promociones` (`promociones`),
  KEY `idRol` (`idRol`),
  CONSTRAINT `accesos_roles_ibfk_1` FOREIGN KEY (`cochera`) REFERENCES `tipo_acceso` (`idTipoAcceso`),
  CONSTRAINT `accesos_roles_ibfk_2` FOREIGN KEY (`franjas`) REFERENCES `tipo_acceso` (`idTipoAcceso`),
  CONSTRAINT `accesos_roles_ibfk_3` FOREIGN KEY (`promociones`) REFERENCES `tipo_acceso` (`idTipoAcceso`),
  CONSTRAINT `accesos_roles_ibfk_4` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`)
) ENGINE=INNODB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `accesos_roles` */

INSERT  INTO `accesos_roles`(`idAccesoRol`,`idRol`,`cochera`,`franjas`,`promociones`,`fechaAlta`,`fechaMod`,`estado`) VALUES (4,3,1,1,1,'2024-10-29 21:37:20','2024-10-29 21:37:23',1),(5,4,1,2,1,'2024-10-29 21:38:30','2024-10-29 21:38:33',1),(6,5,1,2,2,'2024-10-29 21:39:01','2024-10-29 21:40:01',1),(7,6,2,2,1,'2024-10-29 21:39:54','2024-10-29 21:40:05',1),(8,7,2,1,2,'2024-10-29 21:40:42','2024-10-29 21:40:45',1);

/*Table structure for table `cochera_tipo_vehiculo` */

DROP TABLE IF EXISTS `cochera_tipo_vehiculo`;

CREATE TABLE `cochera_tipo_vehiculo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idCochera` INT(11) NOT NULL,
  `idTipoVehiculo` INT(11) NOT NULL,
  `fechaMod` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fechaAlta` DATETIME NOT NULL,
  `estado` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idCochera` (`idCochera`),
  KEY `idTipoVehiculo` (`idTipoVehiculo`),
  CONSTRAINT `cochera_tipo_vehiculo_ibfk_1` FOREIGN KEY (`idCochera`) REFERENCES `cocheras` (`idCochera`),
  CONSTRAINT `cochera_tipo_vehiculo_ibfk_2` FOREIGN KEY (`idTipoVehiculo`) REFERENCES `tipos_vehiculos` (`idTipoVehiculo`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `cochera_tipo_vehiculo` */

INSERT  INTO `cochera_tipo_vehiculo`(`id`,`idCochera`,`idTipoVehiculo`,`fechaMod`,`fechaAlta`,`estado`) VALUES (1,1,1,'2024-10-29 22:02:10','2024-10-29 22:02:13',1),(2,1,2,'2024-10-29 22:02:30','2024-10-29 22:02:27',1);

/*Table structure for table `cocheras` */

DROP TABLE IF EXISTS `cocheras`;

CREATE TABLE `cocheras` (
  `idCochera` INT(11) NOT NULL AUTO_INCREMENT,
  `idUbicacion` INT(11) NOT NULL,
  `direccion` VARCHAR(200) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` CHAR(100) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` VARCHAR(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ciudad` CHAR(40) COLLATE utf8_spanish2_ci NOT NULL,
  `idProvincia` VARCHAR(50) COLLATE utf8_spanish2_ci NOT NULL,
  `idPais` VARCHAR(50) COLLATE utf8_spanish2_ci NOT NULL,
  `titular` CHAR(150) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` INT(11) NOT NULL,
  `telefonoAlt` INT(11) DEFAULT NULL,
  `nroWhatsApp` INT(11) DEFAULT NULL,
  `email` VARCHAR(150) COLLATE utf8_spanish2_ci NOT NULL,
  `fotoPerfil` INT(11) DEFAULT NULL,
  `fechaMod` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fechaAlta` DATETIME NOT NULL,
  `estado` INT(11) NOT NULL DEFAULT '1',
  `usuario` INT(11) NOT NULL,
  PRIMARY KEY (`idCochera`),
  KEY `idUbicacion` (`idUbicacion`),
  KEY `idImagen` (`fotoPerfil`),
  CONSTRAINT `cocheras_ibfk_1` FOREIGN KEY (`idUbicacion`) REFERENCES `ubicacion_cocheras` (`idUbicacion`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `cocheras` */

INSERT  INTO `cocheras`(`idCochera`,`idUbicacion`,`direccion`,`nombre`,`descripcion`,`ciudad`,`idProvincia`,`idPais`,`titular`,`telefono`,`telefonoAlt`,`nroWhatsApp`,`email`,`fotoPerfil`,`fechaMod`,`fechaAlta`,`estado`,`usuario`) VALUES (1,1,'Corrientes 457','ISEI 4030','Cochera de prueba','Rosario','1','1','Tio Tito',2147483647,0,2147483647,'tiotito@gmail.com',1,'2024-10-29 21:44:24','2024-10-29 21:44:27',1,0);

/*Table structure for table `detalle_tipos_vehiculos` */

DROP TABLE IF EXISTS `detalle_tipos_vehiculos`;

CREATE TABLE `detalle_tipos_vehiculos` (
  `IdDetalleTipoVehiculo` INT(11) NOT NULL AUTO_INCREMENT,
  `largo` DECIMAL(10,0) NOT NULL,
  `ancho` DECIMAL(10,0) NOT NULL,
  `alto` DECIMAL(10,0) NOT NULL,
  `fechaAlta` DATETIME NOT NULL,
  `fechaMod` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`IdDetalleTipoVehiculo`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `detalle_tipos_vehiculos` */

INSERT  INTO `detalle_tipos_vehiculos`(`IdDetalleTipoVehiculo`,`largo`,`ancho`,`alto`,`fechaAlta`,`fechaMod`,`estado`) VALUES (1,'5','2','2','2024-10-29 22:00:18','2024-10-29 22:00:22',1),(2,'6','3','3','2024-10-30 22:00:38','2024-10-29 22:00:43',1);

/*Table structure for table `detalle_usuarios_cocheras` */

DROP TABLE IF EXISTS `detalle_usuarios_cocheras`;

CREATE TABLE `detalle_usuarios_cocheras` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idCochera` INT(11) NOT NULL,
  `IdUsuario` INT(11) NOT NULL,
  `fechaAlta` DATETIME NOT NULL,
  `FechaMod` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idCochera` (`idCochera`),
  KEY `IdUsuario` (`IdUsuario`),
  CONSTRAINT `detalle_usuarios_cocheras_ibfk_1` FOREIGN KEY (`idCochera`) REFERENCES `cocheras` (`idCochera`),
  CONSTRAINT `detalle_usuarios_cocheras_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`idUsuario`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `detalle_usuarios_cocheras` */

INSERT  INTO `detalle_usuarios_cocheras`(`id`,`idCochera`,`IdUsuario`,`fechaAlta`,`FechaMod`,`estado`) VALUES (1,1,3,'2024-10-29 22:14:30','2024-10-29 22:14:34',1),(2,1,4,'2024-10-29 22:14:44','2024-10-29 22:14:47',1);

/*Table structure for table `estados` */

DROP TABLE IF EXISTS `estados`;

CREATE TABLE `estados` (
  `idEstado` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(50) COLLATE utf8_spanish2_ci NOT NULL,
  `fechaAlta` DATETIME NOT NULL,
  `fechaMod` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idEstado`),
  UNIQUE KEY `descripcion` (`descripcion`)
) ENGINE=INNODB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `estados` */

INSERT  INTO `estados`(`idEstado`,`descripcion`,`fechaAlta`,`fechaMod`) VALUES (1,'Habilitado','2024-10-29 21:21:45','2024-10-29 21:21:52'),(2,'Deshabilitado','2024-10-29 21:22:08','2024-10-29 21:22:14'),(3,'Bloqueado','2024-10-29 21:22:45','2024-10-29 21:22:49'),(4,'Suspendido','2024-10-29 21:23:16','2024-10-29 21:23:19');

/*Table structure for table `franjas_horarias` */

DROP TABLE IF EXISTS `franjas_horarias`;

CREATE TABLE `franjas_horarias` (
  `idFranja` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(40) COLLATE utf8_spanish2_ci NOT NULL,
  `hora_inicio` TIME NOT NULL,
  `hora_fin` TIME NOT NULL,
  `fecha_inicio` DATE NOT NULL,
  `fecha_fin` DATE NOT NULL,
  `lun` TINYINT(1) NOT NULL,
  `mar` TINYINT(1) NOT NULL,
  `mir` TINYINT(1) NOT NULL,
  `jue` TINYINT(1) NOT NULL,
  `vie` TINYINT(1) NOT NULL,
  `sab` TINYINT(1) NOT NULL,
  `dom` TINYINT(1) NOT NULL,
  `fer` TINYINT(1) NOT NULL,
  `estado` TINYINT(1) DEFAULT '1',
  `cochera` INT(11) NOT NULL,
  PRIMARY KEY (`idFranja`),
  KEY `cochera` (`cochera`),
  CONSTRAINT `franjas_horarias_ibfk_1` FOREIGN KEY (`cochera`) REFERENCES `cocheras` (`idCochera`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `franjas_horarias` */

INSERT  INTO `franjas_horarias`(`idFranja`,`nombre`,`hora_inicio`,`hora_fin`,`fecha_inicio`,`fecha_fin`,`lun`,`mar`,`mir`,`jue`,`vie`,`sab`,`dom`,`fer`,`estado`,`cochera`) VALUES (1,'Noche','20:00:00','06:00:00','2024-10-30','2024-11-09',1,1,1,1,1,0,0,0,1,1),(2,'Dia','06:00:00','20:00:00','2024-10-29','2024-10-29',1,1,1,1,1,1,0,0,1,1);

/*Table structure for table `imagenes` */

DROP TABLE IF EXISTS `imagenes`;

CREATE TABLE `imagenes` (
  `idImagen` INT(11) NOT NULL AUTO_INCREMENT,
  `urlImg` VARCHAR(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` INT(11) NOT NULL DEFAULT '1',
  `fechaAlta` DATETIME NOT NULL,
  `fechaMod` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `eliminada` TINYINT(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idImagen`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

/*Data for the table `imagenes` */

INSERT  INTO `imagenes`(`idImagen`,`urlImg`,`estado`,`fechaAlta`,`fechaMod`,`eliminada`) VALUES (1,'/img/foto1.png',1,'2024-10-29 21:45:33','2024-10-29 21:44:52',0);

/*Table structure for table `imagenes_cocheras` */

DROP TABLE IF EXISTS `imagenes_cocheras`;

CREATE TABLE `imagenes_cocheras` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idCochera` INT(11) NOT NULL,
  `idImagen` INT(11) NOT NULL,
  `fechaAlta` DATETIME NOT NULL,
  `fechaMod` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idCochera` (`idCochera`),
  KEY `idImagen` (`idImagen`),
  CONSTRAINT `imagenes_cocheras_ibfk_1` FOREIGN KEY (`idCochera`) REFERENCES `cocheras` (`idCochera`),
  CONSTRAINT `imagenes_cocheras_ibfk_2` FOREIGN KEY (`idImagen`) REFERENCES `imagenes` (`idImagen`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `imagenes_cocheras` */

INSERT  INTO `imagenes_cocheras`(`id`,`idCochera`,`idImagen`,`fechaAlta`,`fechaMod`,`estado`) VALUES (1,1,1,'2024-10-29 21:46:42','2024-10-29 21:46:47',1);

/*Table structure for table `promociones` */

DROP TABLE IF EXISTS `promociones`;

CREATE TABLE `promociones` (
  `idPromocion` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(40) CHARACTER SET latin1 NOT NULL,
  `hora_inicio` TIME NOT NULL,
  `hora_fin` TIME NOT NULL,
  `fecha_inicio` DATE NOT NULL,
  `fecha_fin` DATE NOT NULL,
  `descuento` VARCHAR(50) CHARACTER SET latin1 NOT NULL,
  `estado` TINYINT(1) NOT NULL DEFAULT '1',
  `cochera` INT(11) NOT NULL,
  PRIMARY KEY (`idPromocion`),
  KEY `cochera` (`cochera`),
  CONSTRAINT `promociones_ibfk_1` FOREIGN KEY (`cochera`) REFERENCES `cocheras` (`idCochera`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `promociones` */

INSERT  INTO `promociones`(`idPromocion`,`nombre`,`hora_inicio`,`hora_fin`,`fecha_inicio`,`fecha_fin`,`descuento`,`estado`,`cochera`) VALUES (1,'Promo 1','00:00:00','15:00:00','2024-10-29','2024-11-07','10',1,1),(2,'Promo 2','19:00:00','23:00:00','2024-10-31','2024-12-24','15',1,1);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `idRol` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` VARCHAR(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fechaAlta` DATETIME NOT NULL,
  `estado` TINYINT(1) NOT NULL DEFAULT '1',
  `fechaMod` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo` INT(11) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=INNODB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `roles` */

INSERT  INTO `roles`(`idRol`,`nombre`,`descripcion`,`fechaAlta`,`estado`,`fechaMod`,`tipo`) VALUES (3,'Superusuario','superusuario','2024-10-29 21:31:37',1,'2024-10-29 21:31:42',0),(4,'AdminCochera','administrador cochera','2024-10-29 21:32:32',1,'2024-10-29 21:32:36',0),(5,'OperadorCochera','operador cochera','2024-10-29 21:33:04',1,'2024-10-29 21:33:07',0),(6,'Registrado','usuario registrado','2024-10-29 21:33:51',1,'2024-10-29 21:33:54',0),(7,'Invitado','usuario invitado','2024-10-29 21:34:10',1,'2024-10-29 21:34:13',0);

/*Table structure for table `tipo_acceso` */

DROP TABLE IF EXISTS `tipo_acceso`;

CREATE TABLE `tipo_acceso` (
  `idTipoAcceso` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(50) COLLATE utf8_spanish2_ci NOT NULL,
  `fechaAlta` DATETIME NOT NULL,
  `fechaMod` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` TINYINT(4) NOT NULL,
  PRIMARY KEY (`idTipoAcceso`),
  UNIQUE KEY `descripcion` (`descripcion`)
) ENGINE=INNODB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `tipo_acceso` */

INSERT  INTO `tipo_acceso`(`idTipoAcceso`,`descripcion`,`fechaAlta`,`fechaMod`,`estado`) VALUES (1,'Habilitado','2024-10-29 21:35:45','2024-10-29 21:35:59',1),(2,'Deshabilitado','2024-10-29 21:36:06','2024-10-29 21:36:10',1),(3,'Edicion','2024-10-29 21:36:23','2024-10-29 21:36:27',1),(4,'Bloqueado','2024-10-29 21:36:46','2024-10-29 21:36:49',1);

/*Table structure for table `tipos_vehiculos` */

DROP TABLE IF EXISTS `tipos_vehiculos`;

CREATE TABLE `tipos_vehiculos` (
  `idTipoVehiculo` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) COLLATE utf8_spanish2_ci NOT NULL,
  `idDetalleTipoVehiculo` INT(11) NOT NULL,
  `descripcion` VARCHAR(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fechaAlta` DATETIME NOT NULL,
  `fechaMod` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idTipoVehiculo`),
  KEY `idDetalleTipoVehiculo` (`idDetalleTipoVehiculo`),
  CONSTRAINT `tipos_vehiculos_ibfk_1` FOREIGN KEY (`idDetalleTipoVehiculo`) REFERENCES `detalle_tipos_vehiculos` (`IdDetalleTipoVehiculo`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `tipos_vehiculos` */

INSERT  INTO `tipos_vehiculos`(`idTipoVehiculo`,`nombre`,`idDetalleTipoVehiculo`,`descripcion`,`fechaAlta`,`fechaMod`,`estado`) VALUES (1,'Auto',1,'Auto Normal','2024-10-29 22:01:15','2024-10-29 22:01:18',1),(2,'Camioneta',2,'Camioneta 4x4','2024-10-29 22:01:42','2024-10-29 22:01:44',1);

/*Table structure for table `ubicacion_cocheras` */

DROP TABLE IF EXISTS `ubicacion_cocheras`;

CREATE TABLE `ubicacion_cocheras` (
  `idUbicacion` INT(11) NOT NULL AUTO_INCREMENT,
  `latitud` DECIMAL(10,8) NOT NULL,
  `longitud` DECIMAL(10,8) NOT NULL,
  `descripcion` VARCHAR(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fechaAlta` DATETIME NOT NULL,
  `fechaMod` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idUbicacion`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `ubicacion_cocheras` */

INSERT  INTO `ubicacion_cocheras`(`idUbicacion`,`latitud`,`longitud`,`descripcion`,`fechaAlta`,`fechaMod`,`estado`) VALUES (1,'99.99999999','99.99999999','cochera 1','2024-10-29 21:42:17','2024-10-29 21:42:19',1),(2,'99.99999999','99.99999999','cochera 2','2024-10-29 21:42:36','2024-10-29 21:42:40',1);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` VARCHAR(60) COLLATE utf8_spanish2_ci NOT NULL,
  `password` VARCHAR(60) COLLATE utf8_spanish2_ci NOT NULL,
  `email` VARCHAR(60) COLLATE utf8_spanish2_ci NOT NULL,
  `fechaAlta` DATETIME NOT NULL,
  `fechaMod` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rol` INT(11) NOT NULL,
  `estado` INT(11) NOT NULL DEFAULT '1',
  `verificado` TINYINT(1) NOT NULL DEFAULT '0',
  `cocheras` INT(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `rol` (`rol`),
  KEY `estado` (`estado`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`idRol`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`estado`) REFERENCES `estados` (`idEstado`)
) ENGINE=INNODB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `usuarios` */

INSERT  INTO `usuarios`(`idUsuario`,`nombre`,`descripcion`,`password`,`email`,`fechaAlta`,`fechaMod`,`rol`,`estado`,`verificado`,`cocheras`) VALUES (3,'Tio Tito','usuario de prueba','dasd4545','tiotito@gmail.com','2024-10-29 22:12:50','2024-10-29 22:12:55',3,1,1,0),(4,'Operador','usuario operador','4545dasd','invitado@gmail.com','2024-10-29 22:13:42','2024-10-29 22:13:46',5,1,1,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
