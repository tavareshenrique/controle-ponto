-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: controle_ponto
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
-- Table structure for table `cidade`
--

DROP TABLE IF EXISTS `cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidade` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cidade` varchar(200) NOT NULL,
  `fkestado` bigint(20) NOT NULL,
  `fkcidade` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_cidade_1_idx` (`fkestado`),
  KEY `fk_cidade_2_idx` (`fkcidade`),
  CONSTRAINT `fk_cidade_1` FOREIGN KEY (`fkestado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cidade_2` FOREIGN KEY (`fkcidade`) REFERENCES `cidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidade`
--

LOCK TABLES `cidade` WRITE;
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(255) DEFAULT NULL,
  `nome_fantasia` varchar(255) NOT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `slogan` varchar(100) DEFAULT NULL,
  `foto` longblob,
  `fkendereco` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_empresa_endereco1_idx` (`fkendereco`),
  CONSTRAINT `fk_empresa_1` FOREIGN KEY (`fkendereco`) REFERENCES `endereco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(200) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `fkcidade` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_endereco_1_idx` (`fkcidade`),
  CONSTRAINT `fk_endereco_1` FOREIGN KEY (`fkcidade`) REFERENCES `cidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uf` char(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario_padrao`
--

DROP TABLE IF EXISTS `horario_padrao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horario_padrao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `horario_inicial` time NOT NULL,
  `horario_final` time NOT NULL,
  `horario_almoco` time DEFAULT NULL,
  `fkpessoa` bigint(20) NOT NULL,
  `sabado` tinyint(1) DEFAULT NULL,
  `domingo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_horario_padrao_1_idx` (`fkpessoa`),
  CONSTRAINT `fk_horario_padrao_1` FOREIGN KEY (`fkpessoa`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario_padrao`
--

LOCK TABLES `horario_padrao` WRITE;
/*!40000 ALTER TABLE `horario_padrao` DISABLE KEYS */;
INSERT INTO `horario_padrao` VALUES (1,'08:00:00','18:18:00','01:30:00',1,0,0);
/*!40000 ALTER TABLE `horario_padrao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meses`
--

DROP TABLE IF EXISTS `meses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mes` varchar(100) NOT NULL,
  `dias` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meses`
--

LOCK TABLES `meses` WRITE;
/*!40000 ALTER TABLE `meses` DISABLE KEYS */;
INSERT INTO `meses` VALUES (1,'Janeiro',31),(2,'Fevereiro',28),(3,'Março',31),(4,'Abril',30),(5,'Maio',31),(6,'Junho',30),(7,'Julho',31),(8,'Agosto',31),(9,'Setembro',30),(10,'Outubro',31),(11,'Novembro',30),(12,'Dezembro',31);
/*!40000 ALTER TABLE `meses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `numeros`
--

DROP TABLE IF EXISTS `numeros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `numeros` (
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `numeros`
--

LOCK TABLES `numeros` WRITE;
/*!40000 ALTER TABLE `numeros` DISABLE KEYS */;
INSERT INTO `numeros` VALUES (0),(1),(2),(3),(4),(5),(6),(7),(8),(9),(10),(11),(12),(13),(14),(15),(16),(17),(18),(19),(20),(21),(22),(23),(24),(25),(26),(27),(28),(29),(30);
/*!40000 ALTER TABLE `numeros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pais` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `foto` longblob,
  `fkendereco` bigint(20) DEFAULT NULL,
  `fkprofissao` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_pessoa_1_idx` (`fkendereco`),
  KEY `fk_pessoa_2_idx` (`fkprofissao`),
  CONSTRAINT `fk_pessoa_1` FOREIGN KEY (`fkendereco`) REFERENCES `endereco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoa_2` FOREIGN KEY (`fkprofissao`) REFERENCES `profissao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (1,'Henrique','Tavares',NULL,NULL,NULL,NULL),(2,'Admin','Admin',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;

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
  `fkpessoa` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_ponto_1_idx` (`fkpessoa`),
  CONSTRAINT `fk_ponto_1` FOREIGN KEY (`fkpessoa`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ponto`
--

LOCK TABLES `ponto` WRITE;
/*!40000 ALTER TABLE `ponto` DISABLE KEYS */;
INSERT INTO `ponto` VALUES (7,'2018-05-27','2018-05-28','08:00:00','18:18:00',1),(11,'2018-07-08','2018-07-08','08:00:00','18:18:00',1),(12,'2018-07-13','2018-07-13','08:00:00','18:30:00',1);
/*!40000 ALTER TABLE `ponto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profissao`
--

DROP TABLE IF EXISTS `profissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profissao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `profissao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profissao`
--

LOCK TABLES `profissao` WRITE;
/*!40000 ALTER TABLE `profissao` DISABLE KEYS */;
/*!40000 ALTER TABLE `profissao` ENABLE KEYS */;
UNLOCK TABLES;

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
  `fkpessoa` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_usuario_1_idx` (`fkpessoa`),
  CONSTRAINT `fk_usuario_1` FOREIGN KEY (`fkpessoa`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'ihenrits@gmail.com','ixYF4ABzXxzHIU3M51AP8LtOQgeENnskC1mFlz5J6GE+iEzOVu+cspPxd8VhSxFTJB0SsNcvFBbnLor8YRoMqw2M5PNCcJhXvhnq7Zrml1KuFUPZ8YJyZ8CWIGovYWxa',1),(2,'admin@admin.com.br','xVjQ9+7NOqeA8wH5tvO5uGtfwf5r3iiZuzLrl0IC5uIOmpTjQwt15W9QLGPPOFmHcA5VArE0keKDZNiBsazhLyUhz8IzhQ6C38r086GTauKPq0/uxf4fMmmRvT9ZSZzO',2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vw_currentMonth`
--

DROP TABLE IF EXISTS `vw_currentMonth`;
/*!50001 DROP VIEW IF EXISTS `vw_currentMonth`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_currentMonth` AS SELECT 
 1 AS `fkpessoa`,
 1 AS `dataInicial`,
 1 AS `dataFinal`,
 1 AS `timeMonth`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vw_timeYear`
--

DROP TABLE IF EXISTS `vw_timeYear`;
/*!50001 DROP VIEW IF EXISTS `vw_timeYear`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_timeYear` AS SELECT 
 1 AS `usuario`,
 1 AS `timeYear`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_currentMonth`
--

/*!50001 DROP VIEW IF EXISTS `vw_currentMonth`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_currentMonth` AS select `ponto`.`fkpessoa` AS `fkpessoa`,month(`ponto`.`data_inicial`) AS `dataInicial`,month(`ponto`.`data_final`) AS `dataFinal`,sec_to_time(sum(time_to_sec(timediff(timediff(`ponto`.`horario_final`,`ponto`.`horario_inicial`),`horario_padrao`.`horario_almoco`)))) AS `timeMonth` from ((`ponto` left join `pessoa` on((`pessoa`.`id` = `ponto`.`fkpessoa`))) left join `horario_padrao` on((`horario_padrao`.`fkpessoa` = `pessoa`.`id`))) group by `ponto`.`fkpessoa`,month(`ponto`.`data_inicial`),month(`ponto`.`data_final`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_timeYear`
--

/*!50001 DROP VIEW IF EXISTS `vw_timeYear`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_timeYear` AS select `ponto`.`fkpessoa` AS `usuario`,sec_to_time(sum(time_to_sec(timediff(timediff(`ponto`.`horario_final`,`ponto`.`horario_inicial`),`horario_padrao`.`horario_almoco`)))) AS `timeYear` from ((`ponto` left join `pessoa` on((`pessoa`.`id` = `ponto`.`fkpessoa`))) left join `horario_padrao` on((`horario_padrao`.`fkpessoa` = `pessoa`.`id`))) group by `ponto`.`fkpessoa` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-13 20:51:45
