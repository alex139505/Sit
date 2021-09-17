<?php  ?>
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
<div class="group">  
     <form action="EditJurado.php" method="POST" ><br><br>
      <h2>Editar Registros</h2><br>
       <?php 
         $server = "localhost";
      $usuario = "root";
      $contraseña = "";
      $bd = "documento";
      //$id = $_POST['clave'];
        $idjurado=$_GET['idjurado'];
       //$nombre_carrera=$_GET['nombre_carrera'];
       
       $conexion = mysqli_connect($server, $usuario, $contraseña, $bd) or die ("error en la conexion");
      $consulta = mysqli_query($conexion, "SELECT DISTINCT idjurado,concat(Presi.nombre_profesor, ' ', Presi.apellido_paterno, ' ',Presi.apellido_materno) AS Presidente,concat(Secre.nombre_profesor, ' ',Secre.apellido_paterno, ' ',Secre.apellido_materno) AS Secretario,concat(Voc.nombre_profesor, ' ', Voc.apellido_paterno, ' ',Voc.apellido_materno) AS vocal FROM jurado, profesor Presi, profesor Secre, profesor Voc WHERE jurado.Presidente=Presi.rfc AND jurado.Secretario=Secre.rfc AND jurado.Vocal=Voc.rfc AND idjurado='".$idjurado."'") or die ("errror al traer datos");


 $lista = mysqli_fetch_array($consulta);
         ?>
      <input readonly type="text" placeholder="Presidente" name="idjurado" value="<?php echo $lista['idjurado']?>" required> <br/>

      
        <select name="Presidente">
        <option value="<?php echo $lista['Presidente']?>" ><?php echo $lista['Presidente']?></option>
      <?php $row=$sql=$conexion->query("SELECT DISTINCT rfc,profesor.nombre_profesor,profesor.apellido_paterno,profesor.apellido_materno from  profesor"); 
        while ( $row=$sql->fetch_array()) {
         echo '<option value="'.$row[rfc].'">'.$row[nombre_profesor].' '.$row[apellido_paterno].' '.$row[apellido_materno].'</option>';
        }
         ?>
         </select><br/><br>
       <select name="Secretario">
        <option value="<?php echo $lista['Secretario']?>"><?php echo $lista['Secretario']?></option>
      <?php $row=$sql=$conexion->query("SELECT DISTINCT rfc,profesor.nombre_profesor,profesor.apellido_paterno,profesor.apellido_materno from  profesor"); 
        while ( $row=$sql->fetch_array()) {
         echo '<option value="'.$row[rfc].'">'.$row[nombre_profesor].' '.$row[apellido_paterno].' '.$row[apellido_materno].'</option>';
        }
         ?>
         </select><br/><br>
       <select name="vocal">
      <option value="<?php echo $lista['vocal']?>"><?php echo $lista['vocal']?></option>
      <?php $row=$sql=$conexion->query("SELECT DISTINCT rfc,profesor.nombre_profesor,profesor.apellido_paterno,profesor.apellido_materno from  profesor"); 
        while ( $row=$sql->fetch_array()) {
         echo '<option value="'.$row[rfc].'">'.$row[nombre_profesor].' '.$row[apellido_paterno].' '.$row[apellido_materno].'</option>';
        }
         ?>
         </select><br/><br>      
       <input type="submit" value="Guardar" name="btnRegistrar">
       </form>
       <?php


         ?>
      </div>
</body>
</html>