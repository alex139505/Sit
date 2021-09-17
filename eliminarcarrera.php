 <?php
  //conectamos Con el servidor
  $conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
    echo "Conexion exitosa";
  //recuperar las variables
  if (isset($_GET['clave'])) 
    {
  $clave=$_GET['clave'];

  //hacemos la sentencia de sql
  $sql="DELETE  FROM carrera WHERE clave='$clave' ";

  //ejecutamos la sentencia de sql
  $ejecutar=mysqli_query($conectar,$sql);
  //verificamos la ejecucion
  if(!$ejecutar){
   header("location:RegistrosCarrera.php");
   // echo "<script>alert('Mensaje 2')</script>";
 }
  else{
    
     // $_SESSION["mensaje_texto"] = "Error al eliminar el registro." .
            // mysqli_errno($ejecutar) . " " . mysqli_error($ejecutar);

    header("location:RegistrosCarrera.php");

  }
}
?>

