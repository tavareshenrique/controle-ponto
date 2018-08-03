-- SELECT (functionCurrentMonthNOTSatSun('08:00:00', '18:18:00', '01:30:00')) AS timeAllMonth;
-- 
-- SELECT (functionCurrentMonthNOTSat('08:00:00', '18:18:00', '01:30:00')) AS timeAllMonth;

SELECT (functionTotCurrentMonth('08:00:00', '18:18:00', '01:30:00', 1, 1)) AS timeAllMonth;

-- Sem SD: 22
-- S: 26
-- D: 27
-- Todos: 31