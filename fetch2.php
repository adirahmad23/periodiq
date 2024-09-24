<?php
include_once "proses/koneksi.php";
$kon = new Koneksi();


$sql = $kon->kueri("SELECT date,`getar`,piezo FROM `komp2`");


$data = array();
while ($row = $kon->hasil_data($sql)) {
    $data[] = array(
        "date" => $row['date'],
        "getar" => $row['getar'],
        "piezo" => $row['piezo']
    );
    
}
// Return data in JSON format
echo json_encode($data);
?>
