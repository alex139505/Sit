<!DOCTYPE html>
<html>
<head>
<title>Actualizar</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
require('conexion.php');
$idusuario=$_POST['idusuario'];
$usuario=$_POST['usuario'];
$e_mail=$_POST['e_mail'];
$clave=$_POST['clave']; 
$idrol=$_POST['idrol']; 
mysqli_query($conexion, "UPDATE usuario set usuario='$usuario', e_mail='$e_mail',clave='$clave', idrol='$idrol' where idusuario='$idusuario'");


      mysqli_close($conexion);

     header("location:RegistrosUsuarios.php");
  ?>
</body>
</html>      