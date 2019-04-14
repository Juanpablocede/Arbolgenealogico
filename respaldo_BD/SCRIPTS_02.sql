SELECT 
	registros_decendencias.id_persona, 
	registros_decendencias.nombres, 
	registros_decendencias.apellidos, 
	registros_decendencias.sexo, 
	registros_decendencias.fecha_nacimiento, 
	registros_decendencias.foto, 
	registros_decendencias.estatus,
	registros_decendencias.id_decendencia,
	RTRIM(registros_personales.nombres)||' '||RTRIM(registros_personales.apellidos) As nombre_decendencia,
	registros_decendencias.id_parentesco,
	registros_decendencias.descripcion,
	registros_decendencias.posee_decendencia
FROM 
	registros_personales,
	(SELECT
		decendencias.id_persona,
		RTRIM(decendencias.nombres) AS nombres,
		RTRIM(decendencias.apellidos) AS apellidos,
		decendencias.sexo, 
		decendencias.fecha_nacimiento, 
		decendencias.foto, 
		decendencias.estatus,
		decendencias.id_decendencia,
		decendencias.id_parentesco,
		registros_parentescos.descripcion,
		decendencias.posee_decendencia
	FROM
		registros_personales AS decendencias 
		INNER JOIN registros_parentescos ON registros_parentescos.id_parentesco = decendencias.id_parentesco) AS registros_decendencias
WHERE 
	registros_personales.id_persona=registros_decendencias.id_decendencia
ORDER BY 
	registros_decendencias.id_persona;