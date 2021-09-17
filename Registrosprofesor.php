
<!DOCTYPE html>
<html>
<head>
<title>SITT</title>
   <meta charset = "utf-8" />
  <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet"  href="css/registros.css">
    <link type="text/css" rel="stylesheet" href="css/fontello.css" />
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
  <header>
  <div class="menu">
    <ul>
<li><a href="Principal.php"><span class="icon-reply"></span> Atras</a></li>      
<li><a href="Profesores.php" hod="POST"><span class="icon-user-plus"> Nuevo</a></li>
<li><a href="Reporte-profesor.php"><span class='icon-download'></span> Descargar</a>
    </ul>
  </div><br>
</head>
<body>  
  <center><h2>Lista de Profesores</h2></center><br>

<?php
$CantidadMostrar=15;
    $conetar = new mysqli("localhost", "root", "", "documento");
if ($conetar->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conetar->connect_errno . ") " . $conetar->connect_error;
}else{

 $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
    $TotalReg       =$conetar->query("SELECT * FROM profesor");
    //Se divide la cantidad de registro de la BD con la cantidad a mostrar 
    $TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);
    echo "<b> </b>"." <br>";
    //Consulta SQL
      $consultavistas ="SELECT  profesor.rfc,
                               concat(profesor.nombre_profesor,' ',
                               profesor.apellido_paterno,' ',
                               profesor.apellido_materno) AS nombre,
                               profesor.sexo,
                               profesor.grado_academico,                               
                               profesor.curp,
                               profesor.correo
                               FROM profesor
                               ORDER BY
                               profesor.rfc ASC
                               LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;

                                $consulta=$conetar->query($consultavistas);

  
      echo "<center><table width='70%'  border='1' cellspacing='0' cellpadding='0' >
    <tr width='20%'align='center'>
    <th width='5%'>RFC</th>
    <th>Nombre</th>
    <th>Sexo</th>
    <th>G.Academico</th>
      <th>CURP</th>
      <th>Correo</th>
    <th width='5%'>Accion</th>
    </tr>";

     while ($lista=$consulta->fetch_row()) {
      
       echo "<tr><td align='center'>".$lista[0]."</td><td>".utf8_encode($lista[1])."</td><td>".$lista[2]."</td><td>".$lista[3]."</td><td align='center'>".$lista[4]."</td><td align='center'>".$lista[5]."</td><td align='center'><a href='ActualizarProfesor.php?rfc=".$lista[0]."'><span class='icon-pencil'></a>
      ";
      ?>
       <a href="EliminarProfesor.php?rfc=<?php echo$lista[0];?>" onclick="return confirm('Deseas eliminar este registro del sistema?');"><span class='icon-trash'></a></td>
       <?php 
       }
        echo "</table><center>";

      /*Sector de Paginacion */
    
    //Operacion matematica para boton siguiente y atras 
  $IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):1;
    $DecrementNum =(($compag -1))<1?1:($compag -1);
  
   $IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):1;
    $DecrementNum =(($compag -1))<1?1:($compag -1);
  
    echo "<ul class=\"btn\"><li class=\"btn\" ><a href=\"?pag=".$DecrementNum."\"><<</a></li>";
    //Se resta y suma con el numero de pag actual con el cantidad de 
    //numeros  a mostrar
     $Desde=$compag-(ceil($CantidadMostrar/2)-1);
     $Hasta=$compag+(ceil($CantidadMostrar/2)-1);
     
     //Se valida
     $Desde=($Desde<1)?1: $Desde;
     $Hasta=($Hasta<$CantidadMostrar)?$CantidadMostrar:$Hasta;
     //Se muestra los numeros de paginas
     for($i=$Desde; $i<=$Hasta;$i++){
        //Se valida la paginacion total
        //de registros
        if($i<=$TotalRegistro){
            //Validamos la pag activo
          if($i==$compag){
          // echo "<li class=\"active\"><a href=\"?pag=".$i."\">".$i."</a></li>";
          }else {
            //echo "<li><a href=\"?pag=".$i."\">".$i."</a></li>";
          }             
        }
     }
    echo "<li class=\"btn\"><a href=\"?pag=".$IncrimentNum."\">>></a></li></ul>";
  
}
?>
 <style type="text/css">
      .btn ul{
  transform: translate(15%, 10%);
     margin: 0;
  list-style: none;
  padding: 0;
  display:flex;
  justify-content: flex;
    }
 .btn ul, ol{
  list-style: none;
}
 .btn li a{
  transform: translate(850%, 10%);
  background-color: #333;
  color: #fff;
  text-decoration: center;
  padding: 8px 25px;
  display: block;
  font-size: 20px;
  border-radius: 2px;
}
.btn li a:hover{
  background-color: #000;
}
  .btn li:hover > ul {
    display: block;

}
</style>  