
<!DOCTYPE html>
<html>
<head>
<title>SITT</title>
<link rel="stylesheet" href="css/style.css">
<link type="text/css" rel="stylesheet" href="css/fontello.css" />
   <link rel="stylesheet"  href="css/registros.css">
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
   <meta charset = "utf-8" />
</head>
<header>
  <div class="menu">
  <ul>
    <li><a href="Consultar1.1.php"><span class="icon-reply"></span> Atras</a></li>    
  </ul>
</div>
</header>
<body>

<center><h2>Lista de Egresados</h2></center><br>
<table align=center border=2>
  <tr>
 <th>Nombre del Egresado</th>
    <th>Titulo de Documento</th>
    <th>Fecha de Examen</th>
    <th>Año</th>
    <th>Periodo</th>
    <th>Carrera</th>
    <th>Especialidad</th>
    <th>Presidente</th>
    <th>Secretario</th>
    <th>Vocal</th>
  <tr>
<?php
  //conectamos Con el servidor
  $conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
    echo "";

    $carrera=$_POST['carrera'];
    $especialidad=$_POST['especialidad'];
    $periodo=$_POST['periodo'];
    $old=$_POST['old'];
    $tipo_documento=$_POST['tipo_documento'];

    $result=("SELECT concat( egresado.nombre, ' ', egresado.apellido_paterno, ' ', egresado.apellido_materno ) AS NombreAlumno, titulo, fechaexamen, old, periodo, nombre_carrera, nombre_especialidad, concat( Presi.nombre_profesor, ' ', Presi.apellido_paterno, ' ', Presi.apellido_materno ) AS Presidente, concat( Secre.nombre_profesor, ' ', Secre.apellido_paterno, ' ', Secre.apellido_materno ) AS Secretario, concat( Voc.nombre_profesor, ' ', Voc.apellido_paterno, ' ', Voc.apellido_materno ) AS vocal FROM egresado, documento, especialidad, carrera, jurado, profesor Presi, profesor Secre, profesor Voc WHERE documento.folio = egresado.folio AND egresado.idespecialidad = especialidad.idespecialidad AND especialidad.clave = carrera.clave AND carrera.nombre_carrera LIKE'%$carrera%' AND especialidad.nombre_especialidad LIKE '%$especialidad%' AND documento.periodo LIKE'%$periodo%' AND documento.old LIKE'%$old%' AND documento.tipo_documento LIKE '%$tipo_documento%' AND documento.idjurado = jurado.idjurado AND jurado.Presidente = Presi.rfc AND jurado.Secretario = Secre.rfc AND jurado.Vocal = Voc.rfc");

$ejecutar=mysqli_query($conectar, $result);
    
    while ($registro=mysqli_fetch_ROW($ejecutar)) {
      echo "<tr>
         <td align='center'>".utf8_encode($registro[0])."</td>
         <td>".utf8_encode($registro[1])."</td>
         <td>".$registro[2]."</td>
         <td>".$registro[3]."</td>
         <td>".$registro[4]."</td>
          <td>".$registro[5]."</td>
           <td>".$registro[6]."</td>
            <td>".$registro[7]."</td>
             <td>".$registro[8]."</td>
              <td>".$registro[9]."</td>
          <tr/>";

}
        echo "</table><center>";
    
?>
</br>
<form action="Resultado1.1.php" method="GET">
<button type="button" value="Descargar" onclick="location.href='Reporte1.php?carrera=<?php echo $carrera ?>&& especialidad=<?php echo $especialidad ?>&&periodo=<?php echo $periodo?>&&old=<?php echo $old?>&&tipo_documento=<?php echo $tipo_documento ?>'"><span class='icon-download'>Descargar </button>
</body>
</html>
