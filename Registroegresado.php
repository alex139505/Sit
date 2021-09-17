 <?php
  //conectamos Con el servidor
  $conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
    // echo "Conexion exitosa";
  //recuperar las variables
  
  $n_control=$_POST['n_control'];
  $nombre=$_POST['nombre'];
  $apellido_paterno=$_POST['apellido_paterno'];
  $apellido_materno=$_POST['apellido_materno'];
  $sexo=$_POST['sexo'];
  $telefono=$_POST['telefono'];
  $correo=$_POST['correo'];
  $idespecialidad=$_POST['idespecialidad'];
  $folio=$_POST['folio'];
 
  //hacemos la sentencia de sql
  // $sql="INSERT INTO egresado VALUES ('$n_control','$nombre','$apellido_paterno','$apellido_materno','$sexo','$telefono','$correo','$idespecialidad','$folio')";

  //ejecutamos la sentencia de sql
  // $ejecutar=mysqli_query($conectar,$sql);
  //verificamos la ejecucion
  // if(!$ejecutar){
   // header("location:RegistrosEgresados.php");
  // }else{
   // header("location:RegistrosEgresados.php");
  // }
  $q_admin = $conectar->query("SELECT * FROM `egresado` WHERE `n_control` = '$n_control'") or die(mysqli_error());
    $v_admin = $q_admin->num_rows;
    if($v_admin == 1){
      echo '
        <script type = "text/javascript">
          alert("El Egresado ya existe");
          window.location = "Egresado.php";
        </script>
      ';
    }else{
      $conectar->query("INSERT INTO egresado VALUES ('$n_control','$nombre','$apellido_paterno','$apellido_materno','$sexo','$telefono','$correo','$idespecialidad','$folio')") or die(mysqli_error());
      echo '
        <script type = "text/javascript">
          alert("Datos guardados exitosamente");
          window.location = "Egresado.php";
        </script>
      ';
    }
?>