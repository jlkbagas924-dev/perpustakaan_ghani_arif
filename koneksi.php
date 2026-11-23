<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_perpustakaan";

mysqli_report(MYSQLI_REPORT_OFF); // error query tidak mematikan halaman, cukup lewat mysqli_error()
$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
mysqli_set_charset($koneksi, 'utf8mb4');
?>
