<?php
      $id_persona=$_POST['id_persona'];
      $nombres=$_POST['nombres'];
      $apellidos=$_POST['apellidos'];
      $sexo=$_POST['sexo'];
      $fecha_nacimiento=$_POST['fecha_nacimiento'];
      $foto=$_POST['fotos'];
      $condicionvida=$_POST['condicionvida'];
      $id_decendencia=$_POST['id_decendencia'];
      $id_parentesco=$_POST['id_parentesco'];
      $posee_decendencia=$_POST['posee_decendencia'];
      if ($nombres!="" && $apellidos!="" && $sexo!="" && $fecha_nacimiento!="" && $foto!="" && $condicionvida!="" && $id_decendencia!="" && $id_parentesco!="" && $posee_decendencia!="")
      {
            include("conexion.php");
            $conexion = $conn;
            $sql = "UPDATE registros_personales SET ".
                   "nombres='$nombres', ".
                   "apellidos='$apellidos', ".
                   "sexo='$sexo', ".
                   "fecha_nacimiento='$fecha_nacimiento', ".
                   "foto='$foto', ".
                   "estatus='$condicionvida', ".
                   "id_decendencia='$id_decendencia', ".
                   "posee_decendencia='$posee_decendencia' ".
                   "WHERE id_persona='$id_persona'";
            $result = pg_query($conexion,$sql);
      }
      header("Location:listar_personal.php");
?>
