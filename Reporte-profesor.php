
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
$this->Cell(268,10,'Reportes de Profesores',0,0,'C');
    // Salto de línea
$this->Ln(20);
$this->SetFont('Arial','B',10);
$this->cell(30, 10, 'RFC', 1 ,0, 'C', 0);
$this->cell(50, 10, 'Nombre Profesor', 1 ,0, 'C', 0);
$this->cell(20, 10, utf8_decode('Sexo'), 1 ,0, 'C', 0);
$this->cell(55, 10, 'Grado Academico', 1 , 0, 'C', 0);
$this->cell(45, 10, 'Curp', 1 , 0, 'C', 0);
$this->cell(45, 10, 'Correo', 1 , 1, 'C', 0);

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
$consult="SELECT  rfc,profesor.rfc,
                               concat(profesor.nombre_profesor,' ',
                               profesor.apellido_paterno,' ',
                               profesor.apellido_materno) AS nombre,
                               profesor.sexo,
                               profesor.grado_academico,                               
                               profesor.curp,
                               profesor.correo
                               FROM profesor";
$resultado =  $conexion->query($consult);
    
$pdf = new PDF('P', 'mm', 'LETTER');

$pdf->AliasNbPages();
$pdf->AddPage(' c', 'LETTER');
   
$pdf->SetFont('Arial','',9, 'C');
while ($row = $resultado->fetch_assoc()) {
$pdf->cell(30, 10, $row['rfc'], 1 ,0, 'C', 0); //initial x (start of column position)
$pdf->cell(50, 10, $row['nombre'], 1 ,0, 'C', 0);
$pdf->cell(20, 10, $row['sexo'], 1 ,0, 'C', 0);
$pdf->cell(55, 10, $row['grado_academico'], 1 , 0, 'C', 0);
$pdf->cell(45, 10, $row['curp'], 1 , 0, 'C', 0);
$pdf->cell(45, 10, $row['correo'], 1 , 1, 'C', 0);



}


$pdf->Output();

?>
