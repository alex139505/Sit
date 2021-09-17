<!DOCTYPE html>
<html lang="es">
<meta charset = "utf-8" />
<style >
  textarea {text-transform: uppercase;}
</style>
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
<li><a  href="Documento.php" hod="POST"><span class="icon-user-plus"> Nuevo</a></li>
<li><a href="Reporte_documento.php"><span class='icon-download'></span> Descargar</a></li>
           
    </ul>
  </div><br>
</head>
</header>
<body>  
   <center><h2>Lista de Documentos</h2></center>    
 <table width='80%'  border='1' cellspacing='0' cellpadding='0' >
    <tr align='center'>
    <th>Folio</th>
    <th >Titulo</th>
    <th>Año</th>
    <th >Periodo</th>
    <th>Fecha de Examen</th>
    <th>Escolar</th>
    <th >Documento</th>
    <th >Presidente</th>
    <th >Secretario</th>
    <th >Vocal</th>
    <th >Acciones</th>
    </tr>   
<?php
$CantidadMostrar=9;
    $conetar = new mysqli("localhost", "root", "", "documento");
if ($conetar->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conetar->connect_errno . ") " . $conetar->connect_error;
}else{

 $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
    $TotalReg       =$conetar->query("SELECT * FROM documento");
    //Se divide la cantidad de registro de la BD con la cantidad a mostrar 
    $TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);
    echo "<b> </b>"." <br>";
    //Consulta SQL

  $consultavistas ="SELECT
                        documento.folio,
                       documento.titulo,
                        documento.old,
                        documento.periodo,
                        documento.fechaexamen,
                        documento.nivel_escolar,
                        documento.tipo_documento,
                        concat(Presi.nombre_profesor, ' ', Presi.apellido_paterno, ' ',Presi.apellido_materno) AS Presidente,concat(Secre.nombre_profesor, ' ',Secre.apellido_paterno, ' ',Secre.apellido_materno) AS Secretario,concat(Voc.nombre_profesor, ' ', Voc.apellido_paterno, ' ',Voc.apellido_materno) AS vocal
                        
                        FROM
                        documento, jurado, profesor Presi, profesor Secre, profesor Voc
                        where jurado.Presidente=Presi.rfc
           AND jurado.Secretario=Secre.rfc
           AND jurado.Vocal=Voc.rfc AND jurado.idjurado=documento.idjurado
                        LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
                       // echo $consultavistas;
    $consulta=$conetar->query($consultavistas);
      

      while ($lista=$consulta->fetch_row()) {
         echo "<tr>
         <td align='center'>".$lista[0]."</td>
         <td>".utf8_encode($lista[1])."</td>
         <td>".$lista[2]."</td>
         <td>".$lista[3]."</td>
         <td>".$lista[4]."</td>
         <td align='center'>".$lista[5]."</td>
         <td align='center'>".$lista[6]."</td>
         <td align='center'>".$lista[7]."</td>
         <td align='center'>".$lista[8]."</td>
         <td align='center'>".$lista[9]."</td>
         <td align='center'><a href='ActualizarDocumento.php?folio=".$lista[0]."'><span class='icon-pencil'></a>";
         ?>
       <a href="EliminarDocumento.php?folio=<?php echo $lista[0];?>" onclick="return confirm('Deseas eliminar este registro del sistema?');"><span class='icon-trash'></a></td></tr>
       <?php 
    }
        echo "</table><center>";

      /*Sector de Paginacion */
    
    //Operacion matematica para boton siguiente y atras 
  $IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):1;
    $DecrementNum =(($compag -1))<1?1:($compag -1);
  
   $IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):1;
    $DecrementNum =(($compag -1))<1?1:($compag -1);
  
    echo "<ul class= \"btn\"><li class=\"btn\" ><a href=\"?pag=".$DecrementNum."\"><<</a></li>";
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
           //echo "<li class=\"active\"><a href=\"?pag=".$i."\">".$i."</a>";
          }else {
           //echo "<a href=\"?pag=".$i."\">".$i."</a>";
          }             
        }
     }
    echo "<li class=\"btn\"><a href=\"?pag=".$IncrimentNum."\">>></a></li></ul>";
  
  
}
?>
<style type="text/css">
    input{
  width: 20%;
  padding: 1px 0;
  transform: translate(20px,-5px );
  font-size: 15px;
  color: #fff;
  margin-bottom: 20px;
  height: 30px;
    }
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
</div>
</body>