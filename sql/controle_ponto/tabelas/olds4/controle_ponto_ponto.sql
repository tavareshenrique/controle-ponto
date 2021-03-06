-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: controle_ponto
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

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
-- Table structure for table `ponto`
--

DROP TABLE IF EXISTS `ponto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ponto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `data_inicial` date NOT NULL,
  `data_final` date NOT NULL,
  `horario_inicial` time NOT NULL,
  `horario_final` time NOT NULL,
  `ano_inicial` char(4) NOT NULL,
  `ano_final` char(4) NOT NULL,
  `mes_inicial` char(2) NOT NULL,
  `mes_final` char(2) NOT NULL,
  `fkpessoa` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_ponto_1_idx` (`fkpessoa`),
  CONSTRAINT `fk_ponto_1` FOREIGN KEY (`fkpessoa`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ponto`
--

LOCK TABLES `ponto` WRITE;
/*!40000 ALTER TABLE `ponto` DISABLE KEYS */;
INSERT INTO `ponto` VALUES (131,'2018-08-01','2018-08-01','08:00:00','18:18:00','2018','2018','08','08',1),(132,'2018-08-02','2018-08-02','08:00:00','18:18:00','2018','2018','08','08',1),(133,'2018-08-03','2018-08-03','08:00:00','18:18:00','2018','2018','08','08',1),(136,'2018-08-06','2018-08-06','08:00:00','18:18:00','2018','2018','08','08',1),(137,'2018-08-07','2018-08-07','08:00:00','18:18:00','2018','2018','08','08',1),(138,'2018-08-08','2018-08-08','08:00:00','18:18:00','2018','2018','08','08',1),(139,'2018-08-09','2018-08-09','08:00:00','18:18:00','2018','2018','08','08',1),(140,'2018-08-10','2018-08-10','08:00:00','18:18:00','2018','2018','08','08',1),(141,'2018-08-11','2018-08-11','08:00:00','18:18:00','2018','2018','08','08',1),(142,'2018-08-12','2018-08-12','08:00:00','18:18:00','2018','2018','08','08',1),(145,'2018-08-15','2018-08-15','08:00:00','18:18:00','2018','2018','08','08',1),(146,'2018-08-16','2018-08-16','08:00:00','18:18:00','2018','2018','08','08',1),(147,'2018-08-17','2018-08-17','08:00:00','18:18:00','2018','2018','08','08',1),(150,'2018-08-20','2018-08-20','08:00:00','18:18:00','2018','2018','08','08',1),(151,'2018-08-21','2018-08-21','08:00:00','18:18:00','2018','2018','08','08',1),(152,'2018-08-22','2018-08-22','08:00:00','18:18:00','2018','2018','08','08',1),(153,'2018-08-23','2018-08-23','08:00:00','18:18:00','2018','2018','08','08',1),(154,'2018-08-24','2018-08-24','08:00:00','18:18:00','2018','2018','08','08',1),(157,'2018-08-27','2018-08-27','08:00:00','18:18:00','2018','2018','08','08',1),(158,'2018-08-28','2018-08-28','08:00:00','18:18:00','2018','2018','08','08',1),(159,'2018-08-29','2018-08-29','08:00:00','18:18:00','2018','2018','08','08',1),(160,'2018-08-30','2018-08-30','08:00:00','18:18:00','2018','2018','08','08',1),(161,'2018-08-31','2018-08-31','08:00:00','18:18:00','2018','2018','08','08',1);
/*!40000 ALTER TABLE `ponto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-02 23:43:15
