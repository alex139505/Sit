 <?php
  //conectamos Con el servidor
  $conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
    echo "Conexion exitosa";
  //recuperar las variables
 $n_control=$_GET['n_control'];

  //hacemos la sentencia de sql
  $sql="DELETE  FROM egresado WHERE n_control='$n_control' ";

  //ejecutamos la sentencia de sql
  $ejecutar=mysqli_query($conectar,$sql);
  //verificamos la ejecucion
  if(!$ejecutar){
     header("location:RegistrosEgresados.php");
  }else{
     header("location:RegistrosEgresados.php");

  }
?>

