<!DOCTYPE html>
<html>
<head>
<title>SITT</title>
    <meta charset = "utf-8" />
   <link rel="stylesheet"  href="css/REG.css">
   <link rel="stylesheet"  href="css/registros.css">
     <link type="text/css" rel="stylesheet" href="css/fontello.css" />
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
</head>
<body>
 <header>
   <div class="menu">
   <ul> 
      <li><a href="vistasjurado.php"><span class="icon-reply"> Atras</a></li>     
   </ul>
</div>
       <?php
  $mysqli = new mysqli('localhost', 'root', '', 'documento');
?>
<div class="group"><br><br>  
     <form action="Registrojurado.php" method="POST" >
      <h2>Registro de Jurado</h2><br><br>
     <select name="Presidente">
        <option value=" ">Selecione un Presidente</option>
          <?php
          $query = $mysqli -> query ("SELECT DISTINCT rfc,profesor.nombre_profesor,profesor.apellido_paterno,profesor.apellido_materno from  profesor ");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[rfc].'">'.$valores[nombre_profesor].' '.$valores[apellido_paterno].' '.$valores[apellido_materno].'</option>';
          }
        ?>
     </select><br><br>
      <select name="Secretario">
        <option value=" ">Selecione un Secretario</option>
         <?php
          $query = $mysqli -> query ("SELECT DISTINCT rfc,profesor.nombre_profesor,profesor.apellido_paterno,profesor.apellido_materno from  profesor ");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[rfc].'">'.$valores[nombre_profesor].' '.$valores[apellido_paterno].' '.$valores[apellido_materno].'</option>';
          }
        ?>
     </select><br><br>
      <select name="Vocal">
        <option value=" ">Selecione un Vocal</option>
         <?php
          $query = $mysqli -> query ("SELECT DISTINCT rfc,profesor.nombre_profesor,profesor.apellido_paterno,profesor.apellido_materno from  profesor ");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[rfc].'">'.$valores[nombre_profesor].' '.$valores[apellido_paterno].' '.$valores[apellido_materno].'</option>';
          }
        ?>
     </select><br><br>
    
       <input type="submit" value="Registrar" name="btnRegistrar">
       <input type="submit" value="Limpiar"  name="btnLimpiar">
       </form>
      </div>
</body>
</html>