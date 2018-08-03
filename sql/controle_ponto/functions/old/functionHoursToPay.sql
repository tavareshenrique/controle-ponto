USE `controle_ponto`;
DROP function IF EXISTS `functionHoursToPay`;

DELIMITER $$
USE `controle_ponto`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `functionHoursToPay`(horaInicial TIME, horaFinal TIME, horaAlmoco TIME, sabado TINYINT, domingo TINYINT, pessoa INT) RETURNS varchar(50) CHARSET utf8
BEGIN
	DECLARE toPay VARCHAR(50);

	SET toPay = (SELECT
					(functionTotCurrentMonth(horaInicial, horaFinal, horaAlmoco, sabado, domingo) -
					SEC_TO_TIME(TIME_TO_SEC(TIMEDIFF(TIMEDIFF(horario_padrao.horario_final, horario_padrao.horario_inicial), horario_padrao.horario_almoco)))) as theTime 
				FROM horario_padrao
                WHERE fkpessoa = pessoa);

	RETURN toPay;
END$$

DELIMITER ;

-- CREATE DEFINER=`root`@`localhost` FUNCTION `functionHoursToPay`(horaInicial TIME, horaFinal TIME, horaAlmoco TIME, sabado TINYINT, domingo TINYINT) RETURNS varchar(50) CHARSET utf8
-- BEGIN
-- 	DECLARE toPay VARCHAR(50);

-- 	SET toPay = (SELECT
-- 					(functionTotCurrentMonth(horaInicial, horaFinal, horaAlmoco, sabado, domingo) -
-- 					SEC_TO_TIME(TIME_TO_SEC(TIMEDIFF(TIMEDIFF(horario_padrao.horario_final, horario_padrao.horario_inicial), horario_padrao.horario_almoco)))) as theTime 
-- 				FROM horario_padrao);

-- 	RETURN toPay;
-- END