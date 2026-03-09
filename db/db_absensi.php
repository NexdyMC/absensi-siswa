<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_absensi";

$db_absensi = mysqli_connect($host, $user, $pass, $db);
if (!$db_absensi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>