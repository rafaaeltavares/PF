CREATE DATABASE  IF NOT EXISTS `login` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `login`;
-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: login
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cadusuario`
--

DROP TABLE IF EXISTS `cadusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cadusuario` (
  `Usrid` int NOT NULL AUTO_INCREMENT,
  `UsrNome` varchar(45) NOT NULL,
  `UsrMatricula` varchar(45) NOT NULL,
  `UsrUsuario` varchar(45) NOT NULL,
  `UsrSenha` varchar(45) NOT NULL,
  PRIMARY KEY (`Usrid`),
  UNIQUE KEY `UsrMatricula_UNIQUE` (`UsrMatricula`),
  CONSTRAINT `f_Usrid` FOREIGN KEY (`Usrid`) REFERENCES `cofnivelacesso` (`Usrid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cadusuario`
--

LOCK TABLES `cadusuario` WRITE;
/*!40000 ALTER TABLE `cadusuario` DISABLE KEYS */;
INSERT INTO `cadusuario` VALUES (1,'123','123','syfet','8899a97dcafbd3755a4ff6123a478168'),(2,'rafa','4','32','97c1089ad6c8a922577637fe8a04f2a4'),(3,'1','1','1','c4ca4238a0b923820dcc509a6f75849b'),(4,'rafael','999','cefet','8899a97dcafbd3755a4ff6123a478168'),(5,'3','3','3','eccbc87e4b5ce2fe28308fd9f2a7baf3'),(6,'5','5','5','5'),(7,'rafael tavares da silva','000','syfeta','123123'),(8,'Rafael tavares da silva','8','8','8'),(9,'Ulisses Roque Tomaz','1239','ulis','123'),(10,'malu','143242','malu','123'),(11,'rafa','6454','syfet123123','123'),(12,'mariaLuiza','0909','maluu','123123'),(13,'rafa','32','t','t');
/*!40000 ALTER TABLE `cadusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cofnivelacesso`
--

DROP TABLE IF EXISTS `cofnivelacesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cofnivelacesso` (
  `Usrid` int NOT NULL,
  `NivId` int NOT NULL,
  KEY `Usrid` (`Usrid`),
  KEY `NivId` (`NivId`),
  CONSTRAINT `cofnivelacesso_ibfk_1` FOREIGN KEY (`Usrid`) REFERENCES `cadusuario` (`Usrid`),
  CONSTRAINT `cofnivelacesso_ibfk_2` FOREIGN KEY (`NivId`) REFERENCES `nivelacesso` (`NivId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cofnivelacesso`
--

LOCK TABLES `cofnivelacesso` WRITE;
/*!40000 ALTER TABLE `cofnivelacesso` DISABLE KEYS */;
INSERT INTO `cofnivelacesso` VALUES (2,5),(3,5),(4,5),(5,5),(6,5),(7,5),(8,1),(9,5),(10,5),(11,5),(12,5),(13,5);
/*!40000 ALTER TABLE `cofnivelacesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivelacesso`
--

DROP TABLE IF EXISTS `nivelacesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nivelacesso` (
  `NivId` int NOT NULL,
  `NivDescricao` varchar(45) NOT NULL,
  PRIMARY KEY (`NivId`,`NivDescricao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivelacesso`
--

LOCK TABLES `nivelacesso` WRITE;
/*!40000 ALTER TABLE `nivelacesso` DISABLE KEYS */;
INSERT INTO `nivelacesso` VALUES (1,'administrador'),(5,'aluno');
/*!40000 ALTER TABLE `nivelacesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perfil` (
  `idperfil` int NOT NULL AUTO_INCREMENT,
  `Usrid` int NOT NULL,
  `fotoPerfil` varchar(45) DEFAULT NULL,
  `fotoHeader` varchar(45) DEFAULT NULL,
  `emailInstituicional` varchar(45) DEFAULT NULL,
  `emailComum` varchar(45) DEFAULT NULL,
  `biografia` varchar(100) DEFAULT NULL,
  `hora` datetime DEFAULT NULL,
  PRIMARY KEY (`idperfil`),
  KEY `fk_Usrid` (`Usrid`),
  CONSTRAINT `fk_Usrid` FOREIGN KEY (`Usrid`) REFERENCES `cadusuario` (`Usrid`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (201,8,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postagem`
--

DROP TABLE IF EXISTS `postagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postagem` (
  `Usrid` int NOT NULL,
  `idpostagem` int NOT NULL AUTO_INCREMENT,
  `NivId` int NOT NULL,
  `mensagem` varchar(256) NOT NULL,
  `hora` datetime DEFAULT NULL,
  PRIMARY KEY (`idpostagem`),
  KEY `Usrid` (`Usrid`),
  KEY `f_Nivid` (`NivId`),
  CONSTRAINT `f_Nivid` FOREIGN KEY (`NivId`) REFERENCES `cofnivelacesso` (`NivId`),
  CONSTRAINT `postagem_ibfk_1` FOREIGN KEY (`Usrid`) REFERENCES `cadusuario` (`Usrid`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postagem`
--

LOCK TABLES `postagem` WRITE;
/*!40000 ALTER TABLE `postagem` DISABLE KEYS */;
INSERT INTO `postagem` VALUES (12,102,5,'as','2022-12-04 12:39:31'),(8,103,1,'sou adm','2022-12-04 12:40:33'),(8,104,1,'asd','2022-12-04 12:41:40'),(12,105,5,'sad','2022-12-04 12:42:01'),(8,106,1,'koe malu','2022-12-04 21:22:42'),(8,107,1,'prova de matematica amanha que bomba é essa','2022-12-04 21:22:55'),(8,108,1,'Prova de matemática amanha da professora Marcela Peossal!','2022-12-04 21:23:14'),(9,109,5,'koe gente','2022-12-04 21:24:25'),(12,110,5,'aa','2022-12-04 21:25:25'),(8,111,1,'Koe','2022-12-04 21:31:32'),(8,112,1,'alo','2022-12-04 21:31:58'),(12,113,5,'fala comunidade','2022-12-04 21:33:02'),(12,114,5,'ad','2022-12-04 21:34:29'),(8,115,1,'asdsa','2022-12-07 23:26:10'),(8,116,1,'sdasd','2022-12-07 23:26:14'),(8,117,1,'dddddddddddddddddddddddd','2022-12-07 23:26:19'),(8,118,1,'asd','2022-12-07 23:27:06'),(8,119,1,'adas','2022-12-07 23:27:35'),(8,120,1,'koe vc vai pro perfil?','2022-12-10 15:07:07'),(8,121,1,'ain que diliça','2022-12-10 15:07:35'),(8,122,1,'uiuiui','2022-12-10 15:07:41'),(8,123,1,'alo huan','2022-12-10 16:57:25');
/*!40000 ALTER TABLE `postagem` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-11 21:05:11
