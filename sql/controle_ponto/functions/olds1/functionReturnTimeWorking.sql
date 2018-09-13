CREATE DEFINER=`root`@`localhost` FUNCTION `functionReturnTimeWorking`(horaInicial TIME, horaFinal TIME, horaAlmoco TIME) RETURNS varchar(50) CHARSET utf8
BEGIN
	DECLARE returnTime VARCHAR(50);
    
    SET returnTime = (SELECT TIMEDIFF(TIMEDIFF(horaFinal, horaInicial), horaAlmoco));
	
	RETURN returnTime;
END