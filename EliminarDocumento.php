 <?php
  //conectamos Con el servidor
  $conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
    echo "Conexion exitosa";
  //recuperar las variables
  
 $folio=$_GET['folio'];

  //hacemos la sentencia de sql
  $sql="DELETE  FROM documento WHERE folio='$folio' ";

  //ejecutamos la sentencia de sql
  $ejecutar=mysqli_query($conectar,$sql);
  //verificamos la ejecucion
  if(!$ejecutar){
    header("location:RegistrosDocumentos.php");
  }else{
 header("location:RegistrosDocumentos.php");

  }
?>