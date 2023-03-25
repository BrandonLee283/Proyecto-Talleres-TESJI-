<?php
require('reportes_pdf/fpdf.php');
require("Conexion/conexion.php");

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
   
    // Logo
    $this->Image('images/Tesji.png',10,8,200);
    // Arial bold 15

    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}
/*crear conexion para mostrar tabla */
require("conexion/conexion.php");
$clave = $_GET["clave"];
$consulta = "CALL sp_ver_alumno('$clave')";
$resutado = mysqli_query($conec,$consulta);

/*utf8_decode*/
$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(255,0,1);
$pdf->Cell(60,40,'    ', 0,1,'C',0);

$pdf->SetLineWidth(1);
//$pdf->SetDrawColor(0,255,0);


while($row = $resutado->fetch_assoc()){ 
        $pdf->Cell(10,20,'', 0,0,'C',0); //Margen
       // $pdf->SetTextColor(91,218,17);
        $pdf->SetFillColor(0,255,0);
    $pdf->Cell(60,20,'Matricula', 1,0,'C',0);
    
    $pdf-> Cell(115,20, $row['NUMERO_CONTROL_ALUMNO'], 1,1,'C',0); 
        $pdf->Cell(10,20,'', 0,0,'C',0); //Margen
    $pdf->Cell(60,20,'Nombre Alumno',1,0,'C',0);  
    $pdf-> Cell(115, 20, $row['NOMBRE_ALUMNO'], 1,1,'C',0);
        $pdf->Cell(10,20,'', 0,0,'C',0); //Margen
    $pdf->Cell(60,20,'Apellido Paterno', 1,0,'C',0); 
    $pdf-> Cell(115,20, $row['APELLIDOP_ALUMNO'], 1,1,'C',0);
        $pdf->Cell(10,20,'', 0,0,'C',0); //Margen
    $pdf->Cell(60,20,'Apellido Materno', 1,0,'C',0); 
    $pdf-> Cell(115,20, $row['APELLIDOM_ALUMNO'], 1,1,'C',0);
        $pdf->Cell(10,20,'', 0,0,'C',0); //Margen
    $pdf->Cell(60,20,'Telefono', 1,0,'C',0); 
    $pdf-> Cell(115,20, $row['TELEFONO_ALUMNO'], 1,1,'C',0);
        $pdf->Cell(10,20,'', 0,0,'C',0); //Margen
    $pdf->Cell(60,20,'Correo', 1,0,'C',0); 
    $pdf-> Cell(115,20, $row['EMAIL_ALUMNO'], 1,1,'C',0);
        $pdf->Cell(10,20,'', 0,0,'C',0); //Margen
    $pdf->Cell(60,20,'Carrera', 1,0,'C',0); 
    $pdf-> Cell(115,20, $row['NOMBRE_CARRERA'], 1,1,'C',0);
        $pdf->Cell(10,20,'', 0,0,'C',0); //Margen
    $pdf->Cell(60,20,'Taller', 1,0,'C',0); 
    $pdf-> Cell(115,20, $row['NOMBRE_TALLER'], 1,1,'C',0);


}
$pdf->Output();
?>
