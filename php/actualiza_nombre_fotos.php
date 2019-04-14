<?php
      include("conexion.php");
      $conexion = $conn;
      //Asignandole nombre al campo foto
      $sql = "UPDATE registros_personales SET foto=(select(regexp_split_to_array(lower(trim(registros_personales.nombres)),E'\\s+'))[1] as x limit 1)||
      (select(regexp_split_to_array(lower(trim(registros_personales.nombres)),E'\\s+'))[2] as x limit 1)
      ||id_persona||'.jpg';";
      $result = pg_query($conexion,$sql);
      header("Location:listar_personal.php");
?>
