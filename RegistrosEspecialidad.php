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
<li><a href="Especialidad.php" ><span class="icon-user-plus"> Nuevo</a></li>
<li><a href="Reporte-especialidad.php"><span class='icon-download'></span> Descargar</a>
    </ul>
  </div><br>
</head>
<body>  
  <center><h2>Lista de Especialidades</h2></center><br> 

 <table>
  <tr>
    <th width="10%">id</th>
    <th width="50%">Nombre Especialidad</th>
    <th width="10%">Clave</th>
    <th width="30%">Accion</th>
       </tr>
<?php
    $server = "localhost";
      $usuario = "root";
      $contraseña = "";
      $bd = "documento";

      $conexion = mysqli_connect($server, $usuario, $contraseña, $bd) or die ("error en la conexion");
      $consulta = mysqli_query($conexion, "SELECT *from especialidad") or die ("errror al traer datos");


      while ($extraido = mysqli_fetch_array($consulta))
      {
      	echo '<tr>';
        echo '<td>'.$extraido['idespecialidad'];
      	echo '<td>'.$extraido['nombre_especialidad'];
      	echo '<td >'.$extraido['clave'];
        echo "<td><a href='ActualizarEspecialidad.php?idespecialidad=".$extraido['idespecialidad']."'><span class='icon-pencil'>Editar</a> ";
      	 ?>
       <a href="EliminarEspecialidad.php?idespecialidad=<?php echo $extraido['idespecialidad'];?>" onclick="return confirm('Deseas eliminar este registro del sistema?');"><span class='icon-trash'>Eliminar</a></td>
       <?php 
      echo '</tr>';
      }
        mysqli_close($conexion);
        echo'</table></br>';
   ?>
      </body>
</html>