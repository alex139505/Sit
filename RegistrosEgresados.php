 

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
<li><a href="Egresado.php" hod="POST"><span class="icon-user-plus"> Nuevo</a></li>
<li><a href="Reporte_egresado.php"><span class='icon-download'></span> Descargar</a>
      
    </ul>
  </div><br>
</head>
<body>  
 
       <center><h2>Lista de Egresados</h2></center>
   <table width='50%'  border='1' cellspacing='0' cellpadding='0' >
    <tr width='20%'align='center'>
    <th width='2%'>Nº</th>
    <th width='10%'>Nombre</th>
    <th width='5%'>Sexo</th>
    <th width='5%'>Telefono</th>
    <th width='5%'>Correo</th>
     <th width='5%'>Especialidad</th>
     <th >Titulo</th>
    <th width='2%'>Accion</th>
    </tr>
    <?php 
$CantidadMostrar=12;
    $conetar = new mysqli("localhost", "root", "", "documento");
if ($conetar->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conetar->connect_errno . ") " . $conetar->connect_error;
}else{

 $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
    $TotalReg       =$conetar->query("SELECT * FROM egresado");
    //Se divide la cantidad de registro de la BD con la cantidad a mostrar 
    $TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);
    echo "<b> </b>"." <br>";
    //Consulta SQL

  $consultavistas ="SELECT
                         egresado.n_control,
                       concat(egresado.nombre,' ',
                        egresado.apellido_paterno,' ',
                        egresado.apellido_materno) AS nombre,
                        egresado.sexo,
                        egresado.telefono,
                        egresado.correo,
                        especialidad.nombre_especialidad,
                        documento.titulo
                        
                         FROM
                        egresado,especialidad,documento
                        WHERE 
                        egresado.idespecialidad=especialidad.idespecialidad
                        AND 
                        egresado.folio=documento.folio
                    ORDER BY
                        egresado.n_control ASC
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
         <td align='center'>".utf8_encode($lista[6])."</td>
    <td align='center'><a href='ActualizarEgresado.php?n_control=".$lista[0]."'><span class='icon-pencil'></a> ";
    ?>
     <a href="EliminarEgresado.php?n_control=<?php echo $lista[0];?>" onclick="return confirm('Deseas eliminar este registro del sistema?');"><span class='icon-trash'></a></td></tr>
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
