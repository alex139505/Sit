 <?php
  //conectamos Con el servidor
  $conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
    echo "Conexion exitosa";
  //recuperar las variables
  
 $idusuario=$_GET['idusuario'];


  //hacemos la sentencia de sql
  $sql="DELETE  FROM usuario WHERE idusuario='$idusuario' ";

  //ejecutamos la sentencia de sql
  $ejecutar=mysqli_query($conectar,$sql);
  //verificamos la ejecucion
  if(!$ejecutar){
      header("location:RegistrosUsuarios.php");
  }else{
  header("location:RegistrosUsuarios.php");

  }
?>