-- SELECT
-- 	(functionTotCurrentMonth('08:00:00', '18:18:00', '01:30:00', 0,0)),
--     ((TIMEDIFF(TIMEDIFF(hp.horario_final, hp.horario_inicial), hp.horario_almoco))),
-- 	(functionTotCurrentMonth('08:00:00', '12:00:00', '00:30:00', 0,0)) - (TIMEDIFF(TIMEDIFF(hp.horario_final, hp.horario_inicial), hp.horario_almoco))
-- FROM horario_padrao as hp

SELECT functionReturnaHorarioTrab('08:00:00', '18:18:00', '01:30:00', 0,0) AS hoursPay;

SELECT 
	((functionTotCurrentMonth('08:00:00', '18:18:00', '01:30:00', 0,0))
    -
    (functionReturnaHorarioTrab('08:00:00', '18:18:00', '01:30:00'))) AS SUB