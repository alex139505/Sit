  <!DOCTYPE html>
  <html>
  <head>
  	<title>SITT</title>
     <link rel="stylesheet"  href="css/registros.css">
       <link type="text/css" rel="stylesheet" href="css/fontello.css" />
   <link rel="icon" type="image/png" href="img/logo-oficia.png">
  </head>
  <header>
  <div class="menu">
    <ul>
      <li><a href="invitado.php"><span class="icon-reply"> Atras</a></li>
     <li><a href="#"><span class="icon-search"> Consultas</a>
            <ul class="sub-menu">

                <li><a href="Consultar0.1.php"><span class="icon-search"> Por Especialidad</a>
                <li><a href="Consultar1.1.php"><span class="icon-search"> Consulta General </a>
                <li><a href="Consultar2.1.php"><span class="icon-search"> Por Periodo</a>
                <li><a href="Consultar3.1.php"><span class="icon-search">Por Carrera</a>   
                <li><a href="Consultar4.1.php"><span class="icon-search"> Por Año</a>
                <li><a href="Consultar5.1.php"><span class="icon-search"> Por Documento</a>  
                <li><a href="Consultar6.1.php"><span class="icon-search"> Por Carrerra y Año </a>     
        </li>  
        </ul> 
    </ul>
  </div><br>
  </header><br>
  <body>
     <style type="text/css">
   body{
   }    
 button[type="submit"] {
    transform: translate(15%, -10%);
    border: none;
    outline: none;
    width: 7%;
    height: 38px;
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
    input{
    width: 16%;
    height: 30px;
    font-size: 14px;
    border-radius: 5px;
          }
     </style>
  <center><H1>Buscador por Nombre</H1></center><br> 
  <form action="Buscadores1.php" method="POST">
 <center><input type="text" placeholder="Ingresa un Nombre" name="nombre"  pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" title="solo se permiten letras" required/>
  <button  type="submit" value="buscar">Buscar <span class="icon-search"></button>
   </form> <br>   
</div>
</body>