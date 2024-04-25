<?php
use Fpdf\Fpdf;
require_once __DIR__ .  '/../vendor/autoload.php';
require_once __DIR__ . '/../Model/Query.php';
require_once __DIR__ . '/Sendmail.php';
session_start();
$ob = new Query();
$obn = new Sendmail();
$id = (int)$_POST['product-id'];
$user = $_POST['user'];
$ob->addBuy($user,$id);
// $order = $ob->fetchOrder($id);
$order = $ob->fetchCart($_SESSION['email']);
$pdf = new Fpdf();
$pdf->AddPage();
$pdf->Rect(5, 5, 200, 287);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Product name:', 1, 0, 'L', false, '');
$pdf->Cell(50, 10, 'Price', 1, 1, 'L', false, '');
$total = 0;
foreach ($order as $x) {

  $pdf->Cell(50, 10, $x['name'], 1, 0, 'L', false, '');

  $pdf->Cell(50, 10, $x['price'], 1, 1, 'L', false, '');
  $total+=$x['price'];
}
$pdf->Cell(50, 10, 'Total:', 1, 0, 'L', false, '');
$pdf->Cell(50, 10, $total, 1, 0, 'L', false, '');
try {
  $pdf->Output('F','Invoice.pdf');
}
catch(Exception $e) {
  echo $e;
}
$ob->emptyCart($_SESSION['email']);
$obn->sendInvoice($_SESSION['email']);
