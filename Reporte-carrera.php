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
    $this->Cell(70,10,'REPORTES DE CARRERA',0,0,'C');
    // Salto de línea
    $this->Ln(23);
$this->SetFont('Arial','B',10);
$this->cell(30, 10, utf8_decode( 'Clave'), 1 ,0, 'C', 0);
$this->cell(85, 10, 'Nombre', 1 ,0, 'C', 0);
$this->cell(68, 10, 'Plan de Estudios', 1 ,1, 'C', 0);

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
$consult="SELECT * FROM carrera";
$resultado =  $conexion->query($consult);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9, 'C');

while ($row = $resultado->fetch_assoc()) {
$pdf->cell(30, 10, $row['clave'], 1 ,0, 'C', 0);
$pdf->cell(85, 10, $row['nombre_carrera'], 1 ,0, 'J', 0);
$pdf->cell(68, 10, $row['plan_estudios'], 1 ,1, 'C', 0);
}


$pdf->Output();

?>