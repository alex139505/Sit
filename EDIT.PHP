
<!DOCTYPE html>
<html lang ="es">
<head>
<title>SITT</title>
 <meta charset = "utf-8" />
	<link rel="stylesheet"  href="css/REG.css">
   <link rel="stylesheet"  href="css/registros.css">
   <link rel="stylesheet" href="css/cal.css">
 <link type="text/css" rel="stylesheet" href="css/fontello.css" />
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
</head>
<body>
  <header>
   <div class="menu">
     <ul>
      <li><a href="RegistrosCarrera.php"><span class="icon-reply"></span> Atras</a></li>     
   </ul>
</div>
<div class="group">  
     <form action="ActualizarCarrera.php" method="POST" ><br><br>
      <h2>Editar Registros</h2><br><br>
      <?php 
         $server = "localhost";
      $usuario = "root";
      $contraseña = "";
      $bd = "documento";
      //$id = $_POST['clave'];
        $clave=$_GET['clave'];
       //$nombre_carrera=$_GET['nombre_carrera'];
       
       $conexion = mysqli_connect($server, $usuario, $contraseña, $bd) or die ("error en la conexion");
      $consulta = mysqli_query($conexion, "SELECT *from carrera where clave='".$clave."'") or die ("errror al traer datos");


 $extraido = mysqli_fetch_array($consulta);
      
     
      //echo '<td>'.$extraido['clave'];
      //echo '<td>'.$extraido['nombre_carrera'];
      //echo '<td>'.$extraido['plan_estudios'];
      
      
        ?>
      <input readonly type="text" placeholder="nombre_carrera" name="clave" value="<?php echo $extraido['clave'] ?>" required> <br/>  
      <input type="text" placeholder="nombre_carrera" name="nombre_carrera" value="<?php echo $extraido['nombre_carrera'] ?>" required> <br/>
       <input type="text" placeholder="plan_estudios" name="plan_estudios" value="<?php echo $extraido['plan_estudios'] ?>" required ><br/>
       <input type="submit" value="Guardar" name="btnGuardar">
       </form>
<?php

mysqli_close($conexion);
        echo'</table, center>';
       
   ?>

      </div>
</body>
</html>

  

