
<!DOCTYPE html>
<html>
<head>
<title>SITT</title>
 <meta charset = "utf-8" />
  <link rel="stylesheet"  href="css/egresado.css">
   <link rel="stylesheet"  href="css/registros.css">
  <link type="text/css" rel="stylesheet" href="css/fontello.css" />
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
  <meta charset="utf-8">
</head>
<body>
<header>
  <div class="menu">
  <ul>
    <li><a href="RegistrosEgresados.php"><span class="icon-reply"></span> Atras</a></li>    
  </ul>
</div>
</header>
<form action="EditEgresado.php" method="POST" >
<div class="group"><br><br>
<h2>Editar Registros</h2><br><br>
<?php 
         $server = "localhost";
      $usuario = "root";
      $contraseña = "";
      $bd = "documento";
      //$id = $_POST['clave'];
        $n_control=$_GET['n_control'];
       //$nombre_carrera=$_GET['nombre_carrera'];
       
       $conexion = mysqli_connect($server, $usuario, $contraseña, $bd) or die ("error en la conexion");
     /* $consulta = mysqli_query($conexion, "SELECT egresado.n_control,egresado.nombre,egresado.apellido_paterno,egresado.apellido_materno,egresado.sexo,egresado.telefono,egresado.correo,documento.titulo,especialidad.nombre_especialidad from egresado,documento,jurado,especialidad where n_control='".$n_control."'") or die ("errror al traer datos"); */
     $consulta = mysqli_query($conexion, "SELECT egresado.n_control,egresado.nombre,egresado.apellido_paterno,egresado.apellido_materno,egresado.sexo,egresado.telefono,egresado.correo,documento.titulo,documento.folio,especialidad.idespecialidad,especialidad.nombre_especialidad from egresado,documento,especialidad where egresado.folio=documento.folio and especialidad.idespecialidad=egresado.idespecialidad and n_control='".$n_control."'" ) or die ("errror al traer datos");


 $extraido = mysqli_fetch_array($consulta);
         ?>
   
      <input readonly type="text" placeholder="Nombre" name="n_control" value="<?php echo $extraido['n_control']?>" required> <br/>
      <input type="text" placeholder="Nombre" name="nombre" value="<?php echo utf8_encode($extraido['nombre'])?>" required> <br/>
      <input type="text" placeholder="Apellido Paterno" name="apellido_paterno"  value=" <?php echo utf8_encode($extraido['apellido_paterno']) ?>" required> <br/>
      <input type="text" placeholder="Apellido Materno" name="apellido_materno" value="<?php echo utf8_encode($extraido['apellido_materno']) ?>" required> <br/>
          <input type="text" placeholder="Sexo" name="sexo" value="<?php echo $extraido['sexo'] ?>">
           <br>
     <input type="text" placeholder="Telefono" name="telefono" value="<?php echo $extraido['telefono'] ?>"> <br>
     <input type="text" placeholder="Correo" name="correo" value="<?php echo $extraido['correo'] ?>">
           <br>
         
          <select name="idespecialidad" >
          <option value="<?php echo $extraido['idespecialidad']?>"><?php echo $extraido['nombre_especialidad']?></option>
         <?php $row=$sql=$conexion->query("SELECT * from especialidad  "); 
        while ( $row=$sql->fetch_array()) {
         echo '<option value="'.$row[idespecialidad].'">'.utf8_encode($row[nombre_especialidad]).'</option>';
        }
         ?>
        </select>

        </select><br><br>
<select name="folio">
  <option value="<?php echo $extraido['folio']?>"><?php echo utf8_decode($extraido['titulo']) ?></option>
         <?php $row=$sql=$conexion->query("SELECT folio,titulo FROM documento"); 
        while ( $row=$sql->fetch_array()) {
         echo '<option value="'.$row[folio].'">'.utf8_encode($row[titulo]).'</option>';
        }
         ?>
        </select>
         <br/>
       <button type="submit" value="Guardar" name="btnRegistrar">Guardar</button>
       </form>
       </header>
</body>
</html>
 