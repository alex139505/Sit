<!DOCTYPE html>
<html>
<head>
<title>SITT</title>
<meta charset = "utf-8" />
<script language="javascript" src="js/jquery-3.4.1.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/fontello.css" />
<link rel="stylesheet"  href="css/registros.css">
<link rel="stylesheet"  href="css/Consultas.css">
<link rel="icon" type="image/png" href="img/logo-oficia.png">
</head>
<header>
  <div class="menu">
    <ul>
      <li><a href="Buscar1.php"><span class="icon-reply"></span> Atras</a></li>
    </ul>
<body>
<form action="Resultados1.1.php" method="POST" >
	<div class="group"><br>
		<h2>Consultar</h2><br>
<form >
 
     lista de egresados de la carrera:<input type="text" name="carrera" required> 
     y pertenecen a la especialidad <input type="text" name="especialidad" required>
    que se titularon durante el periodo:<select name="periodo"><option value="periodo" required></option>
         <option value="Agosto-Diciembre" >agosto-diciembre</option>
         <option value="Enero-Julio">enero-julio</option>
         </select> 
en el año<input type="text" name="old"> con el documento <input type="text" name="tipo_documento" required>
    
    <button type="submit" value="Buscar" name="btnBuscar1"><span class="icon-search">Buscar</button>
	 
</div>
</form>
</body>
</html>