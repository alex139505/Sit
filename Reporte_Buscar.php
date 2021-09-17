
<?php
$nombre=$_GET['nombre'];
ob_start();
require('pdf/fpdf.php');
require 'Conexion.php';

//$this->Cell(300,10,utf8_decode($nombre),0,1,'C');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
      $this->Image('img/logo-tecnm.png', 10, 5, 35, 25);
   $this->Image('img/logo-oficia.png', 385, 5, 25, 25);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
     $this->Cell(300,10,utf8_decode('Instituto Tecnologico de Tecomatlàn'),0,1,'C');
     
    $this->Cell(408,10,'Reportes de Busqueda',0,0,'C');
    // Salto de línea
    $this->Ln(20);
$this->SetFont('Arial','B',10);
$this->cell(50, 10, utf8_decode('Nombre'), 1 ,0, 'C', 0);
$this->cell(115, 10, 'Titulo', 1 ,0, 'C', 0);
$this->cell(65, 10, 'Carrera', 1 ,0, 'C', 0);
$this->cell(40, 10, 'Especialidad', 1 , 0, 'C', 0);
$this->cell(45, 10, 'Presidente', 1 , 0, 'C', 0);
$this->cell(40, 10, 'Secretario', 1 , 0, 'C', 0);
$this->cell(45, 10, 'Vocal', 1 , 1, 'C', 0);

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

$consult="SELECT * FROM buscar WHERE nombre LIKE '%$nombre%' OR Presidente LIKE '%$nombre%' OR Secretario LIKE '%$nombre%' OR vocal LIKE '%$nombre%'";
                   
$resultado =  $conexion->query($consult);
$pdf = new PDF('P', 'mm', 'A3');
$pdf->AliasNbPages();
$pdf->AddPage(' C', 'A3');
$pdf->SetFont('Arial','',8, 'C');
$pdf->SetFillColor(135);
while ($row = $resultado->fetch_assoc()) {
$pdf->cell(50, 10, $row['nombre'], 1 ,0, 'C', 0);

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();
$cell_width = 115;  //define cell width
$cell_height=0;    //define cell height
$pdf->MultiCell(115, 4, $row['titulo'], 1, 'J');
//$pdf->MultiCell( 115, 5, $row['titulo'],1); 
$current_x+=$cell_width;
$current_y+=$cell_height; 
$pdf->SetXY($current_x, $current_y);                         //calculate position for next cell
$pdf->cell(65, 10, $row['nombre_carrera'], 1 , 0, 'C', 0);
$pdf->cell(40, 10, $row['nombre_especialidad'], 1 , 0, 'C', 0);
$pdf->cell(45, 10, $row['Presidente'], 1 , 0, 'C', 0);
$pdf->cell(40, 10, $row['Secretario'], 1 ,0, 'C', 0);
$pdf->cell(45, 10, $row['vocal'], 1 ,1, 'C', 0);
}
$pdf->Ln(2);
$pdf->cell(0,5,"SITT_Web 2019",0,0,'C');
$pdf->Output();

?>