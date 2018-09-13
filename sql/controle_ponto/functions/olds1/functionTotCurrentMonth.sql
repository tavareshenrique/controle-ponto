CREATE DEFINER=`root`@`localhost` FUNCTION `functionTotCurrentMonth`(horaInicial TIME, horaFinal TIME, horaAlmoco TIME, sabado TINYINT, domingo TINYINT) RETURNS varchar(50) CHARSET utf8
BEGIN
	DECLARE toDo VARCHAR(50);
    
    DECLARE dias VARCHAR(50);
    
    DECLARE timeWorking VARCHAR(50);
    DECLARE diaInicial DATE DEFAULT date_add(date_add(LAST_DAY(CURDATE()),interval 1 DAY),interval -1 MONTH);  
    DECLARE diaFinal DATE DEFAULT LAST_DAY(CURDATE());  
    
    SET timeWorking = functionAlphanum((SELECT functionReturnTimeWorking(horaInicial, horaFinal, horaAlmoco)));

	IF ((sabado = 0) AND (domingo = 0)) THEN

		SET dias = (SELECT 
						COUNT(*)
					FROM numeros 
					WHERE numero <= DATEDIFF(diaFinal, diaInicial) 
					AND DAYOFWEEK(ADDDATE(diaInicial, numero)) NOT IN (1,7));   
                    
	ELSEIF ((sabado = 1) AND (domingo = 1)) THEN
    
		SET dias = (SELECT 
						COUNT(*)
					FROM numeros 
					WHERE numero <= DATEDIFF(diaFinal, diaInicial) 
					AND DAYOFWEEK(ADDDATE(diaInicial, numero)));
                    
	ELSEIF ((sabado = 1) AND (domingo = 0)) THEN
    
		SET dias = (SELECT 
						COUNT(*)
					FROM numeros 
					WHERE numero <= DATEDIFF(diaFinal, diaInicial) 
					AND DAYOFWEEK(ADDDATE(diaInicial, numero)) NOT IN (1));
                    
	ELSEIF ((sabado = 0) AND (domingo = 1)) THEN
    
		SET dias = (SELECT 
						COUNT(*)
					FROM numeros 
					WHERE numero <= DATEDIFF(diaFinal, diaInicial) 
					AND DAYOFWEEK(ADDDATE(diaInicial, numero)) NOT IN (7));
    
	END IF;
                
	SET toDo = (timeWorking * dias);

	RETURN toDo;
END