<!DOCTYPE html>
<html>
<head>
	<title>SITT</title>
<meta charset = "utf-8" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet"  href="css/registros.css">
<link type="text/css" rel="stylesheet" href="css/fontello.css" />
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
</head>
<body>
	<header>
   <div class="menu">
     <ul>
      <li><a href="Buscar1.php"><span class="icon-reply"></span> Atras</a></li>    
        
   </ul>
</div>
<center><h1>Resultados</h1></center>
<table>
	<tr>
		<th>Nombre</th>
		<th>Titulo de Documento</th>
		<th>Fecha de Examen</th>
		<th>Carrera</th>
		<th>Especialidad</th>
		<th>Presidente</th>
		<th>Secretario</th>
		<th>Vocal</th>
	</tr>
<?php
$conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
$nombre=$_POST['nombre'];
 
$consul =("SELECT * FROM buscar WHERE nombre LIKE '%$nombre%' OR Presidente like '%$nombre%'OR Secretario like '%$nombre%'OR Vocal like '%$nombre%' ORDER BY  buscar.nombre ASC");
   
    $consulta=mysqli_query($conectar,$consul);
         while ($registro= mysqli_fetch_row($consulta)) {
      echo "<tr>";
      foreach ($registro as $ultimo) {
                echo "<td>",utf8_encode($ultimo),"</td>";         
      }
    }
        echo "</table><center>";
      /*Sector de Paginacion */

//$nombre="ggggg";
//echo "<a href='Reporte_Buscar.php?
//nombre=$nombre'>ffffff</a>";

?>
</br>
</br>
<form action="Buscadores.php" method="GET">
<center><button type="button" value="Descargar" onclick="location.href='Reporte_Buscar.php?nombre=<?php echo $nombre ?>'">Descargar </button></center>
</body>
</html>
