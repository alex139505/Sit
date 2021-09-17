
<?php

require('pdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
      $this->Image('img/logo-tecnm.png', 10, 5, 35, 25);
   $this->Image('img/logo-oficia.png', 245, 5, 25, 25);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
     $this->Cell(150,10,utf8_decode('Instituto Tecnologico de Tecomatlàn'),0,1,'C');
    $this->Cell(258,10,'Reportes de Egresados',0,0,'C');
    // Salto de línea
    $this->Ln(20);
$this->SetFont('Arial','B',10);
$this->cell(30, 10, utf8_decode('Nº'), 1 ,0, 'C', 0);
$this->cell(40, 10, 'Nombre', 1 ,0, 'C', 0);
$this->cell(35, 10, 'Apellido Paterno', 1 ,0, 'C', 0);
$this->cell(35, 10, 'Apellido Materno', 1 , 0, 'C', 0);
$this->cell(30, 10, 'Sexo', 1 , 0, 'C', 0);
$this->cell(35, 10, 'Telefono', 1 , 0, 'C', 0);
$this->cell(55, 10, 'Correo', 1 , 1, 'C', 0);

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
$consult="SELECT * FROM egresado";
$resultado =  $conexion->query($consult);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage(' c', 'LETTER');
$pdf->SetFont('Arial','',9, 'C');

while ($row = $resultado->fetch_assoc()) {
$pdf->cell(30, 10, $row['n_control'], 1 ,0, 'C', 0);
$pdf->cell(40, 10, $row['nombre'], 1 ,0, 'C', 0);
$pdf->cell(35, 10, $row['apellido_paterno'], 1 ,0, 'C', 0);
$pdf->cell(35, 10, $row['apellido_materno'], 1 , 0, 'C', 0);
$pdf->cell(30, 10, $row['sexo'], 1 , 0, 'C', 0);
$pdf->cell(35, 10, $row['telefono'], 1 , 0, 'C', 0);
$pdf->cell(55, 10, $row['correo'], 1 , 1, 'C', 0);


}


$pdf->Output();

?>