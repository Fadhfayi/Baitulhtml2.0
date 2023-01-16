<?php
require_once "koneksi.php";
$NamaDepan = mysqli_real_escape_string($koneksi, $_POST['NamaDepan']);
$NamaBelakang = mysqli_real_escape_string($koneksi, $_POST['NamaBelakang']);
$Alamat = mysqli_real_escape_string($koneksi, $_POST['Alamat']);
$Nomor = mysqli_real_escape_string($koneksi, $_POST['Nomor']);
$Lahir = mysqli_real_escape_string($koneksi, $_POST['Lahir']);
$motivasi = mysqli_real_escape_string($koneksi, $_POST['motivasi']);
if(mysqli_query($koneksi, " INSERT INTO pendaftaran (NamaDepan, NamaBelakang, Alamat, Nomor, Lahir, motivasi) VALUES('" . $NamaDepan . "', '" . $NamaBelakang . "', '" . $Alamat . "', '" . $Nomor . "', '" . $Lahir . "', '" . $motivasi . "')")) {
    // echo '1';
    } else {
    echo "Error: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
?>