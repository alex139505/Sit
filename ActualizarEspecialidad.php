
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
   
</div>
<div class="group">  
  <?php 
         $server = "localhost";
      $usuario = "root";
      $contraseña = "";
      $bd = "documento";
      //$id = $_POST['clave'];
        $idespecialidad=$_GET['idespecialidad'];
       //$nombre_carrera=$_GET['nombre_carrera'];
       
       $conexion = mysqli_connect($server, $usuario, $contraseña, $bd) or die ("error en la conexion");
      $consulta = mysqli_query($conexion, "SELECT especialidad.idespecialidad,especialidad.nombre_especialidad,especialidad.clave,carrera.clave,carrera.nombre_carrera from especialidad,carrera where especialidad.clave=carrera.clave AND idespecialidad='".$idespecialidad."'") or die ("errror al traer datos");


 $extraido = mysqli_fetch_array($consulta);
         ?>
         <style type="text/css">
  
  button[type="submit"] {
border: none;
    outline: none;

    width: 20%;
    height: 35px;
    background: transparent;
    background: #b80f22;
    color: #fff;
    font-size: 12px;
    border-radius: 5px;

}

 button[type="submit"]:hover {
  cursor: pointer;
  background: #000;
  color: #FFF;
}
</style>
     <form action="EditEspecialidad.php" method="POST" ><br><br>
      <h2>Editar Registros</h2><br><br>
   <input readonly type="text" placeholder="nombre_especialidad" name="idespecialidad" value="<?php echo $extraido['idespecialidad']?>" required> <br/>
       <input type="text" placeholder="nombre_especialidad" name="nombre_especialidad" value="<?php echo $extraido['nombre_especialidad']?>" required> <br/>
       <select name="clave">
        <option value="<?php echo $extraido['clave']?>"><?php echo $extraido['nombre_carrera']?></option>
      <?php $row=$sql=$conexion->query("SELECT * from  carrera"); 
        while ( $row=$sql->fetch_array()) {
         echo '<option value="'.$row[clave].'">'.$row[nombre_carrera].'</option>';
        }
         ?>
         </select><br/><br>
      <button type="submit" value="Guardar" name="btnRegistrar">Guardar</button>
       </form>
      </div>
</body>
</html>