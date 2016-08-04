<?php


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Image( "C:/xampp/htdocs/portuaria-permisos/assets/img/logo.png", 10 ,8, 20 , 24,'PNG');
$pdf->Ln(7);
$pdf->Cell(35, 10, '', 0);

$yourtext = iconv('UTF-8', 'windows-1252', 'AUTORIDAD PORTUARIA DE PUERTO BOLÍVAR');

$pdf->Cell(130, 10, $yourtext, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(20);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(73, 8, '', 0);
$pdf->Cell(100, 8, 'LISTADO DE DEPARTAMENTOS', 0);
$pdf->Ln(15);

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(25, 8, '#', 0);
$pdf->Cell(70, 8, 'Nombre', 0);
$pdf->Cell(95, 8, 'Descripcion', 0);

$pdf->Ln(8);
$pdf->SetFont('Arial', '', 9);
//CONSULTA

$pdo=Conexion::conectar();
$stmt = $pdo->prepare("SELECT * FROM departamento WHERE estado = 1");
$stmt->execute();

$rows_affected = $stmt->rowCount();
$cont=0;
if($rows_affected>0){
         while ($row = $stmt->fetch()) {
             
                            if ($row['estado']==1){
                            $cont = $cont+1;
                            $pdf->Cell(25, 8, utf8_decode($cont) , 0);
                            $pdf->Cell(70, 8, utf8_decode($row['nombre']) , 0);
                            $pdf->Cell(95, 8, utf8_decode($row['descripcion']), 0);
                                $pdf->Ln(8);
                            }

                     }
 }

$pdf->Output();
?>