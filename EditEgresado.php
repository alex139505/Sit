<!DOCTYPE html>
<html>
<head>
  <title>Actualizar</title>
   <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
     <?php

      //$id = $_POST['clave'];
        
      require('conexion.php');
$n_control=$_POST['n_control'];
$nombre=$_POST['nombre'];
$apellido_paterno=$_POST['apellido_paterno'];
$apellido_materno=$_POST['apellido_materno'];
$sexo=$_POST['sexo'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$idespecialidad=$_POST['idespecialidad'];
$folio=$_POST['folio'];


// mysqli_query($conexion, "UPDATE egresado set  nombre=' $nombre', apellido_paterno=' $apellido_paterno', apellido_materno=' $apellido_materno', sexo='$sexo', telefono='$telefono', correo='$correo' where n_control='$n_control'") or die ("Error al insertar los registros");

// mysqli_query($conexion2, "UPDATE especialidad set  nombre_especialidad=' $idespecialidad'") or die ("Error al insertar los registros");

mysqli_query($conexion, "UPDATE egresado SET nombre = '$nombre', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', sexo = '$sexo', telefono = '$telefono', correo = '$correo', idespecialidad = '$idespecialidad',folio='$folio' WHERE n_control = '$n_control'");
   /*mysqli_query($conexion, "UPDATE egresado
        INNER JOIN especialidad ON   egresado.idespecialidad = especialidad.idespecialidad
         INNER JOIN documento ON  egresado.folio = documento.folio 
        SET egresado.nombre='$nombre', egresado.apellido_paterno='$apellido_paterno', egresado.apellido_materno='$apellido_materno', egresado.sexo='$sexo', egresado.telefono='$telefono', egresado.correo='$correo', especialidad.idespecialidad='$idespecialidad', documento.folio='$folio'  
        WHERE egresado.n_control = '$n_control'");*/

      
      // mysqli_query($conexion, "UPDATE documento SET titulo = '$titulo' WHERE folio = '$folio'");
      mysqli_close($conexion);


     header("location:RegistrosEgresados.php");
  ?>
</body>
</html>         