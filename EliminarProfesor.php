 <?php
  //conectamos Con el servidor
  $conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
    echo "Conexion exitosa";
  //recuperar las variables
  
 $rfc=$_GET['rfc'];


  //hacemos la sentencia de sql
  $sql="DELETE  FROM profesor WHERE rfc='$rfc' ";

  //ejecutamos la sentencia de sql
  $ejecutar=mysqli_query($conectar,$sql);
  //verificamos la ejecucion
  if(!$ejecutar){
      header("location:RegistrosProfesor.php");
  }else{
  header("location:RegistrosProfesor.php");

  }
?>