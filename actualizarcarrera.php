<!DOCTYPE html>
<html>
<head>
	<title></title>
 <meta charset = "utf-8" />
</head>
<body>
<?php
  //conectamos Con el servidor
$server = "localhost";
$usuario = "root";
$contraseña = "";
$bd = "documento";
$conexion = mysqli_connect($server, $usuario, $contraseña, $bd) or die ("error en la conexion");

     
  //recuperar las variables
  
$clave=$_REQUEST['clave'];
$nombre_carrera=$_REQUEST['nombre_carrera'];
$plan_estudios=$_REQUEST['plan_estudios'];
 
  //hacemos la sentencia de sql

mysqli_query($conexion,"UPDATE carrera set nombre_carrera='$nombre_carrera',plan_estudios='$plan_estudios' where clave='$clave'") or die ("Error al Actualizar los registros");
   
mysqli_close($conexion);
header("location:RegistrosCarrera.php");
?>
</body>
</html>