SELECT 
	registros_personales.id_persona,
	RTRIM(registros_personales.nombres)||' '||RTRIM(registros_personales.apellidos) AS nombres
FROM
	registros_personales,
	(SELECT
		decendencias.id_persona,
		decendencias.id_decendencia,
		RTRIM(decendencias.nombres)||' '||RTRIM(decendencias.apellidos) AS nombre_decendencia
	FROM
		registros_personales AS decendencias) AS decendientes
WHERE
	registros_personales.id_persona=decendientes.id_decendencia AND
	registros_personales.id_decendencia<>0 AND
	registros_personales.posee_decendencia='S'
	


