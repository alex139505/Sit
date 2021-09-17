<?php
  //conectamos Con el servidor
$server = "localhost";
$usuario = "root";
$contraseña = "";
$bd = "documento";
$conexion = mysqli_connect($server, $usuario, $contraseña, $bd) or die ("error en la conexion");
     // echo "Conexion exitosa";
  //recuperar las variables

//$sql = "UPDATE `usuario` SET `clave` = \'rugal989\' WHERE `usuario`.`idusuario` = 2";
$clave=$_POST['clave'];   
    	mysqli_query($conexion,"UPDATE `usuario` set `clave` ='$clave' Where `usuario`.`idusuario`= '$idusuario'") or die(mysqli_error());
    	mysqli_close($conexion);
      echo '
        <script type = "text/javascript">
          alert("Los datos se han guardado correctamente");
          window.location = "CambiarContraseña.php";
        </script> 
      ';
  
?>