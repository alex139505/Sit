 <?php
  //conectamos Con el servidor
  $conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
    echo "Conexion exitosa";
  //recuperar las variables
  
 $idespecialidad=$_GET['idespecialidad'];

  //hacemos la sentencia de sql
  $sql="DELETE  FROM especialidad WHERE idespecialidad='$idespecialidad' ";

  //ejecutamos la sentencia de sql
  $ejecutar=mysqli_query($conectar,$sql);
  //verificamos la ejecucion
  if(!$ejecutar){
   header("location:RegistrosEspecialidad.php");
  }else{
     header("location:RegistrosEspecialidad.php");

  }
?>
