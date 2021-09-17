
<!DOCTYPE html>
<html>
<head>
	<title>Actualizar</title>
   <meta charset = "utf-8" />
</head>
<body>
     <?php
      require('Conexion.php');

       $idjurado = $_POST['idjurado'];
   $Presidente = $_POST['Presidente'];
   $Secretario = $_POST['Secretario'];
   $vocal = $_POST['vocal'];

mysqli_query($conexion, "UPDATE jurado set Presidente='$Presidente',  Secretario='$Secretario', vocal='$vocal'  where idjurado='$idjurado'") or die ("Error al insertar los registros");
   
      mysqli_close($conexion);
      header("location:vistasjurado.php");
  ?>
</body>
</html>      