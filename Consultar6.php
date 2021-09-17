<!DOCTYPE html>
<html >
<style >
  textarea {text-transform: uppercase;}
</style>
<head>
<title>SITT</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<script language="javascript" src="js/jquery-3.4.1.min.js"></script>
  <link type="text/css" rel="stylesheet" href="css/fontello.css" />
   <link rel="stylesheet"  href="css/registros.css">
	<link rel="stylesheet"  href="css/Consultas.css">
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
   <header>
     <div class="menu">
        <ul>
          <li><a href="Buscar.php"><span class="icon-reply"></span> Atras</a></li>
           </ul>
     </div>
</head>
<body>
<form action="Resultados6.php" method="POST" >
	<div class="group"><br>
		<h2>Consultar</h2><br>
 
lista de egresados  de la carrera <input type="text" name="nombre_carrera" required>           
y del año <input type="text" name="old" required>  
         
    
    <button type="submit" value="Buscar" name="btnBuscar1"><span class="icon-search">Buscar</button>
	 
</div>
</form>
</body>
</html>