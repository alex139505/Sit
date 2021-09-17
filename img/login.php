 <?php 
 session_start();
 session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SITT</title>
 <meta charset = "utf-8" />
  <link rel="stylesheet" href="css/login.css">
  <link rel="icon" type="image/png" href="img/logo-oficia.png">
  <link type="text/css" rel="stylesheet" href="css/fontello.css" />
</head>
<body>
 <div class="login">
  <img  src="img/logo-oficia.png" class="avatar" alt="avatar/image">
  <h1>Iniciar Sesion</h1>
    <form action="validar.php" method="POST">
    <!--nombre de usuario-->
    <label for="Usuario"></label>
    <input type="text" placeholder="Ingresar Usuario" name="e_mail" minlength="5" maxlength="40" required></input>
    <!--Passord-->
    <label for="Password"></label>
    <input type="Password" placeholder="Ingresar Contraseña" name="clave" minlength="8" maxlength="10" required></input><br><br>
    
    <!--botton-->
  <input type="submit" value="Iniciar sesion" ></input> <br>
    <?php
        if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
       {
             echo "<center><div style='color:red'> Error:!! Usuario o contraseña invalido ¡¡</div></center>";
       }
     ?> 
     <a href="recuperar.php">¿Olvidaste tu contraseña?</a>
     <a href="index.html">blog</a>
  </form>
 </div>
</body>
</html>
