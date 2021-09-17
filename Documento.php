<!DOCTYPE html>
<html>
<head>
<title>SITT</title>
   <meta charset = "utf-8" />
  <link rel="stylesheet"  href="css/Tesis.css">
   <link rel="stylesheet"  href="css/registros.css">
 <link type="text/css" rel="stylesheet" href="css/fontello.css" />
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
</head>
<body> 
   <style type="text/css">
   body{
   }    
    button[type="submit"] {
border: none;
    outline: none;

    width: 20%;
    height: 35px;
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
     button[type="reset"] {
border: none;
    outline: none;

    width: 20%;
    height: 35px;
    background: transparent;
    background: #b80f22;
    color: #fff;
    font-size: 12px;
    border-radius: 5px;

}

 button[type="reset"]:hover {
  cursor: pointer;
  background: #000;
  color: #FFF;

     </style>
<header>
  <div class="menu">
  <ul>
    <li><a href="RegistrosDocumentos.php"><span class="icon-reply"></span> Atras</a></li>    
  </ul>
</div>
      <?php
  $mysqli = new mysqli('localhost', 'root', '', 'documento');
?>
<form action="RegistroTesis.php" method="POST" >
  <div class="group"><br><br> 

<h2>Registro de Documentos</h2><br><br>
       <input type="text" placeholder="Titulo de Tesis" name="titulo"  minlength="4" maxlength="200" required> <br/>
      <input type="text" placeholder="Año" name="old" minlength="4"required > <br/>
  <input type="text" placeholder="Periodo" name="periodo"  pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required> <br/>
  <input type="text" placeholder="Fecha de Examen" name="fechaexamen" required>
        <select name="nivel_escolar"  pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required>
         <option value="" disabled="" selected="">Nivel</option>
         <option value="Licenciatura" >Licenciatura</option>
         <option value="Maestria">Maestria</option>
         <option value="Doctorado" >Doctorado</option>
            </select> 
         <br/> <br>
         <select name="tipo_documento" required>
         <option value="" disabled="" selected="">Tipo de Documento</option>
         <option value="Tesis" >Tesis</option>
         <option value="Tesina">Tesina</option>
            </select> 
         <br/> <br>
    <select name="idjurado">
        <option value=" ">Selecione un Jurado</option>
          <?php
          $query = $mysqli -> query ("SELECT DISTINCT idjurado,concat(Presi.nombre_profesor, ' ', Presi.apellido_paterno, ' ',Presi.apellido_materno) AS Presidente,concat(Secre.nombre_profesor, ' ',Secre.apellido_paterno, ' ',Secre.apellido_materno) AS Secretario,concat(Voc.nombre_profesor, ' ', Voc.apellido_paterno, ' ',Voc.apellido_materno) AS vocal
           FROM  jurado, profesor Presi, profesor Secre, profesor Voc
           WHERE  jurado.Presidente=Presi.rfc
           AND jurado.Secretario=Secre.rfc
           AND jurado.Vocal=Voc.rfc");
           while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[idjurado].'">'.$valores[Presidente].' - '.$valores[Secretario].' - '.$valores[vocal].'</option>';
          }
        ?>
     </select><br><br> 
 <button type="submit" value="Registrar" name="btnRegistrar">Registrar</button>
 <button type="reset" value="Limpiar"  name="btnLimpiar">Limpiar</button>
       
    </form>
         </div>
</div>
</body>
</html>