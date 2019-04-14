<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="../css/hoja_estilo.css" />
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    !-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/estilos_proyecto.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

</head>

<body>
  <div class="container card-table">
    <div class="row w-100 py-5 titulo_lista mb-4">
      <div class="col-10 float-center">
          <h2>Listado de Personas</h2>
      </div>
      <div class="col-2 justify-content-end">
        <a href="formulario_ingresar_personal.php"><img class="ingresar"src="../imagenes/ingresar_registro.png"></a>
        <!--<a class="ingresar btn btn-primary" href="formulario_ingresar_usuarios.php" name="ingresar" id="ingresar">
          <i class="fas fa-plus-circle"></i>
        </a>!-->
      </div>
    </div>
    <div class="row">
        <table id="ListarData" class="table flex-table table-hover" align="center">
          <thead>
              <tr class="primerafila">
                <th scope="col" class="d-none">Id_persona</th>
                <th scope="col" class="col-2">Nombre</th>
                <th scope="col" class="col-2">Apellido</th>
                <th scope="col" class="col-1 d-none text-center">Sexo</th>
                <th scope="col" class="col-1 text-center">Fecha de Nacimiento</th>
                <th scope="col" class="d-none">Foto</th>
                <th scope="col" class="col-1 text-center">Estatus</th>
                <th scope="col" class="d-none">Id_Decendencia</th>
                <th scope="col" class="col-4">Decendencia</th>
                <th scope="col" class="d-none">Id_Parentesco</th>
                <th scope="col" class="col-1">Parentesco</th>
                <th scope="col" class="col-1">Posee Decendencia?</th>
                <th scope="col" class="sin col-1">&nbsp;</th>
                <th scope="col" class="sin col-1">&nbsp;</th>
                <th scope="col" class="sin col-1">&nbsp;</th>
              </tr>
          </thead>
          <tbody>
          <?php
              include("conexion.php");
              $conexion = $conn;
              //$sql = "SELECT id_persona, nombres, apellidos, sexo, fecha_nacimiento, foto, estatus, id_decendencia, posee_decendencia FROM registros_personales WHERE id_decendencia<>0 ORDER BY id_persona";
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
                         "registros_personales.id_persona=registros_decendencias.id_decendencia ".
                      "ORDER BY ".
                         "registros_decendencias.id_persona;";
              $resultado = pg_query($conexion,$sql);
              while($resultados = pg_fetch_object($resultado))
              {
                echo "<tr>";
                      echo "<td class='ocultar'>".$resultados->id_persona."</td>";
                      echo "<td>".$resultados->nombres."</td>";
                      echo "<td>".$resultados->apellidos."</td>";
                      if ($resultados->sexo=="M")
                      {
                          echo "<td class='ocultar'>"."Maculino"."</td>";
                      }
                      else
                      {
                          echo "<td class='ocultar'>"."Femenino"."</td>";
                      }
                      echo "<td>".$resultados->fecha_nacimiento."</td>";
                      echo "<td class='ocultar'>".$resultados->foto."</td>";
                      if ($resultados->estatus=="1")
                      {
                          echo "<td>"."Con vida"."</td>";
                      }
                      if ($resultados->estatus=="2" and $resultados->sexo=="M")
                      {
                          echo "<td>"."Fallecido"."</td>";
                      }
                      if ($resultados->estatus=="2" and $resultados->sexo=="F")
                      {
                          echo "<td>"."Fallecida"."</td>";
                      }
                      echo "<td class='ocultar'>".$resultados->id_decendencia."</td>";
                      echo "<td>".$resultados->nombre_descendencia."</td>";
                      echo "<td class='ocultar'>".$resultados->id_parentesco."</td>";
                      echo "<td>".$resultados->descripcion."</td>";
                      if ($resultados->posee_decendencia=="S")
                      {
                          echo "<td>"."Si"."</td>";
                      }
                      else
                      {
                          echo "<td>"."No"."</td>";
                      }
                      echo "<td><a href='detalle_decendencia.php?id_persona=$resultados->id_persona&nombres=$resultados->nombres&apellidos=$resultados->apellidos&foto=$resultados->foto'><img class='arbol' src='../imagenes/arbol.jpg'></a></td>";
                      echo "<td><a href='clase_borrar_personal.php?id_persona=$resultados->id_persona' name='delete' id='delete' class='glyphicon glyphicon-trash btn btn-danger btn-xs delete'></a></td>";
                      echo "<td><a href='formulario_modificar_personal.php?id_persona=$resultados->id_persona&nombres=$resultados->nombres&apellidos=$resultados->apellidos&sexo=$resultados->sexo&
                      fecha_nacimiento=$resultados->fecha_nacimiento&foto=$resultados->foto&estatus=$resultados->estatus&id_decendencia=$resultados->id_decendencia&nombre_decendencia=$resultados->nombre_descendencia&
                      id_parentesco=$resultados->id_parentesco&descripcion=$resultados->descripcion&posee_decendencia=$resultados->posee_decendencia' name='update' id='update' class='glyphicon glyphicon-pencil btn btn-primary btn-xs update'></a></td>";
                  echo "</tr>";
              }
          ?>
        </tbody>
      </table>
    </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/validaciones.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
</body>
</html>
