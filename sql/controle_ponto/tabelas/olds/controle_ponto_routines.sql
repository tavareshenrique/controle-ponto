CREATE DATABASE  IF NOT EXISTS `controle_ponto` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `controle_ponto`;
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-13  0:32:18
