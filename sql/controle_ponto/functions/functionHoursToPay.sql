CREATE DEFINER=`root`@`localhost` FUNCTION `functionHoursToPay`(horaInicial TIME, horaFinal TIME, horaAlmoco TIME, sabado TINYINT, domingo TINYINT, pessoa INT) RETURNS varchar(50) CHARSET utf8
BEGIN
	DECLARE toPay VARCHAR(50);
    
    SET toPay = (SELECT 
				     (functionTotCurrentMonth(horaInicial, horaFinal, horaAlmoco, sabado, domingo)
					 -
					 vw_currentMonth.timeMonth) as totPay
				 FROM vw_currentMonth
				 WHERE vw_currentMonth.fkpessoa = pessoa);

	/* SET toPay = (SELECT
					(functionTotCurrentMonth(horaInicial, horaFinal, horaAlmoco, sabado, domingo)) 
                    -
                    (SEC_TO_TIME(TIME_TO_SEC(TIMEDIFF(TIMEDIFF(horaFinal, horaInicial), horaAlmoco)))) as hourPay
				FROM horario_padrao
                WHERE fkpessoa = pessoa); */

	RETURN toPay;
END