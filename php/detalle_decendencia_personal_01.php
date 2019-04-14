<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="../css/hoja_estilo.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/estilos_proyecto.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    !-->

</head>

<body>
  <?php
      $id_persona=$_GET['id_persona'];
      $nombres=$_GET['nombres'];
      $apellidos=$_GET['apellidos'];
      $foto=$_GET['foto'];
      $id_persona_antes=$_GET['id_persona_antes'];
      $nombres_antes=$_GET['nombres_antes'];
      $apellidos_antes=$_GET['apellidos_antes'];
      $foto_antes=$_GET['foto_antes'];
  ?>
  <div class="container card-table">
    <div class="row w-100 py-5 titulo_lista mb-4">
      <div class="col-8 float-center">
          <h2><p class="nombre_persona"> <?php echo $nombres.' '.$apellidos; ?><p></h2>
      </div>
      <div class="col-2 justify-content-end">
        <a><img class="foto" src="../imagenes/<?php echo $foto; ?>"></a>
      </div>
      <div class="col-2 justify-content-end">
          <?php
            //<a href="listar_personal.php"><img class="salir"src="../imagenes/salir.png"></a>
            echo "<a href='../php/detalle_decendencia.php?id_persona=$id_persona_antes&nombres=$nombres_antes&apellidos=$apellidos_antes&foto=$foto_antes'><img class='salir' src='../imagenes/salir.png'></a>"
            //echo "<a href='../php/detalle_decendencia.php?id_persona=$id_persona_antes&nombres=$nombres_antes&apellidos=$apellidos_antes&foto=$foto_antes' class='form-control btn btn-primary' name='salir' id='salir'>Salir</a>"
          ?>
      </div>
    </div>
    <div class="row">
        <table class="table flex-table table-hover" align="center">
          <thead>
              <tr class="primerafila">
                <th scope="col" class="d-none">Id_persona</th>
                <th scope="col" class="col-2">Nombres</th>
                <th scope="col" class="col-2">Apellidos</th>
                <th scope="col" class="col-1">Fecha de Nacimiento</th>
                <th scope="col" class="col-1">Foto</th>
                <th scope="col" class="col-1">Parentesco</th>
                <th scope="col" class="sin col-1">&nbsp;</th>
              </tr>
          </thead>
          <tbody>
          <?php
              include("conexion.php");
              $conexion = $conn;
              $sql = "SELECT ".
                        "registros_personales.id_persona, ".
                        "TRIM(registros_personales.nombres) AS nombres, ".
                        "TRIM(registros_personales.apellidos) AS apellidos, ".
                        "registros_personales.fecha_nacimiento, ".
                        "TRIM(registros_personales.foto) AS foto, ".
                        "registros_parentescos.descripcion ".
                      "FROM ".
                        "registros_personales ".
                        "INNER JOIN registros_parentescos ON registros_parentescos.id_parentesco = registros_personales.id_parentesco ".
                      "WHERE ".
                         "registros_personales.id_decendencia=$id_persona ".
                      "ORDER BY ".
                         "registros_personales.id_persona;";
              $resultado = pg_query($conexion,$sql);
              while($resultados = pg_fetch_object($resultado))
              {
                echo "<tr>";
                      echo "<td class='ocultar'>".$resultados->id_persona."</td>";
                      echo "<td>".$resultados->nombres."</td>";
                      echo "<td>".$resultados->apellidos."</td>";
                      echo "<td>".$resultados->fecha_nacimiento."</td>";
                      echo "<td><a href='detalle_decendencia_personal_02.php?id_persona=$resultados->id_persona&id_persona_antes=$id_persona&nombres_antes=$nombres&apellidos_antes=$apellidos&foto_antes=$foto'><img class='foto_tabla' src='../imagenes/$resultados->foto'>"."</a></td>";
                      echo "<td>".$resultados->descripcion."</td>";
                      echo "<td><a href='detalle_decendencia_personal_01.php?id_persona=$resultados->id_persona&nombres=$resultados->nombres&apellidos=$resultados->apellidos&foto=$resultados->foto&
                      &id_persona_antes=$id_persona&nombres_antes=$nombres&apellidos_antes=$apellidos&foto_antes=$foto'><img class='foto_tabla' src='../imagenes/arbol.jpg'>"."</a></td>";
                  echo "</tr>";
              }

          ?>
        </tbody>
      </table>
    </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<!--<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>!-->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/validaciones.js"></script>
<!--<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>!-->
</body>
</html>
