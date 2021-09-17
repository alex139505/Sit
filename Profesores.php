<!DOCTYPE html>
<html>
<head>
<title>SITT</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet"  href="css/Profesor.css">
	<link rel="stylesheet"  href="css/Registros.css">
  <link type="text/css" rel="stylesheet" href="css/fontello.css" />
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
</head>
<body>
 <header>
	<div class="menu">
	<ul>
		<li><a href="Registrosprofesor.php"><span class="icon-reply"></span> Atras</a></li>		
	</ul>
</div>
<form action="RegistroProfesor.php" method="POST" >
<div class="group"><br><br>
<h2>Registro de Profesor</h2><br><br>
      <input type="text" placeholder="RFC" name="rfc" required> <br/>
      <input type="text" placeholder="Nombre del Profesor" name="nombre_profesor" required> <br/>
         <input type="text" placeholder="Apellido Paterno" name="apellido_paterno" required> <br/>
         <input type="text" placeholder="Apellido Materno" name="apellido_materno"  required> <br/>
          <select type="text" placeholder="Sexo" name="sexo" >
          <option value="" disabled="" selected="">Sexo</option>
         <option value="Masculino" >Masculino</option>
         <option value="Femenino">Femenino</option>
         </select> 
         <br/> <br>
         <input type="text" placeholder="Grado Academico" name="grado_academico" required> <br/>
             <input type="text" placeholder="CURP" name="curp" required> <br/>
             <input type="text" placeholder="Correo" name="correo" required> <br/>
   		 <button type="submit" value="Registrar" name="btnRegistrar">Guardar</button>
         <button type="reset" value="Limpiar"  name="btnLimpiar">Limpiar</button>
         </form>
   	   </header>
</body>
</html>