<?php

require('pdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
 $this->Image('img/logo-tecnm.png', 10, 5, 35, 25);
   $this->Image('img/logo-oficia.png', 180, 5, 25, 25);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(83,10,utf8_decode('Instituto Tecnologico de Tecomatlàn'),0,1,'C');
    $this->Cell(210,10,'Reporte de Jurado',0,0,'C');
    // Salto de línea
    $this->Ln(23);
$this->SetFont('Arial','B',10);
$this->cell(10, 10, utf8_decode( 'Nº'), 1 ,0, 'C', 0);
$this->cell(55, 10, 'PRESIDENTE', 1 ,0, 'C', 0);
$this->cell(55, 10, 'SECRETARIO', 1 ,0, 'C', 0);
$this->cell(55, 10, 'VOCAL', 1 , 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8 );
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}
require 'Conexion.php';
$consult="SELECT DISTINCT idjurado,concat(Presi.nombre_profesor, ' ', Presi.apellido_paterno, ' ',Presi.apellido_materno) AS Presidente,concat(Secre.nombre_profesor, ' ',Secre.apellido_paterno, ' ',Secre.apellido_materno) AS Secretario,concat(Voc.nombre_profesor, ' ', Voc.apellido_paterno, ' ',Voc.apellido_materno) AS vocal FROM jurado, profesor Presi, profesor Secre, profesor Voc WHERE jurado.Presidente=Presi.rfc AND jurado.Secretario=Secre.rfc AND jurado.Vocal=Voc.rfc";
$resultado =  $conexion->query($consult);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9, 'C');

while ($row = $resultado->fetch_assoc()) {
$pdf->cell(10, 10, $row['idjurado'], 1 ,0, 'C', 0);
$pdf->cell(55, 10, $row['Presidente'], 1 ,0, 'c', 0);
$pdf->cell(55, 10, $row['Secretario'], 1 ,0, 'c', 0);
$pdf->cell(55, 10, $row['vocal'], 1 , 1, 'c', 0);
}


$pdf->Output();

?>