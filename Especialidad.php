<!DOCTYPE html>
<html>
<head>
<title>SITT</title>
     <meta charset = "utf-8" />
   <link rel="stylesheet"  href="css/REG.css">
   <link rel="stylesheet"  href="css/registros.css">
   <link rel="stylesheet" href="css/cal.css">
   <link type="text/css" rel="stylesheet" href="css/fontello.css" />
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
</head>
<body>
 <header>
   <div class="menu">
   <ul> 
      <li><a href="RegistrosEspecialidad.php"><span class="icon-reply"></span> Atras</a></li>     
   </ul>
       <?php
  $mysqli = new mysqli('localhost', 'root', '', 'documento');
?>
</div>
<div class="group"><br><br>  
     <form action="RegistroEspecialidad.php" method="POST" >
      <h2>Registro de Especialidades</h2><br><br>
      <input type="text" placeholder="Especialidad" name="idespecialidad" required> <br/>
       <input type="text" placeholder="Nombre Especialidad" name="nombre_especialidad" required> <br/>
      <select name="clave" required> 
         <option value=" ">Selecione una carrera</option>
          <?php
          $query = $mysqli -> query ("SELECT * FROM carrera");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[clave].'">'.$valores[nombre_carrera].'</option>';
          }
        ?>
     </select>
            <input type="submit" value="Registrar" name="btnRegistrar">
       <input type="reset" value="Limpiar"  name="btnLimpiar">
       </form>
      </div>
</body>
</html>