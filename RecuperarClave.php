<?php
include('conexion.php');
$e_mail= $_POST['e_mail'];
$q_admin = mysqli_query($conexion,"SELECT * FROM `usuario` WHERE `e_mail` = '$e_mail'") or die(mysqli_error());
$nr       = mysqli_num_rows($q_admin); 
if ($nr == 1)
{
$mostrar    = mysqli_fetch_array($q_admin); 
$enviarpass   = $mostrar['clave'];

$paracorreo     = $e_mail;
$titulo       = "Recuperar contraseña";
$mensaje      = $enviarpass;
$tucorreo     = "From:al3xra7@gmail.com";
if(mail($paracorreo, $titulo,$mensaje,$tucorreo))
  {
  echo "<script> alert('Contraseña enviado');window.location= 'login.php' </script>";
}else
{
  echo "<script> alert('Error');window.location= 'Recuperar.php' </script>";
}
}
else
{
  echo "<script> alert('Este correo no existe');window.location= 'login.php' </script>";

}
?>
