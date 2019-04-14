<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>

</head>

<body>
  <?php
      $id_persona=$_GET['id_persona'];

      include("conexion.php");
      $conexion = $conn;
      $sql = "DELETE FROM registros_personales WHERE id_persona='$id_persona'";
  		$result = pg_query($conexion,$sql);
      header("Location:listar_personal.php");
  ?>
</body>
</html>
