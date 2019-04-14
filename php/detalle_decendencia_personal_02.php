<html lang="en">
	<head>
		<title>Consultar Personal</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/hoja_estilo.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	</head>
	<body>
    <?php
        $id_persona=$_GET['id_persona'];
        $id_persona_antes=$_GET['id_persona_antes'];
        $nombres_antes=$_GET['nombres_antes'];
        $apellidos_antes=$_GET['apellidos_antes'];
        $foto_antes=$_GET['foto_antes'];
        include("conexion.php");
        $conexion = $conn;
        $sql = "SELECT ".
                  "registros_decendencias.id_persona, ".
                  "registros_decendencias.nombres, ".
                  "registros_decendencias.apellidos, ".
                  "registros_decendencias.sexo, ".
                  "registros_decendencias.fecha_nacimiento, ".
                  "TRIM(registros_decendencias.foto) AS foto, ".
                  "registros_decendencias.estatus, ".
                  "registros_decendencias.id_decendencia, ".
                  "RTRIM(registros_personales.nombres)||' '||RTRIM(registros_personales.apellidos) As nombre_descendencia, ".
                  "registros_decendencias.id_parentesco, ".
                  "registros_decendencias.descripcion, ".
                  "registros_decendencias.posee_decendencia ".
                "FROM ".
                  "registros_personales, ".
                  "(SELECT ".
                        "decendencias.id_persona, ".
                        "RTRIM(decendencias.nombres) AS nombres, ".
                        "RTRIM(decendencias.apellidos) AS apellidos, ".
                        "decendencias.sexo, ".
                        "decendencias.fecha_nacimiento, ".
                        "TRIM(decendencias.foto) AS foto, ".
                        "decendencias.estatus, ".
                        "decendencias.id_decendencia, ".
                        "decendencias.id_parentesco, ".
                        "registros_parentescos.descripcion, ".
                        "decendencias.posee_decendencia ".
                      "FROM ".
                        "registros_personales AS decendencias ".
                        "INNER JOIN registros_parentescos ON registros_parentescos.id_parentesco = decendencias.id_parentesco) AS registros_decendencias ".
                "WHERE ".
                   "registros_personales.id_persona=registros_decendencias.id_decendencia AND ".
                   "registros_decendencias.id_persona=$id_persona ".
                "ORDER BY ".
                   "registros_decendencias.id_persona;";
        $resultado = pg_query($conexion,$sql);
        while($resultados = pg_fetch_object($resultado))
        {
          $nombres=$resultados->nombres;
          $apellidos=$resultados->apellidos;
          $sexo=$resultados->sexo;
          $fecha_nacimiento=$resultados->fecha_nacimiento;
          $condicionvida=$resultados->estatus;
          $foto=$resultados->foto;
          $nombre_decendencia=$resultados->nombre_descendencia;
          $id_parentesco=$resultados->id_parentesco;
          $descripcion=$resultados->descripcion;
          $posee_decendencia=$resultados->posee_decendencia;

          if ($condicionvida=="1")
          {
            $condicionvida="Con vida";
          }
					if ($sexo=="M" and $condicionvida=="2")
          {
            $condicionvida="Fallecido";
          }
          if ($sexo=="F" and $condicionvida=="2")
          {
            $condicionvida="Fallecida";
          }
          if ($posee_decendencia=="S")
          {
            $posee_decendencia="Si";
          }
          else
          {
            $posee_decendencia="No";
          }
          if ($sexo=="M")
          {
            $sexo='Masculino';
          }
          else
          {
            $sexo='Femenino';
          }
        }
    ?>
    <div class="row w-100 mt-4 justify-content-center">
    	<div class="consulta col-md-8 card card-content">
    		<div class="row show-details mb-4">
    			<div class="col-10 pl-0 mb-1">
    				<h2>Consultar Personal</h2>
    			</div>
					<div class="col-2 justify-content-end">
		        <a><img class="foto" src="../imagenes/<?php echo $foto; ?>"></a>
		      </div>
    			<div class="p-1 col-md-12">
    				<label class="text-secondary" for="nombres">Nombres</label>
    				<h1><?php echo $nombres.' '.$apellidos ?></h1>
    			</div>
          <div class="p-1 col-md-4">
            <label class="text-secondary" for="sexo">Sexo</label>
            <p><?php echo $sexo ?></p>
          </div>
          <div class="p-1 col-md-4">
            <label class="text-secondary" for="fecha_nacimiento">Fecha de Nacimiento</label>
            <p><?php echo $fecha_nacimiento ?></p>
          </div>
          <div class="p-1 col-md-4">
            <label class="text-secondary" for="condicionvida">Condiciòn de Vida</label>
            <p><?php echo $condicionvida ?></p>
          </div>
          <div class="p-1 col-md-8">
            <label class="text-secondary" for="decendencia">Decendencia</label>
            <p><?php echo $descripcion.' de '.$nombre_decendencia ?></p>
          </div>
          <div class="p-1 col-md-4">
            <label class="text-secondary" for="posee_decendencia">Posee Decendencia?</label>
            <p><?php echo $posee_decendencia ?></p>
          </div>
    		</div>
    		<div class="row justify-content-center">
          <div class="col-md-4">
              <?php
								echo "<a href='../php/detalle_decendencia.php?id_persona=$id_persona_antes&nombres=$nombres_antes&apellidos=$apellidos_antes&foto=$foto_antes' class='form-control btn btn-primary' name='salir' id='salir'>Salir</a>"
								//echo "<a href='../php/detalle_decendencia.php?id_persona=$id_persona_antes&nombres=$nombres_antes&apellidos=$apellidos_antes&foto=$foto_antes'.'class='form-control btn btn-primary' name='salir' id='salir'>Salir"."<i class='fas fa-sign-out-alt'></i>"."</a>"
              ?>
          </div>
    		</div>
    	</div>
    </div>
</form>
		<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="../js/validaciones.js"></script>
	</body>
</html>
