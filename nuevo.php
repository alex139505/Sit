<!DOCTYPE html>
<html>
<head>
  <title>SITT</title>
  <link rel="stylesheet" href="css/nue.css">
     <link rel="stylesheet"  href="css/registros.css">
  <link rel="icon" type="image/png" href="img/logo-oficia.png">
  <link type="text/css" rel="stylesheet" href="css/fontello.css" />
</head>
<body>
  <header>
  <div class="menu">
  <ul>
    <li><a href="RegistrosUsuarios.php"><span class="icon-reply"></span> Atras</a></li>    
  </ul>
</div>
</header>
<div class="login">
       <?php
  $mysqli = new mysqli('localhost', 'root', '', 'documento');
?>
 
  <h1>Registrar Nuevo</h1>
    <form action="Registrousuario.php" method="POST">
    <!--nombre de usuario-->
    <label for="Usuario"></label>
    <input type="text" placeholder="Ingresar Usuario" name="usuario" minlength="5" maxlength="40" required></input>
      <!--email-->
    <label for="Email"></label>
    <input type="text" placeholder="Ingresar Email" name="e_mail" minlength="5" maxlength="40" required></input>
    <!--Passord-->
    <label for="Password"></label>
    <input type="Password" placeholder="Ingresar Contraseña" name="clave" minlength="8" maxlength="8" required></input>
     <select name="idrol"> 
       <option value=" ">Tipo de Usuario</option> 
         <?php 
       $query = $mysqli -> query ("SELECT * FROM roles");
       while ($valores = mysqli_fetch_array($query)) {
       echo '<option value="'.$valores[idrol].'">'.$valores[rol].'</option>';
          }
         ?>
     </select>
   <!-- <label for="Password"></label> -->
   <!-- <input type="Password" placeholder="Repetir Contraseña" name="clave" minlength="8" required></input>    -->
    <!--botton-->
        <input type="submit" value="Registrar" ></input>
</form>
</body>
</html>