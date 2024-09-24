<?php
include_once "proses/koneksi.php";
$kon = new Koneksi();


$sql = $kon->kueri("SELECT * FROM tb_sensor");



$data = array();
while ($row = $kon->hasil_data($sql)) {
    $formatted_date = date('H:i:s', strtotime($row['date']));
    $data[] = array(
        "date" => $formatted_date,
        "bpms" => $row['bpm'],
        "gsrs" => $row['gsr'],
        "emgs" => $row['emg']
    );
}
// Return data in JSON format
echo json_encode($data);
?>
