-- SELECT DATEDIFF(LAST_DAY(CURDATE()),date_add(date_add(LAST_DAY(CURDATE()),interval 1 DAY),interval -1 MONTH)) as diff;

SELECT 
	DATEDIFF(LAST_DAY(CURDATE()),date_add(date_add(LAST_DAY(CURDATE()),interval 1 DAY),interval -1 MONTH)) as totDays,
    numero as diff,
    ADDDATE(date_add(date_add(LAST_DAY(CURDATE()),interval 1 DAY),interval -1 MONTH),numero) as newDate,
    DAYOFWEEK(ADDDATE(date_add(date_add(LAST_DAY(CURDATE()),interval 1 DAY),interval -1 MONTH),numero)) as dayOfWeek
FROM numeros
WHERE numero <= DATEDIFF(LAST_DAY(CURDATE()),date_add(date_add(LAST_DAY(CURDATE()),interval 1 DAY),interval -1 MONTH))
AND DAYOFWEEK(ADDDATE(date_add(date_add(LAST_DAY(CURDATE()),interval 1 DAY),interval -1 MONTH),numero)) NOT IN (1,7);

SELECT COUNT(*) as numWorkingDays
FROM numeros
WHERE numero <= DATEDIFF('2018-09-30','2018-09-01')     
AND DAYOFWEEK(ADDDATE(date_add(date_add('2018-09-01',interval 1 DAY),interval -1 MONTH),numero)) NOT IN (1,7);