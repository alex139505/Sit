<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Actualizar</title>
    <link rel="stylesheet"  href="css/registros.css">
  <link type="text/css" rel="stylesheet" href="css/fontello.css" />
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
	  <meta charset = "utf-8" />
</head>
<body>
     <?php
      require('conexion.php');

  $idespecialidad=$_POST['idespecialidad'];    
  $nombre_especialidad=$_POST['nombre_especialidad'];
  $clave=$_POST['clave'];

mysqli_query($conexion, "UPDATE especialidad set nombre_especialidad='$nombre_especialidad',  clave='$clave' where idespecialidad='$idespecialidad'");
   
      mysqli_close($conexion);
    header("location:RegistrosEspecialidad.php");
  ?>
</body>
</html>      