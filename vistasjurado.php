<!DOCTYPE html>
<html lang="es">
<meta charset = "utf-8" />
<head>
<title>SITT</title>
  <link rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/fontello.css" />
   <link rel="stylesheet"  href="css/registros.css">
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
 <header>
  <div class="menu">
    <ul>
      <li><a href="Principal.php"><span class="icon-reply"></span> Atras</a></li>
<li><a href="Jurado.php" hod="POST"><span class="icon-user-plus"> Nuevo</a></li>
<li><a href="Reporte_jurado.php"><span class='icon-download'></span> Descargar</a></li>
      
    </ul>
  </div><br>
</head>
<body>  
  <h2>Lista de Jurados</h2><br>   
<?php
$CantidadMostrar=15;
    $conetar = new mysqli("localhost", "root", "", "documento");
if ($conetar->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conetar->connect_errno . ") " . $conetar->connect_error;
}else{

 $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
    $TotalReg       =$conetar->query("SELECT DISTINCT concat(Presi.nombre_profesor, ' ', Presi.apellido_paterno, ' ',Presi.apellido_materno) AS Presidente,concat(Secre.nombre_profesor, ' ',Secre.apellido_paterno, ' ',Secre.apellido_materno) AS Secretario,concat(Voc.nombre_profesor, ' ', Voc.apellido_paterno, ' ',Voc.apellido_materno) AS vocal FROM jurado, profesor Presi, profesor Secre, profesor Voc WHERE jurado.Presidente=Presi.rfc AND jurado.Secretario=Secre.rfc AND jurado.Vocal=Voc.rfc");
    //Se divide la cantidad de registro de la BD con la cantidad a mostrar 
    $TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);
    echo "<b><br>";
    //Consulta SQL

  $consultavistas ="
                       SELECT DISTINCT idjurado,concat(Presi.nombre_profesor, ' ', Presi.apellido_paterno, ' ',Presi.apellido_materno) AS Presidente,concat(Secre.nombre_profesor, ' ',Secre.apellido_paterno, ' ',Secre.apellido_materno) AS Secretario,concat(Voc.nombre_profesor, ' ', Voc.apellido_paterno, ' ',Voc.apellido_materno) AS vocal FROM jurado, profesor Presi, profesor Secre, profesor Voc WHERE jurado.Presidente=Presi.rfc AND jurado.Secretario=Secre.rfc AND jurado.Vocal=Voc.rfc
                        ORDER BY
                        jurado.idjurado ASC
                        LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
                       // echo $consultavistas;
    $consulta=$conetar->query($consultavistas);
         echo "<center><table  border><center>
    <tr>
    <th>Num</th>
    <th>Presidente</th>
    <th>Secretario</th>
    <th>Vocal</th>
    <th>Accion</th>
    </tr>";


      while ($lista=$consulta->fetch_row()) {
         echo " <tr><td>".$lista[0]."</td><td>".$lista[1]."</td><td>".$lista[2]."</td><td>".$lista[3]."</td></td><td><a href='ActualizarJurado.php?idjurado=".$lista[0]."'><span class='icon-pencil'></a> ";
    ?>
     <a href="EliminarJurado.php?idjurado=<?php echo $lista[0];?>" onclick="return confirm('Deseas eliminar este registro del sistema?');"><span class='icon-trash'></a></td></tr>
       <?php 
   
    }
        echo "</table><center>";

      /*Sector de Paginacion */
    
    //Operacion matematica para boton siguiente y atras 
  $IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):1;
    $DecrementNum =(($compag -1))<1?1:($compag -1);
  
   $IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):1;
    $DecrementNum =(($compag -1))<1?1:($compag -1);
  
    echo "<ul class=\"btn\"><li class=\"btn\"><a href=\"?pag=".$DecrementNum."\"><<</a></li>";
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
           // echo "<li><a href=\"?pag=".$i."\">".$i."</a></li>";
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