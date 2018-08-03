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
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` varchar(1000) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `data_cadastro` date NOT NULL,
  `fkpessoa` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_usuario_1_idx` (`fkpessoa`),
  CONSTRAINT `fk_usuario_1` FOREIGN KEY (`fkpessoa`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'ihenrits@gmail.com','ixYF4ABzXxzHIU3M51AP8LtOQgeENnskC1mFlz5J6GE+iEzOVu+cspPxd8VhSxFTJB0SsNcvFBbnLor8YRoMqw2M5PNCcJhXvhnq7Zrml1KuFUPZ8YJyZ8CWIGovYWxa','tavareshenrique','2018-05-06',1),(2,'admin@admin.com.br','ixYF4ABzXxzHIU3M51AP8LtOQgeENnskC1mFlz5J6GE+iEzOVu+cspPxd8VhSxFTJB0SsNcvFBbnLor8YRoMqw2M5PNCcJhXvhnq7Zrml1KuFUPZ8YJyZ8CWIGovYWxa','henriquetavares','2018-05-06',2),(3,'julho@julho.com','nfYEq/2LqCqikARIVx+TzSsZffNmnPxCm7DCkJO/0+CdlMRrIat0BAFXkKwnQtH+GLrRZpfiJJaCiIHTaAz/WAb8F3IDg5XAFSeiY2QzAq10jmh0W1ksuEts863EQOlZ','tavareshenrique1','2018-07-21',3),(12,'teste@teste.com','ShY6oVDurWy42ucytWdabpBdx/7JtKEmPIKFHhZ6/lnXO6nd4TxZfNsaTl8Mf3K0FPEqfR2gL6GcryIT9cbgYHhuGv+W/VlQSRRN0W6qdxBxR1CSml1bXpCkMYl00eTO','teste','2018-07-29',12);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-02 23:43:16
