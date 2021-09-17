<!DOCTYPE html>
<html>
<head>
	<title>Actualizar</title>
	 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
     <?php
      require('conexion.php');
$rfc=$_POST['rfc'];
$nombre_profesor=$_POST['nombre_profesor'];
$apellido_paterno=$_POST['apellido_paterno'];
$apellido_materno=$_POST['apellido_materno'];
$sexo=$_POST['sexo'];
$grado_academico=$_POST['grado_academico'];
$curp=$_POST['curp'];
$correo=$_POST['correo'];

mysqli_query($conexion, "UPDATE profesor set  nombre_profesor=' $nombre_profesor', apellido_paterno=' $apellido_paterno', apellido_materno=' $apellido_materno', sexo='$sexo', grado_academico='$grado_academico', curp='$curp', correo='$correo' where rfc='$rfc'") or die ("Error al insertar los registros");
   
      mysqli_close($conexion);
    header("location:RegistrosProfesor.php");
  ?>
</body>
</html>      