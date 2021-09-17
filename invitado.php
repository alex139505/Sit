 <?php 
 session_start();
 if ($_SESSION['validar'] ==1) {
 
?>
<!DOCTYPE html>
<html>
<head>
<title>SITT</title>
<meta charset = "utf-8" />
<link rel="stylesheet"  href="css/men.css">
<link type="text/css" rel="stylesheet" href="css/fontello.css" />
<link rel="stylesheet"  href="css/slider.css">
<link rel="stylesheet"  href="css/responsive.css">
<link rel="icon" type="image/png" href="img/logo-oficia.png">
<style>
.superslider{
  max-width:400px;
  margin:0 auto;
  text-align:center;
  position:relative;
  margin:0;
  padding:0;
}
.superslider li{
  width:100%;
  display:none;
  margin:0;
  padding:0;
}
.superslider img{
  width:100%;
  height:auto;
}
</style>
</head>
<body>
<header>
<nav class="menu">
<ul>
<li><a href="#"><span class="icon-folder"></span> Abrir </a>
<ul class="sub-menu">
<!-- <li><a href="RegistrosCarrera.php"><span class="icon-folder"></span>Carrera</a></li> -->
<!-- <li><a href="RegistrosDocumentos.php"><span class="icon-folder"></span>Documento</a></li> -->
<!-- <li><a href="RegistrosEgresados.php"><span class="icon-folder"></span>Egresado</a></li> -->
<!-- <li><a href="RegistrosEspecialidad.php"><span class="icon-folder"></span>Especialidad</a></li> -->
<!-- <li><a href="vistasjurado.php"><span class="icon-folder"></span>Jurado</a></li> -->
<!-- <li><a href="Registrosprofesor.php"><span class="icon-folder"></span>Profesor</a></li> -->
<!-- </li>	 -->
</ul>
<li><a href="Buscar1.php"><span class="icon-search"></span> Consultar</a></li>
<li><a href="Login.php"><span class="icon-off"></span> Cerrar Sesiòn</a></li>
<label class="log"><strong>"SITT</strong> (Sistema de Informacion de Tesis y Tesinas)"</label>
<li style="color:#fff; cursor:default; padding: 15px 5px; "><span class="all-tittles">Invitado</span></li>
</ul>
</nav>
</header>
<div class="row">
<img  srcset="img/logo-tecnm.png 5x, /md.jpg 2x /xs.jpg 2x" src="img/logo-tecnm.png" class="uno" >
<img srcset="img/logo-oficia.png 5x, /md.jpg 2x /xs.jpg 2x" src="img/logo-oficia.png" class="dos" >
</div>
<div class="slider">
<ul>
<li><img  src="img/prins.png" alt=""></li>
<li><img  src="img/agro.png"  alt=""></li>
<li><img  src="img/isc.png"  alt=""></li>
<li><img  src="img/gestion.jpg"  alt=""></li>
</ul>
</div>	
<section>
<label class="pie"><center>Departamento de la Division de Estudios Profesionales</center></label>
<!-- <em>("Tesista de la carrera de Ingeniería en Sistemas Computacionales.")</p></center> -->
</section>
</body>
</html>
<?php 
}else{
  header("location:Login.php");
}
?>
