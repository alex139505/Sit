 <?php
  //conectamos Con el servidor
  $conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
    // echo "Conexion exitosa";
  //recuperar las variables

   $idespecialidad=$_POST['idespecialidad'];   
  $nombre_especialidad=$_POST['nombre_especialidad'];
  $clave=$_POST['clave'];
 
  
  //hacemos la sentencia de sql
  // $sql="INSERT INTO especialidad VALUES ('$idespecialidad','$nombre_especialidad','$clave')";

  //ejecutamos la sentencia de sql
  // $ejecutar=mysqli_query($conectar,$sql);
  //verificamos la ejecucion
  // if(!$ejecutar){
 // header("location:RegistrosEspecialidad.php");  
  // }else{
    // header("location:RegistrosEspecialidad.php");  
  // }
  $q_admin = $conectar->query("SELECT * FROM `especialidad` WHERE `nombre_especialidad` = '$nombre_especialidad'") or die(mysqli_error());
    $v_admin = $q_admin->num_rows;
    if($v_admin == 1){
      echo '
        <script type = "text/javascript">
          alert("Nombre de especialidad ya existe");
          window.location = "Especialidad.php";
        </script>
      ';
    }else{
      $conectar->query("INSERT INTO especialidad VALUES ('$idespecialidad','$nombre_especialidad','$clave')") or die(mysqli_error());
      echo '
        <script type = "text/javascript">
          alert("Datos guardados exitosamente");
          window.location = "Especialidad.php";
        </script>
      ';
    }
?>