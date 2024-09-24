<?php
include_once "proses/koneksi.php";
$kon = new Koneksi();

$sql = $kon->kueri("SELECT * FROM tb_sensor ORDER BY id DESC LIMIT 1");



$data = array();
while ($row = $kon->hasil_data($sql)) {
    $data[] = array(
        "date" => $row['date'],
        "bpm" => $row['bpm'],
        "gsr" => $row['gsr'],
        "emg" => $row['emg']

    );
}

// Return data in JSON format
echo json_encode($data);
?>
