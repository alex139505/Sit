 <?php
  //conectamos Con el servidor
  $conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
    // echo "Conexion exitosa";
  //recuperar las variables
  
  $clave=$_POST['clave'];
  $nombre_carrera=$_POST['nombre_carrera'];
  $plan_estudios=$_POST['plan_estudios'];
 
 
  //hacemos la sentencia de sql
  // $sql="INSERT INTO carrera VALUES ('$clave','$nombre_carrera','$plan_estudios')";

  //ejecutamos la sentencia de sql
  // $ejecutar=mysqli_query($conectar,$sql);
  //verificamos la ejecucion
  // if(!$ejecutar){
   // header("location:RegistrosCarrera.php");
  // }else{
    // header("location:RegistrosCarrera.php");

  // }
  $q_admin = $conectar->query("SELECT * FROM `carrera` WHERE `nombre_carrera` = '$nombre_carrera'") or die(mysqli_error());
    $v_admin = $q_admin->num_rows;
    if($v_admin == 1){
      echo '
        <script type = "text/javascript">
          alert("El nombre de la carrera ya existe");
          window.location = "Carrera.html";
        </script>
      ';
    }else{
      $conectar->query("INSERT INTO carrera VALUES ('$clave','$nombre_carrera','$plan_estudios')") or die(mysqli_error());
      echo '
        <script type = "text/javascript">
          alert("Datos guardados exitosamente");
          window.location = "Carrera.html";
        </script>
      ';
    }
  
?>