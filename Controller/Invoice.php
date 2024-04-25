<?php

use Fpdf\Fpdf;
require_once __DIR__ .  '/../vendor/autoload.php';
$pdf = new Fpdf();
$pdf->AddPage();
$pdf->Rect(5, 5, 200, 287);
$pdf->SetFont('Arial', '', 12);
// $pdf->Cell(50, 10, 'Fullname:', 0, 0, 'L', false, '');
// $pdf->Cell(100, 10, $fullName, 0, 0, 'L', false, '');

// // $pdf->Image($fileDestination, 150, 30, 50, 55, '', '');
// $pdf->Ln();
// $pdf->Ln();
// $pdf->Ln();
// $pdf->Ln();
// $pdf->Cell(50, 10, 'Subjects', 1, 0, 'C', false, '');
// $pdf->Cell(50, 10, 'Score', 1, 0, 'C', false, '');
// $pdf->Ln();

// $pdf->Ln();
// $pdf->Ln();
// $pdf->Ln();
// $pdf->Cell(50, 10, 'Phone Number:', 0, 0, 'L', false, '');
// $pdf->Cell(50, 10, $phoneNumber, 0, 0, 'L', false, '');
// $pdf->Ln();
// $pdf->Cell(50, 10, 'Email Id:', 0, 0, 'L', false, '');
// $pdf->Cell(50, 10, $_POST['email'], 0, 0, 'L', false, '');
try {
  $pdf->Output('F','Invoice.pdf');
}
catch(Exception $e) {
  echo $e;
}
