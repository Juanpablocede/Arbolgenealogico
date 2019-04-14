<?php
      $nombres=$_GET['nombres'];
      $apellidos=$_GET['apellidos'];
      $sexo=$_GET['sexo'];
      $fecha_nacimiento=$_GET['fecha_nacimiento'];
      $foto=$_GET['fotos'];
      $condicionvida=$_GET['condicionvida'];
      $id_decendencia=$_GET['id_decendencia'];
      $id_parentesco=$_GET['id_parentesco'];
      $posee_decendencia=$_GET['posee_decendencia'];
      $telefonos=$_GET['telefonos'];
      $edocivil=$_GET['edocivil'];
      $lugar_nacimiento=$_GET['lugar_nacimiento'];
      $tiposangre=$_GET['tiposangre'];
      $correo=$_GET['correo'];
      $fecha_matri_civil=$_GET['fecha_matri_civil'];
      $fecha_matri_ecle=$_GET['fecha_matri_ecle'];
      $direccion=$_GET['direccion'];
      $lugar_matrimonio=$_GET['lugar_matrimonio'];
      $fecha_fallecimiento=$_GET['fecha_fallecimiento'];
      $lugar_fallecimiento=$_GET['lugar_fallecimiento'];
      $causa_fallecimiento=$_GET['causa_fallecimiento'];
      $lugar_sepultura=$_GET['lugar_sepultura'];
      if ($fecha_nacimiento=="")
      {
          $fecha_nacimiento='1900-01-01';
      }
      if ($fecha_matri_civil=="")
      {
          $fecha_matri_civil='1900-01-01';
      }
      if ($fecha_matri_ecle=="")
      {
          $fecha_matri_ecle='1900-01-01';
      }
      if ($fecha_fallecimiento=="")
      {
          $fecha_fallecimiento='1900-01-01';
      }
      if ($nombres!="" && $apellidos!="" && $sexo!="" && $fecha_nacimiento!="" && $condicionvida!="" && $id_decendencia!="" && $id_parentesco!="" && $posee_decendencia!="")
      {
            include("conexion.php");
            $conexion = $conn;
            //Ingreso del personal
            $sql = "INSERT INTO registros_personales (nombres,apellidos,sexo,fecha_nacimiento,lugar_nacimiento,foto,estatus,id_decendencia,id_parentesco,posee_decendencia,correo_electronico,direccion_actual,
            telefonos,tipo_sangre,estado_civil,fecha_matrimonio_civil,fecha_matrimonio_ecleciastico,lugar_matrimonio,fecha_fallecimiento,lugar_fallecimiento,causa_fallecimiento,lugar_sepultura)
            VALUES('$nombres','$apellidos','$sexo','$fecha_nacimiento','$lugar_nacimiento','$foto','$condicionvida','$id_decendencia','$id_parentesco','$posee_decendencia','$correo','$direccion',
            '$telefonos','$tiposangre','$edocivil','$fecha_matri_civil','$fecha_matri_ecle','$lugar_matrimonio','$fecha_fallecimiento','$lugar_fallecimiento','$causa_fallecimiento','$lugar_sepultura')";
            //echo $sql;die();
            $result = pg_query($conexion,$sql);
      }
      header("Location:formulario_ingresar_personal.php");
?>
