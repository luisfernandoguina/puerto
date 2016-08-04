<?php
$id = $permiso->id;//lo ke recibe 
$id_empleado = $permiso->id_empleado; 
$nombre="";
$cargo="";
$departamento="";
$fecha="";
$fecha_detalle="";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 17);
$pdf->Image( "C:/xampp/htdocs/portuaria-permisos/assets/img/logo.png", 25 ,20, 20 , 24,'PNG');
$pdf->Ln(7);
$pdf->Cell(34, 10, '', 0);

$pdf->Rect(5, 10, 200, 129);
$pdf->Cell(35, 10, '', 0);
$pdf->Cell(100, 30, utf8_decode("HOJA DE PERMISO"), 0);

$pdf->SetFont('Arial', '', 9);

$pdf->Ln(35);


//CONSULTA

$pdo=Conexion::conectar();
$stmt = $pdo->prepare("SELECT * FROM permiso WHERE id ='".$id."'");
$stmt->execute();

$rows_affected = $stmt->rowCount();
if($rows_affected>0){
         while ($row = $stmt->fetch()) {
             
                            if ($row['disponible']==1){
                           $motivo = $row['motivo'];
                            $fecha = $row['fecha'];

                            }

                     }
 }

$stmt_empleado = $pdo->prepare("select empleado.estado,empleado.nombre, empleado.apellido, cargo.nombre as cargo, departamento.nombre as departamento 
from empleado left join cargo on empleado.id_cargo = cargo.id 
left join departamento on empleado.id_departamento = departamento.id
where empleado.id='".$id_empleado."'");
$stmt_empleado->execute();

$rows_affected = $stmt_empleado->rowCount();
if($rows_affected>0){
         while ($row = $stmt_empleado->fetch()) {
             
                            if ($row['estado']==1){
                            $nombre = $row['nombre'].' '.$row['apellido'];
                            $cargo = $row['cargo'];
                            $departamento= $row['departamento'];

                            }

                     }
 }


//tiempo

setlocale(LC_ALL,"es_ES@euro","es_ES","esp");

//echo $fecha;

$stmt_detalle_permiso = $pdo->prepare("select * from detalle_permiso where id_permiso ='".$id."'");
$stmt_detalle_permiso->execute();
$rows_affected = $stmt_detalle_permiso->rowCount();
$cont=0;
if($rows_affected>0){
         while ($row = $stmt_detalle_permiso->fetch()) {
             $cont++;
             $fecha_detalle .= strtoupper(strftime("%d %B ( %H:%M -", strtotime($row['fecha_inicio'])));
             $fecha_detalle .=strtoupper(strftime(" %H:%M )", strtotime($row['fecha_fin'])));            
             if ($cont<= ($rows_affected-1) ){//compruebo si es el ultimo registro para concatenar el ::Y::
                 $fecha_detalle .=" Y " ;
             };
                            
                     }
    
 }


$pdf->Cell(18, 10, utf8_decode("NOMBRE: "), 0);
$pdf->Cell(87, 10, utf8_decode(strtoupper ($nombre)), 0);
$pdf->Cell(18, 10, utf8_decode("FECHA: "), 0);
$pdf->Cell(30, 10, utf8_decode($fecha), 0);
$pdf->Ln();

$pdf->Cell(18, 10, utf8_decode("CARGO: "), 0);
$pdf->Cell(87, 10, utf8_decode(strtoupper ($cargo)), 0);
$pdf->Cell(30, 10, utf8_decode("DEPARTAMENTO: "), 0);
$pdf->Cell(30, 10, utf8_decode(strtoupper ($departamento)), 0);
$pdf->Ln();

//26 MAYO (12:00 A 16:30) Y 30 MAYO (08:00 a 16:30)"
//TIEMPO
$pdf->Cell(18, 8, utf8_decode("TIEMPO: "), 0);
$pdf ->MultiCell(177,8,$fecha_detalle, 0, 'J', 0);

//$pdf->Cell(100, 10, $fecha_detalle, 0);
//$pdf->Ln();
//MOTIVO
$pdf->Cell(18, 10, utf8_decode("MOTIVO: "), 0);
$pdf->Cell(100, 10, utf8_decode(strtoupper ($motivo)), 0);
$pdf->Ln(25);



//linea nombre
//$pdf->Line(29, 59 , 96, 59);
//linea cargo
//$pdf->Line(29, 69 , 96, 69);
//linea tiempo
//$pdf->Line(29, 79 , 29+$tam_tiempo*2+2, 79);
//tamanio = 18
//linea tmotivo
//$pdf->Line(29, 89 , 29+$tam_motivo*2+2, 89);


//lineas para firmas
$pdf->Line(10, 109 , 68, 109);
$pdf->Line(140, 109 , 199, 109);
$pdf->Line(70, 124, 140, 124);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(15, 0,'', 0);
$pdf->Cell(127, 13, utf8_decode("SOLICITANTE"), 0);
$pdf->Cell(130, 13, utf8_decode("GERENTE GENERAL"), 0);
$pdf->Ln(15);
$pdf->Cell(65, 0,'', 0);

$pdf->Cell(127, 13, utf8_decode("JEFE DE RECURSOS HUMANOS"), 0);







$pdf->Output();
?>