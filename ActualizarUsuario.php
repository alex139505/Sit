<!DOCTYPE html>
<html>
<head>
  <title>SITT</title>
  <link rel="stylesheet" href="css/nue.css">
   <link rel="stylesheet"  href="css/registros.css">
    <link type="text/css" rel="stylesheet" href="css/fontello.css" />
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
  <meta charset="utf-8">
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
         $server = "localhost";
      $usuario = "root";
      $contraseña = "";
      $bd = "documento";
      //$id = $_POST['clave'];
        $idusuario=$_GET['idusuario'];

       //$nombre_carrera=$_GET['nombre_carrera'];
       
       $conexion = mysqli_connect($server, $usuario, $contraseña, $bd) or die ("error en la conexion");
      $consulta = mysqli_query($conexion, "SELECT distinct usuario.idusuario,usuario.usuario,usuario.e_mail,usuario.clave,usuario.idrol,roles.idrol,roles.rol from usuario,roles where usuario.idrol=roles.idrol and idusuario='".$idusuario."'") or die ("errror al traer datos");


 $extraido = mysqli_fetch_array($consulta); 
         ?>
   <style type="text/css">
  
  button[type="submit"] {
border: none;
    outline: none;
 transform: translate(50%, 359%);
    width: 50%;
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
 <form action="EditUsuario.php" method="POST"> 
 <h1>Editar Registros</h1>
    <input readonly type="text" placeholder="idusuario" name="idusuario" value="<?php echo $extraido['idusuario']?>" required> <br/>
    <!--nombre de usuario-->
    <input type="text" placeholder="usuario" name="usuario" value="<?php echo $extraido['usuario']?>" required> <br/>
      <!--email-->
    <input type="text" placeholder="e_mail" name="e_mail" value="<?php echo utf8_encode($extraido['e_mail'])?>" required> <br/>
    <!--Passord-->
    <input type="text" placeholder="clave" name="clave" value="<?php echo utf8_encode($extraido['clave'])?>" required> <br/>
     <select name="idrol"> 
    <option value="<?php echo $extraido['idrol']?>"><?php echo $extraido['rol']?></option> 
          <?php $row=$sql=$conexion->query("SELECT * FROM roles");
       while ( $row=$sql->fetch_array()) {
       echo '<option value="'.$row[idrol].'">'.$row[rol].'</option>';
          }
         ?>
     </select>
    <input type="submit" value="Guardar" ></input>
</form>
</header>
</body>
</html>