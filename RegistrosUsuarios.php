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
      <li><a href="nuevo.php"><span class="icon-user-plus"> Nuevo</a></li>
    </ul>
  </div><br>
</head>
<body>  
 <center> <h2>Lista de Usuarios</h2></center> <br>
<table >
  <tr >
    <th >Nombre de Usuario</th>
    <th>Correo</th>
    <th>Passowrd</th>
    <th>Rol</th>
    <th>Accion</th>
  </tr>
<?php
    $server = "localhost";
      $usuario = "root";
      $contraseña = "";
      $bd = "documento";

      $conexion = mysqli_connect($server, $usuario, $contraseña, $bd) or die ("error en la conexion");
      $consulta = mysqli_query($conexion, "SELECT usuario.idusuario,usuario.usuario,usuario.e_mail,usuario.clave,usuario.idrol,roles.idrol,roles.rol from usuario,roles where usuario.idrol=roles.idrol") or die ("errror al traer datos");

  

      while ($extraido = mysqli_fetch_array($consulta))
      {
      echo '<tr><center>';
      echo '<td>'.$extraido['usuario'];
      echo '<td>'.$extraido['e_mail'];
      echo '<td>'.$extraido['clave'];
      echo '<td>'.$extraido['rol'];
      echo "<td><a href='ActualizarUsuario.php?idusuario=".$extraido['idusuario']."'><span class='icon-pencil'>Editar</a> ";
     ?>
       <a href="EliminarUsuario.php?idusuario=<?php echo $extraido['idusuario'];?>" onclick="return confirm('Deseas eliminar este registro del sistema?');"><span class='icon-trash'>Eliminar</a></td>
       <?php 
      echo '</tr>';
      }
        mysqli_close($conexion);
        echo'</table, center>';
       
   ?>
  
   </body>
 
   <!-- <a href='EliminarCarrera.php?clave=".$extraido['clave']."onclick="return confirm('Deseas eliminar este registro del sistema?');"'><span class='icon-trash'>Eliminar</a> -->
</html>
