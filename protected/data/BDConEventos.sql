CREATE DATABASE  IF NOT EXISTS `FactoryPage` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `FactoryPage`;
-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: FactoryPage
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.13.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblArticulos`
--

DROP TABLE IF EXISTS `tblArticulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblArticulos` (
  `artId` int(11) NOT NULL AUTO_INCREMENT,
  `artNombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `artTitulo` varchar(45) COLLATE utf8_bin NOT NULL,
  `artContenido` text COLLATE utf8_bin NOT NULL,
  `artAutor` int(11) DEFAULT NULL,
  `artModificador` int(11) DEFAULT NULL,
  `artCategorias` int(11) NOT NULL,
  `artEstado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`artId`),
  KEY `fkArticulosAutor` (`artAutor`),
  KEY `fkArticulosModificador` (`artModificador`),
  KEY `fkArticulosCategorias` (`artCategorias`),
  CONSTRAINT `fkArticulosAutor` FOREIGN KEY (`artAutor`) REFERENCES `tblUsuarios` (`usuId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkArticulosCategorias` FOREIGN KEY (`artCategorias`) REFERENCES `tblCategorias` (`catId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkArticulosModificador` FOREIGN KEY (`artModificador`) REFERENCES `tblUsuarios` (`usuId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblArticulos`
--

LOCK TABLES `tblArticulos` WRITE;
/*!40000 ALTER TABLE `tblArticulos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblArticulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblPermisos`
--

DROP TABLE IF EXISTS `tblPermisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblPermisos` (
  `perId` int(11) NOT NULL AUTO_INCREMENT,
  `perRolesId` int(11) NOT NULL,
  `perControllerId` int(11) NOT NULL,
  `perAccion` varchar(50) COLLATE utf8_bin NOT NULL,
  `perEstado` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`perId`),
  KEY `permisos_roles_idx` (`perRolesId`),
  KEY `permisos_controllers_idx` (`perControllerId`),
  CONSTRAINT `fkpermisosControllers` FOREIGN KEY (`perControllerId`) REFERENCES `tblControladores` (`conId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkPermisosRoles` FOREIGN KEY (`perRolesId`) REFERENCES `tblRoles` (`rolId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblPermisos`
--

LOCK TABLES `tblPermisos` WRITE;
/*!40000 ALTER TABLE `tblPermisos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblPermisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblEventos`
--

DROP TABLE IF EXISTS `tblEventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblEventos` (
  `eveId` int(11) NOT NULL AUTO_INCREMENT,
  `eveNombre` varchar(60) COLLATE utf8_bin NOT NULL,
  `eveDescripcion` varchar(250) COLLATE utf8_bin NOT NULL,
  `eveLugar` varchar(60) COLLATE utf8_bin NOT NULL,
  `eveDireccion` varchar(60) COLLATE utf8_bin NOT NULL,
  `eveDepartamento` int(11) NOT NULL,
  `eveMunicipio` int(11) NOT NULL,
  `eveNumParticipantes` int(11) NOT NULL,
  `eveFechaInicio` date NOT NULL,
  `eveFechaFin` date NOT NULL,
  `eveHoraInicio` varchar(45) COLLATE utf8_bin NOT NULL,
  `eveHoraFin` varchar(45) COLLATE utf8_bin NOT NULL,
  `eveExpositor` varchar(60) COLLATE utf8_bin NOT NULL,
  `eveUsuario` int(11) NOT NULL,
  `eveFase` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`eveId`),
  KEY `eveUsuarioFk` (`eveUsuario`),
  KEY `eveFasefk` (`eveFase`),
  KEY `eveMunicipioFk` (`eveMunicipio`),
  CONSTRAINT `eveFasefk` FOREIGN KEY (`eveFase`) REFERENCES `tblFases` (`fasId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `eveMunicipioFk` FOREIGN KEY (`eveMunicipio`) REFERENCES `tbl_municipio` (`mun_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `eveUsuarioFk` FOREIGN KEY (`eveUsuario`) REFERENCES `tblUsuarios` (`usuId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblEventos`
--

LOCK TABLES `tblEventos` WRITE;
/*!40000 ALTER TABLE `tblEventos` DISABLE KEYS */;
INSERT INTO `tblEventos` VALUES (2,'CodinDojo arduino','se practicara con arduino','epicentro','cr n # x-y',47,660,25,'2013-12-14','2013-12-26','03:20 PM','02:15 PM','arduMaster',1,1),(3,'ChoriGatada','asadito con chorizo de gato','sena','cr nose que # no meacuaedo- 24',15,197,24,'2013-12-14','2013-12-14','08:00 AM','06:00 PM','alguien',1,1),(4,'release','release','fabrica de software','calle 34',5,1,50,'2013-12-13','2013-12-13','04:20 PM','05:20 PM','fab',1,1);
/*!40000 ALTER TABLE `tblEventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblControladores`
--

DROP TABLE IF EXISTS `tblControladores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblControladores` (
  `conId` int(11) NOT NULL AUTO_INCREMENT,
  `conNombre` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`conId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblControladores`
--

LOCK TABLES `tblControladores` WRITE;
/*!40000 ALTER TABLE `tblControladores` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblControladores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblFases`
--

DROP TABLE IF EXISTS `tblFases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblFases` (
  `fasId` int(11) NOT NULL AUTO_INCREMENT,
  `fasTipo` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`fasId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblFases`
--

LOCK TABLES `tblFases` WRITE;
/*!40000 ALTER TABLE `tblFases` DISABLE KEYS */;
INSERT INTO `tblFases` VALUES (1,'en espera'),(2,'en proseso'),(3,'finalizado');
/*!40000 ALTER TABLE `tblFases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblProyectos`
--

DROP TABLE IF EXISTS `tblProyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblProyectos` (
  `proId` int(11) NOT NULL AUTO_INCREMENT,
  `proNombre` varchar(60) COLLATE utf8_bin NOT NULL,
  `proDescripcion` varchar(250) COLLATE utf8_bin NOT NULL,
  `proFechaPostulacion` varchar(45) COLLATE utf8_bin NOT NULL,
  `proFechaInicio` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `proFechaFinal` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `proCantidadUsuarios` int(11) DEFAULT NULL,
  `proCantidadMaximoUsuarios` int(11) NOT NULL,
  `proCantidadMinimaUsuarios` int(11) NOT NULL,
  `proEstado` int(11) NOT NULL DEFAULT '1',
  `tblFases_fasId` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`proId`),
  KEY `fk_tblProyectos_tblFases1` (`tblFases_fasId`),
  CONSTRAINT `fk_tblProyectos_tblFases1` FOREIGN KEY (`tblFases_fasId`) REFERENCES `tblFases` (`fasId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblProyectos`
--

LOCK TABLES `tblProyectos` WRITE;
/*!40000 ALTER TABLE `tblProyectos` DISABLE KEYS */;
INSERT INTO `tblProyectos` VALUES (3,'Retail Master','sistema de evaluasion y asesoria de Reatails','12/14/2013',NULL,NULL,2,5,8,1,1);
/*!40000 ALTER TABLE `tblProyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblFotos`
--

DROP TABLE IF EXISTS `tblFotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblFotos` (
  `fotId` int(11) NOT NULL AUTO_INCREMENT,
  `fotUrl` varchar(70) COLLATE utf8_bin NOT NULL,
  `fotDescripcion` varchar(180) COLLATE utf8_bin NOT NULL,
  `fotEvento` int(11) NOT NULL,
  PRIMARY KEY (`fotId`),
  KEY `fotEventoFk` (`fotEvento`),
  CONSTRAINT `fotEventoFk` FOREIGN KEY (`fotEvento`) REFERENCES `tblEventos` (`eveId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblFotos`
--

LOCK TABLES `tblFotos` WRITE;
/*!40000 ALTER TABLE `tblFotos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblFotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblUsuarios_X_tblProyectos`
--

DROP TABLE IF EXISTS `tblUsuarios_X_tblProyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblUsuarios_X_tblProyectos` (
  `usuProId` int(11) NOT NULL AUTO_INCREMENT,
  `usuProUsuarioId` int(11) NOT NULL,
  `usuProProyectosId` int(11) NOT NULL,
  `usuProRoles` int(11) NOT NULL,
  PRIMARY KEY (`usuProId`),
  KEY `fkUsuariosProyectosProyectosId` (`usuProProyectosId`),
  KEY `fkUsuariosProyectosUsuariosId` (`usuProUsuarioId`),
  CONSTRAINT `fkUsuariosProyectosProyectosId` FOREIGN KEY (`usuProProyectosId`) REFERENCES `tblProyectos` (`proId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkUsuariosProyectosUsuariosId` FOREIGN KEY (`usuProUsuarioId`) REFERENCES `tblUsuarios` (`usuId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblUsuarios_X_tblProyectos`
--

LOCK TABLES `tblUsuarios_X_tblProyectos` WRITE;
/*!40000 ALTER TABLE `tblUsuarios_X_tblProyectos` DISABLE KEYS */;
INSERT INTO `tblUsuarios_X_tblProyectos` VALUES (1,1,3,2),(2,1,3,2);
/*!40000 ALTER TABLE `tblUsuarios_X_tblProyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblRoles`
--

DROP TABLE IF EXISTS `tblRoles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblRoles` (
  `rolId` int(11) NOT NULL AUTO_INCREMENT,
  `rolNombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `rolEstado` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`rolId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblRoles`
--

LOCK TABLES `tblRoles` WRITE;
/*!40000 ALTER TABLE `tblRoles` DISABLE KEYS */;
INSERT INTO `tblRoles` VALUES (1,'team menber',1),(2,'product owner',1),(3,'srum master',1);
/*!40000 ALTER TABLE `tblRoles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblUsuarios`
--

DROP TABLE IF EXISTS `tblUsuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblUsuarios` (
  `usuId` int(11) NOT NULL AUTO_INCREMENT,
  `usuNombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `usuApellido` varchar(45) COLLATE utf8_bin NOT NULL,
  `usuTelefono` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `usuEmail` varchar(45) COLLATE utf8_bin NOT NULL,
  `usuUsuario` varchar(45) COLLATE utf8_bin NOT NULL,
  `usuPassword` varchar(45) COLLATE utf8_bin NOT NULL,
  `usuRole` int(11) NOT NULL,
  `usuEstado` tinyint(4) NOT NULL DEFAULT '1',
  `usuImagen` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`usuId`),
  KEY `usuarios_roles_idx` (`usuRole`),
  CONSTRAINT `fkUsuariosRoles` FOREIGN KEY (`usuRole`) REFERENCES `tblRoles` (`rolId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblUsuarios`
--

LOCK TABLES `tblUsuarios` WRITE;
/*!40000 ALTER TABLE `tblUsuarios` DISABLE KEYS */;
INSERT INTO `tblUsuarios` VALUES (1,'esvire','waters','1234567','emal@emal.com','vircof','123456',1,1,'images/gatito.jpg');
/*!40000 ALTER TABLE `tblUsuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_departamento`
--

DROP TABLE IF EXISTS `tbl_departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_departamento` (
  `dep_id` varchar(2) COLLATE utf8_bin NOT NULL,
  `dep_nombre` varchar(80) COLLATE utf8_bin NOT NULL,
  `dep_estado` bit(1) NOT NULL,
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_departamento`
--

LOCK TABLES `tbl_departamento` WRITE;
/*!40000 ALTER TABLE `tbl_departamento` DISABLE KEYS */;
INSERT INTO `tbl_departamento` VALUES ('05','ANTIOQUIA',''),('08','ATLÁNTICO',''),('11','BOGOTÁ',''),('13','BOLÍVAR',''),('15','BOYACÁ',''),('17','CALDAS',''),('18','CAQUETÁ',''),('19','CAUCA',''),('20','CESAR',''),('23','CÓRDOBA',''),('25','CUNDINAMARCA',''),('27','CHOCÓ',''),('41','HUILA',''),('44','LA GUAJIRA',''),('47','META',''),('50','MAGDALENA',''),('52','NORTE DE SANTANDER',''),('54','NARIÑO',''),('63','QUINDÍO',''),('66','RISARALDA',''),('68','SANTANDER',''),('70','SUCRE',''),('73','TOLIMA',''),('76','VALLEDELCAUCA',''),('81','ARAUCA',''),('85','CASANARE',''),('86','PUTUMAYO',''),('88','ARCHIPIÉLAGO DE SAN ANDRÉS, PROVIDENCIA Y SANTA CATALINA',''),('91','AMAZONAS',''),('94','GUAINÍA',''),('95','GUAVIARE',''),('97','VAUPÉS',''),('99','VICHADA','');
/*!40000 ALTER TABLE `tbl_departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblUsuarios_X_tblIntereses`
--

DROP TABLE IF EXISTS `tblUsuarios_X_tblIntereses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblUsuarios_X_tblIntereses` (
  `usuIntId` int(11) NOT NULL AUTO_INCREMENT,
  `tblUsuarios_usuId` int(11) NOT NULL,
  `tblIntereses_intId` int(11) NOT NULL,
  PRIMARY KEY (`usuIntId`),
  KEY `fk_tblUsuarios_has_tblIntereses_tblIntereses1` (`tblIntereses_intId`),
  KEY `fk_tblUsuarios_has_tblIntereses_tblUsuarios1` (`tblUsuarios_usuId`),
  CONSTRAINT `fk_tblUsuarios_has_tblIntereses_tblIntereses1` FOREIGN KEY (`tblIntereses_intId`) REFERENCES `tblIntereses` (`intId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblUsuarios_has_tblIntereses_tblUsuarios1` FOREIGN KEY (`tblUsuarios_usuId`) REFERENCES `tblUsuarios` (`usuId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblUsuarios_X_tblIntereses`
--

LOCK TABLES `tblUsuarios_X_tblIntereses` WRITE;
/*!40000 ALTER TABLE `tblUsuarios_X_tblIntereses` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblUsuarios_X_tblIntereses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_municipio`
--

DROP TABLE IF EXISTS `tbl_municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_municipio` (
  `mun_id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_codigo` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `mun_codigo` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `mun_nombre` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `mun_estado` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`mun_id`),
  KEY `fk_dpto` (`dep_codigo`),
  CONSTRAINT `fk_dpto` FOREIGN KEY (`dep_codigo`) REFERENCES `tbl_departamento` (`dep_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1124 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_municipio`
--

LOCK TABLES `tbl_municipio` WRITE;
/*!40000 ALTER TABLE `tbl_municipio` DISABLE KEYS */;
INSERT INTO `tbl_municipio` VALUES (1,'05','001','MEDELLÍN','1'),(2,'05','002','ABEJORRAL','1'),(3,'05','004','ABRIAQUÍ','1'),(4,'05','021','ALEJANDRÍA','1'),(5,'05','030','AMAGÁ','1'),(6,'05','031','AMALFI','1'),(7,'05','034','ANDES','1'),(8,'05','036','ANGELÓPOLIS','1'),(9,'05','038','ANGOSTURA','1'),(10,'05','040','ANORÍ','1'),(11,'05','042','SANTAFÉ DE ANTIOQUIA','1'),(12,'05','044','ANZÁ','1'),(13,'05','045','APARTADÓ','1'),(14,'05','051','ARBOLETES','1'),(15,'05','055','ARGELIA','1'),(16,'05','059','ARMENIA','1'),(17,'05','079','BARBOSA','1'),(18,'05','086','BELMIRA','1'),(19,'05','088','BELLO','1'),(20,'05','091','BETANIA','1'),(21,'05','093','BETULIA','1'),(22,'05','101','BOLÍVAR','1'),(23,'05','107','BRICEÑO','1'),(24,'05','113','BURITICÁ','1'),(25,'05','120','CÁCERES','1'),(26,'05','125','CAICEDO','1'),(27,'05','129','CALDAS','1'),(28,'05','134','CAMPAMENTO','1'),(29,'05','138','CAÑASGORDAS','1'),(30,'05','142','CARACOLÍ','1'),(31,'05','145','CARAMANTA','1'),(32,'05','147','CAREPA','1'),(33,'05','148','CARMEN DE VIBORAL','1'),(34,'05','150','CAROLINA DEL PRÍNCIPE','1'),(35,'05','154','CAUCASIA','1'),(36,'05','172','CHIGORODÓ','1'),(37,'05','190','CISNEROS','1'),(38,'05','197','COCORNÁ','1'),(39,'05','206','CONCEPCIÓN','1'),(40,'05','209','CONCORDIA','1'),(41,'05','212','COPACABANA','1'),(42,'05','234','DABEIBA','1'),(43,'05','237','DON MATÍAS','1'),(44,'05','240','EBÉJICO','1'),(45,'05','250','EL BAGRE','1'),(46,'05','264','ENTRERRÍOS','1'),(47,'05','266','ENVIGADO','1'),(48,'05','282','FREDONIA','1'),(49,'05','284','FRONTINO','1'),(50,'05','306','GIRALDO','1'),(51,'05','308','GIRARDOTA','1'),(52,'05','310','GÓMEZ PLATA','1'),(53,'05','313','GRANADA','1'),(54,'05','315','GUADALUPE','1'),(55,'05','318','GUARNE','1'),(56,'05','321','GUATAPÉ','1'),(57,'05','347','HELICONIA','1'),(58,'05','353','HISPANIA','1'),(59,'05','360','ITAGÜÍ','1'),(60,'05','361','ITUANGO','1'),(61,'05','364','JARDÍN','1'),(62,'05','368','JERICÓ','1'),(63,'05','376','LA CEJA','1'),(64,'05','380','LA ESTRELLA','1'),(65,'05','390','LA PINTADA','1'),(66,'05','400','LA UNIÓN','1'),(67,'05','411','LIBORINA','1'),(68,'05','425','MACEO','1'),(69,'05','440','MARINILLA','1'),(70,'05','467','MONTEBELLO','1'),(71,'05','475','MURINDÓ','1'),(72,'05','480','MUTATÁ','1'),(73,'05','483','NARIÑO','1'),(74,'05','490','NECHÍ','1'),(75,'05','495','NECOCLÍ','1'),(76,'05','501','OLAYA','1'),(77,'05','541','EL PEÑOL','1'),(78,'05','543','PEQUE','1'),(79,'05','576','PUEBLORRICO','1'),(80,'05','579','PUERTO BERRÍO','1'),(81,'05','585','PUERTO NARE','1'),(82,'05','591','PUERTO TRIUNFO','1'),(83,'05','604','REMEDIOS','1'),(84,'05','607','EL RETIRO','1'),(85,'05','615','RIONEGRO','1'),(86,'05','628','SABANALARGA','1'),(87,'05','631','SABANETA','1'),(88,'05','642','SALGAR','1'),(89,'05','647','SAN ANDRÉS DE CUERQUIA','1'),(90,'05','649','SAN CARLOS','1'),(91,'05','652','SAN FRANCISCO','1'),(92,'05','656','SAN JERÓNIMO','1'),(93,'05','658','SAN JOSÉ DE LA MONTAÑA','1'),(94,'05','659','SAN JUAN DE URABÁ','1'),(95,'05','660','SAN LUIS','1'),(96,'05','664','SAN PEDRO DE LOS MILAGROS','1'),(97,'05','665','SAN PEDRO DE URABÁ','1'),(98,'05','667','SAN RAFAEL','1'),(99,'05','670','SAN ROQUE','1'),(100,'05','674','SAN VICENTE','1'),(101,'05','679','SANTA BÁRBARA','1'),(102,'05','686','SANTA ROSA DE OSOS','1'),(103,'05','690','SANTO DOMINGO','1'),(104,'05','697','EL SANTUARIO','1'),(105,'05','736','SEGOVIA','1'),(106,'05','756','SONSÓN','1'),(107,'05','761','SOPETRÁN','1'),(108,'05','789','TÁMESIS','1'),(109,'05','790','TARAZÁ','1'),(110,'05','792','TARSO','1'),(111,'05','809','TITIRIBÍ','1'),(112,'05','819','TOLEDO','1'),(113,'05','837','TURBO','1'),(114,'05','842','URAMITA','1'),(115,'05','847','URRAO','1'),(116,'05','854','VALDIVIA','1'),(117,'05','856','VALPARAÍSO','1'),(118,'05','858','VEGACHÍ','1'),(119,'05','861','VENECIA','1'),(120,'05','873','VIGÍA DEL FUERTE','1'),(121,'05','885','YALÍ','1'),(122,'05','887','YARUMAL','1'),(123,'05','890','YOLOMBÓ','1'),(124,'05','893','YONDÓ','1'),(125,'05','895','ZARAGOZA','1'),(126,'08','001','BARRANQUILLA','1'),(127,'08','078','
BARANOA','1'),(128,'08','137','CAMPO DE LA CRUZ','1'),(129,'08','141','CANDELARIA','1'),(130,'08','296','GALAPA','1'),(131,'08','372','JUAN DE ACOSTA','1'),(132,'08','421','LURUACO','1'),(133,'08','433','MALAMBO','1'),(134,'08','436','MANATÍ','1'),(135,'08','520','PALMAR DE VARELA','1'),(136,'08','549','PIOJÓ','1'),(137,'08','558','POLONUEVO','1'),(138,'08','560','PONEDERA','1'),(139,'08','573','PUERTO COLOMBIA','1'),(140,'08','606','REPELÓN','1'),(141,'08','634','SABANAGRANDE','1'),(142,'08','638','SABANALARGA','1'),(143,'08','675','SANTA LUCÍA','1'),(144,'08','685','SANTO TOMÁS','1'),(145,'08','758','SOLEDAD','1'),(146,'08','770','SUÁN','1'),(147,'08','832','TUBARÁ','1'),(148,'08','849','USIACURÍ','1'),(149,'11','001','BOGOTÁ D.C.','1'),(150,'13','001','CARTAGENA DE INDIAS','1'),(151,'13','006','ACHÍ','1'),(152,'13','030','ALTOS DEL ROSARIO','1'),(153,'13','042','ARENAL','1'),(154,'13','052','ARJONA','1'),(155,'13','062','ARROYOHONDO','1'),(156,'13','074','BARRANCO DE LOBA','1'),(157,'13','999','BRAZUELO DE PAPAYAL','1'),(158,'13','140','CALAMAR','1'),(159,'13','160','CANTAGALLO','1'),(160,'13','188','CICUCO','1'),(161,'13','212','CÓRDOBA','1'),(162,'13','222','CLEMENCIA','1'),(163,'13','244','EL CARMEN DE BOLÍVAR','1'),(164,'13','248','EL GUAMO','1'),(165,'13','268','EL PEÑÓN','1'),(166,'13','300','HATILLO DE LOBA','1'),(167,'13','430','MAGANGUÉ','1'),(168,'13','433','MAHATES','1'),(169,'13','440','MARGARITA','1'),(170,'13','442','MARÍA LA BAJA','1'),(171,'13','458','MONTECRISTO','1'),(172,'13','468','SANTA CRUZ DE MOMPOX','1'),(173,'13','490','NOROSÍ','1'),(174,'13','473','MORALES','1'),(175,'13','549','PINILLOS','1'),(176,'13','580','REGIDOR','1'),(177,'13','600','RÍO VIEJO','1'),(178,'13','620','SAN CRISTÓBAL','1'),(179,'13','647','SAN ESTANISLAO','1'),(180,'13','650','SAN FERNANDO','1'),(181,'13','654','SAN JACINTO','1'),(182,'13','655','SAN JACINTO DEL CAUCA','1'),(183,'13','657','SAN JUAN NEPOMUCENO','1'),(184,'13','667','SAN MARTÍN DE LOBA','1'),(185,'13','670','SAN PABLO','1'),(186,'13','673','SANTA CATALINA','1'),(187,'13','683','SANTA ROSA','1'),(188,'13','688','SANTA ROSA DEL SUR','1'),(189,'13','744','SIMITÍ','1'),(190,'13','760','SOPLAVIENTO','1'),(191,'13','780','TALAIGUA NUEVO','1'),(192,'13','810','TIQUISIO','1'),(193,'13','836','TURBACO','1'),(194,'13','838','TURBANÁ','1'),(195,'13','873','VILLANUEVA','1'),(196,'13','894','ZAMBRANO','1'),(197,'15','001','TUNJA','1'),(198,'15','022','ALMEIDA','1'),(199,'15','047','AQUITANIA','1'),(200,'15','051','ARCABUCO','1'),(201,'15','087','BELÉN','1'),(202,'15','090','BERBEO','1'),(203,'15','092','BETÉITIVA','1'),(204,'15','097','BOAVITA','1'),(205,'15','104','BOYACÁ','1'),(206,'15','106','BRICEÑO','1'),(207,'15','109','BUENAVISTA','1'),(208,'15','114','BUSBANZÁ','1'),(209,'15','131','CALDAS','1'),(210,'15','135','CAMPOHERMOSO','1'),(211,'15','162','CERINZA','1'),(212,'15','172','CHINAVITA','1'),(213,'15','176','CHIQUINQUIRÁ','1'),(214,'15','180','CHISCAS','1'),(215,'15','183','CHITA','1'),(216,'15','185','CHITARAQUE','1'),(217,'15','187','CHIVATÁ','1'),(218,'15','189','CIÉNEGA','1'),(219,'15','204','CÓMBITA','1'),(220,'15','212','COPER','1'),(221,'15','215','CORRALES','1'),(222,'15','218','COVARACHÍA','1'),(223,'15','223','CUBARÁ','1'),(224,'15','224','CUCAITA','1'),(225,'15','226','CUÍTIVA','1'),(226,'15','232','CHÍQUIZA','1'),(227,'15','236','CHIVOR','1'),(228,'15','238','DUITAMA','1'),(229,'15','244','EL COCUY','1'),(230,'15','248','EL ESPINO','1'),(231,'15','272','FIRAVITOBA','1'),(232,'15','276','FLORESTA','1'),(233,'15','293','GACHANTIVÁ','1'),(234,'15','296','GÁMEZA','1'),(235,'15','299','GARAGOA','1'),(236,'15','317','GUACAMAYAS','1'),(237,'15','322','GUATEQUE','1'),(238,'15','325','GUAYATÁ','1'),(239,'15','332','GÜICÁN','1'),(240,'15','362','IZA','1'),(241,'15','367','JENESANO','1'),(242,'15','368','JERICÓ','1'),(243,'15','377','LABRANZAGRANDE','1'),(244,'15','380','LA CAPILLA','1'),(245,'15','401','LA UVITA','1'),(246,'15','403','LA VICTORIA','1'),(247,'15','407','VILLA DE LEYVA','1'),(248,'15','425','MACANAL','1'),(249,'15','442','MARIPÍ','1'),(250,'
15','455','MIRAFLORES','1'),(251,'15','464','MONGUA','1'),(252,'15','466','MONGUÍ','1'),(253,'15','469','MONIQUIRÁ','1'),(254,'15','476','MOTAVITA','1'),(255,'15','480','MUZO','1'),(256,'15','491','NOBSA','1'),(257,'15','494','NUEVO COLÓN','1'),(258,'15','500','OICATÁ','1'),(259,'15','507','OTANCHE','1'),(260,'15','511','PACHAVITA','1'),(261,'15','514','PÁEZ','1'),(262,'15','516','PAIPA','1'),(263,'15','518','PAJARITO','1'),(264,'15','522','PANQUEBA','1'),(265,'15','531','PAUNA','1'),(266,'15','533','PAYA','1'),(267,'15','537','PAZ DE RÍO','1'),(268,'15','542','PESCA','1'),(269,'15','550','PISBA','1'),(270,'15','572','PUERTO BOYACÁ','1'),(271,'15','580','QUÍPAMA','1'),(272,'15','599','RAMIRIQUÍ','1'),(273,'15','600','RÁQUIRA','1'),(274,'15','621','RONDÓN','1'),(275,'15','632','SABOYÁ','1'),(276,'15','638','SÁCHICA','1'),(277,'15','646','SAMACÁ','1'),(278,'15','660','SAN EDUARDO','1'),(279,'15','664','SAN JOSÉ DE PARE','1'),(280,'15','667','SAN LUIS DE GACENO','1'),(281,'15','673','SAN MATEO','1'),(282,'15','676','SAN MIGUEL DE SEMA','1'),(283,'15','681','SAN PABLO DE BORBUR','1'),(284,'15','686','SANTANA','1'),(285,'15','690','SANTA MARÍA','1'),(286,'15','693','SANTA ROSA DE VITERBO','1'),(287,'15','696','SANTA SOFÍA','1'),(288,'15','720','SATIVANORTE','1'),(289,'15','723','SATIVASUR','1'),(290,'15','740','SIACHOQUE','1'),(291,'15','753','SOATÁ','1'),(292,'15','755','SOCOTÁ','1'),(293,'15','757','SOCHA','1'),(294,'15','759','SOGAMOSO','1'),(295,'15','761','SOMONDOCO','1'),(296,'15','762','SORA','1'),(297,'15','763','SOTAQUIRÁ','1'),(298,'15','764','SORACÁ','1'),(299,'15','774','SUSACÓN','1'),(300,'15','776','SUTAMARCHÁN','1'),(301,'15','778','SUTATENZA','1'),(302,'15','790','TASCO','1'),(303,'15','798','TENZA','1'),(304,'15','804','TIBANÁ','1'),(305,'15','806','TIBASOSA','1'),(306,'15','808','TINJACÁ','1'),(307,'15','810','TIPACOQUE','1'),(308,'15','814','TOCA','1'),(309,'15','816','TOGÜÍ','1'),(310,'15','820','TÓPAGA','1'),(311,'15','822','TOTA','1'),(312,'15','832','TUNUNGUÁ','1'),(313,'15','835','TURMEQUÉ','1'),(314,'15','837','TUTA','1'),(315,'15','839','TUTAZÁ','1'),(316,'15','842','UMBITA','1'),(317,'15','861','VENTAQUEMADA','1'),(318,'15','879','VIRACACHÁ','1'),(319,'15','897','ZETAQUIRA','1'),(320,'17','001','MANIZALES','1'),(321,'17','013','AGUADAS','1'),(322,'17','042','ANSERMA','1'),(323,'17','050','ARANZAZU','1'),(324,'17','088','BELALCÁZAR','1'),(325,'17','174','CHINCHINÁ','1'),(326,'17','272','FILADELFIA','1'),(327,'17','380','LA DORADA','1'),(328,'17','388','LA MERCED','1'),(329,'17','433','MANZANARES','1'),(330,'17','442','MARMATO','1'),(331,'17','444','MARQUETALIA','1'),(332,'17','446','MARULANDA','1'),(333,'17','486','NEIRA','1'),(334,'17','495','NORCASIA','1'),(335,'17','513','PÁCORA','1'),(336,'17','524','PALESTINA','1'),(337,'17','541','PENSILVANIA','1'),(338,'17','614','RIOSUCIO','1'),(339,'17','616','RISARALDA','1'),(340,'17','653','SALAMINA','1'),(341,'17','662','SAMANÁ','1'),(342,'17','665','SAN JOSÉ','1'),(343,'17','777','SUPÍA','1'),(344,'17','867','VICTORIA','1'),(345,'17','873','VILLAMARÍA','1'),(346,'17','877','VITERBO','1'),(347,'18','001','FLORENCIA','1'),(348,'18','029','ALBANIA','1'),(349,'18','094','BELÉN DE LOS ANDAQUÍES','1'),(350,'18','150','CARTAGENA DEL CHAIRÁ','1'),(351,'18','205','CURILLO','1'),(352,'18','247','EL DONCELLO','1'),(353,'18','256','EL PAUJIL','1'),(354,'18','410','LA MONTAÑITA','1'),(355,'18','460','PUERTO MILÁN','1'),(356,'18','479','MORELIA','1'),(357,'18','592','PUERTO RICO','1'),(358,'18','610','SAN JOSÉ DEL FRAGUA','1'),(359,'18','753','SAN VICENTE DEL CAGUÁN','1'),(360,'18','756','SOLANO','1'),(361,'18','785','SOLITA','1'),(362,'18','860','VALPARAÍSO','1'),(363,'19','001','POPAYÁN','1'),(364,'19','022','ALMAGUER','1'),(365,'19','050','ARGELIA','1'),(366,'19','075','BALBOA','1'),(367,'19','100','BOLÍVAR','1'),(368,'19','110','BUENOS AIRES','1'),(369,'19','130','CAJIBÍO','1'),(370,'19','137','CALDONÓ','1'),(371,'19','142','CALOTO','1'),(372,'19','212','CORINTO','1'),(373,'19','256','EL TAMBO','1'),(374,'19','290','FLORENCIA','1'),(375,'19','300','GUACHENÉ','1'),
(376,'19','318','GUAPÍ','1'),(377,'19','355','INZÁ','1'),(378,'19','364','JAMBALÓ','1'),(379,'19','392','LA SIERRA','1'),(380,'19','397','LA VEGA','1'),(381,'19','418','LÓPEZ DE MICAY','1'),(382,'19','450','MERCADERES','1'),(383,'19','455','MIRANDA','1'),(384,'19','473','MORALES','1'),(385,'19','513','PADILLA','1'),(386,'19','517','PÁEZ','1'),(387,'19','532','PATÍA','1'),(388,'19','533','PIAMONTE','1'),(389,'19','548','PIENDAMÓ','1'),(390,'19','573','PUERTO TEJADA','1'),(391,'19','585','PURACÉ','1'),(392,'19','622','ROSAS','1'),(393,'19','693','SAN SEBASTIÁN','1'),(394,'19','698','SANTANDER DE QUILICHAO','1'),(395,'19','701','SANTA ROSA','1'),(396,'19','743','SILVIA','1'),(397,'19','760','SOTARÁ','1'),(398,'19','780','SUÁREZ','1'),(399,'19','785','SUCRE','1'),(400,'19','807','TIMBÍO','1'),(401,'19','809','TIMBIQUÍ','1'),(402,'19','821','TORIBÍO','1'),(403,'19','824','TOTORÓ','1'),(404,'19','845','VILLA RICA','1'),(405,'20','001','VALLEDUPAR','1'),(406,'20','011','AGUACHICA','1'),(407,'20','013','AGUSTÍN CODAZZI','1'),(408,'20','032','ASTREA','1'),(409,'20','045','BECERRIL','1'),(410,'20','060','BOSCONIA','1'),(411,'20','175','CHIMICHAGUA','1'),(412,'20','178','CHIRIGUANÁ','1'),(413,'20','228','CURUMANÍ','1'),(414,'20','238','EL COPEY','1'),(415,'20','250','EL PASO','1'),(416,'20','295','GAMARRA','1'),(417,'20','310','GONZÁLEZ','1'),(418,'20','383','LA GLORIA','1'),(419,'20','400','LA JAGUA DE IBIRICO','1'),(420,'20','443','MANAURE BALCÓN DEL CESAR','1'),(421,'20','517','PAILITAS','1'),(422,'20','550','PELAYA','1'),(423,'20','570','PUEBLO BELLO','1'),(424,'20','614','RÍO DE ORO','1'),(425,'20','621','LA PAZ','1'),(426,'20','710','SAN ALBERTO','1'),(427,'20','750','SAN DIEGO','1'),(428,'20','770','SAN MARTÍN','1'),(429,'20','787','TAMALAMEQUE','1'),(430,'23','001','MONTERÍA','1'),(431,'23','068','AYAPEL','1'),(432,'23','079','BUENAVISTA','1'),(433,'23','090','CANALETE','1'),(434,'23','162','CERETÉ','1'),(435,'23','168','CHIMÁ','1'),(436,'23','182','CHINÚ','1'),(437,'23','189','CIÉNAGA DE ORO','1'),(438,'23','300','COTORRA','1'),(439,'23','350','LA APARTADA','1'),(440,'23','417','SANTA CRUZ DE LORICA','1'),(441,'23','419','LOS CÓRDOBAS','1'),(442,'23','464','MOMIL','1'),(443,'23','466','MONTELÍBANO','1'),(444,'23','500','MOÑITOS','1'),(445,'23','555','PLANETA RICA','1'),(446,'23','570','PUEBLO NUEVO','1'),(447,'23','574','PUERTO ESCONDIDO','1'),(448,'23','580','PUERTO LIBERTADOR','1'),(449,'23','586','PURÍSIMA','1'),(450,'23','660','SAHAGÚN','1'),(451,'23','670','SAN ANDRÉS DE SOTAVENTO','1'),(452,'23','672','SAN ANTERO','1'),(453,'23','675','SAN BERNARDO DEL VIENTO','1'),(454,'23','678','SAN CARLOS','1'),(455,'23','682','SAN JOSÉ DE URÉ','1'),(456,'23','686','SAN PELAYO','1'),(457,'23','807','TIERRALTA','1'),(458,'23','815','TUCHÍN','1'),(459,'23','855','VALENCIA','1'),(460,'25','001','AGUA DE DIOS','1'),(461,'25','019','ALBÁN','1'),(462,'25','035','ANAPOIMA','1'),(463,'25','040','ANOLAIMA','1'),(464,'25','053','ARBELÁEZ','1'),(465,'25','086','BELTRÁN','1'),(466,'25','095','BITUIMA','1'),(467,'25','099','BOJACÁ','1'),(468,'25','120','CABRERA','1'),(469,'25','123','CACHIPAY','1'),(470,'25','126','CAJICÁ','1'),(471,'25','148','CAPARRAPÍ','1'),(472,'25','151','CÁQUEZA','1'),(473,'25','154','CARMEN DE CARUPA','1'),(474,'25','168','CHAGUANÍ','1'),(475,'25','175','CHÍA','1'),(476,'25','178','CHIPAQUE','1'),(477,'25','181','CHOACHÍ','1'),(478,'25','183','CHOCONTÁ','1'),(479,'25','200','COGUA','1'),(480,'25','214','COTA','1'),(481,'25','224','CUCUNUBÁ','1'),(482,'25','245','EL COLEGIO','1'),(483,'25','258','EL PEÑÓN','1'),(484,'25','260','EL ROSAL','1'),(485,'25','269','FACATATIVÁ','1'),(486,'25','279','FÓMEQUE','1'),(487,'25','281','FOSCA','1'),(488,'25','286','FUNZA','1'),(489,'25','288','FÚQUENE','1'),(490,'25','290','FUSAGASUGÁ','1'),(491,'25','293','GACHALÁ','1'),(492,'25','295','GACHANCIPÁ','1'),(493,'25','297','GACHETÁ','1'),(494,'25','299','GAMA','1'),(495,'25','307','GIRARDOT','1'),(496,'25','312','GRANADA','1'),(497,'25','317','GUACHETÁ','1'),(498,'25','320','GUADUAS','1'),(499,'25','322','GUASCA','1'),(500,'25','324','
GUATAQUÍ','1'),(501,'25','326','GUATAVITA','1'),(502,'25','328','GUAYABAL DE SÍQUIMA','1'),(503,'25','335','GUAYABETAL','1'),(504,'25','339','GUTIÉRREZ','1'),(505,'25','368','JERUSALÉN','1'),(506,'25','372','JUNÍN','1'),(507,'25','377','LA CALERA','1'),(508,'25','386','LA MESA','1'),(509,'25','394','LA PALMA','1'),(510,'25','398','LA PEÑA','1'),(511,'25','402','LA VEGA','1'),(512,'25','407','LENGUAZAQUE','1'),(513,'25','426','MACHETÁ','1'),(514,'25','430','MADRID','1'),(515,'25','436','MANTA','1'),(516,'25','438','MEDINA','1'),(517,'25','473','MOSQUERA','1'),(518,'25','483','NARIÑO','1'),(519,'25','486','NEMOCÓN','1'),(520,'25','488','NILO','1'),(521,'25','489','NIMAIMA','1'),(522,'25','491','NOCAIMA','1'),(523,'25','506','VENECIA','1'),(524,'25','513','PACHO','1'),(525,'25','518','PAIME','1'),(526,'25','524','PANDI','1'),(527,'25','530','PARATEBUENO','1'),(528,'25','535','PASCA','1'),(529,'25','572','PUERTO SALGAR','1'),(530,'25','580','PULÍ','1'),(531,'25','592','QUEBRADANEGRA','1'),(532,'25','594','QUETAME','1'),(533,'25','596','QUIPILE','1'),(534,'25','599','APULO','1'),(535,'25','612','RICAURTE','1'),(536,'25','645','SAN ANTONIO DEL TEQUENDAMA','1'),(537,'25','649','SAN BERNARDO','1'),(538,'25','653','SAN CAYETANO','1'),(539,'25','658','SAN FRANCISCO','1'),(540,'25','662','SAN JUAN DE RIOSECO','1'),(541,'25','718','SASAIMA','1'),(542,'25','736','SESQUILÉ','1'),(543,'25','740','SIBATÉ','1'),(544,'25','743','SILVANIA','1'),(545,'25','745','SIMIJACA','1'),(546,'25','754','SOACHA','1'),(547,'25','758','SOPÓ','1'),(548,'25','769','SUBACHOQUE','1'),(549,'25','772','SUESCA','1'),(550,'25','777','SUPATÁ','1'),(551,'25','779','SUSA','1'),(552,'25','781','SUTATAUSA','1'),(553,'25','785','TABIO','1'),(554,'25','793','TAUSA','1'),(555,'25','797','TENA','1'),(556,'25','799','TENJO','1'),(557,'25','805','TIBACUY','1'),(558,'25','807','TIBIRITA','1'),(559,'25','815','TOCAIMA','1'),(560,'25','817','TOCANCIPÁ','1'),(561,'25','823','TOPAIPÍ','1'),(562,'25','839','UBALÁ','1'),(563,'25','841','UBAQUE','1'),(564,'25','843','VILLA DE SAN DIEGO DE UBATÉ','1'),(565,'25','845','UNE','1'),(566,'25','851','ÚTICA','1'),(567,'25','862','VERGARA','1'),(568,'25','867','VIANÍ','1'),(569,'25','871','VILLAGÓMEZ','1'),(570,'25','873','VILLAPINZÓN','1'),(571,'25','875','VILLETA','1'),(572,'25','878','VIOTÁ','1'),(573,'25','885','YACOPÍ','1'),(574,'25','898','ZIPACÓN','1'),(575,'25','899','ZIPAQUIRÁ','1'),(576,'27','001','QUIBDÓ','1'),(577,'27','006','ACANDÍ','1'),(578,'27','025','ALTO BAUDÓ','1'),(579,'27','050','ATRATO','1'),(580,'27','073','BAGADÓ','1'),(581,'27','075','BAHÍA SOLANO','1'),(582,'27','077','BAJO BAUDÓ','1'),(583,'27','099','BOJAYÁ','1'),(584,'27','135','EL CANTÓN DE SAN PABLO','1'),(585,'27','150','EL CARMEN DEL DARIÉN','1'),(586,'27','160','CÉRTEGUI','1'),(587,'27','205','CONDOTO','1'),(588,'27','245','EL CARMEN DE ATRATO','1'),(589,'27','250','EL LITORAL DE SAN JUAN','1'),(590,'27','361','ISTMINA','1'),(591,'27','372','JURADÓ','1'),(592,'27','413','LLORÓ','1'),(593,'27','425','MEDIO ATRATO','1'),(594,'27','430','MEDIO BAUDÓ','1'),(595,'27','450','MEDIO SAN JUAN','1'),(596,'27','491','NÓVITA','1'),(597,'27','495','NUQUÍ','1'),(598,'27','580','RÍO IRÓ','1'),(599,'27','600','RÍO QUITO','1'),(600,'27','615','RIOSUCIO','1'),(601,'27','660','SAN JOSÉ DEL PALMAR','1'),(602,'27','745','SIPÍ','1'),(603,'27','787','TADÓ','1'),(604,'27','800','UNGUÍA','1'),(605,'27','810','UNIÓN PANAMERICANA','1'),(606,'41','001','NEIVA','1'),(607,'41','006','ACEVEDO','1'),(608,'41','013','AGRADO','1'),(609,'41','016','AIPE','1'),(610,'41','020','ALGECIRAS','1'),(611,'41','026','ALTAMIRA','1'),(612,'41','078','BARAYA','1'),(613,'41','132','CAMPOALEGRE','1'),(614,'41','206','COLOMBIA','1'),(615,'41','244','ELÍAS','1'),(616,'41','298','GARZÓN','1'),(617,'41','306','GIGANTE','1'),(618,'41','319','GUADALUPE','1'),(619,'41','349','HOBO','1'),(620,'41','357','ÍQUIRA','1'),(621,'41','359','ISNOS','1'),(622,'41','378','LA ARGENTINA','1'),(623,'41','396','LA PLATA','1'),(624,'41','483','NÁTAGA','1'),(625,'41','503','OPORAPA','1'),(626,'41','518','PAICOL','1'),(627,'41'
,'524','PALERMO','1'),(628,'41','530','PALESTINA','1'),(629,'41','548','PITAL','1'),(630,'41','551','PITALITO','1'),(631,'41','615','RIVERA','1'),(632,'41','660','SALADOBLANCO','1'),(633,'41','668','SAN AGUSTÍN','1'),(634,'41','676','SANTA MARÍA','1'),(635,'41','770','SUAZA','1'),(636,'41','791','TARQUI','1'),(637,'41','797','TESALIA','1'),(638,'41','799','TELLO','1'),(639,'41','801','TERUEL','1'),(640,'41','807','TIMANÁ','1'),(641,'41','872','VILLAVIEJA','1'),(642,'41','885','YAGUARÁ','1'),(643,'44','001','RIOHACHA','1'),(644,'44','035','ALBANIA','1'),(645,'44','078','BARRANCAS','1'),(646,'44','090','DIBULLA','1'),(647,'44','098','DISTRACCIÓN','1'),(648,'44','110','EL MOLINO','1'),(649,'44','279','FONSECA','1'),(650,'44','378','HATONUEVO','1'),(651,'44','420','LA JAGUA DEL PILAR','1'),(652,'44','430','MAICAO','1'),(653,'44','560','MANAURE','1'),(654,'44','650','SAN JUAN DEL CESAR','1'),(655,'44','847','URIBIA','1'),(656,'44','855','URUMITA','1'),(657,'44','874','VILLANUEVA','1'),(658,'47','001','SANTA MARTA','1'),(659,'47','030','ALGARROBO','1'),(660,'47','053','ARACATACA','1'),(661,'47','058','ARIGUANÍ','1'),(662,'47','161','CERRO DE SAN ANTONIO','1'),(663,'47','170','CHIBOLO','1'),(664,'47','189','CIÉNAGA','1'),(665,'47','205','CONCORDIA','1'),(666,'47','245','EL BANCO','1'),(667,'47','258','EL PIÑÓN','1'),(668,'47','268','EL RETÉN','1'),(669,'47','288','FUNDACIÓN','1'),(670,'47','318','GUAMAL','1'),(671,'47','460','NUEVA GRANADA','1'),(672,'47','541','PEDRAZA','1'),(673,'47','545','PIJIÑO DEL CARMEN','1'),(674,'47','551','PIVIJAY','1'),(675,'47','555','PLATO','1'),(676,'47','570','PUEBLO VIEJO','1'),(677,'47','605','REMOLINO','1'),(678,'47','660','SABANAS DE SAN ANGEL','1'),(679,'47','675','SALAMINA','1'),(680,'47','692','SAN SEBASTIÁN DE BUENAVISTA','1'),(681,'47','703','SAN ZENÓN','1'),(682,'47','707','SANTA ANA','1'),(683,'47','720','SANTA BÁRBARA DE PINTO','1'),(684,'47','745','SITIONUEVO','1'),(685,'47','798','TENERIFE','1'),(686,'47','960','ZAPAYÁN','1'),(687,'47','980','ZONA BANANERA','1'),(688,'50','001','VILLAVICENCIO','1'),(689,'50','006','ACACÍAS','1'),(690,'50','110','BARRANCA DE UPÍA','1'),(691,'50','124','CABUYARO','1'),(692,'50','150','CASTILLA LA NUEVA','1'),(693,'50','223','CUBARRAL','1'),(694,'50','226','CUMARAL','1'),(695,'50','245','EL CALVARIO','1'),(696,'50','251','EL CASTILLO','1'),(697,'50','270','EL DORADO','1'),(698,'50','287','FUENTE DE ORO','1'),(699,'50','313','GRANADA','1'),(700,'50','318','GUAMAL','1'),(701,'50','325','MAPIRIPÁN','1'),(702,'50','330','MESETAS','1'),(703,'50','350','LA MACARENA','1'),(704,'50','370','LA URIBE','1'),(705,'50','400','LEJANÍAS','1'),(706,'50','450','PUERTO CONCORDIA','1'),(707,'50','568','PUERTO GAITÁN','1'),(708,'50','573','PUERTO LÓPEZ','1'),(709,'50','577','PUERTO LLERAS','1'),(710,'50','590','PUERTO RICO','1'),(711,'50','606','RESTREPO','1'),(712,'50','680','SAN CARLOS DE GUAROA','1'),(713,'50','683','SAN JUAN DE ARAMA','1'),(714,'50','686','SAN JUANITO','1'),(715,'50','689','SAN MARTÍN','1'),(716,'50','711','VISTA HERMOSA','1'),(717,'52','001','SAN JUAN DE PASTO','1'),(718,'52','019','SAN JOSÉ DE ALBÁN','1'),(719,'52','022','ALDANA','1'),(720,'52','036','ANCUYÁ','1'),(721,'52','051','ARBOLEDA','1'),(722,'52','079','BARBACOAS','1'),(723,'52','083','BELÉN','1'),(724,'52','110','BUESACO','1'),(725,'52','203','COLÓN','1'),(726,'52','207','CONSACÁ','1'),(727,'52','210','CONTADERO','1'),(728,'52','215','CÓRDOBA','1'),(729,'52','224','CUASPUD','1'),(730,'52','227','CUMBAL','1'),(731,'52','233','CUMBITARA','1'),(732,'52','240','CHACHAGÜÍ','1'),(733,'52','250','EL CHARCO','1'),(734,'52','254','EL PEÑOL','1'),(735,'52','256','EL ROSARIO','1'),(736,'52','258','EL TABLÓN DE GÓMEZ','1'),(737,'52','260','EL TAMBO','1'),(738,'52','287','FUNES','1'),(739,'52','317','GUACHUCAL','1'),(740,'52','320','GUAITARILLA','1'),(741,'52','323','GUALMATÁN','1'),(742,'52','352','ILES','1'),(743,'52','354','IMUÉS','1'),(744,'52','356','IPIALES','1'),(745,'52','378','LA CRUZ','1'),(746,'52','381','LA FLORIDA','1'),(747,'52','385','LA LLANADA','1'),(748,'52','390','LA TOLA','1'),(749,
'52','399','LA UNIÓN','1'),(750,'52','405','LEIVA','1'),(751,'52','411','LINARES','1'),(752,'52','418','LOS ANDES','1'),(753,'52','427','MAGÜÍ','1'),(754,'52','435','MALLAMA','1'),(755,'52','473','MOSQUERA','1'),(756,'52','480','NARIÑO','1'),(757,'52','490','OLAYA HERRERA','1'),(758,'52','506','OSPINA','1'),(759,'52','520','FRANCISCO PIZARRO','1'),(760,'52','540','POLICARPA','1'),(761,'52','560','POTOSÍ','1'),(762,'52','565','PROVIDENCIA','1'),(763,'52','573','PUERRES','1'),(764,'52','585','PUPIALES','1'),(765,'52','612','RICAURTE','1'),(766,'52','621','ROBERTO PAYÁN','1'),(767,'52','678','SAMANIEGO','1'),(768,'52','683','SANDONÁ','1'),(769,'52','685','SAN BERNARDO','1'),(770,'52','687','SAN LORENZO','1'),(771,'52','693','SAN PABLO','1'),(772,'52','694','SAN PEDRO DE CARTAGO','1'),(773,'52','696','SANTA BÁRBARA','1'),(774,'52','699','SANTACRUZ','1'),(775,'52','720','SAPUYES','1'),(776,'52','786','TAMINANGO','1'),(777,'52','788','TANGUA','1'),(778,'52','835','SAN ANDRÉS DE TUMACO','1'),(779,'52','838','TÚQUERRES','1'),(780,'52','885','YACUANQUER','1'),(781,'54','001','CÚCUTA','1'),(782,'54','003','ABREGO','1'),(783,'54','051','ARBOLEDAS','1'),(784,'54','099','BOCHALEMA','1'),(785,'54','109','BUCARASICA','1'),(786,'54','125','CÁCHIRA','1'),(787,'54','128','CÁCOTA','1'),(788,'54','172','CHINÁCOTA','1'),(789,'54','174','CHITAGÁ','1'),(790,'54','206','CONVENCIÓN','1'),(791,'54','223','CUCUTILLA','1'),(792,'54','239','DURANÍA','1'),(793,'54','245','EL CARMEN','1'),(794,'54','250','EL TARRA','1'),(795,'54','261','EL ZULIA','1'),(796,'54','313','GRAMALOTE','1'),(797,'54','344','HACARÍ','1'),(798,'54','347','HERRÁN','1'),(799,'54','377','LABATECA','1'),(800,'54','385','LA ESPERANZA','1'),(801,'54','398','LA PLAYA DE BELÉN','1'),(802,'54','405','LOS PATIOS','1'),(803,'54','418','LOURDES','1'),(804,'54','480','MUTISCUA','1'),(805,'54','498','OCAÑA','1'),(806,'54','518','PAMPLONA','1'),(807,'54','520','PAMPLONITA','1'),(808,'54','553','PUERTO SANTANDER','1'),(809,'54','599','RAGONVALIA','1'),(810,'54','660','SALAZAR DE LAS PALMAS','1'),(811,'54','670','SAN CALIXTO','1'),(812,'54','673','SAN CAYETANO','1'),(813,'54','680','SANTIAGO','1'),(814,'54','720','SARDINATA','1'),(815,'54','743','SANTO DOMINGO DE SILOS','1'),(816,'54','800','TEORAMA','1'),(817,'54','810','TIBÚ','1'),(818,'54','820','TOLEDO','1'),(819,'54','871','VILLA CARO','1'),(820,'54','874','VILLA DEL ROSARIO','1'),(821,'63','001','ARMENIA','1'),(822,'63','111','BUENAVISTA','1'),(823,'63','130','CALARCÁ','1'),(824,'63','190','CIRCASIA','1'),(825,'63','212','CÓRDOBA','1'),(826,'63','272','FILANDIA','1'),(827,'63','302','GÉNOVA','1'),(828,'63','401','LA TEBAIDA','1'),(829,'63','470','MONTENEGRO','1'),(830,'63','548','PIJAO','1'),(831,'63','594','QUIMBAYA','1'),(832,'63','690','SALENTO','1'),(833,'66','001','PEREIRA','1'),(834,'66','045','APÍA','1'),(835,'66','075','BALBOA','1'),(836,'66','088','BELÉN DE UMBRÍA','1'),(837,'66','170','DOSQUEBRADAS','1'),(838,'66','318','GUATICA','1'),(839,'66','383','LA CELIA','1'),(840,'66','400','LA VIRGINIA','1'),(841,'66','440','MARSELLA','1'),(842,'66','456','MISTRATÓ','1'),(843,'66','572','PUEBLO RICO','1'),(844,'66','594','QUINCHÍA','1'),(845,'66','682','SANTA ROSA DE CABAL','1'),(846,'66','687','SANTUARIO','1'),(847,'68','001','BUCARAMANGA','1'),(848,'68','013','AGUADA','1'),(849,'68','020','ALBANIA','1'),(850,'68','051','ARATOCA','1'),(851,'68','077','BARBOSA','1'),(852,'68','079','BARICHARA','1'),(853,'68','081','BARRANCABERMEJA','1'),(854,'68','092','BETULIA','1'),(855,'68','101','BOLÍVAR','1'),(856,'68','121','CABRERA','1'),(857,'68','132','CALIFORNIA','1'),(858,'68','147','CAPITANEJO','1'),(859,'68','152','CARCASÍ','1'),(860,'68','160','CEPITÁ','1'),(861,'68','162','CERRITO','1'),(862,'68','167','CHARALÁ','1'),(863,'68','169','CHARTA','1'),(864,'68','176','CHIMA','1'),(865,'68','179','CHIPATÁ','1'),(866,'68','190','CIMITARRA','1'),(867,'68','207','CONCEPCIÓN','1'),(868,'68','209','CONFINES','1'),(869,'68','211','CONTRATACIÓN','1'),(870,'68','217','COROMORO','1'),(871,'68','229','CURITÍ','1'),(872,'68','235','EL CARMEN DE CHUCURÍ',
'1'),(873,'68','245','EL GUACAMAYO','1'),(874,'68','250','EL PEÑÓN','1'),(875,'68','255','EL PLAYÓN','1'),(876,'68','264','ENCINO','1'),(877,'68','266','ENCISO','1'),(878,'68','271','FLORIÁN','1'),(879,'68','276','FLORIDABLANCA','1'),(880,'68','296','GALÁN','1'),(881,'68','298','GÁMBITA','1'),(882,'68','307','GIRÓN','1'),(883,'68','318','GUACA','1'),(884,'68','320','GUADALUPE','1'),(885,'68','322','GUAPOTÁ','1'),(886,'68','324','GUAVATÁ','1'),(887,'68','327','GÜEPSA','1'),(888,'68','344','HATO','1'),(889,'68','368','JESÚS MARÍA','1'),(890,'68','370','JORDÁN','1'),(891,'68','377','LA BELLEZA','1'),(892,'68','385','LANDÁZURI','1'),(893,'68','397','LA PAZ','1'),(894,'68','406','LEBRIJA','1'),(895,'68','418','LOS SANTOS','1'),(896,'68','425','MACARAVITA','1'),(897,'68','432','MÁLAGA','1'),(898,'68','444','MATANZA','1'),(899,'68','464','MOGOTES','1'),(900,'68','468','MOLAGAVITA','1'),(901,'68','498','OCAMONTE','1'),(902,'68','500','OIBA','1'),(903,'68','502','ONZAGA','1'),(904,'68','522','PALMAR','1'),(905,'68','524','PALMAS DEL SOCORRO','1'),(906,'68','533','PÁRAMO','1'),(907,'68','547','PIEDECUESTA','1'),(908,'68','549','PINCHOTE','1'),(909,'68','572','PUENTE NACIONAL','1'),(910,'68','573','PUERTO PARRA','1'),(911,'68','575','PUERTO WILCHES','1'),(912,'68','615','RIONEGRO','1'),(913,'68','655','SABANA DE TORRES','1'),(914,'68','669','SAN ANDRÉS','1'),(915,'68','673','SAN BENITO','1'),(916,'68','679','SAN GIL','1'),(917,'68','682','SAN JOAQUÍN','1'),(918,'68','684','SAN JOSÉ DE MIRANDA','1'),(919,'68','686','SAN MIGUEL','1'),(920,'68','689','SAN VICENTE DE CHUCURÍ','1'),(921,'68','705','SANTA BÁRBARA','1'),(922,'68','720','SANTA HELENA DEL OPÓN','1'),(923,'68','745','SIMACOTA','1'),(924,'68','755','SOCORRO','1'),(925,'68','770','SUAITA','1'),(926,'68','773','SUCRE','1'),(927,'68','780','SURATÁ','1'),(928,'68','820','TONA','1'),(929,'68','855','VALLE DE SAN JOSÉ','1'),(930,'68','861','VÉLEZ','1'),(931,'68','867','VETAS','1'),(932,'68','872','VILLANUEVA','1'),(933,'68','895','ZAPATOCA','1'),(934,'70','001','SINCELEJO','1'),(935,'70','110','BUENAVISTA','1'),(936,'70','124','CAIMITO','1'),(937,'70','204','COLOSO','1'),(938,'70','215','COROZAL','1'),(939,'70','221','COVEÑAS','1'),(940,'70','230','CHALÁN','1'),(941,'70','233','EL ROBLE','1'),(942,'70','235','GALERAS','1'),(943,'70','265','GUARANDA','1'),(944,'70','400','LA UNIÓN','1'),(945,'70','418','LOS PALMITOS','1'),(946,'70','429','MAJAGUAL','1'),(947,'70','473','MORROA','1'),(948,'70','508','OVEJAS','1'),(949,'70','523','PALMITO','1'),(950,'70','670','SAMPUÉS','1'),(951,'70','678','SAN BENITO ABAD','1'),(952,'70','702','SAN JUAN DE BETULIA','1'),(953,'70','708','SAN MARCOS','1'),(954,'70','713','SAN ONOFRE','1'),(955,'70','717','SAN PEDRO','1'),(956,'70','742','SAN LUIS DE SINCÉ','1'),(957,'70','771','SUCRE','1'),(958,'70','820','SANTIAGO DE TOLÚ','1'),(959,'70','823','TOLÚVIEJO','1'),(960,'73','001','IBAGUÉ','1'),(961,'73','024','ALPUJARRA','1'),(962,'73','026','ALVARADO','1'),(963,'73','030','AMBALEMA','1'),(964,'73','043','ANZOÁTEGUI','1'),(965,'73','055','ARMERO','1'),(966,'73','067','ATACO','1'),(967,'73','124','CAJAMARCA','1'),(968,'73','148','CARMEN DE APICALÁ','1'),(969,'73','152','CASABIANCA','1'),(970,'73','168','CHAPARRAL','1'),(971,'73','200','COELLO','1'),(972,'73','217','COYAIMA','1'),(973,'73','226','CUNDAY','1'),(974,'73','236','DOLORES','1'),(975,'73','268','ESPINAL','1'),(976,'73','270','FALAN','1'),(977,'73','275','FLANDES','1'),(978,'73','283','FRESNO','1'),(979,'73','319','GUAMO','1'),(980,'73','347','HERVEO','1'),(981,'73','349','HONDA','1'),(982,'73','352','ICONONZO','1'),(983,'73','408','LÉRIDA','1'),(984,'73','411','LÍBANO','1'),(985,'73','443','MARIQUITA','1'),(986,'73','449','MELGAR','1'),(987,'73','461','MURILLO','1'),(988,'73','483','NATAGAIMA','1'),(989,'73','504','ORTEGA','1'),(990,'73','520','PALOCABILDO','1'),(991,'73','547','PIEDRAS','1'),(992,'73','555','PLANADAS','1'),(993,'73','563','PRADO','1'),(994,'73','585','PURIFICACIÓN','1'),(995,'73','616','RIOBLANCO','1'),(996,'73','622','RONCESVALLES','1'),(997,'73','624','ROVIRA','1'),(998,'73',
'671','SALDAÑA','1'),(999,'73','675','SAN ANTONIO','1'),(1000,'73','678','SAN LUIS','1'),(1001,'73','686','SANTA ISABEL','1'),(1002,'73','770','SUÁREZ','1'),(1003,'73','854','VALLE DE SAN JUAN','1'),(1004,'73','861','VENADILLO','1'),(1005,'73','870','VILLAHERMOSA','1'),(1006,'73','873','VILLARRICA','1'),(1007,'76','001','CALI','1'),(1008,'76','020','ALCALÁ','1'),(1009,'76','036','ANDALUCÍA','1'),(1010,'76','041','ANSERMANUEVO','1'),(1011,'76','054','ARGELIA','1'),(1012,'76','100','BOLÍVAR','1'),(1013,'76','109','BUENAVENTURA','1'),(1014,'76','111','GUADALAJARA DE BUGA','1'),(1015,'76','113','BUGALAGRANDE','1'),(1016,'76','122','CAICEDONIA','1'),(1017,'76','126','CALIMA','1'),(1018,'76','130','CANDELARIA','1'),(1019,'76','147','CARTAGO','1'),(1020,'76','233','DAGUA','1'),(1021,'76','243','EL ÁGUILA','1'),(1022,'76','246','EL CAIRO','1'),(1023,'76','248','EL CERRITO','1'),(1024,'76','250','EL DOVIO','1'),(1025,'76','275','FLORIDA','1'),(1026,'76','306','GINEBRA','1'),(1027,'76','318','GUACARÍ','1'),(1028,'76','364','JAMUNDÍ','1'),(1029,'76','377','LA CUMBRE','1'),(1030,'76','400','LA UNIÓN','1'),(1031,'76','403','LA VICTORIA','1'),(1032,'76','497','OBANDO','1'),(1033,'76','520','PALMIRA','1'),(1034,'76','563','PRADERA','1'),(1035,'76','606','RESTREPO','1'),(1036,'76','616','RIOFRÍO','1'),(1037,'76','622','ROLDANILLO','1'),(1038,'76','670','SAN PEDRO','1'),(1039,'76','736','SEVILLA','1'),(1040,'76','823','TORO','1'),(1041,'76','828','TRUJILLO','1'),(1042,'76','834','TULUÁ','1'),(1043,'76','845','ULLOA','1'),(1044,'76','863','VERSALLES','1'),(1045,'76','869','VIJES','1'),(1046,'76','890','YOTOCO','1'),(1047,'76','892','YUMBO','1'),(1048,'76','895','ZARZAL','1'),(1049,'81','001','ARAUCA','1'),(1050,'81','065','ARAUQUITA','1'),(1051,'81','220','CRAVO NORTE','1'),(1052,'81','300','FORTUL','1'),(1053,'81','591','PUERTO RONDÓN','1'),(1054,'81','736','SARAVENA','1'),(1055,'81','794','TAME','1'),(1056,'85','001','YOPAL','1'),(1057,'85','010','AGUAZUL','1'),(1058,'85','015','CHÁMEZA','1'),(1059,'85','125','HATO COROZAL','1'),(1060,'85','136','LA SALINA','1'),(1061,'85','139','MANÍ','1'),(1062,'85','162','MONTERREY','1'),(1063,'85','225','NUNCHÍA','1'),(1064,'85','230','OROCUÉ','1'),(1065,'85','250','PAZ DE ARIPORO','1'),(1066,'85','263','PORE','1'),(1067,'85','279','RECETOR','1'),(1068,'85','300','SABANALARGA','1'),(1069,'85','315','SÁCAMA','1'),(1070,'85','325','SAN LUIS DE PALENQUE','1'),(1071,'85','400','TÁMARA','1'),(1072,'85','410','TAURAMENA','1'),(1073,'85','430','TRINIDAD','1'),(1074,'85','440','VILLANUEVA','1'),(1075,'86','001','MOCOA','1'),(1076,'86','219','COLÓN','1'),(1077,'86','320','ORITO','1'),(1078,'86','568','PUERTO ASÍS','1'),(1079,'86','569','PUERTO CAICEDO','1'),(1080,'86','571','PUERTO GUZMÁN','1'),(1081,'86','573','PUERTO LEGUIZAMO','1'),(1082,'86','749','SIBUNDOY','1'),(1083,'86','755','SAN FRANCISCO','1'),(1084,'86','757','SAN MIGUEL','1'),(1085,'86','760','SANTIAGO','1'),(1086,'86','865','VALLE DEL GUAMUEZ','1'),(1087,'86','885','VILLA GARZÓN','1'),(1088,'88','001','SAN ANDRÉS','1'),(1089,'88','564','PROVIDENCIA Y SANTA CATALINA','1'),(1090,'91','001','LETICIA','1'),(1091,'91','263','EL ENCANTO','1'),(1092,'91','405','LA CHORRERA','1'),(1093,'91','407','LA PEDRERA','1'),(1094,'91','430','LA VICTORIA','1'),(1095,'91','460','MIRITÍ-PARANÁ','1'),(1096,'91','530','PUERTO ALEGRÍA','1'),(1097,'91','536','PUERTO ARICA','1'),(1098,'91','540','PUERTO NARIÑO','1'),(1099,'91','669','PUERTO SANTANDER','1'),(1100,'91','798','TARAPACÁ','1'),(1101,'94','001','INÍRIDA','1'),(1102,'94','343','BARRANCOMINAS','1'),(1103,'94','663','MAPIRIPANA','1'),(1104,'94','883','SAN FELIPE','1'),(1105,'94','884','PUERTO COLOMBIA','1'),(1106,'94','885','LA GUADALUPE','1'),(1107,'94','886','CACAHUAL','1'),(1108,'94','887','PANA PANA','1'),(1109,'94','888','MORICHAL NUEVO','1'),(1110,'95','001','SAN JOSÉ DEL GUAVIARE','1'),(1111,'95','015','CALAMAR','1'),(1112,'95','025','EL RETORNO','1'),(1113,'95','200','MIRAFLORES','1'),(1114,'97','001','MITÚ','1'),(1115,'97','161','CARURÚ','1'),(1116,'97','511','PACOA','1'),(1117,'97','666','TARAIRA','1')
,(1118,'97','777','PAPUNAUA','1'),(1119,'97','889','YAVARATÉ','1'),(1120,'99','001','PUERTO CARREÑO','1'),(1121,'99','524','LA PRIMAVERA','1'),(1122,'99','624','SANTA ROSALÍA','1'),(1123,'99','773','CUMARIBO','1');
/*!40000 ALTER TABLE `tbl_municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblAspirante`
--

DROP TABLE IF EXISTS `tblAspirante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblAspirante` (
  `aspId` int(11) NOT NULL AUTO_INCREMENT,
  `aspUsuarioId` int(11) NOT NULL,
  `aspEmpresa` varchar(95) COLLATE utf8_bin NOT NULL,
  `aspProyectoId` int(11) NOT NULL,
  `aspTecnologiaAD` varchar(60) COLLATE utf8_bin NOT NULL,
  `aspExperienciaAgilId` int(11) NOT NULL,
  `aspComentario` varchar(250) COLLATE utf8_bin NOT NULL,
  `aspEstado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`aspId`),
  KEY `fkAspiranteUsuario` (`aspUsuarioId`),
  KEY `fkAspiranteProyecto` (`aspProyectoId`),
  KEY `fkAspiranteExperiencia` (`aspExperienciaAgilId`),
  CONSTRAINT `fkAspiranteExperiencia` FOREIGN KEY (`aspExperienciaAgilId`) REFERENCES `tblExperinciaAgil` (`expId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkAspiranteProyecto` FOREIGN KEY (`aspProyectoId`) REFERENCES `tblProyectos` (`proId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkAspiranteUsuario` FOREIGN KEY (`aspUsuarioId`) REFERENCES `tblUsuarios` (`usuId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblAspirante`
--

LOCK TABLES `tblAspirante` WRITE;
/*!40000 ALTER TABLE `tblAspirante` DISABLE KEYS */;
INSERT INTO `tblAspirante` VALUES (8,1,'sena',3,'muchas',3,'soy muy malo','\0');
/*!40000 ALTER TABLE `tblAspirante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblIntereses`
--

DROP TABLE IF EXISTS `tblIntereses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblIntereses` (
  `intId` int(11) NOT NULL AUTO_INCREMENT,
  `intNombre` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`intId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblIntereses`
--

LOCK TABLES `tblIntereses` WRITE;
/*!40000 ALTER TABLE `tblIntereses` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblIntereses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblExperinciaAgil`
--

DROP TABLE IF EXISTS `tblExperinciaAgil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblExperinciaAgil` (
  `expId` int(11) NOT NULL AUTO_INCREMENT,
  `expEspesificacion` varchar(45) COLLATE utf8_bin NOT NULL,
  `expEstado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`expId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblExperinciaAgil`
--

LOCK TABLES `tblExperinciaAgil` WRITE;
/*!40000 ALTER TABLE `tblExperinciaAgil` DISABLE KEYS */;
INSERT INTO `tblExperinciaAgil` VALUES (1,'baja',''),(2,'media',''),(3,'alta','');
/*!40000 ALTER TABLE `tblExperinciaAgil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblUsuarios_X_tblEventos`
--

DROP TABLE IF EXISTS `tblUsuarios_X_tblEventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblUsuarios_X_tblEventos` (
  `usuEveId` int(11) NOT NULL AUTO_INCREMENT,
  `tblUsuarios_usuId` int(11) NOT NULL,
  `tblEventos_eveId` int(11) NOT NULL,
  PRIMARY KEY (`usuEveId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblUsuarios_X_tblEventos`
--

LOCK TABLES `tblUsuarios_X_tblEventos` WRITE;
/*!40000 ALTER TABLE `tblUsuarios_X_tblEventos` DISABLE KEYS */;
INSERT INTO `tblUsuarios_X_tblEventos` VALUES (1,1,2),(2,1,2),(3,1,3),(4,1,3),(5,1,4);
/*!40000 ALTER TABLE `tblUsuarios_X_tblEventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblAcciones`
--

DROP TABLE IF EXISTS `tblAcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblAcciones` (
  `accId` int(11) NOT NULL AUTO_INCREMENT,
  `accNombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `accControladorId` int(11) NOT NULL COMMENT '\n',
  PRIMARY KEY (`accId`),
  KEY `accion_controlador_idx` (`accControladorId`),
  CONSTRAINT `fkAccionControlador` FOREIGN KEY (`accControladorId`) REFERENCES `tblControladores` (`conId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblAcciones`
--

LOCK TABLES `tblAcciones` WRITE;
/*!40000 ALTER TABLE `tblAcciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblAcciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblCategorias`
--

DROP TABLE IF EXISTS `tblCategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblCategorias` (
  `catId` int(11) NOT NULL AUTO_INCREMENT,
  `catCategoria` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblCategorias`
--

LOCK TABLES `tblCategorias` WRITE;
/*!40000 ALTER TABLE `tblCategorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblCategorias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-16  9:34:53
