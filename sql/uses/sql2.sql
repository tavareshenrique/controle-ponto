SELECT TIME(FUNCTIONCURRENTMONTHSATSUN('08:00:00', '18:18:00', '01:30:00', 0, 1)) AS timeAllMonth;

-- SELECT 
-- 	(COUNT(*) * SEC_TO_TIME(TIME_TO_SEC(TIMEDIFF(TIMEDIFF('18:18:00','08:00:00'), '01:30:00')))) as numWorkingDays
-- FROM numeros
-- WHERE numero <= DATEDIFF(LAST_DAY(CURDATE()), date_add(date_add(LAST_DAY(CURDATE()),interval 1 DAY),interval -1 MONTH)) 
-- AND DAYOFWEEK(ADDDATE('08:00:00',numero) ) NOT IN (7);
-- 
-- SELECT 
-- 	(COUNT(*) * SEC_TO_TIME(TIME_TO_SEC(TIMEDIFF(TIMEDIFF('18:18:00','08:00:00'), '01:30:00')))) as numWorkingDays
-- FROM numeros
-- WHERE numero <= DATEDIFF(LAST_DAY(CURDATE()),date_add(date_add(LAST_DAY(CURDATE()),interval 1 DAY),interval -1 MONTH))     
-- AND DAYOFWEEK(ADDDATE(date_add(date_add(LAST_DAY(CURDATE()),interval 1 DAY),interval -1 MONTH),numero)) NOT IN (7) ;
-- 

-- 
-- SELECT
-- 	date_add(date_add(LAST_DAY(CURDATE()),interval 1 DAY),interval -1 MONTH),
--     LAST_DAY(CURDATE())
	

-- SELECT 
--     (COUNT(*) * SEC_TO_TIME(TIME_TO_SEC(TIMEDIFF(TIMEDIFF('18:18:00', '08:00:00'),
--                             '01:30:00')))) AS numWorkingDays
-- FROM
--     numeros
-- WHERE
--     numero <= DATEDIFF('2018-07-31', '2018-07-01')
--         AND DAYOFWEEK(ADDDATE('2018-07-01', numero)) NOT IN (7);

-- Sem SD: 22
-- S: 26
-- D: 27
-- Todos: 31