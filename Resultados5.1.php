
<!DOCTYPE html>
<html lang="es-mx">
<head>
<title>SITT</title>
 <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
 <link rel="stylesheet" href="css/style.css">
 <link type="text/css" rel="stylesheet" href="css/fontello.css" />
   <link rel="stylesheet"  href="css/registros.css">
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
  <header>
     <div class="menu">
        <ul>
          <li><a href="Consultar5.php"><span class="icon-reply"> Atras</a></li>
           </ul>
     </div>
</head>
<body>
<h2>Lista de Egresados</h2>
<center><table border="none" height="30" width ="600"></center>
    <tr >
    <th>Nombre del Egresado</th>
    <th>Titulo de Documento</th>
    <th>Tipo de Documento</th>
    <th>Fecha de Examen</th>
    <th>Año</th>
    <th>Periodo</th>
    <th>Carrera</th>
    <th>Especialidad</th>
    <th>Presidente</th>
    <th>Secretario</th>
    <th>Vocal</th>
    </tr>
<?php 

  //conectamos Con el servidor
  $conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
$tipo_documento=$_POST['tipo_documento'];
  $result4 =("SELECT concat( egresado.nombre, ' ', egresado.apellido_paterno, ' ', egresado.apellido_materno ) AS NombreAlumno, titulo, tipo_documento, fechaexamen, old, periodo, nombre_carrera, nombre_especialidad, concat( Presi.nombre_profesor, ' ', Presi.apellido_paterno, ' ', Presi.apellido_materno ) AS Presidente, concat( Secre.nombre_profesor, ' ', Secre.apellido_paterno, ' ', Secre.apellido_materno ) AS Secretario, concat( Voc.nombre_profesor, ' ', Voc.apellido_paterno, ' ', Voc.apellido_materno ) AS vocal
FROM egresado, documento, especialidad, carrera, jurado, profesor Presi, profesor Secre, profesor Voc
WHERE documento.folio = egresado.folio
AND egresado.idespecialidad = especialidad.idespecialidad
AND especialidad.clave = carrera.clave
AND documento.tipo_documento LIKE '%$tipo_documento%'
AND documento.idjurado = jurado.idjurado
AND jurado.Presidente = Presi.rfc
AND jurado.Secretario = Secre.rfc
AND jurado.Vocal = Voc.rfc");
;
     $ejecutar=mysqli_query($conectar,$result4);
    while ($registro= mysqli_fetch_row($ejecutar)) {
      echo "<tr>";
      foreach ($registro as $ultimo) {
                echo "<td>",utf8_encode($ultimo),"</td>";
      }
    }
echo "</table>";
?>
<br>
<form action="Resultado5.php" method="GET">
<center><button type="button" value="Descargar" onclick="location.href='Reporte6.php?tipo_documento=<?php echo $tipo_documento?>'"><span class='icon-download'>Descargar </button></center>
</body>
</html>