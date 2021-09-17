
<!DOCTYPE html>
<html>
<head>
	<title>SITT</title>
  <meta charset = "utf-8" />
	<link rel="stylesheet"  href="css/Tesis.css">
   <link rel="stylesheet"  href="css/registros.css">
    <link type="text/css" rel="stylesheet" href="css/fontello.css" />
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
	<meta charset="utf-8">
</head>
<body>
<header>
  <div class="menu">
  <ul>
    <li><a href="RegistrosDocumentos.php"><span class="icon-reply"></span> Atras</a></li>    
  </ul>
</div>
</header>
<form action="EditDocumento.php" method="POST" >
  <div class="group"><br><br> 
<h2>Editar Registros</h2><br><br>
<?php 
         $server = "localhost";
      $usuario = "root";
      $contraseña = "";
      $bd = "documento";
      //$id = $_POST['clave'];
        $folio=$_GET['folio'];
       //$nombre_carrera=$_GET['nombre_carrera'];
       
$conexion = mysqli_connect($server, $usuario, $contraseña, $bd) or die ("error en la conexion");
$consulta = mysqli_query($conexion, "SELECT documento.folio,documento.titulo,documento.old,documento.periodo,documento.fechaexamen,documento.nivel_escolar,documento.tipo_documento,jurado.idjurado,concat(Presi.nombre_profesor, ' ', Presi.apellido_paterno, ' ',Presi.apellido_materno) AS Presidente,concat(Secre.nombre_profesor, ' ',Secre.apellido_paterno, ' ',Secre.apellido_materno) AS Secretario,concat(Voc.nombre_profesor, ' ', Voc.apellido_paterno, ' ',Voc.apellido_materno) AS vocal from documento, carrera,jurado, profesor Presi, profesor Secre, profesor Voc where jurado.Presidente=Presi.rfc
           AND jurado.Secretario=Secre.rfc
           AND jurado.Vocal=Voc.rfc AND jurado.idjurado=documento.idjurado AND folio='".$folio."'") or die ("errror al traer datos");


 $extraido = mysqli_fetch_array($consulta);
         ?>
<input readonly type="text" placeholder="Titulo de Tesis" name="folio"  value="<?php echo $extraido['folio']?>" required> <br/>
<input type="text" placeholder="Titulo de Tesis" name="titulo"  value="<?php echo utf8_encode($extraido['titulo'])?>"  > <br/>
<input type="text" placeholder="Año" name="old"  value="<?php echo $extraido ['old']?>" equired> <br/>
<input type="text" placeholder="Periodo" name="periodo"  value="<?php echo $extraido['periodo']?>"  pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required> <br/>
<input type="text" placeholder="nivel escolar" name="fechaexamen"  value="<?php echo $extraido['fechaexamen']?>" required> <br/>
<input type="text" placeholder="nivel escolar" name="nivel_escolar"  value="<?php echo $extraido['nivel_escolar']?>"  pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required> <br/>
         
<input type="text" placeholder="tipo de documento" name="tipo_documento"  value="<?php echo $extraido['tipo_documento']?>"  pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required> <br/>
     
      <select name="idjurado" >
        <option value="<?php echo $extraido['idjurado']?>"><?php echo $extraido['Presidente'],' - ',$extraido['Secretario'],' - ', $extraido['vocal']?></option>
         <?php $row=$sql=$conexion->query("SELECT DISTINCT idjurado,concat(Presi.nombre_profesor, ' ', Presi.apellido_paterno, ' ',Presi.apellido_materno) AS Presidente,concat(Secre.nombre_profesor, ' ',Secre.apellido_paterno, ' ',Secre.apellido_materno) AS Secretario,concat(Voc.nombre_profesor, ' ', Voc.apellido_paterno, ' ',Voc.apellido_materno) AS vocal
           FROM  jurado, profesor Presi, profesor Secre, profesor Voc
           WHERE  jurado.Presidente=Presi.rfc
           AND jurado.Secretario=Secre.rfc
           AND jurado.Vocal=Voc.rfc"); 
        while ( $row=$sql->fetch_array()) {
         echo '<option value="'.$row[idjurado].'">'.$row[Presidente].' - '.$row[Secretario].' - '.$row[vocal].'</option>';
        }
         ?>
        </select><br/>       
 <button type="submit" value="Guardar" name="btnRegistrar">Guardar</button>
    </form>
         </div>
</body>
</html>