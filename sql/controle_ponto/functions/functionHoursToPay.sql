CREATE DEFINER=`root`@`localhost` FUNCTION `functionHoursToPay`(horaInicial TIME, horaFinal TIME, horaAlmoco TIME, sabado TINYINT, domingo TINYINT, pessoa INT, mes INT) RETURNS varchar(50) CHARSET utf8
BEGIN
	DECLARE toPay VARCHAR(50);
    
    SET toPay = (SELECT 
				     (functionTotCurrentMonth(horaInicial, horaFinal, horaAlmoco, sabado, domingo)
					 -
					 vw_currentMonth.timeMonth) as totPay
				 FROM vw_currentMonth
				 WHERE vw_currentMonth.fkpessoa = pessoa AND vw_currentMonth.dataInicial = mes);

	RETURN toPay;
END