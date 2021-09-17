 <?php
  //conectamos Con el servidor
  $conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
    echo "Conexion exitosa";
  //recuperar las variables
  
 $idjurado=$_GET['idjurado'];

  //hacemos la sentencia de sql
  $sql="DELETE  FROM jurado WHERE idjurado='$idjurado' ";

  //ejecutamos la sentencia de sql
  $ejecutar=mysqli_query($conectar,$sql);
  //verificamos la ejecucion
  if(!$ejecutar){
       header("location:vistasjurado.php");
  }else{
        header("location:vistasjurado.php");

  }
?>
