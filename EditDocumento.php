<!DOCTYPE html>
<html>
<head>
<title>Actualizar</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
require('conexion.php');
  $folio=$_POST['folio'];
  $titulo=$_POST['titulo'];
  $old=$_POST['old'];
  $periodo=$_POST['periodo'];
  $fechaexamen=$_POST['fechaexamen'];
  $nivel_escolar=$_POST['nivel_escolar'];
  $tipo_documento=$_POST['tipo_documento'];
  $idjurado=$_POST['idjurado'];

  

/*mysqli_query($conexion, "UPDATE documento SET titulo='$titulo', old='$old', periodo='$periodo', fechaexamen='$fechaexamen', nivel_escolar='$nivel_escolar', tipo_documento='$tipo_documento', idjurado='$idjurado' WHERE folio='$folio'") or die ("Error al insertar los registros");*/

/*mysqli_query($conexion, "UPDATE documento SET titulo='$titulo', old='$old', periodo='$periodo', fechaexamen='$fechaexamen', nivel_escolar='$nivel_escolar', tipo_documento='$tipo_documento' WHERE folio='$folio'") or die ("Error al insertar los registros");*/

mysqli_query($conexion, "UPDATE documento SET  titulo='$titulo', old='$old', periodo='$periodo', fechaexamen='$fechaexamen', nivel_escolar='$nivel_escolar',tipo_documento='$tipo_documento', idjurado='$idjurado' WHERE folio = '$folio'");
 

      mysqli_close($conexion);

     header("location:RegistrosDocumentos.php");
  ?>
</body>
</html>      