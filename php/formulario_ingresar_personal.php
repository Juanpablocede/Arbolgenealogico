<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Ingresar Usuarios</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/hoja_estilo.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	</head>
	<body>
	<form action="../php/clase_ingresar_personal.php" method="GET" id="formulario" name="formulario">
  <div class="row w-100 justify-content-center">
    <div class="col-md-8 card card-content">
			<div class="row">
				<div class="col-10 pl-0 mb-1 float-center">
					<h4>
						Ingresar Personal<i class="fa text-primary fa-briefcase" aria-hidden="true"></i>
					</h4>
				</div>
				<div class="col-2 justify-content-end form-group">
					<label for="fotos" class="control-label"></label>
					<input type="file" class="form-control fotos" name="fotos" id="fotos">
				</div>
				<!--
				<div class="col-6 justify-content-end form-group">
					<label for="archivo" class="control-label">Buscar Foto</label>
						<input type="file" class="form-control barchivo"  name="archivo" id="archivo">
				</div>
				!-->

			</div>
			<!--
			https://www.youtube.com/watch?v=gkHpTSUFmrg
			https://www.youtube.com/watch?v=K9YW1sWJuR4
			<div class="row">
				<div class="col-12 p1-0 mb-1">
				</div>
				<div class="col-12 p1-0 mb-1">
				</div>
			</div>
			!-->
      <div class="row">
        <div class="p-1 col-md-6">
          <label class=" text-secondary" for="nombres">Nombre</label>
          <input class="form-control required" type="text" name="nombres" id="nombres" placeholder="nombres usuario">
        </div>
				<div class="p-1 col-md-3">
					<label class=" text-secondary" for="sexo">Sexo</label>
					<select class="form-control" name="sexo" id="sexo">
									<option value="sexo" selected disabled>Sexo</option>
									<option value="M">Masculino</option>
									<option value="F">Femenino</option>
					</select>
				</div>
				<div class="p-1 col-md-3">
					<label class=" text-secondary" for="fecha_nacimiento">Fecha Nacimiento</label>
					<input class="form-control required" type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="fecha de nacimiento">
				</div>
        <div class="p-1 col-md-6">
          <label class=" text-secondary" for="apellidos">Apellidos</label>
          <input class="form-control required" type="text" name="apellidos" id="apellidos" placeholder="apellidos usuario">
        </div>
				<div class="p-1 col-md-4">
          <label class=" text-secondary" for="telefonos">Telefonos</label>
          <input class="form-control required" type="text" name="telefonos" id="telefonos" placeholder="telefonos">
        </div>
				<div class="p-1 col-md-2">
					<label class=" text-secondary" for="edocivil">Estado Civil</label>
					<select class="form-control" name="edocivil" id="edocivil">
									<option value="Estado Civil" selected disabled>Estado Civil</option>
									<option value="S">Soltero</option>
									<option value="C">Casado</option>
									<option value="D">Divorciado</option>
									<option value="V">Viudo</option>
									<option value="B">Concubinato</option>
									<option value="O">Otros</option>
					</select>
				</div>
				<div class="p-1 col-md-6">
					<label class=" text-secondary" for="lugar_nacimiento">Lugar de Nacimiento</label>
					<input class="form-control required" type="text" name="lugar_nacimiento" id="lugar_nacimiento" placeholder="lugar de nacimiento">
				</div>
				<div class="p-1 col-md-3">
					<label class=" text-secondary" for="tiposangre">Tipo de Sangre</label>
					<input class="form-control required" type="text" name="tiposangre" id="tiposangre" placeholder="tipo de sangre">
				</div>
				<div class="p-1 col-md-3">
					<label class=" text-secondary" for="condicionvida">Condiciòn de vida</label>
					<select class="form-control" name="condicionvida" id="condicionvida">
									<option value="condiciòn de vida" selected disabled>Condiciòn de vida</option>
									<option value="1">Con vida</option>
									<option value="2">Fallecido</option>
					</select>
				</div>
				<div class="p-1 col-md-6">
					<label class=" text-secondary" for="id_decendencia">Decendencia</label>
					<select class="form-control" name="id_decendencia" id="id_decendencia">
									<option value="id_decendencia" selected disabled>Decendencia</option>
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
									<option value="id_parentesco" selected disabled>Parentesco</option>
									<?php
											include("conexion.php");
											$conexion = $conn;
											$sql = "SELECT id_parentesco, descripcion FROM registros_parentescos ORDER BY id_parentesco";
											echo $sql;
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
									<option value="Posee decendencia?" selected disabled>Posee Decendencia?</option>
									<option value="S">Si</option>
									<option value="N">No</option>
					</select>
				</div>
				<div class="p-1 col-md-6">
          <label class=" text-secondary" for="correo">Correo Electrònico</label>
          <input class="form-control required" type="text" name="correo" id="correo" placeholder="correo electrònico">
        </div>
				<div class="p-1 col-md-3">
					<label class=" text-secondary" for="fecha_matri_civil">Fecha Civil</label>
					<input class="form-control required" type="date" name="fecha_matri_civil" id="fecha_matri_civil" placeholder="fecha de matrimonio civil">
				</div>
				<div class="p-1 col-md-3">
					<label class=" text-secondary" for="fecha_matri_ecle">Fecha Ecleciastico</label>
					<input class="form-control required" type="date" name="fecha_matri_ecle" id="fecha_matri_ecle" placeholder="fecha de matrimonio ecleciastico">
				</div>
				<div class="p-1 col-md-6">
					<label class=" text-secondary" for="direccion">Direcciòn Actual</label>
					<input class="form-control required" type="text" name="direccion" id="direccion" placeholder="direcciòn actual">
				</div>
				<div class="p-1 col-md-6">
					<label class=" text-secondary" for="lugar_matrimonio">Lugar de Matrimonio</label>
					<input class="form-control required" type="text" name="lugar_matrimonio" id="lugar_matrimonio" placeholder="lugar de matrimonio">
				</div>
				<div class="p-1 col-md-12">
					<p class="text-secondary">Si la condiciòn de vida es fallecido indique la siguiente informaciòn</p>
				</div>
				<div class="p-1 col-md-3">
					<label class=" text-secondary" for="fecha_fallecimiento">Fecha Fallecimiento</label>
					<input class="form-control required" type="date" name="fecha_fallecimiento" id="fecha_fallecimiento" placeholder="fecha fallecimiento">
				</div>
				<div class="p-1 col-md-9">
					<label class=" text-secondary" for="lugar_fallecimiento">Lugar Fallecimiento</label>
					<input class="form-control required" type="text" name="lugar_fallecimiento" id="lugar_fallecimiento" placeholder="lugar fallecimiento">
				</div>
				<div class="p-1 col-md-6">
					<label class=" text-secondary" for="causa_fallecimiento">Causa Fallecimiento</label>
					<input class="form-control required" type="text" name="causa_fallecimiento" id="causa_fallecimiento" placeholder="causa fallecimiento">
				</div>
				<div class="p-1 col-md-6">
					<label class=" text-secondary" for="lugar_sepultura">Lugar de Sepultura</label>
					<input class="form-control required" type="text" name="lugar_sepultura" id="lugar_sepultura" placeholder="lugar sepultura">
				</div>
				<div class="p-1 col-md-12">
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
		<!--<script
		src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous"></script>!-->
  	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="../js/validaciones.js"></script>
		<!--
		<script>
		$(document).ready(function()
		{
					$("#guardar").click(function()
						{
								var nombres 		= $("#nombres").val();
								var apellidos 	= $("#apellidos").val();
								var direccion		= $("#direccion").val();
								if (nombres == "" || apellidos == "" || direccion == "")
								{
									alert("Algunos de los campos nombres, apellidos o direccion no puede estar en blanco");
								}

						});
		});
		</script>
		!-->
	</body>
</html>
