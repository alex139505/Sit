<!DOCTYPE html>
<html>
<head>
	<title>SITT</title>
  <link rel="icon" type="image/png" href="img/logo-oficia.png">
  <link rel="stylesheet" href="css/recu.css">
  <link type="text/css" rel="stylesheet" href="css/fontello.css" />
   <div class="login">
  <h1>Cambiar Contraseña</h1>
   <img  src="img/logo-oficia.png" class="avatar" alt="avatar/image">
    <form action="NuevaClave.php" method="POST">
    <!--nombre de usuario-->
    <!-- <label for="Usuario"></label> -->
    <!-- <input type="text" placeholder="Ingresar Usuario" name="usuario" minlength="5" maxlength="40" required></input> -->
     <!--email-->
   <label for="Password"></label>
    <input type="Password" placeholder="Nueva Contraseña" name="clave" minlength="8" required></input><br><br>
    <!-- <label for="Password"></label> -->
    <!-- <input type="Password" placeholder="Repetir Contraseña" name="clave" minlength="8" required></input>   -->
   
    <!--botton-->
  <input type="submit" value="Enviar" ></input> 
  <center><a href="login.php"><span class="icon-home"></span> Login</a></center>
</body>
</html>
?>