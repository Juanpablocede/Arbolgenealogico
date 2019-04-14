<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Modificar Personal</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/hoja_estilo.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	</head>
	<body>
    <?php
        $id_persona=$_GET['id_persona'];
        $nombres=$_GET['nombres'];
        $apellidos=$_GET['apellidos'];
				$sexo=$_GET['sexo'];
        $fecha_nacimiento=$_GET['fecha_nacimiento'];
				$foto=$_GET['foto'];
				$condicionvida=$_GET['estatus'];
				$id_decendencia=$_GET['id_decendencia'];
				$nombre_decendencia=$_GET['nombre_decendencia'];
				$id_parentesco=$_GET['id_parentesco'];
				$descripcion=$_GET['descripcion'];
				$posee_decendencia=$_GET['posee_decendencia'];
				if ($condicionvida=="1")
				{
						$condicionvida="con vida";
				}
				if ($condicionvida=="2" && $sexo=='M')
				{
						$condicionvida="Fallecido";
				}
				if ($condicionvida=="2" && $sexo=='F')
				{
						$condicionvida="Fallecida";
				}

				if ($posee_decendencia=="S")
				{
						$posee_decendencia="Si";
				}else
				{
						$posee_decendencia="No";
				}
				if ($sexo=="M")
				{
						$sexo="Masculino";
				}
				else
				{
						$sexo="Femenino";
				}
    ?>
	<form action="../php/clase_modificar_personal.php" method="POST" id="formulario" name="formulario">
  <div class="row w-100 justify-content-center">
    <div class="col-md-8 card card-content">
			<div class="row">
				<div class="col-8 pl-0 mb-1">
					<h4>Modificar Personal <i class="fa text-primary fa-briefcase" aria-hidden="true"></i>
					</h4>
				</div>
				<div class="col-2">
					<img class="foto" src="../imagenes/<?php echo $foto; ?>"/>
				</div>
				<div class="col-1 justify-content-end form-group">
						<label for="fotos" class="control-label"></label>
						<input type="file" class="form-control fotos" name="fotos" id="fotos">
				</div>
				<div class="col-1 justify-content-end">
						<a href="formulario_ingresar_personal.php"><img class="ingresar"src="../imagenes/ingresar_registro.png"></a>
				</div>
			</div>
			<div class="row">
				<div class="col-12 p1-0 mb-1">
				</div>
				<div class="col-12 p1-0 mb-1">
				</div>
			</div>
      <div class="row">
        <div class="p-1 col-md-12">
          <!--<label class="type="hidden" text-secondary" for="nombres">Codigo</label>!-->
          <input class="form-control required" type="hidden" name="id_persona" id="id_persona" value="<?php echo $id_persona?>" placeholder="código persona">
        </div>
        <div class="p-1 col-md-6">
          <label class=" text-secondary" for="nombres">Nombre</label>
          <input class="form-control required" type="text" name="nombres" id="nombres" value="<?php echo $nombres?>" placeholder="nombres personal">
        </div>
        <div class="p-1 col-md-6">
          <label class=" text-secondary" for="apellidos">Apellidos</label>
          <input class="form-control required" type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos?>" placeholder="apellidos personal">
        </div>
				<div class="p-1 col-md-4">
					<label class=" text-secondary" for="sexo">Sexo</label>
					<select class="form-control" name="sexo" id="sexo">
								<option value="<?php echo $sexo ?>"></option>
								<option value="M">Masculino</option>
								<option value="F">Femenino</option>
					</select>
        </div>
        <div class="p-1 col-md-4">
          <label class=" text-secondary" for="fecha_nacimiento">Fecha Nacimiento</label>
          <input class="form-control required" type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $fecha_nacimiento ?>" placeholder="fecha de nacimiento">
        </div>
				<div class="p-1 col-md-4">
					<label class=" text-secondary" for="condicionvida">Condiciòn de vida</label>
					<select class="form-control" name="condicionvida" id="condicionvida">
									<option value="<?php echo $condicionvida ?>"></option>
									<option value="1">Con vida</option>
									<option value="2">Fallecido</option>
					</select>
				</div>
				<div class="p-1 col-md-6">
					<label class=" text-secondary" for="id_decendencia">Decendencia</label>
					<select class="form-control" name="id_decendencia" id="id_decendencia">
									<option value="<?php echo $nombre_decendencia ?>"></option>
									<?php
											include("conexion.php");
											$conexion = $conn;
											$sql = "SELECT id_persona, RTRIM(nombres)||' '||RTRIM(apellidos) AS nombres FROM registros_personales WHERE posee_decendencia='S' ORDER BY id_persona";
											$resultado = pg_query($conexion,$sql);
											while($resultados = pg_fetch_object($resultado))
											{
													echo "<option value='$resultados->id_persona'>$resultados->nombres</option>";
											}
									?>
					</select>
				</div>
				<div class="p-1 col-md-3">
					<label class=" text-secondary" for="id_parentesco">Parentesco</label>
					<select class="form-control" name="id_parentesco" id="id_parentesco">
									<option value="<?php echo $descripcion ?>"></option>
									<?php
											include("conexion.php");
											$conexion = $conn;
											$sql = "SELECT id_parentesco, descripcion FROM registros_parentescos ORDER BY id_parentesco";
											$resultado = pg_query($conexion,$sql);
											while($resultados = pg_fetch_object($resultado))
											{
													echo "<option value='$resultados->id_parentesco'>$resultados->descripcion</option>";
											}
									?>

					</select>
				</div>
				<div class="p-1 col-md-3">
					<label class=" text-secondary" for="posee_decendencia">Posee Decendencia?</label>
					<select class="form-control" name="posee_decendencia" id="posee_decendencia">
									<option value="<?php echo $posee_decendencia ?>"></option>
									<option value="S">Si</option>
									<option value="N">No</option>
					</select>
				</div>

        <div class="p-1 col-md-6">
            <button class="form-control btn btn-primary" type="submit" name="guardar" id="guardar" >Guardar
              <i class="fas fa-save"></i>
            </button>
        </div>
        <div class="p-1 col-md-6">
            <a href="../php/listar_personal.php" class="form-control btn btn-primary" name="salir"  id="salir">Salir
              <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
      </div>
    </div>
  </div>
</form>
		<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="../js/validaciones.js"></script>
	</body>
</html>
