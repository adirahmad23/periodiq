<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}
require('assets/fpdf/fpdf.php');
date_default_timezone_set('Asia/Jakarta');

include_once "proses/koneksi.php";
$kon = new Koneksi();
$startDate =  $_GET['filterStartDate'] . ' ' . $_GET['filterStartTime'];
$endDate = $_GET['filterEndDate']  . ' ' . $_GET['filterEndTime'];
$user = $_SESSION['user'];
$brgs = $kon->kueri("SELECT * FROM tb_sesudah WHERE date BETWEEN '$startDate' AND '$endDate' AND user = '$user' ORDER BY id DESC");

$brgss = $kon->kueri("SELECT * FROM tb_sesudah WHERE user = '$user' ORDER BY id DESC");
$data = $kon->hasil_data($brgss);

class PDF extends FPDF
{
    private $datass; // Declare a private property to hold the data

    // Constructor to initialize the data
    public function __construct($data)
    {
        parent::__construct();
        $this->datass = $data;
    }
    function Header()
    {
        $this->SetFont('Times', 'B', 14);
        $this->Cell(0, 30, 'LAPORAN DATA SESUDAH PENGECEKAN', 0, 1, 'C');
        // Garis pemisah
        $this->SetLineWidth(0.5);
        $this->Line(55, $this->GetY() - 12, $this->GetPageWidth() - 55, $this->GetY() - 12);
        $this->Ln(6); // Adjust the value here to reduce the gap

        $user = $_SESSION['user'];
        $this->SetFont('Times', 'B', 10);
        $this->Cell(0, 0, 'Nama : ' . $user , 0, 1, 'L');
        $this->Ln(6); // Adjust the value here to reduce the gap
    }
}

// Membuat instance PDF
$pdf = new PDF($data);
$pdf->AddPage();

// Table header
$pdf->SetLineWidth(0.7); // Set the line thickness to 1 (adjust as needed)
$pdf->SetFont('Arial', 'B', 10);

// Table header
$pdf->Cell(8, 8, 'No', 1, 0, 'C');
$pdf->Cell(45, 8, 'Tanggal & Waktu', 1, 0, 'C');
$pdf->Cell(45, 8, 'Detak Jantung', 1, 0, 'C');
$pdf->Cell(45, 8, 'Tingkat Stress', 1, 0, 'C'); // Add 1 at the end for a new line after this cell
$pdf->Cell(45, 8, 'Kontraksi Otot', 1, 1, 'C'); // Add 1 at the end for a new line after this cell

// Reset font for the table body
$pdf->SetFont('Times', '', 10);

$no = 1;
$totalBpm = 0;
$totalGsr = 0;
$totalEmg = 0;
$count = 0;

while ($row = $kon->hasil_data($brgs)) {
    $pdf->Cell(8, 10, $no, 1, 0, 'C');
    $date = $row['date']; // Asumsi format awal adalah Y-m-d
    $dateTime = new DateTime($date);
    $formattedDate = $dateTime->format('d-m-Y H:i:s' );
    $pdf->Cell(45, 10, $formattedDate, 1, 0, 'C');
    $pdf->Cell(45, 10, $row['bpm'], 1, 0, 'C');
    $pdf->Cell(45, 10, $row['gsr'], 1, 0, 'C'); // Add 1 at the end for a new line after this cell
    $pdf->Cell(45, 10, $row['emg'], 1, 1, 'C'); // Add 1 at the end for a new line after this cell

    $totalBpm += $row['bpm'];
    $totalGsr += $row['gsr'];
    $totalEmg += $row['emg'];
    $count++;
    $no++;
}

// Menghitung rata-rata
$avgBpm = $count ? $totalBpm / $count : 0;
$avgGsr = $count ? $totalGsr / $count : 0;
$avgEmg = $count ? $totalEmg / $count : 0;

// Menambahkan rata-rata ke tabel
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(53, 10, 'Rata-rata', 1, 0, 'C');
$pdf->Cell(45, 10, number_format($avgBpm, 2), 1, 0, 'C');
$pdf->Cell(45, 10, number_format($avgGsr, 2), 1, 0, 'C');
$pdf->Cell(45, 10, number_format($avgEmg, 2), 1, 1, 'C');

$pdf->SetLineWidth(0.2); // Adjust the default value if needed
// Output PDF
header('Content-Type: application/pdf');
$filename = 'Laporan Data_' .  date('dmyHis') . '.pdf';
header('Content-Disposition: inline; filename="' . $filename . '"');
$pdf->Output('F', 'php://output');
?>
