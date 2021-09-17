<?php
$e_mail=$_POST['e_mail'];
$clave=$_POST['clave'];
//conectar a la base de datos
$conexion=mysqli_connect("localhost", "root", "", "documento");
$consulta="SELECT * FROM usuario WHERE e_mail='$e_mail' AND clave='$clave' ";
$resultado=mysqli_query($conexion, $consulta);
$filas=mysqli_fetch_array($resultado);
if($filas['idrol']==1){
	session_start();
	$_SESSION['validar']=1;
header("location:Principal.php");
}else if ($filas['idrol']==2) {
	session_start();
	$_SESSION['validar']=1;
	header("location:invitado.php");
}else{
	session_start();
	$_SESSION['validar']=0;
  header("location: login.php?fallo=true");
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?> 
