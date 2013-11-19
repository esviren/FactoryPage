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
  `artId` int(11) NOT NULL,
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
  `perRolesId` int(11) DEFAULT NULL,
  `perControllerId` int(11) DEFAULT NULL,
  `perAccion` varchar(50) COLLATE utf8_bin DEFAULT NULL,
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
-- Table structure for table `tblControladores`
--

DROP TABLE IF EXISTS `tblControladores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblControladores` (
  `conId` int(11) NOT NULL AUTO_INCREMENT,
  `conNombre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
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
  `fasTipo` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`fasId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblFases`
--

LOCK TABLES `tblFases` WRITE;
/*!40000 ALTER TABLE `tblFases` DISABLE KEYS */;
INSERT INTO `tblFases` VALUES (1,'en espera'),(2,'en proceso'),(3,'finalizado');
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
  `tblFases_fasId` int(11) NOT NULL,
  PRIMARY KEY (`proId`),
  KEY `fk_tblProyectos_tblFases1` (`tblFases_fasId`),
  CONSTRAINT `fk_tblProyectos_tblFases1` FOREIGN KEY (`tblFases_fasId`) REFERENCES `tblFases` (`fasId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblProyectos`
--

LOCK TABLES `tblProyectos` WRITE;
/*!40000 ALTER TABLE `tblProyectos` DISABLE KEYS */;
INSERT INTO `tblProyectos` VALUES (1,'Retail Master','sistema web de evaluación, asesoría y capacitación de reatails','11/14/2013',NULL,NULL,NULL,3,3,1,1);
/*!40000 ALTER TABLE `tblProyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblUsuarios_X_tblProyectos`
--

DROP TABLE IF EXISTS `tblUsuarios_X_tblProyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblUsuarios_X_tblProyectos` (
  `usuProId` int(11) NOT NULL,
  `tblUsuarios_usuId` int(11) NOT NULL,
  `tblProyectos_proId` int(11) NOT NULL,
  `usuProRoles` int(11) NOT NULL,
  PRIMARY KEY (`usuProId`),
  KEY `fk_tblUsuarios_has_tblProyectos_tblProyectos1` (`tblProyectos_proId`),
  KEY `fk_tblUsuarios_has_tblProyectos_tblUsuarios1` (`tblUsuarios_usuId`),
  CONSTRAINT `fk_tblUsuarios_has_tblProyectos_tblProyectos1` FOREIGN KEY (`tblProyectos_proId`) REFERENCES `tblProyectos` (`proId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblUsuarios_has_tblProyectos_tblUsuarios1` FOREIGN KEY (`tblUsuarios_usuId`) REFERENCES `tblUsuarios` (`usuId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblUsuarios_X_tblProyectos`
--

LOCK TABLES `tblUsuarios_X_tblProyectos` WRITE;
/*!40000 ALTER TABLE `tblUsuarios_X_tblProyectos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblUsuarios_X_tblProyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblIntereses`
--

DROP TABLE IF EXISTS `tblIntereses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblIntereses` (
  `intId` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblUsuarios`
--

LOCK TABLES `tblUsuarios` WRITE;
/*!40000 ALTER TABLE `tblUsuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblUsuarios` ENABLE KEYS */;
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
  `rolEstado` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`rolId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblRoles`
--

LOCK TABLES `tblRoles` WRITE;
/*!40000 ALTER TABLE `tblRoles` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblRoles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblAcciones`
--

DROP TABLE IF EXISTS `tblAcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblAcciones` (
  `accId` int(11) NOT NULL AUTO_INCREMENT,
  `accNombre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `accControladorId` int(11) DEFAULT NULL COMMENT '\n',
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
-- Table structure for table `tblUsuarios_X_tblIntereses`
--

DROP TABLE IF EXISTS `tblUsuarios_X_tblIntereses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblUsuarios_X_tblIntereses` (
  `usuIntId` int(11) NOT NULL,
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
-- Table structure for table `tblCategorias`
--

DROP TABLE IF EXISTS `tblCategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblCategorias` (
  `catId` int(11) NOT NULL,
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

-- Dump completed on 2013-11-19  9:33:11
CREATE DATABASE  IF NOT EXISTS `db_gitCrud` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `db_gitCrud`;
-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db_gitCrud
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-19  9:33:11
