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
$startDate =  $_GET['filterStartDate'] .' '. $_GET['filterStartTime'];
$endDate = $_GET['filterEndDate']  .' '. $_GET['filterEndTime'];

$brgs = $kon->kueri("SELECT * FROM suhu WHERE date BETWEEN '$startDate' AND '$endDate' ORDER BY id DESC");

$brgss = $kon->kueri("SELECT * FROM suhu ORDER BY id DESC");
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
        $this->Cell(0, 30, 'LAPORAN DATA SUHU', 0, 1, 'C');
        // Garis pemisah
        $this->SetLineWidth(0.5);
        $this->Line(76, $this->GetY() - 12, $this->GetPageWidth() - 76, $this->GetY() - 12);
        $this->Ln(6); // Adjust the value here to reduce the gap
    }
    



    // Rest of your class definition...

    // function Footer()
    // {
    //     $this->SetFont('Times', '', 11);
    //     $this->Cell(0, 35, 'Yang Mengajukan;', 0, 0, 'L');
    //     $this->Cell(-4, 35, 'Mengetahui:', 0, 1, 'R');
    //     $this->Cell(0, 15, $this->datass['penerima'], 0, 0, 'L');
    //     $this->Cell(-3, 24, 'Lenni Manik ', 0, 1, 'R');
    //     $this->Ln(23); // Adjust the value here to reduce the gap
    // }
}
// Membuat instance PDF
$pdf = new PDF($data);
$pdf->AddPage();

// Query data dari database


// Table header
$pdf->SetLineWidth(0.7); // Set the line thickness to 1 (adjust as needed)
$pdf->SetFont('Arial', 'B', 10);

// Table header
$pdf->Cell(8, 8, 'No', 1, 0, 'C');
$pdf->Cell(90, 8, 'Tanggal & Waktu', 1, 0, 'C');
//$pdf->Cell(60, 8, 'Getaran', 1, 0, 'C');
$pdf->Cell(90, 8, 'Suhu', 1, 1, 'C'); // Add 1 at the end for a new line after this cell

// Reset font for the table body
$pdf->SetFont('Times', '', 10);

$no = 1;
while ($row = $kon->hasil_data($brgs)) {
    $pdf->Cell(8, 10, $no, 1, 0, 'C');
    $pdf->Cell(90, 10, $row['date'], 1, 0, 'C');
   // $pdf->Cell(60, 10, $row['temp'], 1, 0, 'C');
    $pdf->Cell(90, 10, $row['temp'], 1, 1, 'C'); // Add 1 at the end for a new line after this cell
    $no++;
}

$pdf->SetLineWidth(0.2); // Adjust the default value if needed
// Output PDF
header('Content-Type: application/pdf');
$filename = 'Laporan Data Suhu_' .  date('dmyHis') . '.pdf';
header('Content-Disposition: inline; filename="' . $filename . '"');
$pdf->Output('F', 'php://output');
