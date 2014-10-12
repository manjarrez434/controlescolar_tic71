/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.20 : Database - usuario
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`usuario` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `usuario`;

/*Table structure for table `alumno_grupo` */

DROP TABLE IF EXISTS `alumno_grupo`;

CREATE TABLE `alumno_grupo` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(6) DEFAULT NULL,
  `id_grupo` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `alumno_grupo` */

LOCK TABLES `alumno_grupo` WRITE;

UNLOCK TABLES;

/*Table structure for table `grupo` */

DROP TABLE IF EXISTS `grupo`;

CREATE TABLE `grupo` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `grupo` */

LOCK TABLES `grupo` WRITE;

insert  into `grupo`(`id`,`nombre`) values (1,'TIC 71'),(2,'TIC 72'),(3,'TIC 73');

UNLOCK TABLES;

/*Table structure for table `maestro_materia` */

DROP TABLE IF EXISTS `maestro_materia`;

CREATE TABLE `maestro_materia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_maestro` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `maestro_materia` */

LOCK TABLES `maestro_materia` WRITE;

insert  into `maestro_materia`(`id`,`id_maestro`,`id_materia`) values (1,14,1),(2,15,2);

UNLOCK TABLES;

/*Table structure for table `materia` */

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `avatar` varchar(60) DEFAULT NULL,
  `orden` varchar(60) DEFAULT NULL,
  `estatus` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `materia` */

LOCK TABLES `materia` WRITE;

insert  into `materia`(`id`,`nombre`,`avatar`,`orden`,`estatus`) values (1,'Español',NULL,'0','1'),(2,'Matematicas',NULL,'0','1');

UNLOCK TABLES;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(500) DEFAULT NULL,
  `ApellidoPaterno` varchar(500) DEFAULT NULL,
  `ApellidoMaterno` varchar(500) DEFAULT NULL,
  `Telefono` varchar(500) DEFAULT NULL,
  `Calle` varchar(500) DEFAULT NULL,
  `NumeroExterior` int(100) DEFAULT NULL,
  `NumeroInterior` int(100) DEFAULT NULL,
  `Colonia` varchar(500) DEFAULT NULL,
  `Municipio` varchar(500) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `CP` int(100) DEFAULT NULL,
  `Correo` varchar(500) DEFAULT NULL,
  `Usuario` varchar(500) DEFAULT NULL,
  `Pass` varchar(500) DEFAULT NULL,
  `Nivel` varchar(500) DEFAULT NULL,
  `Estatus` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

LOCK TABLES `usuario` WRITE;

insert  into `usuario`(`Id`,`Nombre`,`ApellidoPaterno`,`ApellidoMaterno`,`Telefono`,`Calle`,`NumeroExterior`,`NumeroInterior`,`Colonia`,`Municipio`,`Estado`,`CP`,`Correo`,`Usuario`,`Pass`,`Nivel`,`Estatus`) values (1,'Jonathan','Mendoza','Amado','123456','Morelos',12,12,'Morelos','Zina','Mexico',51370,'jonagio.12@gmail.com','Gio','12345','Admin','1'),(2,'Jose','Moles','MediA','123456','jOLOBKJB',323,23,'kNKNKS','mkKMNDKMKD','kmKNKDMKDM',45678,'jonagio.12@gmail.com','jOSE','34567','Alumno','1'),(3,'Miguel Angel','Manjarrez','Carbajal','1234566789','Fco I Madero',31,1,'San Lucas','Metepec','Mexico',12345,'manjarrez434@gmail.com','miguel','123456','Alumno','1'),(4,'UsuarioP1','Apellido1','Apellido2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Alumno','1'),(8,'Puebla','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1'),(9,'Puebla','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1'),(10,'puebla','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1'),(11,'Miguel','angel','manjarrez',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1'),(13,'Iliana','Arellano','Cruz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'3','1'),(14,'Raul','Gonzalez','Gonzales',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2','1'),(15,'Joel','Herrera','Cruz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2','1');

UNLOCK TABLES;

/* Procedure structure for procedure `validateLogin` */

/*!50003 DROP PROCEDURE IF EXISTS  `validateLogin` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `validateLogin`(in _usuario varchar(50), in _password varchar(50))
begin
SELECT Id FROM usuario WHERE usuario = _usuario AND Pass= _password;
end */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
