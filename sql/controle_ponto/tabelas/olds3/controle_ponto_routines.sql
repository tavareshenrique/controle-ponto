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
-- Temporary table structure for view `vw_pessoa`
--

DROP TABLE IF EXISTS `vw_pessoa`;
/*!50001 DROP VIEW IF EXISTS `vw_pessoa`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_pessoa` AS SELECT 
 1 AS `idPessoa`,
 1 AS `nome`,
 1 AS `sobrenome`,
 1 AS `data_nascimento`,
 1 AS `foto`,
 1 AS `idUsuario`,
 1 AS `usuario`,
 1 AS `email`,
 1 AS `data_cadastro`,
 1 AS `celular`,
 1 AS `telefone`,
 1 AS `profissao`,
 1 AS `empresa`,
 1 AS `horario_inicial`,
 1 AS `horario_final`,
 1 AS `horario_almoco`,
 1 AS `possui_horario_almoco`,
 1 AS `sabado`,
 1 AS `domingo`,
 1 AS `endereco`,
 1 AS `bairro`,
 1 AS `cep`,
 1 AS `numero`,
 1 AS `complemento`,
 1 AS `cidade`,
 1 AS `uf`,
 1 AS `pais`*/;
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
-- Temporary table structure for view `vw_totalHour`
--

DROP TABLE IF EXISTS `vw_totalHour`;
/*!50001 DROP VIEW IF EXISTS `vw_totalHour`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_totalHour` AS SELECT 
 1 AS `usuario`,
 1 AS `totalHour`*/;
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
 1 AS `ano_inicial`,
 1 AS `ano_final`,
 1 AS `timeYear`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_pessoa`
--

/*!50001 DROP VIEW IF EXISTS `vw_pessoa`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_pessoa` AS select `pessoa`.`id` AS `idPessoa`,`pessoa`.`nome` AS `nome`,`pessoa`.`sobrenome` AS `sobrenome`,`pessoa`.`data_nascimento` AS `data_nascimento`,`foto_perfil`.`foto` AS `foto`,`usuario`.`id` AS `idUsuario`,`usuario`.`usuario` AS `usuario`,`usuario`.`email` AS `email`,`usuario`.`data_cadastro` AS `data_cadastro`,concat(`contato`.`ddd_celular`,' ',`contato`.`celular`) AS `celular`,concat(`contato`.`ddd_telefone`,' ',`contato`.`telefone`) AS `telefone`,`profissao`.`profissao` AS `profissao`,`empresa`.`nome_fantasia` AS `empresa`,`horario_padrao`.`horario_inicial` AS `horario_inicial`,`horario_padrao`.`horario_final` AS `horario_final`,`horario_padrao`.`horario_almoco` AS `horario_almoco`,`horario_padrao`.`possui_horario_almoco` AS `possui_horario_almoco`,`horario_padrao`.`sabado` AS `sabado`,`horario_padrao`.`domingo` AS `domingo`,`endereco`.`endereco` AS `endereco`,`endereco`.`bairro` AS `bairro`,`endereco`.`cep` AS `cep`,`endereco`.`numero` AS `numero`,`endereco`.`complemento` AS `complemento`,`cidades`.`cidade` AS `cidade`,`estados`.`uf` AS `uf`,`pais`.`pais` AS `pais` from ((((((((((`pessoa` left join `usuario` on((`usuario`.`fkpessoa` = `pessoa`.`id`))) left join `foto_perfil` on((`foto_perfil`.`fkpessoa` = `pessoa`.`id`))) left join `empresa` on((`empresa`.`id` = `pessoa`.`fkempresa`))) left join `profissao` on((`profissao`.`id` = `pessoa`.`fkprofissao`))) left join `horario_padrao` on((`horario_padrao`.`fkpessoa` = `pessoa`.`id`))) left join `endereco` on((`endereco`.`id` = `pessoa`.`fkendereco`))) left join `cidades` on((`cidades`.`id` = `endereco`.`fkcidade`))) left join `estados` on((`estados`.`id` = `cidades`.`fkestado`))) left join `pais` on((`pais`.`id` = `cidades`.`fkpais`))) left join `contato` on((`contato`.`fkpessoa` = `pessoa`.`id`))) */;
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

--
-- Final view structure for view `vw_totalHour`
--

/*!50001 DROP VIEW IF EXISTS `vw_totalHour`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_totalHour` AS select `ponto`.`fkpessoa` AS `usuario`,sum(timediff(timediff(`ponto`.`horario_final`,`ponto`.`horario_inicial`),`horario_padrao`.`horario_almoco`)) AS `totalHour` from ((`ponto` left join `pessoa` on((`pessoa`.`id` = `ponto`.`fkpessoa`))) left join `horario_padrao` on((`horario_padrao`.`fkpessoa` = `pessoa`.`id`))) group by `ponto`.`fkpessoa` */;
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
/*!50001 VIEW `vw_timeYear` AS select `ponto`.`fkpessoa` AS `usuario`,`ponto`.`ano_inicial` AS `ano_inicial`,`ponto`.`ano_final` AS `ano_final`,sum(timediff(timediff(`ponto`.`horario_final`,`ponto`.`horario_inicial`),`horario_padrao`.`horario_almoco`)) AS `timeYear` from ((`ponto` left join `pessoa` on((`pessoa`.`id` = `ponto`.`fkpessoa`))) left join `horario_padrao` on((`horario_padrao`.`fkpessoa` = `pessoa`.`id`))) group by `ponto`.`fkpessoa`,`ponto`.`ano_inicial`,`ponto`.`ano_final` */;
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

-- Dump completed on 2018-07-29  1:43:44
