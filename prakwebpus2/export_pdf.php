<?php
require('fpdf/fpdf.php');
include 'koneksi.php';

$tabel = $_GET['tabel'];
$ukuran = ($_GET['ukuran'] == 'F4') ? array(215, 330) : 'A4'; // ukuran dalam mm
$data = mysqli_query($koneksi, "SELECT * FROM $tabel");
$kolom = mysqli_fetch_fields($data);

$pdf = new FPDF('L', 'mm', $ukuran);
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, strtoupper("LAPORAN TABEL: $tabel"), 0, 1, 'C');
$pdf->Ln(5);

// Header kolom
$pdf->SetFont('Arial', 'B', 10);
foreach ($kolom as $k) {
    $pdf->Cell(40, 8, $k->name, 1, 0, 'C');
}
$pdf->Ln();

// Isi tabel
$pdf->SetFont('Arial', '', 9);
while ($row = mysqli_fetch_assoc($data)) {
    foreach ($row as $val) {
        $pdf->Cell(40, 8, $val, 1, 0, 'C');
    }
    $pdf->Ln();
}

$pdf->Output('I', "Laporan_$tabel.pdf");
?>
