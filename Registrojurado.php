   <?php
  //conectamos Con el servidor
  $conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
    // echo "Conexion exitosa";
  //recuperar las variables
      
  $Presidente=$_POST['Presidente'];
  $Secretario=$_POST['Secretario'];
  $Vocal=$_POST['Vocal'];


  
  //hacemos la sentencia de sql
  // $sql="INSERT INTO jurado VALUES ('','$Presidente','$Secretario','$Vocal')";

  //ejecutamos la sentencia de sql
  // $ejecutar=mysqli_query($conectar,$sql);
  //verificamos la ejecucion
  // if(!$ejecutar){
     // header("location:vistasjurado.php");
  // }else{
      // header("location:vistasjurado.php");
  // }
  $q_admin = $conectar->query("SELECT * FROM `jurado` WHERE `Presidente` = '$Presidente'") or die(mysqli_error());
    $v_admin = $q_admin->num_rows;
    if($v_admin == 1){
      echo '
        <script type = "text/javascript">
          alert("Este jurado ya existe");
          window.location = "Jurado.php";
        </script>
      ';
    }else{
      $conectar->query("INSERT INTO jurado VALUES ('','$Presidente','$Secretario','$Vocal')") or die(mysqli_error());
      echo '
        <script type = "text/javascript">
          alert("Datos guardados exitosamente");
          window.location = "Jurado.php";
        </script>
      ';
    }
?>