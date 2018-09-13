CREATE DEFINER=`root`@`localhost` FUNCTION `functionReturnYear`(dataAno DATE) RETURNS int(11)
BEGIN
	DECLARE ano DATE;

	SET ano = (SELECT year(dataAno));
    
	RETURN ano;
END