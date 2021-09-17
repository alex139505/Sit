
<?php

require('pdf/fpdf.php');

class PDF extends FPDF
{
   
// Cabecera de página
function Header()
{
  $this->Image('img/logo-tecnm.png', 10, 5, 35, 25);
   $this->Image('img/logo-oficia.png', 245, 5, 25, 25);
    $this->Image('img/logo-oficia.png', 245, 5, 25, 25);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
     $this->Cell(160,10,utf8_decode('Instituto Tecnologico de Tecomatlàn'),0,1,'C');
    $this->Cell(278,10,'Reportes de Documentos',0,0,'C');
    // Salto de línea
    $this->Ln(20);
     $this->SetFont('Arial','B',10);
$this->cell(10, 10, 'Folio', 1 ,0, 'C', 0);
$this->cell(110, 10, 'Titulo', 1 ,0, 'C', 0);
$this->cell(10, 10, utf8_decode('AÑO'), 1 ,0, 'C', 0);
$this->cell(35, 10, 'PERIODO', 1 , 0, 'C', 0);
$this->cell(35, 10, 'fechaexamen', 1 , 0, 'C', 0);
$this->cell(35, 10, 'NIVEL ESCOLAR', 1 , 0, 'C', 0);
$this->cell(25, 10, 'DOCUMENTO', 1 , 1, 'C', 0);

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
function AcceptPageBreak()
{
    // Método que acepta o no el salto automático de página
    if($this->col<2)
    {
        // Ir a la siguiente columna
        $this->SetCol($this->col+1);
        // Establecer la ordenada al principio
        $this->SetY($this->y0);
        // Seguir en esta página
        return false;
    }
    else
    {
        // Volver a la primera columna
        $this->SetCol(0);
        // Salto de página
        return true;
    }
}

require 'Conexion.php';
$consult="SELECT * FROM documento";
$resultado =  $conexion->query($consult);
    
$pdf = new PDF('P', 'mm', 'LETTER');

$pdf->AliasNbPages();
$pdf->AddPage(' c', 'LETTER');
   
$pdf->SetFont('Arial','',9, 'C');
 $pdf->SetFillColor(135);
while ($row = $resultado->fetch_assoc()) {
   
$pdf->cell(10, 10, $row['folio'], 1 ,0, 'C', 0); //initial x (start of column position)
$current_y = $pdf->GetY();
$current_x = $pdf->GetX();
$cell_width = 110;  //define cell width
$cell_height=35;    //define cell height
$pdf->MultiCell( 110, 5, $row['titulo'],1, 1,'C'); 
$current_x+=$cell_width;                           //calculate position for next cell
$pdf->SetXY($current_x, $current_y);   
$pdf->cell(10, 10, $row['old'], 1 ,0, 'C', 0);
$pdf->cell(35, 10, $row['periodo'], 1 , 0, 'C', 0);
$pdf->cell(35, 10, $row['fechaexamen'], 1 , 0, 'C', 0);
$pdf->cell(35, 10, $row['nivel_escolar'], 1 , 0, 'C', 0);
$pdf->cell(25, 10, $row['tipo_documento'], 1 , 1, 'C', 0);


}


$pdf->Output();

?>
