 <?php
  //conectamos Con el servidor
  $conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
    echo "";
  //recuperar las variables
    //recuperar las variables
$titulo=$_POST['titulo'];
$old=$_POST['old'];
$periodo=$_POST['periodo'];
$fechaexamen=$_POST['fechaexamen'];
$nivel_escolar=$_POST['nivel_escolar'];
$tipo_documento=$_POST['tipo_documento'];
$idjurado=$_POST['idjurado'];  
  //hacemos la sentencia de sql
  // $sql="INSERT INTO documento VALUES ('','$titulo','$old','$periodo','$fechaexamen','$nivel_escolar','$tipo_documento','$idjurado')";

  //ejecutamos la sentencia de sql
  // $ejecutar=mysqli_query($conectar,$sql);
  //verificamos la ejecucion
  // if(!$ejecutar){
     // header("location:RegistrosDocumentos.php");
  // }else{
    // header("location:RegistrosDocumentos.php");
  // }
$q_admin = $conectar->query("SELECT * FROM `documento` WHERE `titulo` = '$titulo'") or die(mysqli_error());
    $v_admin = $q_admin->num_rows;
    if($v_admin == 1){
      echo '
        <script type = "text/javascript">
          alert("Nombre de usuario ya existe");
          window.location = "Documento.php";
        </script>
      ';
    }else{
      $conectar->query("INSERT INTO documento VALUES ('','$titulo','$old','$periodo','$fechaexamen','$nivel_escolar','$tipo_documento','$idjurado')") or die(mysqli_error());
      echo '
        <script type = "text/javascript">
          alert("Datos guardados exitosamente");
          window.location = "Documento.php";
        </script>
      ';
    }
  
?>