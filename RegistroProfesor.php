 <?php
  //conectamos Con el servidor
  $conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
    echo "Conexion exitosa";
  //recuperar las variables
$rfc=$_POST['rfc'];
$nombre_profesor=$_POST['nombre_profesor'];
$apellido_paterno=$_POST['apellido_paterno'];
$apellido_materno=$_POST['apellido_materno'];
$sexo=$_POST['sexo'];
$grado_academico=$_POST['grado_academico'];
$curp=$_POST['curp'];
$correo=$_POST['correo'];      
  
  //hacemos la sentencia de sql
  // $sql="INSERT INTO profesor VALUES ('$rfc','$nombre_profesor','$apellido_paterno','$apellido_materno','$sexo','$grado_academico','$curp','$correo')";

  //ejecutamos la sentencia de sql
  // $ejecutar=mysqli_query($conectar,$sql);
  //verificamos la ejecucion
  // if(!$ejecutar){
  // header("location:Registrosprofesor.php");
  // }else{
  // header("location:Registrosprofesor.php");

  // }
  $q_admin = $conectar->query("SELECT * FROM `profesor` WHERE `rfc` = '$rfc'") or die(mysqli_error());
    $v_admin = $q_admin->num_rows;
    if($v_admin == 1){
      echo '
        <script type = "text/javascript">
          alert("Este profesor ya existe");
          window.location = "Profesores.php";
        </script>
      ';
    }else{
      $conectar->query("INSERT INTO profesor VALUES ('$rfc','$nombre_profesor','$apellido_paterno','$apellido_materno','$sexo','$grado_academico','$curp','$correo')") or die(mysqli_error());
      echo '
        <script type = "text/javascript">
          alert("Datos guardados exitosamente");
          window.location = "Profesores.php";
        </script>
      ';
    }
?>