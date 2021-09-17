 <?php
  //conectamos Con el servidor
  $conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
     // echo "Conexion exitosa";
  //recuperar las variables

$usuario=$_POST['usuario'];
$e_mail=$_POST['e_mail'];
$clave=$_POST['clave']; 
$idrol=$_POST['idrol'];      
  //hacemos la sentencia de sql
  // $user=("SELECT * FROM usuario WHERE 'usuario' = '$usuario'");
 // $eje=mysqli_query($conectar,$user);
    // if($v_admin == 1){
       // echo '
        // <script type = "text/javascript">
          // alert("Nombre de usuario ya existe");
          // window.location = "nuevo.php";
        // </script>'
 // ;
  // }else{
   // $conectar->query("INSERT INTO usuario VALUES('','$usuario','$clave')");

  // echo '
        // <script type = "text/javascript">
          // alert("Datos guardados exitosamente");
          // window.location = "nuevo.php";
        // </script>
      // ';
    // }
$q_admin = $conectar->query("SELECT * FROM `usuario` WHERE `usuario` = '$usuario'") or die(mysqli_error());
    $v_admin = $q_admin->num_rows;
    if($v_admin == 1){
      echo '
        <script type = "text/javascript">
          alert("Nombre de usuario ya existe");
          window.location = "nuevo.php";
        </script>
      ';
    }else{
      $conectar->query("INSERT INTO `usuario` VALUES('', '$usuario', '$e_mail', '$clave','$idrol')") or die(mysqli_error());
      echo '
        <script type = "text/javascript">
          alert("Datos guardados exitosamente");
          window.location = "nuevo.php";
        </script>
      ';
    }
  
?>