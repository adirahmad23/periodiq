 <?php
session_start();
include_once "proses/koneksi.php";
$kon = new Koneksi();
if (isset($_GET['emg']) && isset($_GET['bpm']) && isset($_GET['gsr'])) {
    $emg = $_GET['emg'];
    $bpm = $_GET['bpm'];
    $gsr = $_GET['gsr'];
    $abc = $kon->kueri("INSERT INTO tb_sensor (emg, bpm, gsr) VALUES ('$emg', '$bpm', '$gsr')");
    $abc = $kon->kueri("SELECT * FROM tb_kondisi WHERE id = '1'");
    $datakondisi = $kon->hasil_data($abc);
    $user = $datakondisi['user'];
    if ($datakondisi['sebelum'] == 1) {
        $abc = $kon->kueri("INSERT INTO tb_sebelum (emg, bpm, gsr , user) VALUES ('$emg', '$bpm', '$gsr' ,  '$user')");
    }

    if ($datakondisi['sesudah'] == 1) {
        $abc = $kon->kueri("INSERT INTO tb_sesudah (emg, bpm, gsr , user) VALUES ('$emg', '$bpm', '$gsr' , '$user')");
    }

    
}
