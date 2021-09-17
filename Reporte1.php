<?php
$carrera=$_GET['carrera'];
$especialidad=$_GET['especialidad'];
$periodo=$_GET['periodo'];
$old=$_GET['old']; 
$tipo_documento=$_GET['tipo_documento'];   
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
$this->cell(45, 10, utf8_decode('Nombre'), 1 ,0, 'C', 0);
$this->cell(115, 10, 'Titulo', 1 ,0, 'C', 0);
$this->cell(18, 10, 'Fecha', 1 ,0, 'C', 0);
$this->cell(10, 10, utf8_decode('Año'), 1 ,0, 'C', 0);
$this->cell(17, 10, 'Periodo', 1 ,0, 'C', 0);
$this->cell(55, 10, 'Carrera', 1 ,0, 'C', 0);
$this->cell(35, 10, 'Especialidad', 1 , 0, 'C', 0);
$this->cell(40, 10, 'Presidente', 1 , 0, 'C', 0);
$this->cell(30, 10, 'Secretario', 1 , 0, 'C', 0);
$this->cell(36, 10, 'Vocal', 1 , 1, 'C', 0);

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

$consult="SELECT concat( egresado.nombre, ' ', egresado.apellido_paterno, ' ', egresado.apellido_materno ) AS NombreAlumno, titulo, fechaexamen, old, periodo, nombre_carrera, nombre_especialidad, concat( Presi.nombre_profesor, ' ', Presi.apellido_paterno, ' ', Presi.apellido_materno ) AS Presidente, concat( Secre.nombre_profesor, ' ', Secre.apellido_paterno, ' ', Secre.apellido_materno ) AS Secretario, concat( Voc.nombre_profesor, ' ', Voc.apellido_paterno, ' ', Voc.apellido_materno ) AS vocal FROM egresado, documento, especialidad, carrera, jurado, profesor Presi, profesor Secre, profesor Voc WHERE documento.folio = egresado.folio AND egresado.idespecialidad = especialidad.idespecialidad AND especialidad.clave = carrera.clave AND carrera.nombre_carrera LIKE'%$carrera%' AND especialidad.nombre_especialidad LIKE '%$especialidad%' AND documento.periodo LIKE'%$periodo%' AND documento.old LIKE'%$old%' AND documento.tipo_documento LIKE '%$tipo_documento%' AND documento.idjurado = jurado.idjurado AND jurado.Presidente = Presi.rfc AND jurado.Secretario = Secre.rfc AND jurado.Vocal = Voc.rfc";
                   
$resultado =  $conexion->query($consult);
$pdf = new PDF('P', 'mm', 'A3');
$pdf->AliasNbPages();
$pdf->AddPage(' C', 'A3');
$pdf->SetFont('Arial','',8, 'C');
$pdf->SetFillColor(135);
while ($row = $resultado->fetch_assoc()) {
$pdf->cell(45, 10, $row['NombreAlumno'], 1 ,0);
$current_y = $pdf->GetY();
$current_x = $pdf->GetX();
$cell_width = 115;  //define cell width
$cell_height=35;    //define cell height
$pdf->MultiCell( 115, 5, $row['titulo'],1); 
$current_x+=$cell_width;                           //calculate position for next cell
$pdf->SetXY($current_x, $current_y); 
$pdf->cell(18, 10, $row['fechaexamen'], 1 , 0);
$pdf->cell(10, 10, $row['old'], 1 , 0);
$pdf->cell(17, 10, $row['periodo'], 1 , 0);
$pdf->cell(55, 10, $row['nombre_carrera'], 1 , 0);
$pdf->cell(35, 10, $row['nombre_especialidad'], 1 , 0);
$pdf->cell(40, 10, $row['Presidente'], 1 , 0);
$pdf->cell(30, 10, $row['Secretario'], 1 , 0);
$pdf->cell(36, 10, $row['vocal'], 1 , 1);
}

$pdf->cell(0,5,"SITT_Web 2019",0,0,'C');
$pdf->Output();

?>7