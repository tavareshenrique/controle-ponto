CREATE DEFINER=`root`@`localhost` FUNCTION `functionReturnYear`(dataAno DATE) RETURNS varchar(50) CHARSET utf8
BEGIN
	DECLARE ano VARCHAR(50);

	SET ano = (SELECT year(dataAno));
    
	RETURN ano;
END