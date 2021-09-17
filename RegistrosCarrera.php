<!DOCTYPE html>
<html>
<head>
<title>SITT</title>
   <meta charset = "utf-8" />
   <link rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/fontello.css" />
   <link rel="stylesheet"  href="css/registros.css">
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
  <header>
  <div class="menu">
    <ul>
<li><a href="Principal.php"><span class="icon-reply"></span> Atras</a></li>      
<li><a href="Carrera.html"><span class="icon-user-plus"> Nuevo</a></li>
<li><a href="Reporte-carrera.php"><span class='icon-download'></span> Descargar</a></li>
      
    </ul>
  </div><br>
</head>
<body>  
 <center> <h2>Lista de Carreras</h2></center> <br>
<table >
  <tr >
    <th >Clave</th>
    <th>Nombre Carrera</th>
    <th >Plan de Estudios</th>
    <th>Accion</th>
  </tr>
<?php
    $server = "localhost";
      $usuario = "root";
      $contraseña = "";
      $bd = "documento";

      $conexion = mysqli_connect($server, $usuario, $contraseña, $bd) or die ("error en la conexion");
      $consulta = mysqli_query($conexion, "SELECT *from carrera") or die ("errror al traer datos");

  

      while ($extraido = mysqli_fetch_array($consulta))
      {
      echo '<tr><center>';
      echo '<td>'.$extraido['clave'];
      echo '<td>'.$extraido['nombre_carrera'];
      echo '<td>'.$extraido['plan_estudios'];
      echo "<td><a href='Edit.php?clave=".$extraido['clave']."'><span class='icon-pencil'>Editar</a>
      ";
       ?>
       <a href="EliminarCarrera.php?clave=<?php echo $extraido['clave'];?>" onclick="return confirm('Deseas eliminar este registro del sistema?');"><span class='icon-trash'>Eliminar</a></td>
       <?php 
      echo '</tr>';
      }
        mysqli_close($conexion);
        echo'</table, center>';
       
   ?>
  
   </body>
 
   <!-- <a href='EliminarCarrera.php?clave=".$extraido['clave']."onclick="return confirm('Deseas eliminar este registro del sistema?');"'><span class='icon-trash'>Eliminar</a> -->
</html>