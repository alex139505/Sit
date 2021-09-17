
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
   $this->Cell(80,10,utf8_decode('Instituto Tecnologico de Tecomatlàn'),0,1,'C');
    $this->Cell(188,10,'Reportes del Periodo',0,0,'C');
    // Salto de línea
    $this->Ln(20);
     $this->SetFont('Arial','B',10);
$this->cell(20, 10, 'nombre', 1 ,0, 'C', 0);
$this->cell(20, 10, 'apellido_paterno', 1 ,0, 'J', 0 );
$this->cell(20, 10, 'apellido_materno', 1 ,0, 'C', 0);
$this->cell(25, 10, 'titulo', 1 , 0, 'C', 0);
$this->cell(5, 10, 'old', 1 , 0, 'C', 0);
$this->cell(20, 10, 'nombre_carrera', 1 , 0, 'C', 0);
$this->cell(20, 10, 'nombre', 1 , 0, 'C', 0);
$this->cell(20, 10, 'apellido_paterno', 1 ,0, 'J', 0 );
$this->cell(25, 10, 'apellido_materno', 1 ,0, 'C', 0);

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

 
$consult=("SELECT egresado.nombre,egresado.apellido_paterno,egresado.apellido_materno,documento.titulo,documento.old,carrera.nombre_carrera,profesores.nombre,profesores.apellido_paterno,profesores.apellido_materno FROM egresado,documento, especialidad, carrera, jurado,profesores WHERE documento.n_control = egresado.n_control AND documento.idjurado=jurado.idjurado AND jurado.Presidente=profesores.idprofesor AND profesores.nombre LIKE '%paulina%' AND egresado.idespecialidad = especialidad.idespecialidad AND especialidad.clave = carrera.clave AND documento.tipo_documento LIKE '%tesis%' AND carrera.nombre_carrera LIKE '%$nombre_carrera%' AND especialidad.nombre_especialidad LIKE '%$nombre_especialidad%' AND documento.periodo LIKE '%$periodo%' AND documento.old = 2016");
$resultado =  $conexion->query($consult);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9, 'C');

while ($row = $resultado->fetch_assoc()) {
$pdf->cell(10, 10, utf8_encode($row['nombre']), 1 ,0, 'C', 0);
$pdf->cell(80, 10, utf8_encode($row['apellido_paterno']), 1 ,0, 'J', 0 );
$pdf->cell(15, 10, utf8_encode($row['apellido_materno']), 1 ,0, 'C', 0);
$pdf->cell(25, 10, utf8_encode($row['titulo']), 1 , 0, 'C', 0);
$pdf->cell(35, 10, utf8_encode($row['old']), 1 , 0, 'C', 0);
$pdf->cell(25, 10, utf8_encode($row['nombre_carrera']), 1 , 1, 'C', 0);
$pdf->cell(25, 10, utf8_encode($row['nombre']), 1 , 1, 'C', 0);
$pdf->cell(80, 10, utf8_encode($row['apellido_paterno']), 1 ,0, 'J', 0 );
$pdf->cell(15, 10, utf8_encode($row['apellido_materno']), 1 ,0, 'C', 0);
}


$pdf->Output();

?>