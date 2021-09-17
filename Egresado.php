<!DOCTYPE html>
<html>
<head>
<title>SITT</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet"  href="css/egresado.css">
	<link rel="stylesheet"  href="css/Registros.css">
   <link type="text/css" rel="stylesheet" href="css/fontello.css" />
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
</head>
<body>
 <header>
	<div class="menu">
	<ul>
		<li><a href="RegistrosEgresados.php"><span class="icon-reply"></span> Atras</a></li>		
	</ul>
</div>
     <?php
  $mysqli = new mysqli('localhost', 'root', '', 'documento');
?>
<form action="Registroegresado.php" method="POST" >
<div class="group"><br><br>
  
<h2>Registro de Egresado</h2><br>
      <input type="text" placeholder="Numero de Control" name="n_control" required> <br/>
   		<input type="text" placeholder="Nombre" name="nombre" pattern="[a-zA-Z]{1,15}" title="solo se aceptan letras" required> <br/>
         <input type="text" placeholder="Apellido Paterno" name="apellido_paterno" pattern="[a-zA-Z]{1,15}" title="solo se aceptan letras" required> <br/>
         <input type="text" placeholder="Apellido Materno" name="apellido_materno"  required> <br/>
          <select name="sexo">
         <option value="" disabled="" selected="">Sexo</option>
         <option value="Masculino" >Masculino</option>
         <option value="Femenino">Femenino</option>
         </select> 
         <br/> <br>
      <input type="text" placeholder="Telefono" name="telefono" required> <br/>
      <input type="text" placeholder="Correo" name="correo" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required> <br/>
      <select name="idespecialidad"> 
         <option value=" ">Selecione una Especialidad</option>
          <?php
          $query = $mysqli -> query ("SELECT * FROM especialidad ");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[idespecialidad].'">'.$valores[nombre_especialidad].'</option>';
          }
        ?>
      </select><br><br>
       <select name="folio"> 
         <option value=" ">Selecione un Documento</option>
          <?php
          $query = $mysqli -> query ("SELECT * FROM documento");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[folio].'">'.utf8_encode($valores[titulo]).'</option>';
          }
        ?>
      </select><br><br>
     
   		 <button type="submit" value="Registrar" name="btnRegistrar">Guardar</button>
         <button type="reset" value="Limpiar"  name="btnLimpiar">Limpiar</button>
         </form>
   	   </header>
</body>
</html>