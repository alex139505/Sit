
<!DOCTYPE html>
<html>
<head>
  <title>SITT</title>
 <meta charset = "utf-8" />
  <link rel="stylesheet"  href="css/profesor.css">
   <link rel="stylesheet"  href="css/registros.css">
    <link type="text/css" rel="stylesheet" href="css/fontello.css" />
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
  <meta charset="utf-8">
</head>
<body>
<header>
  <div class="menu">
  <ul>
    <li><a href="RegistrosProfesor.php"><span class="icon-reply"></span> Atras</a></li>    
  </ul>
</div>
</header>
<form action="EditProfesor.php" method="POST" >
<div class="group"><br><br>
<h2>Editar Registros</h2><br><br>
<?php 
         $server = "localhost";
      $usuario = "root";
      $contraseña = "";
      $bd = "documento";
      //$id = $_POST['clave'];
      $rfc=$_GET['rfc'];
       //$nombre_carrera=$_GET['nombre_carrera'];
       
       $conexion = mysqli_connect($server, $usuario, $contraseña, $bd) or die ("error en la conexion");
      $consulta = mysqli_query($conexion, "SELECT *from profesor where rfc='".$rfc."'") or die ("errror al traer datos");


 $extraido = mysqli_fetch_array($consulta);
         ?>
   
      <input readonly type="text" placeholder="Nombre" name="rfc" value="<?php echo $extraido['rfc']?>" required> <br/>
      <input type="text" placeholder="Nombre" name="nombre_profesor" value="<?php echo $extraido['nombre_profesor']?>" required> <br/>
      <input type="text" placeholder="Apellido Paterno" name="apellido_paterno"  value="<?php echo $extraido['apellido_paterno'] ?>" required> <br/>
      <input type="text" placeholder="Apellido Materno" name="apellido_materno" value="<?php echo $extraido['apellido_materno'] ?>" required> <br/>
      <input type="text" placeholder="Sexo" name="sexo" value="<?php echo $extraido['sexo'] ?>">
           <br>
      <input type="text" placeholder="correo" name="grado_academico" value="<?php echo $extraido['grado_academico'] ?>" required> <br/>
      <input type="text" placeholder="CURP" name="curp" value="<?php echo $extraido['curp'] ?>" required> <br/>
        <input type="text" placeholder="correo" name="correo" value="<?php echo $extraido['correo'] ?>" required> <br/>
       <button  type="submit" value="Guardar" name="btnRegistrar">Guardar</button>
         
         </form>
         <?php 
mysqli_close($conexion);
        echo'</table, center>';
          ?>
       </header>
</body>
</html>