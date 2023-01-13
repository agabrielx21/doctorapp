<?php
session_start();
include "../../db_conn.php";    
ob_end_clean();
require('../../fpdf/fpdf.php');
$user = $_SESSION['username'];
$date = date('m/d/Y h:i:s a', time());
$sql = "SELECT * FROM inventar";
$result = mysqli_query($conn, $sql);
$h = 49;
$w = 85;

$pdf = new FPDF();
  
$pdf->AddPage();
  
$pdf->SetFont('Arial', 'B', 14);


$pdf->Image('invoice-template-word-blue.jpg',0,0,$pdf->GetPageWidth(), $pdf->GetPageHeight());

$pdf->SetXY(13,10);
$pdf->Cell(40,150,$user);

$pdf->SetXY(12, 125);
$pdf->Cell(50,48,$date);

while($row = mysqli_fetch_assoc($result)){
    $pdf->SetXY($w, $h);
    $pdf->Cell(50,50,$row['nume_item']);
    $w = $w + 83;
    $pdf->SetXY($w, $h);
    $pdf->Cell(50,50,$row['stoc']);
    $w = $w - 83;
    $h = $h + 8.5;
}


$pdf->Output();
  
?>